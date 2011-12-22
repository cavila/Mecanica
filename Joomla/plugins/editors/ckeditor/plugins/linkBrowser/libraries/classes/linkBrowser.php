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

// no direct access
defined('_JEXEC') or die('Restricted access');
// Set flag that this is an extension parent
DEFINE('_CKE_EXT', 1);

// Load class dependencies
require_once(CKE_PLUGINS.DS.'linkBrowser'.DS.'libraries'.DS.'classes' .DS. 'plugin.php');

class linkBrowser extends JContentEditorPlugin 
{
  /*
  *  @var varchar
  */
  var $_linkextensions = array();
  /**
  * Constructor activating the default information of the class
  *
  * @access protected
  */
  function __construct()
  {
    parent::__construct();
    
    // check the user/group has editor permissions
//    $this->checkPlugin() or die(JError::raiseError(403, JText::_('Access Forbidden')));
        
    // Setup XHR callback functions 
    $this->setXHR(array($this, 'getLinks'));
    
    // Set javascript file array
    $this->script(array('mootools'), 'media'); // required
    $this->script(array(
      'ckeditorLinkBrowser', //required 
      'plugin', //required 
      'tree', 
     'linkBrowser',  // required
    ), 'libraries');
    
    // Set css file array
    $this->css(array('plugin', 'tree'), 'libraries');

    $this->loadLanguages();
    
    $extensions = $this->loadExtensions('links');
    
    foreach ($extensions as $extension) {
      if ($extension) {
        if (is_array($extension)) {
          foreach ($extension as $sibling) {
            $this->_linkextensions[] = $sibling;
          }
        } else {
          $this->_linkextensions[] = $extension;
        }
      }
    }
  }
  /**
   * Returns a reference to a plugin object
   *
   * This method must be invoked as:
   *    <pre>  $linkBrowser = &linkBrowser::getInstance();</pre>
   *
   * @access  public
   * @return  JCE  The editor object.
   * @since 1.5
   */
  function &getInstance()
  {
    static $instance;

    if (!is_object($instance)) {
      $instance = new linkBrowser();
    }
    return $instance;
  }
  function getLists()
  {
    $linkBrowser =& linkBrowser::getInstance();
    
    $list = '<ul class="root">';
    foreach ($linkBrowser->_linkextensions as $extension) {           
      // Path specified, assume extra files     
      if ($extension['path']) {
        include_once($extension['path'] .DS. $extension['file']);
      }
      $class = 'linkBrowser' . ucfirst($extension['name']);
      if (is_callable(array($class, 'getOptions'))) {
        $list .= call_user_func(array($class, 'getOptions')); 
      } else {
        // No class file specified, use function instead.
        $list .= call_user_func($extension['name'] . 'getOptions');
      }
    }
    $list .= '</ul>';
    return $list;
  }
  function getLinks($args)
  {
    $linkBrowser =& linkBrowser::getInstance();
    
      foreach ($linkBrowser->_linkextensions as $key => $extension) {
      // Check the prefix of the request
      $option = str_replace('com_', '', $args->option);   
      if ($option == $extension['name']) {
        // Path specified, assume extra files
        if ($extension['path']) {
          include_once($extension['path'] .DS. $extension['file']);
        }
        $class = 'linkBrowser' . ucfirst($extension['name']);
        if (is_callable(array($class, 'getItems'))) {
          $items = call_user_func(array($class, 'getItems'), $args);
        } else {
          // No class file specified, use function instead.
          $items = call_user_func($extension['name'] . 'getItems', $args);
        }
      }
    }
    $array  = array();
    $result = array();
    if (isset($items)) {
      foreach ($items as $item) {
        $array[] = array(
          'id'    =>  isset($item['id']) ? $linkBrowser->xmlEncode($item['id']) : '',
          'url'   =>  isset($item['url']) ? $linkBrowser->xmlEncode($item['url']) : '',
          'name'    =>  $linkBrowser->xmlEncode($item['name']),
          'class'   =>  $item['class']
        );
      }
      $result[] = array(
        'folders' =>  $array
      );
    }
    return $result;
  }
  /**
   * Category function used by many extensions
   *
   * @access  public
   * @return  Category list object.
   * @since 1.5
   */
  function getCategory($section)
  {
  	
    $db     =& JFactory::getDBO();
    $user   =& JFactory::getUser();
    $linkBrowser  =& linkBrowser::getInstance();

    $query = 'SELECT id AS slug, id AS id, title, alias';
    if ($linkBrowser->getPluginParam('linkBrowser_category_alias', '1') == '1') {
      $query .= ', CASE WHEN CHAR_LENGTH(alias) THEN CONCAT_WS(":", id, alias) ELSE id END as slug';
    }
    $query .= ' FROM #__categories'
    . ' WHERE section = '. $db->Quote($section)
    . ' AND published = 1'
    . ' AND access <= '.(int) $user->get('aid')
    . ' ORDER BY title'
    ;
    $db->setQuery($query);
    
    return $db->loadObjectList();   
  }
  /**
   * (Attempt to) Get an Itemid
   *
   * @access  public
   * @return  Category list object.
   * @since 1.5
   */
  function getItemId($component, $needles = array())
  {   
    $match = null;
    
    require_once(JPATH_SITE.DS.'includes'.DS.'application.php');
    
    $component  =& JComponentHelper::getComponent($component);
    $menu     =& JSite::getMenu();
    $items    = $menu->getItems('componentid', $component->id);
    
    if ($items) {
      foreach ($needles as $needle => $id) {
        foreach ($items as $item) {
          if ((@$item->query['view'] == $needle) && (@$item->query['id'] == $id)) {
            $match = $item->id;
            break;
          }
        }
        if (isset($match)) {
          break;
        }
      }
    }
    return $match ? '&Itemid='.$match : '';
  }
}