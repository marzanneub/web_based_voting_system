<?php
require('connect.php');
require('admin_check.php');
	
	$sql = "DELETE FROM voting";
	$sql_query = mysqli_query($con, $sql);
	
	$sql = "DELETE FROM result";
	$sql_query = mysqli_query($con, $sql);
	
	$sql = "DELETE FROM committee";
	$sql_query = mysqli_query($con, $sql);
	
	$sql = "SELECT * FROM candidate";
	$sql_query = mysqli_query($con, $sql);
	
	while($row = mysqli_fetch_assoc($sql_query))
	{
		$nid = $row['nid'];
		$p_id = $row['p_id'];
		
		$sql2 = "SELECT * FROM vote WHERE nid_c='$nid'";
		$sql_query2 = mysqli_query($con, $sql2);
		$found2 = mysqli_num_rows($sql_query2);
		
		$sql2 = "INSERT INTO result VALUES('$nid', '$p_id', '$found2')";
		$sql_query2 = mysqli_query($con, $sql2);
	}
	
	$sql = "DELETE FROM candidate";
	$sql_query = mysqli_query($con, $sql);
	
	$sql = "DELETE FROM vote";
	$sql_query = mysqli_query($con, $sql);
	
	$sql = "SELECT * FROM result ORDER BY votes DESC";
	$sql_query = mysqli_query($con, $sql);
	
	while($row = mysqli_fetch_assoc($sql_query))
	{
		$nid = $row['nid'];
		$p_id = $row['p_id'];
		
		$sql2 = "SELECT * FROM committee WHERE p_id='$p_id'";
		$sql_query2 = mysqli_query($con, $sql2);
		$found2 = mysqli_num_rows($sql_query2);
		
		if(!$found2)
		{
			$sql2 = "INSERT INTO committee VALUES('$nid', '$p_id')";
			$sql_query2 = mysqli_query($con, $sql2);
		}
	}
	
	if($sql_query)
	{
		$s_message="Successfully stopped!";
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