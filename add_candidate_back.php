<?php
require('connect.php');
require('admin_check.php');

	$nid = $_POST['nid4'];
	$p_id = $_POST['p_id4'];
	
	$sql = "SELECT * FROM voter WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($p_id==0)
	{
		$s_message="Please select a position!";
		header("location:election.php?s2_message=" . urlencode($s_message));
		exit();
	}
	
	if(!$found)
	{
		$s_message="Invalid nid!";
		header("location:election.php?s2_message=" . urlencode($s_message));
		exit();
	}
	
	$sql = "SELECT * FROM candidate WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		$s_message="He is already a candidate!";
		header("location:election.php?s2_message=" . urlencode($s_message));
		exit();
	}
	
	$sql = "INSERT INTO candidate VALUES ('$nid', '$p_id')";
	$sql_query = mysqli_query($con, $sql);
	if($sql_query)
	{
		$s_message="Successfully added!";
		header("location:election.php?s2_message=" . urlencode($s_message));
		exit();
	}
	else
	{
		$s_message="Error!";
		header("location:election.php?s2_message=" . urlencode($s_message));
		exit();
	}
?>