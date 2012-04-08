<?php
include('lock.php');
include('dbconfig.php');
		

$weekno = $_GET['weekno'];
$dayno = $_GET['dayno'];
?>
<?php
if(!isset($_GET['vdono']))
{
?>
<h1>Videos of Week<?php echo $weekno;?> => Day<?php echo $dayno; ?>
<li class="addvdo" onclick="addVideo(<?php echo $weekno . "," . $dayno ; ?>)">Add Video</li>
</h1>
<?php
}
?>

<?php
if(isset($_GET['vdono']) && !empty($_GET['vdono']))
{
	$vdonum = $_GET['vdono'];
	$check = mysql_query("select vdo_url from wp_webservice where week_num = ".$weekno." and day_num = ".$dayno." and vdo_num = ".$vdonum."");
	
	$vdo_url_row = mysql_fetch_array($check);
	 $pos = stripos($vdo_url_row['vdo_url'],"upload");
	$vod_url = substr($vdo_url_row['vdo_url'],$pos);
	unlink($vod_url);
	
	$rescount = mysql_query("delete from wp_webservice where week_num = ".$weekno." and day_num = ".$dayno." and vdo_num = ".$vdonum."");
	if($rescount == 1)
	{
		echo "Video Deleted Successfully";	
	}
}
else
{
	$res = mysql_query("select * from wp_webservice where week_num = ".$weekno." and day_num = ".$dayno." and vdo_num != 0");
	$count = mysql_num_rows($res);
	if($count == 0)
	{
		//echo "<h1>No Videos uploaded yet</h1>";

	}
	else
	{
		while($row = mysql_fetch_array($res))
		{
			?>
			
			<div id="video" class="vdo<?php echo $row['vdo_num'];?>">
			<li><label>Video Number </label> <span><?php echo $row['vdo_num']; ?></span></li>
			<li><label>Video Name </label> <span><?php echo $row['vdo_name']; ?></span></li>
			<li><label>Video Type </label> <span><?php echo $row['vdo_type']; ?></span></li>
			<li><label>Video Size </label> <span><?php echo $row['vdo_size']; ?></span></li>
			<li><label>Upload Date </label> <span><?php echo $row['vdo_date']; ?></span></li>
			<li><a href="javascript:void(0)" style="background-color:#486924;" onclick="playVideo(<?php echo $row['vdo_id']; ?>)">Play Video</a><a href="javascript:void(0)" onClick="delVdo(<?php echo $row['week_num'].",".$row['day_num'].",".$row['vdo_num'] ; ?>)">Delete Video</a></li>
			</div>
			
		<?php    
		}
	}
}
	?>
	
