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

defined('_JEXEC') or die('Restricted access');

/**
 * JCE class
 *
 * @static
 * @package		JCE
 * @since	1.5
 */

class JContentEditor extends JObject
{
	/*
	 * @var varchar
	 */
	var $version = '1';    //prevent js and css files caching
	/*
	*  @var varchar
	*/
	var $site_url = null;
	/*
	*  @var varchar
	*/
	var $group = null;
	/*
	 *  @var object
	 */
	var $params = null;
	/*
	 *  @var array
	 */
	var $plugins = array();
	/*
	*  @var varchar
	*/
	var $url = array();
	/*
	*  @var varchar
	*/
	var $request = null;
	/*
	*  @var array
	*/
	var $scripts = array();
	/*
	*  @var array
	*/
	var $css = array();
	/*
	*  @var boolean
	*/
	var $_debug = false;
	/**
	* Constructor activating the default information of the class
	*
	* @access	protected
	*/
	function __construct($config = array())
	{
		global $mainframe;
		$this->setProperties($config);
	}
	/**
	 * Returns a reference to a editor object
	 *
	 * This method must be invoked as:
	 * 		<pre>  $browser = &JContentEditor::getInstance();</pre>
	 *
	 * @access	public
	 * @return	JCE  The editor object.
	 * @since	1.5
	 */
	function &getInstance()
	{
		static $instance;

		if (!is_object($instance)) {
			$instance = new JContentEditor();
		}
		return $instance;
	}  	

	function getVersion()
	{
		// remove dots and return version
		return str_replace('.', '', $this->version);
	}
	
	/**
	 * Get the Super Administrator status
	 *
	 * Determine whether the user is a Super Administrator
	 *
	 * @return boolean
	*/
	/*
	function isSuperAdmin()
	{
		$user =& JFactory::getUser();
		return (strtolower($user->usertype) == 'superadministrator' || strtolower($user->usertype) == 'super administrator' || $user->gid == 25) ? true : false;	
    }
    */
	/**
	 * Filter (remove) a parameter from a parameter string
	 * @return string Filtered parameter String
	 * @param object $params
	 * @param object $key
	 */
	function filterParams($params, $key)
	{
		$params = explode("\n", $params);					
		$return = array();
		
		foreach($params as $param) {
			if (preg_match('/'.$key.'/i', $param)) {
				$return[] = $param;
			}
		}
		return implode("\n", $return);
	}
	/**
	 * Return the JCE Editor's parameters
	 *
	 * @return object
	*/
	function getEditorParams()
	{		
		$db	=& JFactory::getDBO();
		
		if (isset($this->params)) {
			return $this->params;
		}
		
		$e_params = '';
		$g_params = '';
		
		$query = 'SELECT params FROM #__plugins'
		. ' WHERE element = '. $db->Quote('ckeditor')
		. ' AND folder = '. $db->Quote('editors')
		. ' AND published = 1' 
		. ' LIMIT 1'
		;
		$db->setQuery($query);
		
		$e_params = $db->loadResult();
		// check if group params available
		if ($this->group) {
			$g_params = $this->filterParams($this->group->params, 'editor');
		}
		return new JParameter($e_params . $g_params);
	}
    /**
     * Get an Editor Parameter by key
     * 
     * @return string Editor Parameter
     * @param string $key The parameter key
     * @param string $default[optional] Value if no result
     */
	function getEditorParam($key, $default = '', $fallback = '')
	{		
		$params = $this->getEditorParams();
		return $this->getParam($params, $key, $default, $fallback);
	}
	/**
	 * Return the plugin parameter object
	 *
	 * @access 			public
	 * @param string	The plugin
	 * @return 			The parameter object
	*/
	function getPluginParams($plugin)
	{						
		$params = '';
		if ($this->group) {
			$params = $this->filterParams($this->group->params, $plugin);
		}				
		return new JParameter($params);
	}
	/**
	 * Get a group parameter from plugin and/or editor parameters
	 *
	 * @access 			public
	 * @param string	The parameter name
	 * @param string	The default value
	 * @return 			string
	*/
	function getSharedParam($plugin, $param, $default = '')
	{
		$e_params 	= $this->getEditorParams();
		$p_params 	= $this->getPluginParams($plugin);
		
		$ret = $p_params->get($plugin . '_' . $param, '');

		if ($ret == '') {			
			$ret = $e_params->get('editor_' . $param, $default);
		}
		return $this->cleanParam($ret);
	}
	/**
	 * Return the curernt language code
	 *
	 * @access public
	 * @return language code
	*/
	function getLanguageDir()
	{
		$language =& JFactory::getLanguage();
		return $language->isRTL() ? 'rtl' : 'ltr';
	}
	/**
	 * Return the curernt language code
	 *
	 * @access public
	 * @return language code
	*/
	function getLanguageTag()
	{
		$language =& JFactory::getLanguage();
		if ($language->isRTL()) {
			return 'en-GB';
		}
		return $language->getTag();
	}
	/**
	 * Return the curernt language code
	 *
	 * @access public
	 * @return language code
	*/
	function getLanguage()
	{
		$tag = $this->getLanguageTag();
		if (file_exists(JPATH_SITE .DS. 'language' .DS. $tag .DS. $tag .'.com_ckeditor.xml')) {
			return substr($tag, 0, strpos($tag, '-'));
		}
		return 'en';
	}
	/**
	 * Load a language file
	 * 
	 * @param string $prefix Language prefix
	 * @param object $path[optional] Base path
	 */
	function loadLanguage($prefix, $path = JPATH_SITE)
	{
		$language =& JFactory::getLanguage();		
		$language->load($prefix, $path);
	}
	/**
	 * Remove linebreaks and carriage returns from a parameter value
	 *
	 * @return The modified value
	 * @param string	The parameter value
	*/
	function cleanParam($param)
	{
		return trim(preg_replace('/\n|\r|\t(\r\n)[\s]+/', '', $param));
	}
	/**
	 * Get a JCE editor or plugin parameter
	 *
	 * @param object	The parameter object
	 * @param string	The parameter object key
	 * @param string	The parameter default value
	 * @param string	The parameter default value
	 * @access public
	 * @return The parameter
	*/
	function getParam($params, $key, $p, $t = '')
	{		
		$v = JContentEditor::cleanParam($params->get($key, $p));
		return ($v == $t) ? '' : $v;
	}
	/**
	 * XML encode a string.
	 *
	 * @access	public
	 * @param 	string	String to encode
	 * @return 	string	Encoded string
	*/
	function xmlEncode($string)
	{
		return preg_replace(array('/&/', '/</', '/>/', '/\'/', '/"/'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $string);
	}
	/**
	 * XML decode a string.
	 *
	 * @access	public
	 * @param 	string	String to decode
	 * @return 	string	Decoded string
	*/
	function xmlDecode($string)
	{
		return preg_replace(array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), array('/&/', '/</', '/>/', '/\'/', '/"/'), $string);
	}
}
?>