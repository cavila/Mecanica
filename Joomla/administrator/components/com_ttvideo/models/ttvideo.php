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
defined('_JEXEC') or die();
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

		$config = JFactory::getConfig();

		// Get the pagination request variables
		$this->setState('limit', $mainframe->getUserStateFromRequest('com_ttvideo.limit', 'limit', 30, 'int'));
		$this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));

		// In case limit has been changed, adjust limitstart accordingly
		$this->setState('limitstart', ($this->getState('limit') != 0 ? (floor($this->getState('limitstart') / $this->getState('limit')) * $this->getState('limit')) : 0));

		// Get the filter request variables
    $filter_order = JRequest::getVar('filter_order', 'c_date');
    $filter_order_dir = JRequest::getVar('filter_order_Dir', 'DESC');
    if ($filter_order == '') $filter_order = 'c_date';
    if ($filter_order_dir == '') $filter_order_dir = 'DESC';
		$this->setState('filter_order', $filter_order);
		$this->setState('filter_order_Dir', $filter_order_dir);
    
		$id = JRequest::getVar('id', 0, '', 'int');
		$this->setId((int)$id);
	}

	/**
	 * Method to set the category id
	 *
	 * @access	public
	 * @param	int	Category ID number
	 */
	function setId($id)
	{
		// Set category ID and wipe data
		$this->_id			= $id;
		$this->_category	= null;
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
		// We need to get a list of all weblinks in the given category
		$query = 'SELECT ct.*, cc.title AS cat_title FROM #__ttvideo AS ct'
    . ' LEFT JOIN #__categories AS cc ON cc.id = ct.catid'
    . " ORDER BY $filter_order $filter_order_dir";
		return $query;
	}

  // gets the video for editing
  function getVideo($id) {
    $query = 'SELECT ct.*, cc.title AS cat_title FROM #__ttvideo AS ct'
    . ' LEFT JOIN #__categories AS cc ON cc.id = ct.catid'
    . ' WHERE ct.id='.$id;
    $db = $this->getDBO();
    $db->setQuery($query);
    $video = $db->loadObject();
    if ($video === null)
      JError::raiseError(500, 'Video with ID: '.$id.' not found.');
    else
      return $video;
  }

  // get list of video ids to be used in stats update
  function getVideoIdList() {
    $db = $this->getDBO();
    $db->setQuery('SELECT video_id, site, custom_settings FROM #__ttvideo');
    $videoids = $db->loadObjectList();
    if ($videoids === null)
      JError::raiseError(500, 'Cannot get video ids and site.');
    else
      return $videoids;
  }

  function saveVideo($video) {
    // Check for request forgeries
    JRequest::checkToken() or jexit( 'Invalid Token' );
    
    // checkbox checking
    if (!isset($video['custom_settings'])) $video['custom_settings'] = 0;
    
    $videoTableRow =& $this->getTable('ttvideo');
    if (!$videoTableRow->bind($video)) JError::raiseError(500, 'Error binding data');
    
    $video_details = $this->__fetchVideoXMLInfo($videoTableRow->video_id, $videoTableRow->site, $videoTableRow->custom_settings); // using vimeo api to fetch video info
    if (!$videoTableRow->custom_settings) $videoTableRow->thumbnail = $video_details->thumbnail;
    $videoTableRow->plays = $video_details->plays;
    $videoTableRow->likes = $video_details->likes;
    if ($videoTableRow->site != 'vimeo' && !$videoTableRow->custom_settings) { // these details are for vimeo only
      $videoTableRow->width = $video_details->width;
      $videoTableRow->height = $video_details->height;
      $videoTableRow->thumbnail_med = $video_details->thumbnail_med;
      $videoTableRow->thumbnail_lrg = $video_details->thumbnail_lrg;
    }
    
    if (!$videoTableRow->check()) JError::raiseError(500, 'Invalid data');
    if (!$videoTableRow->store()) {
      $errorMessage = $videoTableRow->getError();
      JError::raiseError(500, 'Error binding data: '.$errorMessage);
    }
    //If we get here and with no raiseErrors, then the save went well
  }

  function __fetchVideoXMLInfo($video_id, $site, $custom_settings) {
    if ($site == 'vimeo') {
      $xmlObj = new DOMDocument();
      $xmlObj->load("http://vimeo.com/api/v2/video/$video_id.xml");
      $vimeo = new stdClass;
      $vimeo->video_id = $video_id;
      $vimeo->site = $site;
      $vimeo->plays = $xmlObj->getElementsByTagName("stats_number_of_plays")->item(0)->nodeValue;
      $vimeo->likes = $xmlObj->getElementsByTagName("stats_number_of_likes")->item(0)->nodeValue;
      if (!$custom_settings) { // only update video dimensions and thumbnails if the user has not set these themselves
        $vimeo->thumbnail = $xmlObj->getElementsByTagName("thumbnail_small")->item(0)->nodeValue;
        $vimeo->thumbnail_med = $xmlObj->getElementsByTagName("thumbnail_medium")->item(0)->nodeValue;
        $vimeo->thumbnail_lrg = $xmlObj->getElementsByTagName("thumbnail_large")->item(0)->nodeValue;
        $vimeo->width = $xmlObj->getElementsByTagName("width")->item(0)->nodeValue;
        $vimeo->height = $xmlObj->getElementsByTagName("height")->item(0)->nodeValue;
      }
      return $vimeo;
    } elseif ($site == 'youtube') {
      $youtube = new stdClass;
      $JSON = file_get_contents("http://gdata.youtube.com/feeds/api/videos?q={$video_id}&alt=json");
      $JSON_Data = json_decode($JSON);
      $youtube->video_id = $video_id;
      $youtube->site = $site;
      // only update video thumbnail if the user has not set this themselves
      if (!$custom_settings) { 
        $youtube->thumbnail = $JSON_Data->{'feed'}->{'entry'}[0]->{'media$group'}->{'media$thumbnail'}[0]->{'url'};
      }
      $youtube->plays = $JSON_Data->{'feed'}->{'entry'}[0]->{'yt$statistics'}->{'viewCount'};
      $youtube->likes = $JSON_Data->{'feed'}->{'entry'}[0]->{'yt$statistics'}->{'favoriteCount'};
      return $youtube;
    }
  }

  function getNewVideo() {
    // Check for request forgeries
    JRequest::checkToken() or jexit( 'Invalid Token' );
    
    $date =& JFactory::getDate();
    $videoTableRow =& $this->getTable('ttvideo');
    $videoTableRow->id = 0;
    $videoTableRow->video_id = '';
    $videoTableRow->site = '';
    $videoTableRow->thumbnail = '';
    $videoTableRow->thumbnail_med = '';
    $videoTableRow->thumbnail_lrg = '';
    $videoTableRow->title = '';
    $videoTableRow->author = '';
    $videoTableRow->description = '';
    $videoTableRow->c_date = $date->toFormat();
    $videoTableRow->published = 0;
    $videoTableRow->catid = '';
    $videoTableRow->plays = 0;
    $videoTableRow->likes = 0;
    $videoTableRow->custom_settings = 0;
    $videoTableRow->width = 600;
    $videoTableRow->height = 300;
    return $videoTableRow;
  }
  
  function deleteVideos($arrayIDs) {
    $query = "DELETE FROM #__ttvideo WHERE id IN (".implode(',', $arrayIDs).")";
    $db = $this->getDBO();
    $db->setQuery($query);
    if (!$db->query()){
      $errorMessage = $this->getDBO()->getErrorMsg();
      JError::raiseError(500, 'Error deleting greetings: '.$errorMessage);
    }                  
  }
  
  function updateVideoStats() {
    $videos = $this->getVideoIdList();
    $db = $this->getDBO();
    foreach ($videos as $video) {
      $videoObject = $this->__fetchVideoXMLInfo($video->video_id, $video->site, $video->custom_settings);
      $db->updateObject( '#__ttvideo', $videoObject, 'video_id' );
    }
  }
  
  
  /**
  * Publishes or Unpublishes one or more categories
  * @param string The name of the category section
  * @param integer A unique category id (passed from an edit form)
  * @param array An array of unique category id numbers
  * @param integer 0 if unpublishing, 1 if publishing
  * @param string The name of the current user
  */
  function publishVideos( $cid=null, $publish=1 ) {

    // Check for request forgeries
    JRequest::checkToken() or jexit( 'Invalid Token' );

    // Initialize variables
    $db		= $this->getDBO();
    $user	=& JFactory::getUser();
    $uid	= $user->get('id');

    JArrayHelper::toInteger($cid);

    if (count( $cid ) < 1) {
      $action = $publish ? 'publish' : 'unpublish';
      JError::raiseError(500, JText::_( 'Select a video to '.$action, true ) );
    }

    $cids = implode( ',', $cid );

    $query = 'UPDATE #__ttvideo'
    . ' SET published = ' . (int) $publish
    . ' WHERE id IN ( '.$cids.' )'
    . ' AND ( checked_out = 0 OR ( checked_out = '.(int) $uid.' ) )'
    ;
    $db->setQuery( $query );
    if (!$db->query()) {
      JError::raiseError(500, $db->getErrorMsg() );
    }

    if (count( $cid ) == 1) {
      $row =& $this->getTable('ttvideo');
      $row->checkin( $cid[0] );
    }
  }

}
?>