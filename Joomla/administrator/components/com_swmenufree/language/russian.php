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

//Новые термины swMenuFree 4.5


define( '_SW_UPGRADE_VERSIONS', 'Текущая установленная версия swMenuFree' );
define( '_SW_SELECTED_LANGUAGE_HEADING', 'Текущий языковой файл' );
define( '_SW_LANGUAGE_FILES', 'Выберите новый языковой файл' );
define( '_SW_LANGUAGE_CHANGE_BUTTON', 'Сменить язык' );
define( '_SW_FILE_PERMISSIONS', 'Текущие разрешения на запись' );
define( '_SW_LANGUAGE_SUCCESS', 'Новый языковой файл swMenuFree успешно добавлен.' );
define( '_SW_LANGUAGE_FAIL', 'Невозможно загрузить языковой файл, пожалуйста, убедитесь, что все нижеуказанные папки доступны для записи.' );


//Имена меню
define( '_SW_MENU_SYSTEM', 'Система меню' );
define( '_SW_TRANS_MENU', 'Trans Menu' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menu' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Имена страниц
define( '_SW_MANUAL_CSS_EDITOR', 'Ручной редактор CSS' );
define( '_SW_MODULE_EDITOR', 'Редактор модуля меню' );
define( '_SW_UPGRADE_FACILITY', 'Средства обновления' );


//Общие термины
define( '_SW_WRITABLE', 'Доступно' );
define( '_SW_UNWRITABLE', 'Недоступно' );
define( '_SW_YES', 'Да' );
define( '_SW_NO', 'Нет' );
define( '_SW_HYBRID', 'hybrid' );
define( '_SW_MODULE_NAME', 'Имя модуля' );

//Подсказки
//define( '_SW_MENU_SYSTEM_TIP', 'Выбор системы меню.<br /><b>Trans Menu:</b> DHTML меню с изящным под-меню с эффектом скольжения.<br /><b>MyGosu Menu:</b> DHTML меню повышенной совместимости с шаблонами.' );
define( '_SW_SAVE_TIP', 'Нажмите здесь, чтобы сохранить все изменения стиля и модуля в базе данных' );
define( '_SW_CANCEL_TIP', 'Нажмите здесь, чтобы отменить изменения и вернуться в редактор модуля меню' );
define( '_SW_PREVIEW_TIP', 'Нажмите здесь, чтобы просмотреть модуль меню во всплывающем окне' );
define( '_SW_EXPORT_TIP', 'Нажмите здесь для экспорта таблицы стилей с использованием текущих параметров во внешний файл' );

//Текст кнопок
define( '_SW_SAVE_BUTTON', 'сохранить' );
define( '_SW_CANCEL_BUTTON', 'отмена' );
define( '_SW_PREVIEW_BUTTON', 'просмотр' );
define( '_SW_EXPORT_BUTTON', 'экспорт' );
define( '_SW_UPLOAD_BUTTON', 'Загрузить файл' );


//Внутренние ссылки программы
define( '_SW_UPGRADE_LINK', 'Обновление/Восстановление swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Редактирование свойств модуля меню' );
define( '_SW_CSS_LINK', 'Ручное редактирование внешнего CSS файла' );
define( '_SW_EXPORT_LINK', 'Экспорт CSS во внешний файл' );


//Программные уведомления
define( '_SW_UPLOAD_FILE_NOTICE', 'Пожалуйста, выберите файл для загрузки.' );
define( '_SW_SAVE_MENU_MESSAGE', 'Параметры успешно сохранены' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'Параметры сохранены и внешний CSS файл успешно создан' );
define( '_SW_SAVE_CSS_MESSAGE', 'Внешний CSS файл успешно сохранен' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Внешний CSS файл не создан.  Убедитесь, что папка modules/mod_swmenufree/styles  доступна для записи.' );


//////////////////////////
//Страница обновлений
/////////////////////////
define( '_SW_OK', 'Все в порядке' );
define( '_SW_MESSAGES', 'Сообщения' );
define( '_SW_MODULE_SUCCESS', 'Модуль успешно обновлен.' );
define( '_SW_MODULE_FAIL', 'Невозможо обновить модуль.  Пожалуйста, убедитесь, что папка /modules доступна для записи.' );
define( '_SW_TABLE_UPGRADE', 'Таблица %s обновлена' );
define( '_SW_TABLE_CREATE', 'Таблица %s создана' );
define( '_SW_UPDATE_LINKS', 'Ссылки меню обновлены' );

define( '_SW_MODULE_VERSION', 'Текущая версия модуля swMenuFree' );
define( '_SW_COMPONENT_VERSION', 'Текущая версия компонента swMenuFree' );
define( '_SW_UPLOAD_UPGRADE', 'Загрузка файла обновления/выпуска swMenuFree' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Загрузить и установить файл' );

define( '_SW_COMPONENT_SUCCESS', 'Компонент swMenuFree успешно обновлен.' );
define( '_SW_COMPONENT_FAIL', 'Обновление невозможно. Пожалуйста, убедитесь, что все нижеуказанные папки доступны для записи.' );
define( '_SW_INVALID_FILE', 'Этот файл не является правильным пакетом обновления/установки swMenuFree.' );



//////////////////////////////
//Страница размера, позиции и смещения
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Положение и ориентация меню' );
define( '_SW_SIZES_LABEL', 'Размеры элементов меню' );
define( '_SW_TOP_OFFSETS_LABEL', 'Смещения меню верхнего уровня' );
define( '_SW_SUB_OFFSETS_LABEL', 'Смещения подменю' );
define( '_SW_ALIGNMENT_LABEL', 'Выравнивание меню' );
define( '_SW_WIDTHS_LABEL', 'Ширина элементов меню' );
define( '_SW_HEIGHTS_LABEL', 'Высота элементов меню' );


define( '_SW_TOP_MENU', 'Меню' );
define( '_SW_SUB_MENU', 'Подменю' );
define( '_SW_ALIGNMENT', 'Выравнивание' );
define( '_SW_POSITION', 'Положение' );
define( '_SW_ORIENTATION', 'Ориентация' );
define( '_SW_ITEM_WIDTH', '- Ширина' );
define( '_SW_ITEM_HEIGHT', '- Высота' );
define( '_SW_TOP_OFFSET', 'Смещение сверху' );
define( '_SW_LEFT_OFFSET', 'Смещение слева' );
define( '_SW_LEVEL', 'Уровень' );
define( '_SW_AUTOSIZE', '(0 = авторазмер)' );

//////////////////////
//Страница шрифтов и отступов
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Выбор шрифта' );
define( '_SW_FONT_SIZE_LABEL', 'Размер шрифта' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Выравнивание текста' );
define( '_SW_FONT_WEIGHT_LABEL', 'Плотность шрифта' );
define( '_SW_PADDING_LABEL', 'Отступы' );


define( '_SW_TOP', 'Сверху' );
define( '_SW_RIGHT', 'Справа' );
define( '_SW_BOTTOM', 'Снизу' );
define( '_SW_LEFT', 'Слева' );
define( '_SW_FONT_SIZE', '- Размер шрифта' );
define( '_SW_FONT_ALIGNMENT', '- Выравнивание текста' );
define( '_SW_FONT_WEIGHT', '- Плотность шрифта' );
define( '_SW_PADDING', '- Отступы' );
define( '_SW_FONT_TIP', 'Все браузеры отображают шрифты и размеры по-разному. Список ниже показывает, как указанные шрифты и размеры отображаются в вашем браузере.' );

/////////////////////////
//Страница границ и эффектов
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Ширина границ' );
define( '_SW_BORDER_STYLES_LABEL', 'Стили границ' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Специальные эффекты' );

define( '_SW_OUTSIDE_BORDER', '- Внешняя граница' );
define( '_SW_INSIDE_BORDER', '- Внутренняя граница' );
define( '_SW_NORMAL_BORDER', '- Граница' );
define( '_SW_WIDTH', '- Ширина' );
define( '_SW_HEIGHT', '- Высота' );
define( '_SW_DIVIDER', '- Разделитель' );
define( '_SW_STYLE', '- Стиль' );
define( '_SW_DELAY', '- Задержка открытия/закрытия' );
define( '_SW_OPACITY', '- Прозрачность' );

///////////////////////////
//Страница цветов и фонов
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Фоновые изображения' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Цвет фона' );
define( '_SW_FONT_COLOR_LABEL', 'Цвет шрифта' );
define( '_SW_BORDER_COLOR_LABEL', 'Цвет границ' );


define( '_SW_BACKGROUND', '- фон' );
define( '_SW_OVER_BACKGROUND', '- фон при наведении' );
define( '_SW_COLOR', '- Цвет' );
define( '_SW_OVER_COLOR', '- Цвет при наведении' );
define( '_SW_FONT', '- Цвет шрифта' );
define( '_SW_OVER_FONT', '- Цвет шрифта при наведении' );
define( '_SW_OUTSIDE_BORDER_COLOR', '- Цвет внешней границы' );
define( '_SW_INSIDE_BORDER_COLOR', '- Цвет внутренней границы' );
define( '_SW_NORMAL_BORDER_COLOR', '- Цвет границы' );
define( '_SW_GET', 'выбор' );
define( '_SW_COLOR_TIP', 'Выберите цвет на палитре и нажмите кнопку %s около поля, к которому вы хотите применить выбранный цвет.');
define( '_SW_PRESENT_COLOR', 'Текущий цвет' );
define( '_SW_SELECTED_COLOR', 'Выбранный цвет' );


///////////////////////////
//Страница параметров модуля меню
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Установка источника меню' );
define( '_SW_STYLE_SHEET_LABEL', 'Параметры таблицы стилей' );
define( '_SW_AUTO_ITEM_LABEL', 'Автоматическая настройка элементов меню' );
define( '_SW_CACHE_LABEL', 'Параметры кэширования' );
define( '_SW_GENERAL_LABEL', 'Общие параметры модуля' );
define( '_SW_POSITION_ACCESS_LABEL', 'Размещение и доступ' );
define( '_SW_PAGES_LABEL', 'Отображение модуля меню на страницах' );
define( '_SW_CONDITIONS_LABEL', 'Условия' );

//Текст списков выбора
define( '_SW_CSS_DYNAMIC_SELECT', 'Внедрить стиль напрямую в страницу' );
define( '_SW_CSS_LINK_SELECT', 'Ссылка на внешнюю таблицу стилей' );
define( '_SW_CSS_IMPORT_SELECT', 'Импорт внешней таблицы стилей' );
define( '_SW_CSS_NONE_SELECT', 'Не связывать с таблицей стилей' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Использовать только контент' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Выбрать существующее меню ниже' );

define( '_SW_SHOW_TABLES_SELECT', 'Показывать как таблицы' );
define( '_SW_SHOW_BLOGS_SELECT', 'Показывать как блоги' );

define( '_SW_10SECOND_SELECT', '10 секунд' );
define( '_SW_1MINUTE_SELECT', '1 минута' );
define( '_SW_30MINUTE_SELECT', '30 минут' );
define( '_SW_1HOUR_SELECT', '1 час' );
define( '_SW_6HOUR_SELECT', '6 часов' );
define( '_SW_12HOUR_SELECT', '12 часов' );
define( '_SW_1DAY_SELECT', '1 день' );
define( '_SW_3DAY_SELECT', '3 дня' );
define( '_SW_1WEEK_SELECT', '1 неделя' );

//Текст верхних вкладок
define( '_SW_MODULE_SETTINGS_TAB', 'Параметры модуля' );
define( '_SW_SIZE_OFFSETS_TAB', 'Размеры и положение' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Цвет и фон' );
define( '_SW_FONTS_PADDING_TAB', 'Шрифты и отступы' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Границы и эффекты' );


//Общий текст
define( '_SW_MENU_SOURCE', 'Источник меню' );
define( '_SW_PARENT', 'Родитель' );
define( '_SW_STYLE_SHEET', 'Загрузка таблицы' );
define( '_SW_CLASS_SFX', 'Суффикс класса <br/>для модуля' );
define( '_SW_HYBRID_MENU', 'Гибридное меню' );
define( '_SW_TABLES_BLOGS', 'Использование <br/>таблиц/блогов' );
define( '_SW_CACHE_ITEMS', 'Включить кэш' );
define( '_SW_CACHE_REFRESH', 'Время жизни кэша' );
define( '_SW_SHOW_NAME', 'Показать имя модуля' );
define( '_SW_PUBLISHED', 'Опубликовано');
define( '_SW_ACTIVE_MENU', 'Активное меню' );
define( '_SW_MAX_LEVELS', 'Максимум уровней' );
define( '_SW_PARENT_LEVEL', 'Родительский уровень' );
define( '_SW_SELECT_HACK', 'Хак списков выбора' );
define( '_SW_SUB_INDICATOR', 'Индикатор подменю' );
define( '_SW_SHOW_SHADOW', 'Показывать тень' );
define( '_SW_MODULE_POSITION', 'Размещение модуля' );
define( '_SW_MODULE_ORDER', 'Порядок модулей' );
define( '_SW_ACCESS_LEVEL', 'Уровень доступа' );
define( '_SW_TEMPLATE', 'Шаблон' );
define( '_SW_LANGUAGE', 'Язык' );
define( '_SW_COMPONENT', 'Компонент' );

//Подсказки
define( '_SW_MENU_SOURCE_TIP', 'Выберите правильное меню как источник пунктов меню для вашего модуля.' );
define( '_SW_PARENT_TIP', 'Выберите родительский элемент для отображения сегмента исходного меню.  Установите ТОР, чтобы отобразить все элементы исходного меню.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Днамически:</b> записывает таблицу стилей в документ, где исползуется модуль меню.<br /><b>Внешняя ссылка:</b> подключает внешнюю экспортированную таблицу стилей.<br /><b>Без ссылки:</b> вставить вашу ссылку вручную на внешнюю таблицу стилей в ваш шаблон.  Модуль меню будет полностью проверен.' );
define( '_SW_CLASS_SFX_TIP', 'Суффикс устанавливается перед шаблонами moduletable CSS.  Может быть использован для предотврщения конфликтов с шаблоном moduletable CSS и для дополнительного оформления через файл CSS шаблона.' );
define( '_SW_HYBRID_MENU_TIP', 'Автоматически добавляет элементы меню контента в меню, являющиеся содержимым категорий / разделов, в виде таблиц / блогов.' );
define( '_SW_TABLES_BLOGS_TIP', 'Показывать созданные автоматически меню категорий/разделов как таблицы или блоги.' );
define( '_SW_CACHE_ITEMS_TIP', 'Используйте файловый кэш для повышения быстродействия и кэшировния элементов меню.  Особенно полезно при работе с гибридными меню, где генерация больших меню может требовать много SQL запросов.  Кэш уменьшает число запросов между интервалами кэшировния.' );
define( '_SW_CACHE_REFRESH_TIP', 'Интервал времени между обновлением структуры элементов меню в кэше файлов.' );
define( '_SW_SHOW_NAME_TIP', 'Отображение имени модуля меню.' );
define( '_SW_PUBLISHED_TIP', 'Включение/Выключение публикации модуля меню.');
define( '_SW_ACTIVE_MENU_TIP', 'Сохранеение текущего пункта меню верхнего уровня в активном состоянии для просматриваемой страницы.' );
define( '_SW_MAX_LEVELS_TIP', 'Максимальное число отображаемых уровней исходного меню.  Установите 0, чтобы отображать все уровни.' );
define( '_SW_PARENT_LEVEL_TIP', 'Дополнительный параметр, отслеживающий источник меню для возврата на определенный уровень.  Обычно устанавливается на 0.' );
define( '_SW_SELECT_HACK_TIP', 'Применить хак к меню, чтобы позволить перекрытие списков выбора в формах IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Показать небольшую стрелку в подпунктах меню, которые имеют дочерние элементы.' );
define( '_SW_SHOW_SHADOW_TIP', 'Отображает тень вокруг подменю.' );
define( '_SW_MODULE_POSITION_TIP', 'Расположение модуля меню в шаблоне.' );
define( '_SW_MODULE_ORDER_TIP', 'Расположение модуля меню в позиции шаблона.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Уровень доступа для модуля меню.' );
define( '_SW_TEMPLATE_TIP', 'Модуль меню будет отображаться только в выбранном шаблоне.' );
define( '_SW_LANGUAGE_TIP', 'Модуль меню будет отображаться только на выбранном языке.' );
define( '_SW_COMPONENT_TIP', 'Модуль меню будет отображаться только в выбранном компоненте.' );
define( '_SW_PAGES_TIP', 'Выбор страниц : <i>(удерживайте ctrl при щелчке левой кнопкй мыши для выбора нескольких страниц)</i>' );


//Информация swMenuPro
define( '_SW_SWMENUPRO_INFO', 'swMenuPro является более мощным и полным решением для управления модулями меню.  Посетите <a href="http://www.swonline.biz" >www.swonline.biz</a>, чтобы узнать как модернизировать и использовать все возможности, которые может предложить только swMenuPro.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro позволяет создать неограниченное количество модулей меню, используя любое из 7 доступных систем меню. swMenuFree позволяет создать только 1 модуль меню.' );
define( '_SW_SWMENUPRO_2', 'Изменене CSS для любого пункта меню в пределах любого модуля меню,  будь это фон, границы, отступы и т.п. с использованием простого интерфейса.' );
define( '_SW_SWMENUPRO_3', 'Назначение изображений для любого пункта меню в пределах любого модуля меню, а также ширины, высоты, вертикальных и горизонтальных отступов и выравнивания. (Создание меню только из изображений)' );
define( '_SW_SWMENUPRO_4', 'Назначение поведения для любого пункта меню в пределах любого модуля меню.  Это поведение может принимать значения да или нет при следующих условиях: "показывать пункт меню?", "показывать имя пункта меню?" (Используется для создания меню только из изображений), "кликабелен ли пункт меню?"' );
define( '_SW_SWMENUPRO_5', 'Управление и создание новых модулей меню с использованием встроенного менеджера.' );


?>
