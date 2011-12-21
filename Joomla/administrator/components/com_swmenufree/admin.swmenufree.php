<?php
/**
* swmenufree v6.0
* http://swmenupro.com
* Copyright 2006 Sean White
**/


// ensure this file is being included by a parent file
//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// no direct access
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Make sure the user is authorized to view this page
$user = & JFactory::getUser();
if (!$user->authorize( 'com_modules', 'manage' )) {
	$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}

jimport( 'joomla.application.component.controller' );
$absolute_path=JPATH_ROOT;

if (file_exists($absolute_path.'/administrator/components/com_swmenufree/language/default.ini'))
{
$filename = $absolute_path.'/administrator/components/com_swmenufree/language/default.ini';
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
	include($absolute_path.'/administrator/components/com_swmenufree/language/'.$contents);
}

require_once( JPATH_COMPONENT.DS.'admin.swmenufree.html.php' ) ;
//require_once( JPATH_COMPONENT.DS.'language'.DS.'english.php' ) ;
require_once( JPATH_COMPONENT.DS."admin.swmenufree.class.php");

$cid = JRequest::getVar( 'cid', array(0), 'post' );
if (!is_array( $cid )) {
	$cid = array(0);
}

//JTable::addTableDir(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_swmenufree'.DS.'tables');
switch ( JRequest::getVar( 'task' ) )
{
	case 'preview':
	preview($cid[0], $option );
	break;
	
	case 'images':
	imageManager($cid[0], $option );
	break;
	
	case 'imageFiles':
	imageFiles($cid[0], $option );
	break;
	
	case "saveedit":
	saveconfig($cid[0], $option);
	break;

	case 'changelanguage':
	changeLanguage( );
	break;
	
	case 'uploadfile':
	uploadPackage( );
	break;

	case "upgrade":
	upgrade($option);
	break;

	case "exportMenu":
	$msg= exportMenu($cid[0], $option);
	$mainframe->redirect( "index2.php?task=showmodules&option=$option&limit=$limit&limitstart=$limitstart",$msg );
	break;

	case "manualsave":
	saveCSS($cid[0], $option);
	break;

	case "editDhtmlMenu":
	editDhtmlMenu( $cid[0], $option );
	break;

	case "editCSS":
	editCSS( $cid[0], $option );
	break;

	default:
	editDhtmlMenu( $cid[0], $option );
	break;
}

function preview( &$cid, $option )
{	global $mainframe;
	$absolute_path=JPATH_ROOT;
	include($absolute_path.'/administrator/components/com_swmenufree/preview.php');
}

function imageManager( &$cid, $option )
{	global $mainframe;
	$absolute_path=JPATH_ROOT;
	include($absolute_path.'/administrator/components/com_swmenufree/ImageManager/manager.php');
}

function imageFiles( &$cid, $option )
{	global $mainframe;
	$absolute_path=JPATH_ROOT;
	include($absolute_path.'/administrator/components/com_swmenufree/ImageManager/images.php');
}

