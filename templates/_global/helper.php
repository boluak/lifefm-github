<?php
  defined('_JEXEC') or die('Restricted access');
  
  function global_render()
  {
    global $mainframe;
    
    // Base instances
  	$document =& JFactory::getDocument();
  	$user     =& JFactory::getUser();

  	// Define global template
  	$_template	= "_global";
  	$_template_dir	= JPATH_THEMES.DS.$_template;

    // example includes/application.php "render" function
  	$file	= JRequest::getCmd('tmpl', 'index');
  	if (JSite::getCfg('offline') && $user->get('gid') < '23' ) {
  		$file = 'offline';
  	}
  	if (!is_dir( $_template_dir ) && !JSite::getCfg('offline')) {
  		$file = 'component';
  	}

  	$params = array(
  		'template' 	=> $_template,
  		'file'		=> $file.'.php',
  		'directory'	=> JPATH_THEMES
  	);

    // Catch current template
    $template = $mainframe->getTemplate();
    $template_dir = JPATH_THEMES.DS.$template;

    // Set global template as current and render document
    $mainframe->setTemplate('_global');
  	$data = $document->render( JSite::getCfg('caching'), $params );

    // Set back current template
    $mainframe->setTemplate($template);


  	$replace = array();
  	$matches = array();

    // Catch own construction for include files
    // (example /libraties/joomla/document/html/html.php "_parseTemplate" function)
  	if(preg_match_all('#<jdoc:file\ name="([^"]+)".*\/>#iU', $data, $matches)){
  		$matches[0] = array_reverse($matches[0]);
  		$matches[1] = array_reverse($matches[1]);

  		$count = count($matches[1]);

  		for($i = 0; $i < $count; $i++){
  		  $inc = $matches[1][$i];
  		  $tpl_dir = $template_dir;

  		  // if file does not exist in current template,
  		  // looking for it in "_global" teamplate dir
  		  if(!file_exists($template_dir.DS.$inc)){
  		    $tpl_dir = $_template_dir;
  			}

    		$tpl = $document->_loadTemplate($tpl_dir, $inc);
    		$tpl = $document->_parseTemplate($tpl);

  	    $replace[$i] = $tpl;

  		}

  	  $data = str_replace($matches[0], $replace, $data);

  	}

    return $data;
  }

?>