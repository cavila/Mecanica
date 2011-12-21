<?php
/**
* swmenufree v4.5
* http://swonline.biz
* Copyright 2006 Sean White
**/

// ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );

// Make sure the user is authorized to view this page
$user = & JFactory::getUser();
if (!$user->authorize( 'com_modules', 'manage' )) {
	$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}

jimport( 'joomla.application.component.controller' );


class HTML_swmenufree
{
	function editCSS($id,  &$content,$menu ) {
		global $mainframe;
	$absolute_path=JPATH_ROOT;
		$css_path =	$absolute_path . '/modules/mod_swmenufree/styles/menu.css';
	?>
	<script type="text/javascript" >
	<!--
	function doPreviewWindow() {
document.adminForm.no_html.value=1;
document.adminForm.target="win1";
document.adminForm.action="index2.php";
document.adminForm.task.value="preview";
 window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=600,height=500,directories=no,location=no');
 setTimeout('document.adminForm.submit()',200) ;
 setTimeout('document.adminForm.target="_self"',300);
 setTimeout('document.adminForm.action="index2.php"',300);
 setTimeout('document.adminForm.no_html.value=0',300);
  setTimeout('document.adminForm.task.value="manualsave"',300);


}
	
	-->
    </script>		
	<link rel="stylesheet" type="text/css" href="components/com_swmenufree/css/swmenufree.css" />
	<div class="swmenu_container" >
	<form action="index2.php" method="post" name="adminForm">
	<table  cellpadding="4" cellspacing="4" border="0" width="750">
      <tr>
        <td width="10%"><img src="components/com_swmenufree/images/swmenufree_logo.png" align="left" border="0"/></td>
        <td valign="bottom"><span class="swmenu_sectionname"><?php echo _SW_MANUAL_CSS_EDITOR; ?></span> </td>
        <td valign="top"><ul><li><a href="index2.php?option=com_swmenufree&amp;task=editDhtmlMenu" ><?php echo _SW_MANAGER_LINK; ?></a></li></ul></td>
     </tr>
    </table>
	<table cellpadding="0" cellspacing="0" border="0" width="750">
      <tr>
        <td colspan="3" align="left"><?php echo "<b>".$css_path." :</b>"; ?><b><?php echo is_writable($css_path) ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></b></td>
	  </tr>
    </table>
    <table class="swmenu_tabheading" cellpadding="0" cellspacing="0" border="0" width="750">
      <tr>
        <td align="left" width="80%"><?php echo _SW_MODULE_NAME; ?>: &nbsp; <?php echo $menu->name; ?> </td>
        <td align="right"><a href="javascript:void(0);" class="swmenu_button_save"  onClick="document.adminForm.submit();" onmouseover="return escape('<?php echo _SW_SAVE_TIP; ?>')" ><?php echo _SW_SAVE_BUTTON; ?></a></td>
        <td><a href="javascript:void(0);" class="swmenu_button_preview"  onClick="doPreviewWindow();" onmouseover="return escape('<?php echo _SW_PREVIEW_TIP; ?>')" ><?php echo _SW_PREVIEW_BUTTON; ?></a></td>
        <td><a href="index2.php?option=com_swmenufree&amp;task=showmodules"  class="swmenu_button_cancel" onmouseover="return escape('<?php echo _SW_CANCEL_TIP; ?>')"><?php echo _SW_CANCEL_BUTTON; ?></a></td>
      </tr>
   </table>
   <table width="750">
	 <tr>
	   <td><textarea style="width:100%;height:500px" cols="110" rows="25" name="filecontent" class="inputbox"><?php echo $content; ?></textarea></td>
	 </tr>
	</table>
<input type="hidden" name="no_html" id="no_html" value="0" />
<input type="hidden" name="preview" value="1" />
<input type="hidden" name="option" value="com_swmenufree" />
<input type="hidden" name="task" value="manualsave" />
<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="hidden" name="returntask" value="editCSS" />
</form>
</div>
<script language="JavaScript" type="text/javascript" src="components/com_swmenufree/js/wz_tooltip.js"></script>  
<?php
	}



