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
defined('_JEXEC') or die('Restricted access'); 
?>

<form action="index.php" method="POST" name="adminForm" id="adminForm">
  <input type="hidden" name="id" value="<?php echo $this->settings->id; ?>" />
  <fieldset class="adminform">
    <legend>General Settings</legend>
    <table class="admintable">
      <tr>
        <td class="key">Show Author</td>
        <td>
          <input type="radio" name="show_author" value="1" <?php if($this->settings->show_author == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_author" value="0" <?php if($this->settings->show_author == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
      <tr>
        <td class="key">Show Date</td>
        <td>
          <input type="radio" name="show_date" value="1" <?php if($this->settings->show_date == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_date" value="0" <?php if($this->settings->show_date == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
      <tr>
        <td class="key">Show Ratings</td>
        <td>
          <input type="radio" name="show_rating" value="1" <?php if($this->settings->show_rating == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_rating" value="0" <?php if($this->settings->show_rating == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
    </table>
  </fieldset>
  <fieldset class="adminform">
    <legend>Video List Settings</legend>
    <table class="admintable">
     <tr>
        <td class="key" style="width:200px;">List View Table Width</td>
        <td>
          <input type="text" name="table_width" id="table_width" size="5" maxlength="6" value="<?php echo $this->settings->table_width; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">Show Plays</td>
        <td>
          <input type="radio" name="show_plays" value="1" <?php if($this->settings->show_plays == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_plays" value="0" <?php if($this->settings->show_plays == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
      <tr>
        <td class="key">Show Likes</td>
        <td>
          <input type="radio" name="show_likes" value="1" <?php if($this->settings->show_likes == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_likes" value="0" <?php if($this->settings->show_likes == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
      <tr>
        <td class="key">Show Search Form</td>
        <td>
          <input type="radio" name="show_search" value="1" <?php if($this->settings->show_search == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_search" value="0" <?php if($this->settings->show_search == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
      <tr>
        <td class="key">Show Category Dropdown</td>
        <td>
          <input type="radio" name="show_category_dropdown" value="1" <?php if($this->settings->show_category_dropdown == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_category_dropdown" value="0" <?php if($this->settings->show_category_dropdown == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
      <tr>
        <td class="key">Show Category Name</td>
        <td>
          <input type="radio" name="show_category" value="1" <?php if($this->settings->show_category == '1') echo 'checked="checked"'; ?> /> Yes
          <input type="radio" name="show_category" value="0" <?php if($this->settings->show_category == '0') echo 'checked="checked"'; ?> /> No
        </td>
      </tr>
      <tr>
        <td class="key">List View Table Header Colour</td>
        <td>
          <input type="text" name="ttvideo_header_colour" id="ttvideo_header_colour" size="8" maxlength="7" value="<?php echo $this->settings->ttvideo_header_colour; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">First Row Alternate Colour</td>
        <td>
          <input type="text" name="alt_colour_1" id="alt_colour_1" size="8" maxlength="7" value="<?php echo $this->settings->alt_colour_1; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">Second Row Alternate Colour</td>
        <td>
          <input type="text" name="alt_colour_2" id="alt_colour_2" size="8" maxlength="7" value="<?php echo $this->settings->alt_colour_2; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">List View Table Header Font Colour</td>
        <td>
          <input type="text" name="ttvideo_table_header_font_colour" id="ttvideo_table_header_font_colour" size="8" maxlength="7" value="<?php echo $this->settings->ttvideo_table_header_font_colour; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">List View Table Font Colour</td>
        <td>
          <input type="text" name="ttvideo_table_font_colour" id="ttvideo_table_font_colour" size="8" maxlength="7" value="<?php echo $this->settings->ttvideo_table_font_colour; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">Default Column to Sort</td>
        <td>
          <?php
          
          $arr = array('title' => 'Title', 'votes' => 'Rating', 'c_date' => 'Date', 'plays' => 'Plays', 'likes' => 'Likes', 'author' => 'Author');
          $options = array();
          foreach($arr as $key=>$value) $options[] = JHTML::_('select.option', $key, $value);
          echo JHTML::_('select.genericlist', $options, 'default_sort_column', '', 'value', 'text', $this->settings->default_sort_column);
          
          ?>
        </td>
      </tr>
      <tr>
        <td class="key">Sort Order</td>
        <td>
          <input type="radio" name="sorting_order" value="ASC" <?php if($this->settings->sorting_order == 'ASC') echo 'checked="checked"'; ?> /> Ascending
          <input type="radio" name="sorting_order" value="DESC" <?php if($this->settings->sorting_order == 'DESC') echo 'checked="checked"'; ?> /> Descending
        </td>
      </tr>
      <tr>
        <td class="key">Number of Items to Display in List</td>
        <td>
          <?php
          
          $arr = array('5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '50' => '50', '100' => '100', '0' => 'All');
          $options = array();
          foreach($arr as $key=>$value) $options[] = JHTML::_('select.option', $key, $value);
          echo JHTML::_('select.genericlist', $options, 'default_display_num', '', 'value', 'text', $this->settings->default_display_num);
          
          ?>
        </td>
      </tr>
    </table>
  </fieldset>
  <fieldset class="adminform">
    <legend>Video Settings</legend>
    <table class="admintable">
      <tr>
        <td class="key">Vimeo Font Colour</td>
        <td>
          <input type="text" name="vimeo_font_colour" id="vimeo_font_colour" size="8" maxlength="7" value="<?php echo $this->settings->vimeo_font_colour; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">YouTube Colour 1</td>
        <td>
          <input type="text" name="youtube_colour_1" id="youtube_colour_1" size="8" maxlength="7" value="<?php echo $this->settings->youtube_colour_1; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">YouTube Colour 2</td>
        <td>
          <input type="text" name="youtube_colour_2" id="youtube_colour_2" size="8" maxlength="7" value="<?php echo $this->settings->youtube_colour_2; ?>" />
        </td>
      </tr>
      <tr>
        <td class="key">Vido Alignment</td>
        <td>
          <?php
          
          $arr = array('left' => 'Left', 'center' => 'Center', 'right' => 'Right');
          $options = array();
          foreach($arr as $key=>$value) $options[] = JHTML::_('select.option', $key, $value);
          echo JHTML::_('select.genericlist', $options, 'video_alignment', '', 'value', 'text', $this->settings->video_alignment);
          
          ?>
        </td>
      </tr>
    </table>
  </fieldset>
  <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
  <input type="hidden" name="task" value=""/>    
  <?php echo JHTML::_( 'form.token' ); ?>
</form>