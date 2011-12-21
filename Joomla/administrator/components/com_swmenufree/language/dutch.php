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
define( '_SW_MENU_SYSTEM', 'Menu Systeem' );
define( '_SW_TRANS_MENU', 'Trans Menu' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menu' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Handmatige CSS Editor' );
define( '_SW_MODULE_EDITOR', 'Menu Module Editor' );
define( '_SW_UPGRADE_FACILITY', 'Upgrade mogelijkheid' );


//Common Terms
define( '_SW_WRITABLE', 'Schrijfbaar' );
define( '_SW_UNWRITABLE', 'Niet schrijfbaar' );
define( '_SW_YES', 'Ja' );
define( '_SW_NO', 'Nee' );
define( '_SW_HYBRID', 'hybride' );
define( '_SW_MODULE_NAME', 'Modulenaam' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'Selecteer een menusysteem.<br /><b>Trans Menu:</b>Een DHTML popout menusysteem met een fraai submenu glijdend effect.<br /><b>MyGosu Menu:</b>Een DHTML popout menusysteem met betere template compatabiliteit.' );
define( '_SW_SAVE_TIP', 'Klik hier om alle stijl- en modulewijzigingen op te slaan in de database' );
define( '_SW_CANCEL_TIP', 'Klik hier om de wijzigingen te annuleren en naar de manager van de menumodule terug te keren' );
define( '_SW_PREVIEW_TIP', 'Klik hier om de module in een popup-scherm voor te vertonen' );
define( '_SW_EXPORT_TIP', 'Klik hier om de huidige stijlinstellingen op te slaan in een extern stijlblad' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'opslaan' );
define( '_SW_CANCEL_BUTTON', 'annuleren' );
define( '_SW_PREVIEW_BUTTON', 'voorvertonen' );
define( '_SW_EXPORT_BUTTON', 'exporteren' );
define( '_SW_UPLOAD_BUTTON', 'bestand uploaden' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Upgrade/Repareer swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Bewerk de instellingen van de menumodule' );
define( '_SW_CSS_LINK', 'Bewerk handmatig het externe CSS-bestand' );
define( '_SW_EXPORT_LINK', 'Exporteer een extern CSS-bestand' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Selecteer een bestand voor uploaden.' );
define( '_SW_SAVE_MENU_MESSAGE', 'Instellingen succesvol opgeslagen' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'Instellingen opgeslagen en extern CSS-bestand succesvol aangemaakt' );
define( '_SW_SAVE_CSS_MESSAGE', 'Extern CSS-bestand succesvol opgeslagen' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Extern CSS-bestand niet aangemaakt. Zorg ervoor dat uw modules/mod_swmenufree/styles folder schrijfbaar is.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Alles is in orde' );
define( '_SW_MESSAGES', 'Berichten' );
define( '_SW_MODULE_SUCCESS', 'Module was succesvol bijgewerkt.' );
define( '_SW_MODULE_FAIL', 'Kan module niet bijwerken. Zorg ervoor dat uw /modules directory schrijfbaar is.' );
define( '_SW_TABLE_UPGRADE', 'Tabel %s bijgewerkt' );
define( '_SW_TABLE_CREATE', 'Tabel %s aangemaakt' );
define( '_SW_UPDATE_LINKS', 'Admin menulinks bijgewerkt' );

define( '_SW_MODULE_VERSION', 'Huidige versie swMenuFree Module' );
define( '_SW_COMPONENT_VERSION', 'Huidige versie swMenuFree Component' );
define( '_SW_UPLOAD_UPGRADE', 'swMenuFree Upgrade/Release bestand uploaden' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Upload &amp; installeer bestand' );

define( '_SW_COMPONENT_SUCCESS', 'swMenuFree Component succelvol bijgewerkt.' );
define( '_SW_COMPONENT_FAIL', 'Kan niet bijwerken, zorg dat alle onderstaande directories schrijfbaar zijn.' );
define( '_SW_INVALID_FILE', 'Dit schijnt geen geldig nieuwer swMenuFree upgrade/release bestand te zijn.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Menupositie en -orientatie' );
define( '_SW_SIZES_LABEL', 'Afmetingen menuitem' );
define( '_SW_TOP_OFFSETS_LABEL', 'Topmenu offsets' );
define( '_SW_SUB_OFFSETS_LABEL', 'Submenu offsets' );
define( '_SW_ALIGNMENT_LABEL', 'Menu uitlijnen' );
define( '_SW_WIDTHS_LABEL', 'Breedtes menuitem' );
define( '_SW_HEIGHTS_LABEL', 'Hoogtes menuitem' );


define( '_SW_TOP_MENU', 'Topmenu' );
define( '_SW_SUB_MENU', 'Submenu' );
define( '_SW_ALIGNMENT', 'Uitlijnen' );
define( '_SW_POSITION', 'Positie' );
define( '_SW_ORIENTATION', 'Orientatie' );
define( '_SW_ITEM_WIDTH', 'Itembreedte' );
define( '_SW_ITEM_HEIGHT', 'Itemhoogte' );
define( '_SW_TOP_OFFSET', 'Boven Offset' );
define( '_SW_LEFT_OFFSET', 'Linker Offset' );
define( '_SW_LEVEL', 'Level' );
define( '_SW_AUTOSIZE', '(geef 0 voor auto afmeting)' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Lettertype familie' );
define( '_SW_FONT_SIZE_LABEL', 'Grootte lettertype' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Tekst uitlijnen' );
define( '_SW_FONT_WEIGHT_LABEL', 'Zwaarte lettertype' );
define( '_SW_PADDING_LABEL', 'Opvullen' );


define( '_SW_TOP', 'Boven' );
define( '_SW_RIGHT', 'Rechts' );
define( '_SW_BOTTOM', 'Onder' );
define( '_SW_LEFT', 'Links' );
define( '_SW_FONT_SIZE', 'Grootte lettertype' );
define( '_SW_FONT_ALIGNMENT', 'Tekst uitlijnen' );
define( '_SW_FONT_WEIGHT', 'Zwaarte lettertype' );
define( '_SW_PADDING', 'Opvullen' );
define( '_SW_FONT_TIP', 'Alle browsers renderen lettertypes en afmetingen anders. Onderstaande lijst laat zien hoe uw browser de gekozen lettertypes en afmetingen heeft gerenderd.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Breedte van randen' );
define( '_SW_BORDER_STYLES_LABEL', 'Randstijlen' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Speciale effecten' );

define( '_SW_OUTSIDE_BORDER', 'Buitenrand' );
define( '_SW_INSIDE_BORDER', 'Binnenrand' );
define( '_SW_NORMAL_BORDER', 'Rand' );
define( '_SW_WIDTH', 'Breedte' );
define( '_SW_HEIGHT', 'Hoogte' );
define( '_SW_DIVIDER', 'Verdeler' );
define( '_SW_STYLE', 'Stijl' );
define( '_SW_DELAY', 'Open-/sluitvertraging' );
define( '_SW_OPACITY', 'Doorzichtigheid' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Achtergrond afbeeldingen' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Achtergrondkleuren' );
define( '_SW_FONT_COLOR_LABEL', 'Lettertype kleuren' );
define( '_SW_BORDER_COLOR_LABEL', 'Rand kleuren' );


define( '_SW_BACKGROUND', 'Achtergrond' );
define( '_SW_OVER_BACKGROUND', 'over achtergrond' );
define( '_SW_COLOR', 'Kleur' );
define( '_SW_OVER_COLOR', 'over kleur' );
define( '_SW_FONT', 'Lettertype kleur' );
define( '_SW_OVER_FONT', 'Over lettertype kleur' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Buitenrand kleur' );
define( '_SW_INSIDE_BORDER_COLOR', 'Binnenrand kleur' );
define( '_SW_NORMAL_BORDER_COLOR', 'Randkleur' );
define( '_SW_GET', 'plak' );
define( '_SW_COLOR_TIP', 'Selecteer kleuren op het kleurenselectiewiel, klik vervolgens op %s naast de kleur om deze kleur aan te brengen.');
define( '_SW_PRESENT_COLOR', 'Huidige kleur' );
define( '_SW_SELECTED_COLOR', 'Geselecteerde kleur' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Menu broninstellingen' );
define( '_SW_STYLE_SHEET_LABEL', 'Stijlblad instellingen' );
define( '_SW_AUTO_ITEM_LABEL', 'Auto menuitem instellingen' );
define( '_SW_CACHE_LABEL', 'Cache instellingen' );
define( '_SW_GENERAL_LABEL', 'Algemene module instellingen' );
define( '_SW_POSITION_ACCESS_LABEL', 'Positie &amp; toegang' );
define( '_SW_PAGES_LABEL', 'Toon menumodule op de pagina\'s' );
define( '_SW_CONDITIONS_LABEL', 'Condities' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Schrijf stijlblad direct in de pagina' );
define( '_SW_CSS_LINK_SELECT', 'Link naar extern stijlblad' );
define( '_SW_CSS_IMPORT_SELECT', 'Importeer extern stijlblad' );
define( '_SW_CSS_NONE_SELECT', 'Stijlblad niet linken' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Gebruik uitsluitend content' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Selecteer bestaand menu hieronder' );

define( '_SW_SHOW_TABLES_SELECT', 'Toon als tabellen' );
define( '_SW_SHOW_BLOGS_SELECT', 'Toon als blogs' );

define( '_SW_10SECOND_SELECT', '10 seconden' );
define( '_SW_1MINUTE_SELECT', '1 minuut' );
define( '_SW_30MINUTE_SELECT', '30 minuten' );
define( '_SW_1HOUR_SELECT', '1 uur' );
define( '_SW_6HOUR_SELECT', '6 uur' );
define( '_SW_12HOUR_SELECT', '12 uur' );
define( '_SW_1DAY_SELECT', '1 dag' );
define( '_SW_3DAY_SELECT', '3 dagen' );
define( '_SW_1WEEK_SELECT', '1 week' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Menumodule Instellingen' );
define( '_SW_SIZE_OFFSETS_TAB', 'Afmetingen, positie &amp; offsets' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Kleuren &amp; achtergronden' );
define( '_SW_FONTS_PADDING_TAB', 'Lettertypes &amp; opvulling' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Randen &amp; effecten' );


//general text
define( '_SW_MENU_SOURCE', 'Bronmenu' );
define( '_SW_PARENT', 'Ouder' );
define( '_SW_STYLE_SHEET', 'Laad stijlblad' );
define( '_SW_CLASS_SFX', 'Module klasse toevoeging' );
define( '_SW_HYBRID_MENU', 'Hybride menu' );
define( '_SW_TABLES_BLOGS', 'Gebruik tabellen/blogs' );
define( '_SW_CACHE_ITEMS', 'Cache menuitems' );
define( '_SW_CACHE_REFRESH', 'Cache ververstijd' );
define( '_SW_SHOW_NAME', 'Toon modulenaam' );
define( '_SW_PUBLISHED', 'Gepubliceerd');
define( '_SW_ACTIVE_MENU', 'Actief menu' );
define( '_SW_MAX_LEVELS', 'Maximum levels' );
define( '_SW_PARENT_LEVEL', 'Ouder level' );
define( '_SW_SELECT_HACK', 'Selectbox Hack' );
define( '_SW_SUB_INDICATOR', 'Submenu indicator' );
define( '_SW_SHOW_SHADOW', 'Toon schaduw' );
define( '_SW_MODULE_POSITION', 'Module positie' );
define( '_SW_MODULE_ORDER', 'Module volgorde' );
define( '_SW_ACCESS_LEVEL', 'Toegangsniveau' );
define( '_SW_TEMPLATE', 'Template' );
define( '_SW_LANGUAGE', 'Taal' );
define( '_SW_COMPONENT', 'Component' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Selecteer een geldig menu om als bron te dienen van menuitems voor uw menumodule.' );
define( '_SW_PARENT_TIP', 'Selecteer een ouder om een gedeelte van het bronmenu te gebruiken. Selecteer top om alle items van het bronmenu te tonen.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dynamisch:</b> schrijft het stijlblad in het document waar de module wordt aangeroepen.<br /><b>Link extern: </b>is gelinkt aan een extern stijlblad welke is geexporteerd.<br /><b>Niet linken:</b> handmatig de link naar het externe stijlblad toevoegen in uw template.  De menumodule zal dan volledig valideren.' );
define( '_SW_CLASS_SFX_TIP', 'Toevoeging om voor het template moduletable CSS te plaatsen. Kan worden gebruikt om conficten te vermijden met het template moduletable CSS en voor meer opmaakmogelijkheden via template CSS-bestand.' );
define( '_SW_HYBRID_MENU_TIP', 'Automatisch toevoegen van content menuitems aan menuitems van het type content category/sections tables/blogs.' );
define( '_SW_TABLES_BLOGS_TIP', 'Toon automatisch de gemaakte categorie/sectie menuitems als tabellen of blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Gebruik een cachebestand om de prestaties te verbeteren en menuitems te cachen.  In het bijzonder bruikbaar voor prestatieproblemen met hybride menus, waarbij grote menus veel SQL opvragingen nodig hebben om op te bouwen.  Cache reduceert dat tot slechts een set SQL opvragingen tussen cache intervallen.' );
define( '_SW_CACHE_REFRESH_TIP', 'Tijdinterval waarin het cachebestand de menustruktuur ververst.' );
define( '_SW_SHOW_NAME_TIP', 'Toon de menu modulenaam.' );
define( '_SW_PUBLISHED_TIP', 'Publiceer op depubliceer de menu module.');
define( '_SW_ACTIVE_MENU_TIP', 'Houdt het huidige toplevel menuitem in actieve staat voor de pagina welke wordt getoond.' );
define( '_SW_MAX_LEVELS_TIP', 'Maximale level van het bronmenu om te tonen. Geef 0 om alle menulevels te tonen.' );
define( '_SW_PARENT_LEVEL_TIP', 'Geavanceerde instelling om bronmenu van de module terug te herleiden naar een specifiek level. Normaal staat deze waarde op 0.' );
define( '_SW_SELECT_HACK_TIP', 'Breng een aanpassing aan het menu aan om submenus toe te staan zich te tonen over selectboxen van formulieren in IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Toon een kleine pijl als submenu indicator om aan te geven dat een menuitem nog meerdere items heeft.' );
define( '_SW_SHOW_SHADOW_TIP', 'Toon een schaduw rondom submenus.' );
define( '_SW_MODULE_POSITION_TIP', 'Positie van de menumodule in het template.' );
define( '_SW_MODULE_ORDER_TIP', 'Volgorde van de menumodule binnen de template positie.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Toegangsniveau van de menumodule.' );
define( '_SW_TEMPLATE_TIP', 'Menumodule wordt alleen getoond op het geselecteerde template.' );
define( '_SW_LANGUAGE_TIP', 'Menumodule wordt alleen getoond in de geselecteerde taal.' );
define( '_SW_COMPONENT_TIP', 'Menumodule wordt alleen getoond op het geselecteerde component.' );
define( '_SW_PAGES_TIP', 'Selecteer pagina\'s: <i>(houd de ctrl-toets ingedrukt terwijl u met de linker muisknop aanklikt om meerdere pagina\'s te selecteren.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro is een meer robuuste en complete menu module beheer oplossing.  Bezoek  <a href="http://www.swonline.biz" >www.swonline.biz</a> om uit
         te vinden hoe u kunt upgraden en de beschikking kunt krijgen over de volledige kracht and navigatiemogelijkheden die alleen swMenuPro kan bieden.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro staat onbeperkt aantal menumodules toe gebruikmakend van elk van de 7 beschikbare menusystemen.  swMenuFree staat slechts 1 menumodule toe.' );
define( '_SW_SWMENUPRO_2', 'Pas normale en mouseover CSS aan voor elk menuitem binnen iedere menumodule.  Kunnen achtergronden, randen, opvullingen etc. zijn... gebruikmaken van simpele aanwijs en klik interface.' );
define( '_SW_SWMENUPRO_3', 'Pas normale en mouseover afbeeldingen aan voor elk menuitem binnen iedere menumodule, evenals breedtes, hoogtes, verticale spatiering, horizontale spatiering en uitlijning.(Maak menus van uitsluitend afbeeldingen)' );
define( '_SW_SWMENUPRO_4', 'Voeg geavanceerd gedrag aan voor elk menuitem binnen iedere menumodule.  Deze gedragingen kunnen waar of onwaar van de volgende condities zijn. "toon het menuitem?", "toon de naam van het menuitem?"(gebruikt voor menus van uitsluitend afbeeldingen), "is het menuitem aan te klikken?"' );
define( '_SW_SWMENUPRO_5', 'Beheer en creeer nieuwe menumodules met de ingebouwde menumodule manager.' );


?>