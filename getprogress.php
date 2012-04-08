<?php
include('class.OUsers.php');
if(isset($_POST['uuid']) && !empty($_POST['uuid']))
{
	$user = new OUsers();
	$user_id = addslashes($_POST['uuid']);	
	header('Content-type: application/json');
	$user->getMeasurement($user_id);
}

?>