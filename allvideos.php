<?php
include('dbconfig.php');
?>
<h1>All Videos</h1>
<?php
$res = mysql_query("select * from wp_webservice where vdo_num != 0 and week_num != 0 and day_num != 0 order by week_num desc, day_num asc");
while($row = mysql_fetch_array($res))
{
	?>
<div id="video" class="vdo<?php echo $row['vdo_num'];?>">
			<li><label>Week </label> <span><?php echo $row['week_num']; ?></span></li>
            <li><label>Day </label> <span><?php echo $row['day_num']; ?></span></li>
			<li><label>Video Number </label> <span><?php echo $row['vdo_num']; ?></span></li>
			<li><label>Video Name </label> <span><?php echo $row['vdo_name']; ?></span></li>
			<li><label>Video Type </label> <span><?php echo $row['vdo_type']; ?></span></li>
			<li><label>Video Size </label> <span><?php echo $row['vdo_size']; ?></span></li>
			<li><label>Upload Date </label> <span><?php echo $row['vdo_date']; ?></span></li>
			<li><a href="javascript:void(0)" style="background-color:#486924;" onclick="playVideo(<?php echo $row['vdo_id']; ?>)">Play Video</a><a href="javascript:void(0)" onClick="delVdo(<?php echo $row['week_num'].",".$row['day_num'].",".$row['vdo_num'] ; ?>)">Delete Video</a></li>
			</div>
	
<?php
}
?>