<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'web_based_voting_system';
		
	$con = mysqli_connect($host, $username, $password);
	$selectdb = mysqli_select_db($con, $dbname);
?>