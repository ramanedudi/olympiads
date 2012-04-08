<?php
//$format = $_GET['format'];
$link = mysql_connect('localhost','root','') or die('Cannot connect to the DB');
  mysql_select_db('webpress',$link) or die('Cannot select the DB');

  /* grab the posts from the db */
  $query = "select * from wp_webservice_ffltips order by tip_date DESC";
  $result = mysql_query($query,$link) or die('Errant query:  '.$query);

  /* create one master array of the records */
  $posts = array();
  if(mysql_num_rows($result)) {
    while($post = mysql_fetch_assoc($result)) {
      $posts[] = array('tip'=>$post);
    }
  }

  /* output in necessary format */
 // if($format == 'json') {
    header('Content-type: application/json');
    echo json_encode(array('tip'=>$posts));
  /*}
  else {
    header('Content-type: text/xml');
    echo '<ffltips>';
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
    echo '</ffltips>';
  }


*/






  /* disconnect from the db */
  @mysql_close($link);
  ?>