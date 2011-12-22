<?php
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

//No direct acesss
defined('_JEXEC') or die();
jimport('joomla.application.component.model');
jimport( 'joomla.filesystem.file' );
jimport( 'joomla.filesystem.archive' );
jimport( 'joomla.environment.response' );

class TTVideoModelExport extends JModel 
{

  function exportToCSV() {
    $files = array();
    $file = $this->__createCSVFile('#__ttvideo');
    if ($file != '') $files[] .= $file;
    $file = $this->__createCSVFile('#__ttvideo_ratings');
    if ($file != '') $files[] .= $file;
    $file = $this->__createCSVFile('#__ttvideo_settings');
    if ($file != '') $files[] .= $file;
    $file = $this->__createCSVFile('#__categories');
    if ($file != '') $files[] .= $file;
    // zip up csv files to be delivered
    $random = rand(1, 99999);
    $archive_filename = JPATH_SITE.DS.'tmp'.DS.'ttvideo_'. strval($random) .'_'.date('Y-m-d').'.zip';
    $this->__zip($files, $archive_filename);
    // deliver file
    $this->__deliverFile($archive_filename);
    // clean up
    JFile::delete($archive_filename);
    foreach($files as $file) JFile::delete(JPATH_SITE.DS.'tmp'.DS.$file);
  }
  
  private function __createCSVFile($table_name) {
    $db = $this->getDBO();
    $csv_output = '';
    
    // get table column names
    $db->setQuery("SHOW COLUMNS FROM `$table_name`");
    $columns = $db->loadObjectList();
    $num_cols = count($columns);
    $counter = 0;
    foreach ($columns as $column) {
      $counter++;
      $csv_output .= $column->Field;
      if ($counter != $num_cols) $csv_output .= '; ';
    }
    $csv_output .= "\n";
    
    // get table data
    if ($table_name == '#__categories') {
      $db->setQuery("SELECT * FROM `$table_name` WHERE section='com_ttvideo'");
    } else {
      $db->setQuery("SELECT * FROM `$table_name`");
    }
    $rows = $db->loadObjectList();
    $num_rows = count($rows);
    if ($num_rows > 0) {
      foreach($rows as $row) {
        // get number of columns
        $num_cols = count((array)$row);
        $counter = 0;
        foreach($row as $col_name => $value) {
          $counter++;
          $csv_output .= $value;
          if ($counter != $num_cols) $csv_output .= '; ';
        }
        $csv_output .= "\n";
      }
    }
    $filename = substr($table_name, 3).'.csv';
    $file = JPATH_SITE.DS.'tmp'.DS.$filename;
    // write file to temp directory
    if (JFile::write($file, $csv_output)) return $filename;
    else return '';
  }
  
  private function __deliverFile($archive_filename) {
    $filesize = filesize($archive_filename);
    JResponse::setHeader('Content-Type', 'application/zip');
    JResponse::setHeader('Content-Transfer-Encoding', 'Binary');
    JResponse::setHeader('Content-Disposition', 'attachment; filename=ttvideo_'.date('Y-m-d').'.zip');
    JResponse::setHeader('Content-Length', $filesize);
    echo JFile::read($archive_filename);
  }

  /* creates a compressed zip file */
  private function __zip($files, $destination = '') {
    $zip_adapter = & JArchive::getAdapter('zip'); // compression type
    $filesToZip = array();
    foreach ($files as $file) {
      $data = JFile::read(JPATH_SITE.DS.'tmp'.DS.$file); 
      $filesToZip[] = array('name' => $file, 'data' => $data); 
    }
    if (!$zip_adapter->create( $destination, $filesToZip )) {
      global $mainframe; 
      $mainframe->enqueueMessage('Error creating zip file.', 'message'); 
    }
  }


}
?>