	function footer()
	{
	?> 
	<br clear="all" />
    <table cellpadding="4" cellspacing="0" border="0" align="center" width="100%"> 
      <tr> 
        <td width="100%" align="center">
		<a href="http://www.swmenupro.com" target="_blank">	
		<img src="components/com_swmenufree/images/swmenufree_footer.png" alt="swmenupro.com" border="0"/>
		</a><br/> swMenuFree &copy;2007 by Sean White<br />
		 <a href="http://www.swmenupro.com" target="_blank">http://www.swmenupro.com</a>
		</td> 
        </tr> 
    </table> 
   
  <?php
	}

function upgradeForm( $row,$lists) {
	global $mainframe;
	$absolute_path=JPATH_ROOT;
?>
<script language="javascript" type="text/javascript">
function uploadUpgrade() {
		var form = document.filename;
			// do field validation
			if (form.userfile.value == ""){
				alert( "Not a valid updated swMenuFree file" );
			} else {
				form.task.value="uploadfile";
				form.submit();
			}
	}	


function submitform() {
		var form = document.filename;
			// do field validation
			if (form.userfile.value == ""){
				alert( "<?php echo _SW_UPLOAD_FILE_NOTICE; ?>" );
			} else {
				form.submit();
			}
	}
	
	function changeLanguage() {
		var form = document.filename;
			form.task.value="changelanguage";
				form.submit();
			
	}
</script>
<div class="swmenu_container" >
<link rel="stylesheet" href="components/com_swmenufree/css/swmenufree.css" type="text/css" />
<form enctype="multipart/form-data" action="index2.php" method="post" name="filename">
<table  cellpadding="4" cellspacing="4" border="0" width="750">
  <tr>
     <td width="10%"><img src="components/com_swmenufree/images/swmenufree_logo.png" align="left" border="0"/></td>
     <td valign="bottom"><span class="swmenu_sectionname"><?php echo _SW_UPGRADE_FACILITY; ?></span> </td>
     <td valign="top" ><ul><li><a href="index2.php?option=com_swmenufree&task=showmodules" ><?php echo _SW_MANAGER_LINK; ?></a></li></ul></td>
   </tr>
</table>
<div class="swmenu_tabheading">&nbsp;</div>

<table  cellpadding="0" cellspacing="0" border="0" width="750">
  <tr><td width="50%" valign="top">

<table width="100%"><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td colspan="2" class="swmenu_tabheading" ><?php echo _SW_UPGRADE_VERSIONS; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><?php echo _SW_COMPONENT_VERSION; ?>:</td><td> <?php echo $row->component_version;?></td>
  </tr><tr>
	<td><?php echo _SW_MODULE_VERSION; ?>: </td><td><?php echo $row->module_version;?></td>
  </tr>
</table>

</td></tr><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_SELECTED_LANGUAGE_HEADING; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><?php echo _SW_LANGUAGE_FILES; ?>:</td>
  </tr><tr>
	<td><?php echo $lists['langfiles'];?>
  <input class="button" type="button" onclick="changeLanguage();" value="<?php echo _SW_LANGUAGE_CHANGE_BUTTON; ?>" /></td>
  </td>
  </tr>
</table>

</td></tr>
<!--
<tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_UPLOAD_LANGUAGE_HEADING; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><input class="text_area" name="languagefile" type="file" size="50"/>
	<input class="button" type="button" onclick="uploadLanguage();" value="<?php echo _SW_LANGUAGE_UPLOAD_BUTTON; ?>" /></td>
  </tr>
</table>

</td></tr>
-->
<tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_UPLOAD_UPGRADE; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><input class="text_area" name="userfile" type="file" size="50"/>
	<input class="button" type="button" onclick="uploadUpgrade();" value="<?php echo _SW_UPLOAD_UPGRADE_BUTTON;?>" /></td>
  </tr>
</table>

</td></tr></table>

</td><td width="50%" valign="top">

<table width="100%" align="right"><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td class="swmenu_tabheading" ><?php echo _SW_MESSAGES;?></td></tr>  
<tr>
	<td><?php echo $row->message?$row->message:_SW_OK;?></td>
  </tr>
</table>

</td></tr><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_FILE_PERMISSIONS; ?></td></tr>  
<tr>
	<td>
	 <table align="center">
	  <tr>
		  <td>/media</td><td><?php echo is_writable($absolute_path."/media") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
		<td>/modules</td><td><?php echo is_writable($absolute_path."/modules") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
	    <td>/modules/mod_swmenufree</td><td><?php echo is_writable($absolute_path."/modules/mod_swmenufree") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
	    <td>/modules/mod_swmenufree/images</td><td><?php echo is_writable($absolute_path."/modules/mod_swmenufree/images") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
	    <td>/modules/mod_swmenufree/styles</td><td><?php echo is_writable($absolute_path."/modules/mod_swmenufree/styles") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
      </tr><tr>
        <td>/modules/mod_swmenufree/cache</td><td><?php echo is_writable($absolute_path."/modules/mod_swmenufree/cache") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
		<td>/components/com_swmenufree</td><td><?php echo is_writable($absolute_path."/components/com_swmenufree") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
		<td>/administrator/components/com_swmenufree</td><td><?php echo is_writable($absolute_path."/administrator/components/com_swmenufree") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?>
	  </td></tr>
	  <tr>
		<td>/administrator/components/com_swmenufree/language</td><td><?php echo is_writable($absolute_path."/administrator/components/com_swmenufree/language") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?>
	  </td></tr>
	</table>
	</td>
  </tr>
</table>
</td></tr></table>
</td></tr></table>
<br clear="all" />
<table cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><img alt="" src="components/com_swmenufree/images/started_top.png" width="750" height="47" border="0" hspace="0" vspace="0" /> </td>
      </tr>
    </table>

   <table align="center" cellspacing="0" cellpadding="0">
      <tr>
       <td align="center"><img alt="" src="components/com_swmenufree/images/comparison.png" border="0" hspace="0" vspace="0" /> </td>
    
        <td width="50%" align="left" valign="top">
        <img alt="" src="components/com_swmenufree/images/cd_cover.png" align="left" border="0" hspace="10" vspace="10" />
        <p style="font-size:14px;"><?php echo _SW_SWMENUPRO_INFO;?></p>
         <p><i>(1)</i> <?php echo _SW_SWMENUPRO_1;?></p>
         <p><i>(2)</i> <?php echo _SW_SWMENUPRO_2;?></p>
         <p><i>(3)</i> <?php echo _SW_SWMENUPRO_3;?></p>
         <p><i>(4)</i> <?php echo _SW_SWMENUPRO_4;?></p>
         <p><i>(5)</i> <?php echo _SW_SWMENUPRO_5;?></p>
         <table><tr><td width="200" align="center"><a href="http://www.swmenupro.com" class="swmenu_button_save" target="_blank" ><?php echo _SW_LEARNMORE; ?></a>
         </td><td width="200" align="center"><a href="http://www.swmenupro.com/index.php?option=com_content&task=view&id=24&Itemid=312" class="swmenu_button_export" target="_blank" ><?php echo _SW_BUYNOW; ?></a>
         </td></tr></table>
        </td>
         </tr>
    </table>   
  

<input type="hidden" name="task" value="uploadfile"/>
<input type="hidden" name="option" value="com_swmenufree"/>
</form>
</div>

		<?php
	}

function MenuConfig( $menustyle, $rows,$row2, $menutype, $mainpadding, $subpadding, $mainborder, $subborder, $mainborderover, $subborderover, $modulename,  $parent_id,$orders2, $lists,$orders3,$moduleclass_sfx)
{
	global $mainframe;
  $absolute_path=JPATH_ROOT;
  
  
?>
<script type="text/javascript" src="components/com_swmenufree/ImageManager/assets/dialog.js"></script>
<script type="text/javascript" src="components/com_swmenufree/ImageManager/IMEStandalone.js"></script>
<script type="text/javascript" src="components/com_swmenufree/js/swmenufree.js"></script>
<link rel="stylesheet" href="components/com_swmenufree/css/swmenufree.css" type="text/css" />
<script type="text/javascript" language="javascript" src="components/com_swmenufree/js/dhtml.js"></script>
<script type="text/javascript" language="javascript">
<!--
function submitbutton(pressbutton) {
	doMainBorder();
	dotransSubBorder();
	document.adminForm.target="_self";
	document.adminForm.action="index2.php";
	submitform( pressbutton );
}


function changeOrientation(){	
	menusystem=document.getElementById('menustyle').value;
	orientation=document.getElementById('orientation');
	sub_indicator=document.getElementById('sub_indicator_row');
	special_effects=document.getElementById('special_effects_row');
	show_shadow=document.getElementById('show_shadow_row');
	padding_hack=document.getElementById('padding_hack_row');
	auto_position=document.getElementById('auto_position_row');
	select_hack=document.getElementById('select_hack_row');
	max_levels=document.getElementById('max_levels_row');
	var IE = /*@cc_on!@*/false;
	if(menusystem=='transmenu'){
	orientation.options[0].text="horizontal/down/right";	
	orientation.options[0].value="horizontal/down";	
	orientation.options[1].text="vertical/right";	
	orientation.options[1].value="vertical/right";	
	orientation.options[2]= new Option("horizontal/up","horizontal/up");	
	orientation.options[3]= new Option("vertical/left","vertical/left");	
	orientation.options[4]= new Option("horizontal/down/left","horizontal/left");
	if(IE){
	special_effects.style.display="none";
	sub_indicator.style.display="block";
	show_shadow.style.display="block";
	auto_position.style.display="block";
	padding_hack.style.display="block";
	select_hack.style.display="block";	
	}else{
	special_effects.style.display="none";
	sub_indicator.style.display="table-row";
	show_shadow.style.display="table-row";
	auto_position.style.display="table-row";
	padding_hack.style.display="table-row";
	select_hack.style.display="table-row";
	}
	max_levels.className="";
	sub_indicator.className="";
	}else if(menusystem=='superfishmenu'){
	orientation.options[0].text="horizontal";	
	orientation.options[0].value="horizontal";	
	orientation.options[1].text="vertical";	
	orientation.options[1].value="vertical";
	orientation.options[3]= null;	
	orientation.options[2]= null;
	orientation.options[4]= null;
	if(IE){
	sub_indicator.style.display="block";
	special_effects.style.display="block";
	show_shadow.style.display="none";
	auto_position.style.display="none";
	padding_hack.style.display="block";
	select_hack.style.display="none";	
	}else{
	sub_indicator.style.display="table-row";
	special_effects.style.display="table-row";
	show_shadow.style.display="none";
	auto_position.style.display="none";
	padding_hack.style.display="table-row";
	select_hack.style.display="none";
	}
	max_levels.className="swmenu_menubackgr";
	sub_indicator.className="swmenu_menubackgr";
	}else{
	orientation.options[0].text="horizontal";	
	orientation.options[0].value="horizontal";	
	orientation.options[1].text="vertical";	
	orientation.options[1].value="vertical";
	orientation.options[3]= null;	
	orientation.options[2]= null;
	orientation.options[4]= null;
	sub_indicator.style.display="none";	
	show_shadow.style.display="none";
	auto_position.style.display="none";
	special_effects.style.display="none";
	max_levels.className="swmenu_menubackgr";
	sub_indicator.className="swmenu_menubackgr";
	if(menusystem=='mygosumenu'){
	if(IE){
	padding_hack.style.display="block";
	select_hack.style.display="block";	
	}else{
	padding_hack.style.display="table-row";
	select_hack.style.display="table-row";
	}
	}else{
	padding_hack.style.display="none";	
	select_hack.style.display="none";
	}
	
	}
	
	position=document.getElementById('position');
	if(menusystem=='tigramenu'){
	position.options[0].text="absolute";	
	position.options[0].value="absolute";	
	position.options[1].text="relative";	
	position.options[1].value="relative";
	position.options[2]= null;	
	}else{
	position.options[0].text="left";	
	position.options[0].value="left";	
	position.options[1].text="center";	
	position.options[1].value="center";
	position.options[2]= new Option("right","right");
	}
}

function doSystemPopup(){
	window.open('components/com_swmenufree/menu_systems.php', 'win1', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=780,height=550,directories=no,location=no');
}

var originalOrder='<?php echo $row2->ordering?$row2->ordering:0;?>';
var originalPos='<?php echo $row2->position?$row2->position:"left";?>';
var orders=new Array();	// array in the format [key,value,text]
<?php	$i=0;
foreach ($orders2 as $k=>$items) {
	foreach ($items as $v) {
		echo "\n	orders[".$i++."]=new Array( '$k','$v->value','$v->text' );";
	}
}
?>
var originalOrder2='<?php echo $parent_id;?>';
var originalPos2='<?php echo $menutype;?>';
var orders2=new Array();	// array in the format [key,value,text]
<?php	$i=0;
foreach ($orders3 as $k=>$items) {
	foreach ($items as $v) {
		echo "\n	orders2[".$i++."]=new Array( '$k','$v->value','$v->text' );";
	}
}
?>
//-->
</script> 

<div class="swmenu_container"  >
		
<table  cellpadding="4" cellspacing="0" border="0" width="750">
  <tr>
     <td width="10%"><img src="components/com_swmenufree/images/swmenufree_logo.png" align="left" border="0"/></td>
     <td valign="bottom"><span class="swmenu_sectionname"><?php echo _SW_MODULE_EDITOR; ?></span> </td>
     <td valign="top" >
      <ul>
       <?php if (file_exists($absolute_path."/modules/mod_swmenufree/styles/menu.css")&&$row2->id){ ?>
      <li><a href="index2.php?option=com_swmenufree&amp;task=editCSS&amp;id=<?php echo $row2->id; ?>" ><?php echo _SW_CSS_LINK; ?></a></li>
       <?php } else{ ?>
      <li><a href="javascript:void(0);" onClick="doExport();" ><?php echo _SW_EXPORT_LINK; ?></a></li>
       <?php } ?>
      <li><a href="index2.php?option=com_swmenufree&amp;task=upgrade"  ><?php echo _SW_UPGRADE_LINK; ?></a></li>
       </ul>
    </td>
  </tr>
</table>

<form action="index2.php" method="post" name="adminForm">
<table  cellpadding="0" cellspacing="0" border="0" width="750" style="height:35px">
  <tr>
   	<td id="tab6" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id)"><?php echo _SW_MODULE_SETTINGS_TAB; ?></td>
   	<td id="tab1" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id)"><?php echo _SW_SIZE_OFFSETS_TAB; ?></td>
    <td id="tab2" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id)"><?php echo _SW_COLOR_BACKGROUNDS_TAB; ?></td>
    <td id="tab3" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id)"><?php echo _SW_FONTS_PADDING_TAB; ?></td>
    <td id="tab5" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id)"><?php echo _SW_BORDERS_EFFECTS_TAB; ?></td>
     </tr>
