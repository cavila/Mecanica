<?php 
/* 
* @author Dallas Moore
* Email : Dallas@viperwebistes.com
* URL : www.viperwebsites.com
* Description : This module displays icon links to your social media profiles.
* Copyright (c) 2008-2010 Viper Web Solutions
* License GNU GPL
***/

/// no direct access 
defined('_JEXEC') or die('Restricted access');
 
$document =& JFactory::getDocument();
$mod = JURI::base() . 'modules/mod_socialmedialinks/';
$document->addStyleSheet(JURI::base() . 'modules/mod_socialmedialinks/style.css');

// Get Basic Module Parameters 
	$moduleclass_sfx 	= $params->get('moduleclass_sfx','');
	$target 			= $params->get('target','_blank');
	$robots				= $params->get('robots','1');
	$theme 				= $params->get('theme','default'); 
	$size 				= $params->get('size','24'); 
	$align 				= $params->get('align','left'); 
	$margin				= $params->get('margin','3px'); 
	$text 				= $params->get('text','Follow us on'); 
	$rsstext 			= $params->get('rsstext','Subscribe to our Feed'); 
	$credits 			= $params->get('credits','1'); 

// Prepare the Link Attribute
	if($robots == '1') {
	$nofollow = 'rel="nofollow"';
	}else{
	$nofollow = '';
	}

// Prepare the Icon Alignment Style
	$alignstyle = "text-align: $align ";

// Get Icon Parameters
$ic = array(
	$params->get('ic1'), $params->get('ic2'), $params->get('ic3'), $params->get('ic4'), $params->get('ic5'), 
	$params->get('ic6'), $params->get('ic7'), $params->get('ic8'), $params->get('ic9'), $params->get('ic10'),
	$params->get('ic11'),$params->get('ic12'),$params->get('ic13'),$params->get('ic14'),$params->get('ic15'),
	$params->get('ic16'),$params->get('ic17'),$params->get('ic18'),$params->get('ic19'),$params->get('ic20'),
	$params->get('ic21'),$params->get('ic22'),$params->get('ic23'),$params->get('ic24'),$params->get('ic25'),
	$params->get('ic26'),$params->get('ic27'),$params->get('ic28'),$params->get('ic29'),$params->get('ic30'));

$url = array(
	$params->get('url1'), $params->get('url2'), $params->get('url3'), $params->get('url4'), $params->get('url5'), 
	$params->get('url6'), $params->get('url7'), $params->get('url8'), $params->get('url9'), $params->get('url10'), 	
	$params->get('url11'), $params->get('url12'), $params->get('url13'), $params->get('url14'), $params->get('url15'), 
	$params->get('url16'), $params->get('url17'), $params->get('url18'), $params->get('url19'), $params->get('url20'), 	
	$params->get('url21'), $params->get('url22'), $params->get('url23'), $params->get('url24'), $params->get('url25'), 
	$params->get('url26'), $params->get('url27'), $params->get('url28'), $params->get('url29'),	$params->get('url30')	
	);
	
	$vimg = array();
    $vurl = array();
	
// Set Wrapping Div
echo '<div class="followus">Siguenos en</div>';
	echo '<div class="smile" style="'. $alignstyle .'"> ';
	
// Prepare the Icon List

	for($i=0;$i < count($ic);$i++)
     {   
     $vimg[$ic[$i]]= htmlspecialchars($url[$i]);
	 $vurl[$url[$i]]=$ic[$i];
	 $title = ucwords(substr($vurl[$url[$i]], 0 , -4));
	 
// Output the Icon Links	
	 	 if(($vimg[$ic[$i]]) != '') {
			
			echo '<a style="margin:'.$margin.';" '. $nofollow .' href="'. $vimg[$ic[$i]]. '" target="'. $target .'"><img src="'. $mod .'icons/'. $theme .'/'. $size .'/'. $vurl[$url[$i]] .' " alt="'. $title .'" '; if($title == 'Feed') { echo 'title="'. $rsstext .'" /></a>';}else{ echo 'title="'. $text .' '. $title .'" /></a>';}
		 }
	 } 

			if($credits == '1') :
			//	echo '<div class="smilecredits" style="text-align:'. $alignstyle .';margin: 0px '.$margin.' 0px '.$margin.';"><a href="http://www.viperwebsites.com/" title="Social Media Icons for Joomla!">Social Media Icons for Joomla!</a></div>';
			endif;
		?>
	</div>
    <div class="clr"></div>
