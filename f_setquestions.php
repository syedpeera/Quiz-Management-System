
<!DOCTYPE html>
<html>
<head>
	<title>Set Questions</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css">
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
	include("connection.php");	
	if(isset($_SESSION['f_name_of_user']))
	{
		echo "Welcome, ".$_SESSION['f_name_of_user']."<br><br>";
		echo "Test Number : ".$_SESSION['current_test_no']."<br><br>";
		echo "Test Name : ".$_SESSION['current_test_name']."<br><br>";
	}
	else
	{
		header("location:f_login.php");
	}
?>
	<b style="color:red;">Don't use comma's,quotes or any other special characters in case of options or in the question : </b><br/><br/>
	<form action="f_saved.php" method="post">
		<p>Question : </p><textarea name="question" id="question" cols="50" rows="10" required>Q)</textarea><br><br>
		Option1 : <input type="text" name="option1" id="option1" required><br><br>
		Option2 : <input type="text" name="option2" id="option2" required><br><br>
		Option3 : <input type="text" name="option3" id="option3" required><br><br>
		Option4 : <input type="text" name="option4" id="option4" required><br><br>
		<p>Select the Correct Choice for the above question : </p> 
		Option1 : <input type="radio" name="correct_ans" required value="1"><br><br>
		Option2 : <input type="radio" name="correct_ans" required value="2"><br><br>
		Option3 : <input type="radio" name="correct_ans" required value="3"><br><br>
		Option4 : <input type="radio" name="correct_ans" required value="4"><br><br>
		<input type="submit" name="submit_question" value="Submit Question">
	</form>
	<a href="f_logout.php">Logout</a>
</body>
</html>