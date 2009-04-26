<?php
/**
* @version		$Id: mod_poll.php 9341 2007-11-12 18:37:26Z tsai146 $
* @package		Joomla
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
require_once (dirname(__FILE__).DS.'votd.php');

$moduleclass_sfx = $params->def('moduleclass_sfx', '');
$version_id		 = $params->def('version', '31');
$method		 	 = $params->def('method', '0');

$config =& JFactory::getConfig();
$offset = $config->getValue('config.offset' );

if ($method == 'js') {
	require(JModuleHelper::getLayoutPath('mod_bg_votd', 'default.js'));
}
else {
	require(JModuleHelper::getLayoutPath('mod_bg_votd'));
}
?>