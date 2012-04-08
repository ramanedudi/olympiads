<?php
include('lock.php');
include('dbconfig.php');
if(isset($_GET['elmnt']) && !empty($_GET['elmnt']))
{
	if($_GET['elmnt'] == "week")
	{
		$totweek = mysql_query("SELECT distinct `week_num` FROM `wp_webservice` order by week_num desc limit 1");
		$row = mysql_fetch_array($totweek);
		$new_week = $row['week_num'] + 1;
		for($i = 1; $i<=5; $i++)
		{
			mysql_query("insert into wp_webservice(week_num, day_num) values('".$new_week."', '".$i."')");		
		}
?>
    <li>
<a href="javascript:void(0)" onClick="expandDays('week<?php echo $new_week; ?>')"><div class="smenus"><?php echo "Week".$new_week; ?></div></a>
        <ul id="days" class="week<?php echo $new_week; ?>">
				<?php
					for($j = 1; $j <=5; $j++)
					{
						
					?>
                <li class="day<?php echo $j; ?>">        
                <a onclick="viewDayVdo(<?php echo $new_week . ", ".$j; ?>)" id="viewday" href="javascript:void(0)">Day<?php echo $j; ?></a>
                </li>
				<?php
                }
				?>
        </ul>       
    </li>
    
    
    <?php
	}
	else
	{
		if($_GET['elmnt'] == "day")
		{
			$week = $_GET['week'];
			$dayrow = mysql_query("select * from wp_webservice where week_num = ".$week." and day_num = 0");
			$daynum = mysql_num_rows($dayrow);
			if($daynum != 0)
			{
				
				mysql_query("update wp_webservice set day_num = 1 where week_num = ".$week."");
				$newday = 1;
			}
			else
			{
				$res2 = mysql_query("select day_num, vdo_id from wp_webservice where week_num = ".$week." and day_num != 0 order by vdo_id desc limit 1");
				$daynewcount = mysql_num_rows($res2);
				$daynewrow = mysql_fetch_array($res2);

				if($daynewrow['day_num'] == 5)
				{
					echo '<script>alert("Days limit exceeded");</script>';
				}
				else
				{
					$newday = $daynewrow['day_num'] + 1;
					mysql_query("insert into wp_webservice (week_num, day_num) values('".$week."', '".$newday."')");	
					?>
                    
                    
            
                    <?php
				}
			}
			
			?>
             <li><a href="javascript:void(0)" id="viewday" onclick="viewDayVdo(<?php echo $week . ','.$newday; ?>)">Day<?php echo $newday; ?></a></li>
           
            <?php
		
	}
}
}
?>