<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<link rel="icon" href="images/logo.jpg">
	<link rel="stylesheet" href="css/table-style.css">
	<link rel="stylesheet" href="css/committee-style.css">
</head>
<body>

<?php
require('connect.php');
?>
<div class="upper_buttons">
<a href="admin_landing.php"> Back </a>
</div>

<div class="informations">
<div class="topic">
<h2>Committee table</h2>
</div>

<table class="table-style">
	<tr>
	<th> Photo </th>
	<th> Name </th>
	<th> Position </th>
	<th> Phone number </th>
	</tr>
<?php
	$sql = "SELECT * FROM committee JOIN voter ON committee.nid=voter.nid JOIN position ON committee.p_id=position.p_id";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<tr><td><img src='voter_images/" . $row['photo'] . "' width='120px' height='120px'></td><td>" . $row["name"] . "</td><td>" . $row["title"] . "</td><td>" . $row["phone_number"] . "</td></tr>";
		}
	}
?>
</table>
</div>
	
</body>
</html>