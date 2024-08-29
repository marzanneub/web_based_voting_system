<?php
require('connect.php');
require('voter_check.php');

	$nid_c = $_POST['nid_c'];
	$p_id = $_POST['p_id'];
	
	$sql = "SELECT * FROM position WHERE p_id='$p_id'";
	$sql_query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($sql_query);
	$title = $row['title'];
	
	if($nid_c==0)
	{
		$s_message="Please select a candidate!";
		header("location:voting.php?vote_message=" . urlencode($s_message));
		exit();
	}
	
	$sql = "INSERT INTO vote VALUES ('$nid', '$nid_c', '$p_id')";
	$sql_query = mysqli_query($con, $sql);
	
	if($sql_query)
	{
		$s_message="$title Vote successful";
		header("location:voting.php?vote_message=" . urlencode($s_message));
		exit();
	}
	else
	{
		$s_message="Error!";
		header("location:voting.php?vote_message=" . urlencode($s_message));
		exit();
	}
?>