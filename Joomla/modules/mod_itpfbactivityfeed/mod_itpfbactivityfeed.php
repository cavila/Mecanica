<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPFacebookActivityFeed
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * ITPFacebookActivityFeed is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// no direct access
defined( "_JEXEC" ) or die;

if($params->get("fbDynamicLocale", 0)) {
    $lang = JFactory::getLanguage();
    $locale = $lang->getTag();
    $locale = str_replace("-","_",$locale);
} else {
    $locale = $params->get("fbLocale", "en_US");
}

if($params->get("fbRef")) {
    $referal = JURI::getInstance();
    $referal = $referal->toString();
}
require(JModuleHelper::getLayoutPath('mod_itpfbactivityfeed'));