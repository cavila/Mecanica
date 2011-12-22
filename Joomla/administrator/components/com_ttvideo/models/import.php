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
jimport( 'joomla.filesystem.archive' );
jimport( 'joomla.filesystem.file' );
jimport( 'joomla.filesystem.folder' );
jimport( 'joomla.filesystem.path' );

class TTVideoModelImport extends JModel 
{

  function __construct() {
    parent::__construct();
    $this->db =& JFactory::getDBO();
    $this->catid = new stdClass();
    $this->videoid = new stdClass();
    $this->errorMessage = '';
    $this->prexistingCategory = false;
  }

  function importCSV($zipfile) {
    // clean up filename to get rid of strange characters like spaces etc
    $filename = JFile::makeSafe($zipfile['name']);
    $destination = JPATH_SITE.DS.'tmp'.DS.'ttvideo';
    // make the folder to stored the extracted files
    JFolder::create($destination, 0777);
    // place zip file in new directory
    if (!JFile::upload($zipfile['tmp_name'], JPATH_SITE.DS.'tmp'.DS.$filename)) JError::raiseError(500, 'Error uploading file to '.JPATH_SITE.DS.'tmp');
    // unzip file
    $result = JArchive::extract(JPath::clean(JPATH_SITE.DS.'tmp'.DS.$filename), JPath::clean($destination));
    if ($result === false) JError::raiseError(500, 'Error unzipping file.');
    $files = JFolder::files($destination);
    sort($files); // get filenames in correct order
    // loop through the files to import
    foreach ($files as $file) $this->__importCSVData(JPATH_SITE.DS.'tmp'.DS.'ttvideo'.DS.$file);
    // clean up at the end
    JFolder::delete($destination);
  }

  private function __importCSVRow($tablename, $tableArray, $colnamesArr) {
    if ($tablename != 'ttvideo_ratings') array_shift($colnamesArr); // removes id column out of array except on ratings table
    $colnamesString = implode('`, `', $colnamesArr);
    $colnamesString = '`'.$colnamesString.'`';
    foreach ($tableArray as $row) {
      if ($tablename != 'ttvideo_ratings') $id = array_shift($row); // removes id value from row except on ratings table
      $numColumns = count($row);
      $counter = 0;
      $values = '';
      foreach ($row as $key => $value) {
        $counter++;
        // change the catid in ttvideo table to represent the new inserted id in the categories table
        if ($tablename == 'ttvideo' && $key == 'catid') {
          $values .= "'".$this->catid->{$value}."'"; 
        // change the ids in the ratings table to match the new inserted ids in the video table - i.e. link up new videos ids with ratings  
        } elseif ($tablename == 'ttvideo_ratings' && $key == 'id') {
          $values .= "'".$this->videoid->{$value}."'"; 
        } elseif ($tablename == 'categories' && $key == 'title') {
          $old_catid = $this->__checkCategoryName($value);
        }
        $values .= "'".$value."'";
        if ($counter != $numColumns) $values .= ', '; // only add comma if not last element
      }
      if (!$this->prexistingCategory) { // do not add category into table if it exists already
        $sql = "INSERT INTO `#__$tablename` ($colnamesString) VALUES ($values)";
        $this->db->setQuery($sql);
        if (!$this->db->query()){
          $errorMessage = $this->db->getErrorMsg();
          JError::raiseError(500, 'Error importing data into database: '.$errorMessage);
        }    
      }
      if ($tablename == 'categories') {
        if ($this->prexistingCategory) {
          $this->catid->{$id} = $old_catid;
          $this->prexistingCategory = false; // reset
        } else {
          $this->catid->{$id} = $this->db->insertid();
        }
      } elseif ($tablename == 'ttvideo') {
        $this->videoid->{$id} = $this->db->insertid();
      }
    }
  }
  
  private function __updateSettings($rowArray) {
    $sql = 'UPDATE #__ttvideo_settings SET ';
    $size = count($rowArray);
    $counter = 0;
    foreach ($rowArray as $key => $value) {
      $counter++;
      $sql .= "`".$key."`='".$value."'";
      if ($counter != $size) $sql .= ', '; // only add comma if not last element
    }
    $sql .= ' WHERE `id`=1';
    $this->db->setQuery($sql);
    if (!$this->db->query()){
      $errorMessage = $this->db->getErrorMsg();
      JError::raiseError(500, 'Error updating settings: '.$errorMessage);
    }    
  }

  private function __importCSVData($filename) {
    $handle = fopen($filename, 'r');
    if ($handle === false) $this->errorMessage .= 'Cannot open file.';
    // remove the filename extension and path to get tablename
    $tablename = basename($filename, '.csv'); 
    $tableArray = array();
    $colnamesArr = array();
    $colNames = true;
    
    while (($data = fgetcsv($handle, 0, ';')) !== false) {
      // used to get column names from CSV file - this is only on the first line.
      $this->errorMessage .= 'Size: '.count($data).'<br />';
      if ($colNames === true) {
        foreach ($data as $colname) {
          $colnamesArr[] = $colname;
        }
        $colNames = false;
      } else {
        $rowObj = new StdClass();
        for ($i=0; $i<count($data); $i++) { 
          $rowObj->{$colnamesArr[$i]} = $data[$i];
        }
        $tableArray[] = (array)$rowObj; // cast to array for key value use
      }
    }
    fclose($handle);
    if ($tablename == 'ttvideo_settings') $this->__updateSettings((array)$rowObj);
    else $this->__importCSVRow($tablename, $tableArray, $colnamesArr);
  }
  
  private function __checkCategoryName($title) {
    $sql = "SELECT * FROM #__categories WHERE `title`='$title' AND `section`='com_ttvideo'";
    $this->db->setQuery($sql);
    $this->db->query();
    $num_rows = $this->db->getNumRows();
    // there is a category already with the same name
    // if there is already more than 1 then we ignore, this is up to the user to sort out
    if ($num_rows == 1) { 
      $this->prexistingCategory = true;
      $row = $this->db->loadObject();
      return $row->id; // return the category id to be used instead
    }
    return 0;
  }
  
}
?>