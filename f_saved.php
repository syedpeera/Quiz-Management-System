<!DOCTYPE html>
<html>
<head>
	<title>Que Saved</title>
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

		if(isset($_POST['submit_question']))
		{
			$q =  $_POST['question'];
			$opt1 = $_POST['option1'];
			$opt2 = $_POST['option2'];
			$opt3 = $_POST['option3'];
			$opt4 = $_POST['option4'];
			$arr = array($opt1,$opt2,$opt3,$opt4);
			$temp = implode(",", $arr);
			
			$correct_opt = $_POST['correct_ans'];

			$branch = $_SESSION['branch'];
			
			$test_no = $_SESSION['current_test_no'];

			$sql = "insert into questions(question,options,answer,branch,test_no) values('".$q."','".$temp."','".$correct_opt."','".$branch."','".$test_no."');";

			$result = $con->query($sql);

			if($result === true)
			{
				echo "Question Added Successfully<br><br>";
				echo "<button type='button' class='btn btn-primary'><a href='f_setquestions.php'>Add another question</a></button><br><br>";
			}
			else
			{
				echo "Database not effected";
			}	
		}
		else
		{
			header("location:f_login.php");
		}
	?>
	
</body>
</html>