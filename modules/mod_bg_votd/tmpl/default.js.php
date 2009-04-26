<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$bglink = "http://www.biblegateway.com/votd/get?format=json&version=$version_id";
?>

<script type="text/javascript" language="JavaScript" src="http://www.biblegateway.com/votd/votd.write.callback.js"></script>
<script type="text/javascript" language="JavaScript" src="<?php echo $bglink; ?>&amp;callback=BG.votdWriteCallback"> 
</script>

<!-- alternative for no javascript -->
<noscript>
	<a href="<?php echo $bglink; ?>">View Verse of the Day</a>
</noscript>

