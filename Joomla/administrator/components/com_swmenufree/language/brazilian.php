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
define( '_SW_MENU_SYSTEM', 'Sistema de Menu' );
define( '_SW_TRANS_MENU', 'Trans Menu' );
define( '_SW_MYGOSU_MENU', 'MyGosu Menu' );
define( '_SW_TIGRA_MENU', 'Tigra Menu' );


//Page Names
define( '_SW_MANUAL_CSS_EDITOR', 'Editor Manual de CSS' );
define( '_SW_MODULE_EDITOR', 'Editor de módulo do Menu' );
define( '_SW_UPGRADE_FACILITY', 'Atualização do Sistema' );


//Common Terms
define( '_SW_WRITABLE', 'com permissão de escrita' );
define( '_SW_UNWRITABLE', 'sem permissão de escrita' );
define( '_SW_YES', 'Sim' );
define( '_SW_NO', 'Não' );
define( '_SW_HYBRID', 'híbrido' );
define( '_SW_MODULE_NAME', 'Nome do Módulo' );

//Tool Tips
//define( '_SW_MENU_SYSTEM_TIP', 'Selecione um tipo de Menu.<br /><b>Trans Menu:</b>Um sistema de Menu dinâmico em DHTML, com um belo efeito de slides no submenu.<br /><b>MyGosu Menu:</b>Um sistema de Menu dinâmico em DHTML com melhor compatibilidade em diferentes templates.' );
define( '_SW_SAVE_TIP', 'Clique aqui para salvar no banco de dados todas as alterações de estilo e módulos' );
define( '_SW_CANCEL_TIP', 'Clique aqui para cancelar as alterações e retornar ao menu de administração' );
define( '_SW_PREVIEW_TIP', 'Clique aqui para visualizar o Menu em uma janela pop-up' );
define( '_SW_EXPORT_TIP', 'Clique aqui para exportar uma folha de estilos externa, usando a atual configuração de estilos' );

//Buttons text
define( '_SW_SAVE_BUTTON', 'salvar' );
define( '_SW_CANCEL_BUTTON', 'cancelar' );
define( '_SW_PREVIEW_BUTTON', 'visualizar' );
define( '_SW_EXPORT_BUTTON', 'exportar' );
define( '_SW_UPLOAD_BUTTON', 'enviar arquivo' );


//Internal program links
define( '_SW_UPGRADE_LINK', 'Atualizar/Corrigir swMenuFree.' );
define( '_SW_MANAGER_LINK', 'Editar propriedades do módulo Menu' );
define( '_SW_CSS_LINK', 'Editar manualmente uma folha de estilo CSS externa' );
define( '_SW_EXPORT_LINK', 'Exportar para folha de estilo CSS externa' );


//Program Notices
define( '_SW_UPLOAD_FILE_NOTICE', 'Por favor, selecione um arquivo para enviar.' );
define( '_SW_SAVE_MENU_MESSAGE', 'Configuração salva com sucesso' );
define( '_SW_SAVE_MENU_CSS_MESSAGE', 'A configuração foi salva e uma folha de estilo CSS externa foi criada com sucesso' );
define( '_SW_SAVE_CSS_MESSAGE', 'Folha de estilo CSS externa salva com sucesso' );
define( '_SW_NO_SAVE_MENU_CSS_MESSAGE', 'Folha de estilos CSS externa não foi criada. Certifique-se de que seu arquivo modules/mod_swmenufree/styles tem permissão de escrita.' );


//////////////////////////
//Upgrade page
/////////////////////////
define( '_SW_OK', 'Tudo está OK' );
define( '_SW_MESSAGES', 'Mensagens' );
define( '_SW_MODULE_SUCCESS', 'O Módulo foi atualizado com sucesso.' );
define( '_SW_MODULE_FAIL', 'Não foi possível atualizar o módulo. Por favor, certifique-se de que seu diretório /modules tem permissão de escrita.' );
define( '_SW_TABLE_UPGRADE', '%s Tabelas atualizadas' );
define( '_SW_TABLE_CREATE', '%s Tabelas criadas' );
define( '_SW_UPDATE_LINKS', 'Links do menu da administração foram atualizados' );