function editDhtmlMenu($id, $option){
	global $my, $mainframe;
	global $lang, $offset;
	$absolute_path=JPATH_ROOT;
	$db=$mainframe->getCfg( 'db' );
	$dbprefix=$mainframe->getCfg( 'dbprefix' );
$database = &JFactory::getDBO();
	$sql="SELECT id FROM #__modules where module='mod_swmenufree'";
	$database->setQuery($sql);
	$id=$database->loadResult();
	$swmenufree_array=array();
	$now = date( "Y-m-d H:i:s", time()+$offset*60*60 );

	$row 	=& JTable::getInstance('module');
	// load the row from the db table
	$row->load( $id );
	
	$registry = new JRegistry();
	$registry->loadINI($row->params);
	$params= $registry->toObject( );
	$menu = @$params->menutype ? $params->menutype : 'mainmenu';
	$menustyle = @$params->menustyle ? $params->menustyle : 'transmenu';
	$hybrid = @$params->hybrid ? $params->hybrid: 0 ;
	$css_load = @$params->cssload ? $params->cssload: 0 ;
	$use_table = @$params->tables ? $params->tables: 0 ;
	$moduleID = @$params->moduleID;
	$parent_id = @$params->parentid ? $params->parentid : '0';
	$modulename = $row->title;
	$cache = @$params->cache ? $params->cache : 0;
	$moduleclass_sfx = @$params->moduleclass_sfx ? $params->moduleclass_sfx : "";
	$cache_time = @$params->cache_time ? $params->cache_time : "1 hour";
	$active_menu = @$params->active_menu ? $params->active_menu : 0;
	$parent_level = @$params->parent_level ? $params->parent_level: 0;
	$levels = @$params->levels ? $params->levels: 0;
	$onload_hack = @$params->onload_hack ? $params->onload_hack: 0;
	$editor_hack = @$params->editor_hack ? $params->editor_hack: 0;
	$overlay_hack = @$params->overlay_hack ? $params->overlay_hack: 1;
	$sub_indicator = @$params->sub_indicator ? $params->sub_indicator: 2;
	$selectbox_hack = @$params->selectbox_hack ? $params->selectbox_hack: 0;
	$auto_position = @$params->auto_position ? $params->auto_position: 0;
	$padding_hack = @$params->padding_hack ? $params->padding_hack: 0;
	$show_shadow = @$params->show_shadow ? $params->show_shadow: 0;
	$template = @$params->template ? $params->template: "";
	$language = @$params->language ? $params->language: "";
	$component = @$params->component ? $params->component: "";

	
	if(!$id){
		$menustyle = JRequest::getVar(  'menutype', "superfishmenu" );
	}
		$row2 = new swmenufreeMenu( $database );
		$row2->load( '1' );
	
	if (!$row2->id){
		if (!$row2->gosumenu()) {
					echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
					exit();
				}
			$row2->id=1;
	}
	$padding1 = explode("px", $row2->main_padding);
	$padding2 = explode("px", $row2->sub_padding);
	for($i=0;$i<4; $i++){
		$padding1[$i]=trim($padding1[$i]);
		$padding2[$i]=trim($padding2[$i]);
	}
	$border1 = explode(" ", $row2->main_border);
	$border2 = explode(" ", $row2->sub_border);

	$border1[0]=rtrim(trim($border1[0]),'px');
	$border2[0]=rtrim(trim($border2[0]),'px');
	$border1[1]=trim($border1[1]);
	$border2[1]=trim($border2[1]);
	$border1[2]=trim($border1[2]);
	$border2[2]=trim($border2[2]);

	$border3 = explode(" ", $row2->main_border_over);
	$border4 = explode(" ", $row2->sub_border_over);

	$border3[0]=rtrim(trim($border3[0]),'px');
	$border4[0]=rtrim(trim($border4[0]),'px');
	$border3[1]=trim($border3[1]);
	$border4[1]=trim($border4[1]);
	$border3[2]=trim($border3[2]);
	$border4[2]=trim($border4[2]);

	$database->setQuery( "SELECT position, ordering, showtitle, title FROM #__modules WHERE client_id=0"
	. "\nORDER BY ordering"
	);
	if (!($orders = $database->loadObjectList())) {
		echo $database->stderr();
		return false;
	}
	$lists=array();
	// build the order lists to be used to make the javascript arrays

	// hard code options for now
	$orders2 = array();
	$orders2['left'] = array();
	$orders2['right'] = array();
	$orders2['top'] = array();
	$orders2['bottom'] = array();
	$orders2['inset'] = array();
	$orders2['user1'] = array();
	$orders2['user2'] = array();
	
	
	
	if(!(defined('_JLEGACY') && _JLEGACY == '1.0')){
	$orders2=getPositions();
	}
	
	
//while (list ($key) = each ($pos2[0]))
//{
  //  $orders2[$key]=array();
//}

	$l = 0;
	$r = 0;
	for ($i=0, $n=count( $orders ); $i < $n; $i++) {
		$ord = 0;
		if (array_key_exists( $orders[$i]->position, $orders2 )) {
			$ord =count( array_keys( $orders2[$orders[$i]->position] ) ) + 1;
		}
		$orders2[$orders[$i]->position][] = JHTML::_('select.option', $ord, $ord.'::'.addslashes( $orders[$i]->title ) );
	}

	// make an array for the left and right positions
	foreach ( array_keys( $orders2 ) as $v ) {
		$ord = count( array_keys( $orders2[$v] ) ) + 1;
		$orders2[$v][] = JHTML::_('select.option', $ord, $ord.'::last' );
		##$pos[] = JHTML::_('select.option', 'left' );
		##$pos[] = JHTML::_('select.option', 'right' );
		$pos[] = JHTML::_('select.option', $v );
	}
	
	//$pos3=getPositions();
	//echo count($orders2);
	//echo $pos3[0];
	// build the html select list
	$lists['module_position'] = JHTML::_('select.genericlist', $pos, 'position2',
	'class="inputbox" size="1" onchange="changeDynaList(\'ordering\',orders,this.options[this.selectedIndex].value, originalPos, originalOrder);"',
	'value', 'text', $row->position ? $row->position : 'left' );

	// get selected pages for $lists['selections']

	$query = 'SELECT menuid AS value FROM #__modules_menu WHERE moduleid='.$id;
	$database->setQuery( $query );
	$lookup = $database->loadObjectList();

	$cssload[]= JHTML::_('select.option', '0', _SW_CSS_DYNAMIC_SELECT );
	$cssload[]= JHTML::_('select.option', '1', _SW_CSS_LINK_SELECT );
	//$cssload[]= JHTML::_('select.option', '2', _SW_CSS_IMPORT_SELECT );
	$cssload[]= JHTML::_('select.option', '3', _SW_CSS_NONE_SELECT );
	$lists['cssload']= JHTML::_('select.genericlist', $cssload, 'cssload','id="cssload" class="inputbox" size="1" style="width:200px" ','value', 'text', $css_load ? $css_load : '0' );

	$cachet[]= JHTML::_('select.option', '10 seconds',  _SW_10SECOND_SELECT );
	$cachet[]= JHTML::_('select.option', '1 minute', _SW_1MINUTE_SELECT );
	$cachet[]= JHTML::_('select.option', '30 minutes', _SW_30MINUTE_SELECT );
	$cachet[]= JHTML::_('select.option', '1 hour', _SW_1HOUR_SELECT );
	$cachet[]= JHTML::_('select.option', '6 hours', _SW_6HOUR_SELECT );
	$cachet[]= JHTML::_('select.option', '12 hours', _SW_12HOUR_SELECT );
	$cachet[]= JHTML::_('select.option', '1 day', _SW_1DAY_SELECT );
	$cachet[]= JHTML::_('select.option', '3 days', _SW_3DAY_SELECT );
	$cachet[]= JHTML::_('select.option', '1 week', _SW_1WEEK_SELECT );
	$lists['cache_time']= JHTML::_('select.genericlist', $cachet, 'cache_time','id="cache_time" class="inputbox" size="1" style="width:200px" ','value', 'text', $cache_time ? $cache_time : '1 hour' );

	$tables[]= JHTML::_('select.option', '1', _SW_SHOW_TABLES_SELECT );
	$tables[]= JHTML::_('select.option', '0', _SW_SHOW_BLOGS_SELECT );
	$lists['tables']= JHTML::_('select.genericlist', $tables, 'tables','id="tables" class="inputbox" size="1" style="width:200px" ','value', 'text', $use_table ? $use_table : '0' );

	$lists['parent_level'] = JHTML::_('select.integerlist',0,10,1, 'parent_level', 'class="inputbox"', $parent_level );
	$lists['levels'] = JHTML::_('select.integerlist',0,10,1, 'levels', 'class="inputbox"', $levels );
	$lists['hybrid'] = JHTML::_('select.booleanlist', 'hybrid', 'class="inputbox"', $hybrid );
	$lists['active_menu'] = JHTML::_('select.booleanlist', 'active_menu', 'class="inputbox"', $active_menu );
	$lists['auto_position'] = JHTML::_('select.booleanlist', 'auto_position', 'class="inputbox"', $auto_position );
	$lists['padding_hack'] = JHTML::_('select.booleanlist', 'padding_hack', 'class="inputbox"', $padding_hack );
	$lists['cache'] = JHTML::_('select.booleanlist', 'cache', 'class="inputbox"', $cache );
	$lists['onload_hack'] = JHTML::_('select.booleanlist', 'onload_hack', 'class="inputbox"', $onload_hack );
	$lists['editor_hack'] = JHTML::_('select.booleanlist', 'editor_hack', 'class="inputbox"', $editor_hack );
	$lists['overlay_hack'] = JHTML::_('select.booleanlist', 'overlay_hack', 'class="inputbox"', $overlay_hack );

	
		
	$subindicator[]= JHTML::_('select.option', '0', 'none' );
	$subindicator[]= JHTML::_('select.option', '1', 'text arrows' );
	$subindicator[]= JHTML::_('select.option', '2', 'white arrows' );
	$subindicator[]= JHTML::_('select.option', '3', 'black arrows' );
	$subindicator[]= JHTML::_('select.option', '4', 'grey arrows' );
	$subindicator[]= JHTML::_('select.option', '5', 'blue arrows' );
	$subindicator[]= JHTML::_('select.option', '6', 'red arrows' );
	$subindicator[]= JHTML::_('select.option', '7', 'green arrows' );
	$subindicator[]= JHTML::_('select.option', '8', 'yellow arrows' );
	$lists['sub_indicator']= JHTML::_('select.genericlist', $subindicator, 'sub_indicator','id="sub_indicator" class="inputbox" size="1" style="width:200px" ','value', 'text', $sub_indicator ? $sub_indicator : '0' );

		
	
	$lists['selectbox_hack'] = JHTML::_('select.booleanlist', 'selectbox_hack', 'class="inputbox"', $selectbox_hack );
	$lists['show_shadow'] = JHTML::_('select.booleanlist', 'show_shadow', 'class="inputbox"', $show_shadow );

	$lists['showtitle'] = JHTML::_('select.booleanlist', 'showtitle', 'class="inputbox"', $row->showtitle?$row->showtitle:0);
	$lists['access'] 		= JHTML::_('list.accesslevel',  $row );
	// build the html select list for published
	$lists['published'] =JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $row->published?$row->published:0);

	$query = 'SELECT DISTINCT #__menu.menutype AS value FROM #__menu';
	$database->setQuery( $query );
	$menutypes = $database->loadObjectList();
	//$menutypes3[]= JHTML::_('select.option', '-999', 'Select Source Menu' );
	//$menutypes3[]= JHTML::_('select.option', '-999', '-----------------' );
	$menutypes3[]= JHTML::_('select.option', 'swcontentmenu', _SW_SOURCE_CONTENT_SELECT );
	$menutypes3[]= JHTML::_('select.option', '-999', '-----------------');
	if(file_exists($absolute_path."/components/com_virtuemart/virtuemart.php")){
	$menutypes3[]= JHTML::_('select.option', 'virtuemart', 'Virtuemart Component' );
	$menutypes3[]= JHTML::_('select.option', '-999', '-----------------');
	}
	$menutypes3[]= JHTML::_('select.option', '-999', _SW_SOURCE_EXISTING_SELECT );
	$menutypes3[]= JHTML::_('select.option', '-999','-----------------' );



	foreach($menutypes as $menutypes2){
		$menutypes3[]= JHTML::_('select.option', addslashes($menutypes2->value), addslashes($menutypes2->value) );
	}
	$lists['menutype']= JHTML::_('select.genericlist', $menutypes3, 'menutype',' id="menutype" class="inputbox" size="1" style="width:200px" onchange="changeDynaList(\'parentid\',orders2,document.getElementById(\'menutype\').options[document.getElementById(\'menutype\').selectedIndex].value, originalPos2, originalOrder2);"','value', 'text', $menu ? $menu : 'mainmenu' );
	$categories3[]= JHTML::_('select.option', 0, 'TOP' );


	$sql =  "SELECT DISTINCT #__sections.id AS value, #__sections.title AS text
                FROM #__sections                                    
                INNER JOIN #__content ON #__content.sectionid = #__sections.id
                AND #__sections.published = 1
                ";

	$database->setQuery( $sql );
	$sections = $database->loadObjectList();
	$categories3[]= JHTML::_('select.option', -999, '--------' );
	$categories3[]= JHTML::_('select.option', -999, 'Sections' );
	$categories3[]= JHTML::_('select.option', -999, '--------' );
	foreach($sections as $sections2){
		$categories3[]= JHTML::_('select.option', ($sections2->value), $sections2->text );
	}
	$categories3[]= JHTML::_('select.option', -999, '----------' );
	$categories3[]= JHTML::_('select.option', -999, 'Categories' );
	$categories3[]= JHTML::_('select.option', -999, '----------' );


	$sql =  "SELECT DISTINCT #__categories.id AS value, #__categories.title AS text
                FROM #__categories                                  
                INNER JOIN #__content ON #__content.catid = #__categories.id
                AND #__categories.published = 1
                ";
	$database->setQuery( $sql );
	$categories = $database->loadObjectList();

	foreach($categories as $categories2){
		$categories3[]= JHTML::_('select.option', ($categories2->value+1000), $categories2->text );
	}

	foreach($categories3 as $category){
		$menuitems['swcontentmenu'][] = JHTML::_('select.option', $category->value, addslashes($category->text) );

	}

