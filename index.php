<?php
if(isset($_COOKIE['uname']))
{
	session_start();
	if($_SESSION['username'] == $_COOKIE['uname'])
	{
		header("Location: admin.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link media="all" type="text/css" href="css/style.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.4.js"></script>
<script type="text/javascript">
function validate()
{
	var uname = $("#wpname").val();
	var upass = $("#wppass").val();
	var flag = true;
	if(uname == "")
	{
		$("#error").css({"display":"block"});
		$("#error").html("Please Enter Username");
		flag = "false";
	}
	else
	{
		if(upass == "")
		{
			$("#error").css({"display":"block"});
			$("#error").html("Please Enter Password");
			flag = "false";
		}
	}
	if(flag == "false")
	{
		return false;
	}
	else
	{
		return true;
	}
	
}
$(document).ready(function(){
  $("#wpname").focus(function(){
	 $("#error").fadeOut(1000);
  });
  $("#wppass").focus(function(){
	 $("#error").fadeOut(1000);
  });
});

</script>
<title>VDO ADMIN LOGIN</title>
</head>
<body>
<div id="top-panel">Olympus</div>
<div id="wrapper">
<div id="adminform">
<form method="post" action="process.php" onsubmit="return validate();">
<li id="error">
<?php
if(isset($_GET['login_attempt']) && !empty($_GET['login_attempt']))
{
	echo '<script> 
	$(document).ready(function(){
  
	 $("#error").fadeIn(1000);

	});
	</script>';
	echo "Invalid Username or Password";
}
?>
</li>
<li><label>Username :</label> <input type="text" name="wpname" id="wpname"/></li>
<li><label>Password : </label><input type="password" name="wppass" id="wppass" /></li>
<li><span><input type="submit" class="submit" value="Login !!"/></span></li>
</form>
</div>
</div>
</body>
</html>