</table>

<table class="swmenu_tabheading" width="750">
  <tr>
   <td width="80%"> <?php echo _SW_MODULE_NAME; ?>:<input class="inputbox" style="width:200px" type="text" name="title" size="20" value="<?php echo $modulename; ?>" />
   </td><td><a href="javascript:void(0);" class="swmenu_button_save" onClick="doSave();" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_SAVE_TIP; ?>')" ><?php echo _SW_SAVE_BUTTON; ?></a>
   </td><td><a href="javascript:void(0);" class="swmenu_button_export" onClick="doExport();" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_EXPORT_TIP; ?>')" ><?php echo _SW_EXPORT_BUTTON; ?></a>
   </td><td><a href="javascript:void(0);" class="swmenu_button_preview" onClick="doPreviewWindow();" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_PREVIEW_TIP; ?>')" ><?php echo _SW_PREVIEW_BUTTON; ?></a>
   </td><td><a href="javascript:void(0);" class="swmenu_button_cancel" onClick="doCancel();" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_CANCEL_TIP; ?>')"><?php echo _SW_CANCEL_BUTTON; ?></a>
   </td>
 </tr>
</table>

<div id="page1" class="pagetext">

<table width="750" >
  <tr>
    <td valign="top"> 
      <table width="360" style="border:0px solid #cccccc;height:200px" >
        <tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_POSITION_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td><?php echo _SW_TOP_MENU." - "._SW_ALIGNMENT; ?>:</td>
          <td width="120"> <div align="left"><?php echo $lists['position']; ?></div></td>
        </tr><tr>
          <td><?php echo _SW_TOP_MENU." / "._SW_SUB_MENU." - "._SW_ORIENTATION; ?>:</td>
          <td width="120"> <div align="left"><?php echo $lists['orientation']; ?></div></td>
        </tr><tr>
          <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SIZES_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td><?php echo _SW_TOP_MENU." "._SW_ITEM_WIDTH; ?>: <i><?php echo _SW_AUTOSIZE; ?></i></td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="main_width" name="main_width" value="<?php echo $rows->main_width;?>" />px</div></td>
        </tr><tr>
          <td><?php echo _SW_TOP_MENU." "._SW_ITEM_HEIGHT; ?>: <i><?php echo _SW_AUTOSIZE; ?></i></td>
          <td width="120"> <div align="right">
          <input id="main_height" name="main_height" type="text" value="<?php echo $rows->main_height;?>" size="8"/>px</div></td>
        </tr><tr class="swmenu_menubackgr">
          <td><?php echo _SW_SUB_MENU." "._SW_ITEM_WIDTH; ?>: <i><?php echo _SW_AUTOSIZE; ?></i></td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="sub_width" name="sub_width" value="<?php echo $rows->sub_width;?>"/>px</div></td>
        </tr><tr>
          <td><?php echo _SW_SUB_MENU." "._SW_ITEM_HEIGHT; ?>: <i><?php echo _SW_AUTOSIZE; ?></i></td>
          <td width="120"> <div align="right">
          <input id="sub_height" name="sub_height" type="text" value="<?php echo $rows->sub_height;?>" size="8"/>px</div></td>
        </tr>
      </table>
    </td>
    <td valign="top"> 
      <table width="360" style="border:0px solid #cccccc;height:200px" >
        <tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_TOP_OFFSETS_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td><?php echo _SW_TOP_MENU." "._SW_TOP_OFFSET; ?>:</td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="main_top" name="main_top" value="<?php echo $rows->main_top;?>"/>px</div></td>
        </tr><tr>
          <td><?php echo _SW_TOP_MENU." "._SW_LEFT_OFFSET; ?>:</td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="main_left" name="main_left" value="<?php echo $rows->main_left;?>"/>px</div></td>
        </tr><tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_SUB_OFFSETS_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td><?php echo _SW_LEVEL." 1 "._SW_SUB_MENU." - "._SW_TOP_OFFSET; ?>:</td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="level1_sub_top" name="level1_sub_top" value="<?php echo $rows->level1_sub_top;?>"/>px</div></td>
        </tr><tr>
          <td><?php echo _SW_LEVEL." 1 "._SW_SUB_MENU." - "._SW_LEFT_OFFSET; ?>:</td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="level1_sub_left" name="level1_sub_left" value="<?php echo $rows->level1_sub_left;?>"/>px</div></td>
        </tr><tr class="swmenu_menubackgr">
          <td><?php echo _SW_LEVEL." 2 "._SW_SUB_MENU." - "._SW_TOP_OFFSET; ?>:</td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="level2_sub_top" name="level2_sub_top" value="<?php echo $rows->level2_sub_top;?>"/>px</div></td>
        </tr><tr>
          <td><?php echo _SW_LEVEL." 2 "._SW_SUB_MENU." - "._SW_LEFT_OFFSET; ?>:</td>
          <td width="120"> <div align="right">
          <input type="text" size="8" id="level2_sub_left" name="level2_sub_left" value="<?php echo $rows->level2_sub_left;?>"/>px</div></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<table width="100%">
  <tr>
    <td align="center"> <img src="components/com_swmenufree/images/trans_offsets.png" width="750" height="480" border="0" hspace="0" vspace="0"/> </td>
  </tr>
