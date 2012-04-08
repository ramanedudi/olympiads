<?php
if(isset($_SESSION['current_page']))
{
	unset($_SESSION['current_page']);
	$_SESSION['current_page'] = "account";
}
include('adminheader.php');
include('dbconfig.php');
?>
    <div id="admin-main">
    <div id="admin-sidebar">
    <li><a href="javascript:void(0)" id="cuname"><div class="smenus">Change Username</div></a></li>
    <li><a href="javascript:void(0)" id="cupass"><div class="smenus">Change Password</div></a></li>
    </div>
        <div id="admin-main-content">
        <?php
			$res = mysql_query("select * from wp_webs_users where user_name = '$_SESSION[username]'");
			$row = mysql_fetch_array($res);

		?>
				<h1>Welcome <?php echo $_SESSION['screen_name']; ?>         </h1>
                <div id="login_credits">
                	<li>Username : <?php echo $row['user_name']; ?></li>
                    <li>Screen Name :<?php echo $row['user_login']; ?></li>
                    <li>Lasr Visit : <?php echo $row['user_last_login']; ?></li>
                </div>
        </div>
    </div>
<?php
include('adminfooter.php');
?>