define( '_SW_MODULE_VERSION', 'Versão atual do módulo swMenuFree é' );
define( '_SW_COMPONENT_VERSION', 'Versão atual do componente swMenuFree é' );
define( '_SW_UPLOAD_UPGRADE', 'Enviar a versão mais recente do  swMenuFree' );
define( '_SW_UPLOAD_UPGRADE_BUTTON', 'Envia &amp; Instala Arquivo' );

define( '_SW_COMPONENT_SUCCESS', 'Componente swMenuFree atualizado com sucesso.' );
define( '_SW_COMPONENT_FAIL', 'Não foi possível realizar a atualização. Por favor, certifique-se de que todos os diretórios listados abaixo possuem permissão de escrita.' );
define( '_SW_INVALID_FILE', 'Atenção: este arquivo não é válido. Certamente não é uma atualização para a mais recente versão do  swMenuFree.' );



//////////////////////////////
//Size Position & Offsets Page
/////////////////////////////
define( '_SW_POSITION_LABEL', 'Posição e orientação do Menu' );
define( '_SW_SIZES_LABEL', 'Tamanho dos itens do Menu' );
define( '_SW_TOP_OFFSETS_LABEL', 'Deslocamento do Menu Superior' );
define( '_SW_SUB_OFFSETS_LABEL', 'Deslocamento do Submenu' );
define( '_SW_ALIGNMENT_LABEL', 'Alinhamento do Menu' );
define( '_SW_WIDTHS_LABEL', 'Largura dos Itens do Menu' );
define( '_SW_HEIGHTS_LABEL', 'Altura dos Itens do Menu' );


define( '_SW_TOP_MENU', 'Menu Superior' );
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
define( '_SW_FONT_SIZE_LABEL', 'Tamanho de Fonte' );
define( '_SW_FONT_ALIGNMENT_LABEL', 'Alinhamento de Texto' );
define( '_SW_FONT_WEIGHT_LABEL', 'Peso de Fonte (negrito)' );
define( '_SW_PADDING_LABEL', 'Espaçamento da borda' );


define( '_SW_TOP', 'Superior' );
define( '_SW_RIGHT', 'Direita' );
define( '_SW_BOTTOM', 'Abaixo' );
define( '_SW_LEFT', 'Esquerda' );
define( '_SW_FONT_SIZE', 'Tamanho de Fonte' );
define( '_SW_FONT_ALIGNMENT', 'Alinhamento de Fonte' );
define( '_SW_FONT_WEIGHT', 'Peso de Fonte (negrito)' );
define( '_SW_PADDING', 'Espaçamento da borda' );
define( '_SW_FONT_TIP', 'Todos os navegadores interpretam fontes e seus tamanhos de formas diferentes. A lista abaixo mostra como seu navegador interpreta o tamanho e fontes do texto apresentado.' );

/////////////////////////
//Borders & Effects Page
////////////////////////
define( '_SW_BORDER_WIDTHS_LABEL', 'Largura da borda' );
define( '_SW_BORDER_STYLES_LABEL', 'Estilo da borda' );
define( '_SW_SPECIAL_EFFECTS_LABEL', 'Efeitos especiais' );

define( '_SW_OUTSIDE_BORDER', 'Borda exterior' );
define( '_SW_INSIDE_BORDER', 'Borda inferior' );
define( '_SW_NORMAL_BORDER', 'Borda' );
define( '_SW_WIDTH', 'Largura' );
define( '_SW_HEIGHT', 'Altura' );
define( '_SW_DIVIDER', 'Separador' );
define( '_SW_STYLE', 'Estilo' );
define( '_SW_DELAY', 'Tempo de Abertura/Fechamento' );
define( '_SW_OPACITY', 'Transparência' );

