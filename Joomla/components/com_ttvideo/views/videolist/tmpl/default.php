<?php 
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

defined('_JEXEC') or die('Restricted access'); ?>

<script language="javascript" type="text/javascript">
function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}

function searchFunction() {
	var form = document.adminForm;
  form.action = "index.php?option=com_ttvideo&task=videolist&Itemid=<?php echo JRequest::getVar( 'Itemid' ); ?>";
	document.adminForm.submit();
}
</script>
<h1>Videos <?php if (isset($this->videos[0]->cat_title) && $this->settings->show_category) echo '[ '.$this->videos[0]->cat_title.' ]'; ?></h1>
<?php
if (sizeof($this->videos) > 0){
?>
  <form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">
    <?php
      echo JText::_('Display Num') .'&nbsp;';
      echo $this->pagination->getLimitBox();
    ?>
    <br /><br />
    <?php 
    if ($this->settings->show_search) {
    ?>
      <div style="float:left;">
        Search&nbsp;&nbsp;<input type="text" name="search_value" size="36" value="<?php echo $this->lists['search_value']; ?>" /><br />
        Where&nbsp;&nbsp;
        <select name="search_fields">
          <option value="title" <?php if ($this->lists['search_fields'] == 'title') echo 'SELECTED'; ?>>Title</option>
          <option value="title,description" <?php if ($this->lists['search_fields'] == 'title,description') echo 'SELECTED'; ?>>Title and short description</option>
          <option value="title,description,full_description" <?php if ($this->lists['search_fields'] == 'title,description,full_description') echo 'SELECTED'; ?>>Title and all descriptions</option>
        </select>
        <input type="button" name="search" value="Search" onclick="searchFunction();">
      </div>
    <?php
    }
    if ($this->settings->show_category_dropdown) {
    ?>
      <div style="float:right;">
        <?php echo JHTML::_('list.category',  'id', 'com_ttvideo', '', 'onchange="document.adminForm.submit();"' ); ?>
      </div>
    <?php
    }
    ?>
    <table cellspacing="0" cellpadding="0" border="0" style="width:<?php echo $this->settings->table_width; ?>">
      <thead>
        <tr style="text-align:left; background-color:<?php echo $this->settings->ttvideo_header_colour; ?>;">
          <th style="padding:10px; width:120px; color:<?php echo $this->settings->ttvideo_table_header_font_colour; ?>;">Screenshot</th>
          <?php if ($this->settings->show_rating) {
            echo '<th style="padding:10px; width:100px; color:'.$this->settings->ttvideo_table_header_font_colour.';">';
            echo JHTML::_('grid.sort',  'Rating ', 'votes', $this->lists['order_Dir'], $this->lists['order'] );
            echo '</th>'; 
          } ?>
          <th style="padding:10px; color:<?php echo $this->settings->ttvideo_table_header_font_colour; ?>;">
            <?php echo JHTML::_('grid.sort',  'Title ', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
          </th>
          <?php if ($this->settings->show_date) { ?>
            <th style="padding:10px; width:70px; color:<?php echo $this->settings->ttvideo_table_header_font_colour; ?>;">
              <?php echo JHTML::_('grid.sort',  'Added on ', 'c_date', $this->lists['order_Dir'], $this->lists['order'] ); ?>
            </th>
          <?php 
          }
          if ($this->settings->show_plays || $this->settings->show_likes) {
            echo '<th style="padding:10px; width:100px; color:'.$this->settings->ttvideo_table_header_font_colour.';">';
            if ($this->settings->show_plays) echo JHTML::_('grid.sort',  'Plays ', 'plays', $this->lists['order_Dir'], $this->lists['order'] );
            if ($this->settings->show_plays && $this->settings->show_likes) echo ' | ';
            if ($this->settings->show_likes) echo JHTML::_('grid.sort',  'Likes ', 'likes', $this->lists['order_Dir'], $this->lists['order'] );
            echo '</th>'; 
          }
          ?>
        </tr>               
      </thead>
      <tbody>
      <?php
      $k = 0;
      $rowArr = array($this->settings->alt_colour_1, $this->settings->alt_colour_2);
      foreach ($this->videos as $row){ 
        $vidname = strtolower(str_replace(' ', '-', $row->title));
        $cattitle = strtolower(str_replace(' ', '-', $row->cat_title));
        if ($cattitle != '') ':'.$cattitle;
        $link = JRoute::_('index.php?option=com_ttvideo&amp;view=video&amp;cid='.$row->catid.$cattitle.'&amp;id='.$row->id.':'.$vidname.'&amp;Itemid='.JRequest::getint( 'Itemid' ) );
        if ($row->thumbnail == '') $thumbnail_img = 'components/com_ttvideo/images/no-image-icon.jpg';
        else $thumbnail_img = $row->thumbnail;
      ?>
        <tr style="text-align:left; background-color:<?php echo $rowArr[$k]; ?>;">
          <td style="padding:10px; color:<?php echo $this->settings->ttvideo_table_font_colour; ?>;">
            <?php echo "<a href='$link'><img src='$thumbnail_img' alt='$row->title' title='$row->title' width='100' height='75' /></a>"; ?>
          </td>
          <?php 
          if ($this->settings->show_rating) {
            if (!isset($row->votes)) $row->votes = 0;
            if ($row->votes != 0) {
              $avg = $row->sum / $row->votes;
              $div_width = 16 * $avg; //each star is 16px wide therefore if avg rating = 3 then we show 3 star
              echo "<td style='padding:10px; color:".$this->settings->ttvideo_table_font_colour.";'>"; ?>
                      <div class="outer">
                        <div class="inner" style="position: absolute;">
                          <img src="components/com_ttvideo/images/blank-stars.png" alt="rating" width="80px" height="15px" />
                        </div>
                        <div class="inner" style="position: absolute; background: url('components/com_ttvideo/images/stars.png') ; width: <?php echo $div_width; ?>px; height:15px;"></div>
                      </div>
                    </td>
            <?php 
            } else { // there are no votes - display blank stars
              echo "<td style='padding:10px; color:".$this->settings->ttvideo_table_font_colour.";'>";
              echo  '<img src="components/com_ttvideo/images/blank-stars.png" alt="rating" width="80px" height="15px" />';
              echo '</td>';
            }
          }
          ?>
          <td style="padding:10px; color:<?php echo $this->settings->ttvideo_table_font_colour; ?>;"><?php echo "<a href='$link'><b>$row->title</b></a>"; ?><br />
              <?php
              if ($this->settings->show_date) echo 'Added on '.date("d M Y", strtotime($row->c_date));
              if ($row->author != '' && $this->settings->show_author) echo ' by '.$row->author;
              if ($row->description != '') echo '<br />'.$row->description;
              ?>
          </td>
          <?php if ($this->settings->show_date) { ?>
            <td style="padding:10px; color:<?php echo $this->settings->ttvideo_table_font_colour; ?>;"><?php echo date("d-m-Y", strtotime($row->c_date)); ?></td>
          <?php 
          }
          if ($this->settings->show_plays || $this->settings->show_likes) {
            echo "<td style='padding:10px; color:".$this->settings->ttvideo_table_font_colour.";'>";
            if ($this->settings->show_plays) echo $row->plays; 
            if ($this->settings->show_plays && $this->settings->show_likes) echo ' | ';
            if ($this->settings->show_likes) echo $row->likes;
            echo '</td>'; 
          }
          ?>
        </tr>
      <?php
      $k = 1 - $k;
      }
      ?>
      </tbody>
    </table>
    <input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
    <input type="hidden" name="filter_order_Dir" value="" />
    <input type="hidden" name="viewcache" value="0" />
  </form>
  <br />
  <p style="text-align:center;">
  <?php echo $this->pagination->getPagesLinks(); ?>
  <?php echo $this->pagination->getPagesCounter(); ?>
  </p>
<?php
} else {
  echo 'No videos found...';
}
?> 