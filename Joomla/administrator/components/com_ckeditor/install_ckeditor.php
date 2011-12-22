<?php
/*
Copyright (c) 2003 - 2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
defined('_JEXEC') or die ('Restricted access');
function com_install(){
	jimport('joomla.filesystem.folder');
	jimport('joomla.filesystem.file');
	jimport('joomla.installer.installer');
	$installer = & JInstaller::getInstance();

	$source  = $installer->getPath('source');
	$packages   = $source.DS.'packages';
	// Get editor package
	if(is_dir($packages)) {
		$editor   = JFolder::files($packages, 'plg_ckeditor.zip', false, true);
	}
	if (! empty($editor)) {
		if (is_file($editor[0])) {
			$config = & JFactory::getConfig();
			$tmp = $config->getValue('config.tmp_path').DS.uniqid('install_').DS.basename($editor[0], '.zip');

			if (!JArchive::extract($editor[0], $tmp)) {
				$mainframe->enqueueMessage(JText::_('EDITOR EXTRACT ERROR'), 'error');
			}else{
				$installer = & JInstaller::getInstance();
				$c_manifest   = & $installer->getManifest();
				$c_root     = & $c_manifest->document;
				$version    = & $c_root->getElementByPath('version');
				if(JFolder::copy($tmp,dirname($installer->getPath('extension_site')).DS.'..'.DS.'plugins'.DS.'editors','',true))
				{
				//	JFolder::delete($installer->getPath('extension_site'));
					if (editorDBInstall())
					{
						$editor_result   = JText::_('Success');
					} else {
						$editor_result = JText::_('Error');
					}
				}else{
					$editor_result = JText::_('Error');
				}
			}
		}
	}
	if (is_dir($tmp)) {
		@JFolder::delete($tmp);
	}
	return $editor_result;
}

function editorDBInstall()
{
	// Get a database object
	$db =& JFactory::getDBO();
	// This must work, while only one element with this name must exist!!!
	$query = "SELECT `id`, `params` FROM #__plugins WHERE `element` = 'ckeditor';";
	$db->setQuery($query);
	$row = $db->loadObject();
	// if empty options, set defaults
	if (empty($row))
	{
		$query = "INSERT INTO #__plugins VALUES ( ".
				"NULL, 'Editor - CKEditor', 'ckeditor', 'editors', ".
				"0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ".
				"'language=en
toolbar_frontEnd=Basic
toolbar=Full
Basic_ToolBar=Bold, Italic, ;, NumberedList, BulletedList, ;, Link, Unlink
Advanced_ToolBar=Source,;,Save,NewPage,Preview,;,Templates,;,Cut,Copy,Paste,PasteText,PasteFromWord,;,Print,SpellChecker,Scayt,;,Undo,Redo,;,Find,Replace,;,SelectAll,RemoveFormat,;,/,Bold,Italic,Underline,Strike,;,Subscript,Superscript,;,NumberedList,BulletedList,;,Outdent,Indent,Blockquote,;,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,;,BidiLtr,BidiRtl,;,Link,Unlink,Anchor,;,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,/,Styles,;,Format,;,Font,;,FontSize,TextColor,BGColor,;,Maximize,ShowBlocks,;,ReadMore,;,About
skin=kama
enterMode=1
shiftEnterMode=2
style=
template=
css=
templateCss=0
ckfinder=1
skinfm=light
usergroup_access=25' );";
	} else {
		$query = "UPDATE #__plugins SET ".
				"`name` = 'Editor - CKEditor', ".
				"`element` = 'ckeditor', ".
				"`folder` = 'editors', ".
				"`access` = 0, ".
				"`published` = 1, ".
				"`iscore` = 0, ".
				"`client_id` = 0, ".
				"`params` = '".str_replace("'", '"', $row->params)."' WHERE `id` = ".$row->id.";";
	}
	$db->setQuery($query);
	return $db->query();
}
