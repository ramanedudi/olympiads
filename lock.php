<?php
session_start();
if(!isset($_SESSION['username']) || !isset($_COOKIE['uname']))
{
	header('Location: index.php');
}
else
{
	if($_SESSION['username'] != $_COOKIE['uname'])
	{
		header('Location: index.php');	
	}
}
?>