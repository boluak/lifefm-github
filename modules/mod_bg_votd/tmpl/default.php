<?php
$votd = new VerseOfTheDay("http://www.biblegateway.com/usage/votd/rss/votd.rdf?" . $version_id);
?>
<a target=_blank href="<?php echo $votd->verse_link; ?>">
	<?php echo $votd->verse_title; ?>
</a>
<br>
<?php echo $votd->verse; ?>