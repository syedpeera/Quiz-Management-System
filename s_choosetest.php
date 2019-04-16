<?php
	session_start();
?>

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
	<?php
		error_reporting(0);
		include("connection.php");
		
		$count=0;

		if(isset($_SESSION['s_name_of_user']))
		{
			$flag_global = 0;
			$temp_flag=0;
            ?>
    		<p style="font-size: 2em;color: white;"><?php
			echo "Welcome, ".$_SESSION['s_name_of_user']."<br/><br/>";
			?></p>
    		<?php

			$sql4 = "select test_name,student_taken_test from test where student_taken_test is null and branch='".$_SESSION['s_branch_of_student']."' and date_of_start_test <= '".time()."' and date_of_end_test >= '".time()."';";

			$result4 = $con->query($sql4);


			if($result4->num_rows > 0)
			{	
				$temp_flag=1;
				echo "<form action='s_profile.php' method='post'>";
				echo "<h4>Select the test you want to take : </h4>";
				echo "<select name='s_test_name'>";
				while($row = $result4->fetch_assoc()) 
				{
					$flag_global=1;
				   echo "<option value='".$row['test_name']."'>".$row['test_name']."</option>";
				}
			}

			$sql5 = "select test_name,student_taken_test from test where student_taken_test is not null and branch='".$_SESSION['s_branch_of_student']."' and date_of_start_test <= '".time()."' and date_of_end_test >= '".time()."';";

			$result5 = $con->query($sql5);
			if($result5->num_rows > 0)
			{
				if($temp_flag==0)
				{
					echo "<form action='s_profile.php' method='post'>";
					echo "<h4>Select the test you want to take : </h4>";
					echo "<select name='s_test_name'>";
				}
				while($row = $result5->fetch_assoc())
				{
					$flag = 0;
					$temp_arr = explode(",",$row['student_taken_test']);

					foreach ($temp_arr as &$value) 
					{
	    				$value = (int)$value;
	    				echo $value."<br/>";
	    				if($value == $_SESSION['s_rollnumber_of_user'])
	    				{
	    					$flag = 1;
	    					break;
	    				}
					}
					if($flag == 0)
					{
						$flag_global=1;
						echo "<option value='".$row['test_name']."'>".$row['test_name']."</option>";	
					}
				}
			}
			if($flag_global != 0)
			{
				echo "</select><br/><br/>";
				echo "<input type='submit' name='take_test' value='Take Test'>";
				echo "</form>";
			}
			if($flag_global == 0) 
			{
				echo "</select><br/><br/>";
				echo "</form>";
				echo "<br/><br/>There are no tests available for you right now.<br/><br/>";
			}	
		}
		else
		{
			header("location:s_login.php");
		}
	?>
	<br/>
	<a href="s_logout.php">Logout</a>
	<script type="text/javascript">
		function fun()
		{
			window.location="s_profile.php";
		}
	</script>
</body>
</html>

