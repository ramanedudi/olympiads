<?php
//include('lock.php');
include('dbconfig.php');
if(isset($_POST['videoupload']))
{
		if($_FILES["file"]["type"] == "audio/mpeg")
		{
			if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
		  else
			{
				$song_name = $_FILES["file"]["name"];
				$song_type = $_FILES["file"]["type"];
				$song_size = ($_FILES["file"]["size"] / 1024);
				
		
			$new = time().$_FILES["file"]["name"];
			
				move_uploaded_file($_FILES["file"]["tmp_name"],"upload/music/". $new);
				$song_url = "http://".$_SERVER['SERVER_NAME']."/vdo-adminpanel/upload/music/".$new;
				
		
				 $ins_que = "insert into wp_webservice_music (song_name, song_type, song_size, song_url) values ('".$new."', '".$song_type."', '".$song_size."', '".$song_url."')";
		 
			 mysql_query($ins_que);
			 $res_song_id = mysql_query("select song_id from wp_webservice_music where song_name = '".$new."'");
			$row_song_id = mysql_fetch_array($res_song_id);
			$song_id = $row_song_id['song_id'];
			$song_fetch_url = "http://".$_SERVER['SERVER_NAME']."/vdo-adminpanel/fetch_song.php?song_id=".$song_id;
			mysql_query("update wp_webservice_music set song_fetch_url = '".$song_fetch_url."' where song_id = ".$song_id."");
			$error = "FILE UPLOAD SUCCESS";
			$_SESSION['error'] = $error;
			include('musicform.php');
		
			}
		}
		else
		{
			$error = "INVALID FILE";
			$_SESSION['error'] = $error;
			include('musicform.php');
		}
		
}

?> 
