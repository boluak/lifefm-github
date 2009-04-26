<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

if ( ! defined('modMainMenuXMLCallbackDefined') )
{
function modMainMenuXMLCallback(&$node, $args)
{
	$user	= &JFactory::getUser();
	$menu	= &JSite::getMenu();
	$active	= $menu->getActive();
	$path	= isset($active) ? array_reverse($active->tree) : null;

	if (($args['end']) && ($node->attributes('level') >= $args['end']))
	{
		$children = $node->children();
		foreach ($node->children() as $child)
		{
			if ($child->name() == 'ul') {
				$node->removeChild($child);
			}
		}
	}

	if ($node->name() == 'ul') {
		foreach ($node->children() as $child)
		{
			if ($child->attributes('access') > $user->get('aid', 0)) {
				$node->removeChild($child);
			}
		}
	}

	if (($node->name() == 'li') && isset($node->ul)) {
		$node->addAttribute('class', 'parent');
	}

	if (isset($path) && in_array($node->attributes('id'), $path))
	{
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' active');
		} else {
			$node->addAttribute('class', 'active');
		}
	}
	else
	{
		if (isset($args['children']) && !$args['children'])
		{
			$children = $node->children();
			foreach ($node->children() as $child)
			{
				if ($child->name() == 'ul') {
					$node->removeChild($child);
				}
			}
		}
	}

	if (($node->name() == 'li') && ($id = $node->attributes('id'))) {
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' item'.$id);
		} else {
			$node->addAttribute('class', 'item'.$id);
		}
	}

	if (isset($path) && $node->attributes('id') == $path[0]) {
		$node->addAttribute('id', 'current');
	} else {
		$node->removeAttribute('id');
	}
	$node->removeAttribute('level');
	$node->removeAttribute('access');
}
	define('modMainMenuXMLCallbackDefined', true);
}

function mosGetMenuLink($mitem, $level = 0, & $params, $open = null, $active)
{
	global $Itemid;
	$txt = '';
	//needed to break reference to prevent altering the actual menu item
	$mitem = clone($mitem);
	// Menu Link is a special type that is a link to another item
	if ($mitem->type == 'menulink')
	{
		$menu = &JSite::getMenu();
		if ($tmp = $menu->getItem($mitem->query['Itemid'])) {
			$name = $mitem->name;
			$mid = $mitem->id;
			$parent = $mitem->parent;
			$mitem = clone($tmp);
			$mitem->name = $name;
			$mitem->mid = $mid;
			$mitem->parent = $parent;
		} else {
			return;
		}
	}

	switch ($mitem->type)
	{
		case 'separator' :
			$mitem->browserNav = 3;
			break;

		case 'url' :
			if (eregi('index.php\?', $mitem->link)) {
				if (!eregi('Itemid=', $mitem->link)) {
					$mitem->link .= '&amp;Itemid='.$mitem->id;
				}
			}
			break;

		default :
			$mitem->link = 'index.php?Itemid='.$mitem->id;
			break;
	}

	// Active Menu highlighting
	$current_itemid = intval( $Itemid );
	$isActive = false;
	if($current_itemid == $mitem->id){
	  $isActive = true;
	}
	if (!$current_itemid) {
		$id = '';
	} else {
		if ($isActive) {
			$id = 'id="active_menu' . $params->get('class_sfx') . '"';
		} else {
			if ($params->get('activate_parent') && isset ($open) && in_array($mitem->id, $open)) {
				$id = 'id="active_menu' . $params->get('class_sfx') . '"';
			} else {
				if ($mitem->type == 'url' && ItemidContained($mitem->link, $current_itemid)) {
					$id = 'id="active_menu' . $params->get('class_sfx') . '"';
				} else {
					$id = '';
				}
			}
		}
	}

	if ($params->get('full_active_id'))
	{
		// support for `active_menu` of 'Link - Url' if link is relative
		if ($id == '' && $mitem->type == 'url' && strpos($mitem->link, 'http') === false) {
			$url = array();
			if(strpos($mitem->link, '&amp;') !== false)
			{
			   $mitem->link = str_replace('&amp;','&',$mitem->link);
			}

			parse_str($mitem->link, $url);
			if (isset ($url['Itemid'])) {
				if ($url['Itemid'] == $current_itemid) {
					$id = 'id="active_menu' . $params->get('class_sfx') . '"';
				}
			}
		}
	}

	// replace & with amp; for xhtml compliance
	$menu_params = new stdClass();
	$menu_params = new JParameter($mitem->params);
	$menu_secure = $menu_params->def('secure', 0);

	if (strcasecmp(substr($mitem->link, 0, 4), 'http')) {
		$mitem->url = JRoute::_($mitem->link, true, $menu_secure);
	} else {
		$mitem->url = $mitem->link;
	}

	$menuclass = 'mainlevel' . $params->get('class_sfx');
	if ($level > 0) {
		$menuclass = 'sublevel' . $params->get('class_sfx');
	}

	// replace & with amp; for xhtml compliance
	// remove slashes from excaped characters
	$mitem->name = stripslashes(htmlspecialchars($mitem->name));

	switch ($mitem->browserNav)
	{
		// cases are slightly different
		case 1 :
			// open in a new window
			$txt = '<a href="' . $mitem->url . '" target="_blank" class="' . $menuclass . '" ' . $id . '>' . $mitem->name . '</a>';
			break;

		case 2 :
			// open in a popup window
			$txt = "<a href=\"#\" onclick=\"javascript: window.open('" . $mitem->url . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"$menuclass\" " . $id . ">" . $mitem->name . "</a>\n";
			break;

		case 3 :
			// don't link it
			$txt = '<span class="' . $menuclass . '" ' . $id . '>' . $mitem->name . '</span>';
			break;

		default : // formerly case 2
			// open in parent window
			if($isActive){
  			$txt = '<strong class="' . $menuclass . '">' . $mitem->name . '</strong>';
			} else {
  			$txt = '<a href="' . $mitem->url . '" class="' . $menuclass . '" ' . $id . '>' . $mitem->name . '</a>';
			}
			break;
	}

	if ($params->get('menu_images'))
	{
		$menu_params = new stdClass();
		$menu_params = new JParameter($mitem->params);

		$menu_image = $menu_params->def('menu_image', -1);
		if (($menu_image <> '-1') && $menu_image) {
			$image = '<img src="'.JURI::base(true).'/images/stories/' . $menu_image . '" border="0" alt="' . $mitem->name . '"/>';
			if ($params->get('menu_images_align')) {
				$txt = $txt . ' ' . $image;
			} else {
				$txt = $image . ' ' . $txt;
			}
		}
	}

	return $txt;
}

