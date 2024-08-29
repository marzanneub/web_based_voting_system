<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web based voting system</title>
	<link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="css/stylesheet3.css">
</head>
<?php
	require('auto_login.php');
?>
<body>
<div class="upper_buttons">
<a href="Committee.php"> Committee </a>
</div>

<div class="main">
	<div class="login">
		<form action="login_back.php"  method="POST">
			<h2>Login</h2>
			<input type="text" id ="nid" name="nid" placeholder="Enter nid number"></body><br><br>
			<input type="password" name="password" placeholder="Enter password"><br><br>
			<button id="loginbtn">Login</button><br><br>
		</form>
		New user?<a href="register.php">Register Here</a>
		<?php if(isset($_GET['message'])) { ?>
			<div class="message"><?php echo $_GET['message']; ?></div>
		<?php } ?>
	</div>
</div>

</body>
</html>