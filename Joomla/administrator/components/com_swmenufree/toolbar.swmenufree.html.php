<?php
/**
* SWmenuFree v2.0
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

class menucontact {
        /**
        * Draws the menu for a New Contact
        */
        
		
		
		function DHTML_MENU() {
                mosMenuBar::startTable();
				 ?>
			<td><a class="toolbar" href="#" onClick="doPreviewWindow();" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('preview','','images/preview_f2.png',1);"><img src="images/preview.png" alt="Preview" border="0" name="preview" align="middle">&nbsp;Preview</a></td>
		<?php
                mosMenuBar::save();
                mosMenuBar::cancel();
                mosMenuBar::spacer();
                mosMenuBar::endTable();
        }

        function SAVE_MENU() {
                mosMenuBar::startTable();
                //mosMenuBar::saveedit();
               // mosMenuBar::cancel();
                mosMenuBar::spacer();
                mosMenuBar::endTable();
        }

		function CANCEL_MENU() {
                mosMenuBar::startTable();
                //mosMenuBar::saveedit();
               // mosMenuBar::cancel();
                mosMenuBar::spacer();
                mosMenuBar::endTable();
        }

        function DEFAULT_MENU() {
                  mosMenuBar::startTable();
				  
                mosMenuBar::save();
                mosMenuBar::cancel();
                mosMenuBar::spacer();
                mosMenuBar::endTable();
        }



}?>
