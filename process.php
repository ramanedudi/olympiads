<?php
include('lock.php');
		include('dbconfig.php');

		$uname = addslashes($_POST['wpname']);
		$upass = md5($_POST['wppass']);
		$check = "select * from wp_webs_users where user_login = '".$uname."' and user_pass = '".$upass."'";
		$res = mysql_query($check);
		$row = mysql_fetch_array($res);
		$count = mysql_num_rows($res);
		
		if($count == 1)
		{
			session_start();
			$_SESSION['username'] = $uname;
			$_SESSION['screen_name'] = $row['user_login'];
			$_SESSION['current_page'] = "home";
			setcookie("uname",$uname,time()+3600);
			header('Location: admin.php');
		}
		else
		{
			header('Location: index.php?login_attempt=1');
		}
		

?>
