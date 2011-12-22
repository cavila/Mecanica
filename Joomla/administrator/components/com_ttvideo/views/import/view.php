<?php
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view');

class TTVideoViewImport extends JView
{

  function display() {
    $document = & JFactory::getDocument();
    $document->addStyleSheet('components/com_ttvideo/css/ttvideo.css');
    
    JToolBarHelper::title('TTVideo'.': [<small>Import Videos</small>]');
    JToolBarHelper::customX( 'importcsvtask', 'import', '', 'Import', false );
    JToolBarHelper::cancel( 'cancel' );  
    parent::display();
  }


}
?>