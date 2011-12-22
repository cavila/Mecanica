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

class TTVideoViewCategories extends JView
{

  function display()  {
    global $mainframe;
    
    $document = &JFactory::getDocument();
    
    $model = $this->getModel();
    $settings = $model->getSettings();
    $categories = $model->getCategories();
    $this->assignRef('settings', $settings);
    $this->assignRef( 'categories', $categories );
    
    // set the page title
    $document->setTitle( $mainframe->getCfg('sitename') . ' - Video Categories' );
    
    parent::display();
  }

}
?>