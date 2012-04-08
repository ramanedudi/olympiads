<?php

set_time_limit(0);

//include('lock.php');
include('dbconfig.php');

if(isset($_POST['videoupload']))
{
			$week = $_POST['weekno']; 
			$day = $_POST['dayno'];
			$_SESSION['weekno'] = $week;
			$_SESSION['dayno'] = $day;
	if(isset($_FILES["musicfile"]["type"]) && $_FILES["musicfile"]["type"] == "audio/mpeg")
		{
			if ($_FILES["musicfile"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["musicfile"]["error"] . "<br />";
			}
		  else
			{
				$song_name = $_FILES["musicfile"]["name"];
				$song_type = $_FILES["musicfile"]["type"];
				$song_size = ($_FILES["musicfile"]["size"] / 1024);
				
		
			$new_song = time().$_FILES["musicfile"]["name"];
			
				move_uploaded_file($_FILES["musicfile"]["tmp_name"],"upload/music/". $new_song);
				$song_url = "http://".$_SERVER['SERVER_NAME']."/vdo-adminpanel/upload/music/".$new_song;
							
				 $ins_que = "insert into wp_webservice_music (song_name, song_type, song_size, song_url) values ('".$new_song."', '".$song_type."', '".$song_size."', '".$song_url."')";
		 
			 mysql_query($ins_que);
			$res_song_id = mysql_query("select song_id from wp_webservice_music where song_name = '".$new_song."'");
			$row_song_id = mysql_fetch_array($res_song_id);
			$song_id = $row_song_id['song_id'];
			$song_fetch_url = "http://".$_SERVER['SERVER_NAME']."/vdo-adminpanel/fetch_song.php?song_id=".$song_id;
			mysql_query("update wp_webservice_music set song_fetch_url = '".$song_fetch_url."' where song_id = ".$song_id."");
			}
		}
		else
		{
			if(!empty($_FILES["musicfile"]["type"]))
			{
				$error = "INVALID MUSIC FILE";
				$_SESSION['error'] = $error;
				include('addvdoform.php');
				exit;
			}
		}
			if(isset($_POST['song_selection']) && !empty($_POST['song_selection']))
			{
				$s_id = addslashes($_POST['song_selection']);
			}
			
			if(isset($song_id) && !empty($song_id))
			{
				$song_id_v = $song_id;
			}
			else
			{
				if(isset($s_id) && !empty($s_id))
				{
					$song_id_v = $s_id;
				}
				else
				{
					$song_id_v = 0;
				}
			}
			
		if($_FILES["file"]["type"] == "video/mp4")
		{
			if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
		  else
			{
				$vdo_name = addslashes($_FILES["file"]["name"]);
				$vdo_type = $_FILES["file"]["type"];
				$vdo_size = ($_FILES["file"]["size"] / 1024);
				
				$chk = mysql_query("select vdo_num from wp_webservice where week_num = $week and day_num = $day");
				while($row = mysql_fetch_array($chk))
				{
					$vnum = $row['vdo_num'];
				}
				$vnum = $vnum + 1;
		
			//$new = time() .'_'.date("d_m_y").$vdo_name;
			$new = "W".$week."D".$day."V".$vnum.".mp4";
			$dir = date("d-m-y");
			 if (! file_exists("upload/" . $dir))
			  {
				  
					mkdir("upload/".$dir,0755);
			  
			  }
				move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$dir."/" . $new);
				$vdo_url = "http://".$_SERVER['SERVER_NAME']."/vdo-adminpanel/upload/".$dir."/".$new;

					
				$ins_que = "insert into wp_webservice(week_num, day_num, vdo_num, vdo_name, vdo_type, vdo_size, vdo_url, song_id) values('".$week."', '".$day."', '".$vnum."', '".$new."', '".$vdo_type."', '".$vdo_size."', '".$vdo_url."','".$song_id_v."')";
		 
			 mysql_query($ins_que);
			 
			 $vdo_cnt_que = mysql_query("select vdo_id from wp_webservice where vdo_name = '".$new."'");
			 $row_vdo_count = mysql_fetch_array($vdo_cnt_que);
			 $vdo_id = $row_vdo_count['vdo_id'];
			 $vdo_fetch_url = "http://".$_SERVER['SERVER_NAME']."/vdo-adminpanel/fetch_vdo.php?vdo=".$vdo_id;
			 mysql_query("update wp_webservice set vdo_fetch_url = '".$vdo_fetch_url."' where vdo_id = ".$vdo_id);
			$error = "FILE UPLOAD SUCCESS";
			$_SESSION['error'] = $error;
			include('addvdoform.php');
		
			}
		}
		else
		{
			$error = "INVALID FILE";
			$_SESSION['error'] = $error;
			include('addvdoform.php');
		}
		
}

?> 
