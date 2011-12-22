<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPFacebookActivityFeed
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * ITPFacebookActivityFeed is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// no direct access
defined( "_JEXEC" ) or die;?>
<div id="itp-fbactivity<?php echo $params->get('moduleclass_sfx');?>">

<?php if(!$params->get("fbRendering",0)){ // iframe?>
<iframe 
src="http://www.facebook.com/plugins/activity.php?site=<?php echo $params->get("fbDomain");?>
&amp;locale=<?php echo $locale;?>
&amp;width=<?php echo $params->get("fbWidth");?>&amp;height=<?php echo $params->get("fbHeight");?>&amp;header=<?php echo $params->get("fbHeader");?>&amp;colorscheme=<?php echo $params->get("fbColour");?>
&amp;font<?php echo ($params->get("fbFont")) ? "=" . $params->get("fbFont") : "";?>
&amp;border_color<?php echo ($params->get("fbBorderColour")) ? "=" . $params->get("fbBorderColour") : "";?>
&amp;recommendations=<?php echo $params->get("fbRecommendation");?>
<?php if($params->get("fbRef")) { echo '&amp;fb_ref=' . $referal;}?>" 
scrolling="no" 
frameborder="0" 
style="border:none; overflow:hidden; width:<?php echo $params->get("fbWidth");?>px; height:<?php echo $params->get("fbHeight");?>px;" 
allowTransparency="true"></iframe>

<?php } else { // XFBML ?>
<?php if($params->get("fbLoadJsLib", 1)) {?>
<script src="http://connect.facebook.net/<?php echo $locale;?>/all.js#xfbml=1"></script>
<?php }?>
<fb:activity 
site="<?php echo $params->get("fbDomain");?>" 
width="<?php echo $params->get("fbWidth");?>" 
height="<?php echo $params->get("fbHeight");?>" 
colorscheme="<?php echo $params->get("fbColour");?>"  
header="<?php echo $params->get("fbHeader");?>" 
font="<?php echo $params->get("fbFont");?>" 
border_color="<?php echo $params->get("fbBorderColour");?>" 
recommendations="<?php echo $params->get("fbRecommendation");?>" 
<?php if($params->get("fbRef")) { echo 'ref="' . $referal . '"';}?>></fb:activity>
<?php }?>
</div>
