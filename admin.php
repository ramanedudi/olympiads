<?php 
include('lock.php');
$_SESSION['current_page'] = "home";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link media="all" type="text/css" href="css/style.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.4.js"></script>
<script type="text/javascript" src="js/admin-main.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" src="js/AC_RunActiveContent.js"></script>
<title>VDO ADMIN PANEL</title>
</head>

<body>
<div id="top-panel">Olympus</div>
<div id="admin-wrapper">
    <div id="tophead">
        <div id="admin-logo">
        	<span>For Your Android, iPhone, or iPod Touch</span>
  			<img src="images/olymp.png"  />
        </div>
        <div id="topnav">
        <li><a href="admin.php" class="<?php if($_SESSION['current_page'] == "home") echo 'current'; ?>">HOME</a></li>
        <li><a href="myaccount.php" class="<?php if($_SESSION['current_page'] == "account") echo 'current'; ?>">My Account</a></li>
        <li><a href="adminvdo.php" class="<?php if($_SESSION['current_page'] == "videos") echo 'current'; ?>">Videos</a></li>
        <li><a href="musicadmin.php" class="<?php if($_SESSION['current_page'] == "music") echo 'current'; ?>">Music</a></li>
        <li><a href="vdotips.php" class="<?php if($_SESSION['current_page'] == "vtips") echo 'current'; ?>">Video Tips </a></li>
        <li><a href="logout.php">Logout</a></li>
        </div>
    </div>
    <div id="admin-main">
    
        <div id="admin-main-content" class="homeadmin" style="float:right; width:600px;">
				<h1>Welcome <?php echo $_SESSION['screen_name']; ?></h1>
                <span class="branding">A Personal Trainer In The Palm Of Your Hand</span>
               <h2>Transform your body from unfit to unbelievable! </h2>
               

        </div>
        <div id="home-images">
               <li><img src="images/Photo1.png" /></li>
               <li><img src="images/Photo2.png" /></li>
               <li><img src="images/Photo3.png" /></li>
               <li><img src="images/Photo4.png" /></li>
               </div>
    </div>
<?php
include('adminfooter.php');
?>