///////////////////////////
//Colors & Backgrounds Page
///////////////////////////
define( '_SW_BACKGROUND_IMAGE_LABEL', 'Imagens de fundo' );
define( '_SW_BACKGROUND_COLOR_LABEL', 'Cores de fundo' );
define( '_SW_FONT_COLOR_LABEL', 'Cores de fontes' );
define( '_SW_BORDER_COLOR_LABEL', 'Cores de bordas' );


define( '_SW_BACKGROUND', 'Fundo' );
define( '_SW_OVER_BACKGROUND', 'Fundo (Mouseover)' );
define( '_SW_COLOR', 'Cor' );
define( '_SW_OVER_COLOR', 'Cor (Mouseover)' );
define( '_SW_FONT', 'Cor de fonte' );
define( '_SW_OVER_FONT', 'Cor de fonte (Mouseover)' );
define( '_SW_OUTSIDE_BORDER_COLOR', 'Cor da borda externa' );
define( '_SW_INSIDE_BORDER_COLOR', 'Cor da borda interna' );
define( '_SW_NORMAL_BORDER_COLOR', 'Cor da borda' );
define( '_SW_GET', 'Utilizar' );
define( '_SW_COLOR_TIP', 'Selecione a cor no círculo e clique %s na caixa próxima ao elemento onde você deseja aplicar a cor escolhida.');
define( '_SW_PRESENT_COLOR', 'Cor atual' );
define( '_SW_SELECTED_COLOR', 'Cor selecionada' );


///////////////////////////
//Menu Module Settings Page
///////////////////////////
define( '_SW_MENU_SOURCE_LABEL', 'Propriedades do Menu' );
define( '_SW_STYLE_SHEET_LABEL', 'Propriedades da Folha de Estilos' );
define( '_SW_AUTO_ITEM_LABEL', 'Ajuste automático dos itens do Menu' );
define( '_SW_CACHE_LABEL', 'Propriedades de memória Cache' );
define( '_SW_GENERAL_LABEL', 'Propriedades gerais do módulo' );
define( '_SW_POSITION_ACCESS_LABEL', 'Posição &amp; Accesso' );
define( '_SW_PAGES_LABEL', 'Mostrar módulo do menu em páginas' );
define( '_SW_CONDITIONS_LABEL', 'Condições' );

//Select box text
define( '_SW_CSS_DYNAMIC_SELECT', 'Gravar CSS diretamente na página' );
define( '_SW_CSS_LINK_SELECT', 'Link para folha de estilos externa' );
define( '_SW_CSS_IMPORT_SELECT', 'Importar folha de estilos externa' );
define( '_SW_CSS_NONE_SELECT', 'Não conectar a uma folha de estilos' );

define( '_SW_SOURCE_CONTENT_SELECT', 'Usar somente o conteúdo' );
define( '_SW_SOURCE_EXISTING_SELECT', 'Selecione abaixo um menu existente' );

define( '_SW_SHOW_TABLES_SELECT', 'Mostrar como tabelas' );
define( '_SW_SHOW_BLOGS_SELECT', 'Mostrar como blogs' );

define( '_SW_10SECOND_SELECT', '10 Segundos' );
define( '_SW_1MINUTE_SELECT', '1 Minuto' );
define( '_SW_30MINUTE_SELECT', '30 Minutos' );
define( '_SW_1HOUR_SELECT', '1 Hora' );
define( '_SW_6HOUR_SELECT', '6 Horas' );
define( '_SW_12HOUR_SELECT', '12 Horas' );
define( '_SW_1DAY_SELECT', '1 Dias' );
define( '_SW_3DAY_SELECT', '3 Dias' );
define( '_SW_1WEEK_SELECT', '1 Semana' );

