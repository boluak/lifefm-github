<?php

  function insert($filename, $parent)
  {
    $inherit = dirname(__FILE__)."/../".$parent->template.'/'.$filename;
    $global = dirname(__FILE__).DIRECTORY_SEPARATOR.'/'.$filename;

    if(file_exists($inherit)){
      include $inherit;
    } else {
      include $global;
    }
  }

?>