<?php
/*
* This file uses parts of JCE extension by Ryan Demmer.
* @copyright	Copyright (C) 2005 - 2011 Ryan Demmer. All rights reserved.
* @copyright	Copyright (C) 2003 - 2011, CKSource - Frederico Knabben. All rights reserved.
* @license		GNU/GPL
* CKEditor extension is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.controller' );

/**
 * Plugins Component Controller
 *
 * @package		Joomla
 * @subpackage	Plugins
 * @since 1.5
 */
class ConfigController extends JController
{
	/**
	 * Custom Constructor
	 */
	function __construct( $default = array())
	{
		parent::__construct( $default );
		$this->registerTask( 'apply', 'save');
	}

	function display( )
	{
		parent::display();
	}

	function cancel( )
	{
		$this->setRedirect( JRoute::_( 'index.php') );
		//$this->setRedirect( JRoute::_( 'index.php?option=com_ckeditor&client='. $client, false ) );
	}

	function save()
	{
		// Check for request forgeries
		JRequest::checkToken() or die( 'Invalid Token' );

		$db 	=& JFactory::getDBO();
		$row 	=& JTable::getInstance('plugin');

		$task 	= $this->getTask();

		$client = JRequest::getWord( 'client', 'site' );

		$query = 'SELECT id'
		. ' FROM #__plugins'
		. ' WHERE element = "ckeditor"'
		;
		$db->setQuery( $query );
		$id = $db->loadResult();

		$row->load( intval( $id ) );
		$post = JRequest::get('post');

		$toolbar = $post['toolbarGroup'];
		if ($toolbar == 'advanced')
		{
			$post['params']['Advanced_ToolBar'] = $post['rows'];
		}else{
			$post['params']['Basic_ToolBar'] = $post['rows'];
		}

		if (!$row->bind($post)) {
			JError::raiseError(500, $row->getError() );
		}
		if (!$row->check()) {
			JError::raiseError(500, $row->getError() );
		}
		if (!$row->store()) {
			JError::raiseError(500, $row->getError() );
		}
		$row->checkin();

		if ($client == 'admin') {
			$where = "client_id=1";
		} else {
			$where = "client_id=0";
		}

		$row->reorder( 'folder = '.$db->Quote( $row->folder ).' AND ordering > -10000 AND ordering < 10000 AND ( '.$where.' )' );

		$msg = JText::sprintf( 'SAVED' );

		switch ( $task )
		{
			case 'apply':
				$this->setRedirect( 'index.php?option=com_ckeditor&type=config&client='. $client, $msg );
				break;

			case 'save':
			default:
				//$this->setRedirect( 'index.php?option=com_ckeditor&client='. $client, $msg );
				$this->setRedirect( 'index.php', $msg );
				break;
		}
	}
}