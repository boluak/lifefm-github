<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once(dirname(__FILE__).DS.'legacy.php');

switch ( $params->get( 'menutype' ) )
{
	case 'mainmenu':
    mosShowMainMenu($params, 1);
	  break;

	case 'topmenu':
    mosShowMainMenu($params);
	  break;
	  
	default:
    modMainMenuHelper::render($params, 'modMainMenuXMLCallback');
	  break;
}

?>