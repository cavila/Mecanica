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

class TTVideoRating
{
  
  function __construct() {
    $this->disabled = true;
  }
  
  function initiateVoteSystem($id) {
    sleep(2);
    // Fill [$options] with radiobutton properties 
    $options = $this->getOptions($id);
    return $options;
  }
  
  function storeVote($vote, $id) {
    $options = $this->initiateVoteSystem($id);
    // Check, if we need to proccess the FORM submission (or AJAX call that pretends POST method)
    if($_SERVER["REQUEST_METHOD"] == 'POST')
    {
      // verify user input!
      $vote = $this->inRange($vote, 1, 5);
      // update statistic and save to file
      $rating = $this->saveVoteInDB($vote, $id);
      // For AJAX requests we'll return JSON object with current vote statistics
      if($_SERVER['HTTP_X_REQUESTED_WITH']) {
        header('Cache-Control: no-cache');
        echo json_encode($rating); // requires: PHP >= 5.2.0, PECL json >= 1.2.0
      }
      // For non-AJAX requests we are going to echo {$post_message} variable in main script
      else
      {
        $avg = round($rating->avg);
        foreach($options as $id => $val) {
          $options[$id]['disabled'] = 'disabled="disabled"';
          $options[$id]['checked']  = $id==$avg ? 'checked="checked"' : '';
        }
      }
    }
  }

  function getOptions($id) {
    // check to see if this user has voted before
    $user_ip = $this->getUserIp();
    $rating = $this->getVotes($id);
    
    if ($rating->ips == '') {  // turn ip list into array
      $this->disabled = false;
    } else {
      $voted_ips = explode(',', $rating->ips);
      if (!in_array($user_ip, $voted_ips)) $this->disabled = false; // user has never voted so allow them to vote
    }
    if ($this->disabled) { // user cannot vote
      $avg = round($rating->avg); // get closet value
      $titles = array('Not so great', 'Quite good', 'Good', 'Great!', 'Excellent!');
      $options = array();
      for ($i=0; $i<5; $i++) {
        $j = $i + 1;
        if ($j<=$avg) $option = array($j => array('title' => $titles[$i], 'checked' => 'checked', 'disabled' => 'disabled="disabled"'));
        else $option = array($j => array('title' => $titles[$i], 'checked' => '', 'disabled' => ''));
        $options = array_merge($options, $option);
      }
    } else { // user can vote
      $options = array(
        0 => array('title' => 'Not so great', 'checked' => '', 'disabled' => ''),
        1 => array('title' => 'Quite good', 'checked' => '', 'disabled' => ''),
        2 => array('title' => 'Good', 'checked' => '', 'disabled' => ''),
        3 => array('title' => 'Great!', 'checked' => '', 'disabled' => ''),
        4 => array('title' => 'Excellent!', 'checked' => '', 'disabled' => ''),
      );
    }    
    return $options;
  }

  function inRange($val, $from=0, $to=100) {
    return min($to, max($from, (int)$val));
  }

  function saveVoteInDB($vote, $id) {
    // get session var
    $session =& JFactory::getSession();
    
    $id = (int)$id;
    $rating = $this->getVotes($id);
    
    // update the values on the rating for this video
    $rating->votes++;
    $rating->sum += $vote;
    // recalculate avg based on changed above
    $rating->avg = sprintf('%01.1f', $rating->sum / $rating->votes);
    // add new user's ip to ips list
    $user_ip = $this->getUserIp();
    if ($rating->ips == '') { // no ips
      $rating->ips = $user_ip;
    } else { // ips exist
      $voted_ips = explode(',', $rating->ips);
      if (!in_array($user_ip, $voted_ips)) {
        $rating->ips = $rating->ips.','.$user_ip;
      } else { // this user has changed their mind on their vote
        $rating->votes--; // remove the extra vote the user made
        $rating->sum -= (int)$session->get('vote'); // remove their previous vote value from the vote tally
        // recalculate avg based on changed above
        $rating->avg = sprintf('%01.1f', $rating->sum / $rating->votes);
      }
    }
    
    // store user vote so if they change their minds without leaving the page they can change their vote
    $session->set('vote', $vote);
    
    $db =& JFactory::getDBO();
    $db->setQuery("UPDATE `#__ttvideo_ratings` SET `votes`=$rating->votes, `sum`=$rating->sum, `ips`='$rating->ips' WHERE `id`=$id");
    $result = $db->query();
    if ($result === null)
      JError::raiseError(500, 'Cannot update rating');
    // we don't need these variables
    unset($rating->id);
    unset($rating->ips);
    unset($rating->sum);
    // return the rating
    return $rating;
  }

  function getVotes($id) {
    $db =& JFactory::getDBO();
    $db->setQuery('SELECT * from `#__ttvideo_ratings` WHERE `id`='.(int)$id );
    $db->query();
    if ($db->getNumRows() == 0) { // check to see if there is a row for this video yet, if not lets initiate one
      $db->setQuery("INSERT INTO `#__ttvideo_ratings` (`id`, `votes`, `sum`) VALUES ($id, 0, 0)");
      $db->query();
      $rating = new stdClass();
      $rating->votes = 0;
      $rating->sum = 0;
      $rating->avg = 0;
      $rating->ips = '';
    } else { // there is a row, lets get the data from it
      $db->setQuery('SELECT * from `#__ttvideo_ratings` WHERE `id`='.(int)$id );
      $rating = $db->loadObject();
      if ($rating === null)
        JError::raiseError(500, 'Cannot retieve rating from the database.');
      if ($rating->votes != 0) $rating->avg = sprintf('%01.1f', $rating->sum / $rating->votes);
      else $rating->avg = 0;
    }
    return $rating;
  }
  
  function getUserIp() {
    if (isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
      $user_ip = $_SERVER['HTTP_X_FORWARD_FOR'];
    } else {
      $user_ip = $_SERVER['REMOTE_ADDR'];
    }
    return $user_ip;
  }

}
