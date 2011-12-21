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


define( '_SW_UPGRADE_VERSIONS', 'Versão swMenuFree instalada actualmente' );
define( '_SW_SELECTED_LANGUAGE_HEADING', 'Ficheiro de Idioma instalado' );
define( '_SW_LANGUAGE_FILES', 'Seleccione o novo ficheiro de Idioma' );
define( '_SW_LANGUAGE_CHANGE_BUTTON', 'Altera o Idioma' );
define( '_SW_FILE_PERMISSIONS', 'Actuais permissões dos ficheiros' );
define( '_SW_LANGUAGE_SUCCESS', 'Foi adicionado com sucesso o novo o Ficheiro de Idioma.' );
define( '_SW_LANGUAGE_FAIL', 'Não foi possível fazer o upload do ficheiro de idioma, por favor verifique que todas as directorias listadas em baixo têm permissão de escrita.' );

//Menu Names
define( '_SW_MENU_SYSTEM', 'Sistema de Menu' );
define( '_SW_TRANS_MENU', 'Trans Menu' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menu' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Editor Manual de CSS' );
define( '_SW_MODULE_EDITOR', 'Editor do módulo do Menu' );
define( '_SW_UPGRADE_FACILITY', 'Actualização do Sistema' );


//Common Terms
define( '_SW_WRITABLE', 'Com permissão de escrita' );
define( '_SW_UNWRITABLE', 'Sem permissão de escrita' );
define( '_SW_YES', 'Sim' );
define( '_SW_NO', 'Não' );
define( '_SW_HYBRID', 'Híbrido' );
define( '_SW_MODULE_NAME', 'Nome do Módulo' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'Seleccione um tipo de Menu.<br /><b>Trans Menu:</b>Um sistema de Menu dinâmico em DHTML, com um belo efeito de slides no submenu.<br /><b>MyGosu Menu:</b>Um sistema de Menu dinâmico em DHTML com melhor compatibilidade em diferentes templates.' );
define( '_SW_SAVE_TIP', 'Clique aqui para guardar na base de dados todas as alterações de estilo e módulos' );
define( '_SW_CANCEL_TIP', 'Clique aqui para cancelar as alterações e voltar ao menu de administração' );
define( '_SW_PREVIEW_TIP', 'Clique aqui para visualizar o Menu numa janela pop-up' );
define( '_SW_EXPORT_TIP', 'Clique aqui para exportar uma folha de estilos externa, usando a actual configuração de estilos' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'guardar' );
define( '_SW_CANCEL_BUTTON', 'cancelar' );
define( '_SW_PREVIEW_BUTTON', 'visualizar' );
define( '_SW_EXPORT_BUTTON', 'exportar' );
define( '_SW_UPLOAD_BUTTON', 'enviar ficheiro' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Actualizar/Corrigir swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Editar propriedades do módulo Menu' );
define( '_SW_CSS_LINK', 'Editar manualmente uma folha de estilo CSS externa' );
define( '_SW_EXPORT_LINK', 'Exportar para folha de estilo CSS externa' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Por favor, seleccione um ficheiro para enviar.' );
define( '_SW_SAVE_MENU_MESSAGE', 'Configuração guardada com sucesso' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'A configuração foi guardada e uma folha de estilo CSS externa foi criada com sucesso' );
define( '_SW_SAVE_CSS_MESSAGE', 'Folha de estilo CSS externa guardada com sucesso' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Folha de estilos CSS externa não foi criada. Certifique-se de que seu ficheiro modules/mod_swmenufree/styles tem permissão de escrita.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Está tudo OK' );
define( '_SW_MESSAGES', 'Mensagens' );
define( '_SW_MODULE_SUCCESS', 'O módulo foi actualizado com sucesso.' );
define( '_SW_MODULE_FAIL', 'Não foi possível actualizar o módulo. Por favor, certifique-se de que a sua directoria /modules tem permissão de escrita.' );
define( '_SW_TABLE_UPGRADE', '%s Tabelas actualizadas' );
define( '_SW_TABLE_CREATE', '%s Tabelas criadas' );
define( '_SW_UPDATE_LINKS', 'Links do menu de administração foram actualizados' );

define( '_SW_MODULE_VERSION', 'Versão actual do módulo swMenuFree é' );
define( '_SW_COMPONENT_VERSION', 'Versão actual do componente swMenuFree é' );
define( '_SW_UPLOAD_UPGRADE', 'Enviar a versão mais recente do  swMenuFree' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Envia &amp; Instala Ficheiro' );

define( '_SW_COMPONENT_SUCCESS', 'Componente swMenuFree actualizado com sucesso.' );
define( '_SW_COMPONENT_FAIL', 'Não foi possível realizar a actualização. Por favor, certifique-se de que todas as directorias listadas em baixo possuem permissão de escrita.' );
define( '_SW_INVALID_FILE', 'Atenção: este ficheiro não é válido. Certamente não é uma actualização para a versão mais recente do swMenuFree.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Posição e orientação do Menu' );
define( '_SW_SIZES_LABEL', 'Tamanho dos  itens do Menu' );
define( '_SW_TOP_OFFSETS_LABEL', 'Deslocamento do Menu' );
define( '_SW_SUB_OFFSETS_LABEL', 'Deslocamento do Submenu' );
define( '_SW_ALIGNMENT_LABEL', 'Alinhamento do Menu' );
define( '_SW_WIDTHS_LABEL', 'Largura dos Itens do Menu' );
define( '_SW_HEIGHTS_LABEL', 'Altura dos Itens do Menu' );


define( '_SW_TOP_MENU', 'Menu' );
define( '_SW_SUB_MENU', 'Submenu' );
define( '_SW_ALIGNMENT', 'Alinhamento' );
define( '_SW_POSITION', 'Posição' );
define( '_SW_ORIENTATION', 'Orientação' );
define( '_SW_ITEM_WIDTH', 'Largura do Item' );
define( '_SW_ITEM_HEIGHT', 'Altura do Item' );
define( '_SW_TOP_OFFSET', 'Deslocamento para cima' );
define( '_SW_LEFT_OFFSET', 'Deslocamento para a esquerda' );
define( '_SW_LEVEL', 'Nível' );
define( '_SW_AUTOSIZE', '(Utilize 0 para ajuste automático)' );

//////////////////////
//Fonts & Padding Page
/////////////////////
define( '_SW_FONT_FAMILY_LABEL', 'Família de Fontes' );
define( '_SW_FONT_SIZE_LABEL', 'Tamanho da Fonte' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Alinhamento de Texto' );
define( '_SW_FONT_WEIGHT_LABEL', 'Estilo da Fonte (negrito)' );
define( '_SW_PADDING_LABEL', 'Espaçamento' );


define( '_SW_TOP', 'Superior' );
define( '_SW_RIGHT', 'Direita' );
define( '_SW_BOTTOM', 'Inferior' );
define( '_SW_LEFT', 'Esquerda' );
define( '_SW_FONT_SIZE', 'Tamanho da Fonte' );
define( '_SW_FONT_ALIGNMENT', 'Alinhamento da Fonte' );
define( '_SW_FONT_WEIGHT', 'Estilo da Fonte (negrito)' );
define( '_SW_PADDING', 'Espaçamento' );
define( '_SW_FONT_TIP', 'Todos os browsers interpretam as fontes e os seus tamanhos de forma diferente. A lista em baixo mostra como o seu browser interpreta o tamanho e as fontes do texto apresentado.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Largura do limite' );
define( '_SW_BORDER_STYLES_LABEL', 'Estilo do limite' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Efeitos especiais' );

define( '_SW_OUTSIDE_BORDER', 'Limite Exterior' );
define( '_SW_INSIDE_BORDER', 'Limite Interior' );
define( '_SW_NORMAL_BORDER', 'Limite' );
define( '_SW_WIDTH', 'Largura' );
define( '_SW_HEIGHT', 'Altura' );
define( '_SW_DIVIDER', 'Separador' );
define( '_SW_STYLE', 'Estilo' );
define( '_SW_DELAY', 'Tempo de Abertura/Encerramento' );
define( '_SW_OPACITY', 'Transparência' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Imagens de fundo' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Cores de fundo' );
define( '_SW_FONT_COLOR_LABEL', 'Cores das fontes' );
define( '_SW_BORDER_COLOR_LABEL', 'Cores dos limites' );


define( '_SW_BACKGROUND', 'Fundo' );
define( '_SW_OVER_BACKGROUND', 'Fundo (Mouseover)' );
define( '_SW_COLOR', 'Cor' );
define( '_SW_OVER_COLOR', 'Cor (Mouseover)' );
define( '_SW_FONT', 'Cor da fonte' );
define( '_SW_OVER_FONT', 'Cor da fonte (Mouseover)' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Cor do limite externo' );
define( '_SW_INSIDE_BORDER_COLOR', 'Cor do limite interno' );
define( '_SW_NORMAL_BORDER_COLOR', 'Cor do limite' );
define( '_SW_GET', 'Obter' );
define( '_SW_COLOR_TIP', 'Seleccione a cor no círculo e clique %s na caixa próxima ao elemento onde você deseja aplicar a cor escolhida.');
define( '_SW_PRESENT_COLOR', 'Cor actual' );
define( '_SW_SELECTED_COLOR', 'Cor seleccionada' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Propriedades do Menu' );
define( '_SW_STYLE_SHEET_LABEL', 'Propriedades da Folha de Estilos' );
define( '_SW_AUTO_ITEM_LABEL', 'Ajuste automático dos itens do Menu' );
define( '_SW_CACHE_LABEL', 'Propriedades da memória Cache' );
define( '_SW_GENERAL_LABEL', 'Propriedades gerais do módulo' );
define( '_SW_POSITION_ACCESS_LABEL', 'Posição &amp; Acesso' );
define( '_SW_PAGES_LABEL', 'Mostrar módulo do menu em páginas' );
define( '_SW_CONDITIONS_LABEL', 'Condições' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Gravar CSS directamente na página' );
define( '_SW_CSS_LINK_SELECT', 'Link para folha de estilos externa' );
define( '_SW_CSS_IMPORT_SELECT', 'Importar folha de estilos externa' );
define( '_SW_CSS_NONE_SELECT', 'Não hiperligar a uma folha de estilos' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Usar somente o conteúdo' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Seleccione, em baixo, um menu existente ' );

define( '_SW_SHOW_TABLES_SELECT', 'Mostrar como tabelas' );
define( '_SW_SHOW_BLOGS_SELECT', 'Mostrar como blogs' );

define( '_SW_10SECOND_SELECT', '10 Segundos' );
define( '_SW_1MINUTE_SELECT', '1 Minuto' );
define( '_SW_30MINUTE_SELECT', '30 Minutos' );
define( '_SW_1HOUR_SELECT', '1 Hora' );
define( '_SW_6HOUR_SELECT', '6 Horas' );
define( '_SW_12HOUR_SELECT', '12 Horas' );
define( '_SW_1DAY_SELECT', '1 Dia' );
define( '_SW_3DAY_SELECT', '3 Dias' );
define( '_SW_1WEEK_SELECT', '1 Semana' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Propriedades do módulo Menu' );
define( '_SW_SIZE_OFFSETS_TAB', 'Tamanho, Posição &amp; Deslocamento' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Cores &amp; Fundos' );
define( '_SW_FONTS_PADDING_TAB', 'Fontes &amp; Espaçamentos' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Limites &amp; Efeitos' );


//general text
define( '_SW_MENU_SOURCE', 'Origem do menu' );
define( '_SW_PARENT', 'Principal' );
define( '_SW_STYLE_SHEET', 'Folha de Estilos' );
define( '_SW_CLASS_SFX', 'Sufixo Classe do Módulo' );
define( '_SW_HYBRID_MENU', 'Menu híbrido' );
define( '_SW_TABLES_BLOGS', 'Usar Tabelas/Blogs' );
define( '_SW_CACHE_ITEMS', 'Cache para itens do menu' );
define( '_SW_CACHE_REFRESH', 'Tempo de actualização da cache' );
define( '_SW_SHOW_NAME', 'Mostrar nome do módulo' );
define( '_SW_PUBLISHED', 'Publicado');
define( '_SW_ACTIVE_MENU', 'Menu Activo' );
define( '_SW_MAX_LEVELS', 'N° máximo de níveis' );
define( '_SW_PARENT_LEVEL', 'Nível principal' );
define( '_SW_SELECT_HACK', 'Seleccionar Box Hack' );
define( '_SW_SUB_INDICATOR', 'Indicador de Submenu' );
define( '_SW_SHOW_SHADOW', 'Mostrar sombra' );
define( '_SW_MODULE_POSITION', 'Posição do módulo' );
define( '_SW_MODULE_ORDER', 'Ordem do módulo' );
define( '_SW_ACCESS_LEVEL', 'Nível de acesso' );
define( '_SW_TEMPLATE', 'Template' );
define( '_SW_LANGUAGE', 'Idioma' );
define( '_SW_COMPONENT', 'Componente' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Seleccione um menu válido para actuar como fonte para os itens do menu do seu novo módulo.' );
define( '_SW_PARENT_TIP', 'Seleccione um elemento principal para mostrar um segmento do menu. Seleccione TOP para mostrar todos os itens do menu principal.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dinâmico:</b> escreve a folha de estilos no documento a partir do qual o módulo do menu é chamado.<br /><b>Link Externo: </b> liga a uma folha de estilos externa, exportada anteriormente.<br /><b>Não ligar:</b> cole manualmente o seu próprio link para uma folha de estilos externa no cabeçalho do template. O módulo do menu será validado automaticamente.' );
define( '_SW_CLASS_SFX_TIP', 'Sufixo que deverá ser colocado na frente das tabelas CSS do template. Pode ser utilizado para resolver possíveis conflitos com os templates de módulos das tabelas CSS, e para mais opções sobre o ficheiro template CSS.' );
define( '_SW_HYBRID_MENU_TIP', 'Anexa automaticamente itens de conteúdo ao menu, como categorias/secções, tabelas/blogs.' );
define( '_SW_TABLES_BLOGS_TIP', 'Mostra automaticamente as categorias/secções criadas como tabelas ou blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Utiliza um ficheiro de memória cache para melhorar a performance de apresentação dos itens do menu. Particularmente útil para o funcionamento de menus do tipo Híbrido, onde menus mais extensos podem solicitar mais consultas ao SQL. O ficheiro de memória cache reduzirá as consultas a apenas uma secção entre cada intervalo da cache.' );
define( '_SW_CACHE_REFRESH_TIP', 'Intervalo de tempo necessário para actualizar a estrutura de itens do menu no ficheiro de memória cache.' );
define( '_SW_SHOW_NAME_TIP', 'Mostra o nome do módulo de menu.' );
define( '_SW_PUBLISHED_TIP', 'Publica ou não publica o módulo de menu.');
define( '_SW_ACTIVE_MENU_TIP', 'Mantém o item do menu em estado activo quando apresenta a página correspondente.' );
define( '_SW_MAX_LEVELS_TIP', 'Número máximo de níveis para exibir no menu. Utilize 0 para mostrar todos os níveis.' );
define( '_SW_PARENT_LEVEL_TIP', 'Definição avançada que permite seguir o rasto do menu até um certo nível específico. Normalmente definido 0.' );
define( '_SW_SELECT_HACK_TIP', 'Aplica um hack ao menu, para permitir que os submenus sobreponham as caixas seleccionadas em formulários no IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Exibe uma pequena seta para indicar itens de um submenu que possui menus secundários.' );
define( '_SW_SHOW_SHADOW_TIP', 'Exibe uma sombra em volta dos submenus.' );
define( '_SW_MODULE_POSITION_TIP', 'Posição do módulo do menu no template.' );
define( '_SW_MODULE_ORDER_TIP', 'Ordem do módulo do menu na posição do template.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Nível de acesso para o módulo de menu.' );
define( '_SW_TEMPLATE_TIP', 'O módulo do menu só será exibido no template seleccionado.' );
define( '_SW_LANGUAGE_TIP', 'O módulo do menu só será exibido no idioma seleccionado.' );
define( '_SW_COMPONENT_TIP', 'O módulo do menu só será exibido no componente seleccionado.' );
define( '_SW_PAGES_TIP', 'Selecção de Páginas: <i>(Para seleccionar múltiplas páginas, mantenha a tecla CTRL pressionada enquanto clica com o botão esquerdo do rato nas opções desejadas.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro é a solução mais robusta e completa para a administração dos módulos dos menus.  Visite <a href="http://www.swmenupro.com" >www.swmenupro.com</a> para descobrir como actualizar e aproveitar as potencialidades e opções de navegação que somente o swMenuPro pode oferecer.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro possibilita a criação de um número ilimitado de módulos de menu utilizando qualquer dos 7 sistemas de menu disponíveis.  swMenuFree permite apenas 1 módulo do menu.' );
define( '_SW_SWMENUPRO_2', 'Possibilidade de alterar as propriedades CSS de mouseover e normal em qualquer item do menu, dentro de qualquer módulo do menu. Possibilidade de alteração de fundos, limites, espaçamento, etc. usando uma interface simples de apontar e clicar.' );
define( '_SW_SWMENUPRO_3', 'Atribui imagens ao mouseover e normal em qualquer item do menu dentro de qualquer módulo do menu, assim como largura, altura, espaço vertical e horizontal e alinhamento.(Cria menus somente com imagens)' );
define( '_SW_SWMENUPRO_4', 'Atribui comportamentos avançados a qualquer item do menu, dentro de qualquer módulo do menu. Estes comportamentos podem ser verdadeiro ou falso, nas seguintes condições: "Mostra o item do menu?", "Mostra o nome do item do menu?" (Usado para criar menus só de imagens), "O item do menu é clicável?"' );
define( '_SW_SWMENUPRO_5', 'Cria e controla novos módulos do menu usando o administrador integrado de módulos do menu.' );


?>