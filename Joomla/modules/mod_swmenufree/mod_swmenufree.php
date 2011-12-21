<?php
/**
* swmenufree v6.0 for Joomla1.5
* http://swmenupro.com
* Copyright 2007 Sean White
**/

//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
defined( '_JEXEC' ) or die( 'Restricted access' );


global  $my, $Itemid,$mainframe;

$absolute_path=JPATH_ROOT;
$live_site = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
$database = &JFactory::getDBO();
require_once($absolute_path."/modules/mod_swmenufree/styles.php");
require_once($absolute_path."/modules/mod_swmenufree/functions.php");

$do_menu=1;
$template = @$params->get( 'template' ) ? strval( $params->get('template') ) :  "All";
$language = @$params->get( 'language' ) ? strval( $params->get('language') ) :  "All";
$component = @$params->get( 'component' ) ? strval( $params->get('component') ) :  "All";

if($template!=""  && $template!="All"  ){
	if($mainframe->getTemplate()!=$template){$do_menu=0;}
}
if($language!=""  && $language!="All" ){
	if($lang!=$language){$do_menu=0;}
}
if($component!=""  && $component!="All" ){

	if(trim( JRequest::getVar( 'option', '' ) )!=$component){$do_menu=0;}
}

if($do_menu){

$menu = @$params->get( 'menutype' ) ? strval( $params->get('menutype') ) :  "mainmenu";
$id = @$params->get( 'moduleID' )?intval( $params->get('moduleID') ) :  0;
$menustyle = @$params->get( 'menustyle' )? strval( $params->get('menustyle') ) :  "popoutmenu";
$parent_level = @$params->get('parent_level') ? intval( $params->get('parent_level') ) :  0;
$levels = @$params->get('levels') ? intval( $params->get('levels') ) :  25;
$parent_id = @$params->get('parentid') ? intval( $params->get('parentid') ) :  0;
$active_menu = @$params->get('active_menu') ? intval( $params->get('active_menu') ) :  0;
$hybrid = @$params->get('hybrid') ? intval( $params->get('hybrid') ) :  0;
$editor_hack = @$params->get('editor_hack') ? intval( $params->get('editor_hack') ) :  0;
$sub_indicator = @$params->get('sub_indicator') ? intval( $params->get('sub_indicator') ) :  0;
$css_load = @$params->get('cssload') ? $params->get('cssload'): 0 ;
$use_table = @$params->get('tables') ? $params->get('tables'): 0 ;
$cache = @$params->get('cache') ? $params->get('cache'): 0 ;
$cache_time = @$params->get('cache_time') ? $params->get('cache_time'): "1 hour" ;
$selectbox_hack = @$params->get('selectbox_hack') ? intval( $params->get('selectbox_hack') ) :  0;
$padding_hack = @$params->get('padding_hack') ? intval( $params->get('padding_hack') ) :  0;
$overlay_hack = @$params->get('overlay_hack') ? intval( $params->get('overlay_hack') ) :  0;
$auto_position = @$params->get('auto_position') ? intval( $params->get('auto_position') ) :  0;
$show_shadow = @$params->get('show_shadow') ? intval( $params->get('show_shadow') ) :  0;

$my_task = trim( JRequest::getVar( 'task', '' ) );
if(($my_task=="edit" || $my_task=="new") && $editor_hack) {
  $editor_hack=0;
}else{
  $editor_hack=1;	
}


$query = "SELECT * FROM #__swmenufree_config WHERE id = 1";
$database->setQuery( $query );
$result = $database->loadObjectList();
$swmenufree=array();
while (list ($key, $val) = each ($result[0]))
{
    $swmenufree[$key]=$val;
}
$content= "\n<!--swMenuFree6.0 ".$menustyle." by http://www.swmenupro.com-->\n";   

if($menu && $id && $menustyle){
	if($css_load==1){
    	$headtag= "<link type='text/css' href='".$live_site."/modules/mod_swmenufree/styles/menu.css' rel='stylesheet' />\n";	
		$GLOBALS['mainframe']->addCustomHeadTag($headtag);
	}

	$ordered=swGetMenu($menu,$id,$hybrid,$cache,$cache_time,$use_table,$parent_id,$levels);
	if (count($ordered)){
    	
 		if ($active_menu){   
 	    	$active_menu=sw_getactive($ordered);
 	    }
 	    $ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $parent_id, $levels); 
 		
	}
	
	if(count($ordered)&&($swmenufree['orientation']=='horizontal/left')){
      $topcount=count(chain('ID', 'PARENT', 'ORDER', $ordered, $parent_id, 1));
      for($i=0;$i<count($ordered);$i++){
        $swmenu=$ordered[$i];
        if($swmenu['indent']==0){
          $ordered[$i]['ORDER']=$topcount;
          $topcount--;
        }
      }  
      $ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $parent_id, $levels);     
   }
