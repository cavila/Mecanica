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

class TTVideoModelSettings extends JModel 
{

  function getSettings() {
    $db = $this->getDBO();
    $db->setQuery('SELECT * from `#__ttvideo_settings` WHERE `id`=1');
    $settings = $db->loadObject();
    if ($settings === null)
      JError::raiseError(500, 'Error reading db settings');     
    return $settings;
  }
  
  function saveSettings($settings) {
    // Check for request forgeries
    JRequest::checkToken() or jexit( 'Invalid Token' );
    
    $settingsObj =& $this->getTable('settings');
    if (!$settingsObj->bind($settings)) JError::raiseError(500, 'Error binding data');
    
    if (!$settingsObj->check()) JError::raiseError(500, 'Invalid data');
    if (!$settingsObj->store()) {
      $errorMessage = $settingsObj->getError();
      JError::raiseError(500, 'Error binding data: '.$errorMessage);
    }
    //If we get here and with no raiseErrors, then the save went well    
  }

}
?>