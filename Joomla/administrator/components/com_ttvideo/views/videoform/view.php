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

class TTVideoViewVideoForm extends JView
{

  function displayEdit($videoId) {  
    JToolBarHelper::title('TTVideo'.': [<small>Edit</small>]');
    JToolBarHelper::save( 'save' );
    JToolBarHelper::cancel( 'cancel' );
    $model = $this->getModel();
    $video = $model->getVideo($videoId);
    $this->assignRef('video', $video);
    parent::display();
  }

  function displayAdd(){
    JToolBarHelper::title('TTVideo'.': [<small>Add</small>]');
    JToolBarHelper::save( 'save' );
    JToolBarHelper::cancel( 'cancel' );  
    $model = $this->getModel();
    $video = $model->getNewVideo();
    $this->assignRef('video', $video);
    parent::display();
  }

}
?>