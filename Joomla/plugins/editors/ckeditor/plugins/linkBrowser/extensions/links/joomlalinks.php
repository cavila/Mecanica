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
defined( '_CKE_EXT' ) or die( 'Restricted access' );
// Core function
function joomlalinks()
{
	// Joomla! file and folder processing functions
	jimport('joomla.filesystem.folder');
	jimport('joomla.filesystem.file');

	// Base path for corelinks files
	$path = dirname(__FILE__) .DS. 'joomlalinks';

	// Get all files
	$files = JFolder::files($path, '\.(php)$');

	$items = array();

	// For linkBrowser link plugins
	if (isset($files)) {
		foreach ($files as $file) {
			$items[] = array(
				'name'		=> JFile::stripExt($file),
				'path' 		=> $path,
				'file' 		=> $file
			);
		}
	}
	return $items;
}