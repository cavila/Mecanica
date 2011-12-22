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

class TTVideoViewVideoList extends JView
{

  public $video_img_link = "";
  public $num_plays= "";
  public $num_likes = "";

  function display()  {
    global $mainframe;
    
    $uri 		  = &JFactory::getURI();
    $document = &JFactory::getDocument();
		
    // Get some data from the model
		$videos		  = &$this->get('data' );
		$total		  = &$this->get('total');
		$pagination	= &$this->get('pagination');
		$state		  = &$this->get('state');
    
    $model = $this->getModel();
    $settings = $model->getSettings();
    $videolist = $model->getData();
    
    $lists['order'] = JRequest::getVar( 'filter_order' );
    $lists['order_Dir'] = JRequest::getVar( 'filter_order_Dir' );
    $lists['search_value'] = JRequest::getVar( 'search_value' );
    $lists['search_fields'] = JRequest::getVar( 'search_fields' );
    
    $this->assignRef( 'settings', $settings);
    $this->assignRef( 'videos', $videos );
    $this->assignRef( 'lists', $lists );
		$this->assignRef( 'pagination',	$pagination);
    
    $this->assign('action',	$uri->toString());
    
    // set the page title
    $titleFragment = 'Video List';
    if (isset($videos[0]->cat_title)) $titleFragment = $titleFragment.' - '.$videos[0]->cat_title;
    $document->setTitle( $mainframe->getCfg('sitename') . ' - ' . $titleFragment );
    
    parent::display();
  }
  
}
?>