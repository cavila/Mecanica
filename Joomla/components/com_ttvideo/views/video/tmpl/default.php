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


// lets define the script we need for the rating system if it is activated
if ($this->settings->show_rating) {
  JHTML::_('behavior.mootools');
  JHTML::script( 'jquery.min.js', 'components' . DS . 'com_ttvideo' . DS . 'lib' . DS . 'js' . DS );
  JHTML::script( 'noconflict.js', 'components' . DS . 'com_ttvideo' . DS . 'lib' . DS . 'js' . DS ); // this script must always come after the include of jquery!!!!!
  JHTML::script( 'jquery-ui.custom.min.js', 'components' . DS . 'com_ttvideo' . DS . 'lib' . DS . 'js' . DS );
  JHTML::script( 'jquery.ui.stars.min.js', 'components' . DS . 'com_ttvideo' . DS . 'lib' . DS . 'js' . DS );
  JHTML::stylesheet('jquery.crystal.stars.css', 'components' . DS . 'com_ttvideo' . DS . 'lib' . DS . 'css' . DS );
  // get a token for the post request for the ajax request to vote
  $token = JUtility::getToken();
  // add ajax into head of the document
  JFactory::getDocument()->addScriptDeclaration('
  jQuery(function(){
    jQuery("#rat").children().not(":radio").hide();
    
    // Create starsJQuery(
    jQuery("#rat").stars({
      cancelShow: false,
      callback: function(ui, type, value)
      {
        // Hide Stars while AJAX connection is active
        jQuery("#rat").hide();
        jQuery("#vote_loader").show();
        // Send request to the server using POST method
        jQuery.post("index.php?option=com_ttvideo&view=savevote&format=raw", {rate: value, id: '.$this->video->id.', "'.$token.'": "1" }, function(rating)
        {
          // Select stars to match "Average" value
          ui.select(Math.round(rating.avg));
          
          // Update other text controls...
          jQuery("#avg_votes").text(rating.avg);
          jQuery("#votes").text(rating.votes);
          
          // show new msg
          jQuery("#vote_msg").html("Thank you for voting. You can change your vote if you wish.");
          
          // Show Stars
          jQuery("#vote_loader").hide();
          jQuery("#rat").show();
        }, "json");
      }
    });
  });
  ');
} // end of check for rating system active

$vimeo_font_colour = substr($this->settings->vimeo_font_colour, 1); // remove the # from the front of the colour
$youtube_colour_1 = substr($this->settings->youtube_colour_1, 1);
$youtube_colour_2 = substr($this->settings->youtube_colour_2, 1);

$video_align = $this->settings->video_alignment;
if ($video_align == 'center')  $div = '<div style="width:100%;text-align:center;">';
elseif ($video_align == 'left') $div = '<div style="width:100%;text-align:left;">';
else $div = '<div style="width:100%;text-align:right;">';

?>
<a href="javascript:history.go(-1);">Back to videos</a>
<h1><?php echo $this->video->title; ?></h1>
<?php 
if ($this->settings->show_date) echo '<p>Uploaded on '.date("d-m-Y", strtotime($this->video->c_date));
if ($this->video->author != '' && $this->settings->show_author) echo ' by '.$this->video->author;
echo '</p>';
echo $div;

if ($this->video->site == 'vimeo') { ?>
    <object width="<?php echo $this->video->width; ?>" height="<?php echo $this->video->height; ?>">
      <param name="allowfullscreen" value="true" />
      <param name="allowscriptaccess" value="always" />
      <param name="wmode" value="transparent" /> 
      <param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $this->video->video_id; ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=<?php echo $vimeo_font_colour; ?>&amp;fullscreen=1" />
      <embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $this->video->video_id; ?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=<?php echo $vimeo_font_colour; ?>&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="<?php echo $this->video->width; ?>" height="<?php echo $this->video->height; ?>" wmode="transparent"></embed>
    </object>
<?php } elseif ($this->video->site == 'youtube') { ?>
    <object width="<?php echo $this->video->width; ?>" height="<?php echo $this->video->height; ?>">
      <param name="movie" value="http://www.youtube.com/v/<?php echo $this->video->video_id; ?>?fs=1&amp;hl=en_GB&amp;color1=0x<?php echo $youtube_colour_1; ?>&amp;color2=0x<?php echo $youtube_colour_2; ?>"></param>
      <param name="allowFullScreen" value="true"></param>
      <param name="allowscriptaccess" value="always"></param>
      <embed src="http://www.youtube.com/v/<?php echo $this->video->video_id; ?>?fs=1&amp;hl=en_GB&amp;color1=0x<?php echo $youtube_colour_1; ?>&amp;color2=0x<?php echo $youtube_colour_2; ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="<?php echo $this->video->width; ?>" height="<?php echo $this->video->height; ?>"></embed>
    </object>
<?php } ?>
</div>
<?php
if ($this->video->full_description != '') {
  echo '<br /><br />';
  echo '<h3>Description</h3>';
  echo '<p>'.$this->video->full_description.'</p>'; 
}
echo '<br />';
// adding jquery rating widget
if ($this->settings->show_rating) echo $this->vote;
?>