</table>

</div>



<div id="page2" class="pagetext">

<table width="750">
  <tr>
    <td valign="top"> 
      <table width="360" style="border:0px solid #cccccc;height:260px">
        <tr>
          <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_BACKGROUND_IMAGE_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr" >
          <td><?php echo _SW_TOP_MENU." "._SW_BACKGROUND; ?>:</td>
          <td colspan="2">
	        <table id="main_back_image_box" style="border: 1px solid #000000; width:100px; height:15px" background="../<?php echo $rows->main_back_image;?>" align="left">
	 	     <tr><td width="100%" style="height:20px">&nbsp;</td></tr>
      	    </table>
            <input type="button" name="getimage" value="<?php echo _SW_GET; ?>" onclick="BackgroundSelector.select('main_back_image');"/>
            <input type="hidden" id="main_back_image" name="main_back_image" value="<?php echo $rows->main_back_image;?>"/>
	     </td>
      </tr><tr>
        <td><?php echo _SW_TOP_MENU." "._SW_OVER_BACKGROUND; ?>:</td>
        <td colspan="2">
          <table id="main_back_image_over_box" style="border: 1px solid #000000; width:100px; height:15px" background="../<?php echo $rows->main_back_image_over;?>" align="left"> 
            <tr><td width="100%" height="20">&nbsp;</td></tr>
          </table>
          <input type="button" name="getimage" value="<?php echo _SW_GET; ?>" onclick="BackgroundSelector.select('main_back_image_over');"/>
          <input type="hidden" id="main_back_image_over" name="main_back_image_over" value="<?php echo $rows->main_back_image_over;?>"/>
        </td>
     </tr><tr class="swmenu_menubackgr">
       <td><?php echo _SW_SUB_MENU." "._SW_BACKGROUND; ?>:</td>
       <td colspan="2">
         <table id="sub_back_image_box" style="border: 1px solid #000000; width:100px; height:15px" background="../<?php echo $rows->sub_back_image;?>" align="left"> 
           <tr><td width="100%" height="20">&nbsp;</td></tr>
         </table>
         <input type="button" name="getimage" value="<?php echo _SW_GET; ?>" onclick="BackgroundSelector.select('sub_back_image');"/>
         <input type="hidden" id="sub_back_image" name="sub_back_image" value="<?php echo $rows->sub_back_image;?>"/>
       </td>
     </tr><tr>
       <td><?php echo _SW_SUB_MENU." "._SW_OVER_BACKGROUND; ?>:</td>
         <td colspan="2">
           <table id="sub_back_image_over_box" style="border: 1px solid #000000; width:100px; height:15px" background="../<?php echo $rows->sub_back_image_over;?>" align="left"> 
            <tr><td width="100%" height="20">&nbsp;</td></tr>
          </table>
          <input type="button" name="getimage" value="<?php echo _SW_GET; ?>" onclick="BackgroundSelector.select('sub_back_image_over');"/>
          <input type="hidden" id="sub_back_image_over" name="sub_back_image_over" value="<?php echo $rows->sub_back_image_over;?>"/>
        </td>
      </tr><tr>
        <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_BACKGROUND_COLOR_LABEL; ?></div></td>
      </tr><tr class="swmenu_menubackgr" >
         <td><?php echo _SW_TOP_MENU." "._SW_COLOR; ?>:</td>
         <td> 
           <table id="main_back_box" style="border: 1px solid #000000; width:20px;height:20px" bgColor='<?php echo $rows->main_back;?>' >
             <tr><td width="20" height="20">&nbsp;</td></tr>
           </table>
        </td>
          <td width="120"><div align="right"><input type="text" size="8"  id="main_back" name="main_back" value="<?php echo $rows->main_back;?>"/>
          <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('main_back');" ><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
      </tr><tr>
        <td><?php echo _SW_TOP_MENU." "._SW_OVER_COLOR; ?>:</td>
        <td> 
           <table id="main_over_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $rows->main_over;?>'>
             <tr><td width="20" height="20">&nbsp;</td></tr>
           </table>
        </td>
        <td width="120"><div align="right"><input type="text" size="8"  id="main_over" name="main_over" value="<?php echo $rows->main_over;?>"/>
        <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('main_over');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a> </div></td>
     </tr><tr class="swmenu_menubackgr">
       <td><?php echo _SW_SUB_MENU." "._SW_COLOR; ?>:</td>
       <td>
         <table id="sub_back_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $rows->sub_back;?>'>
           <tr><td width="20" height="20">&nbsp;</td></tr>
        </table>
      </td>
      <td width="120"><div align="right"><input type="text" size="8"  id="sub_back" name="sub_back" value="<?php echo $rows->sub_back;?>"/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('sub_back');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
    </tr><tr>
      <td><?php echo _SW_SUB_MENU." "._SW_OVER_COLOR; ?>:</td>
      <td> 
        <table id="sub_over_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $rows->sub_over;?>'>
          <tr><td width="20" height="20">&nbsp;</td></tr>
        </table>
      </td>
      <td width="120"><div align="right"><input type="text" size="8" id="sub_over" name="sub_over" value="<?php echo $rows->sub_over;?>"/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('sub_over');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
    </tr>
   </table>
  </td>
  <td valign="top"> 
    <table width="360" style="border:0px solid #cccccc;height:260px;" >
       <tr>
         <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_FONT_COLOR_LABEL; ?></div>
       </tr><tr class="swmenu_menubackgr">
         <td><?php echo _SW_TOP_MENU." "._SW_FONT; ?>:</td>
         <td> 
           <table id="main_font_color_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $rows->main_font_color;?>'>
             <tr><td width="20" height="20">&nbsp;</td></tr>
           </table>
         </td>
         <td width="120"> <div align="right">
         <input name="main_font_color" type="text" id="main_font_color" value="<?php echo $rows->main_font_color;?>" size="8"/>
         <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('main_font_color');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
       </tr><tr>
         <td><?php echo _SW_TOP_MENU." "._SW_OVER_FONT; ?>:</td>
         <td> 
            <table id="main_font_color_over_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $rows->main_font_color_over;?>'>
              <tr><td width="20" height="20">&nbsp;</td></tr>
            </table>
         </td>
         <td width="120"> <div align="right">
          <input name="main_font_color_over" type="text" id="main_font_color_over" value="<?php echo $rows->main_font_color_over;?>" size="8"/>
          <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('main_font_color_over');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
       </tr><tr class="swmenu_menubackgr">
         <td><?php echo _SW_SUB_MENU." "._SW_FONT; ?>:</td>
         <td> 
            <table id="sub_font_color_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $rows->sub_font_color;?>'>
              <tr><td width="20" height="20">&nbsp;</td></tr>
            </table>
          </td>
          <td width="120"> <div align="right">
           <input name="sub_font_color" type="text" id="sub_font_color" value="<?php echo $rows->sub_font_color;?>" size="8"/>
           <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('sub_font_color');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
        </tr><tr>
           <td><?php echo _SW_SUB_MENU." "._SW_OVER_FONT; ?>:</td>
           <td>
              <table id="sub_font_color_over_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $rows->sub_font_color_over;?>'>
                 <tr><td width="20" height="20">&nbsp;</td></tr>
              </table>
           </td>
           <td width="120"> <div align="right">
            <input name="sub_font_color_over" type="text" id="sub_font_color_over" value="<?php echo $rows->sub_font_color_over;?>"  size="8"/>
            <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('sub_font_color_over');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
         </tr><tr>
           <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_BORDER_COLOR_LABEL; ?></div></td>
         </tr><tr class="swmenu_menubackgr">
           <td><?php echo _SW_TOP_MENU." "._SW_OUTSIDE_BORDER_COLOR; ?>:</td>
           <td> 
             <table id="main_border_color_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $mainborder[2];?>'>
               <tr><td width="20" height="20">&nbsp;</td></tr>
             </table>
           </td>
           <td width="120"> <div align="right">
            <input  name="main_border_color" onChange="doMainBorder();" type="text" id="main_border_color" value="<?php echo $mainborder[2];?>" size="8"/>
            <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('main_border_color');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
        </tr><tr>
          <td><?php echo _SW_TOP_MENU." "._SW_INSIDE_BORDER_COLOR; ?>:</td>
          <td>
            <table id="main_border_color_over_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $mainborderover[2];?>'>
             <tr><td width="20" height="20">&nbsp;</td></tr>
            </table>
          </td>
          <td width="120"> <div align="right">
          <input  name="main_border_color_over" onChange="doMainBorder();" type="text" id="main_border_color_over" value="<?php echo $mainborderover[2];?>" size="8"/>
          <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('main_border_color_over');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
       </tr><tr class="swmenu_menubackgr">
         <td><?php echo _SW_SUB_MENU." "._SW_OUTSIDE_BORDER_COLOR; ?>:</td>
         <td>
           <table id="sub_border_color_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $subborder[2];?>'>
             <tr><td width="20" height="20">&nbsp;</td></tr>
           </table>
         </td>
         <td width="120"> <div align="right">
         <input  name="sub_border_color" type="text" onChange="doSubBorder();" id="sub_border_color" value="<?php echo $subborder[2];?>" size="8"/>
         <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('sub_border_color');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
       </tr>
  
    <tr>
      <td><?php echo _SW_SUB_MENU." "._SW_INSIDE_BORDER_COLOR; ?>:</td>
      <td> 
        <table id="sub_border_color_over_box" style="border: 1px solid #000000; width:20px; height:20px" bgColor='<?php echo $subborderover[2];?>'>
          <tr><td width="20" height="20">&nbsp;</td></tr>
        </table>
      </td>
      <td width="120"> <div align="right">
          <input  name="sub_border_color_over" type="text" onChange="doSubBorder();" id="sub_border_color_over" value="<?php echo $subborderover[2];?>" size="8"/>
          <a onMouseOver="this.style.cursor='pointer'" onClick="copyColor('sub_border_color_over');"><img src="components/com_swmenufree/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
    </tr>
   
   </table>
 </td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="components/com_swmenufree/images/colors_top.png" width="750" height="50" border="0" hspace="0" vspace="0"/> </td>
  </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tr><td align="center">
      <table width="360" cellspacing="0" cellpadding="0" style="border-right:6px solid #CECFCE;height:330px">
        <tr><td><?php echo sprintf( _SW_COLOR_TIP, '<img src="components/com_swmenufree/images/sel.gif"/><b>'._SW_GET.'</b>'); ?></td>
        </tr><tr><td> 
            <table width="320" align="center" style="border:0px solid #cccccc;">
              <tr><td id="CPCP_Wheel" ><img src="components/com_swmenufree/images/colorwheel.jpg" width="256" height="256"  onMouseMove="xyOff(event);" onClick="wrtVal();" border="0"/></td>
                <td>&nbsp;</td><td> <table style="border:0px solid #cccccc;" bgcolor="#FFAD00">
                    <tr><td valign="top"><?php echo _SW_PRESENT_COLOR; ?>:</td>
                    </tr><tr><td id="CPCP_ColorCurrent" height="70"></td>
                    </tr><tr><td id="CPCP_ColorSelected">&nbsp;</td>
                    </tr><tr><td><br /><?php echo _SW_SELECTED_COLOR; ?>:
                    </tr><tr><td bgcolor="#FFFFFF" id="CPCP_Input" height="70"  >&nbsp;</td>
                    </tr><tr><td><input name="TEXT" type="TEXT" id="CPCP_Input_RGB" value="#FFFFFF" size="8"/></td>
                    </tr></table>
                </td></tr>
          </table></td></tr>
     </table></td><td valign="top" align="center"> 
     <table>
        <tr>
          <td align="center" valign="top"> <img src="components/com_swmenufree/images/mygosu_border.png" width="342" height="320" border="0" hspace="0" vspace="0"/> </td>
        </tr>
     </table>
    </td>
  </tr>
