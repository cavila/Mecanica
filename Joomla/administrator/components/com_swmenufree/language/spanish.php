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
define( '_SW_MENU_SYSTEM', 'Sistema del Men&uacute;' );
define( '_SW_TRANS_MENU', 'Men&uacute; Trans ' );
define( '_SW_MYGOSU_MENU', 'Men&uacute; MyGosu ' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Editor Manual de CSS ' );
define( '_SW_MODULE_EDITOR', 'Editor del M&oacute;dulo de Men&uacute;' );
define( '_SW_UPGRADE_FACILITY', 'Actualizaci&oacute;n del Sistema' );


//Common Terms
define( '_SW_WRITABLE', 'Escribible' );
define( '_SW_UNWRITABLE', 'No Escribible' );
define( '_SW_YES', 'S&iacute;' );
define( '_SW_NO', 'No' );
define( '_SW_HYBRID', 'H&iacute;brido' );
define( '_SW_MODULE_NAME', 'Nombre del M&oacute;dulo&nbsp;' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'Seleccione el tipo de Men&uacute;.<br /><b>Trans Men&uacute;:</b> Un men&uacute; din&aacute;mico de HTML que desliza un submen&uacute; instant&aacute;neamente de una manera agradable<br /><b>MyGosu Men&uacute;:</b> Un men&uacute; din&aacute;mico de HTML con una mejor compatibilidad con su plantilla de web' );
define( '_SW_SAVE_TIP', 'Oprima aqu&iacute; para salvar en la base de datos los cambios hechos en estilo o en el m&oacute;dulo ' );
define( '_SW_CANCEL_TIP', 'Oprima aqu&iacute; para cancelar cambios del m&oacute;dulo del men&uacute; y retornar a la administraci&oacute;n' );
define( '_SW_PREVIEW_TIP', 'Oprima aqu&iacute; para visualizar en una nueva ventana el m&oacute;dulo men&uacute; ' );
define( '_SW_EXPORT_TIP', 'Oprima aqu&iacute; para exportar la p&aacute;gina externa de estilo usando los ajustes hechos en el estilo actual ' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'salvar' );
define( '_SW_CANCEL_BUTTON', 'cancelar' );
define( '_SW_PREVIEW_BUTTON', 'visualizar' );
define( '_SW_EXPORT_BUTTON', 'exportar' );
define( '_SW_UPLOAD_BUTTON', 'Subir Archivo' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Actualize/Repare swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Edite las propiedades del m&oacute;dulo men&uacute;' );
define( '_SW_CSS_LINK', 'Manualmente edite hojas externa de estilo de CSS' );
define( '_SW_EXPORT_LINK', 'Exporte una hoja externa de estilo CSS ' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Por favor seleccione un archivo para subir.' );
define( '_SW_SAVE_MENU_MESSAGE', 'Sus ajustes han sido salvados con exito' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'Ajustes han sido salvados y la hoja externa de estilo CSS creada con exito' );
define( '_SW_SAVE_CSS_MESSAGE', 'Hoja externa de Estilo CSS  ha sido salvada con exito' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Hoja externa de Estilo CSS no ha sido creada.  Asegurese que el archivo  &quot;modules/mod_swmenufree/styles&quot; sea escribible.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Todo esta perfecto' );
define( '_SW_MESSAGES', 'Mensajes' );
define( '_SW_MODULE_SUCCESS', 'M&oacute;dulo ha sido actualizado con exito.' );
define( '_SW_MODULE_FAIL', 'No se puede actualizar el m&oacute;dulo. Por favor asegurese que el directorio &quot;/modules&quot; sea escribible' );
define( '_SW_TABLE_UPGRADE', '%s Tablas Actualizada ' );
define( '_SW_TABLE_CREATE', '%s Tablas Creadas ' );
define( '_SW_UPDATE_LINKS', ' Los enlaces del men&uacute; de la admin han sido actualizados' );

define( '_SW_MODULE_VERSION', 'La Version Actual del M&oacute;dulo swMenuFree es' );
define( '_SW_COMPONENT_VERSION', 'La Version Actual del Comp&oacute;nente swMenuFree es' );
define( '_SW_UPLOAD_UPGRADE', 'Sube la version m&aacute;s reciente de swMenuFree' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Sube &amp; Instala Archivo' );

define( '_SW_COMPONENT_SUCCESS', 'ENHORABUENA: El componente swMenuFree ha sido actualizado con exito.' );
define( '_SW_COMPONENT_FAIL', 'ATENCI&Oacute;N: La actualizaci&oacute;n del componente no se ha podido realizar. Por favor asegurese que todos los directorios mencionados a continuaci&oacute;n son escribibles.' );
define( '_SW_INVALID_FILE', 'ATENCI&Oacute;N: Este archivo es no valido. Parece ser que la versi&oacute;n que tratas de actualizar es no la m&aacute;s reciente de swMenuFree' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', ' Posici&oacute;n y Orientaci&oacute;n del Men&uacute;' );
define( '_SW_SIZES_LABEL', 'Tama&ntilde;o del Men&uacute; &Iacute;tem' );
define( '_SW_TOP_OFFSETS_LABEL', '&Oacute;fset del Men&uacute; Superior' );
define( '_SW_SUB_OFFSETS_LABEL', '&Oacute;fset del Men&uacute; Secundario' );
define( '_SW_ALIGNMENT_LABEL', 'Alineaci&oacute;n del Men&uacute;' );
define( '_SW_WIDTHS_LABEL', 'Anchura del &Iacute;tem del Men&uacute;' );
define( '_SW_HEIGHTS_LABEL', 'Altura del &Iacute;tem de Men&uacute;' );


define( '_SW_TOP_MENU', 'Men&uacute; Superior' );
define( '_SW_SUB_MENU', 'Men&uacute; Inferior' );
define( '_SW_ALIGNMENT', 'Alineaci&oacute;n ' );
define( '_SW_POSITION', 'Posici&oacute;n' );
define( '_SW_ORIENTATION', 'Orientaci&oacute;n' );
define( '_SW_ITEM_WIDTH', 'Anchura del &Iacute;tem ' );
define( '_SW_ITEM_HEIGHT', ' Altura del &Iacute;tem' );
define( '_SW_TOP_OFFSET', '&Oacute;fset hac&iacute;a arriba' );
define( '_SW_LEFT_OFFSET', '&Oacute;fset hac&iacute;a la izquierda' );
define( '_SW_LEVEL', 'Nivel ' );
define( '_SW_AUTOSIZE', '(establecer a 0 para ajuste autom&aacute;tico del tama&ntilde;o )' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Familia de Texto' );
define( '_SW_FONT_SIZE_LABEL', 'Tama&ntilde;o del Texto' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Alineaci&oacute;n del Texto' );
define( '_SW_FONT_WEIGHT_LABEL', 'Peso del Texto' );
define( '_SW_PADDING_LABEL', 'Nivel de Relleno' );


define( '_SW_TOP', 'Arriba' );
define( '_SW_RIGHT', 'Derecha' );
define( '_SW_BOTTOM', 'Debajo' );
define( '_SW_LEFT', 'Izquierda' );
define( '_SW_FONT_SIZE', 'Tama&ntilde;o del Texto' );
define( '_SW_FONT_ALIGNMENT', 'Alineaci&oacute;n del Texto' );
define( '_SW_FONT_WEIGHT', 'Peso del Texto' );
define( '_SW_PADDING', 'Relleno' );
define( '_SW_FONT_TIP', 'Todos los navegadores interpretan los tama&ntilde;os y la forma de texto de una manera diferente. A continuaci&oacute;n aparece una lista de como su navegador ha interpretado el tama&ntilde;o y la forma de los textos descriptos.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Anchura del Borde' );
define( '_SW_BORDER_STYLES_LABEL', 'Estilos del Borde' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Efectos Especiales' );

define( '_SW_OUTSIDE_BORDER', 'Borde Exterior' );
define( '_SW_INSIDE_BORDER', 'Borde Interior' );
define( '_SW_NORMAL_BORDER', 'Borde' );
define( '_SW_WIDTH', 'Anchura' );
define( '_SW_HEIGHT', 'Altura' );
define( '_SW_DIVIDER', 'Separador' );
define( '_SW_STYLE', 'Estilo' );
define( '_SW_DELAY', 'Demora de Apertura&frasl;Cierre' );
define( '_SW_OPACITY', 'Transparenc&iacute;a' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', '&Iacute;magenes del Fondo' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Colores del Fondo' );
define( '_SW_FONT_COLOR_LABEL', 'Colores del Texto' );
define( '_SW_BORDER_COLOR_LABEL', 'Colores del Borde' );


define( '_SW_BACKGROUND', 'Fondo' );
define( '_SW_OVER_BACKGROUND', 'Sobre el Fondo' );
define( '_SW_COLOR', 'Color' );
define( '_SW_OVER_COLOR', 'Sobre Color' );
define( '_SW_FONT', 'Color del Texto' );
define( '_SW_OVER_FONT', 'Color Sobre el Texto' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Color del Borde Externo' );
define( '_SW_INSIDE_BORDER_COLOR', 'Color del Borde Interno' );
define( '_SW_NORMAL_BORDER_COLOR', 'Color del Borde' );
define( '_SW_GET', 'Obtenga' );
define( '_SW_COLOR_TIP', 'Seleccione color en la rueda gr&aacute;fica de colores, luego clic %s en la casilla del color donde quiera aplicar la selecci&oacute;n.');
define( '_SW_PRESENT_COLOR', 'Color Presente' );
define( '_SW_SELECTED_COLOR', 'Color Seleccionado' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Ajustes de la Fuente del Men&uacute;' );
define( '_SW_STYLE_SHEET_LABEL', 'Ajustes de la Hoja del Estilo' );
define( '_SW_AUTO_ITEM_LABEL', 'Ajustes autom&aacute;ticos del &iacute;tem del men&uacute;' );
define( '_SW_CACHE_LABEL', 'Ajustes en la memoria cach&egrave;' );
define( '_SW_GENERAL_LABEL', 'Ajustes Generales del M&oacute;dulo' );
define( '_SW_POSITION_ACCESS_LABEL', 'Acceso &amp; Posici&oacute;n' );
define( '_SW_PAGES_LABEL', 'Muestra el M&oacute;dulo del Men&uacute; en las P&aacute;ginas' );
define( '_SW_CONDITIONS_LABEL', 'Condiciones' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Escribe la hoja de estilo directamente en la p&aacute;ina' );
define( '_SW_CSS_LINK_SELECT', 'Enlaza a una hoja externa de estilo' );
define( '_SW_CSS_IMPORT_SELECT', 'Importa una hoja externa de estilo' );
define( '_SW_CSS_NONE_SELECT', 'No enlazar con hoja de estilo' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Use Contenido Solamente' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Selecte el Men&uacute; Existente a Continuaci&oacute;' );

define( '_SW_SHOW_TABLES_SELECT', 'Mostrar como tablas' );
define( '_SW_SHOW_BLOGS_SELECT', 'Mostrar como blogs' );

define( '_SW_10SECOND_SELECT', '10 Segundos' );
define( '_SW_1MINUTE_SELECT', '1 Minuto' );
define( '_SW_30MINUTE_SELECT', '30 Minutos' );
define( '_SW_1HOUR_SELECT', '1 Hora' );
define( '_SW_6HOUR_SELECT', '6 Horas' );
define( '_SW_12HOUR_SELECT', '12 Horas' );
define( '_SW_1DAY_SELECT', '1 D&iacute;a' );
define( '_SW_3DAY_SELECT', '3 D&iacute;as' );
define( '_SW_1WEEK_SELECT', '1 Semana' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Ajustes del M&oacute;dulo del Men&uacute;' );
define( '_SW_SIZE_OFFSETS_TAB', 'Tama&ntilde;o, Posici&oacute;n &amp; &Oacute;fset' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Colores &amp; Fondos' );
define( '_SW_FONTS_PADDING_TAB', 'Textos &amp; Rellenos' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Bordes &amp; Efectos' );


//general text
define( '_SW_MENU_SOURCE', 'Fuente del Men&uacute;' );
define( '_SW_PARENT', 'Padre' );
define( '_SW_STYLE_SHEET', 'Carga la Hoja de Estilo' );
define( '_SW_CLASS_SFX', 'Sufijo de la Clase del M&oacute;dulo' );
define( '_SW_HYBRID_MENU', 'Men&uacute; H&iacute;brido' );
define( '_SW_TABLES_BLOGS', 'Use Tablas/Blogs' );
define( '_SW_CACHE_ITEMS', ' Para los &Iacute;tems del Men&uacute;' );
define( '_SW_CACHE_REFRESH', 'Tiempo de Refresco del Cach&eacute;' );
define( '_SW_SHOW_NAME', 'Muestre el Nombre del M&oacute;dulo' );
define( '_SW_PUBLISHED', 'Publicado');
define( '_SW_ACTIVE_MENU', 'Men&uacute; Activo ' );
define( '_SW_MAX_LEVELS', 'Niveles M&aacute;ximos' );
define( '_SW_PARENT_LEVEL', 'Nivel Padre' );
define( '_SW_SELECT_HACK', 'Seleccione Parche' );
define( '_SW_SUB_INDICATOR', 'Indicador del Men&uacute; Inferior' );
define( '_SW_SHOW_SHADOW', 'Muestre Sombra' );
define( '_SW_MODULE_POSITION', 'Posici&oacute;n del M&oacute;dulo' );
define( '_SW_MODULE_ORDER', 'Orden del M&oacute;dulo' );
define( '_SW_ACCESS_LEVEL', 'Nivel de Acceso' );
define( '_SW_TEMPLATE', 'Plantilla' );
define( '_SW_LANGUAGE', 'Idioma' );
define( '_SW_COMPONENT', 'Componente' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Selecciona un men&uacute; v&aacute;lido para actuar como fuente inicial y modifica los &iacute;tems del men&uacute; en tu nuevo m&oacute;dulo.' );
define( '_SW_PARENT_TIP', 'Selecciona un elemento padre para exponer un segmento de la fuente del men&uacute;. Ubicate al principio del elemento para exponer la fuente de todos los &iacute;tems del men&uacute;.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Din&aacute;mica:</b> escribe la hoja del estilo en el documento desde donde el m&oacute;dulo del men&uacute; sera llamado .<br /><b>Enlace Externo: </b> Enlaces a una hoja externa de estilo que ya ha sido exportada.<br /><b>No Enlance:</b> Manualmente pega tu propio enlace a una hoja externa de estilos en la cabecera &lt;head&gt; de tu plantilla.  El m&oacute;dulo del men&uacute; validar&aacute; la conexi&oacute;n autom&aacute;ticamente. ' );
define( '_SW_CLASS_SFX_TIP', 'S&uacute;fijos deber&aacute;n colocarse en s&uacute; plantilla de hoja de estilo enfrente de cada tabla de estilo. De esta manera se solventar&aacute;n posible conflictos con la hoja general de estilos en su web y le dar&aacute;n un mayor control en el dise&ntilde;o de su men&uacute;' );
define( '_SW_HYBRID_MENU_TIP', 'A&ntilde;ade contenidos autom&aacute;ticamente en partes determinadas como categorias&frasl;secciones o tablas&frasl;blogs.' );
define( '_SW_TABLES_BLOGS_TIP', 'Autom&aacute;ticamente muestra categor&iacute;as/secci&oacute;n de los &iacute;tems del men&uacute; como tablas o blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Utiliza un archivo de memoria cach&egrave; para mejorar la ejecuci&oacute;n y cach&egrave; de los &iacute;tems del men&uacute;. Particularmente &uacute;til en el funcionamiento de los men&uacute;s de tipo h&iacute;brido, donde los men&uacute;s m&aacute;s extensos pueden requerir m&aacute;s consultas del SQL para poder realizar.  El archivo de memoria cach&egrave; reduce esto a apenas una sesion de consultas entre cada intervalo del cach&egrave;. ' );
define( '_SW_CACHE_REFRESH_TIP', 'Intervalo de tiempo necesario para restaurar la estructura del &iacute;tem del men&uacute; en el archivo de memoria cach&egrave; .' );
define( '_SW_SHOW_NAME_TIP', 'Muestra el nombre del m&oacute;dulo men&uacute;.');
define( '_SW_PUBLISHED_TIP', 'Publica o no publica el m&oacute;dulo.');
define( '_SW_ACTIVE_MENU_TIP', 'Mantiene el nivel superior de cada &iacute;tem del men&uacute; en un estado activo cuando la correspondiente p&aacute;gina aparece' );
define( '_SW_MAX_LEVELS_TIP', 'M&aacute;ximo n&uacute;mero de niveles para exhibir en la fuente del men&uacute;.  Fijar a 0 para exhibir todos los niveles.' );
define( '_SW_PARENT_LEVEL_TIP', 'Ajuste avanzado que eleva la fuente del men&uacute; del m&oacute;dulo a un nivel espec&iacute;fico.  Fijado generalmente a 0.' );
define( '_SW_SELECT_HACK_TIP', 'Aplica un parche o hack al men&uacute; para permitir que los submenus sobrepongan las casillas selectas en formas en el IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Muestra una flechita como indicador para se&ntilde;alar los &iacute;tems del submenu que tienen &iacute;tems secundarios ' );
define( '_SW_SHOW_SHADOW_TIP', 'Revela una sombra alrededor de los submenus.' );
define( '_SW_MODULE_POSITION_TIP', 'Posici&oacute;n del m&oacute;dulo del men&uacute; en la plantilla.' );
define( '_SW_MODULE_ORDER_TIP', 'Orden del m&oacute;dulo del men&uacute; en la posici&oacute;n de la plantilla.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Nivel de acceso para el m&oacute;dulo del men&uacute;' );
define( '_SW_TEMPLATE_TIP', 'El m&oacute;dulo del men&uacute; se exhibir&aacute; solamente en la plantilla seleccionada.' );
define( '_SW_LANGUAGE_TIP', 'El m&oacute;dulo del men&uacute; se exhibir&aacute; solamente en la lengua seleccionada.' );
define( '_SW_COMPONENT_TIP', 'El m&oacute;dulo del men&uacute; se exhibir&aacute; solamente en el componente seleccionado.' );
define( '_SW_PAGES_TIP', 'Selecci&oacute;n de P&aacute;ginas: <i>(para seleccionar m&uacute;ltiples p&aacute;ginas mantiene la tecla CLRT presionada mientras elijes apretando la tecla izquierda del rat&oacute;n .)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro es la soluci&oacute;n m&aacute;s robusta y eficaz a la hora de crear menus.  Visite <a href="http://www.swonline.biz" >www.swonline.biz</a> para encontrar como actualizar. Descubre el poder y las oportunidades navegacionales que solamente swMenuPro puede ofrecer.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro permite la posibilidad de crear ilimitado n&uacute;mero de m&oacute;dulos usando cualquiera de los 7 sistemas disponibles. Con swMenuFree s&oacute;lo es posible un tipo m&oacute;dulo.' );
define( '_SW_SWMENUPRO_2', 'Posibilidad de alterar el normal y el mouseover CSS (Cascada de Hojas de Estilo) para cualquier art&iacute;culo de men&uacute; dentro de cualquier m&oacute;dulo del men&uacute;.  Con swPromenu puedes modificar cualquier aspecto del m&oacute;dulo ya sean los fondos, los bordes, el rellenado, el texto etc…. Con un interfaz de apuntar y teclear puedes dise&ntilde;ar menus fac&iacute;lmente, salvando tiempo en el proceso...' );
define( '_SW_SWMENUPRO_3', 'Asignar im&aacute;genes normales y del mouseover para cualquier art&iacute;culo de men&uacute; dentro de cualquier m&oacute;dulo del men&uacute;, as&iacute; como anchura, altura, vspace, hspace y alineaci&oacute;n. (Crear men&uacute;s de solamente &iacute;magenes)' );
define( '_SW_SWMENUPRO_4', 'Asignar los comportamientos avanzados a cualquier art&iacute;culo o &iacute;tem de men&uacute; dentro de cualquier m&oacute;dulo del men&uacute;.  Estos comportamientos pueden ser verdaderos o falsos con las siguientes condiciones . “&iquest;muestra el art&iacute;culo de men&uacute;? ”, “&iquest;muestra el nombre del art&iacute;culo de men&uacute;? ” (Utilizado para crear men&uacute;s de im&aacute;genes solamente), “&iquest;es el art&iacute;culo de men&uacute; cl&iacute;cable?” ' );
define( '_SW_SWMENUPRO_5', 'Controle y cree nuevos m&oacute;dulos del men&uacute; usando el men&uacute; innato en el m&oacute;dulo principal.' );


?>