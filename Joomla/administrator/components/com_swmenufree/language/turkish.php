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


define( '_SW_UPGRADE_VERSIONS', 'swMenuFree nin Yüklü Olan Sürümü' );
define( '_SW_SELECTED_LANGUAGE_HEADING', 'Aktif Dil Dosyas?' );
define( '_SW_LANGUAGE_FILES', 'Yeni Dil Dosyas? Seçiniz.' );
define( '_SW_LANGUAGE_CHANGE_BUTTON', 'Dil De?i?tir' );
define( '_SW_FILE_PERMISSIONS', 'Aktif Dosya ?zinleri' );
define( '_SW_LANGUAGE_SUCCESS', 'Yeni swMenuFree Dil Dosyas? ba?ar? ile eklenmi?tir.' );
define( '_SW_LANGUAGE_FAIL', ' Dil dosyas? yüklenemiyor. Lütfen a?a??daki dizinlerin hepsinin yaz?labilir oldu?una emin olunuz.' );


//Menu Names
define( '_SW_MENU_SYSTEM', 'Menü Sistemi' );
define( '_SW_TRANS_MENU', 'Trans Menü' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menü' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Manual CSS Düzenleyicisi' );
define( '_SW_MODULE_EDITOR', 'Menü Modül Düzenleyicisi' );
define( '_SW_UPGRADE_FACILITY', 'Güncelleme  Fasilitesi' );


