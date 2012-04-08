<?php
include('class.Songs.php');
	if(isset($_GET['song_id']))
	{	
		$song_id = addslashes($_GET['song_id']);
		$song = new Songs();
		header('Content-type: text/xml');
		$song -> getSong($song_id);
	}
?>