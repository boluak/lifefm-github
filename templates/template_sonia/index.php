<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

defined('_JEXEC') or die('Restricted access');

$url = clone(JURI::getInstance());
$showRightColumn = $this->countModules('user1 or user2 or right or top');
$showRightColumn &= JRequest::getCmd('layout') != 'form';
$showRightColumn &= JRequest::getCmd('task') != 'edit'
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>  
<jdoc:include type="head" />  
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/framework/stylesheets/application.css" type="text/css" /> 
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
            <ul>
              <li class="selected">
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <b class="g-color">Home</b>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">News</a>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">Music</a>
              </li>
              <li class="line">
                <i class="line"></i><i class="l"></i><i class="r"></i>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">Programmes</a>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">Presenters</a>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">Community board</a>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">Blog</a>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">About us</a>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">Contact us</a>
              </li>
              <li>
                <i class="slider"></i>
                <i class="line"></i><i class="l"></i><i class="r"></i>
                <a href="/">Links</a>
              </li>
            </ul>
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
          <div class="verse">
            <div class="m-col-center-left">
              <h2>Verse of The Day<span>(Romans 12:1)</span></h2>
            </div>
            <div class="m-col-center-right">
              <p>&ldquo;For the word of God is living and active. Sharper than any double-edged sword, it penetrates even to dividing soul and spirit, joints and marrow; it judges the thoughts and attitudes of the heart.&rdquo;</p>
            </div>
            <div class="g-clear"><div></div></div>
          </div>
          
        </div>

        <div class="g-clear"><div></div></div>
      </div>
    </div>
    <div class="g-clear"><div></div></div>
    <div class="m-layout">
      <div class="m-col-left">
        <h1><span class="g-color">Music</span> top 10</h1>
        <ul class="m-music-top">
          <li class="first">
            <strong class="g-color">1.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Superchic[k]</a><br/>Hold</p>
          </li>
          <li class="first">
            <strong class="g-color">2.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Brandon Heath</a><br/>Give Me Your Eyes</p>
          </li>
          <li class="first">
            <strong class="g-color">3.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Mark Harris</a><br/>All for the Glory of You</p>
          </li>
          <li>
            <strong>4.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Jaymes Reunion</a><br/>Fine</p>
          </li>
          <li>
            <strong>5.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">MercyMe</a><br/>You Reign</p>
          </li>
          <li>
            <strong>6.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Jeremy Camp</a><br/>There Will Be A Day</p>
          </li>
          <li>
            <strong>7.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Keith & Kristyn Getty</a><br/>In Christ alone</p>
          </li>
          <li>
            <strong>8.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Relient K</a><br/>Be my escape</p>
          </li>
          <li>
            <strong>9.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Jennifer Knapp</a><br/>A little more</p>
          </li>
          <li>
            <strong>10.</strong>
            <div class="b-round b-round_2-999999">
              <a href="/"><img src="./images/pic40x30.jpg" width="40" height="30" /></a>
            </div>
            <p><a class="g-link-inv" href="/">Chris Tomlin</a><br/>Amazing Grace</p>
          </li>
        </ul>
      </div>
      <div class="m-col-center">
        <div class="m-col-center-left">
          <h1><a href="/">Wall of Prayer</a><span class="m-header-bubble"><i class="corner g-png"></i><a href="/"><div class="b-round b-round_8-c41528"><span>say...</span></div></a></span></h1>

          <div class="m-pray-wall">
            <div class="m-pray">
              <div class="b-round b-round_10-eeede3">
                <div class="m-pray-text">
                  Pray for the Broadcasting Commission, for our dealings with them and that our negotiations can be concluded quickly.
                </div>
              </div>
              <div class="m-pray-author"><i class="corner g-png"></i><span class="g-color">Anne Marie</span>, Iraq</div>
            </div>
            <div class="m-pray">
              <div class="b-round b-round_10-eeede3">
                <div class="m-pray-text">
                  Please just pray for my uncle and his wife Liz, 10 yr old son Dustin,and his two girls 1 yr old Raynee and 1 yr old Ryha. God Bless!!
                </div>
              </div>
              <div class="m-pray-author"><i class="corner g-png"></i><span class="g-color">Terry Scolley</span>, Cork</div>
            </div>
            <div class="m-pray">
              <div class="b-round b-round_10-eeede3">
                <div class="m-pray-text">
                  Please pray for Michael to be safe and close to God. He is having alot of trouble keeping his faith faced with the things he is seeing daily.
                </div>
              </div>
              <div class="m-pray-author"><i class="corner g-png"></i><span class="g-color">Michael Whaley</span>, Cork</div>
            </div>
          </div>

        </div>
        <div class="m-col-center-right">
          <h1><a href="/">Latest news</a><span class="m-header-bubble m-header-bubble_rss"><a href="/"><div class="b-round b-round_8-c41528"><span>RSS</span></div></a></span></h1>
          <dl class="m-news">
            <dt class="g-color">Financial Support</dt>
            <dd>
              <p>We need <a href="/">financial support</a> for the day-today operation of LifeFM. Our heartfelt thanks go to those who have given generously to the station, but we still have a long way to go!</p>
              <ul class="dash">
                <li><em>Account Name</em> <big>"LIFEFM"</big></li>
                <li><em>Sort code</em> <big>"985488"</big></li>
                <li><em>Account No</em> <big>"65640032"</big></li>
              </ul>
            </dd>
            <dt class="g-color">The Story So Far</dt>
            <dd>
              <p>After years of sowing in tears and walking by faith, the Gospel is now out over the <a href="/">airwaves of Cork</a>.</p>
            </dd>
            <dt class="g-color">The High Dive</dt>
            <dd>
              <p>Claire Bell and some friends have jumped in to help raise funds and are planning a sponsored jump from an aeroplane around Easter. They are looking for sponsors.Please contact Claire directly on 086 8371180 for more information. Have you any other way-out ideas for fundraising?</p>
            </dd>
          </dl>
        </div>
        
        <div class="g-clear"><div></div></div>
        
        <h1><a href="/">Recipe of the Week</a></h1>
        <div class="m-recipe">
          <div class="b-round b-round_2-999999">
            <a href="/"><img src="./images/pic115x90.jpg" width="115" height="90" /></a>
          </div>
          <div class="m-recipe-text">
            <h2><a class="g-link-inv" href="/">Chicken Paella</a></h2>
            <p>Valencia is a region on the Mediterranean coast of Spain, between Barcelona and Murcia that is known for its rice dishes. There are as many versions of paella as there are cook in Spain. Originally paella was a dish made in Valencia using chicken, rabbit, snails and three kinds of fresh beans...</p>
          </div>
          <div class="g-clear"><div></div></div>
        </div>
      </div>
    </div>
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
