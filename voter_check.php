<?php
require('connect.php');
	
	$sql = "SELECT * FROM voter WHERE login='1'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	$row = mysqli_fetch_assoc($sql_query);
	$nid = $row['nid'];
	
	if(!$found)
	{
		$message="Please login to access this page";
		header("Location: index.php?message=" . urlencode($message));
		exit();
	}
?>