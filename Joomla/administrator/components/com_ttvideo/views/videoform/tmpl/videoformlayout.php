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
  <fieldset class="adminform">
    <legend>Video Details</legend>
    <table>
      <tr>
        <td valign="top">
          <table class="admintable">
            <tr>
              <td class="key">Video ID</td>
              <td>
                <input type="text" name="video_id" id="video_id" size="32" maxlength="100" value="<?php echo $this->video->video_id; ?>" />
              </td>
            </tr>
            <tr>
              <td class="key">Site</td>
              <td>
                <?php
                
                $sites = array('' => 'Please select...', 'vimeo' => 'Vimeo', 'youtube' => 'YouTube');
                $options = array();
                foreach($sites as $key=>$value) $options[] = JHTML::_('select.option', $key, $value);
                echo JHTML::_('select.genericlist', $options, 'site', '', 'value', 'text', $this->video->site);
                
                ?>
              </td>
            </tr>
            <tr>
              <td class="key">Published</td>
              <td>
                <input type="radio" name="published" id="published" value="1" <?php if($this->video->published == '1') echo 'checked="checked"'; ?> /> Yes
                <input type="radio" name="published" id="published" value="0" <?php if($this->video->published == '0') echo 'checked="checked"'; ?> /> No
              </td>
            </tr>
            <tr>
              <td class="key">Title</td>
              <td>
                <input type="text" name="title" id="title" size="32" maxlength="50" value="<?php echo $this->video->title; ?>" />
              </td>
            </tr>
            <tr>
              <td class="key">Author</td>
              <td>
                <input type="text" name="author" id="author" size="32" maxlength="50" value="<?php echo $this->video->author; ?>" />
              </td>
            </tr>
            <tr>
            <tr>
              <td class="key">Category</td>
              <td>
                <?php echo JHTML::_('list.category',  'catid', 'com_ttvideo', intval( $this->video->catid ) ); ?>
              </td>
            </tr>
            <tr>
              <td class="key">Short Description</td>
              <td>
                <textarea rows="2" cols="40" name="description" id="description" ><?php echo $this->video->description; ?></textarea>
              </td>
            </tr>
            <tr>
              <td class="key">Full Description</td>
              <td>
                <textarea rows="6" cols="60" name="full_description" id="full_description" ><?php echo $this->video->full_description; ?></textarea>
              </td>
            </tr>
          </table>
        </td>
        <td valign="top">
          <table class="admintable">
            <tr>
              <td class="key">Allow Custom Video Settings</td>
              <td>
                <input type="checkbox" name="custom_settings" id="custom_settings" onclick="toggleDisable(this)" value="1" <?php if ($this->video->custom_settings) echo 'checked="checked"'; ?> />
              </td>
            </tr>
            <?php
            if ($this->video->video_id != '') {
            ?>
            <tr>
              <td class="key">Thumbnail URL</td>
              <td>
                <input type="text" name="thumbnail" id="thumbnail" size="60" maxlength="255" value="<?php echo $this->video->thumbnail; ?>" <?php if (!$this->video->custom_settings) echo 'disabled="disabled"'; ?> /><br />
                <small>You can define local images to be used for video thumbnails<br />
                e.g. /images/stories/videos/thumb1.jpg ensure your thumbnail images are WxH = 100x75.<br />
                Only change this if TTVideo fails to locate the thumbnail url.</small>
              </td>
            </tr>
            <?php
            }
            ?>
            <tr>
              <td class="key">Video Dimensions<br /><small>W x H</small></td>
              <td>
                <input type="text" name="width" id="width" size="3" maxlength="4" value="<?php echo $this->video->width; ?>" <?php if (!$this->video->custom_settings) echo 'disabled="disabled"'; ?> /><small>px</small> X 
                <input type="text" name="height" id="height" size="3" maxlength="4" value="<?php echo $this->video->height; ?>" <?php if (!$this->video->custom_settings) echo 'disabled="disabled"'; ?> /><small>px</small><br />
                <small>Please note that video dimensions are NOT sourced for YouTube videos as these are unavailable.<br />
                The default dimensions (600x300) will apply if you do not change them.</small>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </fieldset>
  <input type="hidden" name="id" value="<?php echo $this->video->id; ?>"/>     
  <input type="hidden" name="c_date" value="<?php echo $this->video->c_date; ?>"/>
  <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
  <input type="hidden" name="task" value=""/>    
  <?php echo JHTML::_( 'form.token' ); ?>
</form>
<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton) {
  var form = document.adminForm;
  if (pressbutton == 'cancel') {
    submitform( pressbutton );
    return;
  }
  // do field validation
  if (form.video_id.value == "") {
    alert( "<?php echo JText::_( 'Please specify a video id.', true ); ?>" );
  } else if (form.title.value == "") {
    alert( "<?php echo JText::_( 'Please specify a video title.', true ); ?>" );
  } else if (form.author.value == "") {
    alert( "<?php echo JText::_( 'Please specify the author of the video.', true ); ?>" );
  } else if (form.catid.value == "0") {
    alert( "<?php echo JText::_( 'Please select a category.', true ); ?>" );
  } else {
    submitform( pressbutton );
  }
}

function toggleDisable(checkbox) {
  if (checkbox.checked == true) {
    document.getElementById('width').disabled = false;
    document.getElementById('height').disabled = false;
    document.getElementById('thumbnail').disabled = false;
  } else {
    document.getElementById('width').disabled = true;
    document.getElementById('height').disabled = true;
    document.getElementById('thumbnail').disabled = true;
  }
}
-->
</script>