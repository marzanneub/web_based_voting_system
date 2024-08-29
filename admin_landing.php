<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="css/admin_landing-style.css">
</head>
<body>
<?php
	require('admin_check.php');
?>
<div class="upper_buttons">
<a href="logout.php"> Logout </a>
</div>

<div class="buttons">
<a href="voters.php"> Voters </a>
</br>
<a href="voters_approval.php"> Registration approvals </a>
</br>
<a href="election.php"> Election </a>
</br>
<?php
	$sql = "SELECT * FROM voting";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if(!$found) echo'<a href="result.php"> Result </a>';
?>
</br>
<a href="Committee.php"> Committee </a>
</div>

	
</body>
</html>