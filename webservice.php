<?php
$link = mysql_connect('localhost','root','') or die('Cannot connect to the DB');
  mysql_select_db('webpress',$link) or die('Cannot select the DB');

  /* grab the posts from the db */
  $query = "SELECT week_num, day_num, vdo_num, vdo_name, vdo_size, vdo_url as vdourl, vdo_date, wp_webservice_music.song_url as songurl, wp_webservice_music.song_name as songname FROM wp_webservice as x inner join wp_webservice_music on x.song_id = wp_webservice_music.song_id where vdo_num != 0 ORDER BY week_num DESC";
  $result = mysql_query($query,$link) or die('Errant query:  '.$query);

  /* create one master array of the records */
  $posts = array();
  if(mysql_num_rows($result)) {
    while($post = mysql_fetch_assoc($result)) {
      $posts[] = array('vdo'=>$post);
    }
  }

  /* output in necessary format */
  //if($format == 'json') {
    header('Content-type: application/json');
    echo json_encode(array('videos'=>$posts));
  /*}
  else {
    header('Content-type: text/xml');
    echo '<videos>';
    foreach($posts as $index => $post) {
      if(is_array($post)) {
        foreach($post as $key => $value) {
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
    echo '</videos>';
  }*/









  /* disconnect from the db */
  @mysql_close($link);
  ?>