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
define( '_SW_MENU_SYSTEM', 'Menürendszer' );
define( '_SW_TRANS_MENU', 'Trans Menu' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menu' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Kézi CSS szerkesztõ' );
define( '_SW_MODULE_EDITOR', 'Menümodul szerkesztõ' );
define( '_SW_UPGRADE_FACILITY', 'Frissítés' );


//Common Terms
define( '_SW_WRITABLE', 'Írható' );
define( '_SW_UNWRITABLE', 'Nem írható' );
define( '_SW_YES', 'Igen' );
define( '_SW_NO', 'Nem' );
define( '_SW_HYBRID', 'hibrid' );
define( '_SW_MODULE_NAME', 'Modul neve' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'Válasszon menürendszert .<br /><b>Trans Menu:</b> Dinamikus legördülõ menürendszer igényes almenü nyitó effektussal<br /><b>MyGosu Menu:</b> Dinamikus legördülõ menürendszer jobb sablon kompatibilitással' );
define( '_SW_SAVE_TIP', 'A stíluson és a modulon végzett összes változtatás elmentéséhez kattintson ide' );
define( '_SW_CANCEL_TIP', 'A változtatások érvénytelenítéséhez és a menükezelõbe való visszatéréshez kattintson ide' );
define( '_SW_PREVIEW_TIP', 'Az elõbukkanó ablakban megjelenõ elõnézeti kép megtekintéséhez kattintson ide' );
define( '_SW_EXPORT_TIP', 'A jelenleg használt stílusbeállítások külsõ stíluslapba történõ kimentéséhez kattintson ide' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'Mentés' );
define( '_SW_CANCEL_BUTTON', 'Mégse' );
define( '_SW_PREVIEW_BUTTON', 'Elõnézet' );
define( '_SW_EXPORT_BUTTON', 'Exportálás' );
define( '_SW_UPLOAD_BUTTON', 'Fájl feltöltése' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'swMenuFree frissítése/helyreállítása.' );
define( '_SW_MANAGER_LINK', 'Menümodul tulajdonságainak szerkesztése' );
define( '_SW_CSS_LINK', 'Külsõ CSS fájl kézi szerkesztése' );
define( '_SW_EXPORT_LINK', 'Exportálás külsõ CSS fájlba' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Válassza ki a feltölteni kívánt fájlt' );
define( '_SW_SAVE_MENU_MESSAGE', 'A beállítások mentése sikerült' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'A beállítások mentése megtörtént, és a külsõ CSS fájl létrehozása sikerült' );
define( '_SW_SAVE_CSS_MESSAGE', 'A külsõ CSS fájl mentése sikerült' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'A külsõ CSS fájlt nem sikerült létrehozni. Gyõzõdjön meg arról, hogy írható-e a modules/mod_swmenufree/styles mappa.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Minden rendben' );
define( '_SW_MESSAGES', 'Üzenetek' );
define( '_SW_MODULE_SUCCESS', 'A modul frissítése sikerült.' );
define( '_SW_MODULE_FAIL', 'A modult nem sikerült frissíteni. Gyõzõdjön meg arról, hogy írható-e a /modules mappa.' );
define( '_SW_TABLE_UPGRADE', 'A(z) %s tábla frissítve' );
define( '_SW_TABLE_CREATE', 'A(z) %s tábla létrehozva' );
define( '_SW_UPDATE_LINKS', 'Az admin menü hivatkozásainak frissítése megtörtént' );

define( '_SW_MODULE_VERSION', 'Jelenlegi swMenuFree modul verzió' );
define( '_SW_COMPONENT_VERSION', 'Jelenlegi swMenuFree komponens verzió' );
define( '_SW_UPLOAD_UPGRADE', 'swMenuFree frissítés/új verzió feltöltése' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Fájl feltöltése és telepítése' );

define( '_SW_COMPONENT_SUCCESS', 'Az swMenuFree komponens frissítése sikerült.' );
define( '_SW_COMPONENT_FAIL', 'A frissítés nem sikerült, gyõzõdjön meg arról, hogy írhatóak-e az alábbi listában szereplõ mappák.' );
define( '_SW_INVALID_FILE', 'Érvénytelen swMenuFree frissítés/új verzió fájl .' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Menü helye és iránya' );
define( '_SW_SIZES_LABEL', 'Menüpont méretei' );
define( '_SW_TOP_OFFSETS_LABEL', 'Fõmenü iránya' );
define( '_SW_SUB_OFFSETS_LABEL', 'Almenü iránya' );
define( '_SW_ALIGNMENT_LABEL', 'Menü igazítás' );
define( '_SW_WIDTHS_LABEL', 'Menüpont szélessége' );
define( '_SW_HEIGHTS_LABEL', 'Menüpont magassága' );


define( '_SW_TOP_MENU', 'Fõmenü' );
define( '_SW_SUB_MENU', 'Almenü' );
define( '_SW_ALIGNMENT', 'szövegigazítás' );
define( '_SW_POSITION', 'pozíciója' );
define( '_SW_ORIENTATION', 'iránya' );
define( '_SW_ITEM_WIDTH', 'menüpont szélessége' );
define( '_SW_ITEM_HEIGHT', 'menüpont magassága' );
define( '_SW_TOP_OFFSET', 'eltolás fentrõl' );
define( '_SW_LEFT_OFFSET', 'eltolás balról' );
define( '_SW_LEVEL', 'Szint' );
define( '_SW_AUTOSIZE', '0 érték esetén automatikus méretezés' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Betûcsalád' );
define( '_SW_FONT_SIZE_LABEL', 'Betûméret' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Szövegigazítás' );
define( '_SW_FONT_WEIGHT_LABEL', 'Betûvastagság' );
define( '_SW_PADDING_LABEL', 'Szövegtávolság' );


define( '_SW_TOP', 'Fentrõl' );
define( '_SW_RIGHT', 'Jobbról' );
define( '_SW_BOTTOM', 'Alulról' );
define( '_SW_LEFT', 'Balról' );
define( '_SW_FONT_SIZE', 'betûmérete' );
define( '_SW_FONT_ALIGNMENT', 'szövegigazítás' );
define( '_SW_FONT_WEIGHT', 'betûvastagsága' );
define( '_SW_PADDING', 'szövegtávolsága' );
define( '_SW_FONT_TIP', 'Minden böngészõ eltérõ módon jeleníti meg az egyes betûket, ill. betûméreteket. Az alábbi lista megmutatja, hogy az Ön böngészõje hogyan jeleníti meg a különbözõ betûket és betûméreteket.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Szegély vastagsága' );
define( '_SW_BORDER_STYLES_LABEL', 'Szegély stílusa' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Különleges effektusok' );

define( '_SW_OUTSIDE_BORDER', 'külsõ szegélyének' );
define( '_SW_INSIDE_BORDER', 'belsõ szegélyének' );
define( '_SW_NORMAL_BORDER', 'szegély' );
define( '_SW_WIDTH', 'szélessége' );
define( '_SW_HEIGHT', 'magassága' );
define( '_SW_DIVIDER', 'Elválasztó' );
define( '_SW_STYLE', 'stílusa' );
define( '_SW_DELAY', 'Almenü nyitásának késleltetése' );
define( '_SW_OPACITY', 'átlátszósága' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Háttérkép' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Háttér színe' );
define( '_SW_FONT_COLOR_LABEL', 'Betûszín' );
define( '_SW_BORDER_COLOR_LABEL', 'Szegély színe' );


define( '_SW_BACKGROUND', 'Háttér' );
define( '_SW_OVER_BACKGROUND', 'kijelölve - háttérkép ' );
define( '_SW_COLOR', 'Szín' );
define( '_SW_OVER_COLOR', 'kijelölve - háttérszín' );
define( '_SW_FONT', 'Betûszín' );
define( '_SW_OVER_FONT', 'kijelölve - betûszín' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'külsõ szegélyének színe' );
define( '_SW_INSIDE_BORDER_COLOR', 'belsõ szegélyének színe' );
define( '_SW_NORMAL_BORDER_COLOR', 'szegély színe' );
define( '_SW_GET', 'Beállít' );
define( '_SW_COLOR_TIP', 'Válasszon egy színt a palettáról, majd kattintson a paletta melletti %s gombra a kiválasztott szín alkalmazásához.');
define( '_SW_PRESENT_COLOR', 'Jelenlegi szín' );
define( '_SW_SELECTED_COLOR', 'Kiválasztott szín' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Menüforrás beállítása' );
define( '_SW_STYLE_SHEET_LABEL', 'Stíluslap beállítása' );
define( '_SW_AUTO_ITEM_LABEL', 'Automatikus menüpontok beállítása' );
define( '_SW_CACHE_LABEL', 'Gyorsítótár beállítása' );
define( '_SW_GENERAL_LABEL', 'Általános modulbeállítások' );
define( '_SW_POSITION_ACCESS_LABEL', 'Pozíció és hozzáférés' );
define( '_SW_PAGES_LABEL', 'Menümodul megjelenítése a kiválasztott oldalakon' );
define( '_SW_CONDITIONS_LABEL', 'Feltételek' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Stílusinformációk írása közvetlenül az oldal forráskódjába' );
define( '_SW_CSS_LINK_SELECT', 'Hivatkozás külsõ stíluslapra' );
define( '_SW_CSS_IMPORT_SELECT', 'Külsõ stíluslap importálása' );
define( '_SW_CSS_NONE_SELECT', 'Nincs hivatkozás stíluslapra' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Csak tartalmi elemek használata' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Válasszon az alábbi menük közül' );

define( '_SW_SHOW_TABLES_SELECT', 'Megjelenítés táblázatként' );
define( '_SW_SHOW_BLOGS_SELECT', 'Megjelenítés blogként' );

define( '_SW_10SECOND_SELECT', '10 másodperc' );
define( '_SW_1MINUTE_SELECT', '1 perc' );
define( '_SW_30MINUTE_SELECT', '30 perc' );
define( '_SW_1HOUR_SELECT', '1 óra' );
define( '_SW_6HOUR_SELECT', '6 óra' );
define( '_SW_12HOUR_SELECT', '12 óra' );
define( '_SW_1DAY_SELECT', '1 nap' );
define( '_SW_3DAY_SELECT', '3 nap' );
define( '_SW_1WEEK_SELECT', '1 hét' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Menümodul beállítása' );
define( '_SW_SIZE_OFFSETS_TAB', 'Méret, pozíció és eltolás' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Színek és háttér' );
define( '_SW_FONTS_PADDING_TAB', 'Betû és szövegtávolság' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Szegélyek és effektusok' );


//general text
define( '_SW_MENU_SOURCE', 'Menü forrása' );
define( '_SW_PARENT', 'Szülõ' );
define( '_SW_STYLE_SHEET', 'Stíluslap betöltése' );
define( '_SW_CLASS_SFX', 'Modul stílusosztály-utótag' );
define( '_SW_HYBRID_MENU', 'Hibrid menü' );
define( '_SW_TABLES_BLOGS', 'Táblázat/blog használata' );
define( '_SW_CACHE_ITEMS', 'Menüpontok cach-elése' );
define( '_SW_CACHE_REFRESH', 'Gyorsítótár frissítési ideje' );
define( '_SW_SHOW_NAME', 'Modulnév megjelenítése' );
define( '_SW_PUBLISHED', 'Közzétéve');
define( '_SW_ACTIVE_MENU', 'Aktív menü' );
define( '_SW_MAX_LEVELS', 'Szintek száma' );
define( '_SW_PARENT_LEVEL', 'Szülõ elem szintje' );
define( '_SW_SELECT_HACK', 'Legördülõ lista hibajavítása' );
define( '_SW_SUB_INDICATOR', 'Almenü ikon' );
define( '_SW_SHOW_SHADOW', 'Árnyék megjelenítése' );
define( '_SW_MODULE_POSITION', 'Modulpozíció' );
define( '_SW_MODULE_ORDER', 'Modulok sorrendje' );
define( '_SW_ACCESS_LEVEL', 'Hozzáférési szint' );
define( '_SW_TEMPLATE', 'Sablon' );
define( '_SW_LANGUAGE', 'Nyelv' );
define( '_SW_COMPONENT', 'Komponens' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Válasszon egy érvényes/létezõ menüt, amely forrásként szolgál a menümodul számára.' );
define( '_SW_PARENT_TIP', 'Válasszon egy szülõ elemet, amely megjeleníti a forrásmenü egy részét. Ha mindegyik menüpontot meg akarja jeleníteni, akkor a szülõ elemet állítsa TOP-ra .' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dinamikus: </b>közvetlenül abba a lapba kerülnek a stílusinformációk, amely a modult megjeleníti.<br /><b>Külsõ hivatkozás: </b>egy, már kimentett külsõ stíluslapra hivatkozik.<br /><b>Nincs hivatkozás:</b> Sajátkezûleg illessze be a külsõ stíluslapra mutató hivatkozást, sablonjának fejléc részében. A menümodulja így lesz teljesen mûködõképes.' );
define( '_SW_CLASS_SFX_TIP', 'Az utótagot helyezze a sablonjában egy .moduletable stílusosztály elé. Ezzel elkerülheti a többi stílusosztállyal való ütközést, és még több paramétert tud testreszabni a sablonja segítségével. ' );
define( '_SW_HYBRID_MENU_TIP', 'A kategória, szekció és blog típusú menüpontokhoz automatikusan hozzáfûzi azok tartalmi elemeit is.' );
define( '_SW_TABLES_BLOGS_TIP', 'Az automatikusan létrehozott szekció/kategória elemeket táblázatos vagy blog formátumban jeleníti meg.' );
define( '_SW_CACHE_ITEMS_TIP', 'Egy fájlt használ átmeneti tárolóként, hogy abban tárolja a menüpontokat, és ezáltal növelje a teljesítményt. Különösen hasznos a hibrid menünél, ahol a nagyobb menü, több SQL kérés lefuttatását teszi szükségessé. Az átmeneti tároló két frissítés között ezt egyetlen sornyi lekérdezésre csökkenti.' );
define( '_SW_CACHE_REFRESH_TIP', 'Az átmeneti tároló frissítésének gyakorisága.' );
define( '_SW_SHOW_NAME_TIP', 'Megjeleníti a modul nevét.' );
define( '_SW_PUBLISHED_TIP', 'Közzéteszi vagy visszavonja a menümodult.');
define( '_SW_ACTIVE_MENU_TIP', 'Az aktuálisan használt fõmenüpontot külön színnel emeli ki, mindaddig, míg az általa hivatkozott oldalon tartózkodunk.' );
define( '_SW_MAX_LEVELS_TIP', 'A megjelenítendõ forrásmenü szintjeinek száma. Az összes szint megjelenítéséhez állítsa 0-ra.' );
define( '_SW_PARENT_LEVEL_TIP', 'Olyan speciális beállítás, amely a modul menüforrását egy elõre beállított szintig követi vissza.  Az alapérték 0.' );
define( '_SW_SELECT_HACK_TIP', 'Olyan hibajavítást alkalmaz a menün, amely lehetõvé teszi az almenük számára, hogy IE-ben az ûrlapokon szereplõ legördülõ lista felett is megfelelõen mûködjenek.' );
define( '_SW_SUB_INDICATOR_TIP', 'Megjelenít egy kis nyíl ikont azokban az almenüpontokban, amelyeknek további menüpontjaik vannak.' );
define( '_SW_SHOW_SHADOW_TIP', 'Megjeleníti az árnyékot az almenük körül.' );
define( '_SW_MODULE_POSITION_TIP', 'A menümodul pozíciója a sablonban.' );
define( '_SW_MODULE_ORDER_TIP', 'A menümodul sorrendje az adott pozícióban.' );
define( '_SW_ACCESS_LEVEL_TIP', 'A menümodul hozzáférési szintje.' );
define( '_SW_TEMPLATE_TIP', 'A menümodul csak a kiválasztott sablonban jelenik meg.' );
define( '_SW_LANGUAGE_TIP', 'A menümodul csak a kiválasztott nyelven jelenik meg.' );
define( '_SW_COMPONENT_TIP', 'A menümodul csak a kiválasztott komponenssel együtt jelenik meg.' );
define( '_SW_PAGES_TIP', 'Oldalak kiválasztása: <i>(A CTRL gomb nyomva tartásával egyszerre több oldalt is kijelölhet.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'Az swMenuPro egy erõteljesebb és összetettebb menükezelõ megoldás.  Látogasson a <a href="http://www.swonline.biz"  >www.swonline.biz</a> címre, hogy megtudja, hogyan tud frissíteni az swMenuPro változatra, és hogyan hasznosíthatja azt a képességet és navigációs lehetõséget, amit csak az swMenuPro tud nyújtani.' );
define( '_SW_SWMENUPRO_1', 'Az swMenuPro korlátlan számú menümodul használatát teszi lehetõvé, a rendelkézésre álló 7 menürendszer közül bármelyiket használva. Az swMenuFree csupán egyetlen menümodul használatát biztosítja.' );
define( '_SW_SWMENUPRO_2', 'Használjon felváltva más és más stíluslapot bármely normál és kijelölt állapotú menüponthoz, bármely menümodulon belül. Felváltva használhat különbözõ háttereket, szegélyeket, szövegtávolságokat stb... egy egyszerû "kijelölés és kattintás" segítségével.' );
define( '_SW_SWMENUPRO_3', 'Rendeljen más és más háttérképet bármely normál és kijelölt állapotú menüponthoz, bármely menümodulon belül, állítsa be a kép szélességét, magasságát, a vízszintes és függõleges margóit, vagy az elhelyezkedését.(Hozzon létre csak képekbõl álló menüt)' );
define( '_SW_SWMENUPRO_4', 'Rendeljen további tulajdonságokat bármely menüponthoz, bármely menümodulon belül.  Ezek a tulajdonságok az alábbi feltételekhez kapcsolódóan lépnek mûködésbe. "Látszódik a menüpont?", "Látszódik a menüpont neve?"(Általában a csak képet használó menüknél), "Rá lehet kattintani a menüpontra?"' );
define( '_SW_SWMENUPRO_5', 'Hozzon létre új menümodulokat a beépített menümodul kezelõ segítségével.' );


?>
