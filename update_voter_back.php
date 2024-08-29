<?php
require('connect.php');
require('admin_check.php');

	$nid = $_POST['nid'];
	$new_name = $_POST['new_name'];
	$f_new_name = $_POST['f_new_name'];
	$m_new_name = $_POST['m_new_name'];
	$new_phone_number = $_POST['new_phone_number'];
	$new_photo = $_POST['new_photo'];
	$new_address = $_POST['new_address'];
	$dob = $_POST['dob'];
	
	$new_name = strtoupper($new_name);
	$f_new_name = strtoupper($f_new_name);
	$m_new_name = strtoupper($m_new_name);
	$new_address = strtolower($new_address);
	$x = 0;
	
	$sql = "SELECT * FROM voter WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if(!$found)
	{
		$update_message="Nid is invalid!";
		header("location:voters.php?update_message=$update_message");
		exit();
	}
	
	if(strlen($new_phone_number))
	{
		if($new_phone_number[0]!='0' || $new_phone_number[1]!='1' || strlen($new_phone_number)!=11)
		{
			$update_message="Phone number is invalid!";
			header("location:voters.php?update_message=" . urlencode($update_message));
			exit();
		}
		
		
		if($new_phone_number[0]!='0' || $new_phone_number[1]!='1' || strlen($new_phone_number)!=11)
		{
			$update_message="Please provide a bangladeshi phone number!";
			header("location:voters.php?update_message=" . urlencode($update_message));
			exit();
		}
	}
	
	if(strlen($new_name))
	{
		if(($new_name[$i]<'A' || $new_name[$i]>'Z') && ($new_name[$i]!=' ') && ($new_name[$i]!='-') && ($new_name[$i]!='.'))
		{
			$update_message="New name is invalid!";
			header("location:voters.php?update_message=" . urlencode($update_message));
			exit();
		}
		
		$sql = "UPDATE voter SET name='$new_name' WHERE nid='$nid'";
		$sql_query = mysqli_query($con, $sql);
		$x++;
	}
	
	if(strlen($f_new_name))
	{
		if(($f_new_name[$i]<'A' || $f_new_name[$i]>'Z') && ($f_new_name[$i]!=' ') && ($f_new_name[$i]!='-') && ($f_new_name[$i]!='.'))
		{
			$update_message="New name is invalid!";
			header("location:voters.php?update_message=" . urlencode($update_message));
			exit();
		}
		
		$sql = "UPDATE voter SET f_name='$f_new_name' WHERE nid='$nid'";
		$sql_query = mysqli_query($con, $sql);
		$x++;
	}
	
	if(strlen($m_new_name))
	{
		if(($m_new_name[$i]<'A' || $m_new_name[$i]>'Z') && ($m_new_name[$i]!=' ') && ($m_new_name[$i]!='-') && ($m_new_name[$i]!='.'))
		{
			$update_message="New name is invalid!";
			header("location:voters.php?update_message=" . urlencode($update_message));
			exit();
		}
		
		$sql = "UPDATE voter SET m_name='$m_new_name' WHERE nid='$nid'";
		$sql_query = mysqli_query($con, $sql);
		$x++;
	}
	
	if(strlen($new_phone_number))
	{
		$sql = "UPDATE voter SET phone_number='$new_phone_number' WHERE nid='$nid'";
		$sql_query = mysqli_query($con, $sql);
		$x++;
	}
	
	if(strlen($dob))
	{
		$sql = "UPDATE voter SET dob='$dob' WHERE nid='$nid'";
		$sql_query = mysqli_query($con, $sql);
		$x++;
	}
	
	if($new_photo)
	{
		$sql = "UPDATE voter SET photo='$new_photo' WHERE nid='$nid'";
		$sql_query = mysqli_query($con, $sql);
		$x++;
	}
	
	if(strlen($new_address))
	{
		$sql = "UPDATE voter SET address='$new_address' WHERE nid='$nid'";
		$sql_query = mysqli_query($con, $sql);
		$x++;
	}
	
	if($x) $update_message="Successfully updated";
	else $update_message="Nothing updated";
	header("location:voters.php?update_message=$update_message");
	exit();
?>