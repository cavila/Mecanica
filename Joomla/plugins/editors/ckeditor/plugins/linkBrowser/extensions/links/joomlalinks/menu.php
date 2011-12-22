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
class linkBrowserMenu 
{
	function getOptions()
	{
		$linkBrowser =& linkBrowser::getInstance();
		$list = '';
		if ($linkBrowser->checkAccess('linkBrowser_menu', '1')) {
			$list = '<li id="index.php?option=com_menu"><div class="tree-row"><div class="tree-image"></div><span class="folder menu nolink"><a href="javascript:;">' . JText::_('MENU') . '</a></span></div></li>';
		}
		return $list;	
	}
	function getItems($args)
	{		
		$items 	= array();
		$view	= isset($args->view) ? $args->view : '';
		switch ($view) {
		default:
			$types = linkBrowserMenu::_types();
			foreach ($types as $type) {
				$items[] = array(
					'id'		=>	'index.php?option=com_menu&view=menu&id=' . $type->id,
					'name'		=>	$type->title,
					'class'		=>	'folder menu nolink'
				);
			}
			break;
		case 'menu':
			$menus = linkBrowserMenu::_menu(0, $args->id);
			foreach ($menus as $menu) {
				$children = linkBrowserMenu::_children($menu->id);
				
			/*	
				if ($menu->type == 'menulink') {
					//$menu = linkBrowserMenu::_alias($menu->id);
				}
			*/	
				$link = $menu->link;
				
				if (preg_match('/^index.php/i', $link) && strpos($link, 'Itemid') === false) {
					$link = $menu->link . '&Itemid=' . $menu->id;
				}
				
				$items[] = array(
					'id'		=>	$children ? 'index.php?option=com_menu&view=submenu&id=' . $menu->id : $link,
					'url'		=>	$link,
					'name'		=>	$menu->name . ' / ' . $menu->alias,
					'class'		=>	$children ? 'folder menu' : 'file'
				);
			}
			break;
		case 'submenu':
			$menus = linkBrowserMenu::_menu($args->id);
			foreach ($menus as $menu) {
				$children = linkBrowserMenu::_children($menu->id);
				$link = $menu->link;
				
				if (preg_match('/^index.php/i', $link) && strpos($link, 'Itemid') === false) {
					
					$link = $menu->link . '&Itemid=' . $menu->id;
				}
				
				if ($children) {
					$items[] = array(
						'id'		=>	$children ? 'index.php?option=com_menu&view=submenu&id=' . $menu->id : $link,
						'url'		=>	$link,
						'name'		=>	$menu->name . ' / ' . $menu->alias,
						'class'		=>	'folder menu'
					);
				}else{
					$items[] = array(
						'id'		=>	$link,
						'name'		=>	$menu->name . ' / ' . $menu->alias,
						'class'		=>	$children ? 'folder menu' : 'file'
					);
				}
			}
			break;
		}
		return $items;
	}
	function _types()
	{
		$db	=& JFactory::getDBO();
		
		$query = 'SELECT *'
		. ' FROM #__menu_types'
		;
		
		$db->setQuery($query, 0);
		return $db->loadObjectList();
	}
	function _alias($id)
	{
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		
		$query = 'SELECT params'
		. ' FROM #__menu'
		. ' WHERE id = '.(int) $id
		;
		
		$db->setQuery($query, 0);
		$params = new JParameter($db->loadResult());
		
		$query = 'SELECT id, name, link, alias'
		. ' FROM #__menu'
		. ' WHERE published = 1'
		. ' AND id = '.(int) $params->get('menu_item')
		. ' AND access <= '.(int) $user->get('aid')
		. ' ORDER BY name'
		;
		
		$db->setQuery($query, 0);
		return $db->loadObject();
	}
	function _children($id)
	{
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		
		$query = 'SELECT COUNT(id)'
		. ' FROM #__menu'
		. ' WHERE published = 1'
		. ' AND parent = '.(int) $id
		. ' AND access <= '.(int) $user->get('aid')
		;
		
		$db->setQuery($query, 0);
		return $db->loadResult();
	}
	function _menu($parent = 0, $type = 0)
	{
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		
		$where 	= $type ? ' INNER JOIN #__menu_types AS s ON s.id = '. intval($type) .' WHERE m.menutype = s.menutype AND' : ' WHERE';
		
		$query = 'SELECT m.id, m.name, m.link, m.type, m.alias'
		. ' FROM #__menu AS m'
		. $where
		. ' m.published = 1'
		. ' AND m.parent = '.(int) $parent
		. ' AND m.access <= '.(int) $user->get('aid')
		. ' ORDER BY m.name'
		;
		
		$db->setQuery($query, 0);
		return $db->loadObjectList();
	}
}