<?php
include('dbconfig.php');

if(isset($_GET['vdo_id']))
{
	$vid = $_GET['vdo_id'];
	
	$res = mysql_query("select vdo_url from wp_webservice where vdo_id = $vid");
	$row = mysql_fetch_array($res);
	$vdo_url = $row['vdo_url'];
?>
<iframe src="playvdo.php?vid=<?php echo $vdo_url; ?>" width=510 height=510></iframe>

<?php
}
?>