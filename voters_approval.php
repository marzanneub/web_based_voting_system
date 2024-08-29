<!DOCTYPE html>
<html>
<head>
	<title>Voters approval</title>
	<link rel="icon" href="images/logo.jpg">
	<link rel="stylesheet" href="css/table-style.css">
	<link rel="stylesheet" href="css/voters_approval-style.css">
</head>
<body>
<?php
	require('admin_check.php');
?>

<div class="upper_buttons">
<a href="admin_landing.php"> Back </a>
<a href="logout.php"> Logout </a>
</div>

<?php if(isset($_GET['message'])) { ?>
			<div class="message"><?php echo $_GET['message']; ?></div>
<?php } ?>

<div class="topic">
<h2>Voter table</h2>
</div>

<table class="table-style">
	<tr>
	<th> Photo </th>
	<th> NID </th>
	<th> Name </th>
	<th> Father's name </th>
	<th> Mother's name </th>
	<th> Phone number </th>
	<th> Address </th>
	<th> Approval </th>
	</tr>
<?php
	$sql = "SELECT * FROM voter WHERE approve='0' AND registration='1'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<tr><td><img src='voter_images/" . $row['photo'] . "' width='50px' height='50px'></td><td>" . $row["nid"] . "</td><td>" . $row["name"] . "</td><td>" . $row["f_name"] . "</td><td>" . $row["m_name"] . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["address"] . "</td><td><a href='voter_approve_back.php?nid=" . $row["nid"] . "'?> Approve </a></td></tr>";
		}
	}
?>

<?php
	$sql = "SELECT * FROM voter WHERE approve='1' AND registration='1'";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<tr><td><img src='voter_images/" . $row['photo'] . "' width='50px' height='50px'></td><td>" . $row["nid"] . "</td><td>" . $row["name"] . "</td><td>" . $row["f_name"] . "</td><td>" . $row["m_name"] . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["address"] . "</td><td><a href='voter_disapprove_back.php?nid=" . $row["nid"] . "'?> Disapprove </a></td></tr>";
		}
	}
?>
</table>

	
</body>
</html>