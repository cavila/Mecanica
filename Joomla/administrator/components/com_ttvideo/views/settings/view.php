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

class TTVideoViewSettings extends JView
{

  function display() {  
    
    $document = & JFactory::getDocument();
    $document->addStyleSheet('components/com_ttvideo/css/ttvideo.css');
    
    JToolBarHelper::title('TTVideo Settings', 'ttvideo.png');
    JToolBarHelper::apply( 'applySettings' );
    JToolBarHelper::save( 'saveSettings' );
    JToolBarHelper::cancel( 'cancel' );
    $model = $this->getModel();
    $settings = $model->getSettings();
    $this->assignRef('settings', $settings);
    parent::display();
  }

}
?>