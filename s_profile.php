<!DOCTYPE html>
<html>
<head>
	<title>Student Profile Page</title>
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
  
  <a href="s_logout.php" style="float:right">Logout</a>
</div>
<h1><div id="response"></div></h1>
	<?php
		session_start();
		error_reporting(0);
		include("connection.php");
		
		$count=0;

		if(isset($_SESSION['s_name_of_user']))
		{
			?>
    		<p style="font-size: 1.5em;color: white;text-align: center;"><?php
			echo "Welcome, ".$_SESSION['s_name_of_user']."<br/><br/>";
			?></p>
    		<?php

				$_SESSION['s_test_name'] = $_POST['s_test_name'];

			?>
    		<p style="font-size: 1.5em;color: white;"><?php
			echo "<center>Test Name : ".$_SESSION['s_test_name']."</center><br/><br/>";
			?></p>
    		<?php

			$sql3 = "select test_no from test where test_name='".$_SESSION['s_test_name']."';";

			$result3 = $con->query($sql3);

			$row = $result3->fetch_assoc();
			$test_no_taken = $row['test_no'];
			$_SESSION['test_no_currently_taken'] = $row['test_no'];


				$sql9 = "select timer from test where test_name = '".$_SESSION['s_test_name']."' and test_no = '".$_SESSION['test_no_currently_taken']."'";

				$result9 = $con->query($sql9);
			
				$row9 = $result9->fetch_assoc();

				$duration = $row9['timer'];

				$_SESSION['duration'] = $duration;
				$_SESSION['start_time'] = date("Y-m-d H:i:s");

				$end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));

				$_SESSION['end_time'] = $end_time;

			echo "<center>No negative marking attempt all the questions</center><br/><br/>";

		echo "<center><b style='color:red;'>NOTE : Don't Logout until you have given the test</b></center><br/><br/>";
			 
			$sql2 = "select * from login where sr = '".$_SESSION['s_rollnumber_of_user']."';";

			$result2 = $con->query($sql2);
			
			$row2 = $result2->fetch_assoc();

			$student_branch = $row2['s_branch'];

			$_SESSION['student_branch'] = $student_branch;

			$sql = "select * from questions where branch = '".$student_branch."' and test_no='".$test_no_taken."';";

			$result = $con->query($sql);
			$i=1;

			if ($result->num_rows > 0) 
			{

				echo "<form action='s_check.php' method='post'>";
				$original_answers = array();
		      		while($row = $result->fetch_assoc()) 
		      		{
		      			$str = $row['options'];

		      			$original_answers[$i-1] = $row['answer']; 

		      			$temp_arr = explode(",",$str);

		        		echo $row['question']. "<br/><br/>";

		        		echo "<input type='radio' name='$i' value='1' required> $temp_arr[0]<br><br>";

		        		echo "<input type='radio' name='$i' value='2' required> $temp_arr[1]<br><br>";
		        		
		        		echo "<input type='radio' name='$i' value='3' required> $temp_arr[2]<br><br>";

		        		echo "<input type='radio' name='$i' value='4' required> $temp_arr[3]<br><br>";

		        		$i++;
		        		$count++;
		        	}
		        echo "<input type='submit' name='submit_test' value='Submit Test' id='hit'>";
		        echo "</form>";
	    	} 
			else
			{
				echo "No Questions are set by the faculty to take the test.<br/><br/>";
			}
		}
		else
		{
			header("location:s_login.php");
		}
	?>
	<a href="s_logout.php">Logout</a>
	<script type="text/javascript">
		setInterval(function()
		{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","s_final.php",false);
			xmlhttp.send(null);
			if(parseInt(xmlhttp.responseText) < 0)
			{
				document.getElementById('hit').click();
			}
			document.getElementById("response").innerHTML = xmlhttp.responseText;
		},1000);
	</script>
</body>
</html>