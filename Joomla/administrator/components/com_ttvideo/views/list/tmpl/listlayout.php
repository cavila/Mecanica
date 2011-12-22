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
</script>
<form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">
  <table class="adminlist">
  <thead>
    <tr>
      <th width="10"><?php echo JHTML::_('grid.sort',  'ID', 'id', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th width="10"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>)" /></th>
      <th width="100"><?php echo JHTML::_('grid.sort',  'Video ID', 'video_id', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th width="100"><?php echo JHTML::_('grid.sort',  'Site', 'site', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th width="50"><?php echo JHTML::_('grid.sort',  'Title', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th width="100"><?php echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th width="100"><?php echo JHTML::_('grid.sort',  'Category', 'cat_title', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th>Short Description</th>
      <th width="250">Thumbnail URL</th>
      <th width="50"><?php echo JHTML::_('grid.sort',  'Published', 'published', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th width="120"><?php echo JHTML::_('grid.sort',  'Created', 'c_date', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
      <th width="30">Plays</th>
      <th width="30">Likes</th>
    </tr>               
  </thead>
  <tfoot>
  <tr>
    <td colspan="13">
      <?php echo $this->pagination->getListFooter(); ?>
    </td>
  </tr>
  </tfoot>
  <tbody>
    <?php
    $k = 0;
    $i = 0;
    foreach ($this->videos as $row) {
      $checked = JHTML::_('grid.id', $i, $row->id);
      $published = JHTML::_('grid.published', $row, $i);
      $link = JRoute::_( 'index.php?option='.JRequest::getVar('option').'&task=edit&cid[]='. $row->id.'&hidemainmenu=1' ); ?>
      <tr class="<?php echo "row$k";?>">
        <td><?php echo $row->id;?></td>
        <td><?php echo $checked; ?></td>
        <td><a href="<?php echo $link;?>"><?php echo $row->video_id;?></a></td>
        <td><?php echo $row->site;?></td>
        <td><?php echo $row->title;?></td>
        <td><?php echo $row->author;?></td>
        <td><?php echo $row->cat_title;?></td>
        <td><?php echo $row->description;?></td>
        <td><?php echo $row->thumbnail;?></td>
        <td align="center"><?php echo $published;?></td>
        <td><?php echo $row->c_date;?></td>
        <td><?php echo $row->plays;?></td>
        <td><?php echo $row->likes;?></td>
      </tr>
    <?php
      $k = 1 - $k;
      $i++;
    }
    ?>
  </tbody>
  </table>

  <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
  <input type="hidden" name="task" value=""/>
  <input type="hidden" name="boxchecked" value="0"/>    
  <input type="hidden" name="hidemainmenu" value="0"/> 
  <input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
  <input type="hidden" name="filter_order_Dir" value="<?php echo $lists['order_Dir']; ?>" />
  <input type="hidden" name="viewcache" value="0" />
  <?php echo JHTML::_( 'form.token' ); ?>
</form>
<iframe src="http://www.toughtomato.com/software/ttvideo/" width="100%" height="100" frameBorder="0"></iframe>