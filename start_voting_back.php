<?php
require('connect.php');
require('admin_check.php');
	
	$sql = "INSERT INTO voting VALUES ('1')";
	$sql_query = mysqli_query($con, $sql);
	if($sql_query)
	{
		$s_message="Successfully started!";
		header("location:election.php?start_message=" . urlencode($s_message));
		exit();
	}
	else
	{
		$s_message="Error!";
		header("location:election.php?start_message=" . urlencode($s_message));
		exit();
	}
?>