if(file_exists($absolute_path."/components/com_virtuemart/virtuemart.php")){
	$categories4[]= JHTML::_('select.option', 0, 'All Categories (top)' );


	$sql =  "SELECT DISTINCT #__vm_category.category_id AS value, #__vm_category.category_name AS text
                FROM #__vm_category ";

	$database->setQuery( $sql );
	$sections = $database->loadObjectList();
	$categories4[]= JHTML::_('select.option', -999, '--------' );
	$categories4[]= JHTML::_('select.option', -999, 'Categories' );
	$categories4[]= JHTML::_('select.option', -999, '--------' );
	foreach($sections as $sections2){
		$categories4[]= JHTML::_('select.option', ($sections2->value), $sections2->text );
	}

	foreach($categories4 as $category){
		$menuitems['virtuemart'][] = JHTML::_('select.option', $category->value, addslashes($category->text) );

	}
}
	$menuitems2=array();
	$database->setQuery( "SELECT m.*"
	. "\n FROM #__menu m"
	//. "\n WHERE type != 'url'"
	. "\n WHERE type != 'separator'"
	. "\n AND published = '1'"
	. "\n ORDER BY menutype, parent, ordering"
	);
	$mitems = $database->loadObjectList();
	$mitems_temp = $mitems;

	// establish the hierarchy of the menu
	$children = array();
	// first pass - collect children
	foreach ( $mitems as $v ) {
		$id = $v->id;
		$pt = $v->parent;
		$list = @$children[$pt] ? $children[$pt] : array();
		array_push( $list, $v );
		$children[$pt] = $list;
	}
	// second pass - get an indent list of the items
	$list = swmenuTreeRecurse( intval( $mitems[0]->parent ), '', array(), $children );

	// Code that adds menu name to Display of Page(s)
	$text_count = "0";
	$mitems_spacer = "";
	foreach ($list as $list_a) {
		foreach ($mitems_temp as $mitems_a) {
			if ($mitems_a->id == $list_a->id) {
				// Code that inserts the blank line that seperates different menus
				if ($mitems_a->menutype <> $mitems_spacer) {
					$list_temp[] = JHTML::_('select.option', -99, '----' );
					$menuitems[$mitems_a->menutype][] = JHTML::_('select.option', 0, "TOP" );
					$mitems_spacer = $mitems_a->menutype;
				}
				$text = addslashes($mitems_a->menutype." / ".$list_a->treename);
				$text2 = addslashes($list_a->treename);
				$list_temp[] = JHTML::_('select.option', $list_a->id, $text );
				$menuitems[$mitems_a->menutype][] = JHTML::_('select.option', $list_a->id, $text2 );
				if ( strlen($text) > $text_count) {
					$text_count = strlen($text);
				}
			}
		}
	}
	$list = $list_temp;

	$mitems2 = array();
	$mitems2[] = JHTML::_('select.option', 0, 'All' );
	$mitems2[] = JHTML::_('select.option', -99, '----' );
	$mitems2[] = JHTML::_('select.option', -999, 'None' );

	foreach ($list as $item) {
		$mitems2[] = JHTML::_('select.option', $item->value, $item->text );
	}
	$lists['selections'] = JHTML::_('select.genericlist', $mitems2, 'selections[]', 'class="inputbox" size="20" style="width:580px" multiple="multiple"', 'value', 'text', $lookup?$lookup:0 );

	$database->setQuery( "SELECT DISTINCT #__templates_menu.template AS text FROM #__templates_menu WHERE client_id=0"	);
	$list = $database->loadObjectList();

	$template2 = array();
	$template2[] = JHTML::_('select.option', "All", 'All' );
	//$template[] = JHTML::_('select.option', -99, '----' );
	//$template[] = JHTML::_('select.option', -999, 'None' );

	foreach ($list as $item) {
		$template2[] = JHTML::_('select.option', $item->text, $item->text );
	}
	$lists['templates'] = JHTML::_('select.genericlist', $template2, 'template', 'class="inputbox"  style="width:130px" ', 'text', 'text', $template );

	if(TableExists($dbprefix."languages",$db)) {
	
	$database->setQuery( "SELECT DISTINCT #__languages.name AS text, #__languages.code AS value FROM #__languages"	);
	$list = $database->loadObjectList();

	$language2 = array();
	$language2[] = JHTML::_('select.option', "All", 'All' );
	//$template[] = JHTML::_('select.option', -99, '----' );
	//$template[] = JHTML::_('select.option', -999, 'None' );

	foreach ($list as $item) {
		$language2[] = JHTML::_('select.option', $item->value, $item->text );
	}
	$lists['languages'] = JHTML::_('select.genericlist', $language2, 'language', 'class="inputbox"  style="width:130px" ', 'value', 'text', $language );
	}else{
		
		$lists['languages']="Default";
	}
	$database->setQuery( "SELECT DISTINCT #__components.name AS text, #__components.option AS value FROM #__components WHERE link !=''"	);
	$list = $database->loadObjectList();

	$component2 = array();
	$component2[] = JHTML::_('select.option', "All", 'All' );
	$component2[] = JHTML::_('select.option', "com_content", 'Content' );
	//$template[] = JHTML::_('select.option', -999, 'None' );

	foreach ($list as $item) {
		$component2[] = JHTML::_('select.option', $item->value, $item->text );
	}
	$lists['components'] = JHTML::_('select.genericlist', $component2, 'component', 'class="inputbox"  style="width:130px" ', 'value', 'text', $component );

	$align[]= JHTML::_('select.option', 'left','left' );
	$align[]= JHTML::_('select.option', 'right','right' );
	$align[]= JHTML::_('select.option', 'texttop','texttop' );
	$align[]= JHTML::_('select.option', 'absmiddle','absmiddle' );
	$align[]= JHTML::_('select.option', 'baseline','baseline' );
	$align[]= JHTML::_('select.option', 'absbottom','absbottom' );
	$align[]= JHTML::_('select.option', 'bottom','bottom' );
	$align[]= JHTML::_('select.option', 'middle','middle' );
	$align[]= JHTML::_('select.option', 'top','top' );
	$lists['align']= JHTML::_('select.genericlist', $align, 'tree-image_align','id="tree-image_align" class="inputbox" onchange="treeInfoUpdate();"','value', 'text', '' );

	//$lists['showname'] = JHTML::_('select.genericlist', 'tree-image_showname', 'class="inputbox" id="tree-image_showname" onchange="treeInfoUpdate();"', 1 );
	//$lists['target'] = JHTML::_('select.genericlist', 'tree-image_target', 'class="inputbox" id="tree-image_target" onchange="treeInfoUpdate();"', 1 );
	//$lists['showitem'] = JHTML::_('select.genericlist', 'tree-image_showitem', 'class="inputbox" id="tree-image_showitem" onchange="treeInfoUpdate();"', 1 );

	
	$cssload=array();
	$cssload[]= JHTML::_('select.option', 'none', 'none' );
	$cssload[]= JHTML::_('select.option', 'solid', 'solid' );
	$cssload[]= JHTML::_('select.option', 'dashed', 'dashed' );
	$cssload[]= JHTML::_('select.option', 'inset', 'inset' );
	$cssload[]= JHTML::_('select.option', 'outset', 'outset' );
	$cssload[]= JHTML::_('select.option', 'grooved', 'grooved' );
	$cssload[]= JHTML::_('select.option', 'double', 'double' );
	$lists['main_border_style']= JHTML::_('select.genericlist', $cssload, 'main_border_style','id="main_border_style" class="inputbox" onchange="doMainBorder();" size="1" style="width:100px"','value', 'text', $border1[1] );
	$lists['sub_border_style']= JHTML::_('select.genericlist', $cssload, 'sub_border_style','id="sub_border_style" class="inputbox" onchange="doSubBorder();" size="1" style="width:100px"','value', 'text', $border2[1] );
	$lists['main_border_over_style']= JHTML::_('select.genericlist', $cssload, 'main_border_over_style','id="main_border_over_style" class="inputbox" onchange="doMainBorder();" size="1" style="width:100px"','value', 'text', $border3[1] );
	$lists['sub_border_over_style']= JHTML::_('select.genericlist', $cssload, 'sub_border_over_style','id="sub_border_over_style" class="inputbox" onchange="doSubBorder();" size="1" style="width:100px"','value', 'text', $border4[1] );

	
	$cssload=array();
	$cssload[]= JHTML::_('select.option', 'Arial, Helvetica, sans-serif', 'Arial, Helvetica, sans-serif' );
	$cssload[]= JHTML::_('select.option', '\'Times New Roman\', Times, serif', 'Times New Roman, Times, serif' );
	$cssload[]= JHTML::_('select.option', 'Georgia, \'Times New Roman\', Times, serif', 'Georgia, Times New Roman, Times, serif' );
	$cssload[]= JHTML::_('select.option', 'Verdana, Arial, Helvetica, sans-serif', 'Verdana, Arial, Helvetica, sans-serif' );
	$cssload[]= JHTML::_('select.option', 'Geneva, Arial, Helvetica, sans-serif', 'Geneva, Arial, Helvetica, sans-serif' );
	$cssload[]= JHTML::_('select.option', 'Tahoma, Arial, sans-serif', 'Tahoma, Arial, sans-serif' );
	$lists['font_family']= JHTML::_('select.genericlist', $cssload, 'font_family','id="font_family" class="inputbox" size="1" style="width:230px"','value', 'text', $row2->font_family );
	$lists['sub_font_family']= JHTML::_('select.genericlist', $cssload, 'sub_font_family','id="sub_font_family" class="inputbox" size="1" style="width:230px"','value', 'text', $row2->sub_font_family );

	
	$cssload=array();
	$cssload[]= JHTML::_('select.option', 'normal', 'normal' );
	$cssload[]= JHTML::_('select.option', 'bold', 'bold' );
	$cssload[]= JHTML::_('select.option', 'bolder', 'bolder' );
	$cssload[]= JHTML::_('select.option', 'lighter', 'lighter' );
	$lists['font_weight']= JHTML::_('select.genericlist', $cssload, 'font_weight','id="font_weight" class="inputbox" size="1" style="width:100px"','value', 'text', $row2->font_weight );
	$lists['font_weight_over']= JHTML::_('select.genericlist', $cssload, 'font_weight_over','id="font_weight_over" class="inputbox" size="1" style="width:100px"','value', 'text', $row2->font_weight_over );

	$cssload=array();
	$cssload[]= JHTML::_('select.option', 'left', 'left' );
	$cssload[]= JHTML::_('select.option', 'right', 'right' );
	$cssload[]= JHTML::_('select.option', 'center', 'center' );
	$cssload[]= JHTML::_('select.option', 'justify', 'justify' );
	$lists['main_align']= JHTML::_('select.genericlist', $cssload, 'main_align','id="main_align" class="inputbox" size="1" style="width:100px"','value', 'text', $row2->main_align );
	$lists['sub_align']= JHTML::_('select.genericlist', $cssload, 'sub_align','id="sub_align" class="inputbox" size="1" style="width:100px"','value', 'text', $row2->sub_align );

	$cssload=array();
	
		if($menustyle=="tigramenu"){
		$cssload[]= JHTML::_('select.option', 'absolute', 'absolute' );
		$cssload[]= JHTML::_('select.option', 'relative', 'relative' );
		
	}else{
		$cssload[]= JHTML::_('select.option', 'left', 'left' );
		$cssload[]= JHTML::_('select.option', 'right', 'right' );
		$cssload[]= JHTML::_('select.option', 'center', 'center' );
	}
	
	$lists['position']= JHTML::_('select.genericlist', $cssload, 'position','id="position" class="inputbox" size="1" style="width:120px"','value', 'text', $row2->position ? $row2->position : '0' );

	$cssload=array();
	
		$cssload[]= JHTML::_('select.option', 'transmenu', _SW_TRANS_MENU );
		$cssload[]= JHTML::_('select.option', 'mygosumenu', _SW_MYGOSU_MENU );
		$cssload[]= JHTML::_('select.option', 'tigramenu', _SW_TIGRA_MENU );
		$cssload[]= JHTML::_('select.option', 'superfishmenu', _SW_SUPERFISH_MENU );
		
	$lists['menustyle']= JHTML::_('select.genericlist', $cssload, 'menustyle','id="menustyle" class="inputbox" size="1" onChange="changeOrientation();" style="width:200px"','value', 'text', $menustyle ? $menustyle : 'transmenu' );

	
	$cssload=array();
	if($menustyle=="transmenu"){
		$cssload[]= JHTML::_('select.option', 'horizontal/down', 'horizontal/down/right' );
		$cssload[]= JHTML::_('select.option', 'vertical/right', 'vertical/right' );
		$cssload[]= JHTML::_('select.option', 'horizontal/up', 'horizontal/up' );
		$cssload[]= JHTML::_('select.option', 'vertical/left', 'vertical/left' );
		$cssload[]= JHTML::_('select.option', 'horizontal/left', 'horizontal/down/left' );
	}else{
		$cssload[]= JHTML::_('select.option', 'horizontal', 'horizontal' );
		$cssload[]= JHTML::_('select.option', 'vertical', 'vertical' );
	}
	$lists['orientation']= JHTML::_('select.genericlist', $cssload, 'orientation','id="orientation" class="inputbox" size="1" style="width:120px"','value', 'text', $row2->orientation ? $row2->orientation : '0' );

	
	
	$extra2[]= JHTML::_('select.option', '0', _SW_SPECIAL_EFFECTS_NONE );
	$extra2[]= JHTML::_('select.option', '1', 'fade in' );
	$extra2[]= JHTML::_('select.option', '2', 'slide down' );
	$extra2[]= JHTML::_('select.option', '3', 'slide right' );
	$extra2[]= JHTML::_('select.option', '4', 'fade in - slide down' );
	$extra2[]= JHTML::_('select.option', '5', 'fade in - slide right' );
	//$extra2[]= JHTML::_('select.option', '6', 'slide down' );
	$lists['extra']= JHTML::_('select.genericlist', $extra2, 'extra','id="extra" class="inputbox" size="1" style="width:200px" ','value', 'text', $row2->extra ? $row2->extra : 'none' );
	
	//echo $menustyle;
	HTML_swmenufree::MenuConfig( $menustyle,$row2,$row, $menu, $padding1, $padding2, $border1, $border2, $border3, $border4, $modulename, $parent_id,$orders2, $lists,$menuitems,$moduleclass_sfx);
	HTML_swmenufree::footer( );
		

}



