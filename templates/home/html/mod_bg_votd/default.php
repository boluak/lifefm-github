<?php
  $votd = new VerseOfTheDay("http://www.biblegateway.com/usage/votd/rss/votd.rdf?" . $version_id);
?>

<div class="verse">
  <div class="m-col-center-left">
    <h2>Verse of The Day<span>(<a target=_blank href="<?php echo $votd->verse_link; ?>"><?php echo $votd->verse_title; ?></a>)</span></h2>
  </div>
  <div class="m-col-center-right">
    <p><?php
      $verse = explode("<br/>", $votd->verse);
      echo($verse[0]);
    ?></p>
  </div>
  <div class="g-clear"><div></div></div>
</div>