<?php
  defined('_JEXEC') or die('Restricted access');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
  <head>
    <jdoc:include type="head" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

    <!--
      Connect all styles here
      Conditional comments for IE
    -->
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/framework/stylesheets/application.css" type="text/css" charset="utf-8">

    <!--[if lt IE 8]>
      <xml:namespace ns="urn:schemas-microsoft-com:vml" prefix="v" />
      <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/framework/stylesheets/application.ie.css" type="text/css" charset="utf-8">
    <![endif]-->

    <!--[if IE 6]>
      <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/framework/stylesheets/application.ie6.css" type="text/css" charset="utf-8">
    <![endif]-->

    <!--[if IE 7]>
      <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/framework/stylesheets/application.ie7.css" type="text/css" charset="utf-8">
    <![endif]-->


    <!--
      Connect all javascripts here
    -->
    <script src="<?php echo $this->baseurl; ?>/framework/javascripts/jquery/jquery.core-1.3.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $this->baseurl; ?>/framework/javascripts/jquery/jquery.dependClass.js" type="text/javascript" charset="utf-8"></script>

    <script src="<?php echo $this->baseurl; ?>/framework/javascripts/global/GLOBAL.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $this->baseurl; ?>/framework/javascripts/global/browsers.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $this->baseurl; ?>/framework/javascripts/global/events.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $this->baseurl; ?>/framework/javascripts/global/swfobject.js" type="text/javascript" charset="utf-8"></script>

    <script src="<?php echo $this->baseurl; ?>/framework/javascripts/player.js" type="text/javascript" charset="utf-8"></script>

    <script src="<?php echo $this->baseurl; ?>/framework/stylesheets/plugins/b-search/javascripts/b-search.js" type="text/javascript" charset="utf-8"></script>
    
  </head>
<body>
  <div class="g-page g-limit g-centered">
    <div class="g-page">

      <div class="m-header">
        <div class="m-layout">

          <div class="m-col-left">

            <div class="m-header-search">
              <div class="search-bg"><i class="l g-png"></i><i class="r g-png"></i></div>
              <div class="search-in">
                <form action="./" method="get">
                  <label>Search</label>
                  <input name="q" type="search" prettysearch="yes" autocomplete="off" />
                </form>
              </div>
            </div>
            
            <div class="menu">
              <div class="menu-top g-png"></div>

              <jdoc:include type="modules" name="global_menu" />

              <div class="menu-bottom g-png"></div>
            </div>
          </div>
          <div class="m-col-center">
            <div class="m-col-center-left">
              <div class="logo">
                <div class="cloud"></div>
                <ul class="service">
                  <li class="selected"><i class="home" title="Home"></i></li>
                  <li><a href="/"><i class="search" title="Search"></i></a></li>
                  <li><a href="/"><i class="contacts" title="Contact us"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="m-col-center-right">
              <div class="m-col-1">
                <ul class="top-menu">
                  <li><a class="g-link-inv" href="/">Donate</a></li>
                  <li><a href="/">Volunteers needed</a></li>
                  <li><a href="/">Tell a friend</a></li>
                </ul>
              </div>
              <div class="m-col-2">
                <ul class="top-menu">
                  <li class="popup">
                    <a href="/"><i></i>Listen now!</a><hr/><br/>
                    <span class="g-color"><strong>Charizma</strong><br/>Run to God</span>
                  </li>
                  <li class="music">
                    <a href="/"><i></i>winamp</a>
                  </li>
                </ul>
                <div id="lifefmPlayer">
                 	<strong>Sorry, this site has a flash based native radio and adobe flash 8+ is needed. </strong><br />
              	  <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash">Download Flash here.</a>
                </div>
              </div>
            </div>
            <div class="g-clear"><div></div></div>
            <div class="banner">
              <div class="b-round b-round_10-eeede3">banner</div>
            </div>

            <jdoc:file name="title.php" />

          </div>

          <div class="g-clear"><div></div></div>
        </div>
      </div>
      <div class="g-clear"><div></div></div>

      <jdoc:file name="template.php" />

      <div class="g-clear"><div></div></div>
    </div>
  </div>

  <div class="g-page-bottom g-limit g-centered">
    <div class="m-footer">
      <div class="m-layout">
        <div class="m-col-left">
          <p class="copyright">&copy; 2008 Life Fm. All rights reserved.<br/><a class="g-link-inv" href="/">Login for staff <i class="m-icon m-icon-lock"></i></a></p>
        </div>
        <div class="m-col-center">
          <p><a class="g-pseudo-link" href="#"><span>Subscribe to Newsletter</span></a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
