<?php
session_start();
include('dbconfig.php');

if(isset($_GET['change']) && $_GET['change'] == "uname")
{
	?>
    <form method="post" style="height:220px;">
        <li><label>Current Username:</label>
			<label id="current_uname"><?php echo $_SESSION['username']; ?></label>
        </li>
<li><label>New Username:</label>
			<input type="text" name="uname" id="uname" />
        </li>
        <li><input type="button" class="update" value="update" onClick="updateForm('username')" /><span class="uploading_msg"><img src="images/loading.gif"/></span></li>
    </form>
    
<?php    
}
else
{
	if(isset($_GET['change']) && $_GET['change'] == "upass")
	{
		?>
        
     <form method="post" style="height:275px;">
     <li id="pass_msg"></li>
        <li>
        	<label>Current Password:</label>
			<input type="password" name="current_pass" id="current_pass"/>
        </li>
		<li>
        	<label>New Password:</label>
			<input type="password" name="new_pass" id="new_pass" />
        </li>
        <li>
        	<label>Confirm Password:</label>
			<input type="password" name="new_confirm_pass" id="new_confirm_pass" />
        </li>
        <li><input type="button" class="update" value="update" onClick="updateForm('password')" /><span class="uploading_msg"><img src="images/loading.gif"/></span></li>
    </form>
       
<?php        
	}
	else
	{
		if(isset($_POST['name']) && !empty($_POST['name']))
		{
			$name = addslashes($_POST['name']);
			if($name != "" || !empty($name))
			{
					$i = mysql_query("update wp_webs_users set user_name = '$name' where user_name = '$_SESSION[username]'");
					if($i == 1)
					{
						unset($_SESSION['username']);
						unset($_COOKIE['uname']);
						$_SESSION['username'] = $name;
						setcookie("uname",$name,time()+3600);
						echo $name;
					}
					else
					{
						echo '<div class="update_error">Please Try Again</div>';
					}
			}
			else
			{
				echo '<div class="update_error">username cannot be empty</div>';	
			}
		}
		else
		{
			if(isset($_POST['oldp']) && isset($_POST['newp']) && isset($_POST['cpass']) && !empty($_POST['oldp']) && !empty($_POST['newp']) && !empty($_POST['cpass']))
			{
				$old_p = md5(addslashes($_POST['oldp']));
				$old_res = mysql_query("select * from wp_webs_users where user_pass = '$old_p'");
				$chk = mysql_num_rows($old_res);
				if($chk == 1)
				{
					$new_p = addslashes($_POST['newp']);		
					$cpass = addslashes($_POST['cpass']);
					if($new_p == $cpass)
					{
						$setp = md5($new_p);
						$i = mysql_query("update wp_webs_users set user_pass = '$setp' where user_name = '$_SESSION[username]'");
						if($i == 1)
						{
							echo "Password Updated";
						}
						else
						{
							echo '<div style="color:#990000;">Please Try Again</div>';		
						}
					}
					else
					{
						echo '<div style="color:#990000;">Unmatched Passwords</div>';	
					}
				}
				else
				{
					echo '<div style="color:#990000;">Invalid Current Password</div>';
				}
			}
			else
			{
				echo "Invalid Information";	
			}
		}

	}
}
?>