</table>

</div>


<div id="page3" class="pagetext">
  <table width="750">
    <tr>
      <td valign="top">
          <table width="360" style="border:0px solid #cccccc;">
            <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_FAMILY_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td width="100"><?php echo _SW_TOP_MENU; ?>:</td>
              <td width="250"><div align="right"><?php echo $lists['font_family']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_SUB_MENU; ?>:</td>
              <td width="250"><div align="right"><?php echo $lists['sub_font_family']; ?></div></td>
            </tr><tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_TOP_MENU." "._SW_PADDING; ?></div></td>
            </tr><tr>
              <td colspan="2" align="center">
                <table>
                  <tr class="swmenu_menubackgr">
                    <td width="75" align="center"><?php echo _SW_TOP; ?></td>
                    <td width="75" align="center"><?php echo _SW_RIGHT; ?></td>
                    <td width="75" align="center"><?php echo _SW_BOTTOM; ?></td>
                    <td width="75" align="center"><?php echo _SW_LEFT; ?></td>
                  </tr><tr>
                    <td width="75" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_top" name="main_pad_top" value="<?php echo $mainpadding[0]; ?>" maxlength="2" />px</td>
                    <td width="75" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_right" name="main_pad_right" value="<?php echo $mainpadding[1]; ?>" maxlength="2" />px</td>
                    <td width="75" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_bottom" name="main_pad_bottom" value="<?php echo $mainpadding[2]; ?>" maxlength="2" />px</td>
                    <td width="75" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_left" name="main_pad_left" value="<?php echo $mainpadding[3]; ?>" maxlength="2" />px</td>
                  </tr>
                </table>
              </td>
            </tr><tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SUB_MENU." "._SW_PADDING; ?></div></td>
            </tr><tr>
              <td colspan="2" align="center">
                <table>
                  <tr class="swmenu_menubackgr">
                    <td width="75" align="center"><?php echo _SW_TOP; ?></td>
                    <td width="75" align="center"><?php echo _SW_RIGHT; ?></td>
                    <td width="75" align="center"><?php echo _SW_BOTTOM; ?></td>
                    <td width="75" align="center"><?php echo _SW_LEFT; ?></td>
                  </tr><tr>
                    <td width="75" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_top" name="sub_pad_top" value="<?php echo $subpadding[0]; ?>" maxlength="2" />px</td>
                    <td width="75" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_right" name="sub_pad_right" value="<?php echo $subpadding[1]; ?>" maxlength="2" />px</td>
                    <td width="75" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_bottom" name="sub_pad_bottom" value="<?php echo $subpadding[2]; ?>" maxlength="2" />px</td>
                    <td width="75" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_left" name="sub_pad_left" value="<?php echo $subpadding[3]; ?>" maxlength="2" />px</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
        <td valign="top">
          <table width="360" style="border:0px solid #cccccc;">
            <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_SIZE_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_TOP_MENU." "._SW_FONT_SIZE; ?>:</td>
              <td width="100">
                <div align="right">
                  <input id="main_font_size" name="main_font_size" type="text" value="<?php echo $rows->main_font_size;?>" size="8" /> px
                </div>
              </td>
            </tr><tr>
              <td><?php echo _SW_SUB_MENU." "._SW_FONT_SIZE; ?>:</td>
              <td width="100">
                <div align="right">
                  <input id="sub_font_size" name="sub_font_size" type="text" value="<?php echo $rows->sub_font_size;?>" size="8" /> px
                </div>
              </td>
            </tr><tr>
              <td colspan="2" class="swmenu_tabheading">
                <div align="center"><?php echo _SW_FONT_ALIGNMENT_LABEL; ?></div>
              </td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_TOP_MENU." "._SW_FONT_ALIGNMENT; ?>:</td>
              <td width="100"><div align="right"><?php echo $lists['main_align']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_SUB_MENU." "._SW_FONT_ALIGNMENT; ?>:</td>
              <td width="100"><div align="right"><?php echo $lists['sub_align']; ?></div></td>
            </tr><tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_WEIGHT_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_TOP_MENU." "._SW_FONT_WEIGHT; ?>:</td>
              <td width="100"><div align="right"><?php echo $lists['font_weight']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_SUB_MENU." "._SW_FONT_WEIGHT; ?>:</td>
              <td width="100"><div align="right"><?php echo $lists['font_weight_over']; ?></div></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><img alt="" src="components/com_swmenufree/images/font_top.png" width="750" height="50" border="0" hspace="0" vspace="0" /> </td>
      </tr>
    </table>

    <table width="100%" align="center" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">
          <table width="360" style="border-right:6px solid #CECFCE;" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center"><?php echo _SW_FONT_TIP; ?><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:10px; font-weight:normal;font-family:Times New Roman, Times, serif;">
              'Times New Roman', Times, serif normal at 10px</span><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:10px; font-weight:bold;font-family:Verdana,Arial,Helvetica,sans-serif;">
              Verdana,Arial,Helvetica,sans-serif Bold at 10px</span><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:12px; font-weight:normal;font-family:Arial,Helvetica,sans-serif;">
              Arial,Helvetica,sans-serif Normal at 12px</span></td>
            </tr><tr>
              <td align="center" valign="top"><span style="color:#1166B0; font-size:12px; font-weight:normal;font-family:Georgia, Times New Roman, Times, serif;">
              Georgia, 'Times New Roman', Times, serif Normal at 12px</span><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:12px; font-weight:bold;font-family:Geneva,Arial,Helvetica,sans-serif;">
              'Geneva,Arial,Helvetica,sans-serif Bold at 12px</span><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:14px; font-weight:normal;font-family:Times New Roman, Times, serif;">
              'Times New Roman', Times, serif normal at 14px</span><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:14px; font-weight:bold;font-family:Verdana,Arial,Helvetica,sans-serif;">
              Verdana,Arial,Helvetica,sans-serif Bold at 14px</span><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:14px; font-weight:bold;font-family:Arial,Helvetica,sans-serif;">
              Arial,Helvetica,sans-serif Bold at 14px</span><br /></td>
            </tr><tr>
              <td align="center"><span style="color:#1166B0; font-size:14px; font-weight:normal;font-family:Geneva,Arial,Helvetica,sans-serif;">
              Geneva,Arial,Helvetica,sans-serif Normal at 14px</span><br /></td>
            </tr>
          </table>
        </td>
        <td align="center"><img alt="" src="components/com_swmenufree/images/menu_padding2.png" width="376" height="239" border="0" hspace="0" vspace="0" /> </td>
      </tr>
    </table>   
