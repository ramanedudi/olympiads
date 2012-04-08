<?php
//$format = $_GET['format'];
$link = mysql_connect('localhost','root','') or die('Cannot connect to the DB');
  mysql_select_db('webpress',$link) or die('Cannot select the DB');

/* grab the posts from the db */
  $querysong = "SELECT song_id, song_name, song_type, song_size, song_fetch_url FROM wp_webservice_music where song_id != 0 ORDER BY song_id DESC";
  $resultsong = mysql_query($querysong,$link) or die('Errant query:  '.$querysong);

  /* create one master array of the records */
  $songs = array();
  if(mysql_num_rows($resultsong)) {
    while($song = mysql_fetch_assoc($resultsong)) {
      $songs[] = array('song'=>$song);
    }
  }

  /* output in necessary format */
  //if($format == 'json') {
    header('Content-type: application/json');
    echo json_encode(array('music'=>$songs));
  /*}
  else {
    header('Content-type: text/xml');
    echo '<music>';
    foreach($songs as $index => $song) {
      if(is_array($song)) {
        foreach($song as $key => $value) {
          echo '<',$key,'>';
          if(is_array($value)) {
            foreach($value as $tag => $val) {
              echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
            }
          }
          echo '</',$key,'>';
        }
      }
    }
    echo '</music>';
  }
  
  */



  /* disconnect from the db */
  @mysql_close($link);
  ?>