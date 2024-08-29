<?php
require('connect.php');
require('admin_check.php');

	$rank = $_POST['rank_id3'];
	$title = $_POST['title3'];
	$title = strtoupper($title);
	
	if($rank==0)
	{	
		$delete_message="Please select a position!";
		header("location:election.php?update_message=$delete_message");
		exit();
	}
	
	for($i=0; $i<strlen($title); $i++)
	{
		if(($title[$i]<'A' || $title[$i]>'Z') && ($title[$i]!=' '))
		{
			$s_message="Position title is invalid!";
			header("location:election.php?update_message=" . urlencode($s_message));
			exit();
		}
	}
	
	$sql = "UPDATE position SET title='$title' WHERE rank='$rank'";
	$sql_query = mysqli_query($con, $sql);
	
	if($sql_query)
	{	
		$delete_message="Successfully renamed";
		header("location:election.php?update_message=$delete_message");
		exit();
	}
	else
	{
		$delete_message="Error";
		header("location:election.php?update_message=$delete_message");
		exit();
	}
	
?>