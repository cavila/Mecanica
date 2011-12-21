<?php
/**
* swmenufree v4.0
* http://swonline.biz
* Copyright 2006 Sean White
**/

//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE); 
defined( '_JEXEC' ) or die( 'Restricted access' );

$database = &JFactory::getDBO();
$absolute_path=JPATH_ROOT;
require_once($absolute_path ."/modules/mod_swmenufree/styles.php");
require_once($absolute_path ."/modules/mod_swmenufree/functions.php");

$css_load=0;
$preview=0;
$id=0;
$q = explode("&",$_SERVER["QUERY_STRING"]);
foreach ($q as $qi)
{
  if ($qi != "")
  {
    $qa = explode("=",$qi);
    list ($key, $val) = $qa;
    if ($val)
      $$key = urldecode($val);
  }
}
 
reset ($_POST);
while (list ($key, $val) = each ($_POST))
{
  if ($val)
    $$key = $val;
    $swmenufree[$key]=$val;
}
$id=@$mid?$mid:$id;
$row 	=& JTable::getInstance('module');
	// load the row from the db table
	$row->load( $id );



if($preview==1){
	$query = "SELECT * FROM #__swmenufree_config WHERE id = 1";
	$database->setQuery( $query );
	$new_data = $database->query();
	$swmenufree= mysql_fetch_assoc($new_data);
$registry = new JRegistry();
	$registry->loadINI($row->params);
	$params= $registry->toObject( );
    $menu = @$params->menutype ? $params->menutype : 'mainmenu';
    $moduleID = @$params->moduleID;
    $menustyle = @$params->menustyle;
    $parent_id = @$params->parentid ? $params->parentid : 0;
    $hybrid = @$params->hybrid ? $params->hybrid : 0;
    $active_menu = @$params->active_menu ? $params->active_menu : 0;
    $parent_level = @$params->parent_level ? $params->parent_level: 0;
    $levels = @$params->levels ? $params->levels: 0;
    $sub_indicator = @$params->sub_indicator ?  $params->sub_indicator :  0;
    $show_shadow = @$params->show_shadow ?  $params->show_shadow :  0;
    $selectbox_hack=@$params->selectbox_hack?$params->selectbox_hack:0;
     $auto_position = @$params->auto_position ?  $params->auto_position :  0;
    $padding_hack=@$params->padding_hack?$params->padding_hack:0;
	//$css_load = JRequest::getVar( 'cssload', 0 );


}else if($preview==2){
	$query = "SELECT * FROM #__swmenu_config WHERE id = ".$id;
$database->setQuery( $query );
$new_data = $database->query();
$swmenufree= mysql_fetch_assoc($new_data);
$registry = new JRegistry();
	$registry->loadINI($row->params);
	$params= $registry->toObject( );
    $menu = @$params->menutype ? $params->menutype : 'mainmenu';
    $moduleID = @$params->moduleID;
    $menustyle = @$params->menustyle;
    $parent_id = @$params->parentid ? $params->parentid : 0;
    $hybrid = @$params->hybrid ? $params->hybrid : 0;
    $active_menu = @$params->active_menu ? $params->active_menu : 0;
    $parent_level = @$params->parent_level ? $params->parent_level: 0;
    $levels = @$params->levels ? $params->levels: 0;
    $sub_indicator = @$params->sub_indicator ?  $params->sub_indicator :  0;
    $show_shadow = @$params->show_shadow ?  $params->show_shadow :  0;
	$css_load = @$params->cssload ?  $params->cssload :  0;
	$selectbox_hack=@$params->selectbox_hack?$params->selectbox_hack:0;
	 $auto_position = @$params->auto_position ?  $params->auto_position :  0;
    $padding_hack=@$params->padding_hack?$params->padding_hack:0;

}else{
	
	$menu=JRequest::getVar( 'menutype', "mainmenu" );
	$parent_id=JRequest::getVar( 'parentid', 0 );
	$levels=JRequest::getVar( 'levels', 0 );
   
    $moduleID = JRequest::getVar( 'id', 0 );
    $hybrid = JRequest::getVar( 'hybrid', 0 );
    $active_menu = JRequest::getVar( 'active_menu', 0 );
    $parent_level = JRequest::getVar( 'parent_level', 0 );
    $tables = JRequest::getVar( 'tables', 0 );
	$selectbox_hack=JRequest::getVar( 'selectbox_hack', 0 );
   $id=$id?$id:1000000;
     $sub_indicator = JRequest::getVar( 'sub_indicator', 0 );
      $show_shadow = JRequest::getVar( 'show_shadow', 0 );
        $padding_hack = JRequest::getVar( 'padding_hack', 0 );
      $auto_position = JRequest::getVar( 'auto_position', 0 );
	$swmenufree['id']=$swmenufree['id']?$swmenufree['id']:0;
	
}


