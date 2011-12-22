<?php
 /**
 *Facebook module Simple FanpageBox
 @package Module Simple FanpageBox for Joomla! 1.5
 * @link       http://www.greek8.com/
* @copyright (C) 2011- George Goger
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );
$fanboxhtml = modfbfanpagelikeboxHelper::getfbfanpagelikebox( $params );
require( JModuleHelper::getLayoutPath( 'mod_simplefanpagebox' ) );
?>