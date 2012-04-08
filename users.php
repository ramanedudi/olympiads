<?php
include('class.OUsers.php');
$newuser = new OUsers();
if(isset($_POST['fname']) && !empty($_POST['fname']))
{
		$newuser -> fname = addslashes($_POST['fname']);
}
if(isset($_POST['lname']) && !empty($_POST['lname']))
{
		$newuser -> lname = addslashes($_POST['lname']);
}
if(isset($_POST['umail']) && !empty($_POST['umail']))
{
		$newuser->email = addslashes($_POST['umail']);
}
if(isset($_POST['gender']) && !empty($_POST['gender']))
{
		$newuser -> gender = addslashes($_POST['gender']);
}
if(isset($_POST['dob']) && !empty($_POST['dob']))
{
		$newuser -> dob = addslashes($_POST['dob']);
}
if(isset($_POST['zip']) && !empty($_POST['zip']))
{
		$newuser -> zip = addslashes($_POST['zip']);
}
header('Content-type: application/json');
$newuser -> addUser();
?>