<?php
/*
* This plugin uses parts of JCE extension by Ryan Demmer.
* @copyright	Copyright (C) 2005 - 2011 Ryan Demmer. All rights reserved.
* @copyright	Copyright (C) 2003 - 2011, CKSource - Frederico Knabben. All rights reserved.
* @license		GNU/GPL
* CKEditor extension is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( dirname( __FILE__ ) .DS.'libraries'.DS.'classes' .DS. 'linkBrowser.php' );

$linkBrowser =& linkBrowser::getInstance();
// Process Requests
$linkBrowser->processXHR( true );
// Load Plugin Parameters
$params = $linkBrowser->getPluginParams();

//$linkBrowser->_debug = false;
//$version .= $linkBrowser->_debug ? ' - debug' : '';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $linkBrowser->getLanguageTag();?>" lang="<?php echo $linkBrowser->getLanguageTag();?>" dir="<?php echo $linkBrowser->getLanguageDir();?>" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Link Browser</title>
	 <link id="editorSkin" href="#" rel="stylesheet" type="text/css"  />
<?php
	$linkBrowser->printScripts();
	$linkBrowser->printCss();
?>
	<script type="text/javascript">
		function initlinkBrowser(){
			return new linkBrowser({
				lang: '<?php echo $linkBrowser->getLanguage(); ?>',
				alerts: <?php echo $linkBrowser->getAlerts();?>,
				params: {
					'defaults': {
						'targetlist': "<?php echo $params->get('linkBrowser_target', 'default');?>"
					}
				}
			});
		}
		obj = document.getElementById('editorSkin'); //set editor css
	</script>
		<?php echo $linkBrowser->printHead();?>
</head>
<body lang="<?php echo $linkBrowser->getLanguage();?>" id="linkBrowser">
	<form onSubmit="insertAction();return false;" action="#">
	<div class="panel_wrapper">
		<div id="general_panel" class="panel current">
				<table id="general_panel_table" border="0" cellpadding="4" cellspacing="0" >
					<tr>
						<td colspan="4"><fieldset><legend><?php echo JText::_('Link Browser');?>:</legend><br /><div id="link-options" class="tree" style="border: 1px solid white;padding: 5px;"><?php echo $linkBrowser->getLists();?></div></fieldset></td>
					</tr>
				</table>
			</div>
		</div>
		</form>
		<script type="text/javascript">
			initlinkBrowser();
			obj = document.getElementById('general_panel_table'); //set css class for table
			obj.className = 'cke_skin_'+window.parent.CKEDITORInstance.config.skin;
		</script>
</body>
</html>
