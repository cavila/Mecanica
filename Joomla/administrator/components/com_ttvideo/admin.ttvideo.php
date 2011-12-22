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


$task = JRequest::getCmd( 'task', '' );

if($task == '') {
  JSubMenuHelper::addEntry(JText::_('Videos'), 'index.php?option=com_ttvideo', true);
  JSubMenuHelper::addEntry(JText::_('Categories'), 'index.php?option=com_categories&section=com_ttvideo');
  JSubMenuHelper::addEntry(JText::_('Settings'), 'index.php?option=com_ttvideo&task=settings');
} elseif ($task == 'settings') {
  JSubMenuHelper::addEntry(JText::_('Videos'), 'index.php?option=com_ttvideo');
  JSubMenuHelper::addEntry(JText::_('Categories'), 'index.php?option=com_categories&section=com_ttvideo');
  JSubMenuHelper::addEntry(JText::_('Settings'), 'index.php?option=com_ttvideo&task=settings', true);
}


require_once( JPATH_COMPONENT.DS.'ttvideoController.php' );

$controller = new TTVideoController();
$controller->execute( JRequest::getVar( 'task' ) );
$controller->redirect();
?>