</div>


<div id="page5" class="pagetext">
  <table width="750">
      <tr>
        <td valign="top">
          <table width="360" style="border:0px solid #cccccc;">
            <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_BORDER_WIDTHS_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_TOP_MENU." "._SW_OUTSIDE_BORDER." "._SW_WIDTH; ?>:</td>
              <td width="120"><div align="right">
               <input id="main_border_width" onchange="doMainBorder();" name="main_border_width" type="text" value="<?php echo $mainborder[0]; ?>" size="8" /> px
                </div>
              </td>
            </tr><tr>
              <td><?php echo _SW_TOP_MENU." "._SW_INSIDE_BORDER." "._SW_WIDTH; ?>:</td>
              <td width="120"><div align="right">
                  <input id="main_border_over_width" onchange="doMainBorder();" name="main_border_over_width" type="text" value="<?php echo $mainborderover[0]; ?>" size="8" /> px
                </div>
              </td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_SUB_MENU." "._SW_OUTSIDE_BORDER." "._SW_WIDTH; ?>:</td>
              <td width="120"><div align="right">
                  <input id="sub_border_width" onchange="doSubBorder();" name="sub_border_width" type="text" value="<?php echo $subborder[0]; ?>" size="8" /> px
                </div>
              </td>
            </tr><tr>
              <td><?php echo _SW_SUB_MENU." "._SW_INSIDE_BORDER." "._SW_WIDTH; ?>:</td>
              <td width="120"><div align="right">
                  <input id="sub_border_over_width" onchange="doSubBorder();" name="sub_border_over_width" type="text" value="<?php echo $subborderover[0]; ?>" size="8" /> px
                </div>
              </td>
            </tr>
		<!--
            <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SPECIAL_EFFECTS_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_SUB_MENU." "._SW_OPACITY; ?>:</td>
              <td width="120"><div align="right">
                  <input id="specialA" name="specialA" type="text" value="<?php echo $rows->specialA;?>" size="8" /> %&nbsp;
                </div>
              </td>
            </tr>
            -->
          </table>
        </td>
        <td>
          <table width="360" style="border:0px solid #cccccc;">
          <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_BORDER_STYLES_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_TOP_MENU." "._SW_OUTSIDE_BORDER." "._SW_STYLE; ?>:</td>
              <td width="120"><div align="right"><?php echo $lists['main_border_style']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_TOP_MENU." "._SW_INSIDE_BORDER." "._SW_STYLE; ?>:</td>
              <td width="120"><div align="right"><?php echo $lists['main_border_over_style']; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_SUB_MENU." "._SW_OUTSIDE_BORDER." "._SW_STYLE; ?>:</td>
              <td width="120"><div align="right"><?php echo $lists['sub_border_style']; ?></div></td>
            </tr>
           
            <tr>
              <td><?php echo _SW_SUB_MENU." "._SW_INSIDE_BORDER." "._SW_STYLE; ?>:</td>
              <td width="120"><div align="right"><?php echo $lists['sub_border_over_style']; ?></div></td>
            </tr>
            <!--
             <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SPECIAL_EFFECTS_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_SUB_MENU." "._SW_DELAY; ?>:</td>
              <td width="120"><div align="right">
                  <input id="specialB" name="specialB" type="text" value="<?php echo $rows->specialB;?>" size="8" /> ms
                </div>
              </td>
            </tr>
            -->
          </table>
        </td>       
      </tr>
    </table>
   
 
 <table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><img alt="" src="components/com_swmenufree/images/started_top.png" width="750" height="47" border="0" hspace="0" vspace="0" /> </td>
      </tr>
    </table>

    <table align="center" cellspacing="0" cellpadding="0">
      <tr>
       <td align="center"><img alt="" src="components/com_swmenufree/images/comparison.png" border="0" hspace="0" vspace="0" /> </td>
    
        <td width="50%" align="left" valign="top">
        <img alt="" src="components/com_swmenufree/images/cd_cover.png" align="left" border="0" hspace="10" vspace="10" />
        <p style="font-size:14px;"><?php echo _SW_SWMENUPRO_INFO;?></p>
         <p><i>(1)</i> <?php echo _SW_SWMENUPRO_1;?></p>
         <p><i>(2)</i> <?php echo _SW_SWMENUPRO_2;?></p>
         <p><i>(3)</i> <?php echo _SW_SWMENUPRO_3;?></p>
         <p><i>(4)</i> <?php echo _SW_SWMENUPRO_4;?></p>
         <p><i>(5)</i> <?php echo _SW_SWMENUPRO_5;?></p>
         <table><tr><td width="200" align="center"><a href="http://www.swmenupro.com" class="swmenu_button_save" target="_blank" ><?php echo _SW_LEARNMORE; ?></a>
         </td><td width="200" align="center"><a href="http://www.swmenupro.com/index.php?option=com_content&task=view&id=24&Itemid=312" class="swmenu_button_export" target="_blank" ><?php echo _SW_BUYNOW; ?></a>
         </td></tr></table>
         
         
        </td>
         </tr>
    </table>   
