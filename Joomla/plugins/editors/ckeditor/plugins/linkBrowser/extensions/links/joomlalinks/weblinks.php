<?php
/*
* This plugin uses parts of JCE extension by Ryan Demmer.
* @copyright	Copyright (C) 2005 - 2011 Ryan Demmer. All rights reserved.
* @copyright	Copyright (C) 2003 - 2011, CKSource - Frederico Knabben. All rights reserved.
* @license		GNU/GPL
* CKEditor extension is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined('_CKE_EXT') or die('Restricted access');
class linkBrowserWeblinks 
{
	function getOptions()
	{
		$linkBrowser =& linkBrowser::getInstance();
		$list = '';
		if ($linkBrowser->checkAccess('linkBrowser_weblinks', '1')) {
		
			$list = '<li id="index.php?option=com_weblinks&view=categories"><div class="tree-row"><div class="tree-image"></div><span class="folder weblink nolink"><a href="javascript:;">' . JText::_('WEBLINKS') . '</a></span></div></li>';
		}
		return $list;	
	}
	function getItems($args)
	{
		
		
		$items = array();

		switch ($args->view) {
		// Get all WebLink categories
		default:
		case 'categories':
			$categories = linkBrowser::getCategory('com_weblinks');				
			foreach ($categories as $category) {
				$itemid = linkBrowser::getItemId('com_weblinks', array('categories' => null, 'category' => $category->id));
				$items[] = array(
					'id'		=>	'index.php?option=com_weblinks&view=category&id=' . $category->id . $itemid,
					'name'		=>	$category->title . ' / ' . $category->alias,
					'class'		=>	'folder weblink'
				);
			}
			break;
		// Get all links in the category
		case 'category':				
			require_once(JPATH_SITE.DS.'includes'.DS.'application.php');
			require_once(JPATH_SITE.DS.'components'.DS.'com_weblinks'.DS.'helpers'.DS.'route.php');
			
			$weblinks 	= linkBrowserWeblinks::_weblinks($args->id);
			foreach ($weblinks as $weblink) {
				$items[] = array(
					'id'		=>	WeblinksHelperRoute::getWeblinkRoute($weblink->id, $args->id),
					'name'		=>	$weblink->title . ' / ' . $weblink->alias,
					'class'		=>	'file'
				);
			}
			break;
		}
		return $items;
	}
	function _weblinks($id)
	{
		$db		=& JFactory::getDBO();
		
		$query = 'SELECT title, id, alias'
		. ' FROM #__weblinks'
		. ' WHERE published = 1'
		. ' AND catid = '.(int) $id
		. ' ORDER BY title'
		;
		
		$db->setQuery($query, 0);
		return $db->loadObjectList();
	}
}
?>
