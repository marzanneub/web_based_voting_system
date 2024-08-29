<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="images/logo.png">
	<link rel="stylesheet" href="login-style.css">
</head>
<body>

<?php
require('connect.php');

	$id = $_POST['nid'];
	$pw = $_POST['password'];
	
	
	$sql = "SELECT * FROM admin WHERE admin_id='$id' AND password='$pw' ";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
		
	if($found)
	{
		$sql = "UPDATE admin SET login='1' WHERE admin_id='$id'";
		$sql_query = mysqli_query($con, $sql);
		
		header("location:admin_landing.php?admin_id="  . urlencode($id));
		exit();
	}
	
	$sql = "SELECT * FROM voter WHERE nid='$id' AND password='$pw' AND approve='0'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
		
	if($found)
	{	
		$message="Your account is not approved!";
		header("location:index.php?message=" . urlencode($message));
		exit();
	}
	
	$sql = "SELECT * FROM voter WHERE nid='$id' AND password='$pw' AND approve='1'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
		
	if($found)
	{
		$sql = "UPDATE voter SET login='1' WHERE nid='$id'";
		$sql_query = mysqli_query($con, $sql);
		
		header("location:voter_landing.php?voter_id="  . urlencode($id));
		exit();
	}
	
	$message="Incorrect user id or password";
	header("Location: index.php?message=" . urlencode($message));
	exit();
	
?>


</body>
</html>