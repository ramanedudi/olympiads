<?php
include('lock.php');
include('dbconfig.php');

class Songs
{
	var $song_id;
	var $uuid;
	function getSong($song_id)
	{
		$count_query = mysql_query("select song_count from wp_webservice_music where song_id = ".$song_id);
		$row_count = mysql_fetch_array($count_query);
		$count = $row_count['song_count'];
		$count += 1;
		mysql_query("update wp_webservice_music set song_count = ".$count);
		$query = mysql_query("select song_url from wp_webservice_music where song_id =".$song_id);
		$row = mysql_fetch_array($query);
		echo '<song><song_url>'.htmlentities($row['song_url']).'</song_url><song_count>'.htmlentities($count).'</song_count></song>';
	}
}

?>