global $database, $my, $Itemid;

if($menu && $id && $menustyle){

$content= "\n<!--swmenufree5.0_J1.5 ".$menustyle." by http://www.swmenupro.com-->\n";   

if($menu && $id && $menustyle){
	
	 $final_menu =array();
	 $swmenufree_array=swGetMenuLinks($menu,$id,$hybrid,1);
	 $ordered = chain('ID', 'PARENT', 'ORDER', $swmenufree_array, $parent_id, $levels);
	 $moduleid = JRequest::getVar( 'moduleID', array(0) );
     $menutype = JRequest::getVar( 'menutype', '' );
	$swmenufree['position']="center";
	
    	
    	 for($i=0;$i<count($ordered);$i++){
            	$swmenu=$ordered[$i];
            	$swmenu['URL'] = "javascript:void(0)";
            	
            		$final_menu[] =array("TITLE" => $swmenu['TITLE'], "URL" =>  $swmenu['URL'] , "ID" => $swmenu['ID']  , "PARENT" => $swmenu['PARENT'] ,  "ORDER" => $swmenu['ORDER'], "TARGET" => 0,"ACCESS" => $swmenu['ACCESS'] );
             	
    	 }
    

	if(count($final_menu)){
		$ordered = chain('ID', 'PARENT', 'ORDER', $final_menu, $parent_id, $levels);
		
		if ($menustyle == "mygosumenu" ){$content.= doGosuMenuPreview($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$padding_hack);}
		if ($menustyle == "tigramenu" ){$content.= doTigraMenuPreview($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack);}
		if ($menustyle == "transmenu"){$content.= doTransMenuPreview($ordered, $swmenufree, $active_menu, $sub_indicator, $parent_id, $css_load,0,$show_shadow,$auto_position,$padding_hack,$overlay_hack=1);}
	    if ($menustyle == "superfishmenu" ){$content.= doSuperfishMenuPreview($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$padding_hack,$sub_active=0,$show_shadow, $sub_indicator,$overlay_hack=1);}
			
	}
}
$content.="\n<!--End swmenufree menu module-->\n";

}


