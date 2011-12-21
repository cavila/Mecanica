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
define( '_SW_MENU_SYSTEM', 'Menu Syst&egrave;me' );
define( '_SW_TRANS_MENU', 'Trans Menu' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menu' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Editeur CSS manuel' );
define( '_SW_MODULE_EDITOR', 'Editeur <br>de module de menu' );
define( '_SW_UPGRADE_FACILITY', 'Service de mise &agrave; jour' );


//Common Terms
define( '_SW_WRITABLE', 'Modifiable' );
define( '_SW_UNWRITABLE', 'Non modifiable' );
define( '_SW_YES', 'Oui' );
define( '_SW_NO', 'Non' );
define( '_SW_HYBRID', 'hybride' );
define( '_SW_MODULE_NAME', 'Nom de module' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'S&eacute;lectionnez un syst&egrave;me de menu.<br /><b>Trans Menu:</b>Un syst&egrave;me de menu DHTML avec un bel effet de glissement du sous-menu.<br /><b>MyGosu Menu:</b>Un syst&egrave;me de menu DHTML dot&eacute; d&rsquo;une meilleure compatibilit&eacute; avec certains templates.' );
define( '_SW_SAVE_TIP', 'Cliquez ici pour sauvegarder tous les changements de style et de module dans la base de donn&eacute;es' );
define( '_SW_CANCEL_TIP', 'Cliquez ici pour annuler les changements et retourner au manageur de module de menu' );
define( '_SW_PREVIEW_TIP', 'Cliquez ici pour pr&eacute;visualiser le module de menu dans une nouvelle fen&ecirc;tre' );
define( '_SW_EXPORT_TIP', 'Cliquez ici pour exporter une feuille de style externe utilisant les r&eacute;glages actuels de style' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'Enregistrer' );
define( '_SW_CANCEL_BUTTON', 'Annuler' );
define( '_SW_PREVIEW_BUTTON', 'pr&eacute;-vue' );
define( '_SW_EXPORT_BUTTON', 'exporter' );
define( '_SW_UPLOAD_BUTTON', 'Envoi de fichier' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Mise &agrave; jour/R&eacute;paration de swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Editer les propri&eacute;t&eacute;s du module de menu' );
define( '_SW_CSS_LINK', 'Editer manuellement le fichier externe <br>de style CSS' );
define( '_SW_EXPORT_LINK', 'Exporter un fichier CSS externe' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'S&eacute;lectionnez un fichier &agrave; envoyer.' );
define( '_SW_SAVE_MENU_MESSAGE', 'R&eacute;glages sauvegard&eacute;s avec succ&egrave;s' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'R&eacute;glages sauvegard&eacute;s et fichier CSS externe cr&eacute;&eacute; avec succ&egrave;s' );
define( '_SW_SAVE_CSS_MESSAGE', 'Fichier CSS externe sauvegard&eacute; avec succ&egrave;s' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Fichier CSS externe non cr&eacute;&eacute;. Assurez-vous que votre dossier modules/mod_swmenufree/styles est modifiable en &eacute;criture.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Tout est en ordre' );
define( '_SW_MESSAGES', 'Messages' );
define( '_SW_MODULE_SUCCESS', 'Le module &agrave; &eacute;t&eacute; mis &agrave; jour avec succ&egrave;s.' );
define( '_SW_MODULE_FAIL', 'Impossible de mettre &agrave; jour le module.  Veuillez v&eacute;rifier que le r&eacute;pertoire /modules est modifiable en &eacute;criture.' );
define( '_SW_TABLE_UPGRADE', '%s table(s) mise(s) &agrave; jour' );
define( '_SW_TABLE_CREATE', '%s table(s) cr&eacute;&eacute;e(s)' );
define( '_SW_UPDATE_LINKS', 'Liens du menu admin mis &agrave; jour' );

define( '_SW_MODULE_VERSION', 'Version actuelle du module swMenuFree' );
define( '_SW_COMPONENT_VERSION', 'Version actuelle du composant swMenuFree' );
define( '_SW_UPLOAD_UPGRADE', 'Envoi fichier de mise &agrave; jour/Release swMenuFree' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Envoi &amp; installation de fichier' );

define( '_SW_COMPONENT_SUCCESS', 'Composant swMenuFree mis &agrave; jour avec succ&egrave;s.' );
define( '_SW_COMPONENT_FAIL', 'Impossible de mettre &agrave; jour, veuillez v&eacute;rifier que tous les r&eacute;pertoires list&eacute;s ci-dessous soient modifiables en &eacute;criture.' );
define( '_SW_INVALID_FILE', 'Ceci ne semble pas &ecirc;tre une nouvelle version valide de fichier de mise &agrave; jour/Release swMenuFree.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Position de menu et orientation' );
define( '_SW_SIZES_LABEL', 'Dimensions des items de menu' );
define( '_SW_TOP_OFFSETS_LABEL', 'D&eacute;calages Top Menu' );
define( '_SW_SUB_OFFSETS_LABEL', 'D&eacute;calages sous-menu' );
define( '_SW_ALIGNMENT_LABEL', 'Alignement de menu' );
define( '_SW_WIDTHS_LABEL', 'Largeurs des items de menu' );
define( '_SW_HEIGHTS_LABEL', 'Hauteurs des items de menu' );


define( '_SW_TOP_MENU', 'Top Menu' );
define( '_SW_SUB_MENU', 'Sous-menu' );
define( '_SW_ALIGNMENT', 'Alignement' );
define( '_SW_POSITION', 'Position' );
define( '_SW_ORIENTATION', 'Orientation' );
define( '_SW_ITEM_WIDTH', 'Largeur item' );
define( '_SW_ITEM_HEIGHT', 'Hauteur item' );
define( '_SW_TOP_OFFSET', 'D&eacute;calage haut' );
define( '_SW_LEFT_OFFSET', 'D&eacute;calage gauche' );
define( '_SW_LEVEL', 'Niveau' );
define( '_SW_AUTOSIZE', '(R&eacute;gler &agrave; 0 pour taille automatique)' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Famille de police' );
define( '_SW_FONT_SIZE_LABEL', 'Corps' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Alignement du texte' );
define( '_SW_FONT_WEIGHT_LABEL', 'Graisse' );
define( '_SW_PADDING_LABEL', 'Remplissage (Padding)' );


define( '_SW_TOP', 'Haut' );
define( '_SW_RIGHT', 'Droite' );
define( '_SW_BOTTOM', 'Bas' );
define( '_SW_LEFT', 'gauche' );
define( '_SW_FONT_SIZE', 'Corps' );
define( '_SW_FONT_ALIGNMENT', 'Alignement du texte' );
define( '_SW_FONT_WEIGHT', 'Graisse' );
define( '_SW_PADDING', 'Remplissage (Padding)' );
define( '_SW_FONT_TIP', 'Chaque navigateur affiche diff&eacute;remment les polices et les tailles. La liste ci-dessous montre comment votre navigateur a rendu les polices et les tailles d&eacute;crites.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Largeurs de contour' );
define( '_SW_BORDER_STYLES_LABEL', 'Styles de contour' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Effets sp&eacute;ciaux' );

define( '_SW_OUTSIDE_BORDER', 'Contour externe' );
define( '_SW_INSIDE_BORDER', 'Contour interne' );
define( '_SW_NORMAL_BORDER', 'contour' );
define( '_SW_WIDTH', 'Largeur' );
define( '_SW_HEIGHT', 'Hauteur' );
define( '_SW_DIVIDER', 'Diviseur' );
define( '_SW_STYLE', 'Style' );
define( '_SW_DELAY', 'D&eacute;lai d&rsquo;ouverture/fermeture' );
define( '_SW_OPACITY', 'Transparence' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Images de fond' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Couleurs de fond' );
define( '_SW_FONT_COLOR_LABEL', 'Couleurs de police' );
define( '_SW_BORDER_COLOR_LABEL', 'Couleurs de contour' );


define( '_SW_BACKGROUND', 'Fond' );
define( '_SW_OVER_BACKGROUND', 'Fond en survol (Over)' );
define( '_SW_COLOR', 'Couleur' );
define( '_SW_OVER_COLOR', 'Couleur en survol (Over)' );
define( '_SW_FONT', 'Couleur de police' );
define( '_SW_OVER_FONT', 'Couleur de police en survol (Over)' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Couleur de contour externe' );
define( '_SW_INSIDE_BORDER_COLOR', 'Couleur de contour interne' );
define( '_SW_NORMAL_BORDER_COLOR', 'Couleur de contour' );
define( '_SW_GET', 'copie' );
define( '_SW_COLOR_TIP', 'S&eacute;lectionnez les couleurs sur la roue des couleurs puis cliquez sur %s &agrave; c&ocicirc;t&eacute; de la case de couleur pour appliquer la couleur s&eacute;lectionn&eacute;e.');
define( '_SW_PRESENT_COLOR', 'Couleur sous le pointeur souris' );
define( '_SW_SELECTED_COLOR', 'Couleur s&eacute;lectionn&eacute;e' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'R&eacute;glages de Menu-source' );
define( '_SW_STYLE_SHEET_LABEL', 'R&eacute;glages de feuille de style' );
define( '_SW_AUTO_ITEM_LABEL', 'R&eacute;glages des items du Menu automatique' );
define( '_SW_CACHE_LABEL', 'R&eacute;glages de cache' );
define( '_SW_GENERAL_LABEL', 'R&eacute;glages g&eacute;n&eacute;raux du module' );
define( '_SW_POSITION_ACCESS_LABEL', 'Position &amp; Acc&egrave;s' );
define( '_SW_PAGES_LABEL', 'Afficher le module menu sur les pages' );
define( '_SW_CONDITIONS_LABEL', 'Conditions' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Ecrire la feuille de style dans la page' );
define( '_SW_CSS_LINK_SELECT', 'Lier &agrave; une feuille de style externe' );
define( '_SW_CSS_IMPORT_SELECT', 'Importer une feuille de style externe' );
define( '_SW_CSS_NONE_SELECT', 'Ne pas lier de feuille de style' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Utiliser du contenu seulement' );
define( '_SW_SOURCE_EXISTING_SELECT', 'S&eacute;lectionnez un menu existant ci-dessous' );

define( '_SW_SHOW_TABLES_SELECT', 'Afficher en tables' );
define( '_SW_SHOW_BLOGS_SELECT', 'Afficher en blogs' );

define( '_SW_10SECOND_SELECT', '10 Secondes' );
define( '_SW_1MINUTE_SELECT', '1 Minute' );
define( '_SW_30MINUTE_SELECT', '30 Minutes' );
define( '_SW_1HOUR_SELECT', '1 heure' );
define( '_SW_6HOUR_SELECT', '6 heures' );
define( '_SW_12HOUR_SELECT', '12 heures' );
define( '_SW_1DAY_SELECT', '1 jour' );
define( '_SW_3DAY_SELECT', '3 jours' );
define( '_SW_1WEEK_SELECT', '1 semaine' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'R&eacute;glages <br>du module de menu' );
define( '_SW_SIZE_OFFSETS_TAB', 'Dimensions, position <br>&amp; d&eacute;calages' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Couleurs &amp; fonds' );
define( '_SW_FONTS_PADDING_TAB', 'Polices &amp; remplissage' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Contours &amp; Effets' );


//general text
define( '_SW_MENU_SOURCE', 'Menu-source' );
define( '_SW_PARENT', 'Parent' );
define( '_SW_STYLE_SHEET', 'Charger la feuille de style' );
define( '_SW_CLASS_SFX', 'Suffixe Class du module' );
define( '_SW_HYBRID_MENU', 'Menu hybride' );
define( '_SW_TABLES_BLOGS', 'Utiliser Tables/Blogs' );
define( '_SW_CACHE_ITEMS', 'Cache des items du menu' );
define( '_SW_CACHE_REFRESH', 'Temps de rafra&icirc;chissement du cache' );
define( '_SW_SHOW_NAME', 'Afficher le nom du module' );
define( '_SW_PUBLISHED', 'Publi&eacute;');
define( '_SW_ACTIVE_MENU', 'Menu actif' );
define( '_SW_MAX_LEVELS', 'Niveaux maximum' );
define( '_SW_PARENT_LEVEL', 'Niveau parent' );
define( '_SW_SELECT_HACK', 'S&eacute;lectionner Box Hack (bidouille)' );
define( '_SW_SUB_INDICATOR', 'Indicateur de sous-menu' );
define( '_SW_SHOW_SHADOW', 'Afficher ombre' );
define( '_SW_MODULE_POSITION', 'Position du module' );
define( '_SW_MODULE_ORDER', 'Ordre du module' );
define( '_SW_ACCESS_LEVEL', 'Niveau d&rsquo;acc&egrave;s' );
define( '_SW_TEMPLATE', 'Template' );
define( '_SW_LANGUAGE', 'Langage' );
define( '_SW_COMPONENT', 'Composant' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'S&eacute;lectionnez un menu valide pour servir de  source d&rsquo;items de menu pour votre module de menu.' );
define( '_SW_PARENT_TIP', 'S&eacute;lectionnez un parent pour afficher une seule partie du Menu-source.  R&eacute;glez sur TOP pour afficher tous les items du Menu-source.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dynamique:</b> &eacute;crit la feuille de style dans le document o&ugrave; le module de menu est appel&eacute;.<br /><b>Lien externe: </b>Lie &agrave; une feuille de style externe qui a &eacute;t&eacute; export&eacute;e.<br /><b>Ne pas lier:</b> collez manuellement votre propre lien vers une feuille de style externe dans  l&rsquo;en-t&ecirc;te des templates.  Le module de menu validera compl&egrave;tement.' );
define( '_SW_CLASS_SFX_TIP', 'Suffixe &agrave; placer devant le moduletable CSS des templates.  Peut &ecirc;tre utilis&eacute; pour &eacute;viter les conflits avec le moduletable CSS du template et pour plus d&rsquo;options de style au travers du fichier CSS du template.' );
define( '_SW_HYBRID_MENU_TIP', 'Appose automatiquement les items de menu de contenu aux items de menu qui sont contenu cat&eacute;gorie/sections tables/blogs.' );
define( '_SW_TABLES_BLOGS_TIP', 'Afficher automatiquement les items de cat&eacute;gories/section cr&eacute;&eacute;s comme table ou blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Utiliser un fichier cache pour am&eacute;liorer les performances et mettre en cache les items de menu.  Particuli&egrave;rement utile pour les probl&egrave;mes de performances avec les menus hybrides o&ugrave; de grands menus peuvent g&eacute;n&eacute;rer beaucoup de requ&ecirc;tes SQL.  Le cache r&eacute;duit cela en un seul jeu de requ&ecirc;tes entre les intervalles de cache.' );
define( '_SW_CACHE_REFRESH_TIP', 'Intervalle de temps pour le rafra&icirc;chissement de la structure des items du menu dans le fichier cache.' );
define( '_SW_SHOW_NAME_TIP', 'Afficher le nom du module de menu.' );
define( '_SW_PUBLISHED_TIP', 'Publier ou d&eacute;-publier le module de menu.');
define( '_SW_ACTIVE_MENU_TIP', 'Garder le niveau sup&eacute;rieur de l&rsquo;item actuel de menu dans un &eacute;tat actif en rapport avec la page affich&eacute;e.' );
define( '_SW_MAX_LEVELS_TIP', 'Niveaux maximum du menu-source &agrave; afficher. R&eacute;glez sur 0 pour afficher tous les niveaux.' );
define( '_SW_PARENT_LEVEL_TIP', 'R&eacute;glage avanc&eacute; qui retrace &agrave; un certain niveau la source du module du menu.  Habituellement r&eacute;gl&eacute; sur 0.' );
define( '_SW_SELECT_HACK_TIP', 'Applique une bidouille (hack) au menu pour permettre aux sous-menus de flotter au-dessus des &eacute;l&eacute;ments de formulaire avec IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Afficher une petite fl&egrave;che comme indicateur de sous-menu pour indiquer les items de sous-menu qui ont des items enfants.' );
define( '_SW_SHOW_SHADOW_TIP', 'Afficher une ombre autour des sous-menus.' );
define( '_SW_MODULE_POSITION_TIP', 'Position du module de menu dans le template.' );
define( '_SW_MODULE_ORDER_TIP', 'Ordre de module de menu dans la position du  template.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Niveau d&rsquo;acc&egrave;s pour le module de menu.' );
define( '_SW_TEMPLATE_TIP', 'Le module de menu s&rsquo;affichera seulement sur le template s&eacute;lectionn&eacute;.' );
define( '_SW_LANGUAGE_TIP', 'Le module de menu s&rsquo;affichera seulement pour le langage s&eacute;lectionn&eacute;.' );
define( '_SW_COMPONENT_TIP', 'Le module de menu s&rsquo;affichera seulement sur le composant s&eacute;lectionn&eacute;.' );
define( '_SW_PAGES_TIP', 'S&eacute;lectionnez les pages: <i>(enfoncer la touche ctrl (Windows) ou commande ou majuscule (OS Mac) pendant que vous cliquez le bouton gauche de la souris pour s&eacute;lectionner plusieurs pages.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro est une solution de management de module de menu robuste et compl&egrave;te.  Visitez <a href="http://www.swonline.biz" >www.swonline.biz</a> pour trouver
        comment mettre &agrave; jour et ma&icirc;triser la pleine puissance et les capacit&eacute;s de navigation que seul  swMenuPro peut vous offrir.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro permet un nombre illimit&eacute; de modules de menu en utilisant un des 7 syst&egrave;mes de menu disponibles.  swMenuFree vous permet seulement 1 module de menu.' );
define( '_SW_SWMENUPRO_2', 'Alternez le CSS normal et survol pour chaque menu dans n&rsquo;importe quel module de menu.  Tous les fonds, les contours, les remplissages, etc. en utilisant un simple interface de clic de souris.' );
define( '_SW_SWMENUPRO_3', 'Assignez des images au repos ou en survol pour n&rsquo;importe quel item de menu &agrave; l&rsquo;int&eacute;rieur de n&rsquo;importe quel module de menu, de m&ecirc;me pour les largeurs, hauteurs, vspace, hspace et alignement (cr&eacute;ez des menus faits seulement d&rsquo;image).' );
define( '_SW_SWMENUPRO_4', 'Assignez des comportements avanc&eacute;s &agrave; n&rsquo;importe quel item dans n&rsquo;importe quel module de menu. Ces comportements peuvent &ecirc;tre true (vrai) ou false (faux) selon les conditions suivantes. "Afficher l&rsquo;item du menu ?", "Afficher le nom de l&rsquo;item de menu?"(Utilis&eacute; pour cr&eacute;er des menus d&rsquo;images seulement), "L&rsquo;item du menu est-il cliquable?".' );
define( '_SW_SWMENUPRO_5', 'Organisez et cr&eacute;ez de nouveaux modules de menu en utilisant le nouveau manageur de module de menu int&eacute;gr&eacute;.' );


?>