$sub_active=0;
	if(count($ordered)){
		if ($menustyle == "mygosumenu" ){$content.= doGosuMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$padding_hack,$overlay_hack);}
		if ($menustyle == "transmenu"){$content.= doTransMenu($ordered, $swmenufree, $active_menu, $sub_indicator, $parent_id, $css_load,$selectbox_hack,$show_shadow,$auto_position,$padding_hack,$overlay_hack);}
		if ($menustyle == "tigramenu" ){$content.= doTigraMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$overlay_hack);}
		if ($menustyle == "superfishmenu" ){$content.= doSuperfishMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$padding_hack,$sub_active,$show_shadow, $sub_indicator,$overlay_hack);}
		
	}
}
$content.="\n<!--End swMenuFree menu module-->\n";

return $content;
}


function doGosuMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack, $padding_hack,$overlay_hack){
	 $live_site = JURI::base();
	  if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
	$str="";
	$headtag= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/DropDownMenuX_Packed.js\"></script>\n";
	if($overlay_hack){
	$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/jquery-1.2.6.pack.js\"></script>\n";
	}
    $GLOBALS['mainframe']->addCustomHeadTag($headtag);
	if(!$css_load){
		if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenufree = fixPadding($swmenufree);}
		$str.= "\n<style type='text/css'>\n";
		$str.= "<!--\n";
		$str.= gosuMenuStyle($swmenufree);
		$str.= "\n-->\n";
		$str.= "</style>\n";
		$GLOBALS['mainframe']->addCustomHeadTag($str);
	}
	$str = GosuMenu($ordered, $swmenufree, $active_menu,$selectbox_hack,$overlay_hack);
	return $str;
}

function doTransMenu($ordered, $swmenufree, $active_menu,  $sub_indicator, $parent_id, $css_load,$selectbox_hack,$show_shadow,$auto_position,$padding_hack,$overlay_hack){
	$live_site = JURI::base();
	 if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
	$str="";
	$headtag= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/transmenu_Packed.js\"></script>\n";
	if($overlay_hack){
	$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/jquery-1.2.6.pack.js\"></script>\n";
	}
	
    $GLOBALS['mainframe']->addCustomHeadTag($headtag);
   	if(!$css_load){
		if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenufree = fixPadding($swmenufree);}
		$str.= "\n<style type='text/css'>\n";
		$str.= "<!--\n";
		$str.= transMenuStyle($swmenufree,$show_shadow);
		$str.= "\n-->\n";
		$str.= "</style>\n";
		$GLOBALS['mainframe']->addCustomHeadTag($str);
	}
	$str = transMenu($ordered, $swmenufree, $active_menu,  $sub_indicator, $parent_id,$selectbox_hack,$auto_position,$overlay_hack);
	return $str;
}


function doTigraMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$overlay_hack){
	$live_site = JURI::base();
	
	 if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
	$str="";
	$headtag= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/menu_Packed.js\"></script>\n";
	if($overlay_hack){
	$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/jquery-1.2.6.pack.js\"></script>\n";
	}
    $GLOBALS['mainframe']->addCustomHeadTag($headtag);
	if(!$css_load){
		
		$str.= "\n<style type='text/css'>\n";
		$str.= "<!--\n";
		$str.= tigraMenuStyle($swmenufree);
		$str.= "\n-->\n";
		$str.= "</style>\n";
		$GLOBALS['mainframe']->addCustomHeadTag($str);
	}
	
	$str = TigraMenu($ordered, $swmenufree, $active_menu,$overlay_hack);
	return $str;
}

function doSuperfishMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack,$padding_hack,$sub_active,$show_shadow, $sub_indicator,$overlay_hack){
	$live_site=JURI::base();
	if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
	$str="";
	//$show_shadow=1;
	if(!$css_load){
	if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenufree = fixPadding($swmenufree);}
		$str.= "\n<style type='text/css'>\n";
		$str.= "<!--\n";
		$str.= superfishMenuStyle($swmenufree,$sub_indicator);
		$str.= "\n-->\n";
		$str.= "</style>\n";
		$GLOBALS['mainframe']->addCustomHeadTag($str);
	}
	
	$headtag="";
	$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/jquery-1.2.6.pack.js\"></script>\n";
	//$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/jquery.topzindex.min.js\"></script>\n";
	$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/hoverIntent.js\"></script>\n";
	$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/superfish.js\"></script>\n";
	$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/supersubs.js\"></script>\n";
		
	//if (!defined( '_swshadow_defined' )&&$show_shadow){
		//$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery.dropshadow.js\"></script>\n";
		//$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/shadedborder.js\"></script>\n";
		//define( '_swshadow_defined', 1 );
	//}
	$GLOBALS['mainframe']->addCustomHeadTag($headtag);
	
	$str= SuperfishMenu($ordered, $swmenufree, $active_menu,$selectbox_hack,$sub_active,$show_shadow, $sub_indicator,$overlay_hack);
	return $str;
}
?>



