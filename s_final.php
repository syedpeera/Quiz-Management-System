<?php
session_start();
$from_time1 = date('Y-m-d H:i:s');
$to_time1 = $_SESSION['end_time'];

$time_first = strtotime($from_time1);
$time_second = strtotime($to_time1);

$differenceinseconds = $time_second - $time_first;

if($differenceinseconds <= 0)
{
	echo "-1";
}
else
{
	echo gmdate("H:i:s",$differenceinseconds);	
}
?>