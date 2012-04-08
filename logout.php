<?php
include('lock.php');
if(isset($_COOKIE['uname']))
{
	setcookie("uname","",time()-3600);
	unset($_COOKIE['uname']);
}
if(isset($_SESSION['username']))
{
	session_destroy();
}
header('Location: index.php');

?>