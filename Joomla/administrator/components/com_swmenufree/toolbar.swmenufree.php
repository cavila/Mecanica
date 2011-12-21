<?php
/**
* SWmenuFree v4.0
* http://swonline.biz
* DHTML Menu Component for Mambo Open Source
**/

// ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );

// Make sure the user is authorized to view this page
$user = & JFactory::getUser();
if (!$user->authorize( 'com_modules', 'manage' )) {
	$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}

require_once( $mainframe->getPath( 'toolbar_html' ) );

switch ( $task ) {


			case "cancel":
			// menucontact::CANCEL_MENU();
			 break;

			case "save":
			// menucontact::SAVE_MENU();
			 break;
        
        default:
            //    menucontact::DHTML_MENU();
                break;
}
?>