</div>
        
    
<div id="page6" class="pagetext">
<table width="750">
  <tr>
    <td valign="top"> 
      <table width="360" style="border:0px solid #cccccc;">
        <tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_MENU_SOURCE_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td align="left"><?php echo _SW_MENU_SYSTEM; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MENU_SYSTEM_TIP; ?>')" onclick="doSystemPopup();">
	       <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['menustyle']; ?> </td>
        </tr><tr>
          <td align="left"><?php echo _SW_MENU_SOURCE; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MENU_SOURCE_TIP; ?>')" >
	       <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['menutype']; ?> </td>
        </tr><tr class="swmenu_menubackgr">
          <td  align="left" ><?php echo _SW_PARENT; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_PARENT_TIP; ?>')" >
	       <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
           <script language="javascript" type="text/javascript">
		   <!--
            	writeDynaList( 'class="inputbox" name="parentid" size="1" style="width:200px"', orders2, originalPos2, originalPos2, originalOrder2 );
			//-->
			</script> </td>
        </tr><tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_STYLE_SHEET_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_STYLE_SHEET; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_STYLE_SHEET_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['cssload']; ?> </td>
        </tr><tr>
          <td valign="top"><?php echo _SW_CLASS_SFX; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_CLASS_SFX_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <input name="moduleclass_sfx" type="text" value="<?php echo $moduleclass_sfx; ?>" style="width:195px;" /></td>
        </tr><tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_AUTO_ITEM_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_HYBRID_MENU; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_HYBRID_MENU_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['hybrid']; ?> </td>
        </tr><tr>
          <td valign="top"><?php echo _SW_TABLES_BLOGS; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_TABLES_BLOGS_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['tables']; ?> </td>
        </tr><tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_CACHE_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_CACHE_ITEMS; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_CACHE_ITEMS_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['cache']; ?> </td>
        </tr><tr>
          <td valign="top"><?php echo _SW_CACHE_REFRESH; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_CACHE_REFRESH_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['cache_time']; ?> </td>
        </tr>  <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SPECIAL_EFFECTS_LABEL; ?></div></td>
            </tr> <tr id="special_effects_row" <?php if ($menustyle!="superfishmenu"){echo "style=\"display:none;\"";} ?>>
          <td valign="top"><?php echo _SW_SPECIAL_EFFECTS_LABEL; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_SPECIAL_EFFECTS_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['extra']; ?> </td>
        </tr><tr class="swmenu_menubackgr">
              <td ><?php echo _SW_SUB_MENU."<br /> "._SW_DELAY; ?>:</td>
              <td><div align="right">
                  <input id="specialB" name="specialB" type="text" value="<?php echo $rows->specialB;?>" size="8" /> ms
                </div>
              </td>
            </tr><tr>
              <td ><?php echo _SW_SUB_MENU."<br /> "._SW_OPACITY; ?>:</td>
              <td><div align="right">
                  <input id="specialA" name="specialA" type="text" value="<?php echo $rows->specialA;?>" size="8" /> %&nbsp;
                </div>
              </td></tr>         
      </table></td>
      <td valign="top"> 
      <table width="360" style="border:0px solid #cccccc;">
       <tr>
         <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_GENERAL_LABEL; ?></div></td>
       </tr><tr class="swmenu_menubackgr">
          <td  align="left"><?php echo _SW_SHOW_NAME; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_SHOW_NAME_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['showtitle']; ?> </td>
        </tr><tr>
          <td valign="top"><?php echo _SW_PUBLISHED; ?>:</td>

          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_PUBLISHED_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['published']; ?> </td>
        </tr><tr class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_ACTIVE_MENU; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_ACTIVE_MENU_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['active_menu']; ?> </td>
        </tr><tr >
          <td valign="top"><?php echo _SW_OVERLAY_HACK; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_OVERLAY_HACK_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['overlay_hack']; ?> </td>
        </tr><tr id="select_hack_row" <?php if ($menustyle=="tigramenu" || $menustyle=="superfishmenu"){echo "style=\"display:none;\"";} ?> class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_SELECT_HACK; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_SELECT_HACK_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['selectbox_hack']; ?> </td>
        </tr><tr id="sub_indicator_row" <?php if ($menustyle=="superfishmenu"){echo "class=\"swmenu_menubackgr\"";}else{echo "class=\"\"";} ?> <?php if ($menustyle!="transmenu"  && $menustyle !="superfishmenu"){echo "style=\"display:none;\"";} ?> >
          <td valign="top"><?php echo _SW_SUB_INDICATOR; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_SUB_INDICATOR_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['sub_indicator']; ?> </td>
        </tr><tr  class="swmenu_menubackgr" id="auto_position_row" <?php if ($menustyle!="transmenu"){echo "style=\"display:none;\"";} ?> >
          <td valign="top"><?php echo _SW_AUTO_POSITION; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_AUTO_POSITION_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['auto_position']; ?> </td>
        </tr><tr  id="padding_hack_row" <?php if ($menustyle=="tigramenu"){echo "style=\"display:none;\"";} ?> >
          <td valign="top"><?php echo _SW_PADDING_HACK; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_PADDING_HACK_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['padding_hack']; ?> </td>
        </tr><tr class="swmenu_menubackgr" id="show_shadow_row" <?php if ($menustyle!="transmenu"){echo "style=\"display:none;\"";} ?>>
          <td valign="top"><?php echo _SW_SHOW_SHADOW; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_SHOW_SHADOW_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['show_shadow']; ?> </td>
        </tr><tr id="max_levels_row" <?php if ($menustyle!="transmenu"){echo "class=\"swmenu_menubackgr\"";}else{echo "class=\"\"";} ?> >
          <td><?php echo _SW_MAX_LEVELS; ?>:</td><td>
          <a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MAX_LEVELS_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['levels']; ?> </td>
        </tr><tr>
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_POSITION_ACCESS_LABEL; ?></div></td>
        </tr><tr class="swmenu_menubackgr">
          <td valign="top" align="left"><?php echo _SW_MODULE_POSITION; ?>:</td>
         
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MODULE_POSITION_TIP; ?>')" >
	      <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['module_position']; ?> </td>
        </tr><tr>
         <td valign="top" align="left"><?php echo _SW_MODULE_ORDER; ?>:</td>
         <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MODULE_ORDER_TIP; ?>')" >
	     <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>
         <script language="javascript" type="text/javascript">
		<!--
		writeDynaList( 'class="inputbox" id="ordering" name="ordering" size="1" style="width:200px"',orders, originalPos, originalPos, originalOrder );
		//-->
		</script> </td>
       </tr><tr class="swmenu_menubackgr">
         <td valign="top" align="left"><?php echo _SW_ACCESS_LEVEL; ?>:</td>
         <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_ACCESS_LEVEL_TIP; ?>')" >
	     <img src="components/com_swmenufree/images/info.png" alt="info" align="top"  border="0" /></a>
         <?php echo $lists['access']; ?> </td>
       </tr>    
      </table></td>
  </tr><tr>
     <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_PAGES_LABEL; ?></div></td>
     <tr><td colspan="2">
       <table cellpadding="0" cellspacing="3">
          <tr class="swmenu_menubackgr">
          <td><?php echo _SW_PAGES_TIP; ?><br /><?php echo $lists['selections']; ?> </td>
          <td valign="top">
            <table cellpadding="0" cellspacing="0" >
              <tr><td class="swmenu_tabheading"><?php echo _SW_CONDITIONS_LABEL; ?>
              </td></tr><tr><td>
              <a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_TEMPLATE_TIP; ?>')" >
	          <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>&nbsp;<?php echo _SW_TEMPLATE; ?>:
              <?php echo $lists['templates']; ?> 
              </td></tr><tr><td>
              <a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_LANGUAGE_TIP; ?>')" >
	          <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>&nbsp;<?php echo _SW_LANGUAGE; ?>:
              <?php echo $lists['languages']; ?> 
              </td></tr><tr><td>
              <a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_COMPONENT_TIP; ?>')" >
	          <img src="components/com_swmenufree/images/info.png" alt="info" align="middle"  border="0" /></a>&nbsp;<?php echo _SW_COMPONENT; ?>:   
              <?php echo $lists['components']; ?> </td>
              </tr>
           </table></td></tr>
      </table></td></tr>