//top tabs text
define( '_SW_MODULE_SETTINGS_TAB', 'Propriedades do módulo Menu' );
define( '_SW_SIZE_OFFSETS_TAB', 'Tamanho, Posição &amp; Deslocamento' );
define( '_SW_COLOR_BACKGROUNDS_TAB', 'Cores &amp; Fundos' );
define( '_SW_FONTS_PADDING_TAB', 'Fontes &amp; Espaçamentos' );
define( '_SW_BORDERS_EFFECTS_TAB', 'Bordas &amp; Efeitos' );


//general text
define( '_SW_MENU_SOURCE', 'Origem do menu' );
define( '_SW_PARENT', 'Principal' );
define( '_SW_STYLE_SHEET', 'Folha de Estilos' );
define( '_SW_CLASS_SFX', 'Sufixo Classe do Módulo' );
define( '_SW_HYBRID_MENU', 'Menu híbrido' );
define( '_SW_TABLES_BLOGS', 'Usar Tabelas/Blogs' );
define( '_SW_CACHE_ITEMS', 'Cache para itens' );
define( '_SW_CACHE_REFRESH', 'Atualização' );
define( '_SW_SHOW_NAME', 'Mostrar nome do módulo' );
define( '_SW_PUBLISHED', 'Publicado');
define( '_SW_ACTIVE_MENU', 'Menu Ativo' );
define( '_SW_MAX_LEVELS', 'N° máximo de níveis' );
define( '_SW_PARENT_LEVEL', 'Nível principal' );
define( '_SW_SELECT_HACK', 'Selecionar Box Hack' );
define( '_SW_SUB_INDICATOR', 'Indicador de Submenu' );
define( '_SW_SHOW_SHADOW', 'Mostrar sombra' );
define( '_SW_MODULE_POSITION', 'Posição do módulo' );
define( '_SW_MODULE_ORDER', 'Ordem do módulo' );
define( '_SW_ACCESS_LEVEL', 'Nível de acesso' );
define( '_SW_TEMPLATE', 'Template' );
define( '_SW_LANGUAGE', 'Idioma' );
define( '_SW_COMPONENT', 'Componente' );

