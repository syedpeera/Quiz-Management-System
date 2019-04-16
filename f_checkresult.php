
<!DOCTYPE html>
<html>
<head>
	<title>result</title>
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
	}
	else
	{
		header("location:f_login.php");
	}
?>

<?php

	if(isset($_POST['check_result']))
	{
		$sql = "select  * from result;";
		
		$result = $con->query($sql);

		if ($result->num_rows > 0) 
		{
			echo "<table border='1'><tr><th>Sid</th><th>Roll Number</th><th>Marks</th><th>Test_No</th></tr>";
	    	while($row = $result->fetch_assoc()) 
	    	{
	    		echo "<tr><td>".$row['sr_r']."</td><td>".$row['rollnumber']."</td><td>".$row['marks']."</td></td><td>".$row['test_no']."</td></tr>";
	    	}
	    	echo "</table>";
		} 
		else 
		{
	    	echo "No student has taken the test";
		}
	}
	
	

?>

</body>
</html>