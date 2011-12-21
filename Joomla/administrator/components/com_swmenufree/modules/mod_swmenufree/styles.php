<?php
/**
* swmenufree v4.5
* http://swonline.biz
* Copyright 2006 Sean White
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

function gosuMenuStyle($swmenufree){
	global $mainframe;
	$absolute_path=JPATH_ROOT;
  $live_site = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
  if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
	//$str="<style type=\"text/css\">\n";
	//$str.="<!--\n";
	$str=".ddmx{\n";
	$str.="border:".$swmenufree['main_border']." !important ; \n";
	$str.="}\n";
	
	$str.=".ddmx a.item1,\n";
	$str.=".ddmx a.item1:hover,\n";
	$str.=".ddmx a.item1-active,\n";
	$str.=".ddmx a.item1-active:hover {\n";
	$str.=" padding: ".$swmenufree['main_padding']." !important ; \n";
	$str.=" top: ".$swmenufree['main_top']."px !important ; \n";
	$str.=" left: ".$swmenufree['main_left']."px; \n";
	$str.=" font-size: ".$swmenufree['main_font_size']."px !important ; \n";
	$str.=" font-family: ".$swmenufree['font_family']." !important ; \n";
	$str.=" text-align: ".$swmenufree['main_align']." !important ; \n";
	$str.=" font-weight: ".$swmenufree['font_weight']." !important ; \n";
	$str.=$swmenufree['main_font_color']?" color: ".$swmenufree['main_font_color']." !important ; \n":"";
	$str.=" text-decoration: none !important ; \n";
	$str.=" display: block; \n";
	$str.=" white-space: nowrap; \n";
	$str.=" position: relative; \n";
	$str.=is_file($absolute_path."/".$swmenufree['main_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['main_back_image']."\") ;\n":"background-image:none;";
	//$str.=$swmenufree['main_back']?" background-color: ".$swmenufree['main_back']." !important ; \n":"";
	if ($swmenufree['main_width']!=0){$str.= " width:".$swmenufree['main_width']."px; \n";}
	if ($swmenufree['main_height']!=0){$str.= " height:".$swmenufree['main_height']."px; \n";}
	$str.="}\n";

	$str.=".ddmx td.item11 {\n";
	$str.=$swmenufree['main_back']?" background-color: ".$swmenufree['main_back']." !important ; \n":"";
	$str.=" padding:0 !important ; \n";
	$str.=" border-top: ".$swmenufree['main_border_over']." !important ; \n";
	$str.=" border-left: ". $swmenufree['main_border_over']." !important ; \n";
	if($swmenufree['orientation']=="vertical"){
		$str.= " border-right: ".$swmenufree['main_border_over']." !important ; \n";
		$str.= " border-bottom: 0 !important ; \n";
	}else{
		$str.= " border-bottom: ".$swmenufree['main_border_over'].";\n" ;
		$str.= " border-right: 0 !important ; \n";
	}
	$str.=" white-space: nowrap !important ; \n";
	if ($swmenufree['main_width']!=0){$str.= " width:".$swmenufree['main_width']."px; \n";}
	if ($swmenufree['main_height']!=0){$str.= " height:".$swmenufree['main_height']."px; \n";}
	$str.="}\n";

	$str.= ".ddmx td.item11-last {\n";
	$str.=$swmenufree['main_back']?" background-color: ".$swmenufree['main_back']." !important ; \n":"";
	$str.= " padding:0 !important ; \n";
	$str.= " border: ". $swmenufree['main_border_over']." !important ; \n";
	$str.= " white-space: nowrap; \n";
	if ($swmenufree['main_width']!=0){$str.= " width:".$swmenufree['main_width']."px; \n";}
	if ($swmenufree['main_height']!=0){$str.= " height:".$swmenufree['main_height']."px; \n";}
	$str.="}\n";

	$str.= ".ddmx td.item11-acton {\n";
	$str.= " padding:0 !important ; \n";
	$str.= " border-top: ".$swmenufree['main_border_over']." !important ; \n";
	$str.= " border-left: ".$swmenufree['main_border_over']." !important ; \n";
	$str.= " white-space: nowrap; \n";
	if($swmenufree['orientation']=="vertical"){
		$str.= " border-right: ".$swmenufree['main_border_over']." !important ; \n";
	}else{
		$str.= " border-bottom: ".$swmenufree['main_border_over'].";\n" ;
	}
	$str.="}\n";

	$str.= ".ddmx td.item11-acton-last {\n";
	$str.= " border: ".$swmenufree['main_border_over']." !important ; \n";
	$str.="}\n";

	$str.= ".ddmx .item11-acton-last a.item1,\n";
	$str.= ".ddmx .item11-acton a.item1,\n";
	$str.= ".ddmx .item11-acton-last a:hover,\n";
	$str.= ".ddmx .item11-acton a:hover,\n";
	$str.= ".ddmx .item11 a:hover,\n";
	$str.= ".ddmx .item11-last a:hover,\n";
	$str.= ".ddmx a.item1-active,\n";
	$str.= ".ddmx a.item1-active:hover {\n";
	$str.= is_file($absolute_path."/".$swmenufree['main_back_image_over']) ? "background-image: URL(\"".$live_site."/".$swmenufree['main_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['main_font_color_over']?" color: ".$swmenufree['main_font_color_over']." !important ; \n":"";
	$str.=$swmenufree['main_over']?" background-color: ".$swmenufree['main_over']." !important ; \n":"";
	$str.="}\n";

	$str.= ".ddmx a.item2,\n";
	$str.= ".ddmx a.item2:hover,\n";
	$str.= ".ddmx a.item2-active,\n";
	$str.= ".ddmx a.item2-active:hover {\n";
	$str.= " padding: ".$swmenufree['sub_padding']." !important ; \n";
	$str.= " font-size: ".$swmenufree['sub_font_size']."px !important ; \n";
	$str.= " font-family: ".$swmenufree['sub_font_family']." !important ; \n";
	$str.= " text-align: ".$swmenufree['sub_align']." !important ; \n";
	$str.= " font-weight: ".$swmenufree['font_weight_over']." !important ; \n";
	$str.= " text-decoration: none !important ; \n";
	$str.= " display: block; \n";
	$str.= " white-space: nowrap; \n";
	$str.= " position: relative; \n";
	$str.= " z-index:500; \n";
	if ($swmenufree['sub_width']!=0){$str.= " width:".$swmenufree['sub_width']."px; \n";}
	if ($swmenufree['sub_height']!=0){$str.= " height:".$swmenufree['sub_height']."px; \n";}
	$str.= " opacity:".($swmenufree['specialA']/100)."; \n";
	$str.="}\n";

	$str.= ".ddmx a.item2 {\n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['sub_back']?" background-color: ".$swmenufree['sub_back']." !important ; \n":"";
	$str.=$swmenufree['sub_font_color']?" color: ".$swmenufree['sub_font_color']." !important ; \n":"";
	$str.= " border-top: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= " border-left: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= " border-right: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.="}\n";

	$str.= ".ddmx a.item2-last {\n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['sub_back']?" background-color: ".$swmenufree['sub_back']." !important ; \n":"";
	$str.=$swmenufree['sub_font_color']?" color: ".$swmenufree['sub_font_color']." !important ; \n":"";
	$str.= " border-bottom: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= " z-index:500; \n";
	$str.="}\n";

	$str.= ".ddmx a.item2:hover,\n";
	$str.= ".ddmx a.item2-active,\n";
	$str.= ".ddmx a.item2-active:hover {\n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image_over']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['sub_over']?" background-color: ".$swmenufree['sub_over']." !important ; \n":"";
	$str.=$swmenufree['sub_font_color_over']?" color: ".$swmenufree['sub_font_color_over']." !important ; \n":"";
	$str.= " border-top: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= " border-left: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= " border-right: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= "}\n";

	$str.= ".ddmx .section {\n";
	$str.= " border: ".$swmenufree['sub_border']." !important ; \n";
	$str.= " position: absolute; \n";
	$str.= " visibility: hidden; \n";
	$str.= " display: block; \n";
	$str.= " z-index: -1; \n";
	$str.="}\n";

	$str.= ".ddmxframe {\n";
	$str.= " border: ".$swmenufree['sub_border']." !important ; \n";
	$str.="}\n";

	$str.= "* html .ddmx td { position: relative; } /* ie 5.0 fix */\n";
	//$str.="-->\n";
	//$str.="</style>\n";
	
	
	return $str;
}



