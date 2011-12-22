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

class TTVideoViewVideo extends JView
{

  function displayVideo($videoId)  {
    global $mainframe;
    
    $document = &JFactory::getDocument();
    
    $model = $this->getModel();
    $settings = $model->getSettings();
    $video = $model->getVideo($videoId);
    $vote = $model->getVotingSystem($videoId);
    $this->assignRef( 'settings', $settings );
    $this->assignRef( 'video', $video );
    $this->assignRef( 'vote', $vote );
    
    // set the page title
    $document->setTitle( $mainframe->getCfg('sitename') . ' - ' . $video->title );
    
    parent::display();
  }

}
?>