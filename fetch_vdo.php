<?php
include('class.videos.php');

if(isset($_GET['vdo']) && $_GET['vdo'])
{
	
	$vdo_id = addslashes($_GET['vdo']);
	$vdo = new Videos();
	header('Content-type: text/xml');
	$vdo -> getVideo($vdo_id);
}

?>