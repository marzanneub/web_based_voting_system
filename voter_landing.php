<!DOCTYPE html>
<html>
<head>
	<title>Voter Panel</title>
	<link rel="icon" href="images/logo.jpg">
	<link rel="stylesheet" href="css/table-style.css">
	<link rel="stylesheet" href="css/voter_landing-style.css">
</head>
<body>
<?php
	require('voter_check.php');
?>
<div class="upper_buttons">
<a href="logout.php"> Logout </a>
</div>

<div class="informations">
<?php
	$sql = "SELECT * FROM voter WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($sql_query);
	$imageData = $row['photo'];
	
	echo "<img src='voter_images/" . $row['photo'] . "' width='200px' height='200px'></br>"; 
	echo "National ID : $row[nid]</br>";
	echo "Name : $row[name]</br>"; 
	echo "Father's name : $row[f_name]</br>"; 
	echo "Mother's name : $row[m_name]</br>"; 
	echo "Phone number : $row[phone_number]</br>";
	echo "Date of birth : $row[dob]</br>"; 
?>
</div>

<div class="buttons">
<?php

	$sql = "SELECT * FROM voting";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found) echo '<a href="voting.php"> Go to vote </a>';
	else echo'<a href="result.php"> Result </a>';
?>
</br>
<a href="Committee.php"> Committee </a>
</div>

	
</body>
</html>