function superfishMenuStyle($swmenufree,$sub_indicator){
	global $mainframe;
	$absolute_path=JPATH_ROOT;
  $live_site = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
   if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}

	//$str="<style type=\"text/css\">\n";
	//$str.="<!--\n";
	$str=".sw-sf, .sw-sf * {\n";
	//$str.="border:".$swmenufree['main_border']." !important ; \n";
	$str.="margin: 0 !important ; \n";
	$str.="padding: 0 !important ; \n";
	$str.="list-style: none !important ; \n";
	$str.="}\n";
	
	$str.=".sw-sf {\n";
	//$str.="height:auto; \n";
	//$str.=" border: ".$swmenufree['main_border']." !important ; \n";
	$str.="line-height: 1.0 !important ; \n";
	$str.="}\n";
	
	$str.=".sw-sf hr {display: block; clear: left; margin: -0.66em 0; visibility: hidden;}\n";
	
	
	$str.=".sw-sf ul{\n";
	$str.="position: absolute; \n";
	$str.="top: -999em; \n";
	//$str.=" border: ".$swmenufree['main_border']." !important ; \n";
	//if ($swmenufree['main_width']!=0){$str.= " width:".$swmenufree['main_width']."px; \n";}else{$str.= " width:100%; \n";}
	$str.="width: 10em; \n";
	$str.="display: block; \n";
	$str.="}\n";
	
	$str.=".sw-sf ul li {\n";
	//$str.="display:block; \n";
	$str.="width: 100% !important ; \n";
	//$str.="height: 1px !important ; \n";
	$str.="}\n";
	
	$str.=".sw-sf li:hover {\n";
	$str.="z-index:300 ; \n";
	$str.="}\n";
	
	$str.=".sw-sf li:hover {\n";
	$str.="visibility: inherit ; \n";
	$str.="}\n";
	
	$str.=".sw-sf li {\n";
	$str.="float: left; \n";
	$str.="position: relative; \n";
	//$str.="display: inline; \n";
	$str.="}\n";
	
	$str.=".sw-sf li li{\n";
	$str.=" top: 0 !important ; \n";
	$str.=" left: 0; \n";
	//$str.="float: left; \n";
	$str.="position: relative; \n";
	$str.="}\n";
	
	$str.=".sw-sf a {\n";
	$str.="display: block; \n";
	$str.="position: relative; \n";
	$str.="}\n";
	
	$str.=".sw-sf li:hover ul ,\n";
	$str.=".sw-sf li.sfHover ul {\n";
	$str.="left: 0; \n";
	$str.="top: 2.5em; \n";
	$str.="z-index: 400; \n";
	$str.="width:100%; \n";
	$str.="}\n";
	
	$str.="ul.sw-sf li:hover li ul ,\n";
	$str.="ul.sw-sf li.sfHover li ul {\n";
	$str.="top: -999em; \n";
	$str.="}\n";
	
	$str.="ul.sw-sf li li:hover ul ,\n";
	$str.="ul.sw-sf li li.sfHover ul {\n";
	$str.="left: 10em; \n";
