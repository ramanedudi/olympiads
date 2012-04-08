<?php 
include('lock.php');
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
        		<?php
				 
				 $pos = strpos($_SERVER['PHP_SELF'], "myaccount");
				 if($pos !== false)
				 {
					$_SESSION['current_page'] = "account";	
				 }
				 $pos1 = strpos($_SERVER['PHP_SELF'], "adminvdo");
				 if($pos1 !== false)
				 {
					$_SESSION['current_page'] = "videos";	
				 }
				 $pos3 = strpos($_SERVER['PHP_SELF'], "adminvdo");
				 if($pos3 !== false)
				 {
					$_SESSION['current_page'] = "videos";	
				 }
				  $pos4 = strpos($_SERVER['PHP_SELF'], "musicadmin");
				 if($pos4 !== false)
				 {
					$_SESSION['current_page'] = "music";	
				 }
				  $pos5 = strpos($_SERVER['PHP_SELF'], "vdotips");
				 if($pos5 !== false)
				 {
					$_SESSION['current_page'] = "vtips";	
				 }
				 
				?>
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