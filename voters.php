<?php
require('admin_check.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Voters</title>
	<link rel="icon" href="images/logo.jpg">
	<link rel="stylesheet" href="css/table-style.css">
    <link rel="stylesheet" href="css/voters-style.css">
</head>
<body>

<div class="upper_buttons">
<a href="admin_landing.php"> Back </a>
<a href="logout.php"> Logout </a>
</div>

<div class="form">
<h3> Add voter </h3>
<form action="add_voter_back.php" method="POST">
	<input type="text" name="nid" placeholder="National ID" required="">
	<input type="text" name="name" placeholder="Name" required="">
	<input type="text" name="f_name" placeholder="Father's name" required="">
	<input type="text" name="m_name" placeholder="Mother's name" required="">
	<input type="text" name="phone_number" placeholder="Phone number" required="">
	<input type="date" id="dob" name="dob" required=""><br>
	<label>Passport size jpeg photo:</label>
	<input type="file" id="photo" name="photo">
	<input type="text" name="address" placeholder="Address" required="">
	<button> Add </button>
</form>
</div>
<?php if(isset($_GET['s_message'])) { ?>
			<div class="message"><?php echo $_GET['s_message']; ?></div>
<?php } ?>

<div class="form">
<h3> Update voter information</h3>
<form action="update_voter_back.php" method="POST">
	<input type="text" name="nid" placeholder="National ID" required="">
	<input type="text" name="new_name" placeholder="New name">
	<input type="text" name="f_new_name" placeholder="Father's new name">
	<input type="text" name="m_new_name" placeholder="Mother's new name">
	<input type="text" name="new_phone_number" placeholder="New phone number">
	<input type="date" id="dob" name="dob" required=""><br>
	<label>New passport size jpeg photo:</label>
	<input type="file" id="new_photo" name="new_photo">
	<input type="text" name="new_address" placeholder="New address">
	<button> Update </button>
</form>
</div>
<?php if(isset($_GET['update_message'])) { ?>
			<div class="message"><?php echo $_GET['update_message']; ?></div>
<?php } ?>
</br>

<div class="form">
<h3>Delete voter</h3>
<form action="delete_voter_back.php" method="POST">
	<input type="text" name="nid" placeholder="National ID" required="">
	<button> Delete </button>
</form>
</div>
<?php if(isset($_GET['delete_message'])) { ?>
			<div class="message"><?php echo $_GET['delete_message']; ?></div>
<?php } ?>
</br>

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
	<th> Date of birth </th>
	<th> Address </th>
	</tr>
<?php
	$sql = "SELECT * FROM voter";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<tr><td><img src='voter_images/" . $row['photo'] . "' width='120px' height='120px'></td><td>" . $row["nid"] . "</td><td>" . $row["name"] . "</td><td>" . $row["f_name"] . "</td><td>" . $row["m_name"] . "</td><td>" . $row["phone_number"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["address"] . "</td></tr>";
		}
	}
?>
</table>
	
</body>
</html>