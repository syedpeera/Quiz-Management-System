
<!DOCTYPE html>
<html>
<head>
	<title>Set Test</title>
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
		?>
    	<center><p style="font-size: 2em;color: white;"><?php
		echo "Welcome, ".$_SESSION['f_name_of_user']."</center><br><br>";
		?></p>
    	<?php
	}
	else
	{
		header("location:f_login.php");
	}

	if(isset($_SESSION['current_test_no']))
	{
		header("location:f_setquestions.php");
	}
?>
	<form action="" method="post">
		<h5>Enter the name of the test : <input type="text" name="test_name" required></h5><br/>
		<h5>Select one branch for which you want to the questions : 
		<select name="branch" required>
			<option value="CSE">CSE</option>
			<option value="ECE">ECE</option>
			<option value="EEE">EEE</option>
			<option value="MECH">MECH</option>
		</select></h5><br/><br/>
		<h5 style="color: red;">NOTE : The start date and end date should not be same</h5><br/>
		<h5>Set the start date for the test : 
		<input type="date" name="date_of_start_test" required></h5></br></br>
		<h5>Set the end date for the test : 
		<input type="date" name="date_of_end_test" required></h5></br></br>
		<h5>Set the timer in minutes for the test : 
		<input type="text" name="timer" required> Minutes.</h5></br>
		<input type="submit" name="set_test_name" value="set test name">
	</form>
	
</body>
</html>

<?php
	if($_POST['set_test_name'])
	{
		$t_name = $_POST['test_name'];
		$branch = $_POST['branch'];
		$timer = (int)$_POST['timer'];

		$date_of_start_test = strtotime($_POST['date_of_start_test']);
		$date_of_end_test = strtotime($_POST['date_of_end_test']);

		$_SESSION['branch'] = $branch;
		$sql0 = "select test_name from test where test_name = '".$t_name."';";
		$result0 = $con->query($sql0);
		if($result0->num_rows > 0)
		{
			echo "<br>A test with the name ".$t_name." already exits";
		}
		else
		{
			$temp_f_sr = $_SESSION['f_sr_of_user'];

		   	$sql1 = "insert into test(test_name,faculty_sr,branch,date_of_start_test,timer,date_of_end_test) values('".$t_name."','".$temp_f_sr."','".$branch."','".$date_of_start_test."','".$timer."','".$date_of_end_test."');";

			$result1 = $con->query($sql1);
			$sql2 = "select * from test where test_name = '".$t_name."';";
			$result2 = $con->query($sql2);
			if ($result2->num_rows > 0) 
			{
		    	if($row = $result2->fetch_assoc())
		    	{
		    		$_SESSION['current_test_no'] = $row['test_no'];
		    		$_SESSION['current_test_name'] = $t_name;
 		    		header("location:f_setquestions.php");
		    	}	
			}
		}
	}
?> 