<?php
include('class.OUsers.php');
if(isset($_POST['uuid']) && !empty($_POST['uuid']))
{
	$user = new OUsers();
	$user_ids = array();
	
	if(isset($_POST['uuid']) && !empty($_POST['uuid']))
	{
		$user->uuid = addslashes($_POST['uuid']);
	}
	else
	{
		$user_ids[] = array('response'=>'error');
		header('Content-type: application/json');
		echo json_encode(array('user'=>$user_ids)); 
		exit;	
	}
	if(isset($_POST['bodypart']) && !empty($_POST['bodypart']))
	{
		$user->bodypart = addslashes($_POST['bodypart']);
	}
	else
	{
		$user_ids[] = array('response'=>'error');
		header('Content-type: application/json');
		echo json_encode(array('user'=>$user_ids)); 
		exit;	
	}
	if(isset($_POST['measurement']) && !empty($_POST['measurement']))
	{
		$user->measurement = addslashes($_POST['measurement']);
	}
	else
	{
		$user_ids[] = array('response'=>'error');
		header('Content-type: application/json');
		echo json_encode(array('user'=>$user_ids)); 
		exit;	
	}
	if(isset($_POST['unit']) && !empty($_POST['unit']))
	{
		$user->munit = addslashes($_POST['unit']);
	}
	else
	{
		$user_ids[] = array('response'=>'error');
		header('Content-type: application/json');
		echo json_encode(array('user'=>$user_ids)); 
		exit;	
	}
	header('Content-type: application/json');
	$user->saveMeasurement();
	
}
else
{
	
		$user_ids[] = array('response'=>'error');
		header('Content-type: application/json');
			echo json_encode(array('user'=>$user_ids)); 
		exit;
}

?>