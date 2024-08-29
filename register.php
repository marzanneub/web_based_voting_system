<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
	<link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="css/stylesheet3.css">
</head>
<body>
<div class="upper_buttons">
<a href="index.php"> Back </a>
</div>

<div class="main">
	<div class="login">
		<form action="register_back.php" method="POST">
			<h2>Register</h2>
			<input type="text" id ="nid" name="nid" placeholder="Enter nid number" required=""></body><br><br>
			<input type="text" id ="phone_number" name="phone_number" placeholder="Enter phone number" required=""></body><br><br>
			<input type="date" id="dob" name="dob" required=""><br><br>
			<input type="password" name="pw1" placeholder="Enter password" required=""><br><br>
			<input type="password" name="pw2" placeholder="Re-enter password" required=""><br><br>
			<button id="registerbtn">register</button><br><br>
		</form>
		<?php if(isset($_GET['message'])) { ?>
			<div class="message"><?php echo $_GET['message']; ?></div>
		<?php } ?>
	</div>
</div>

</body>
</html>