function ItemidContained($link, $Itemid)
{
	$link = str_replace('&amp;', '&', $link);
	$temp = explode("&", $link);
	$linkItemid = "";
	foreach ($temp as $value) {
		$temp2 = explode("=", $value);
		if ($temp2[0] == "Itemid") {
			$linkItemid = $temp2[1];
			break;
		}
	}
	if ($linkItemid != "" && $linkItemid == $Itemid) {
		return true;
	} else {
		return false;
	}
}

function mosShowLFMainMenu(& $params)
{
	global $Itemid;
	$current_itemid = intval( $Itemid );

	$menu = & JSite::getMenu();
	$user = & JFactory::getUser();

	//get menu items
	$rows = $menu->getItems('menutype', $params->get('menutype'));

	$links = array ();
	if(is_array($rows) && count($rows)) {
		foreach ($rows as $row)
		{
			if ($row->access <= $user->get('aid', 0)) {
			  $item = array();
			  $params->set("class_sfx", " g-color");
			  $item["item"] = mosGetMenuLink($row, 0, $params, null, true);
			  if($current_itemid == $row->id){
  			  $item["active"] = true;
			  } else {
  			  $item["active"] = false;
			  }
				$links[] = $item;

			}
		}
	}

	$menuclass = 'mainlevel' . $params->get('class_sfx');
	$lang =& JFactory::getLanguage();

  $count = 0;
	echo '<ul>';
	foreach ($links as $link) {
	  if($count == 3){
	    echo '
  	    <li class="line">
          <i class="line"></i><i class="l"></i><i class="r"></i>
        </li>
      ';
	  }
		echo '<li'.($link["active"] ? ' class="selected"' : '' ).'><i class="slider"></i><i class="line"></i><i class="l"></i><i class="r"></i>' . $link["item"] . '</li>';
	  $count++;
	}
	echo '</ul>';

}

mosShowLFMainMenu($params);

//modMainMenuHelper::render($params, 'modMainMenuXMLCallback');

?>