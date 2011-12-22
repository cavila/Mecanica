<?php

 /**
 * Helper php file for Facebook module Simple FanpageBox
 @package Module Simple FanpageBox for Joomla! 1.5
 * @link       http://www.greek8.com/
* @copyright (C) 2011- George Goger
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
class modfbfanpagelikeboxHelper {

  function getfbfanpagelikebox( $params ) {
  	global $mainframe;
  	$fbfanpagelikeboxhtml = '';
	$locale = trim($params->get('locale'));
	if ($locale == 'default') {
		$lg = &JFactory::getLanguage();
		$language = $lg->getTag();
		$language = str_replace('-', '_', $language);
	} else {
		$language = $locale;
	}
	
  	 if (trim( $params->get('debug'))) {
		$fbfanpagelikeboxhtml = $timeStampFromFile;
		$fbfanpagelikeboxhtml .= '<br/>';
		$fbfanpagelikeboxhtml .= trim($params->get('time_stamp'));
		$fbfanpagelikeboxhtml .= '<br/>';
		$fbfanpagelikeboxhtml .= trim($params->get('font-family'));
  	}

  	if (((!trim($params->get('api_key'))) && (trim( $params->get( 'script_call' ) ))) || (!trim($params->get('profile_id')))) {
			$fbfanpagelikeboxhtml .= '<span style="color:red;">Please enter valid API Key from Facebook Page.</span><br/>';
			
  	} else {
  	  	if (trim( $params->get( 'rendering_mode' ) ) == 1) {
  			$fbfanpagelikeboxhtml .= '<iframe scrolling="no" frameborder="0" src="http://www.facebook.com/connect/connect.php?id='.trim( $params->get( 'profile_id' ) );
				$fbfanpagelikeboxhtml .= '&connections='.trim( $params->get( 'number_of_fans' ) ).'&stream='.trim( $params->get( 'include_stream' ) );
				if (trim( $params->get('custom_css'))) {
					$fbfanpagelikeboxhtml .= '&css='.$cssFileStamped;
				} else {
					$fbfanpagelikeboxhtml .= '&css=';
				}
				$fbfanpagelikeboxhtml .= '&locale='.$language.'"';
				$fbfanpagelikeboxhtml .= 'allowtransparency="true" style="border: none; width: '.trim( $params->get( 'boxwidth' ) ).'px; height: '.trim( $params->get( 'boxheight' ) ).'px;"></iframe>';
  		} else if (trim( $params->get( 'rendering_mode' ) ) == 0) {
	  		if (trim( $params->get( 'script_call' ) )) {
					$fbfanpagelikeboxhtml .= '<script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script>';
					$fbfanpagelikeboxhtml .= '<script type="text/javascript">FB.init("'.trim( $params->get( 'api_key' ) ).'");</script>';
				}
				$fbfanpagelikeboxhtml .= '<fb:fan profile_id="'.trim( $params->get( 'profile_id' ) ).'" stream="'.trim( $params->get( 'include_stream' ) ).'" connections="'.trim( $params->get( 'number_of_fans' ) ).'" width="'.trim( $params->get( 'boxwidth' ) ).'" height="'.trim( $params->get( 'boxheight' ) ).'"';
				if (trim( $params->get('custom_css'))) {
					$fbfanpagelikeboxhtml .= ' css="'.$cssFileStamped.'"';
				}
				$fbfanpagelikeboxhtml .= ' locale="'.$language.'"';
				$fbfanpagelikeboxhtml .= '></fb:fan>';
			}
			if (trim( $params->get( 'link_to_page' ) )) {
				$fbfanpagelikeboxhtml .= '<div style="'.trim($params->get('style_for_link')).'"><a href="'.trim($params->get('link')).'"';
				if ($params->get('target')) { 
					$fbfanpagelikeboxhtml .= 'target="_blank"';
				}
				$fbfanpagelikeboxhtml .= '>'.trim( $params->get( 'profile_name' ) ).'</a> '.trim( $params->get( 'text_after_link' ) ).'</div>';
			}
	  }
	 	  
   $fbfanpagelikeboxhtml .= '<center><div style="color:#999;margin-bottom:3px;font-size:9px"><a target="_blank" class="external" href="http://www.monastiriaka.gr/agio-oros.htm"><span style="color:#999;margin-bottom:3px;font-size:9px" >αγιο ορος</span></a></div></center>';		  
	  return $fbfanpagelikeboxhtml;	  
  }
}
?>