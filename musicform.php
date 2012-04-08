<?php
if(isset($_SESSION['error']))
{
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}
?>

<form action="upload_music_file.php" method="post" enctype="multipart/form-data" id="adminform" class="vdoform" >
<li id="vdoerror">
<?php
if(!empty($error))
{
	echo $error;
}

?>
</li>
<li><label for="file">Music<span style="font-size:12px; font-style:italic; color:#F0227B;">*</span>:</label>
<input type="file" name="file" id="vdofile" class="vdofile" />
</li>

<input type="hidden" id="weekno" name="weekno" value="<?php if(isset($_GET['week'])){ echo $_GET['week']; } else { echo $week; }?>" /><input type="hidden" id="dayno" name="dayno" value="<?php if(isset($_GET['day'])){ echo $_GET['day']; } else { echo $day; } ?>" />
<input type="hidden" name="videoupload" value="true" />
<li><input type="button"  value="Upload" class="vdobutton" onclick="uploadVdo();" /></li>

</form>