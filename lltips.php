<?php
include('dbconfig.php');

?>

<input type="text" name="ffltip" class="tip" id="ffltip_text" />
<input type="button" value="Add Tip" class="sub" onclick="addlltip()"/>

<div id="all_ffltips">
<ul id="headings" style="margin:0; padding:0;">
<li class="tiptext" style="list-style-type:none;">Living Lean Tips</li>
<li>Post Date</li>

</ul>
<ul id="alltext">
<?php
$que = mysql_query("select * from wp_webservice_lltips order by tip_date desc");
		while($row = mysql_fetch_array($que)){
		?>
        <ul id="tipno<?php echo $row['tip_id']; ?>">
        
        <li class="tiptext" onmouseover="showDelete(<?php echo $row['tip_id']; ?>)" ><?php echo $row['tip_body']; ?></li>
        <li><?php echo $row['tip_date']; ?><a href="javascript:void(0)" class="del" id="deletetip<?php echo $row['tip_id']; ?>" onclick="deleteTip(<?php echo $row['tip_id']; ?>,'ll')">x</a></li></ul>
        <?php
		}
		
		?>
</ul>
</div>