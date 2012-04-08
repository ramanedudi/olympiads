<?php
include('dbconfig.php');

class OUsers
{
	var $uuid;
	var $email;
	var $fname;
	var $lname;
	var $gender;
	var $zip;
	var $daily;
	var $dob;
	var $bodypart;
	var $measurement;
	var $munit;
	
	function addUser()
	{
		$i=mysql_query("insert into wp_webservice_users (first_name, last_name, user_gender, user_dob, zipcode, uuid, user_email) values('".$this->fname."', '".$this->lname."', '".$this->gender."', '".$this->dob."', '".$this->zip."',UUID(), '".$this->email."')");
		$user_ids = array();
		if(!empty($i))
		{
			
			$que_ui = mysql_query("select uuid from wp_webservice_users order by registered_on desc limit 1");
			$row_ui = mysql_fetch_array($que_ui);
			$this->uuid = $row_ui['uuid'];
						
		  if(mysql_num_rows($que_ui)) {
			$user_id = mysql_fetch_assoc($que_ui);
			  $user_ids[] = array('uuid'=>$this->uuid);
			echo json_encode(array('user'=>$user_ids)); 
			}
			
		    
		}
		else
		{
			 $user_ids[] = array('response'=>'failed');
			echo json_encode(array('user'=>$user_ids)); 
		}
	}
	
		
	function saveMeasurement()
	{
		$que = "insert into wp_webservice_measurement(user_uuid, user_body, user_measurement, user_unit) values('".$this->uuid."', '".$this->bodypart."', '".$this->measurement."', '".$this->munit."')";
		$i = mysql_query($que);
		$user_ids = array();
		if(!empty($i))
		{
			$user_ids[] = array('response'=>'success');
			echo json_encode(array('user'=>$user_ids)); 
		}
		else
		{
			$user_ids[] = array('response'=>'failed');
			echo json_encode(array('user'=>$user_ids)); 
		}
	}
	
	function getMeasurement($uuid)
	{
			$this->uuid = $uuid;
			$que = mysql_query("select user_body as bodypart, user_measurement as measurement, user_unit as unit, m_date as datedon from wp_webservice_measurement where user_uuid = '".$this->uuid."'");
			$check = mysql_num_rows($que);
			$user_ids = array();
			if(!empty($check))
			{
				if(mysql_num_rows($que)) {
					while($user_id = mysql_fetch_assoc($que))
					{
					  $user_ids[] = array('userreport'=>$user_id);
					}
					echo json_encode(array('report'=>$user_ids)); 
				}
	
				
			}
			else
			{
				$user_ids[] = array('response'=>'error');
			echo json_encode(array('user'=>$user_ids)); 
			}
	}
	
}
?>