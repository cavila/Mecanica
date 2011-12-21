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
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Manuel CSS Editor' );
define( '_SW_MODULE_EDITOR', 'Menu Modul Editor' );
define( '_SW_UPGRADE_FACILITY', 'Opgradingsmuligheder' );


//Common Terms
define( '_SW_WRITABLE', 'ej skrivebeskyttet' );
define( '_SW_UNWRITABLE', 'skrivebeskyttet' );
define( '_SW_YES', 'Ja' );
define( '_SW_NO', 'Nej' );
define( '_SW_HYBRID', 'hybrid' );
define( '_SW_MODULE_NAME', 'Modul Navn' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'Vælg et Menu System.<br /><b>Trans Menu:</b>Et DHTML pop-ud menu system med en flot undermenu glideeffekt.<br /><b>MyGosu Menu:</b>Et DHTML pop-ud menu system med en bedre skabelon kompatibilitet.' );
define( '_SW_SAVE_TIP', 'Klik her for at gemme alle style- og modulændringer i databasen' );
define( '_SW_CANCEL_TIP', 'Klik her for at annullere ændringer og returnere til menu modul manageren' );
define( '_SW_PREVIEW_TIP', 'Klik her for at se et smugkik i et pop-up vindue' );
define( '_SW_EXPORT_TIP', 'Klik her for at eksportere til et eksternt style sheet ved brug af de nuværende style indstillinger' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'gem' );
define( '_SW_CANCEL_BUTTON', 'annuller' );
define( '_SW_PREVIEW_BUTTON', 'smugkik' );
define( '_SW_EXPORT_BUTTON', 'eksporter' );
define( '_SW_UPLOAD_BUTTON', 'Upload fil' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Upgrader/Reparer swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Ændre menu modul egenskaber' );
define( '_SW_CSS_LINK', 'Manuelt ændre ekstern CSS fil' );
define( '_SW_EXPORT_LINK', 'Eksporter en ekstern CSS fil' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Vælg venligst en fil til upload.' );
define( '_SW_SAVE_MENU_MESSAGE', 'Indstillinger gemt med succes' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'Indstillinger gemt og ekstern css fil er oprettet med succes' );
define( '_SW_SAVE_CSS_MESSAGE', 'Ekstern CSS fil gemt med succes' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Ekstern CSS fil er ikke oprettet. Kontroller venligst at dine modules/mod_swmenufree/styles mappe ikke er skrivebeskyttet.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Alt er OK' );
define( '_SW_MESSAGES', 'Beskeder' );
define( '_SW_MODULE_SUCCESS', 'Modulet er opdateret med succes.' );
define( '_SW_MODULE_FAIL', 'Kunne ikke opdatere modulet. Kontroller venligst at din /modules mappe ikke er skrivebeskyttet.' );
define( '_SW_TABLE_UPGRADE', 'Opgraderet %s Tabel' );
define( '_SW_TABLE_CREATE', 'Oprettet %s Tabel' );
define( '_SW_UPDATE_LINKS', 'Opdateret admin menu links' );

define( '_SW_MODULE_VERSION', 'Nuværende swMenuFree Modul version' );
define( '_SW_COMPONENT_VERSION', 'Nuværende swMenuFree Komponent version' );
define( '_SW_UPLOAD_UPGRADE', 'Upload swMenuFree Opgraderings/udgivelses fil' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Upload &amp; Installer fil' );

define( '_SW_COMPONENT_SUCCESS', 'Opgraderet swMenuFree Component med succes.' );
define( '_SW_COMPONENT_FAIL', 'Kunne ikke opgradere, kontroller venligst at alle mapper som er vist nedenfor ikke er skrivebeskyttet.' );
define( '_SW_INVALID_FILE', 'Dette ser ikke ud til at være en nyere gyldig swMenuFree opgraderings/udgivelses fil.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Menuposition og orientering' );
define( '_SW_SIZES_LABEL', 'Menuobjekt størrelse' );
define( '_SW_TOP_OFFSETS_LABEL', 'Topmenu offset' );
define( '_SW_SUB_OFFSETS_LABEL', 'Undermenu offset' );
define( '_SW_ALIGNMENT_LABEL', 'Menu justeringer' );
define( '_SW_WIDTHS_LABEL', 'Menuobjekt bredde' );
define( '_SW_HEIGHTS_LABEL', 'Menuobjekt højde' );


define( '_SW_TOP_MENU', 'Topmenu' );
define( '_SW_SUB_MENU', 'Undermenu' );
define( '_SW_ALIGNMENT', 'Justering' );
define( '_SW_POSITION', 'position' );
define( '_SW_ORIENTATION', 'orientering' );
define( '_SW_ITEM_WIDTH', 'Objektbredde' );
define( '_SW_ITEM_HEIGHT', 'Objekthøjde' );
define( '_SW_TOP_OFFSET', 'Top offset' );
define( '_SW_LEFT_OFFSET', 'Venstre offset' );
define( '_SW_LEVEL', 'Niveau' );
define( '_SW_AUTOSIZE', '(sæt til 0 for automatisk størrelse)' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Skrifttype familie' );
define( '_SW_FONT_SIZE_LABEL', 'Skrifttype størrelse' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Tekst justering' );
define( '_SW_FONT_WEIGHT_LABEL', 'Skrifttype vægt' );
define( '_SW_PADDING_LABEL', 'Padding' );


define( '_SW_TOP', 'Top' );
define( '_SW_RIGHT', 'Højre' );
define( '_SW_BOTTOM', 'Bund' );
define( '_SW_LEFT', 'Venstre' );
define( '_SW_FONT_SIZE', 'Skrifttype størrelse' );
define( '_SW_FONT_ALIGNMENT', 'Tekst justering' );
define( '_SW_FONT_WEIGHT', 'Skrifttype vægt' );
define( '_SW_PADDING', 'Padding' );
define( '_SW_FONT_TIP', 'Alle browsere renderer skrifttyper og størrelser forskelligt. Listen nedenfor viser hvordan din browser har renderet de beskrevne skrifttyper og størrelser.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Bredde af Rammer' );
define( '_SW_BORDER_STYLES_LABEL', 'Form af Rammer' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Specielle effekter' );

define( '_SW_OUTSIDE_BORDER', 'Ydre Ramme' );
define( '_SW_INSIDE_BORDER', 'Indre Ramme' );
define( '_SW_NORMAL_BORDER', 'Ramme' );
define( '_SW_WIDTH', 'Bredde' );
define( '_SW_HEIGHT', 'Højde' );
define( '_SW_DIVIDER', 'Deling' );
define( '_SW_STYLE', 'Form' );
define( '_SW_DELAY', 'Åbn/Luk forsinkelse' );
define( '_SW_OPACITY', 'Synlighed' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Baggrundsbilleder' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Baggrundsfarver' );
define( '_SW_FONT_COLOR_LABEL', 'Skrifttypefarver' );
define( '_SW_BORDER_COLOR_LABEL', 'Farver på rammer' );


define( '_SW_BACKGROUND', 'Baggrund' );
define( '_SW_OVER_BACKGROUND', 'Baggrund ved markering' );
define( '_SW_COLOR', 'Farve' );
define( '_SW_OVER_COLOR', 'Farve ved markering' );
define( '_SW_FONT', 'Skrifttypefarve' );
define( '_SW_OVER_FONT', 'Skrifttypefarve ved markering' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Farve på yderramme' );
define( '_SW_INSIDE_BORDER_COLOR', 'Farve på inderramme' );
define( '_SW_NORMAL_BORDER_COLOR', 'Farve på ramme' );
define( '_SW_GET', 'get' );
define( '_SW_COLOR_TIP', 'Vælg farve på farvehjulet og klik på %s ved siden af en ønskede farveboks for at bruge den valgte farve.');
define( '_SW_PRESENT_COLOR', 'Nuværende farve' );
define( '_SW_SELECTED_COLOR', 'Valgte farve' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Menu Kilde Indstillinger' );
define( '_SW_STYLE_SHEET_LABEL', 'Style Sheet Indstillinger' );
define( '_SW_AUTO_ITEM_LABEL', 'Automatisk Menuobjekt Indstillinger' );
define( '_SW_CACHE_LABEL', 'Cache Indstillinger' );
define( '_SW_GENERAL_LABEL', 'Generel Modul Indstillinger' );
define( '_SW_POSITION_ACCESS_LABEL', 'Position &amp; Adgang' );
define( '_SW_PAGES_LABEL', 'Vis Menu Modul på Sider' );
define( '_SW_CONDITIONS_LABEL', 'Forhold' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Gem style sheet direkte i siden' );
define( '_SW_CSS_LINK_SELECT', 'Link til eksternt style sheet' );
define( '_SW_CSS_IMPORT_SELECT', 'Importer eksternt style sheet' );
define( '_SW_CSS_NONE_SELECT', 'Link ikke til style sheet' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Brug kun indhold' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Vælg eksisterende menu nedenfor' );

define( '_SW_SHOW_TABLES_SELECT', 'Vis som tabeller' );
define( '_SW_SHOW_BLOGS_SELECT', 'Vis som blogs' );

define( '_SW_10SECOND_SELECT', '10 sekunder' );
define( '_SW_1MINUTE_SELECT', '1 minut' );
define( '_SW_30MINUTE_SELECT', '30 minutter' );
define( '_SW_1HOUR_SELECT', '1 time' );
define( '_SW_6HOUR_SELECT', '6 timer' );
define( '_SW_12HOUR_SELECT', '12 timer' );
define( '_SW_1DAY_SELECT', '1 dag' );
define( '_SW_3DAY_SELECT', '3 dage' );
define( '_SW_1WEEK_SELECT', '1 uge' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Menu Modul Indstillinger' );
define( '_SW_SIZE_OFFSETS_TAB', 'Størrelse, Position &amp; Offset' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Farver &amp; Baggrunde' );
define( '_SW_FONTS_PADDING_TAB', 'Skrifttyper &amp; Padding' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Rammer &amp; Effekter' );


//general text
define( '_SW_MENU_SOURCE', 'Menu Kilde' );
define( '_SW_PARENT', 'Forældre' );
define( '_SW_STYLE_SHEET', 'Åbn Style Sheet' );
define( '_SW_CLASS_SFX', 'Modul Class Suffix' );
define( '_SW_HYBRID_MENU', 'Hybrid Menu' );
define( '_SW_TABLES_BLOGS', 'Brug Tabeller/Blogs' );
define( '_SW_CACHE_ITEMS', 'Cache Menuobjekter' );
define( '_SW_CACHE_REFRESH', 'Cache Opdateringstid' );
define( '_SW_SHOW_NAME', 'Vis Modulnavn' );
define( '_SW_PUBLISHED', 'Udgivet');
define( '_SW_ACTIVE_MENU', 'Aktiv Menu' );
define( '_SW_MAX_LEVELS', 'Maksimale Niveauer' );
define( '_SW_PARENT_LEVEL', 'Forælder Niveau' );
define( '_SW_SELECT_HACK', 'Vælg Boks Hack' );
define( '_SW_SUB_INDICATOR', 'Undermenu Indikator' );
define( '_SW_SHOW_SHADOW', 'Vis Skygge' );
define( '_SW_MODULE_POSITION', 'Modul Position' );
define( '_SW_MODULE_ORDER', 'Modul Rækkefølge' );
define( '_SW_ACCESS_LEVEL', 'Adgangsniveau' );
define( '_SW_TEMPLATE', 'Skabelon' );
define( '_SW_LANGUAGE', 'Sprog' );
define( '_SW_COMPONENT', 'Komponent' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Vælg en gyldig menu som kilde til menuobjekter for dit menumodul.' );
define( '_SW_PARENT_TIP', 'Vælg en forældre til at vise et segment af kilde menuen. Vælg top for at få vist alle kildens menuobjekter.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dynamisk:</b> skriver style sheetet i det dokument hvor menu modulet bliver kaldt.<br /><b>Link Eksternt: </b>linker til et eksternt style sheet som er blevet eksporteret.<br /><b>Link ikke:</b> Sæt manuelt dit eget link til det eksterne style sheet ind i hovedet på din skabelon.  Menu modulet derved blive valideret helt.' );
define( '_SW_CLASS_SFX_TIP', 'Suffiks til at placere før skabelon moduletable CSS.  Kan bruges til at undgå konflikter med skabelon moduletable CSS og for flere style indstillinger gennem skabelon CSS filen.' );
define( '_SW_HYBRID_MENU_TIP', 'Tilføj automatisk indholds menuobjekter til menuobjekter der er i indholdet fra kategori/sektions tabeller/blogs.' );
define( '_SW_TABLES_BLOGS_TIP', 'Vis automatisk genereret kategori/sektion menuobjekter som tabeller eller blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Brug fil cache til at øge performance og cache menuobjekter. Specielt brugbar for performanceproblemer with hybride menuer, hvor store menuer vil skulle bruge SQL forespørgsler. Cache reducerer det til kun et sæt af forespørgsler mellem hvert cache interval.' );
define( '_SW_CACHE_REFRESH_TIP', 'Tidsinterval mellem cache fil opdatering af menuobjekt strukturen.' );
define( '_SW_SHOW_NAME_TIP', 'Vis menu modul navnet.' );
define( '_SW_PUBLISHED_TIP', 'Udgiv eller træk menu modulet tilbage.');
define( '_SW_ACTIVE_MENU_TIP', 'Behold nuværende top niveau menuobjekt i et aktiv stadie for sider der bliver vist.' );
define( '_SW_MAX_LEVELS_TIP', 'Maksimalt antal af niveauer fra kilde menuen som skal vises.  Sættes til 0 for at vise alle niveauer.' );
define( '_SW_PARENT_LEVEL_TIP', 'Advanceret indstilling som sporer menu kilden af et modul tilbage til et spcificeret niveau.  Normalt sat til 0.' );
define( '_SW_SELECT_HACK_TIP', 'Anvend et hack på menuen for at tillade undermenuer at overlappe select bokse i forms i IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Vis en lille pil som undermenu indikator for at vise undermenuer der har nogle underliggende objekter.' );
define( '_SW_SHOW_SHADOW_TIP', 'Vis en skygge rundt om undermenuer.' );
define( '_SW_MODULE_POSITION_TIP', 'Position af menu modulet i skabelonen.' );
define( '_SW_MODULE_ORDER_TIP', 'Rækkefølge af menumodulet i skabelonen.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Adgangsniveau for menu modulet.' );
define( '_SW_TEMPLATE_TIP', 'Menu modulet vil kun vises på den valgte skabelon.' );
define( '_SW_LANGUAGE_TIP', 'Menu modulet vil kun vises på det valgte sprog.' );
define( '_SW_COMPONENT_TIP', 'Menu modulet vil kun vises på på den valgte komponent.' );
define( '_SW_PAGES_TIP', 'Vælg sider: <i>(Hold ctrl-knappen nede mens du venstreklikker med musen for at vælge flere sider.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro er en mere robust og komplet menu modul administrationsløsning.  Besøg <a href="http://www.swonline.biz" >www.swonline.biz</a> for at finde
        ud af hvordan du opgraderer og udnytter det fulde potentiale og navigationsmæssige muligheder som kun swMenuPro kan tilbyde.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro tilbyder uendelig mange menu moduler ved at bruge en hvilken som helst af de 7 tilgængelige menu systemer.  swMenuFree tillader kun 1 menu modul.' );
define( '_SW_SWMENUPRO_2', 'Skift normale og mouseover CSS for et vilkårligt menuobjekt i hvilket som helst menu modul. Det kan være baggrunde, rammer, padding etc... ved brug af et simpelt peg og klik interface.' );
define( '_SW_SWMENUPRO_3', 'Tildel normale and mouseover billeder for et vilkårligt menuobjekt i et hvilket som helst menu modul, ligesom bredder, højder, vspace, hspace og justeringer.(Lav "kun billed" menuer)' );
define( '_SW_SWMENUPRO_4', 'Tildel avancerede opførsler til et vilkårligt menuobjekt i et hvilket som helst menu modul.  Disse opførsler kan være sande eller falske til følgende betingelser. "vis menuobjektet?", "vis menuobjektets navn?"(bruges til at lave "kun billede" menuer), "er det muligt at klikke på menuobjektet?"' );
define( '_SW_SWMENUPRO_5', 'Administrer og tilføj nye menu moduler ved brug af den inbyggede modul administration.' );


?>