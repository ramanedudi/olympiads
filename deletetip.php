<?php
include('dbconfig.php');
if(isset($_GET['tip_id']) && !empty($_GET['tip_id']))
{
	$tip = $_GET['tip_id'];
	if($_GET['type'] == 'ffl')
	{
		mysql_query("delete from wp_webservice_ffltips where tip_id = ".$tip);		
	}
	else
	{
		if($_GET['type'] == 'll')
		{
			mysql_query("delete from wp_webservice_lltips where tip_id = ".$tip);	
		}
	}
	
}

?>