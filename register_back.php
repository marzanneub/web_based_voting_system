<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
require('connect.php');
require('auto_login.php');

	$nid = $_POST['nid'];
	$dob = $_POST['dob'];
	$phone_number = $_POST['phone_number'];
	$pw1 = $_POST['pw1'];
	$pw2 = $_POST['pw2'];
	
	for($i=0; $i<strlen($nid); $i++)
	{
		if($nid[$i]<'0' || $nid[$i]>'9')
		{
			$message="NID is invalid!";
			header("location:register.php?message=" . urlencode($s_message));
			exit();
		}
	}
	
	for($i=0; $i<strlen($phone_number); $i++)
	{
		if($phone_number[$i]<'0' || $phone_number[$i]>'9')
		{
			$s_message="Phone number is invalid!";
			header("location:register.php?s_message=" . urlencode($s_message));
			exit();
		}
	}
	
	if(strlen($pw1)<8)
	{
		$message="Password contains at least 8 characters!";
		header("Location: register.php?message=$message");
		exit();
	}
	
	if($pw1!=$pw2)
	{
		$message="Password doesn't matched!";
		header("Location: register.php?message=$message");
		exit();
	}
	
	$sql = "SELECT * FROM voter WHERE nid='$nid' AND dob='$dob' AND phone_number='$phone_number'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if(!$found)
	{
		$message="Information doesn't matched!";
		header("Location: register.php?message=$message");
		exit();
	}
	else
	{
		$rows = mysqli_fetch_assoc($sql_query);
		if($rows['registration']==1)
		{
			$message="This id is already registered!";
			header("Location: register.php?message=$message");
			exit();
		}
		
		$sql = "UPDATE voter SET password = '$pw1', registration = '1' WHERE nid = '$nid'";
		$sql_query = mysqli_query($con, $sql);
		
		if($sql_query)
		{
			$message="Successfully registered";
			header("Location: index.php?message=" . urlencode($message));
			exit();
		}
		else
		{
			$message="Error!";
			header("Location: register.php?message=$message");
			exit();
		}
	}
?>


</body>
</html>