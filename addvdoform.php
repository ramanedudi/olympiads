<?php
include('dbconfig.php');
if(isset($_SESSION['weekno']) && isset($_SESSION['dayno']))
{
	$week = $_SESSION['weekno'];
	$day = $_SESSION['dayno'];
	unset($_SESSION['weekno']);
	unset($_SESSION['dayno']);
}
if(isset($_SESSION['error']))
{
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}
?>

<form action="upload_file.php" method="post" enctype="multipart/form-data" id="adminform" class="vdoform" >
<li id="vdoerror">
<?php
if(!empty($error))
{
	echo $error;
}

?>
</li>
<li><label for="file">Video<span style="font-size:12px; font-style:italic; color:#F0227B;">*</span>:</label>
<input type="file" name="file" id="vdofile" class="vdofile" />
</li>
<li><span style="font-size:12px; font-style:italic; color:#900;">Video upload Maximum 8MB and mp4 format only.</span></li>
</li>
<li class="musci_selection"><label for="file">Music:</label>
<input type="file" name="musicfile" id="musicfile" class="musicfile" onblur="checkMusic()" /><a href="javascript:void(0)" class="cancel" onclick="emptyMusic()">cancel</a>
</li>
<li><span style="font-size:12px; font-style:italic; color:#900;">Music upload Maximum 8MB and mp3 format only.</span></li>

<li class="selection">OR <select name="song_selection" id="selectsong" onchange="disableMusic()">
<option>Select From Media Library</option>
<?php
$result_song = mysql_query("select song_id, song_name from wp_webservice_music where song_id != 0");
while($row_song = mysql_fetch_array($result_song))
{
	?>
<option value="<?php echo $row_song['song_id']; ?>"><?php  echo $row_song['song_name'];  ?></option>
<?php
}
?>

</select>
<a href="javascript:void(0)" class="cancel" onclick="emptysMusic()">cancel</a>
</li>
<input type="hidden" id="weekno" name="weekno" value="<?php if(isset($_GET['week'])){ echo $_GET['week']; } else { echo $week; }?>" /><input type="hidden" id="dayno" name="dayno" value="<?php if(isset($_GET['day'])){ echo $_GET['day']; } else { echo $day; } ?>" />
<input type="hidden" name="videoupload" value="true" />
<li><input type="button"  value="Upload" class="vdobutton" onclick="uploadVdo();" /></li>

</form>