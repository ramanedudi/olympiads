<?php
include('class.videos.php');
if(isset($_GET['week']) && !empty($_GET['week']))
{
	$video = new Videos();
	$wkno = addslashes($_GET['week']);
	header('Content-type: application/json');
	$video -> getVideoByWeek($wkno);
}

?>