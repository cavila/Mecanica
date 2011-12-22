<?php
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

function TTVideoBuildRoute(&$query)
{
	static $items;

	$segments	= array();
	$itemid		= null;

	// Break up the video id into numeric and alias values.
	if (isset($query['id']) && strpos($query['id'], ':')) {
		list($query['id'], $query['alias']) = explode(':', $query['id'], 2);
	}

	// Break up the videolist id into numeric and alias values.
	if (isset($query['cid']) && strpos($query['cid'], ':')) {
		list($query['cid'], $query['catalias']) = explode(':', $query['cid'], 2);
	}

	// Get the menu items for this component.
	if (!$items) {
		$component	= &JComponentHelper::getComponent('com_ttvideo');
		$menu		= &JSite::getMenu();
		$items		= $menu->getItems('componentid', $component->id);
	}

	// Search for an appropriate menu item.
	if (is_array($items))
	{
		// If only the option and itemid are specified in the query, return that item.
		if (!isset($query['view']) && !isset($query['id']) && !isset($query['cid']) && isset($query['Itemid'])) {
			$itemid = (int) $query['Itemid'];
		}

		// Search for a specific link based on the critera given.
		if (!$itemid) {
			foreach ($items as $item)
			{
				// Check if this menu item links to this view.
				if (isset($item->query['view']) && $item->query['view'] == 'video'
					&& isset($query['view']) && $query['view'] != 'videolist'
					&& isset($item->query['id']) && isset($query['id']) && $item->query['id'] == $query['id'])
				{
					$itemid	= $item->id;
				}
				elseif (isset($item->query['view']) && $item->query['view'] == 'videolist'
						&& isset($query['view']) && $query['view'] != 'video'
						&& isset($item->query['cid']) && $item->query['cid'] == $query['cid'])
				{
					$itemid	= $item->id;
				}
			}
		}

		// If no specific link has been found, search for a general one.
		if (!$itemid) {
			foreach ($items as $item)
			{
				//var_dump($item->query);
				if (isset($query['view']) && $query['view'] == 'video'
					&& isset($item->query['view']) && $item->query['view'] == 'videolist'
					&& isset($item->query['id']) && isset($query['cid'])
					&& $query['cid'] == $item->query['id'])
				{
					// This menu item links to the video view but we need to append the video id to it.
					$itemid		= $item->id;
					$segments[]	= isset($query['catalias']) ? $query['cid'].':'.$query['catalias'] : $query['cid'];
					$segments[]	= isset($query['alias']) ? $query['id'].':'.$query['alias'] : $query['id'];
					break;
				}
				elseif (isset($query['view']) && $query['view'] == 'videolist'
					&& isset($item->query['view']) && $item->query['view'] == 'videolist'
					&& isset($item->query['id']) && isset($query['id']) && $item->query['id'] != $query['id'])
				{
					// This menu item links to the videolist view but we need to append the videolist id to it.
					$itemid		= $item->id;
					$segments[]	= isset($query['alias']) ? $query['id'].':'.$query['alias'] : $query['id'];
					break;
				}

			}
		}

		// Search for an even more general link.
		if (!$itemid)
		{
			foreach ($items as $item)
			{
				if (isset($query['view']) && $query['view'] == 'video' && isset($item->query['view'])
					&& $item->query['view'] == 'categories' && isset($query['cid']) && isset($query['id']))
				{
					// This menu item links to the categories view but we need to append the videolist and video id to it.
					$itemid		= $item->id;
					$segments[]	= isset($query['catalias']) ? $query['cid'].':'.$query['catalias'] : $query['cid'];
					$segments[]	= isset($query['alias']) ? $query['id'].':'.$query['alias'] : $query['id'];
					break;
				}
				elseif (isset($query['view']) && $query['view'] == 'videolist' && isset($item->query['view'])
					&& $item->query['view'] == 'categories' && !isset($query['cid']))
				{
					// This menu item links to the categories view but we need to append the videolist id to it.
					$itemid		= $item->id;
					$segments[]	= isset($query['alias']) ? $query['id'].':'.$query['alias'] : $query['id'];
					break;
				}
			}
		}
	}

	// Check if the router found an appropriate itemid.
	if (!$itemid)
	{
		// Check if a id was specified.
		if (isset($query['id']))
		{
			if (isset($query['alias'])) {
				$query['id'] .= ':'.$query['alias'];
			}

			// Push the id onto the stack.
			$segments[] = $query['id'];
			unset($query['view']);
			unset($query['id']);
			unset($query['alias']);
		}
		elseif (isset($query['cid']))
		{
			if (isset($query['alias'])) {
				$query['cid'] .= ':'.$query['catalias'];
			}

			// Push the cid onto the stack.
			$segments[]	= 'videolist';
			$segments[] = $query['cid'];
			unset($query['view']);
			unset($query['cid']);
			unset($query['catalias']);
			unset($query['alias']);
		}
		else
		{
			// Categories view.
			unset($query['view']);
		}
	}
	else
	{
		$query['Itemid'] = $itemid;

		// Remove the unnecessary URL segments.
		unset($query['view']);
		unset($query['id']);
		unset($query['alias']);
		unset($query['cid']);
		unset($query['catalias']);
	}

	return $segments;
}

function TTVideoParseRoute($segments)
{
	$vars	= array();

	// Get the active menu item.
	$menu	= &JSite::getMenu();
	$item	= &$menu->getActive();

	// Check if we have a valid menu item.
	if (is_object($item))
	{
		// Proceed through the possible variations trying to match the most specific one.
		if (isset($item->query['view']) && $item->query['view'] == 'video' && isset($segments[0]))
		{
			// Contact view.
			$vars['view']	= 'video';
			$vars['id']		= $segments[0];
		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'videolist' && count($segments) == 2)
		{
			// Video view.
			$vars['view']	= 'video';
			$vars['id']		= $segments[1];
			$vars['cid']	= $segments[0];
		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'videolist' && isset($segments[0]))
		{
			// Category view.
			$vars['view']	= 'videolist';
			$vars['id']		= $segments[0];
		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'categories' && count($segments) == 2)
		{
			// Video view.
			$vars['view']	= 'video';
			$vars['id']		= $segments[1];
			$vars['cid']	= $segments[0];
		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'categories' && isset($segments[0]))
		{
			// Category view.
			$vars['view']	= 'videolist';
			$vars['id']		= $segments[0];
		}
	}
	else
	{
		// Count route segments
		$count = count($segments);

		// Check if there are any route segments to handle.
		if ($count)
		{
			if (count($segments[0]) == 2)
			{
				// We are viewing a video.
				$vars['view']	= 'video';
				$vars['id']		= $segments[$count-2];
				$vars['cid']	= $segments[$count-1];

			}
			else
			{
				// We are viewing a videolist.
				$vars['view']	= 'videolist';
				$vars['cid']	= $segments[$count-1];
			}
		}
	}

	return $vars;
}
?>