//	if ($swmenufree['main_width']!=0){$str.= " left:".$swmenufree['main_width']."px; \n";}else{$str.= " left:100%; \n";}
	$str.="top: 0; \n";
	$str.="}\n";
	
	$str.="ul.sw-sf li li:hover li ul ,\n";
	$str.="ul.sw-sf li li.sfHover li ul {\n";
	$str.="top: -999em; \n";
	$str.="}\n";
	
	$str.="ul.sw-sf li li li:hover ul ,\n";
	$str.="ul.sw-sf li li li.sfHover ul {\n";
	$str.="left: 10em; \n";
//	if ($swmenufree['main_width']!=0){$str.= " left:".$swmenufree['main_width']."px; \n";}else{$str.= " left:100%; \n";}
	$str.="top: 0; \n";
	$str.="}\n";
	
	$str.="#sfmenu {\n";
	$str.="position: relative; \n";
	$str.="border: ".$swmenufree['main_border']." !important ; \n";
	$str.="top: ".$swmenufree['main_top']."px !important ; \n";
	$str.="left: ".$swmenufree['main_left']."px; \n";
	$str.="}\n";
	
	$str.="#sf-section {\n";
	//$str.="position: relative; \n";
	$str.="border: ".$swmenufree['sub_border']." !important ; \n";
	$str.="}\n";
	
	if ($swmenufree['orientation']=="vertical"){
	
	
	$str.=".sw-sf.sf-vertical, .sw-sf.sf-vertical li {\n";
	//if ($swmenufree['main_width']==0){$str.= "float:none; \n";}
	//$str.="float:none !important; \n";
	$str.="display:block !important; \n";
	//$str.="outline:0; \n";
	//$str.=" border: ".$swmenufree['main_border']." !important ; \n";
	$str.="margin: 0 !important ; \n";
	if ($swmenufree['main_width']!=0){$str.= " width:".$swmenufree['main_width']."px; \n";}else{$str.= "width:100%; \n";}
	//if ($swmenufree['main_height']!=0){$str.= " height:".$swmenufree['main_height']."px; \n";}
	$str.="}\n";
	
	$str.=".sw-sf.sf-vertical li:hover ul, .sw-sf.sf-vertical li.sfHover ul {\n";
	//$str.="width:auto; \n";
	if ($swmenufree['main_width']!=0){$str.= " left:".($swmenufree['main_width']+$swmenufree['level1_sub_left'])."px; \n";}else{$str.= " left:100%; \n";}
	$str.="top:".$swmenufree['level1_sub_top']."px !important ; \n";
	$str.="}\n";
	
}else{
	
	$str.=".sw-sf li.sfHover li , .sw-sf li:hover li {\n";
	//$str.="width:auto; \n";
	//if ($swmenufree['main_width']!=0){$str.= " left:".($swmenufree['main_width']+$swmenufree['level1_sub_left'])."px; \n";}else{$str.= " left:100%; \n";}
	$str.="top:".$swmenufree['level1_sub_top']."px !important ; \n";
	$str.="left:".$swmenufree['level1_sub_left']."px !important ; \n";
	$str.="}\n";
	
}