function doGosuMenuPreview($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$padding_hack){
global $mosConfig_live_site;
echo previewHead();


echo '<script type="text/javascript" src="../modules/mod_swmenufree/ie5_Packed.js"></script>';
echo '<script type="text/javascript" src="../modules/mod_swmenufree/DropDownMenuX_Packed.js"></script>';



$manual=JRequest::getVar("preview",0);
if($manual==1){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($css_load){
	
echo "<link type='text/css' href='".$mosConfig_live_site."/modules/mod_swmenufree/styles/menu.css' rel='stylesheet' />\n";

}else{

if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenufree = fixPadding($swmenufree);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo gosuMenuStyle($swmenufree);
echo "\n-->\n";
	echo "</style>\n";
}
echo "</head><body>";
echo GosuMenu($ordered, $swmenufree, $active_menu,$selectbox_hack,$overlay_hack=1);
echo changeBgColor();
echo "</body></html>";
}


function doSuperfishMenuPreview($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$padding_hack,$sub_active,$show_shadow, $sub_indicator,$overlay_hack){
global $mosConfig_live_site;
echo previewHead();


echo '<script type="text/javascript" src="../modules/mod_swmenufree/jquery-1.2.6.pack.js"></script>';
echo '<script type="text/javascript" src="../modules/mod_swmenufree/hoverIntent.js"></script>';
echo '<script type="text/javascript" src="../modules/mod_swmenufree/superfish.js"></script>';
echo '<script type="text/javascript" src="../modules/mod_swmenufree/supersubs.js"></script>';



$manual=JRequest::getVar("preview",0);
if($manual==1){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($css_load){
	
echo "<link type='text/css' href='".$mosConfig_live_site."/modules/mod_swmenufree/styles/menu.css' rel='stylesheet' />\n";

}else{

if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenufree = fixPadding($swmenufree);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo superfishMenuStyle($swmenufree,$sub_indicator);
echo "\n-->\n";
	echo "</style>\n";
}
echo "</head><body>";
if (($swmenufree['main_width']==0) && ($swmenufree['orientation']=="vertical")){
echo "<div align=\"center\" style=\"margin:auto;width:200px;\" >";
}else{
echo "<div align=\"center\" style=\"margin:auto;\" >";	
}
echo SuperfishMenu($ordered, $swmenufree, $active_menu,$selectbox_hack,$sub_active,$show_shadow, $sub_indicator,$overlay_hack);
echo "</div>";
echo changeBgColor();
echo "</body></html>";
}



function doTigraMenuPreview($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack){
 $live_site = JURI::base();
echo previewHead();


echo '<script type="text/javascript" src="../modules/mod_swmenufree/menu_Packed.js"></script>';


$manual=JRequest::getVar("preview",0);
if($manual==1){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($css_load){
	
echo "<link type='text/css' href='".$live_site."/modules/mod_swmenufree/styles/menu.css' rel='stylesheet' />\n";

}else{

//if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenufree = fixPadding($swmenufree);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo tigraMenuStyle($swmenufree);
echo "\n-->\n";
	echo "</style>\n";
}
echo "</head><body>";
echo TigraMenu($ordered, $swmenufree, $active_menu,$overlay_hack=1);
echo changeBgColor();
echo "</body></html>";
}


function doTransMenuPreview($ordered, $swmenufree, $active_menu,  $sub_indicator, $parent_id, $css_load,$selectbox_hack,$show_shadow,$auto_position,$padding_hack,$overlay_hack=1){
global $mosConfig_live_site;
echo previewHead();
	
echo '<script type="text/javascript" src="../modules/mod_swmenufree/transmenu_Packed.js"></script>';
$manual=JRequest::getVar("preview",0);
if($manual==1){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace( '\\', '', $css );
	echo "\n-->\n";
	echo "</style>\n";
}else if($css_load){
	
echo "<link type='text/css' href='".$mosConfig_live_site."/modules/mod_swmenufree/styles/menu.css' rel='stylesheet' />\n";

}else{
if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenufree = fixPadding($swmenufree);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo transMenuStyle($swmenufree,$show_shadow);
echo "\n-->\n";
	echo "</style>\n";

}
echo "</head><body>";
echo transMenu($ordered, $swmenufree, $active_menu,  $sub_indicator, $parent_id,$selectbox_hack,$auto_position,$overlay_hack=1);
echo changeBgColor();
echo "</body></html>";
}


 
 function previewHead(){
 	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n<title>swMenuPro Menu Module Preview</title>\n";
	echo "<META HTTP-EQUIV=\"Pragma\" CONTENT=\"no-cache\" />";
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	"body{\nmargin-top:20px;height:100%;\n}\n";
	echo	"#bg_table{\nposition:absolute;top:400px;left:150px;\n}\n";
	echo "\n-->\n";
	echo "</style>\n";
	?>
<script type="text/javascript">
<!--
function changeBG(){
document.body.style.backgroundColor = document.getElementById('back_color').value;
}

-->
</script>
<?php
 }
 
function changeBgColor(){
?>
<br />
<table width="300" style="border:1px solid blue;" bgcolor="yellow" id="bg_table" ><tr>
<td align="center">Please Select Preview Background Color</td></tr><tr>
<td align="center">
<select name="back_color" id="back_color" onChange="changeBG();" style ="width:200px">
<option  value="white">white</option>
<option  value="red">red</option>
<option  value="blue">blue</option>
<option  value="green">green</option>
<option  value="aqua">aqua</option>
<option  value="black">black</option>
<option  value="gray">gray</option>
<option  value="lime">lime</option>
<option  value="maroon">maroon</option>
<option  value="navy">navy</option>
<option  value="olive">olive</option>
<option  value="purple">purple</option>
<option  value="silver">silver</option>
<option  value="teal">teal</option>
<option  value="yellow">yellow</option>
</select>
</td></tr>
<tr>
   <td align="center"><a href="#" onClick="window.close()">Close Window</a></td>
</tr>
</table>

    <?php
}
?>
 
    
 
