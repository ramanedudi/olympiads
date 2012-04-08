<?php
include('adminheader.php');
include('dbconfig.php');
?>
    <div id="admin-main">
    <div id="admin-sidebar">
    <li id="addmusic"><a href="javascript:void(0)"><div class="smenus">Add Music</div></a></li>

    </div>
        <div id="admin-main-content">
				<?php include('allmusic.php'); ?>
                        <div id="vuploadspace">
                <div id="videoform"></div><div class="mclose">Close</div>
</div>

    </div>
    <div id="blankscreen"></div>


    
<?php
include('adminfooter.php');
?>