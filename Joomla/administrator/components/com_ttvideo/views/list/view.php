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

class TTVideoViewList extends JView
{
  function display() {
  
    $document = & JFactory::getDocument();
    $document->addStyleSheet('components/com_ttvideo/css/ttvideo.css');
    
    JToolBarHelper::title('TTVideo', 'ttvideo.png');
    
    JToolBarHelper::customX( 'updateVideoStats', 'update', '', 'Update Stats', false );
    
    JToolBarHelper::divider();
    
    // custom export to set raw format for download
    $bar = & JToolBar::getInstance('toolbar');
    $bar->appendButton( 'Link', 'export', 'Export Videos', 'index.php?option=com_ttvideo&task=exportvideos&format=raw' );
    JToolBarHelper::customX( 'importcsvview', 'import', '', 'Import Videos', false );
    // import function not yet finished
    //$bar->appendButton( 'Popup', 'import', 'Import Videos', 'index.php?option=com_ttvideo&task=importupload&format=template' );
    
    JToolBarHelper::divider();
    
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
    JToolBarHelper::deleteList();
    JToolBarHelper::editListX();
    JToolBarHelper::addNewX();
    
    global $mainframe;
    
    $uri 		= &JFactory::getURI();
		
    // Get some data from the model
		$videos		= &$this->get('data' );
		$total		= &$this->get('total');
		$pagination	= &$this->get('pagination');
		$state		= &$this->get('state');
    
    $model = $this->getModel();
    $videolist = $model->getData();
    
    $lists['order'] = JRequest::getVar( 'filter_order' );
    $lists['order_Dir'] = JRequest::getVar( 'filter_order_Dir' );
    $lists['search_value'] = JRequest::getVar( 'search_value' );
    $lists['search_fields'] = JRequest::getVar( 'search_fields' );
    
    $this->assignRef( 'videos', $videos );
    $this->assignRef( 'lists', $lists );
		$this->assignRef( 'pagination',	$pagination);
    
    $this->assign('action',	$uri->toString());
    
    parent::display();
  }
}
?>