<?php
require('connect.php');
require('admin_check.php');

	$title = $_POST['title'];
	$rank = $_POST['rank_id'];
	$title = strtoupper($title);
	
	$sql2 = "SELECT * FROM position";
	$sql_query2 = mysqli_query($con, $sql2);
	$found2 = mysqli_num_rows($sql_query2);
	if(!$found2) $rank=1;
	
	for($i=0; $i<strlen($title); $i++)
	{
		if(($title[$i]<'A' || $title[$i]>'Z') && ($title[$i]!=' '))
		{
			$s_message="Position title is invalid!";
			header("location:election.php?s_message=" . urlencode($s_message));
			exit();
		}
	}
	
	if($rank==0)
	{
		$s_message="Please select a rank!";
		header("location:election.php?s_message=" . urlencode($s_message));
		exit();
	}
	
	
	$sql = "SELECT * FROM position WHERE rank>='$rank' ORDER BY rank DESC";
	$sql_query = mysqli_query($con, $sql);
	while($row=mysqli_fetch_assoc($sql_query))
	{
		$rank2 = $row['rank'];
		$rank3 = $rank2;
		$rank2+=1;
		
		$sql2 = "UPDATE position SET rank='$rank2' WHERE rank='$rank3'";
		$sql_query2 = mysqli_query($con, $sql2);
	}
	
	$sql = "INSERT INTO position VALUES ('', '$title', '$rank')";
	$sql_query = mysqli_query($con, $sql);
	if($sql_query)
	{
		$s_message="Successfully added!";
		header("location:election.php?s_message=" . urlencode($s_message));
		exit();
	}
	else
	{
		$s_message="Error!";
		header("location:election.php?s_message=" . urlencode($s_message));
		exit();
	}
?>