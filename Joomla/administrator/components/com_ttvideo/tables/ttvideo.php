<?php
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

defined('_JEXEC') or die('Restricted Access');

class TableTTVideo extends JTable {

  var $id = null;
  var $video_id = null;
  var $site = null;
  var $thumbnail = null;
  var $thumbnail_med = null;
  var $thumbnail_lrg = null;
  var $width = null;
  var $height = null;
  var $custom_settings = null;
  var $title = null;
  var $author = null;
  var $description = null;
  var $full_description = null;
  var $c_date = null;
  var $catid = null;
  var $published = null;
  var $plays = null;
  var $likes = null;

  function TableTTVideo(&$db) {
    parent::__construct('#__ttvideo', 'id', $db);
  }
}
?>