function saveconfig($id, $option){

	global $my, $mainframe, $dbprefix;
	global $lang, $offset,$db;
	$absolute_path=JPATH_ROOT;
$database = &JFactory::getDBO();

	$moduleid = JRequest::getVar(  'moduleID', array(0) );
	$menutype = JRequest::getVar(  'menutype', "mainmenu" );
	$menu = JRequest::getVar(  'menuid', array() );
	$export = JRequest::getVar(  'export2', 0 );
	
	$msg=_SW_SAVE_MENU_MESSAGE;

	$row 	=& JTable::getInstance('module' );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->position=JRequest::getVar("position2", "left");
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	//$row->updateOrder( "position='$row->position'" );

	$row->module="mod_swmenufree";

	$parent_id=JRequest::getVar(  'parentid', 0 );
	$levels=JRequest::getVar(  'levels', 0 );

	$moduleID = $row->id;
	$menustyle = JRequest::getVar(  'menustyle', 'popoutmenu' );
	$css_load = JRequest::getVar(  'cssload', 0 );
	$hybrid = JRequest::getVar(  'hybrid', 0 );
	$active_menu = JRequest::getVar(  'active_menu', 0 );
	$editor_hack = JRequest::getVar(  'editor_hack', 0 );
	$parent_level = JRequest::getVar(  'parent_level', 0 );
	$cache = JRequest::getVar(  'cache', 0 );
	$cache_time = JRequest::getVar(  'cache_time', "1 hour" );
	$moduleclass_sfx = JRequest::getVar(  'moduleclass_sfx', "" );
	$tables = JRequest::getVar(  'tables', 0 );
	$auto_position = JRequest::getVar(  'auto_position', 0 );
	$padding_hack = JRequest::getVar(  'padding_hack', 0 );
	$overlay_hack = JRequest::getVar(  'overlay_hack', 0 );

	$sub_indicator = JRequest::getVar(  'sub_indicator', 0 );

	$selectbox_hack = JRequest::getVar(  'selectbox_hack', 0 );
	$show_shadow = JRequest::getVar(  'show_shadow', 0 );

	$template = JRequest::getVar(  'template', "" );
	$language = JRequest::getVar(  'language', "" );

	$component = JRequest::getVar(  'component', "" );



	if(($row->module != "mod_mainmenu")){
		$params = "menutype=".$menutype."\n";
		$params.= "menustyle=".$menustyle."\n";
		$params.= "moduleID=".$row->id."\n";
		$params.= "levels=".$levels."\n";
		$params.= "parentid=".$parent_id."\n";
		$params.= "parent_level=".$parent_level."\n";
		$params.= "hybrid=".$hybrid."\n";
		$params.= "active_menu=".$active_menu."\n";
		$params.= "tables=".$tables."\n";
		$params.= "cssload=".$css_load."\n";
		$params.= "sub_indicator=".$sub_indicator."\n";
		$params.= "selectbox_hack=".$selectbox_hack."\n";
		$params.= "show_shadow=".$show_shadow."\n";
		$params.= "padding_hack=".$padding_hack."\n";
		$params.= "overlay_hack=".$overlay_hack."\n";
		$params.= "auto_position=".$auto_position."\n";
		$params.= "cache=".$cache."\n";
		$params.= "cache_time=".$cache_time."\n";
		$params.= "moduleclass_sfx=".$moduleclass_sfx."\n";
		$params.= "editor_hack=".$editor_hack."\n";
		$params.= "template=".$template."\n";
		$params.= "language=".$language."\n";
		$params.= "component=".$component."\n";
		$row->params = $params;




		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
	}

	$menus = JRequest::getVar( 'selections', array() );
	$database->setQuery( "DELETE FROM #__modules_menu WHERE moduleid='$row->id'" );
	$database->query();

	foreach ($menus as $menuid){
		$database->setQuery( "INSERT INTO #__modules_menu"
		. "\nSET moduleid='$row->id', menuid='$menuid'"
		);
		$database->query();
	}



$id2=$row->id;


	$row = new swmenufreeMenu( $database );

	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	$row->id=1;

	$database->setQuery( "SELECT COUNT(*) FROM #__swmenufree_config");
	$database->query();
	$count=$database->loadResult();

	if($count >= 1) {
		$ret = $row->_db->updateObject( $row->_tbl, $row, $row->_tbl_key );
	} else {
		$ret = $row->_db->insertObject( $row->_tbl, $row, $row->_tbl_key );
	}
	
	if($export){

		$msg=exportMenu($id2,$option);
	}
	if($cache){
		$file = $absolute_path."/modules/mod_swmenufree/cache/menu.cache";
		$data="";

		if ( !file_exists($file)){
			touch ($file);
			$handle = fopen ($file, 'w'); // Let's open for read and write
			// $filedate=$now;
			$swmenufree_array=swGetMenuLinks2($menutype,$row->id,$hybrid,$tables);
			$ordered = chain2('ID', 'PARENT', 'ORDER', $swmenufree_array, $parent_id, $levels);
			foreach ($ordered as $swarray){
				$data.=implode("'..'",$swarray)."\n";
			}
			fwrite ($handle, $data); // Don't forget to increment the counter
			fclose ($handle); // Done
		}else{
			$handle = fopen ($file, 'w'); // Let's open for read and write
			$swmenufree_array=swGetMenuLinks2($menutype,$row->id,$hybrid,$tables);
			$ordered = chain2('ID', 'PARENT', 'ORDER', $swmenufree_array, $parent_id, $levels);
			foreach ($ordered as $swarray){
				$data.=implode("'..'",$swarray)."\n";
			}
			fwrite ($handle, $data); // Don't forget to increment the counter
			fclose ($handle);
		}

	}



	$mainframe->redirect( "index2.php?option=$option",$msg );
	
}



