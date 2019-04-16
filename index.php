<?php
	session_start();
	error_reporting(0);

	if(isset($_SESSION['s_name_of_user']))
	{
		header("location:s_profile.php");
	}
	if(isset($_SESSION['f_name_of_user']))
	{
		header("location:f_profile.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function preventBack()
		{
			window.history.forward();
		}
		setTimeout("preventBack()",0);
		window.onunload = function() {null};
	</script>
	<title>Quiz</title>
</head>
<body>
	<h1>Quiz Management System</h1>
	<h3>Who are you?</h3>
	<a href="f_login.php">Faculty</a>
	<a href="s_login.php">Student</a>
</body>
</html>