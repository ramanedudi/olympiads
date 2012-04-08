<?php
include('dbconfig.php');
if(isset($_POST['type']) && !empty($_POST['type']) && $_POST['type'] = 'ffltip')
{
	$body = addslashes($_POST['tip']);
	$i = mysql_query("insert into wp_webservice_ffltips(tip_body) values('".$body."')");
	if($i == 1)
	{
		$que = mysql_query("select * from wp_webservice_ffltips order by tip_date desc limit 1");
		$row = mysql_fetch_array($que);
		?>
        <ul id="tipno<?php echo $row['tip_id']; ?>" >
         <li class="tiptext" onmouseover="showDelete(<?php echo $row['tip_id']; ?>)" ><?php echo $row['tip_body']; ?></li>
        <li><?php echo $row['tip_date']; ?><a href="javascript:void(0)" class="del" id="deletetip<?php echo $row['tip_id']; ?>" onclick="deleteTip(<?php echo $row['tip_id']; ?>,'ffl')">x</a></li></ul>
        <?php
	}
	else
	{
		echo "Please Try Again";
	}
}





?>