//tool tips
define( '_SW_MENU_SOURCE_TIP', 'Selecione um menu válido para atuar como fonte para os itens de menu de seu novo módulo.' );
define( '_SW_PARENT_TIP', 'Selecione um elemento principal para mostrar um segmento da fonte do menu. Selecione TOP para mostrar todos os itens do menu.' );
define( '_SW_STYLE_SHEET_TIP', '<b>Dinâmico:</b> escreve a folha de estilos no documento a partir do qual o módulo de menu é chamado.<br /><b>Link Externo: </b> conecta a uma folha de estilos externa, exportada anteriormente.<br /><b>Não linkar:</b> cole manualmente o seu próprio link para uma folha de estilos externa no cabeçalho do template. O Modulo será validado automaticamente.' );
define( '_SW_CLASS_SFX_TIP', 'Sufixo que deverá ser colocado na frente das tabelas CSS do template. Assim pode-se resolver possíveis conflitos com as tabelas CSS de módulos do template, dando-lhe um maior controle sobre seu arquivo CSS.' );
define( '_SW_HYBRID_MENU_TIP', 'Anexa automaticamente itens de conteúdo ao menu, como categorias/seções, tabelas/blogs.' );
define( '_SW_TABLES_BLOGS_TIP', 'Mostra automaticamente as categorias/seções criadas como tabelas ou blogs.' );
define( '_SW_CACHE_ITEMS_TIP', 'Utiliza um arquivo de memória cache para melhorar a performance de apresentação dos itens de menu. Particularmente útil para o funcionamento de menus do tipo Híbrido, onde menus mais extensos podem solicitar mais consultas ao SQL. O arquivo de memória cache as reduzirá a apenas uma seção de consulta entre cada intervalo do cache.' );
define( '_SW_CACHE_REFRESH_TIP', 'Intervalo de tempo necessário para atualizar a estrutura do item de menu no arquivo de memória cache.' );
define( '_SW_SHOW_NAME_TIP', 'Mostra o nome do módulo de menu.' );
define( '_SW_PUBLISHED_TIP', 'Publica ou não publica o módulo de menu.');
define( '_SW_ACTIVE_MENU_TIP', 'Mantém o nível superior do menu em estado ativo quando apresentada a sua página correspondente.' );
define( '_SW_MAX_LEVELS_TIP', 'Número máximo de níveis para exibir na fonte do menu. Utilize 0 para mostrar todos os níveis.' );
define( '_SW_PARENT_LEVEL_TIP', 'Ajuste avançado que eleva a fonte do módulo de menu a um nível específico. Normalmente utiliza o valor 0.' );
define( '_SW_SELECT_HACK_TIP', 'Aplica um hack ao menu, para permitir que os submenus sobreponham caixas selecionadas em formulários no IE.' );
define( '_SW_SUB_INDICATOR_TIP', 'Exibe uma pequena flecha para indicar itens de um submenu que possui menus secundários.' );
define( '_SW_SHOW_SHADOW_TIP', 'Exibe uma sombra em volta dos submenus.' );
define( '_SW_MODULE_POSITION_TIP', 'Posição do módulo de menu no template.' );
define( '_SW_MODULE_ORDER_TIP', 'Ordem do módulo de menu na posição do template.' );
define( '_SW_ACCESS_LEVEL_TIP', 'Nível de acesso para o módulo de menu.' );
define( '_SW_TEMPLATE_TIP', 'Módulo de menu somente será exibido no template selecionado.' );
define( '_SW_LANGUAGE_TIP', 'Módulo de menu somente será exibido no idioma selecionado.' );
define( '_SW_COMPONENT_TIP', 'Módulo de menu somente será exibido no componente selecionado.' );
define( '_SW_PAGES_TIP', 'Seleção de Páginas: <i>(Para selecionar múltiplas páginas, mantenha a tecla CTRL pressionada enquanto clica com o botão esquerdo do mouse nas opções desejadas.)</i>' );


//swMenuPro Info
define( '_SW_SWMENUPRO_INFO', 'swMenuPro é a solução mais robusta e completa para a administração de módulo de menus.  Visite <a href="http://www.swonline.biz" >www.swonline.biz</a> para descobrir como atualizar e aproveitar o poder e facilidades de navegação que somente swMenuPro pode oferecer.' );
define( '_SW_SWMENUPRO_1', 'swMenuPro possibilita a criação de ilimitado número de módulos de menu utilizando qualquer dos 7 sistemas de menu disponíveis.  swMenuFree permite apenas 1 módulo de menu.' );
define( '_SW_SWMENUPRO_2', 'Possibilidade de alterar as propriedades CSS de normal e mouseover em qualquer item de menu, dentro de qualquer módulo de menu. Possibilidade de alteração de fundos, bordas, espaçamento, etc. usando uma interface simples de apontar e clicar.' );
define( '_SW_SWMENUPRO_3', 'Atribui imagens ao normal e mouseover em qualquer item do menu dentro de qualquer módulo de menu, assim como larguras, alturas, espaço vertical e horizontal e alinhamento.(Cria menus com apenas imagens)' );
define( '_SW_SWMENUPRO_4', 'Atribui comportamento avançado a qualquer item de menu, dentro de qualquer módulo de menu. Este comportamento pode ser verdadeiro ou falso, nas seguintes condições: "Mostra o item de menu?", "Mostra o nome do item de menu?" (Usado para criar menus só de imagens), "O item de menu é clicável?"' );
define( '_SW_SWMENUPRO_5', 'Controla e cria novos módulos de menu usando o administrador integrado de módulos de menu.' );


?>