function exportMenu($id,$option){
	global $my, $mainframe, $dbprefix;
	global $lang, $offset,$db;
	$absolute_path=JPATH_ROOT;
$database = &JFactory::getDBO();
	include( $absolute_path . "/modules/mod_swmenufree/styles.php");
	$css="";

	$database->setQuery( "SELECT * FROM #__swmenufree_config WHERE id='1'");
	$new_data = $database->query();
	$swmenufree= mysql_fetch_assoc($new_data);

	$row 	=& JTable::getInstance('module' );
	// load the row from the db table
	$row->load( $id );
	$registry = new JRegistry();
	$registry->loadINI($row->params);
	$params= $registry->toObject( );
	$menu = @$params->menutype ? $params->menutype : 'mainmenu';
	$menustyle = @$params->menustyle;
	$hybrid = @$params->hybrid ? $params->hybrid: 0 ;
	$css_load = @$params->cssload ? $params->cssload: 0 ;
	$use_table = @$params->tables ? $params->tables: 0 ;
	$levels = @$params->levels ? $params->levels: 25 ;
	$show_shadow = @$params->show_shadow ? $params->show_shadow: 0 ;
	$sub_indicator = @$params->sub_indicator ? $params->sub_indicator: 0 ;
	$moduleID = @$params->moduleID;
	$parent_id = @$params->parentid ? $params->parentid : '0';
	$modulename = $row->title;

	//echo $menustyle;
	switch ($menustyle)
	{
		case "mygosumenu":
		$css=   gosuMenuStyle($swmenufree);
		break;
		case "superfishmenu":
		$css=   superfishMenuStyle($swmenufree,$sub_indicator);
		break;
		case "tigramenu":
		$css=   tigraMenuStyle($swmenufree);
		break;
		case "transmenu":
		$css=  transMenuStyle($swmenufree,$show_shadow);
		break;
		
	}

//echo "css:".$css;
	$file = $absolute_path."/modules/mod_swmenufree/styles/menu.css";
	if ( !file_exists($file)){
		touch ($file);
		$handle = fopen ($file, 'w'); // Let's open for read and write


	}
	else{
		$handle = fopen ($file, 'w'); // Let's open for read and write

	}
	rewind ($handle); // Go back to the beginning

	if(fwrite ($handle, $css)){
		$msg=_SW_SAVE_MENU_CSS_MESSAGE;
	}else{
		$msg=_SW_NO_SAVE_MENU_CSS_MESSAGE;
	} // Don't forget to increment the counter

	fclose ($handle); // Done


	return $msg;
}

function saveCSS($id, $option){

	global  $mainframe;
$absolute_path=JPATH_ROOT;

	$returntask = JRequest::getVar(  'returntask', "showmodules" );
	$css=JRequest::getVar( 'filecontent',"");
	$id=JRequest::getVar( 'id',0);

	$css=str_replace( '\\', '', $css );
	$file = $absolute_path."/modules/mod_swmenufree/styles/menu.css";
	if ( !file_exists($file)){
		touch ($file);
		$handle = fopen ($file, 'w'); // Let's open for read and write


	}
	else{
		$handle = fopen ($file, 'w'); // Let's open for read and write

	}
	rewind ($handle); // Go back to the beginning

	fwrite ($handle, $css); // Don't forget to increment the counter
	fclose ($handle); // Done


	//echo $css;
	
	$msg=_SW_SAVE_CSS_MESSAGE;

	if($returntask=="editCSS"){
		sleep(3);
		echo "<dl id=\"system-message\"><dt class=\"message\">Message</dt>
		<dd class=\"message message fade\"><ul><li>".$msg."</li>
	   </ul></dd></dl>\n";
		editCSS($id, $option);

	}else{
		$mainframe->redirect( "index2.php?option=$option",$msg );
	}

}


function editCSS( $id,$option ) {
	global $mainframe;
	$absolute_path=JPATH_ROOT;
	if(!$id){$id=intval( JRequest::getVar( 'id', 0 ) );}
	
	$file = $absolute_path .'/modules/mod_swmenufree/styles/menu.css';
	

	if ($fp = fopen( $file, 'r' )) {
		$content = fread( $fp, filesize( $file ) );
		//$content = htmlspecialchars( $content );
		$database = &JFactory::getDBO();
	
	$row 	=& JTable::getInstance('module' );
	// load the row from the db table
	$row->load( $id );
	
	$registry = new JRegistry();
	$registry->loadINI($row->params);
	$params= $registry->toObject( );
		$menu->source = @$params->menutype ? $params->menutype : 'mainmenu';
		$menu->name=$row->title;
		HTML_swmenufree::editCSS($id, $content,$menu);
		HTML_swmenufree::footer( );
	} else {
		$mainframe->redirect( 'index2.php?option='. $option .'&client='. $client, 'Operation Failed: Could not open'. $file );
	}
}



function chain2($primary_field, $parent_field, $sort_field, $rows, $root_id=0, $maxlevel=25)
{
	$c = new chain2($primary_field, $parent_field, $sort_field, $rows, $root_id, $maxlevel);
	return $c->chainmenu_table;
}

class chain2
{
	var $table;
	var $rows;
	var $chainmenu_table;
	var $primary_field;
	var $parent_field;
	var $sort_field;

	function chain2($primary_field, $parent_field, $sort_field, $rows, $root_id, $maxlevel)
	{
		$this->rows = $rows;
		$this->primary_field = $primary_field;
		$this->parent_field = $parent_field;
		$this->sort_field = $sort_field;
		$this->buildchain($root_id,$maxlevel);
	}

	function buildchain($rootcatid,$maxlevel)
	{
		$row_array = array_values($this->rows);
		$row_array_size = sizeOf($row_array);
		for ($i=0;$i<$row_array_size;$i++)
		{
			$row = $row_array[$i];
			$this->table[$row[$this->parent_field]][ $row[$this->primary_field]] = $row;
		}
		$this->makeBranch($rootcatid,0,$maxlevel);
	}


	function makeBranch($parent_id,$level,$maxlevel)
	{
		$rows=$this->table[$parent_id];
		$key_array1 = array_keys($rows);
		$key_array_size1 = sizeOf($key_array1);
		for ($j=0;$j<$key_array_size1;$j++)
		//  foreach($rows as $key=>$value)
		{
			$key = $key_array1[$j];
			$rows[$key]['key'] = $this->sort_field;
		}

		usort($rows,'chainmenuCMP2');
		$row_array = array_values($rows);
		$row_array_size = sizeOf($row_array);
		for ($i=0;$i<$row_array_size;$i++)
		// foreach($rows as $item)
		{
			$item = $row_array[$i];
			$item['ORDER']=($i+1);
			$item['indent'] = $level;
			$this->chainmenu_table[] = $item;
			if((isset($this->table[$item[$this->primary_field]])) && (($maxlevel>$level+1) || ($maxlevel==0)))
			{
				$this->makeBranch($item[$this->primary_field], $level+1, $maxlevel);
			}
		}
	}
}

function chainmenuCMP2($a,$b)
{
	if($a[$a['key']] == $b[$b['key']])
	{
		return 0;
	}
	return($a[$a['key']]<$b[$b['key']])?-1:1;
}


