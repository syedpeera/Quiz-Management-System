<?php
session_start();
error_reporting(0);
include("connection.php");
if(isset($_SESSION['f_name_of_user']))
{
	header("location:f_profile.php");
}
if(isset($_SESSION['s_name_of_user']))
{
	header("location:s_profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<head>
  <title>Faculty Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <div class="navbar">
  <a >Quiz Management System</a>
  <a class="active" href="index.html">Home</a>
  <a href="s_login.php">Student</a>
 
  <a href="index.html" style="float:right">Login</a>
</div>

<br>
<br>
<br>
<br>
	<script type="text/javascript">
		function preventBack()
		{
			window.history.forward();
		}
		setTimeout("preventBack()",0);
		window.onunload = function(){null}; 
	</script>
	<title>Faculty Login Page</title>
	<style type="text/css">
		input[type="text"]::placeholder	
		{
			text-align: center;
		}
		input[type="password"]::placeholder
		{
			text-align: center;
		}
	</style>
</head>
<body>

	<div class="container">
	<form action="" method="POST" class="form-4">
		<h1>Faculty Login : </h1>
		<p>
		<label for="login">Username or email</label>
		 <input type="text" name="f_username" placeholder="Username" id="f_username"><br/><br/>
		</p>
		 <p>
        	<label for="password">Password</label>
		 	<input type="password" name="f_password" placeholder="Password" id="f_password"><br/><br/>
		 </p>
	   <p>
		<input type="checkbox" name="check3" id="check3" onclick="showpword3()"> Show Password<br/><br/>
		<input type="submit" name="f_submit" value="Login">
	   </p>
	</form>
</div>
	<script type="text/javascript">
		function showpword3()
		{
			var x = document.getElementById('f_password');
			if(x.type == "password")
			{
				x.type = "text";
			}
			else
			{
				x.type = "password";
			}
		}
	</script>
</body>
</html>

<?php

if(isset($_POST['f_submit']))
{
	$f_uname = $_POST['f_username'];
	$f_uname = trim($f_uname," ");
	$f_pword = $_POST['f_password'];
	 
	$sql = "select * from login where username='".$f_uname."' and password='".$f_pword."' and type='t';";

	$result = $con->query($sql);

	if($result->num_rows == 1)
	{
		$row = $result->fetch_assoc();
		$_SESSION['f_name_of_user'] = $f_uname;
		$_SESSION['f_password_of_user'] = $f_pword;
		$_SESSION['f_sr_of_user'] = $row['sr'];
		header("location:f_profile.php");
	}
	else
	{
		echo "Login Failed";
	}
}

?>