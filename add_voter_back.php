<?php
require('connect.php');
require('admin_check.php');

	$nid = $_POST['nid'];
	$name = $_POST['name'];
	$f_name = $_POST['f_name'];
	$m_name = $_POST['m_name'];
	$phone_number = $_POST['phone_number'];
	$dob = $_POST['dob'];
	$photo = $_POST['photo'];
	$address = $_POST['address'];
	
	$name = strtoupper($name);
	$f_name = strtoupper($f_name);
	$m_name = strtoupper($m_name);
	$address = strtolower($address);
	
	$sql = "SELECT * FROM voter WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		$s_message="This id is already exists!";
		header("location:voters.php?s_message=" . urlencode($s_message));
		exit();
	}
	
	if(!strlen($photo))
	{
		$photo = 'default.png';
	}
	
	for($i=0; $i<strlen($nid); $i++)
	{
		if($nid[$i]<'0' || $nid[$i]>'9')
		{
			$s_message="NID is invalid!";
			header("location:voters.php?s_message=" . urlencode($s_message));
			exit();
		}
	}
	
	for($i=0; $i<strlen($name); $i++)
	{
		if(($name[$i]<'A' || $name[$i]>'Z') && ($name[$i]!=' ') && ($name[$i]!='-') && ($name[$i]!='.'))
		{
			$s_message="Name is invalid!";
			header("location:voters.php?s_message=" . urlencode($s_message));
			exit();
		}
	}
	
	for($i=0; $i<strlen($f_name); $i++)
	{
		if(($f_name[$i]<'A' || $f_name[$i]>'Z') && ($f_name[$i]!=' ') && ($f_name[$i]!='-') && ($f_name[$i]!='.'))
		{
			$s_message="Father's name is invalid!";
			header("location:voters.php?s_message=" . urlencode($s_message));
			exit();
		}
	}
	
	for($i=0; $i<strlen($m_name); $i++)
	{
		if(($m_name[$i]<'A' || $m_name[$i]>'Z') && ($m_name[$i]!=' ') && ($m_name[$i]!='-') && ($m_name[$i]!='.'))
		{
			$s_message="Mother's name is invalid!";
			header("location:voters.php?s_message=" . urlencode($s_message));
			exit();
		}
	}
	
	for($i=0; $i<strlen($phone_number); $i++)
	{
		if($phone_number[$i]<'0' || $phone_number[$i]>'9')
		{
			$s_message="Phone number is invalid!";
			header("location:voters.php?s_message=" . urlencode($s_message));
			exit();
		}
	}
	
	if($phone_number[0]!='0' || $phone_number[1]!='1' || strlen($phone_number)!=11)
	{
		$s_message="Please provide last 11 digits of your bangladeshi phone number!";
		header("location:voters.php?s_message=" . urlencode($s_message));
		exit();
	}
	
	
	$sql = "INSERT INTO voter VALUES ('$nid', '$name', '$f_name', '$m_name', '$phone_number', '$dob', '$photo', '$address', '', 0, 0, 0)";
	$sql_query = mysqli_query($con, $sql);
	if($sql_query)
	{
		$s_message="Successfully added!";
		header("location:voters.php?s_message=" . urlencode($s_message));
		exit();
	}
?>