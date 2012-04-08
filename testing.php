<?php 
$url = "http://localhost/vdo-adminpanel/upload/31-03-12/W1D1V1.mp4";
$f= "upload";
 $pos = stripos($url,$f);
$uuu=substr($url,$pos);
unlink($uuu);
?>