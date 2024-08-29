<?php
require('connect.php');
require('admin_check.php');

	$nid = $_POST['nid5'];
	
	$sql = "SELECT * FROM candidate WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if(!$found)
	{
		$s_message="Invalid nid!";
		header("location:election.php?delete2_message=" . urlencode($s_message));
		exit();
	}
	
	$sql = "DELETE FROM candidate WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	if($sql_query)
	{
		$s_message="Successfully removed!";
		header("location:election.php?delete2_message=" . urlencode($s_message));
		exit();
	}
	else
	{
		$s_message="Error!";
		header("location:election.php?delete2_message=" . urlencode($s_message));
		exit();
	}
?>