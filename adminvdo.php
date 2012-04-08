<?php
include('adminheader.php');
include('dbconfig.php');
if(isset($_SESSION['vdoerror']) && !empty($_SESSION['vdoerror']))
{
	echo '
	<script type="text/javascript">
	$(document).ready(function(){
		$("#admin-main-content").load("addvdoform.php");
	});
	</script>
	';
}
 
?>
    <div id="admin-main">
    <div id="admin-sidebar">
		<li><a href="javascript:void(0)" id="allvids"><div class="smenus">All Videos</div></a></li>
        <li><a href="javascript:void(0)" id="allweeks"><div class="smenus">Weeks</div></a>
        <ul id="weeks">
		<?php
			$res1 = mysql_query("select distinct week_num from wp_webservice where week_num != 0 order by week_num desc");
			while($row1 = mysql_fetch_array($res1))
			{
		?>		
			<li><a href="javascript:void(0)" onClick="expandDays('week<?php echo $row1['week_num']; ?>')"><div class="smenus"><?php echo "Week".$row1['week_num']; ?></div></a>
            <ul id="days" class="week<?php echo $row1['week_num']; ?>">
        <?php
				$res2 = mysql_query("select distinct day_num from wp_webservice where week_num = ".$row1['week_num']." and day_num != 0");
								
				while($row2 = mysql_fetch_array($res2))
				{
					?>
                    <li class="day<?php echo $row2['day_num']; ?>"><a href="javascript:void(0)" id="viewday" onclick="viewDayVdo(<?php echo $row1['week_num'] . ','.$row2['day_num']; ?>)">Day<?php echo $row2['day_num']; ?></a></li>
        <?php            
				}
				?>
                   </ul>
		<?php
		
		    }
		?>
            
            
                </li>
                <li><a href="javascript:void(0)" id="addweek"><div class="smenus">Add Week</div></a></li>
            </ul>
        </li>
       
    </div>
        <div id="admin-main-content">
        <h1>Latest Uploaded Videos </h1>
<?php
$res = mysql_query("select * from wp_webservice where vdo_num != 0 and week_num != 0 and day_num != 0 order by vdo_date desc limit 6");
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
        </div>
<div id="vuploadspace">
                <div id="videoform"></div><div class="close">Close</div>
               
</div>
<div id="playvideo">
                <div id="playing"></div><div class="close">Close</div>
</div>
    </div>
    <div id="blankscreen"></div>

<?php
include('adminfooter.php');
?>

