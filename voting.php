<!DOCTYPE html>
<html>
<head>
	<title>Voting page</title>
	<link rel="icon" href="images/logo.jpg">
	<link rel="stylesheet" href="css/table-style.css">
	<link rel="stylesheet" href="css/voting-style.css">
</head>
<body>
<?php
	require('voter_check.php');
?>

<div class="upper_buttons">
<a href="voter_landing.php"> back </a>
<a href="logout.php"> Logout </a>
</div>

<?php if(isset($_GET['vote_message'])) { ?>
			<div class="message"><?php echo $_GET['vote_message']; ?></div>
<?php } ?>

<div class="form">
<?php
	$sql = "SELECT * FROM position";
	$sql_query = mysqli_query($con, $sql);
	
	while($row=mysqli_fetch_assoc($sql_query))
	{
		$p_id = $row['p_id'];
		$title = $row['title'];
		
		$sql2 = "SELECT * FROM candidate JOIN voter ON candidate.nid=voter.nid WHERE p_id='$p_id'";
		$sql_query2 = mysqli_query($con, $sql2);
		$found2 = mysqli_num_rows($sql_query2);
		
		$sql3 = "SELECT * FROM vote WHERE p_id='$p_id' AND nid='$nid'";
		$sql_query3 = mysqli_query($con, $sql3);
		$found3 = mysqli_num_rows($sql_query3);
		
		if($found2 && !$found3)
		{
			echo "<h3>$title : </h3>";
			echo "<form action='add_vote_back.php' method='POST'>";
			echo "<select id='nid_c' name='nid_c' method='POST'>";
			echo "<option value='0'>--Select a candidate--</option>";
			while($row2=mysqli_fetch_assoc($sql_query2))
			{
				echo "<option value='" . $row2["nid"] . "'>" . $row2["name"] . "</option>";
			}
			echo "</select>";
			echo "<input type='hidden' name='p_id' value='$p_id'>";
			echo "<button> Vote </button>";
			echo "</form>";
		}
		
		//if(!$found2) break;
	}
	
	
?>
</div>
	
</body>
</html>