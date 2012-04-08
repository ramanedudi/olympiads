<?php
include('class.videos.php');
if(isset($_GET['vdo_name']) && !empty($_GET['vdo_name']))
{
	$video = new Videos();
	$wkno = addslashes($_GET['vdo_name']);
	header('Content-type: application/json');
	$video -> getVideoByName($wkno);
}

?>