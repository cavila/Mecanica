<?php
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

//No direct acesss
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class TTVideoModelTTVideo extends JModel 
{
	/**
	 * Category id
	 *
	 * @var int
	 */
	var $_id = null;

	/**
	 * Category ata array
	 *
	 * @var array
	 */
	var $_data = null;

	/**
	 * Category total
	 *
	 * @var integer
	 */
	var $_total = null;

	/**
	 * Pagination object
	 *
	 * @var object
	 */
	var $_pagination = null;


	function __construct()
	{
		parent::__construct();

		global $mainframe;

		// Get the pagination request variables
    $settings = $this->getSettings();
		$this->setState('limit', $mainframe->getUserStateFromRequest('com_ttvideo.limit', 'limit', $settings->default_display_num, 'int'));
		$this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));

		// In case limit has been changed, adjust limitstart accordingly
		$this->setState('limitstart', ($this->getState('limit') != 0 ? (floor($this->getState('limitstart') / $this->getState('limit')) * $this->getState('limit')) : 0));

		// Get the filter request variables
    $filter_order = JRequest::getVar('filter_order', $settings->default_sort_column);
    $filter_order_dir = JRequest::getVar('filter_order_Dir', $settings->sorting_order);
    if ($filter_order == '') $filter_order = $settings->default_sort_column;
    if ($filter_order_dir == '')  $filter_order_dir = $settings->sorting_order;
		$this->setState('filter_order', $filter_order);
		$this->setState('filter_order_Dir', $filter_order_dir);
    
		// Get the search request variables
		$this->setState('search_value', JRequest::getVar('search_value', ''));
		$this->setState('search_fields', JRequest::getVar('search_fields', ''));

    $id = JRequest::getVar('id', '');
    // strip off id alias
    $id = explode(':', $id, 2); 
		$this->setId((int)$id[0]);
	}

	/**
	 * Method to set the category id
	 *
	 * @access	public
	 * @param	int	Category ID number
	 */
	function setId($id)
	{
		// Set category ID
		$this->_id			= $id;
	}

	/**
	 * Method to get weblink item data for the category
	 *
	 * @access public
	 * @return array
	 */
	function getData()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
		}
		return $this->_data;
	}

	/**
	 * Method to get the total number of weblink items for the category
	 *
	 * @access public
	 * @return integer
	 */
	function getTotal()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_total))
		{
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}

		return $this->_total;
	}

	/**
	 * Method to get a pagination object of the weblink items for the category
	 *
	 * @access public
	 * @return integer
	 */
	function getPagination()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}

		return $this->_pagination;
	}
  
  
	function _buildQuery()
	{
		$filter_order		= $this->getState('filter_order');
		$filter_order_dir	= $this->getState('filter_order_Dir');
		$filter_order		= JFilterInput::clean($filter_order, 'cmd');
		$filter_order_dir	= JFilterInput::clean($filter_order_dir, 'word');
    
		$search_value		= $this->getState('search_value');
		$search_fields	= $this->getState('search_fields');
    $search_fields_arr = array();
    if ($search_fields != '') {
      $search_fields_arr  = explode(',', $search_fields);
      $search_matches = array();
    }
    
    if ($this->_id == 0) {
      $query = 'SELECT v.*, r.votes, r.sum FROM #__ttvideo AS v 
                LEFT JOIN #__ttvideo_ratings AS r ON v.id=r.id
                WHERE v.published=1 ';
      if (sizeof($search_fields_arr) > 0) {
        foreach ($search_fields_arr as $search_item) 
          $search_matches[] = "v.$search_item LIKE '%$search_value%' ";
        $query .= 'AND (';
        $query .= implode('OR ', $search_matches).')';
      }
      if ($filter_order != "" && $filter_order_dir != "") {
        if ($filter_order == 'votes') $query .= " ORDER BY r.sum/r.$filter_order $filter_order_dir";
        else $query .= " ORDER BY v.$filter_order $filter_order_dir";
      }
      #JError::raiseError(500, $query);
      return $query;
    } else {
      $query = 'SELECT ct.*, r.votes, r.sum, cc.title AS cat_title FROM #__ttvideo AS ct'
      . ' LEFT JOIN #__categories AS cc ON cc.id = ct.catid'
      . ' LEFT JOIN #__ttvideo_ratings AS r ON ct.id=r.id'
      . ' WHERE ct.catid='.$this->_id.' AND ct.published=1';
      if (sizeof($search_fields_arr) > 0) {
        foreach ($search_fields_arr as $search_item) 
          $search_matches[] = "ct.$search_item LIKE '%$search_value%' ";
        $query .= ' AND (';
        $query .= implode('OR ', $search_matches).')';
      }
      if ($filter_order != "" && $filter_order_dir != "") {
        if ($filter_order == 'votes') $query .= " ORDER BY r.sum/r.$filter_order $filter_order_dir";
        else $query .= " ORDER BY ct.$filter_order $filter_order_dir";
      }
      #JError::raiseError(500, $query);
      return $query;
    }
	}

  function getSettings() {
    $db = $this->getDBO();
    $db->setQuery("SELECT * from #__ttvideo_settings WHERE id=1");
    $settings = $db->loadObject(); 
    if ($settings === null)
      JError::raiseError(500, 'Cannot retieve settings from the database.');
    return $settings;
  }

  function getVideo($id) {
    $db = $this->getDBO();
    $db->setQuery("SELECT * from #__ttvideo WHERE id=$id");
    $video = $db->loadObject(); 
    if ($video === null)
      JError::raiseError(500, 'Video with ID: '.$id.' not found.');
    return $video;
  }

  function getVotingSystem($videoId) {
    require_once 'components' . DS . 'com_ttvideo' . DS . 'helpers' . DS . 'rating.php';
    $vote = new TTVideoRating();
    $options = $vote->initiateVoteSystem($videoId);
    if ($vote->disabled) $html = '<div id="vote_msg">You have already voted!</div>';
    else $html = '<div id="vote_msg">Rate this video!</div>';
    $html .= '
		<div id="container">
			<form id="rat" action="" method="post">';
				foreach ($options as $id => $rb) {
          $id = $id + 1;
					$html .= '<input type="radio" name="rate" value="'.$id.'" title="'.$rb['title'].'" '.$rb['checked'].' '.$rb['disabled'].' />';
				}
				if (!$rb['disabled']) {
					$html .= '<input type="submit" value="Rate it!" />';
				}
			$html .= '</form>
			<div id="vote_loader"><div style="padding-top: 5px;">please wait...</div></div>
		</div>';
		$rating = $vote->getVotes($videoId);
    $html .= '<div>
			Video Popularity: <span id="avg_votes">'.$rating->avg.'</span>/<strong>'.count($options).'</strong>
			(<span id="votes">'.$rating->votes.'</span> votes cast)
		</div>';
    return $html;
  }

  function getCategories() {
    $db = $this->getDBO();
    $query = 'SELECT cc.title, cc.id, count(*) as num_videos'
    . ' FROM #__categories AS cc'
    . ' INNER JOIN #__ttvideo AS ct on cc.id = ct.catid'
    . ' WHERE cc.section=\'com_ttvideo\' AND cc.published=1'
    . ' GROUP BY cc.title'
    . ' ORDER BY cc.ordering ASC';
    $db->setQuery($query);
    $categories = $db->loadObjectList(); 
    if ($categories === null)
      JError::raiseError(500, 'Cannot get categories.');
    return $categories;
  }


}
?>