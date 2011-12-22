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

  // display the list of categories
  function display() {
    $viewName = JRequest::getVar( 'view', 'categories' ); 
    $viewLayout  = JRequest::getVar( 'layout', 'default' );        
    $view = & $this->getView($viewName, 'html');
    if ($model = & $this->getModel('ttvideo')) $view->setModel($model, true);
    $view->setLayout($viewLayout);
    $view->display();
  }

  // display the list of videos
  function videolist() {
    $viewName = JRequest::getVar( 'view', 'videolist' ); 
    $viewLayout  = JRequest::getVar( 'layout', 'default' );        
    $view = & $this->getView($viewName, 'html');
    if ($model = & $this->getModel('ttvideo')) $view->setModel($model, true);
    $view->setLayout($viewLayout);
    $view->display();
  }
  
  // display a single video
  function video() {
    $id = JRequest::getVar('id', ''); //Read video id
    $id = explode(':', $id, 2); // strip off video id alias
    $id = (int)$id[0]; // cast to int to avoid injection
    $viewName = JRequest::getVar( 'view', 'video' ); 
    $viewLayout  = JRequest::getVar( 'layout', 'default' );        
    $view = & $this->getView($viewName, 'html');
    if ($model = & $this->getModel('ttvideo')) $view->setModel($model, true);
    $view->setLayout($viewLayout);
    $view->displayVideo($id);
  }
  
  function savevote() {
    JRequest::checkToken() or jexit('Invalid Token');
    require(dirname(__FILE__).DS.'helpers'.DS.'rating.php');
    $vote = JRequest::getInt('rate', 0);
    $id = JRequest::getInt('id', 0);
    $document =& JFactory::getDocument();
    $document->setMimeEncoding( 'application/json' );    // Set the MIME type for JSON output.
    JResponse::setHeader( 'Content-Disposition', 'attachment; filename="rating.json"' ); // Change the suggested filename.
    JResponse::setHeader( 'Cache-Control', 'no-cache' ); // set not to cache
    $rating = new TTVideoRating();
    $rating->storeVote($vote, $id);
  }
  
}
?>