$str.=".sw-sf li.sfHover li.sfHover li {\n";
	//$str.="left: 10em !important ; \n";
	$str.="top:".$swmenufree['level2_sub_top']."px !important; \n";
	$str.="left:".$swmenufree['level2_sub_left']."px !important; \n";
	$str.="}\n";
	

	
	$str.=".sw-sf a.item1 {\n";
	
	$str.=" padding: ".$swmenufree['main_padding']." !important ; \n";
	//$str.=" top: ".$swmenufree['main_top']."px !important ; \n";
	//$str.=" left: ".$swmenufree['main_left']."px; \n";
	$str.=" font-size: ".$swmenufree['main_font_size']."px !important ; \n";
	$str.=" font-family: ".$swmenufree['font_family']." !important ; \n";
	$str.=" text-align: ".$swmenufree['main_align']." !important ; \n";
	$str.=" font-weight: ".$swmenufree['font_weight']." !important ; \n";
	$str.=$swmenufree['main_font_color']?" color: ".$swmenufree['main_font_color']." !important ; \n":"";
	$str.=" text-decoration: none !important ; \n";
	$str.=" border-top: ".$swmenufree['main_border_over']." !important ; \n";
	$str.=" border-left: ". $swmenufree['main_border_over']." !important ; \n";
	if($swmenufree['orientation']=="vertical"){
		$str.= " border-right: ".$swmenufree['main_border_over']." !important ; \n";
		$str.= " border-bottom: 0 !important ; \n";
	}else{
		$str.= " border-bottom: ".$swmenufree['main_border_over']." !important;\n" ;
		$str.= " border-right: 0 !important ; \n";
	}
	$str.=" display: block; \n";
	$str.=" white-space: nowrap; \n";
	$str.=" position: relative; \n";
	//$str.="z-index: 100; \n";
	$str.=is_file($absolute_path."/".$swmenufree['main_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['main_back_image']."\") ;\n":"";
	$str.=$swmenufree['main_back']?" background-color: ".$swmenufree['main_back']." !important ; \n":"";
	if ($swmenufree['main_width']!=0){$str.= " width:".$swmenufree['main_width']."px; \n";}
	if ($swmenufree['main_height']!=0){$str.= " height:".$swmenufree['main_height']."px; \n";}
	//$str.=$swmenufree['main_back']?" background-color: ".$swmenufree['main_back']." !important ; \n":"";
	$str.="}\n";
	
	$str.=".sw-sf a.item1.last {\n";
	
	if($swmenufree['orientation']=="vertical"){
		$str.= " border-bottom: ".$swmenufree['main_border_over']." !important ; \n";
		//$str.= " border-right: 0 !important ; \n";
	}else{
		$str.= " border-right: ".$swmenufree['main_border_over']." !important;\n" ;
		//$str.= " border-bottom: 0 !important ; \n";
	}
	$str.="}\n";
	
	$str.= ".sw-sf .current a.item1,\n";
	//$str.= ".sw-sf li:hover,\n";
	//$str.= ".sw-sf li.sfHover,\n";
	$str.= ".sw-sf li.sfHover a.item1,\n";
	$str.= ".sw-sf a:focus,\n";
	$str.= ".sw-sf a:hover ,\n";
	$str.= ".sw-sf a:active {\n";
	
	$str.= is_file($absolute_path."/".$swmenufree['main_back_image_over']) ? "background-image: URL(\"".$live_site."/".$swmenufree['main_back_image_over']."\") ;\n":"";
	$str.=$swmenufree['main_font_color_over']?" color: ".$swmenufree['main_font_color_over']." !important ; \n":"";
	$str.=$swmenufree['main_over']?" background-color: ".$swmenufree['main_over']." !important ; \n":"";
	$str.="}\n";
	
	
	$str.= ".sw-sf  a.item2 {\n";
	$str.= " padding: ".$swmenufree['sub_padding']." !important ; \n";
	$str.= " font-size: ".$swmenufree['sub_font_size']."px !important ; \n";
	$str.= " font-family: ".$swmenufree['sub_font_family']." !important ; \n";
	$str.= " text-align: ".$swmenufree['sub_align']." !important ; \n";
	$str.= " font-weight: ".$swmenufree['font_weight_over']." !important ; \n";
	$str.= " text-decoration: none !important ; \n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image']."\") ;\n":"";
	$str.=$swmenufree['sub_back']?" background-color: ".$swmenufree['sub_back']." !important ; \n":"";
	$str.=$swmenufree['sub_font_color']?" color: ".$swmenufree['sub_font_color']." !important ; \n":"";
	$str.= " display: block; \n";
	$str.= " white-space: nowrap; \n";
	$str.= " position: relative; \n";
	$str.= " border-top: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= " border-left: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.= " border-right: ".$swmenufree['sub_border_over']." !important ; \n";
	if ($swmenufree['sub_width']!=0){$str.= " width:".$swmenufree['sub_width']."px; \n";}
	if ($swmenufree['sub_height']!=0){$str.= " height:".$swmenufree['sub_height']."px; \n";}
	$str.= " opacity:".($swmenufree['specialA']/100)."; \n";
	$str.= " filter:alpha(opacity=". ($swmenufree['specialA']).") \n";
	$str.="}\n";
	
	$str.=".sw-sf a.item2.last {\n";
	$str.= " border-bottom: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.="}\n";
	
	//$str.= ".sw-sf li li a:hover,\n";
	//$str.= ".sw-sf li.sfHover li.sfHover li.sw-sf-subactive a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
	$str.= ".sw-sf li.sfHover a.item2:hover,\n";
	$str.= ".sw-sf li.sfHover  li.sfHover a.item2:hover,\n";
	$str.= ".sw-sf li.sfHover  li.sfHover li.sfHover a.item2:hover,\n";
	$str.= ".sw-sf li.sfHover  li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
	$str.= ".sw-sf li.sfHover  li.sfHover li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
	$str.= ".sw-sf li.sfHover  li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
	$str.= ".sw-sf li.sfHover  li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
	$str.= ".sw-sf  a.item2:hover {\n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image_over']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image_over']."\") ;\n":" background-image:none ;\n";
	$str.=$swmenufree['sub_over']?" background-color: ".$swmenufree['sub_over']." !important ; \n":"";
	$str.=$swmenufree['sub_font_color_over']?" color: ".$swmenufree['sub_font_color_over']." !important ; \n":"";
	//$str.= " filter:alpha(opacity=". ($swmenufree['specialA']).") \n";
	$str.= "}\n";
	
	$str.= ".sw-sf li.sfHover li.sfHover li a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover li a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a.item2,\n";
	$str.= ".sw-sf li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a.item2{\n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image']."\") ;\n":" background-image:none ;\n";
	$str.=$swmenufree['sub_back']?" background-color: ".$swmenufree['sub_back']." !important ; \n":"";
	$str.=$swmenufree['sub_font_color']?" color: ".$swmenufree['sub_font_color']." !important ; \n":"";
	//$str.= " filter:alpha(opacity=". ($swmenufree['specialA']).") \n";
	$str.="}\n";
	
		
	if($sub_indicator>1){

	$str.=".sw-sf a.sf-with-ul{\n";
	$str.="padding-right:2.25em;\n";
	$str.="min-width:1px; \n";
	$str.="}\n";
	
	$str.=".sw-sf .sf-sub-indicator{\n";
	$str.="position: absolute;\n";
	$str.="display: block; \n";
	$str.="right: .75em; \n";
	$str.="top: 1.05em; \n";
	$str.="width: 10px; \n";
	$str.="height: 10px; \n";
	$str.="text-indent: -999em; \n";
	$str.="overflow:hidden; \n";
	
	switch ($sub_indicator) {
			// cases are slightly different
			case 2:
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-white.png') no-repeat -10px -100px; \n";
			break;

			case 3:
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-black.png') no-repeat -10px -100px; \n";
			break;

			case 4:
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-grey.png') no-repeat -10px -100px; \n";
			break;
			
			case 5:
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-blue.png') no-repeat -10px -100px; \n";
			break;

			case 6:
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-red.png') no-repeat -10px -100px; \n";
			break;

			case 7:
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-green.png') no-repeat -10px -100px; \n";
			break;
			
			case 8:
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-yellow.png') no-repeat -10px -100px; \n";
			break;

			default:	// formerly case 2
			$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/arrows-white.png') no-repeat -10px -100px; \n";
			break;
		}

	//$str.="background:	url('".$live_site."/modules/mod_swmenupro/images/superfish/arrows-white.png') no-repeat -10px -100px; \n";
	$str.="}\n";
	
	$str.=".sw-sf a > .sf-sub-indicator{\n";
	$str.="top: .8em;\n";
	$str.="background-position: 0 -100px; \n";
	$str.="}\n";
	
	$str.=".sw-sf a:focus > .sf-sub-indicator,\n";
	$str.=".sw-sf a:hover > .sf-sub-indicator,\n";
	$str.=".sw-sf a:active > .sf-sub-indicator,\n";
	$str.=".sw-sf li:hover > a > .sf-sub-indicator,\n";
	$str.=".sw-sf li.sfHover > a > .sf-sub-indicator{\n";
	$str.="top: .8em;\n";
	$str.="background-position: -10px -100px; \n";
	$str.="}\n";
	
	$str.=".sw-sf ul .sf-sub-indicator{ background-position: -10px 0;}\n";
	$str.=".sw-sf ul a > .sf-sub-indicator{ background-position: 0 0;}\n";
	
	$str.=".sw-sf ul a:focus > .sf-sub-indicator,\n";
	$str.=".sw-sf ul a:hover > .sf-sub-indicator,\n";
	$str.=".sw-sf ul a:active > .sf-sub-indicator,\n";
	$str.=".sw-sf ul li:hover > a > .sf-sub-indicator,\n";
	$str.=".sw-sf ul li.sfHover > a > .sf-sub-indicator{\n";
	//$str.="top: .8em;\n";
	$str.="background-position: -10px 0; \n";
	$str.="}\n";
	
	if ($swmenufree['orientation']=="vertical"){
		
	$str.=".sf-vertical .sf-sub-indicator{ background-position: -10px -100px;}\n";
	$str.=".sf-vertical a > .sf-sub-indicator{ background-position: 0 0;}\n";
	
	$str.=".sf-vertical a:focus > .sf-sub-indicator,\n";
	$str.=".sf-vertical a:hover > .sf-sub-indicator,\n";
	$str.=".sf-vertical a:active > .sf-sub-indicator,\n";
	$str.=".sf-vertical li:hover > a > .sf-sub-indicator,\n";
	$str.=".sf-vertical li.sfHover > a > .sf-sub-indicator{\n";
	//$str.="top: .8em;\n";
	$str.="background-position: -10px 0; \n";
	$str.="}\n";
		
		
		
	}
	
	}
	/*
	$str.=".sf-shadow ul {\n";
	$str.="background:	url('".$live_site."/modules/mod_swmenufree/images/superfish/shadow.png') no-repeat bottom right !important; \n";
	$str.="padding: 0 8px 9px 0 ; \n";
	$str.="-moz-border-radius-bottomleft: 17px;  \n";
	$str.="-moz-border-radius-topright: 17px;  \n";
	$str.="-webkit-border-top-right-radius: 17px; \n";
	$str.="-webkit-border-bottom-left-radius: 17px; \n";
	$str.="}\n";
	
	$str.=".sf-shadow ul.sf-shadow-off {\n";
	$str.="background:	transparent; \n";
	
	$str.="}\n";
	*/

	return $str;
}




