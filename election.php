<!DOCTYPE html>
<html>
<head>
	<title>Election</title>
	<link rel="icon" href="images/logo.jpg">
	<link rel="stylesheet" href="css/table-style.css">
	<link rel="stylesheet" href="css/election-style.css">
</head>
<body>
<?php
	require('admin_check.php');
?>

<div class="upper_buttons">
<a href="index.php"> Back </a>
<a href="logout.php"> Logout </a>
</div>

<div class="form">
<h3> Add position </h3>
<form action="add_position_back.php" method="POST">
	<input type="text" id="title" name="title" placeholder="Position title" required="">
	<select id="rank_id" name="rank_id" method="POST">
	<?php
		$sql = "SELECT * FROM position ORDER BY RANK ASC";
		$sql_query = mysqli_query($con, $sql);
		$found = mysqli_num_rows($sql_query);
			
		echo "<option value='0'>--Select a rank--</option>";
		if($found) echo "<option value='1'>Before all</option>";
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<option value='" . $row["rank"]+1 . "'>After " . $row["title"] . "</option>";
		}
	?>
	</select>
	<button> Add </button>
</form>
</div>
<?php if(isset($_GET['s_message'])) { ?>
			<div class="message"><?php echo $_GET['s_message']; ?></div>
<?php } ?>

<div class="form">
<h3>Rename position</h3>
<form action="rename_position_back.php" method="POST">
	<select id="rank_id3" name="rank_id3" method="POST">
		<?php
			$sql = "SELECT * FROM position ORDER BY RANK ASC";
			$sql_query = mysqli_query($con, $sql);
			
			echo "<option value='0'>--Select a Position--</option>";
			if (mysqli_num_rows($sql_query))
			while($row = mysqli_fetch_assoc($sql_query))
			{
				echo "<option value='" . $row["rank"] . "'>" . $row["title"] . "</option>";
			}
		?>
	</select>
	<input type="text" id="title3" name="title3" placeholder="Position title" required="">
	<button> Rename </button>
</form>
</div>
<?php if(isset($_GET['update_message'])) { ?>
			<div class="message"><?php echo $_GET['update_message']; ?></div>
<?php } ?>
</br>

<div class="form">
<h3>Delete position</h3>
<form action="delete_position_back.php" method="POST">
	<select id="rank_id2" name="rank_id2" method="POST">
		<?php
			$sql = "SELECT * FROM position ORDER BY RANK ASC";
			$sql_query = mysqli_query($con, $sql);
			
			echo "<option value='0'>--Select a Position--</option>";
			if (mysqli_num_rows($sql_query))
			while($row = mysqli_fetch_assoc($sql_query))
			{
				echo "<option value='" . $row["rank"] . "'>" . $row["title"] . "</option>";
			}
		?>
	</select>
	<button> Delete </button>
</form>
</div>
<?php if(isset($_GET['delete_message'])) { ?>
			<div class="message"><?php echo $_GET['delete_message']; ?></div>
<?php } ?>

<div class="topic">
<h2>Position table</h2>
</div>

<div class="informations">
<table class="table-style">
	<tr>
	<th> Position ID </th>
	<th> Title </th>
	<th> Rank </th>
	</tr>
<?php
	$sql = "SELECT * FROM position ORDER BY RANK ASC";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<tr><td>" . $row["p_id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["rank"] . "</td></tr>";
		}
	}
?>
</table>
</div>

<div class="buttons">
<?php

	$sql = "SELECT * FROM voting";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	if(!$found) { ?>
	
	<a href="start_voting_back.php"> Start voting </a>
	</br>
<?php } ?>

<?php

	$sql = "SELECT * FROM voting";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	if($found) { ?>
	
	<a href="stop_voting_back.php"> Stop voting </a>
	</br>
<?php } ?>
<?php if(isset($_GET['start_message'])) { ?>
			<div class="message"><?php echo $_GET['start_message']; ?></div>
<?php } ?>
</div>

<?php 
	$sql = "SELECT * FROM voting";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);

	if(!$found) { ?>

<div class="form">
<h3> Add candidate </h3>
<form action="add_candidate_back.php" method="POST">
	<input type="text" id="nid4" name="nid4" placeholder="Candidate nid" required="">
	<select id="p_id4" name="p_id4" method="POST">
	<?php
		$sql = "SELECT * FROM position ORDER BY RANK ASC";
		$sql_query = mysqli_query($con, $sql);
		$found = mysqli_num_rows($sql_query);
			
		echo "<option value='0'>--Select a position--</option>";
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<option value='" . $row["p_id"] . "'>" . $row["title"] . "</option>";
		}
	?>
	</select>
	<button> Add </button>
</form>
</div>
<?php if(isset($_GET['s2_message'])) { ?>
			<div class="message"><?php echo $_GET['s2_message']; ?></div>
<?php } ?>

<div class="form">
<h3> Remove candidate </h3>
<form action="delete_candidate_back.php" method="POST">
	<input type="text" id="nid5" name="nid5" placeholder="Candidate nid" required="">
	<button> Remove </button>
</form>
</div>
<?php if(isset($_GET['delete2_message'])) { ?>
			<div class="message"><?php echo $_GET['delete2_message']; ?></div>
<?php } ?>
<?php } ?>

<div class="topic">
<h2>Candidate table</h2>
</div>

<div class="informations">
<table class="table-style">
	<tr>
	<th> NID </th>
	<th> Name </th>
	<th> Position </th>
	</tr>
<?php
	$sql = "SELECT * FROM candidate JOIN voter ON candidate.nid=voter.nid JOIN position ON candidate.p_id=position.p_id ORDER BY rank ASC";
	$sql_query = mysqli_query($con, $sql);
	$found = mysqli_num_rows($sql_query);
	
	if($found)
	{
		while($row = mysqli_fetch_assoc($sql_query))
		{
			echo "<tr><td>" . $row["nid"] . "</td><td>" . $row["name"] . "</td><td>" . $row["title"] . "</td></tr>";
		}
	}
?>
</table>
</div>


	
</body>
</html>