//Common Terms
define( '_SW_WRITABLE', 'Yaz?labilir' );
define( '_SW_UNWRITABLE', 'Yaz?lamaz' );
define( '_SW_YES', 'Evet' );
define( '_SW_NO', 'Hay?r' );
define( '_SW_HYBRID', 'hibrid' );
define( '_SW_MODULE_NAME', 'Modül ?smi' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'Bir menü sistemi seçiniz.<br /><b>Trans Menu:</b>Alt menüsü güzel bir kayma efektine sahip olan bir DHTML popout menü sistemi.<br /><b>MyGosu Menu:</b>?ablon(template) uyumu daha iyi olan bir A DHTML popout menü sistemi' );
define( '_SW_SAVE_TIP', 'Bütün stil ve modül de?i?ikliklerini veritaban?na kaydetmek için buraya t?klay?n?z' );
define( '_SW_CANCEL_TIP', 'De?i?iklikleri iptal etmek ve menü modül yöneticisine dönmek için buraya t?klay?n?z' );
define( '_SW_PREVIEW_TIP', 'Menü modülünü farkl? bir pencerede görmek için buraya t?klay?n?z' );
define( '_SW_EXPORT_TIP', 'Aktif stil ayarlar?n? kullanarak di?ar?dan bir stil ?iti (sheet) getirmek için buray? t?klay?n?z' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'kaydet' );
define( '_SW_CANCEL_BUTTON', 'iptal' );
define( '_SW_PREVIEW_BUTTON', 'önizleme' );
define( '_SW_EXPORT_BUTTON', 'ihraç(export)' );
define( '_SW_UPLOAD_BUTTON', 'dosya yükle' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'swMenuFree yi güncelle/tamir et.' );
define( '_SW_MANAGER_LINK', 'Menü modül özelliklerini düzenle' );
define( '_SW_CSS_LINK', 'D?? CSS dosyas?n? düzenle' );
define( '_SW_EXPORT_LINK', 'D?? CSS dosyas? ihraç et' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Lütfen yüklemek için bir dosya seçiniz' );
define( '_SW_SAVE_MENU_MESSAGE', 'Ayarlar ba?ar?yla kaydedildi.' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'Ayarlar kaydedildi ve d?? CSS dosyas? ba?ar?yla olu?turuldu' );
define( '_SW_SAVE_CSS_MESSAGE', 'D?? CSS dosyas? ba?ar?yla kaydedildi' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'D?? CSS dosyas? olu?turulmad?. modules/mod_swmenufree/styles dizininizin yaz?labilir oldu?undan emin olunuz.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Her?ey tamam' );
define( '_SW_MESSAGES', 'Mesajlar' );
define( '_SW_MODULE_SUCCESS', 'Modül ba?ar?yla güncellendi.' );
define( '_SW_MODULE_FAIL', 'Modül güncellenemiyor. Lütfen /modules dizininizin yaz?labilir oldu?undan emin olunuz.' );
define( '_SW_TABLE_UPGRADE', '%s Tablosu güncellendi' );
define( '_SW_TABLE_CREATE', '%s Tablosu olu?turuldu' );
define( '_SW_UPDATE_LINKS', 'Admin menü linkleri güncellendi' );

define( '_SW_MODULE_VERSION', '?uanki swMenuFree Modül Versiyonu' );
define( '_SW_COMPONENT_VERSION', '?uanki swMenuFree Component Versiyonu' );
define( '_SW_UPLOAD_UPGRADE', 'swMenuFree Upgrade/Release dosyas?n? yükle' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Dosyay? yükle ve kur' );

define( '_SW_COMPONENT_SUCCESS', 'swMenuFree Component ba?ar?yla güncellendi.' );
define( '_SW_COMPONENT_FAIL', 'Güncellenemedi, lütfen a?a??da listeli bütün dizinlerin yaz?labilir oldu?una emin olunuz.' );
define( '_SW_INVALID_FILE', 'Bu dosya geçerli bir yeni swMenuFree upgrade/release dosyas? de?il.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', ' Menü Pozisyonlar? ve Oryantasyon' );
define( '_SW_SIZES_LABEL', 'Menü Elemanlar?n?n Boyutlar?' );
define( '_SW_TOP_OFFSETS_LABEL', 'Top Menü Offsetleri' );
define( '_SW_SUB_OFFSETS_LABEL', 'Alt Menü Offsetleri' );
define( '_SW_ALIGNMENT_LABEL', 'Menü Hizalama' );
define( '_SW_WIDTHS_LABEL', 'Menü Eleman? Geni?li?i' );
define( '_SW_HEIGHTS_LABEL', 'Menü Eleman? Yüksekli?i' );


define( '_SW_TOP_MENU', 'Top Menü' );
define( '_SW_SUB_MENU', 'Alt Menü' );
define( '_SW_ALIGNMENT', 'Hizalama' );
define( '_SW_POSITION', 'Pozisyon' );
define( '_SW_ORIENTATION', 'Oryantasyon' );
define( '_SW_ITEM_WIDTH', 'Eleman Geni?li?i' );
define( '_SW_ITEM_HEIGHT', 'Eleman Yüksekli?i' );
define( '_SW_TOP_OFFSET', 'Top Offset' );
define( '_SW_LEFT_OFFSET', 'Sol Offset' );
define( '_SW_LEVEL', 'Seviye' );
define( '_SW_AUTOSIZE', '(otomatik boyutland?rma için 0 a ayarlay?n)' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Yaz? Tipi Türleri' );
define( '_SW_FONT_SIZE_LABEL', 'Yaz? Tipi Boyutu' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Yaz? Hizalama' );
define( '_SW_FONT_WEIGHT_LABEL', 'Yaz? Tipi Tonlama' );
define( '_SW_PADDING_LABEL', 'Padding' );


define( '_SW_TOP', 'Top' );
define( '_SW_RIGHT', 'Sa?' );
define( '_SW_BOTTOM', 'Alt' );
define( '_SW_LEFT', 'Sol' );
define( '_SW_FONT_SIZE', 'Padding Boyutu' );
define( '_SW_FONT_ALIGNMENT', 'Yaz? Hizalama' );
define( '_SW_FONT_WEIGHT', 'Yaz? Tipi Tonlama' );
define( '_SW_PADDING', 'Padding' );
define( '_SW_FONT_TIP', 'Bütün taray?c?lar yaz? tiplerini ve boyutlar?n? farkl? görüntüler. A?a??daki liste sizin taray?c?n?z yaz? tiplerini nas?l görüntüledi?ini göstermektedir.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'S?n?r Geni?li?i' );
define( '_SW_BORDER_STYLES_LABEL', 'S?n?r Stilleri' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Özel Efekler' );

define( '_SW_OUTSIDE_BORDER', 'D?? S?n?r' );
define( '_SW_INSIDE_BORDER', '?ç S?n?r' );
define( '_SW_NORMAL_BORDER', 'S?n?r' );
define( '_SW_WIDTH', 'Geni?lik' );
define( '_SW_HEIGHT', 'Yükseklik' );
define( '_SW_DIVIDER', 'Bölücü' );
define( '_SW_STYLE', 'Stil' );
define( '_SW_DELAY', 'Aç?lma/Kapanma Süresi' );
define( '_SW_OPACITY', 'Saydaml?k' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Arkafon Resimleri' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Arkafon Renkleri' );
define( '_SW_FONT_COLOR_LABEL', 'Yaz? tipi Renkleri' );
define( '_SW_BORDER_COLOR_LABEL', 'S?n?r Renkleri' );


define( '_SW_BACKGROUND', 'Arkafon' );
define( '_SW_OVER_BACKGROUND', 'Üzerine gelindi?inde Arkafon' );
define( '_SW_COLOR', 'Renk' );
define( '_SW_OVER_COLOR', 'Üzerine Gelindi?inde Renk' );
define( '_SW_FONT', 'Yaz? Tipi Rengi' );
define( '_SW_OVER_FONT', 'Üzerine gelindi?inde Yaz? Tipi Rengi' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Di? S?n?r Rengi' );
define( '_SW_INSIDE_BORDER_COLOR', '?ç S?n?r Rengi' );
define( '_SW_NORMAL_BORDER_COLOR', 'S?n?r Rengi' );
define( '_SW_GET', 'al' );
define( '_SW_COLOR_TIP', 'Renk tekerle?indeki renkleri seçip seçti?iniz rengi kullanmak için renk kutusunun yanindaki %s e t?klay?n?z.');
define( '_SW_PRESENT_COLOR', '?u anki Renk' );
define( '_SW_SELECTED_COLOR', 'Seçilen Renk' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Menü Kayna?? Ayarlar?' );
define( '_SW_STYLE_SHEET_LABEL', 'Stil ?it(sheet) Ayarlar?' );
define( '_SW_AUTO_ITEM_LABEL', 'Otomatik Menü Elemanlar? Ayarlar?' );
define( '_SW_CACHE_LABEL', 'Cache Ayarlar?' );
define( '_SW_GENERAL_LABEL', 'Genel Modül Ayarlar?' );
define( '_SW_POSITION_ACCESS_LABEL', 'Pozisyon ve Eri?im' );
define( '_SW_PAGES_LABEL', 'Menü Modülünü Sayfalarda Göster' );
define( '_SW_CONDITIONS_LABEL', '?artlar' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Stil ?itini direk sayfaya yaz' );
define( '_SW_CSS_LINK_SELECT', 'D?? stil ?itine linkle' );
define( '_SW_CSS_IMPORT_SELECT', 'D?? stil ?iti getir' );
define( '_SW_CSS_NONE_SELECT', 'Stil ?itini linkleme' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Sadece Content kullan' );
define( '_SW_SOURCE_EXISTING_SELECT', 'A?a??da Bulunan Menüyü Seç' );

define( '_SW_SHOW_TABLES_SELECT', 'Tablo halinde göster' );
define( '_SW_SHOW_BLOGS_SELECT', 'Blog halinde göster' );

define( '_SW_10SECOND_SELECT', '10 Saniye' );
define( '_SW_1MINUTE_SELECT', '1 Dakika' );
define( '_SW_30MINUTE_SELECT', '30 Dakika' );
define( '_SW_1HOUR_SELECT', '1 Saat' );
define( '_SW_6HOUR_SELECT', '6 Saat' );
define( '_SW_12HOUR_SELECT', '12 Saat' );
define( '_SW_1DAY_SELECT', '1 Gün' );
define( '_SW_3DAY_SELECT', '3 Gün' );
define( '_SW_1WEEK_SELECT', '1 Hafta' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Menü Modülü Ayarlar?' );
define( '_SW_SIZE_OFFSETS_TAB', 'Boyut, Posizyon ve Offsetler' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Renkler ve Arkafonlar' );
define( '_SW_FONTS_PADDING_TAB', 'Yaz? tipleri ve Padding' );
define( '_SW_BORDERS_EFFECTS_TAB', 'S?n?rlar ve Efektler' );


//general text
define( '_SW_MENU_SOURCE', 'Menü Kayna??' );
define( '_SW_PARENT', 'Ana' );
define( '_SW_STYLE_SHEET', 'Stil ?itini (Sheet) yükle' );
define( '_SW_CLASS_SFX', 'Modül Class Suffix' );
define( '_SW_HYBRID_MENU', 'Hibrid Menü' );
define( '_SW_TABLES_BLOGS', 'Tablolar/Bloglar? kullan' );
define( '_SW_CACHE_ITEMS', 'Cache Menü Elemanlar?' );
define( '_SW_CACHE_REFRESH', 'Cache Yenileme Süresi' );
define( '_SW_SHOW_NAME', 'Modül ?smini Göster' );
define( '_SW_PUBLISHED', 'Yay?nland?');
define( '_SW_ACTIVE_MENU', 'Aktif Menü' );
define( '_SW_MAX_LEVELS', 'Maksimum Seviler' );
define( '_SW_PARENT_LEVEL', 'Ana Seviye' );
define( '_SW_SELECT_HACK', 'Kutu Hack ini Seç' );
define( '_SW_SUB_INDICATOR', 'Alt Menü Göstergesi' );
define( '_SW_SHOW_SHADOW', 'Gölge Göster' );
define( '_SW_MODULE_POSITION', 'Modül Pozisyonu' );
define( '_SW_MODULE_ORDER', 'Modül S?ralamas?' );
define( '_SW_ACCESS_LEVEL', 'Eri?im Seviyesi' );
define( '_SW_TEMPLATE', '?ablon' );
define( '_SW_LANGUAGE', 'Dil' );
define( '_SW_COMPONENT', 'Component' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Menü modülünüzün için menü elemanlar?n?n kayna?? olacak geçerli bir menü seçin.' );
define( '_SW_PARENT_TIP', 'Kaynak menünün bir segmentini görmek için bir parent seçin. Bütün kaynak menü elemanlar?n? görmek için top olarak ayarlay?n.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dynamic:</b> menü modülünün ça??r?ld??? belgeye stil ?itini (style sheet) yazar.<br /><b>Link External: </b> ihraç edilmi? bir d?? stil ?itine (style sheet) linkler.<br /><b>Do Not Link:</b> kendi linkinizi ?ablonunuzun ba??ndaki di? stil ?itine (style sheet) kendiniz kopyalay?n. O zaman menü modülü tamamen onaylayacakt?r.' );
define( '_SW_CLASS_SFX_TIP', '?ablon Modültablosu CSS öncesi yerle?tirilecek suffix. ?ablon modültablosu CSS ile olabilecek cak??malar? engellemek yada ?ablon CSS dosyas? üzerinden daha fazla stil seçenekleri için kullan?labilir.' );
define( '_SW_HYBRID_MENU_TIP', '?çerik kategori/bölümler tablolar/bloglar (Content category/sections tables/blogs) olan içerik menü elemanlar?n?, otomatik olarak içerik menü elemanlar?na ekler.' );
define( '_SW_TABLES_BLOGS_TIP', 'Otomatik olarak olu?turulmu? kategori/bölümler menü elemanlar?n? tablolar ya da bloglar olarak gösterir.' );
define( '_SW_CACHE_ITEMS_TIP', 'Performans? ve cache menü elemanlar?n? artt?rmak için bir cache dosyas? kullan. Özellikle büyük menüler olu?turmak için çok SQL sorgulamas? gerektiren hibrid menülerle alakal? performans konular?nda yararl?d?r. Cache bu sorgulamalar? cache aral?klar?nda sadece bir sete dü?ürür.' );
define( '_SW_CACHE_REFRESH_TIP', 'Cache dosyas?n?n menü elemanlar?n?n yap?s?n? yenilerken ki zaman aral???.' );
define( '_SW_SHOW_NAME_TIP', 'Menü modül ismini göster.' );
define( '_SW_PUBLISHED_TIP', 'menü modülünü yay?nla/yay?nlama.');
define( '_SW_ACTIVE_MENU_TIP', 'Görünen sayfa için ?uanki top menü eleman?n? aktif durumda tut' );
define( '_SW_MAX_LEVELS_TIP', 'Gösterilecek kaynak menünün maksimum seviyesi. Bütün seviyeleri görüntülemek için 0 yap?n.' );
define( '_SW_PARENT_LEVEL_TIP', 'Modülün menü kayna??n? belirli bir seviyeye kadar izleyen geli?mi? ayar. Genellikle 0 a ayarl?.' );
define( '_SW_SELECT_HACK_TIP', 'Alt menülerin IE deki formlardaki seçim kutular?n? örtmesi için menüye hack uygula.' );
define( '_SW_SUB_INDICATOR_TIP', 'Alt menü göstergeci olarak küçük bir ok göster. Alt elemanlar? olan alt menü elemanlar?n? belirtmek için.' );
define( '_SW_SHOW_SHADOW_TIP', 'Altmenülerin etraf?nda gölge göster.' );
define( '_SW_MODULE_POSITION_TIP', '?ablondaki menü modülünün pozisyonu.' );
define( '_SW_MODULE_ORDER_TIP', ' ?ablon pozisyonundaki menü modülünün s?ras?.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Menü modülü için eri?im seviyesi.' );
define( '_SW_TEMPLATE_TIP', 'Menü modülü sadece seçili ?ablonlarda gösterilecek.' );
define( '_SW_LANGUAGE_TIP', 'Menü modülü sadece seçili dillerde gösterilecek.' );
define( '_SW_COMPONENT_TIP', 'Menü modülü sadece seçili componentlerde gösterilecek.' );
define( '_SW_PAGES_TIP', 'SAyfalar? seç: <i>(birden fazla sayfa seçmek için ctrl tu?una bas?p mouse?n sol tu?una bas?n.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro daha sa?lam ve tam menü modül yönetim sistemidir. Sadece swMenuPro n?n sunabilece?i imkanlar? ve nas?l güncelleyece?inizi ö?renmek için <a href="http://www.swmenupro.com" >www.swmenupro.com</a> ? t?klay?n.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro 7 menü sisteminden herhangi birini kullanarak s?n?rs?z say?da menü modülü yapman?za olanak sa?lars.  swMenuFree sadece 1 menü modülüne izin verir.' );
define( '_SW_SWMENUPRO_2', 'Herhangi bir menü eleman? için normal and mouseover? de?i?tir. Arkafon, s?n?rlar, padding vs olabilir. Sadece point and click arayüzünü kullanarak.' );
define( '_SW_SWMENUPRO_3', 'Herhangi bir menü modülündeki herhangi bir menü eleman? için normal and mouseover images resimleri ata. Ayn? zamanda geni?likler, yükseklikler, vspace, hspace ve hizalama.(Sadece resimlerden olu?an menüler yap)' );
define( '_SW_SWMENUPRO_4', 'Herhangi bir menü modülündeki herhangi bir menü eleman? için geli?mi? davran??lar ata. Bu davran??lar  ?u durumlara göre do?ru ya da yanl?? olabilir:. "menü eleman?n? göster?", "menü eleman?n?n ismini göster?"(Sadece resimden olu?an menüler için kullan?l?r), "menü eleman? kliklenebilir?"' );
define( '_SW_SWMENUPRO_5', 'Menü modül yöneticisini kullanarak yeni menü modülleri olu?tur ve yönet.' );


?>