function transMenuStyle($swmenufree,$show_shadow){
	global $mainframe;
	$absolute_path=JPATH_ROOT;
  $live_site = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
  if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
	//<style type="text/css">
	//<!--
	$str= ".transMenu {\n";
	$str.= " position:absolute ; \n";
	$str.= " overflow:hidden; \n";
	$str.= " left:-1000px; \n";
	$str.= " top:-1000px; \n";
	$str.= "}\n";

	$str.= ".transMenu .content {\n";
	$str.= " position:absolute  ; \n";
	$str.= "}\n";

	$str.= ".transMenu .items {\n";
	$str.= $swmenufree['sub_width']?" width: ". $swmenufree['sub_width']."px;":"";
	$str.= " border: ". $swmenufree['sub_border']." ; \n";
	$str.= " position:relative ; \n";
	$str.= " left:0px; top:0px; \n";
	$str.= " z-index:2; \n";
	$str.= "}\n";

	//$str.= ".transMenu.top .items {\n";
	//$str.= "}\n";

	$str.= ".transMenu  td\n";
	$str.= "{\n";
	$str.= " padding: ". $swmenufree['sub_padding']." !important;  \n";
	$str.= " font-size: ". $swmenufree['sub_font_size']."px !important ; \n";
	$str.= " font-family: ". $swmenufree['sub_font_family']." !important ; \n";
	$str.= " text-align: ". $swmenufree['sub_align']." !important ; \n";
	$str.= " font-weight: ". $swmenufree['font_weight_over']." !important ; \n";
	$str.=$swmenufree['sub_font_color']?" color: ".$swmenufree['sub_font_color']." !important ; \n":"";
	$str.= "} \n";
	
	$str.= "#subwrap \n";
	$str.= "{ \n";
	$str.= " text-align: left ; \n";
	$str.= "}\n";

	$str.= ".transMenu  .item.hover td\n";
	$str.= "{ \n";
	$str.=$swmenufree['sub_font_color_over']?" color: ".$swmenufree['sub_font_color_over']." !important ; \n":"";
	$str.= "}\n";

	$str.= ".transMenu .item { \n";
	$str.= $swmenufree['sub_height']?" height: ". $swmenufree['sub_height']."px;":"";
	$str.= " text-decoration: none ; \n";
	$str.= " cursor:pointer; \n";
	$str.= " cursor:hand; \n";
	$str.= "}\n";

	$str.= ".transMenu .background {\n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['sub_back']?" background-color: ".$swmenufree['sub_back']." !important ; \n":"";
	$str.= " position:absolute ; \n";
	$str.= " left:0px; top:0px; \n";
	$str.= " z-index:1; \n";
	$str.= " opacity:". ($swmenufree['specialA']/100)."; \n";
	$str.= " filter:alpha(opacity=". ($swmenufree['specialA']).") \n";
	$str.= "}\n";

	$str.= ".transMenu .shadowRight { \n";
	$str.= " position:absolute ; \n";
	$str.= " z-index:3; \n";
	if($show_shadow){
	$str.= " top:3px; width:2px; \n";
	}else{
		$str.= " top:-3000px; width:2px; \n";
	}
	$str.= " opacity:". ($swmenufree['specialA']/100)."; \n";
	$str.= " filter:alpha(opacity=". ($swmenufree['specialA']).")\n";
	$str.= "}\n";

	$str.= ".transMenu .shadowBottom { \n";
	$str.= " position:absolute ; \n";
	$str.= " z-index:1; \n";
	if($show_shadow){
	$str.= " left:3px; height:2px; \n";
	}else{
	$str.= " left:-3000px; height:2px; \n";	
	}
	$str.= " opacity:". ($swmenufree['specialA']/100)."; \n";
	$str.= " filter:alpha(opacity=". ($swmenufree['specialA']).")\n";
	$str.= "}\n";

	$str.= ".transMenu .item.hover {\n";
	$str.= is_file($absolute_path."/".$swmenufree['sub_back_image_over']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['sub_over']?" background-color: ".$swmenufree['sub_over']." !important ; \n":"";
	$str.= "}\n";

	$str.= ".transMenu .item img { \n";
	$str.= " margin-left:10px !important ; \n";
	$str.= "}\n";

	$str.= "table.swmenu {\n";
	$str.= " top: ". $swmenufree['main_top']."px; \n";
	$str.= " left: ". $swmenufree['main_left']."px; \n";
	$str.= " position:relative ; \n";
	$str.= " margin:0px !important ; \n";
	$str.= " border: ". $swmenufree['main_border']." ; \n";
	$str.= " z-index: 1; \n";
	$str.= "}\n";

	$str.= "table.swmenu a{\n";
	$str.= " margin:0px !important ; \n";
	$str.= " padding: ". $swmenufree['main_padding']." !important ; \n";
	$str.= " display:block !important; \n";
	$str.= " position:relative !important ; \n";
	$str.= "}\n";

	$str.= "div.swmenu a,\n";
	$str.= "div.swmenu a:visited,\n";
	$str.= "div.swmenu a:link {\n";
	if ($swmenufree['main_width']!=0){$str.= " width:".$swmenufree['main_width']."px; \n";}
	if ($swmenufree['main_height']!=0){$str.= " height:".$swmenufree['main_height']."px; \n";}
	$str.= " font-size: ". $swmenufree['main_font_size']."px !important ; \n";
	$str.= " font-family: ". $swmenufree['font_family']." !important ; \n";
	$str.= " text-align: ". $swmenufree['main_align']." !important ; \n";
	$str.= " font-weight: ". $swmenufree['font_weight']." !important ; \n";
	$str.=$swmenufree['main_font_color']?" color: ".$swmenufree['main_font_color']." !important ; \n":"";
	$str.= " text-decoration: none !important ; \n";
	$str.= " margin-bottom:0px !important ; \n";
	$str.= " display:block !important; \n";
	$str.= " white-space:nowrap ; \n";
	$str.= "}\n";

	$str.= "div.swmenu td {\n";
	if (substr($swmenufree['orientation'],0,8)=="vertical"){
		$str.= " border-right: ".$swmenufree['main_border_over']." ; \n";
	}else{
		$str.= " border-bottom: ".$swmenufree['main_border_over']." ; \n";
	}
	$str.= " border-top: ". $swmenufree['main_border_over']." ; \n";
	$str.= " border-left: ". $swmenufree['main_border_over']." ; \n";
	$str.= is_file($absolute_path."/".$swmenufree['main_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['main_back_image']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['main_back']?" background-color: ".$swmenufree['main_back']." !important ; \n":"";
	$str.= "} \n";

	$str.= "div.swmenu td.last {\n";
	if (substr($swmenufree['orientation'],0,8)=="vertical"){
		$str.= " border-bottom: ".$swmenufree['main_border_over']." ; \n";
	}else{
		$str.= " border-right: ".$swmenufree['main_border_over']." ; \n";
	}
	$str.= "} \n";
	
	$str.= "#trans-active a{\n";
	$str.=$swmenufree['main_font_color_over']?" color: ".$swmenufree['main_font_color_over']." !important ; \n":"";
	$str.= is_file($absolute_path."/".$swmenufree['main_back_image_over']) ? " background-image: URL(\"".$live_site."/".$swmenufree['main_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['main_over']?" background-color: ".$swmenufree['main_over']." !important ; \n":"";
	$str.= "} \n";

	

	$str.= "#swmenu a.hover   { \n";
	$str.= is_file($absolute_path."/".$swmenufree['main_back_image_over']) ? " background-image: URL(\"".$live_site."/".$swmenufree['main_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['main_font_color_over']?" color: ".$swmenufree['main_font_color_over']." !important ; \n":"";
	$str.=$swmenufree['main_over']?" background-color: ".$swmenufree['main_over']." !important ; \n":"";
	$str.= "}\n";

	$str.= "#swmenu span {\n";
	$str.= " display:none; \n";
	$str.= "}\n";

	return $str;
}



function tigraMenuStyle($swmenufree){
	global $mainframe;
	$absolute_path=JPATH_ROOT;
  $live_site = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
  if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}

	//<style type="text/css">
	//<!--
	$str="";
	$str.= ".m0l0iout { \n";
	$str.= " font-family: ".$swmenufree['font_family']." !important ; \n";
	$str.= " font-size: ".$swmenufree['main_font_size'].'px'." !important ; \n";
	$str.= " text-decoration: none !important ; \n";
	$str.= " padding: ".$swmenufree['main_padding']." !important ; \n";
	$str.=$swmenufree['main_font_color']?" color: ".$swmenufree['main_font_color']." !important ; \n":"";
	$str.= " font-weight: ".$swmenufree['font_weight']." !important ; \n";
	$str.= " text-align: ".$swmenufree['main_align']." !important ; \n";
	$str.= "}\n";

	$str.= ".m0l0iover {\n";
	$str.= " font-family: ".$swmenufree['font_family']." !important ; \n";
	$str.= " font-size: ".$swmenufree['main_font_size'].'px'." !important ; \n";
	$str.= " text-decoration: none !important ; \n";
	$str.= " padding: ".$swmenufree['main_padding']." !important ; \n";
	$str.=$swmenufree['main_font_color_over']?" color: ".$swmenufree['main_font_color_over']." !important ; \n":"";
	$str.= " font-weight: ".$swmenufree['font_weight_over']." !important ; \n";
	$str.= " text-align: ".$swmenufree['main_align']." !important ; \n";
	$str.= "}\n";

	$str.= ".m0l0oout { \n";
	$str.= " text-decoration : none !important ; \n";
	$str.= " border: ".$swmenufree['main_border']." !important ; \n";
	$str.=is_file($absolute_path."/".$swmenufree['main_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['main_back_image']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['main_back']?" background-color: ".$swmenufree['main_back']." !important ; \n":"";
	$str.= "}\n";

	$str.= ".m0l0oover { \n";
	$str.= " text-decoration : none !important ; \n";
	$str.= " border: ".$swmenufree['main_border_over']." !important ; \n";
	$str.=is_file($absolute_path."/".$swmenufree['main_back_image_over']) ? " background-image: URL(\"".$live_site."/".$swmenufree['main_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['main_over']?" background-color: ".$swmenufree['main_over']." !important ; \n":"";
	$str.= "}\n";
	

	$str.= ".m0l1iout {\n";
	$str.= " font-family: ".$swmenufree['sub_font_family']." !important ; \n";
	$str.= " font-size: ".$swmenufree['sub_font_size'].'px'." !important ; \n";
	$str.= " text-decoration: none !important ; \n";
	$str.= " padding: ".$swmenufree['sub_padding']." !important ; \n";
	$str.=$swmenufree['sub_font_color']?" color: ".$swmenufree['sub_font_color']." !important ; \n":"";
	$str.= " font-weight: ".$swmenufree['font_weight']." !important ; \n";
	$str.= " text-align: ".$swmenufree['sub_align']." !important ; \n";
	$str.= "}\n";

	$str.= ".m0l1iover { \n";
	$str.= " font-family: ".$swmenufree['sub_font_family']." !important ; \n";
	$str.= " font-size: ".$swmenufree['sub_font_size'].'px'." !important ; \n";
	$str.= " text-decoration: none !important ; \n";
	$str.= " padding: ".$swmenufree['sub_padding']." !important ; \n";
	$str.=$swmenufree['sub_font_color_over']?" color: ".$swmenufree['sub_font_color_over']." !important ; \n":"";
	$str.= " font-weight: ".$swmenufree['font_weight_over']." !important ; \n";
	$str.= " text-align: ".$swmenufree['sub_align']." !important ; \n";
	$str.= "}  \n";

	$str.= ".m0l1oout { \n";
	$str.= " text-decoration : none !important ; \n";
	$str.= " border: ".$swmenufree['sub_border']." !important ; \n";
	$str.=is_file($absolute_path."/".$swmenufree['sub_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['sub_back']?" background-color: ".$swmenufree['sub_back']." !important ; \n":"";
	$str.= " opacity:". ($swmenufree['specialA']/100)."; \n";
	$str.= " filter:alpha(opacity=". ($swmenufree['specialA']).") \n";
	$str.= "} \n";

	$str.= ".m0l1oover {\n";
	$str.= " text-decoration : none !important ; \n";
	$str.= " border: ".$swmenufree['sub_border_over']." !important ; \n";
	$str.=is_file($absolute_path."/".$swmenufree['sub_back_image_over']) ? " background-image: URL(\"".$live_site."/".$swmenufree['sub_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['sub_over']?" background-color: ".$swmenufree['sub_over']." !important ; \n":"";
	$str.= "}\n";

	
	$str.= "#swactive_menu a,\n";
	$str.= "#swactive_menu div{ \n";
	$str.=$swmenufree['main_font_color_over']?" color: ".$swmenufree['main_font_color_over']." !important ; \n":"";
	$str.= " font-weight: ".$swmenufree['font_weight_over']." !important ; \n";
	$str.= " text-decoration : none !important ; \n";
	$str.=is_file($absolute_path."/".$swmenufree['main_back_image_over']) ? "background-image: URL(\"".$live_site."/".$swmenufree['main_back_image_over']."\") ;\n":"background-image:none;";
	$str.=$swmenufree['main_over']?" background-color: ".$swmenufree['main_over']." !important ; \n":"";
	$str.= "}\n";
	
	
	//-->
	//</style>
	return $str;
}



?>