function swmenuTreeRecurse($id, $indent, $list, &$children, $maxlevel=9999, $level=0) {
	if (@$children[$id] && $level <= $maxlevel) {
		foreach ($children[$id] as $v) {
			$id = $v->id;
			$txt = $v->name;
			$pt = $v->parent;
			$list[$id] = $v;
			$list[$id]->treename = "$indent$txt";
			$list[$id]->children = count( @$children[$id] );
			$list = swmenuTreeRecurse( $id, "$indent$txt/", $list, $children, $maxlevel, $level+1 );
		}
	}
	return $list;
}





function swGetMenuLinks2($menu,$id,$hybrid,$use_tables){
	global $lang, $mbf_content,$my,$absolute_path,$offset;
	$now = date( "Y-m-d H:i:s", time()+$offset*60*60 );
	$database 	=& JFactory::getDBO();
	$swmenufree_array=array();
	if ($menu=="swcontentmenu") {
		$sql =  "SELECT #__sections.* 
                FROM #__sections 
                INNER JOIN #__content ON #__content.sectionid = #__sections.id
                AND #__sections.published = 1
                AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now'  )
                AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now' )
                ORDER BY #__content.ordering
                ";
		$database->setQuery( $sql   );
		$result = $database->loadObjectList();

		for($i=0;$i<count($result);$i++) {
			$result2=$result[$i];
			
			if($use_tables){
				$url="index.php?option=com_content&task=section&id=" . $result2->id ;
			}else{
				$url="index.php?option=com_content&task=blogsection&id=" . $result2->id ;
			}

			$swmenufree_array[] =array("TITLE" => $result2->title, "URL" =>  $url , "ID" => $result2->id  , "PARENT" => 0 ,  "ORDER" => $result2->ordering, "TARGET" => 0,"ACCESS" => $result2->access );
		}

		$sql =  "SELECT #__categories.* 
				FROM #__categories
                INNER JOIN #__content ON #__content.catid = #__categories.id

                AND #__categories.published = 1
                AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now'  )
                AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now' )
                ORDER BY #__content.ordering
                ";

		$database->setQuery( $sql   );
		$result = $database->loadObjectList();

		for($i=0;$i<count($result);$i++) {
			$result2=$result[$i];

						
			if($use_tables){
				$url="index.php?option=com_content&task=category&id=" . $result2->id ;
			}else{
				$url="index.php?option=com_content&task=blogcategory&id=" . $result2->id ;
			}

			$swmenufree_array[] =array("TITLE" => $result2->title, "URL" =>  $url , "ID" => $result2->id+1000  , "PARENT" => $result2->section ,  "ORDER" => $result2->ordering, "TARGET" => 0,"ACCESS" => $result2->access );
		}

		$sql =  "SELECT #__content.* 
				FROM #__content
                INNER JOIN #__categories ON #__content.catid = #__categories.id
                AND #__content.state = 1
                AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now'  )
                AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now' )
                ORDER BY #__content.ordering
                ";
		$database->setQuery( $sql   );
		$result = $database->loadObjectList();

		for($i=0;$i<count($result);$i++) {
			$result2=$result[$i];

			$url="index.php?option=com_content&task=view&id=" . $result2->id ;
			$swmenufree_array[] =array("TITLE" => $result2->title, "URL" =>  $url , "ID" => $result2->id+10000  , "PARENT" => $result2->catid+1000 ,  "ORDER" => $result2->ordering, "TARGET" => 0,"ACCESS" => $result2->access  );
		}
	}else if ($menu=="virtuemart") {
		$sql =  "SELECT #__vm_category.* ,#__vm_category_xref.*
		         FROM #__vm_category 
                INNER JOIN #__vm_category_xref ON #__vm_category_xref.category_child_id= #__vm_category.category_id
                AND #__vm_category.category_publish = 'Y'
                ORDER BY #__vm_category.list_order
                ";
		$database->setQuery( $sql   );
		$result = $database->loadObjectList();

		for($i=0;$i<count($result);$i++) {
			$result2=$result[$i];
			$url="index.php?option=com_virtuemart&page=shop.browse&category_id=" . $result2->category_id . "&Itemid=".($result2->category_id+10000) ;
			$swmenufree_array[] =array("TITLE" => $result2->category_name, "URL" =>  $url , "ID" => ($result2->category_id+10000)  , "PARENT" => ($result2->category_parent_id?($result2->category_parent_id+10000):0) ,  "ORDER" => $result2->list_order, "TARGET" => 0,"ACCESS" => 0 );
		}
	}else{
		if ($hybrid){
				$sql =  "SELECT #__content.*
				FROM #__content
                INNER JOIN #__categories ON #__content.catid = #__categories.id
                AND #__content.state = 1
                AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now'  )
                AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now' )
                ORDER BY #__content.catid,#__content.ordering
                ";
			$database->setQuery( $sql   );
			$hybrid_content = $database->loadObjectList();	
			
			
			$sql =  "SELECT #__categories.*
				FROM #__categories
                WHERE #__categories.published = 1
                ORDER BY #__categories.ordering
                ";
			$database->setQuery( $sql   );
			$hybrid_cat = $database->loadObjectList();		
		}
				
		$sql = "SELECT #__menu.* 
				FROM #__menu
                WHERE #__menu.menutype = '".$menu."' AND published = '1'
                ORDER BY parent, ordering
            ";

		$database->setQuery( $sql   );
		$result = $database->loadObjectList();

		$swmenufree_array=array();

		for($i=0;$i<count($result);$i++) {
			$result2=$result[$i];
			

			switch ($result2->type) {
				case 'separator';
				//$result2->link = "seperator";
				break;

				case 'url':
				if (preg_match( "/index.php\?/i", $result2->link )) {
					if (!preg_match( "/Itemid=/i", $result2->link )) {
						$result2->link .= "&Itemid=$result2->id";
					}
				}
				break;

				default:
				$result2->link .= "&Itemid=$result2->id";
				break;
			}
			$swmenufree_array[] =array("TITLE" => $result2->name, "URL" =>  $result2->link , "ID" => $result2->id  , "PARENT" => $result2->parent ,  "ORDER" => $result2->ordering, "TARGET" => $result2->browserNav,"ACCESS" => $result2->access );

			if ($hybrid){
				$opt=array();
				parse_str($result2->link, $opt);
				$opt['task'] = @$opt['task'] ? $opt['task']: 0;
				$opt['id'] = @$opt['id'] ? $opt['id']: 0;
				
				
				if ($opt['task']=="blogcategory" || $opt['task']=="category" ) {
					
				for($j=0;$j<count($hybrid_content);$j++){	
					$row=$hybrid_content[$j];
					if($row->catid==$opt['id']){
						
							$url="index.php?option=com_content&task=view&id=" . $row->id ."&Itemid=".$result2->id;
							$swmenufree_array[] =array("TITLE" => $row->title, "URL" =>  $url , "ID" => $row->id+100000  , "PARENT" => $result2->id ,  "ORDER" => $row->ordering, "TARGET" => 0,"ACCESS" => $row->access );
						}	
					}
				}else if ($opt['task']=="blogsection" || $opt['task']=="section" ) {	
				
				for($j=0;$j<count($hybrid_cat);$j++){	
				$row=$hybrid_cat[$j];
					if($row->section==$opt['id'] && $opt['id']){
						//$j=count($hybrid_cat);
														
							if($use_tables){
							$url="index.php?option=com_content&task=category&id=".$row->id."&Itemid=".$result2->id;
							}else{
							$url="index.php?option=com_content&task=blogcategory&id=".$row->id."&Itemid=".$result2->id;
							}
							$swmenufree_array[] =array("TITLE" => $row->title, "URL" =>  $url , "ID" => $row->id+10000  , "PARENT" => $result2->id ,  "ORDER" => $row->ordering, "TARGET" => 0,"ACCESS" => $row->access );
							
							for($k=0;$k<count($hybrid_content);$k++){	
							$row2=$hybrid_content[$k];
								if($row2->catid==$row->id){
									
									$url="index.php?option=com_content&task=view&id=" . $row2->id ."&Itemid=".$result2->id;
									$swmenufree_array[] =array("TITLE" => $row2->title, "URL" =>  $url , "ID" => $row2->id+100000  , "PARENT" => $row->id+10000 ,  "ORDER" => $row2->ordering, "TARGET" => 0,"ACCESS" => $row2->access );
									}	
								}
							}
						}
					}		
				}
			}
		}

	return $swmenufree_array;
}



function get_Version($directory){

	global $mainframe;
	
	require_once( JPATH_ROOT.DS.'includes/domit/xml_domit_lite_include.php' );
	$componentBaseDir	= $directory;


	$xmlDoc = new DOMIT_Lite_Document();
	$xmlDoc->resolveErrors( true );

	if (!$xmlDoc->loadXML( $directory , false, true )) {
		continue;
	}
//echo $xmlDoc->documentElement;
	$root = &$xmlDoc->documentElement;


	$element 			= &$root->getElementsByPath('version', 1);
	$version 		= $element ? $element->getText() : '';

return $version;


}


