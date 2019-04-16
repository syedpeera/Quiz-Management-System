<!DOCTYPE html>
<html>
<head>
	<title>Exam done</title>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>	
		<div class="navbar">
  <a >Quiz Management System</a>
  <a class="active" href="index.html">Home</a>
  <a href="try.php">Faculty</a>
  <a href="s_logout.php" style="float:right">Logout</a>
</div>
	<?php
	session_start();
	error_reporting(0);
	include("connection.php");
		if(isset($_SESSION['s_name_of_user']))
		{
			echo "Welcome, ".$_SESSION['s_name_of_user']."<br/><br/>";

			$sql1 = "select * from login where username='".$_SESSION['s_name_of_user']."' and password='".$_SESSION['s_password_of_user']."' and type='s';";

			$result1 = $con->query($sql1);

			$rollnumber = 0;

			if($result1->num_rows > 0)
			{
				$rollnumber = $_SESSION['s_rollnumber_of_user'];
			}
			 
			echo $GLOBALS['student_branch'];

			$sql = "select answer from questions where branch = '".$_SESSION['student_branch']."' and test_no = '".$_SESSION['test_no_currently_taken']."';";

			$marks=0;

			$result = $con->query($sql);
			$i=1;

			if ($result->num_rows > 0) 
			{
		      		while($row = $result->fetch_assoc()) 
		      		{
		      			if($_POST[$i] == $row['answer'])
		      			{
		      				$marks++;
		      			}
		        		$i++;
		        	}

		        $sql2 = "insert into result(rollnumber,marks,test_no) values('".$rollnumber."','".$marks."','".$_SESSION['test_no_currently_taken']."');";
		        $result2 = $con->query($sql2);

		        if($result2 === true)
		        {
		        	echo "marks are : $marks<br><br>";
		        	$sql5 = "select student_taken_test from test where test_no='".$_SESSION['test_no_currently_taken']."';";
		        	$result5 = $con->query($sql5);

		        	if(is_null($result5))
		        	{
		        		$arr = array($_SESSION['s_rollnumber_of_user']);
						$temp = implode(",", $arr);
						$sql6 = "update test set student_taken_test='".$temp."' WHERE test_no='".$_SESSION['test_no_currently_taken']."';";
						$result6 = $con->query($sql6);
		        	}
		        	else
		        	{
		        		$sql7 = "select student_taken_test from test where test_no='".$_SESSION['test_no_currently_taken']."';";
		        		$result7 = $con->query($sql7);
		        		$row = $result7->fetch_assoc();
		      			$temp_arr = explode(",",$row['student_taken_test']);
		      			$len = sizeof($temp_arr);
		      			$temp_arr[$len] = $_SESSION['s_rollnumber_of_user'];
		      			$temp = implode(",", $temp_arr);
		      			$sql8 = "update test set student_taken_test='".$temp."' WHERE test_no='".$_SESSION['test_no_currently_taken']."';";
		      			$result8 = $con->query($sql8);
		        	}
		        	echo "Test Completed Successfully (your responses have been recorded).<br/><br/>";
		        }
	    	} 
			else
			{
				echo "Test Unsuccessfull";
			}
		}
		else
		{
			header("location:s_login.php");
		}
	?>
	<a href="s_logout.php">Logout</a>
</body>
</html>
