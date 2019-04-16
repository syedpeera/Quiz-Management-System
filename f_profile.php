

<!DOCTYPE html>
<html>
<head>
	<title>Faculty Profile Page</title>
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
  
  <a href="f_logout.php" style="float:right">Logout</a>
</div>
<?php
	session_start();
	error_reporting(0);
	
	if(isset($_SESSION['f_name_of_user']))
	{
		?>
    	<p style="font-size: 2em;color: white;"><?php
		echo "Welcome, ".$_SESSION['f_name_of_user']."<br><br>";
		?></p>
    	<?php
	}
	else
	{
		header("location:f_login.php");
	}
?>
	<form action="f_checkresult.php" method="post">
		<input type="submit" name="check_result" value="Check Result">
	</form>
	<form action="f_settest.php" method="post">
		<input type="submit" name="set_question" value="Set Question">
	</form>
</body>
</html>