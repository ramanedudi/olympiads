<?php
include('dbconfig.php');

if(isset($_GET['song']))
{
	$songid = $_GET['song'];
	mysql_query("delete from wp_webservice_music where song_id = $songid");
}
else
{
?>
<h1>Music Files</h1>      
                <div id="music">
          <ul id="headings">
                	<li>Song Name</li>
                    <li>Size (Kb)</li>
                    <li>Play Count</li>
                    <li class="upld_music">Uploaded</li>
                    <!-- <li>Action</li> -->
                </ul>

                <?php
					$res = mysql_query("select * from wp_webservice_music where song_id != 0");
					while($row = mysql_fetch_array($res))
					{
						?>
                        <ul id="song<?php echo $row['song_id']; ?>">
                        <li><?php echo $row['song_name'] ; ?></li>
                        <li><?php echo ceil($row['song_size']) ; ?></li>
                        <li><?php echo $row['song_count'] ; ?></li>
                        <li class="upload_music_date"><?php echo $row['song_date'] ; ?></li>
                        <!-- <li><a href="javascript:void(0)" id="delsong<?php echo $row['song_id']; ?>" onClick="delSong(<?php echo $row['song_id']; ?>)">Delete</a></li> -->


                          </ul>
                        <?php
					}
				?>

                </div>  
        </div>
<?php
}

?>
