<?php
/**
* swmenufree v4.0
* http://swonline.biz
* Copyright 2006 Sean White
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Make sure the user is authorized to view this page
$user = & JFactory::getUser();
if (!$user->authorize( 'com_modules', 'manage' )) {
	$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
	
}

//swMenuFree 6.0 new terms
define( '_SW_SUPERFISH_MENU', 'Superfish Menu' );
define( '_SW_OVERLAY_HACK', 'Force Overlay' );
define( '_SW_OVERLAY_HACK_TIP', 'Make submenus overlay other page elements and fix any transmenu submenu position problems.' );
define( '_SW_SPECIAL_EFFECTS_TIP', 'Apply an effect to the submenus' );
define( '_SW_SPECIAL_EFFECTS_NONE', 'None' );
define( '_SW_SPECIAL_EFFECTS_SLIDE', 'Slide' );
define( '_SW_SPECIAL_EFFECTS_FADE', 'Fade' );
define( '_SW_LEARNMORE', 'Learn More' );
define( '_SW_BUYNOW', 'Buy swMenuPro Now' );








//swMenuFree 5.0 new terms
define( '_SW_TIGRA_MENU', 'Tigra Menu' );
define( '_SW_AUTO_POSITION_TIP', 'Auto position submenus in a trans menu system if they would otherwise overlap the viewable page.' );
define( '_SW_PADDING_HACK_TIP', 'Apply a hack that will adjust padding for browsers other than IE.  Use to fix problems when IE and other browsers display menu items as different sizes' );
define( '_SW_AUTO_POSITION', 'Auto Position Sub Menus' );
define( '_SW_PADDING_HACK', 'IE6 Padding Hack' );
define( '_SW_MENU_SYSTEM_TIP', 'Click here to open a popup window with more information on the available menu systems.' );



//swMenuFree 4.5 new terms


define( '_SW_UPGRADE_VERSIONS', 'Current Installed swMenuFree Versions' );
define( '_SW_SELECTED_LANGUAGE_HEADING', 'Current Language File' );
define( '_SW_LANGUAGE_FILES', 'Select New Language File' );
define( '_SW_LANGUAGE_CHANGE_BUTTON', 'Change Language' );
define( '_SW_FILE_PERMISSIONS', 'Current File Permissions' );
define( '_SW_LANGUAGE_SUCCESS', 'Succesfully Added New swMenuFree Language File.' );
define( '_SW_LANGUAGE_FAIL', 'Could not upload language file, please make sure all directories listed below are writable.' );


//Menu Names
define( '_SW_MENU_SYSTEM', 'Menu System' );
define( '_SW_TRANS_MENU', 'Trans Menu' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Manual CSS Editor' );
define( '_SW_MODULE_EDITOR', 'Menu Module Editor' );
define( '_SW_UPGRADE_FACILITY', 'Upgrade Facility' );


//Common Terms
define( '_SW_WRITABLE', 'Writable' );
define( '_SW_UNWRITABLE', 'Unwritable' );
define( '_SW_YES', 'Yes' );
define( '_SW_NO', 'No' );
define( '_SW_HYBRID', 'hybrid' );
define( '_SW_MODULE_NAME', 'Module Name' );

//Tool Tips
define( '_SW_SAVE_TIP', 'Click here to save all style and module changes to the database' );
define( '_SW_CANCEL_TIP', 'Click here to cancel changes and return to the menu module manager' );
define( '_SW_PREVIEW_TIP', 'Click here to preview the menu module in a pop-up window' );
define( '_SW_EXPORT_TIP', 'Click here to export an external style sheet using the current style settings' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'save' );
define( '_SW_CANCEL_BUTTON', 'cancel' );
define( '_SW_PREVIEW_BUTTON', 'preview' );
define( '_SW_EXPORT_BUTTON', 'export' );
define( '_SW_UPLOAD_BUTTON', 'Upload File' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Upgrade/Repair swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Edit menu module properties' );
define( '_SW_CSS_LINK', 'Manually edit external CSS file' );
define( '_SW_EXPORT_LINK', 'Export an external CSS file' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Please select a file to upload.' );
define( '_SW_SAVE_MENU_MESSAGE', 'Settings saved sucessfully' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'Settings saved and external CSS file sucessfully created' );
define( '_SW_SAVE_CSS_MESSAGE', 'External CSS file sucessfully saved' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'External CSS file not created.  Make sure your modules/mod_swmenufree/styles folder is writable.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Everything is OK' );
define( '_SW_MESSAGES', 'Messages' );
define( '_SW_MODULE_SUCCESS', 'Module was sucessfully updated.' );
define( '_SW_MODULE_FAIL', 'Could not update module.  Please make sure your /modules directory is writable.' );
define( '_SW_TABLE_UPGRADE', 'Upgraded %s Table' );
define( '_SW_TABLE_CREATE', 'Created %s Table' );
define( '_SW_UPDATE_LINKS', 'Updated admin menu links' );

define( '_SW_MODULE_VERSION', 'Current swMenuFree Module Version' );
define( '_SW_COMPONENT_VERSION', 'Current swMenuFree Component Version' );
define( '_SW_UPLOAD_UPGRADE', 'Upload swMenuFree Upgrade/Release File' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Upload &amp; Install File' );

define( '_SW_COMPONENT_SUCCESS', 'Succesfully upgraded swMenuFree Component.' );
define( '_SW_COMPONENT_FAIL', 'Could not upgrade, please make sure all directories listed below are writable.' );
define( '_SW_INVALID_FILE', 'This does not seem to be a valid newer swMenuFree upgrade/release file.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Menu Position and Orientation' );
define( '_SW_SIZES_LABEL', 'Menu Item Sizes' );
define( '_SW_TOP_OFFSETS_LABEL', 'Top Menu Offsets' );
define( '_SW_SUB_OFFSETS_LABEL', 'Sub Menu Offsets' );
define( '_SW_ALIGNMENT_LABEL', 'Menu Alignment' );
define( '_SW_WIDTHS_LABEL', 'Menu Item Widths' );
define( '_SW_HEIGHTS_LABEL', 'Menu Item Heights' );


define( '_SW_TOP_MENU', 'Top Menu' );
define( '_SW_SUB_MENU', 'Sub Menu' );
define( '_SW_ALIGNMENT', 'Alignment' );
define( '_SW_POSITION', 'Position' );
define( '_SW_ORIENTATION', 'Orientation' );
define( '_SW_ITEM_WIDTH', 'Item Width' );
define( '_SW_ITEM_HEIGHT', 'Item Height' );
define( '_SW_TOP_OFFSET', 'Top Offset' );
define( '_SW_LEFT_OFFSET', 'Left Offset' );
define( '_SW_LEVEL', 'Level' );
define( '_SW_AUTOSIZE', '(set to 0 to auto size)' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Font Family' );
define( '_SW_FONT_SIZE_LABEL', 'Font Size' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Text Alignment' );
define( '_SW_FONT_WEIGHT_LABEL', 'Font Weight' );
define( '_SW_PADDING_LABEL', 'Padding' );


define( '_SW_TOP', 'Top' );
define( '_SW_RIGHT', 'Right' );
define( '_SW_BOTTOM', 'Bottom' );
define( '_SW_LEFT', 'left' );
define( '_SW_FONT_SIZE', 'Font Size' );
define( '_SW_FONT_ALIGNMENT', 'Text Alignment' );
define( '_SW_FONT_WEIGHT', 'Font Weight' );
define( '_SW_PADDING', 'Padding' );
define( '_SW_FONT_TIP', 'All browsers render fonts and sizes differently. The list below shows how your browser has rendered the fonts and sizes described.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Border Widths' );
define( '_SW_BORDER_STYLES_LABEL', 'Border Styles' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Special Effects' );

define( '_SW_OUTSIDE_BORDER', 'Outside Border' );
define( '_SW_INSIDE_BORDER', 'Inside Border' );
define( '_SW_NORMAL_BORDER', 'Border' );
define( '_SW_WIDTH', 'Width' );
define( '_SW_HEIGHT', 'Height' );
define( '_SW_DIVIDER', 'Divider' );
define( '_SW_STYLE', 'Style' );
define( '_SW_DELAY', 'Open/Close Delay' );
define( '_SW_OPACITY', 'Transparency' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Background Images' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Background Colors' );
define( '_SW_FONT_COLOR_LABEL', 'Font Colors' );
define( '_SW_BORDER_COLOR_LABEL', 'Border Colors' );


define( '_SW_BACKGROUND', 'Background' );
define( '_SW_OVER_BACKGROUND', 'Over Background' );
define( '_SW_COLOR', 'Color' );
define( '_SW_OVER_COLOR', 'Over Color' );
define( '_SW_FONT', 'Font Color' );
define( '_SW_OVER_FONT', 'Over Font Color' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Outside Border Color' );
define( '_SW_INSIDE_BORDER_COLOR', 'Inside Border Color' );
define( '_SW_NORMAL_BORDER_COLOR', 'Border Color' );
define( '_SW_GET', 'get' );
define( '_SW_COLOR_TIP', 'Select colors on color wheel picker then click %s next to color box to apply selected color.');
define( '_SW_PRESENT_COLOR', 'Present Color' );
define( '_SW_SELECTED_COLOR', 'Selected Color' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Menu Source Settings' );
define( '_SW_STYLE_SHEET_LABEL', 'Style Sheet Settings' );
define( '_SW_AUTO_ITEM_LABEL', 'Auto Menu Item Settings' );
define( '_SW_CACHE_LABEL', 'Cache Settings' );
define( '_SW_GENERAL_LABEL', 'General Module Settings' );
define( '_SW_POSITION_ACCESS_LABEL', 'Position &amp; Access' );
define( '_SW_PAGES_LABEL', 'Show Menu Module on Pages' );
define( '_SW_CONDITIONS_LABEL', 'Conditions' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Write style sheet directly into page' );
define( '_SW_CSS_LINK_SELECT', 'Link to external style sheet' );
define( '_SW_CSS_IMPORT_SELECT', 'Import external style sheet' );
define( '_SW_CSS_NONE_SELECT', 'Do not link style sheet' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Use Content Only' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Select Existing Menu Below' );

define( '_SW_SHOW_TABLES_SELECT', 'Show as tables' );
define( '_SW_SHOW_BLOGS_SELECT', 'Show as blogs' );

define( '_SW_10SECOND_SELECT', '10 Seconds' );
define( '_SW_1MINUTE_SELECT', '1 Minute' );
define( '_SW_30MINUTE_SELECT', '30 Minutes' );
define( '_SW_1HOUR_SELECT', '1 Hour' );
define( '_SW_6HOUR_SELECT', '6 Hours' );
define( '_SW_12HOUR_SELECT', '12 Hours' );
define( '_SW_1DAY_SELECT', '1 Day' );
define( '_SW_3DAY_SELECT', '3 Days' );
define( '_SW_1WEEK_SELECT', '1 Week' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Menu Module Settings' );
define( '_SW_SIZE_OFFSETS_TAB', 'Size, Position &amp; Offsets' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Colors &amp; Backgrounds' );
define( '_SW_FONTS_PADDING_TAB', 'Fonts &amp; Padding' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Borders &amp; Effects' );


//general text
define( '_SW_MENU_SOURCE', 'Menu Source' );
define( '_SW_PARENT', 'Parent' );
define( '_SW_STYLE_SHEET', 'Load Style Sheet' );
define( '_SW_CLASS_SFX', 'Module Class Suffix' );
define( '_SW_HYBRID_MENU', 'Hybrid Menu' );
define( '_SW_TABLES_BLOGS', 'Use Tables/Blogs' );
define( '_SW_CACHE_ITEMS', 'Cache Menu Items' );
define( '_SW_CACHE_REFRESH', 'Cache Refresh Time' );
define( '_SW_SHOW_NAME', 'Show Module Name' );
define( '_SW_PUBLISHED', 'Published');
define( '_SW_ACTIVE_MENU', 'Active Menu' );
define( '_SW_MAX_LEVELS', 'Maximum Levels' );
define( '_SW_PARENT_LEVEL', 'Parent Level' );
define( '_SW_SELECT_HACK', 'Select Box Hack' );
define( '_SW_SUB_INDICATOR', 'Sub Menu Indicator' );
define( '_SW_SHOW_SHADOW', 'Show Shadow' );
define( '_SW_MODULE_POSITION', 'Module Position' );
define( '_SW_MODULE_ORDER', 'Module Order' );
define( '_SW_ACCESS_LEVEL', 'Access Level' );
define( '_SW_TEMPLATE', 'Template' );
define( '_SW_LANGUAGE', 'Language' );
define( '_SW_COMPONENT', 'Component' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Select a valid menu to act as a source of menu items for your menu module.' );
define( '_SW_PARENT_TIP', 'Select a parent to display a segment of the source menu.  Set to top to display all source menu items.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dynamic:</b> writes the style sheet into the document where the menu module is called.<br /><b>Link External: </b>links to an external style sheet that has been exported.<br /><b>Do Not Link:</b> manually paste your own link to the external style sheet in your templates head.  Menu module will then completely validate.' );
define( '_SW_CLASS_SFX_TIP', 'Suffix to place before templates moduletable CSS.  Can be used to avoid conflicts with template moduletable CSS and for more styling options through template CSS file.' );
define( '_SW_HYBRID_MENU_TIP', 'Automatically append content menu items to menu items that are content category/sections tables/blogs.' );
define( '_SW_TABLES_BLOGS_TIP', 'Show automatically created categories/section menu items as tables or blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Use a file cache to increase performance and cache menu items.  Particularly useful for performance issues with hybrid menus, where large menus may take many SQL queries to generate.  Cache reduces that to just one set of queries between cache intervals.' );
define( '_SW_CACHE_REFRESH_TIP', 'Time interval between cache file refreshing its menu item structure.' );
define( '_SW_SHOW_NAME_TIP', 'Show the menu module name.' );
define( '_SW_PUBLISHED_TIP', 'Publish or unpublish the menu module.');
define( '_SW_ACTIVE_MENU_TIP', 'Keep current top level menu item in an active state for page being viewed.' );
define( '_SW_MAX_LEVELS_TIP', 'Maximum levels of source menu to display.  Set to 0 to display all levels.' );
define( '_SW_PARENT_LEVEL_TIP', 'Advanced setting that traces menu source of module back to a specific level.  Usually set to 0.' );
define( '_SW_SELECT_HACK_TIP', 'Apply a hack to the menu to allow submenus to overlay select boxes on forms in IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Show a small arrow as a sub menu indicator to indicate sub menu items that have child items.' );
define( '_SW_SHOW_SHADOW_TIP', 'Show a shadow around submenus.' );
define( '_SW_MODULE_POSITION_TIP', 'Position of menu module in the template.' );
define( '_SW_MODULE_ORDER_TIP', 'Order of menu module in template position.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Access level for the menu module.' );
define( '_SW_TEMPLATE_TIP', 'Menu module will only display on the selected template.' );
define( '_SW_LANGUAGE_TIP', 'Menu module will only display on the selected language.' );
define( '_SW_COMPONENT_TIP', 'Menu module will only display on the selected component.' );
define( '_SW_PAGES_TIP', 'Select Pages: <i>(hold down ctrl key while left clicking mouse to select multiple pages.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro is a more robust and complete menu module management solution.  Visit <a href="http://www.swmenupro.com" >www.swmenupro.com</a> to find
        out how to upgrade and harness the full power and navigational opportunities that only swMenuPro can offer.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro allows for unlimited menu modules using any of the 12 available menu systems.  swMenuFree only allows for the 1 menu module.' );
define( '_SW_SWMENUPRO_2', 'Alter normal and mouseover CSS for any menu item within any menu module.  Can be backgrounds, borders, padding etc... using a simple point and click interface.' );
define( '_SW_SWMENUPRO_3', 'Assign normal and mouseover images for any menu item within any menu module, as well as widths, heights, vspace, hspace and alignment.(Create image only menus)' );
define( '_SW_SWMENUPRO_4', 'Assign advanced behaviours to any menu item within any menu module.  These behaviours can be true or false to the following conditions. "show the menu item?", "show the menu item name?"(Used to create image only menus), "is the menu item clickable?"' );
define( '_SW_SWMENUPRO_5', 'Manage and create new menu modules using the inbuilt menu module manager.' );


?>