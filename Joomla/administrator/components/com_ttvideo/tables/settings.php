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

class TableSettings extends JTable {

  var $id = null;
  var $table_width = null;
  var $show_search = null;
  var $show_category_dropdown = null;
  var $show_category = null;
  var $show_plays = null;
  var $show_likes = null;
  var $show_author = null;
  var $show_date = null;
  var $show_rating = null;
  var $ttvideo_header_colour = null;
  var $alt_colour_1 = null;
  var $alt_colour_2 = null;
  var $ttvideo_table_header_font_colour = null;
  var $ttvideo_table_font_colour = null;
  var $vimeo_font_colour = null;
  var $youtube_colour_1 = null;
  var $youtube_colour_2 = null;
  var $video_alignment = null;
  var $default_sort_column = null;
  var $sorting_order = null;
  var $default_display_num = null;

  function TableSettings(&$db) {
    parent::__construct('#__ttvideo_settings', 'id', $db);
  }
}

?>