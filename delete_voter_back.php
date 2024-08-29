<?php
require('connect.php');
require('admin_check.php');

	$nid = $_POST['nid'];
	
	for($i=0; $i<strlen($nid); $i++)
	{
		if($nid[$i]<'0' || $nid[$i]>'9')
		{
			$s_message="NID is invalid!";
			header("location:voters.php?delete_message=" . urlencode($s_message));
			exit();
		}
	}

	$sql = "SELECT * FROM voter WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if(!$found)
	{
		$delete_message="Voter not found!";
		header("location:voters.php?delete_message=$delete_message");
		exit();
	}
	
	$sql = "SELECT * FROM candidate WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if(!$found)
	{
		$delete_message="You cannot delete the voter, because he is a candidate of a position!";
		header("location:voters.php?delete_message=$delete_message");
		exit();
	}
	
	$sql = "DELETE FROM voter WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	if($sql_query)
	{	
		$delete_message="Successfully deleted";
		header("location:voters.php?delete_message=$delete_message");
		exit();
	}
	else
	{
		$delete_message="Error";
		header("location:voters.php?delete_message=$delete_message");
		exit();
	}
	
?>