function changeLanguage(){
	
	global $mainframe;
	$absolute_path=JPATH_ROOT;
	
	$lang=JRequest::getVar( 'language', "english.php" );
	
	
	$file = $absolute_path."/administrator/components/com_swmenufree/language/default.ini";
	if ( !file_exists($file)){
		touch ($file);
		$handle = fopen ($file, 'w'); // Let's open for read and write


	}
	else{
		$handle = fopen ($file, 'w'); // Let's open for read and write

	}
	rewind ($handle); // Go back to the beginning

	if(fwrite ($handle, $lang)){
	//	$msg=_SW_SAVE_MENU_CSS_MESSAGE;
	}else{
	//	$msg=_SW_NO_SAVE_MENU_CSS_MESSAGE;
	} // Don't forget to increment the counter

	fclose ($handle); // Done

	
	$mainframe->redirect( "index.php?task=upgrade&option=com_swmenufree",$msg );
	
	
	
}

function upgrade($option,$installdir=""){

	global $mainframe;
	
	

	//require_once( $absolute_path . '/includes/domit/xml_domit_lite_include.php' );
	//$componentBaseDir	= mosPathName( $absolute_path . '/administrator/components/' );
	//$componentDirs 		= mosReadDirectory( $componentBaseDir );
	
	$database		=& JFactory::getDBO();
	$absolute_path=JPATH_ROOT;
	$db=$mainframe->getCfg( 'db' );
	$dbprefix=$mainframe->getCfg( 'dbprefix' );
	//echo $db;
	$row->message="";
	$row->database_version=1;
	$columncount=0;
	
	if(TableExists($dbprefix."swmenufree_config",$db)){
		$query = "SELECT * FROM #__swmenufree_config WHERE id = 1";
$database->setQuery( $query );
$result = $database->loadObjectList();
$swmenufree=array();
if ($result){
while (list ($key, $val) = each ($result[0]))
{
	//echo "1";
	$columncount++;
    $swmenufree[$key]=$val;
}
}
//echo count($swmenufree);
	  if($columncount<42 && $columncount>1){
	  	$row->message.=sprintf(_SW_TABLE_UPGRADE,'#__swmenufree_config')."<br />";
	  	$database->setQuery("ALTER TABLE `#__swmenufree_config` 
  			ADD `extra` mediumtext,
  			MODIFY orientation varchar(20)
 			 ");
		$database->query();
	  	$row->database_version=0;
	  }
	}else{
		$row->message.=sprintf(_SW_TABLE_CREATE,'#__swmenufree_config')."<br />";
		$database->setQuery("CREATE TABLE `#__swmenufree_config` (
  `id` int(11) NOT NULL default '0',
  `main_top` smallint(8) default '0',
  `main_left` smallint(8) default '0',
  `main_height` smallint(8) default '20',
  `sub_border_over` varchar(30) default '0',
  `main_width` smallint(8) default '100',
  `sub_width` smallint(8) default '100',
  `main_back` varchar(7) default '#4682B4',
  `main_over` varchar(7) default '#5AA7E5',
  `sub_back` varchar(7) default '#4682B4',
  `sub_over` varchar(7) default '#5AA7E5',
  `sub_border` varchar(30) default '#FFFFFF',
  `main_font_size` smallint(8) default '0',
  `sub_font_size` smallint(8) default '0',
  `main_border_over` varchar(30) default '0',
  `sub_font_color` varchar(7) default '#000000',
  `main_border` varchar(30) default '#FFFFFF',
  `main_font_color` varchar(7) default '#000000',
  `sub_font_color_over` varchar(7) default '#FFFFFF',
  `main_font_color_over` varchar(7) default '#FFFFFF',
  `main_align` varchar(8) default 'left',
  `sub_align` varchar(8) default 'left',
  `sub_height` smallint(7) default '20',
  `position` varchar(10) default 'absolute',
  `orientation` varchar(20) default NULL,
  `font_family` varchar(50) default 'Arial',
  `font_weight` varchar(10) default 'normal',
  `font_weight_over` varchar(10) default 'normal',
  `level2_sub_top` int(11) default '0',
  `level2_sub_left` int(11) default '0',
  `level1_sub_top` int(11) NOT NULL default '0',
  `level1_sub_left` int(11) NOT NULL default '0',
  `main_back_image` varchar(100) default NULL,
  `main_back_image_over` varchar(100) default NULL,
  `sub_back_image` varchar(100) default NULL,
  `sub_back_image_over` varchar(100) default NULL,
  `specialA` varchar(50) default '80',
  `main_padding` varchar(40) default '0px 0px 0px 0px',
  `sub_padding` varchar(40) default '0px 0px 0px 0px',
  `specialB` varchar(100) default '50',
  `sub_font_family` varchar(50) default 'Arial',
  `extra` mediumtext,
  PRIMARY KEY  (`id`)
)");
		$database->query();
	}
	
	
	
		
	$database->setQuery("SELECT COUNT(*) FROM `#__components` WHERE admin_menu_link LIKE '%com_swmenufree%'");
	$com_entries=$database->loadResult();
  	
  	if($com_entries!=1){
  		$row->message.=_SW_UPDATE_LINKS."<br />";
  		//$database->setQuery("DELETE FROM `#__components` WHERE admin_menu_link like '%com_swmenufree%'");
  		//$database->query();
  		
  		$database->setQuery("INSERT INTO `#__components` VALUES ('', 'swMenuFree', 'option=com_swmenufree', 0, 0, 'option=com_swmenufree', 'swMenuFree', 'com_swmenufree', 0, 'js/ThemeOffice/component.png', 0, '','1')");
  		$database->query();
  	}
  	
  	if(file_exists($absolute_path . '/modules/mod_swmenufree/mod_swmenufree.xml')){
  		$row->module_version=get_Version($absolute_path . '/modules/mod_swmenufree/mod_swmenufree.xml');
  		$row->new_module_version=get_Version($absolute_path . '/administrator/components/com_swmenufree/modules/mod_swmenufree/mod_swmenufree.sw');
  		if($row->module_version<$row->new_module_version){
  			if(copydirr($absolute_path."/administrator/components/com_swmenufree/modules",$absolute_path."/modules",0757,false)){
				unlink($absolute_path . '/modules/mod_swmenufree/mod_swmenufree.xml');
  				rename($absolute_path."/modules/mod_swmenufree/mod_swmenufree.sw",$absolute_path."/modules/mod_swmenufree/mod_swmenufree.xml");
				$row->message.=_SW_MODULE_SUCCESS."<br />";
			}else{
				$row->message.=_SW_MODULE_FAIL."<br />";
			}
  		}
  	}else{
  		if(copydirr($absolute_path."/administrator/components/com_swmenufree/modules",$absolute_path."/modules",0757,false)){
				rename($absolute_path."/modules/mod_swmenufree/mod_swmenufree.sw",$absolute_path."/modules/mod_swmenufree/mod_swmenufree.xml");
				$row->message.=_SW_MODULE_SUCCESS."<br />";
			}else{
				$row->message.=_SW_MODULE_FAIL."<br />";
			}
  	}
  	
	
	$row->component_version=get_Version($absolute_path . '/administrator/components/com_swmenufree/swmenufree.xml');
	$row->module_version=get_Version($absolute_path . '/modules/mod_swmenufree/mod_swmenufree.xml');
	
	
	$langfile="english.php";	
	if (file_exists($absolute_path.'/administrator/components/com_swmenufree/language/default.ini'))
{
	$filename = $absolute_path.'/administrator/components/com_swmenufree/language/default.ini';
$handle = fopen($filename, "r");
$langfile = fread($handle, filesize($filename));
fclose($handle);
	
}
	
	$basedir =$absolute_path . "/administrator/components/com_swmenufree/language/"; 
    $handle=opendir($basedir);
    $lang=array();
    $lists=array(); 
     while ($file = readdir($handle)) { 
     if ($file == "." || $file == ".." || $file == "default.ini") { } else { 
     	$lang[]= JHTML::_('select.option', $file, $file );
	    }
      $lists['langfiles']= JHTML::_('select.genericlist', $lang, 'language','id="language" class="inputbox" size="1" style="width:200px"','value', 'text',$langfile);
     } 
     closedir($handle); 
	
	
	HTML_swmenufree::upgradeForm( $row,$lists );
	HTML_swmenufree::footer( );
}




function copydirr($fromDir,$toDir,$chmod=0757,$verbose=false)
/*
copies everything from directory $fromDir to directory $toDir
and sets up files mode $chmod
*/
{
	//* Check for some errors
	$errors=array();
	$messages=array();
	if (!is_writable($toDir))
	$errors[]='target '.$toDir.' is not writable';
	if (!is_dir($toDir))
	$errors[]='target '.$toDir.' is not a directory';
	if (!is_dir($fromDir))
	$errors[]='source '.$fromDir.' is not a directory';
	if (!empty($errors))
	{
		if ($verbose)
		foreach($errors as $err)
		echo '<strong>Error</strong>: '.$err.'<br />';
		return false;
	}
	//*/
	$exceptions=array('.','..');
	//* Processing
	$handle=opendir($fromDir);
	while (false!==($item=readdir($handle)))
	if (!in_array($item,$exceptions))
	{
		//* cleanup for trailing slashes in directories destinations
		$from=str_replace('//','/',$fromDir.'/'.$item);
		$to=str_replace('//','/',$toDir.'/'.$item);
		//*/
		if (is_file($from))
		{
			if (@copy($from,$to))
			{
				chmod($to,$chmod);
				touch($to,filemtime($from)); // to track last modified time
				$messages[]='File copied from '.$from.' to '.$to;
			}
			else
			$errors[]='cannot copy file from '.$from.' to '.$to;
		}
		if (is_dir($from))
		{
			if (@mkdir($to))
			{
				chmod($to,$chmod);
				$messages[]='Directory created: '.$to;
			}
			else
			$errors[]='cannot create directory '.$to;
			copydirr($from,$to,$chmod,$verbose);
		}
	}
	closedir($handle);
	//*/
	//* Output
	if ($verbose)
	{
		foreach($errors as $err)
		echo '<strong>Error</strong>: '.$err.'<br />';
		foreach($messages as $msg)
		echo $msg.'<br />';
	}
	//*/
	return true;
}

function uploadPackage(  ) {
	global $mainframe;
	$absolute_path=JPATH_ROOT;
	//echo $absolute_path;
	$userfile = JRequest::getVar( 'userfile', null,'files','array' );

	if (!$userfile) {

		exit();
	}

	$userfile_name = $userfile['name'];
//echo $userfile_name;
	$msg = '';
	
	move_uploaded_file( $userfile['tmp_name'], $absolute_path.'/media/'.$userfile['name']  );
	//$resultdir = uploadFile( $userfile['tmp_name'], $userfile['name'], $msg );
	$msg=extractArchive($userfile['name']);

	if(file_exists($msg."/swmenufree.xml")){
	$upload_version=get_Version($msg."/swmenufree.xml");
	}else{
		$upload_version=0;
	}
	echo $upload_version;
	$current_version=get_Version($absolute_path . '/administrator/components/com_swmenufree/swmenufree.xml');

	
	if($current_version<$upload_version){
		if(copydirr($msg."/admin/",$absolute_path . '/administrator/components/com_swmenufree',0757,false)){
			unlink($absolute_path . '/administrator/components/com_swmenufree/swmenufree.xml');
			copy($msg."/swmenufree.xml",$absolute_path . '/administrator/components/com_swmenufree/swmenufree.xml');
			$message=_SW_COMPONENT_SUCCESS;
		}else{
			$message=_SW_COMPONENT_FAIL;
		}
	}else{

		$message=_SW_INVALID_FILE;
	}
	
    sw_deldir($msg);
	unlink($absolute_path."/media/".$userfile['name']);

	$mainframe->redirect( "index.php?&option=com_swmenufree&task=upgrade",$message );

}

/**
* @param string The name of the php (temporary) uploaded file
* @param string The name of the file to put in the temp directory
* @param string The message to return
*/
function uploadFile( $filename, $userfile_name, &$msg ) {
	global $mainframe;
	$absolute_path=JPATH_ROOT;
	$baseDir =  $absolute_path . '/media' ;

	if (file_exists( $baseDir )) {
		if (is_writable( $baseDir )) {
			if (move_uploaded_file( $filename, $baseDir . $userfile_name )) {
				if (Chmod( $baseDir . $userfile_name ,0757)) {
					return true;
				} else {
					$msg = 'Failed to change the permissions of the uploaded file.';
				}
			} else {
				$msg = 'Failed to move uploaded file to <code>/media</code> directory.';
			}
		} else {
			$msg = 'Upload failed as <code>/media</code> directory is not writable.';
		}
	} else {
		$msg = 'Upload failed as <code>/media</code> directory does not exist.';
	}
	return false;
}

function extractArchive($filename) {
	global $mainframe;
	$absolute_path=JPATH_ROOT;

	$base_Dir 		=  $absolute_path . '/media/' ;

	$archivename 	= $base_Dir . $filename;
	$tmpdir 		= uniqid( 'install_' );

	$extractdir 	=  $base_Dir . $tmpdir ;
	//$archivename 	= mosPathName( $archivename;
//echo $archivename;
	//$this->unpackDir( $extractdir );

	if (preg_match( '/.zip$/', $archivename )) {
		// Extract functions
		require_once( $absolute_path . '/administrator/includes/pcl/pclzip.lib.php' );
		require_once( $absolute_path . '/administrator/includes/pcl/pclerror.lib.php' );
		require_once( $absolute_path . '/administrator/includes/pcl/pcltrace.lib.php' );
		//require_once( $absolute_path . '/administrator/includes/pcl/pcltar.lib.php' );
		$zipfile = new PclZip( $archivename );
		//if($this->isWindows()) {
		//		define('OS_WINDOWS',1);
		//	} else {
		//		define('OS_WINDOWS',0);
		//	}

		$ret = $zipfile->extract( PCLZIP_OPT_PATH, $extractdir );
		if($ret == 0) {
			//$this->setError( 1, 'Unrecoverable error "'.$zipfile->errorName(true).'"' );
			return false;
		}
	} else {
		require_once( $absolute_path . '/includes/Archive/Tar.php' );
		$archive = new Archive_Tar( $archivename );
		$archive->setErrorHandling( PEAR_ERROR_PRINT );

		if (!$archive->extractModify( $extractdir, '' )) {
			$this->setError( 1, 'Extract Error' );
			return false;
		}
	}


	return $extractdir;
}


function sw_deldir( $dir ) {
	$current_dir = opendir( $dir );
	$old_umask = umask(0);
	while ($entryname = readdir( $current_dir )) {
		if ($entryname != '.' and $entryname != '..') {
			if (is_dir( $dir ."/". $entryname )) {
				sw_deldir(  $dir ."/". $entryname  );
			} else {
				@chmod($dir . "/".$entryname, 0777);
				unlink( $dir . "/".$entryname );
			}
		}
	}
	umask($old_umask);
	closedir( $current_dir );
	return rmdir( $dir );
}

function TableExists($tablename, $db) {
  global $mainframe;
  $database = &JFactory::getDBO();
  $database->setQuery("SELECT 1 FROM ".$tablename." LIMIT 0");
  $mysql_result =  $database->query();
  if ($mysql_result){
  	//echo "true";
  	return true;
  }else{
  	return false;
  }
}

function getPositions()
	{
	//	jimport('joomla.filesystem.folder');

		

		//Get the database object
		$db	=& JFactory::getDBO();

		// template assignment filter
		$query = 'SELECT DISTINCT(template) AS text, template AS value'.
				' FROM #__templates_menu' ;
		$db->setQuery( $query );
		$templates = $db->loadObjectList();

		// Get a list of all module positions as set in the database
		$query = 'SELECT DISTINCT(position)'.
				' FROM #__modules'.
				'WHERE client_id=0' ;
		$db->setQuery( $query );
		$positions = $db->loadObjectList();
		$positions = (is_array($positions)) ? $positions : array();

		// Get a list of all template xml files for a given application

		for ($i = 0, $n = count($templates); $i < $n; $i++ )
		{
			$path = JPATH_ROOT.DS.'templates'.DS.$templates[$i]->value;
			//echo $path;

			$xml =& JFactory::getXMLParser('Simple');
			if ($xml->loadFile($path.DS.'templateDetails.xml'))
			{
				$p =& $xml->document->getElementByPath('positions');
				if (is_a($p, 'JSimpleXMLElement') && count($p->children()))
				{
					foreach ($p->children() as $child)
					{
						if (!in_array($child->data(), $positions)) {
						//	$positions[] = $child->data();
							$positions[$child->data()] = array();
						//	echo $child->data();
						}
					}
				}
			}
		}
		

		if(defined('_JLEGACY') && _JLEGACY == '1.0')
		{
			$positions[] = 'left';
			$positions[] = 'right';
			$positions[] = 'top';
			$positions[] = 'bottom';
			$positions[] = 'inset';
			$positions[] = 'banner';
			$positions[] = 'header';
			$positions[] = 'footer';
			$positions[] = 'newsflash';
			$positions[] = 'legals';
			$positions[] = 'pathway';
			$positions[] = 'breadcrumb';
			$positions[] = 'user1';
			$positions[] = 'user2';
			$positions[] = 'user3';
			$positions[] = 'user4';
			$positions[] = 'user5';
			$positions[] = 'user6';
			$positions[] = 'user7';
			$positions[] = 'user8';
			$positions[] = 'user9';
			$positions[] = 'advert1';
			$positions[] = 'advert2';
			$positions[] = 'advert3';
			$positions[] = 'debug';
			$positions[] = 'syndicate';
		}

		//$positions = array_unique($positions);
		//sort($positions);
		//array_flip($positions);
//echo count($positions);
		return $positions;
	}
?>
