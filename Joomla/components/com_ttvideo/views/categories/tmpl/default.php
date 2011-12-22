<?php 
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

defined('_JEXEC') or die('Restricted access'); 

if (sizeof($this->categories) > 0){
?>
  <table cellspacing="0" cellpadding="0" border="0" style="width:<?php echo $this->settings->table_width; ?>">
    <thead>
      <tr style="text-align:left; background-color:<?php echo $this->settings->ttvideo_header_colour; ?>;">
        <th style="padding:10px; color:<?php echo $this->settings->ttvideo_table_header_font_colour; ?>;"><b>Video Categories</b></th>
        <th style="padding:10px; color:<?php echo $this->settings->ttvideo_table_header_font_colour; ?>;"><b>Videos</b></th>
      </tr>               
    </thead>
    <tbody>
    <?php
    $k = 0;
    $rowArr = array($this->settings->alt_colour_1, $this->settings->alt_colour_2);
    foreach ($this->categories as $row){ 
      $catname = strtolower(str_replace(' ', '-', $row->title));
      $link = JRoute::_( 'index.php?option=com_ttvideo&amp;view=videolist&amp;id='.$row->id.':'.$catname.'&amp;Itemid='.JRequest::getVar( 'Itemid' ) );
    ?>
      <tr style="text-align:left; background-color:<?php echo $rowArr[$k]; ?>;">
        <td style="padding:10px; color:<?php echo $this->settings->ttvideo_table_font_colour; ?>;">
          <?php echo "<a href='$link'>".$row->title."</a>"; ?>
        </td>
        <td style="padding:10px; color:<?php echo $this->settings->ttvideo_table_font_colour; ?>;">
          <?php echo $row->num_videos; ?>
        </td>
      </tr>
    <?php
    $k = 1 - $k;
    }
    ?>
    </tbody>
  </table>
<?php
} else {
  echo 'No categories found...';
}
?> 