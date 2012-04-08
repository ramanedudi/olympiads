<?php
include('dbconfig.php');

class Videos
{
	
	var $vdo_id;
	var $uuid;
	
	function getVideo($vdo)
	{
		$query = mysql_query("select vdo_url from wp_webservice where vdo_id =".$vdo);
		$row = mysql_fetch_array($query);
		echo '<vdo_url>'.$row['vdo_url'].'</vdo_url>';
	}
	function getVideoByWeek($weekno)
	{
		$query = "SELECT week_num, day_num, vdo_num, vdo_name, vdo_size, vdo_fetch_url as vdourl, vdo_date, wp_webservice_music.song_fetch_url as songurl FROM wp_webservice as x inner join wp_webservice_music on x.song_id = wp_webservice_music.song_id where vdo_num != 0 and week_num = ".$weekno." ORDER BY week_num DESC";
  $result = mysql_query($query) or die('Errant query:  '.$query);
  
  $posts = array();
  
  if(mysql_num_rows($result)) {
    while($post = mysql_fetch_assoc($result)) {
      $posts[] = array('vdo'=>$post);
    }
      echo json_encode(array('video'=>$posts));

  }
  else
  {
	echo '<response>No Videos</response>';  
  }
  

	}
	
	
	
	function getVideoByName($vname)
	{
		$this->vdo_name = $vname;
		$query = "SELECT vdo_url from wp_webservice where vdo_name = '".$this->vdo_name."'";
  $result = mysql_query($query) or die('Errant query:  '.$query);
  
  $posts = array();
  
  if(mysql_num_rows($result)) {
$post = mysql_fetch_assoc($result);
      $posts[] = array('vdo'=>$post);
    
      echo json_encode(array('video'=>$posts));

  }
  else
  {
	$posts[] = array('response'=>'error');
		header('Content-type: application/json');
			echo json_encode(array('user'=>$posts)); 
  }
  

	}






}


?>