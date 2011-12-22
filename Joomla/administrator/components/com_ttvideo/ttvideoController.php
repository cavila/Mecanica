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
jimport('joomla.application.component.controller');


class TTVideoController extends JController
{

	/**
	 * Constructor
	 */
	function __construct() {
		parent::__construct();
		// Register Extra tasks
    $this->registerTask( 'applySettings', 'saveSettings'); // apply and save settings are virtually the same, only redirect to different pages.
	}

  function display() {
    //This sets the default view (second argument)        
    $viewName = JRequest::getVar( 'view', 'list' ); 
    //This sets the default layout/template for the view
    $viewLayout  = JRequest::getVar( 'layout', 'listlayout' );        
    $view = & $this->getView($viewName);
    // Get/Create the model
    if ($model = & $this->getModel('ttvideo')) {
      //Push the model into the view (as default)
      //Second parameter indicates that it is the default model for the view
      $view->setModel($model, true);
    }
    $view->setLayout($viewLayout);
    $view->display();
  }

  // controller for settings layout and view
  function settings() {
    $viewName = JRequest::getVar( 'view', 'settings' ); 
    $viewLayout  = JRequest::getVar( 'layout', 'settingslayout' );        
    $view = & $this->getView($viewName);
    if ($model = & $this->getModel('settings')) {
      $view->setModel($model, true);
    }
    $view->setLayout($viewLayout);
    $view->display();
  }
  
  function saveSettings() {
    $task = JRequest::getCmd( 'task' );
    $settings = JRequest::get( 'POST' );
    $model = & $this->getModel('settings'); 
    $model->saveSettings($settings);
		switch ($task)
		{
			case 'applySettings':
				$link = 'index.php?option=com_ttvideo&task=settings';
				break;
			case 'saveSettings':
			default:
				$link = 'index.php?option=com_ttvideo';
				break;
		}
    $this->setRedirect($link, 'Settings saved!');                
  }

  function edit() {
    //getVar(PARAMETER_NAME, DEFAULT_VALUE, HASH, TYPE)
    //The HASH is where to read the parameter from: 
    //The default is its default value:  getVar will look for the parameter in
    //GET, then POST and then FILE   
    $cids = JRequest::getVar('cid', null, 'default', 'array' ); //Reads id as an array
    if($cids === null) { 
      JError::raiseError(500, 'id parameter missing from the request');
    } 
    $videoId = (int)$cids[0];
    $view = & $this->getView('videoform');
    if ($model = & $this->getModel('ttvideo')) {
      $view->setModel($model, true);
    }
    $view->setLayout('videoformlayout');
    $view->displayEdit($videoId);        
  }
  
  function save() {
    JRequest::checkToken() or jexit( 'Invalid Token' );
    $video = JRequest::get( 'POST' );
    $model = & $this->getModel('ttvideo'); 
    $model->saveVideo($video);
    $link = 'index.php?option=com_ttvideo';
    $this->setRedirect($link, 'Video saved!');                
  }
  
  function add() {
    $view = & $this->getView('videoform');
    $model = & $this->getModel('ttvideo');
    if (!$model) JError::raiseError(500, 'Model named ttvideo not found');
    $view->setModel($model, true);
    $view->setLayout('videoformlayout');
    $view->displayAdd();                  
  }

  function remove(){
    $arrayIDs = JRequest::getVar('cid', null, 'default', 'array' ); //Reads id as an array
    if($arrayIDs === null) { //Make sure the id parameter was in the request
      JError::raiseError(500, 'id parameter missing from the request.');
    }
    $model = & $this->getModel('ttvideo');
    $model->deleteVideos($arrayIDs);
    $link = 'index.php?option=com_ttvideo';
    $this->setRedirect($link, 'Video(s) deleted!');                
  }
  
  function cancel() {
    $redirectTo = JRoute::_('index.php?option='.JRequest::getVar('option'));
    $this->setRedirect($redirectTo, 'Cancelled...');                       
  }
  
  function publish() {
    $arrayIDs = JRequest::getVar('cid', null, 'default', 'array' ); //Reads id as an array
    $model = & $this->getModel('ttvideo');
    $model->publishVideos($arrayIDs, 1);
    $link = 'index.php?option=com_ttvideo';
    $this->setRedirect( $link, 'Video(s) published!' );
  }
  
  function unpublish() {
    $arrayIDs = JRequest::getVar('cid', null, 'default', 'array' ); //Reads id as an array
    $model = & $this->getModel('ttvideo');
    $model->publishVideos($arrayIDs, 0);
    $link = 'index.php?option=com_ttvideo';
    $this->setRedirect( $link, 'Video(s) unpublished!' );
  }
  
  function updateVideoStats() {
    $model = & $this->getModel('ttvideo');
    $model->updateVideoStats();
    $link = 'index.php?option=com_ttvideo';
    $this->setRedirect( $link, 'Thumbnails, plays and likes of videos have been updated!' );
  }
  
  function exportvideos() {
    $model = & $this->getModel('export');
    $model->exportToCSV();
  }
  
  function importcsvview() {
    $viewName = JRequest::getVar( 'view', 'import' ); 
    $viewLayout  = JRequest::getVar( 'layout', 'default' );        
    $view = & $this->getView($viewName);
    $view->setLayout($viewLayout);
    $view->display();
  }
  
  function importcsvtask() {
    JRequest::checkToken() or jexit( 'Invalid Token' );
    $model = & $this->getModel('import');
    $model->importCSV(JRequest::getVar( 'file', null, 'files', 'array' ));
    $link = 'index.php?option=com_ttvideo';
    $this->setRedirect( $link, 'Videos have been imported successfully!' );
  }

}
?>