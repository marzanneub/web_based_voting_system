<?php
require('connect.php');
require('admin_check.php');

	$rank = $_POST['rank_id2'];
	if($rank==0)
	{	
		$delete_message="Please select a position!";
		header("location:election.php?delete_message=$delete_message");
		exit();
	}
	
	$sql = "SELECT * FROM position WHERE rank='$rank'";
	$sql_query = mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($sql_query);
	$p_id = $row['p_id'];
		
	$sql2 = "SELECT * FROM candidate WHERE p_id='$p_id'";
	$sql_query2 = mysqli_query($con, $sql2);
	$found = mysqli_num_rows($sql_query2);
	if($found)
	{	
		$delete_message="Your cannot delete this position, because there have some candidates!";
		header("location:election.php?delete_message=$delete_message");
		exit();
	}
	
	$sql2 = "SELECT * FROM result WHERE p_id='$p_id'";
	$sql_query2 = mysqli_query($con, $sql2);
	$found = mysqli_num_rows($sql_query2);
	if($found)
	{	
		$delete_message="Your cannot delete this position, because there is some results in the result sheet!";
		header("location:election.php?delete_message=$delete_message");
		exit();
	}
	
	$sql2 = "SELECT * FROM committee WHERE p_id='$p_id'";
	$sql_query2 = mysqli_query($con, $sql2);
	$found = mysqli_num_rows($sql_query2);
	if($found)
	{	
		$delete_message="Your cannot delete this position, because there is a person in committee!";
		header("location:election.php?delete_message=$delete_message");
		exit();
	}
	
	$sql = "DELETE FROM position WHERE rank='$rank'";
	$sql_query = mysqli_query($con, $sql);
	
	$sql = "SELECT * FROM position WHERE rank>='$rank' ORDER BY rank ASC";
	$sql_query = mysqli_query($con, $sql);
	while($row=mysqli_fetch_assoc($sql_query))
	{
		$rank2 = $row['rank'];
		$rank3 = $rank2;
		$rank2-=1;
		
		$sql2 = "UPDATE position SET rank='$rank2' WHERE rank='$rank3'";
		$sql_query2 = mysqli_query($con, $sql2);
	}
	
	if($sql_query)
	{	
		$delete_message="Successfully deleted";
		header("location:election.php?delete_message=$delete_message");
		exit();
	}
	else
	{
		$delete_message="Error";
		header("location:election.php?delete_message=$delete_message");
		exit();
	}
	
?>