</table>
</div>
  
  

<input type="hidden" id="main_padding" name="main_padding" value="<?PHP echo $rows->main_padding; ?>" />
<input type="hidden" id="sub_padding" name="sub_padding" value="<?PHP echo $rows->sub_padding; ?>" />
<input type="hidden" id="main_border" name="main_border" value="<?PHP echo $rows->main_border; ?>" />
<input type="hidden" id="sub_border" name="sub_border" value="<?PHP echo $rows->sub_border; ?>" />
<input type="hidden" id="main_border_over" name="main_border_over" value="<?PHP echo $rows->main_border_over; ?>" />
<input type="hidden" id="sub_border_over" name="sub_border_over" value="<?PHP echo $rows->sub_border_over; ?>" />
<input type="hidden" name="option" value="com_swmenufree" />
<input type="hidden" name="moduleID" value="<?PHP echo $row2->id; ?>" />
<input type="hidden" name="cid[]" value="<?PHP echo $row2->id; ?>" />
<input type="hidden" name="export2" id="export2" value="0" />
<input type="hidden" name="task" value="editdhtmlMenu" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="no_html" id="no_html" value="0" />
<input type="hidden" name="id" value="<?php echo $row2->id; ?>" /> 
<input type="hidden" name="returntask" value="showmodules" />
</form>
</div>

<script language="JavaScript" type="text/javascript" src="components/com_swmenufree/js/wz_tooltip.js"></script>       
<script language="javascript" type="text/javascript">
<!--
dhtml.onTabStyle='swmenu_ontab';
dhtml.offTabStyle='swmenu_offtab';
dhtml.cycleTab('tab6');
-->
</script> 
<?php
}
}
?>
