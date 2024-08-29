<!DOCTYPE html>
<html>
<head>
	<title>Voters approval</title>
</head>
<body>
<?php
	require('admin_check.php');
?>

<?php
	$nid = $_GET['nid'];
	
	$sql = "UPDATE voter SET approve='0' WHERE nid='$nid'";
	$sql_query = mysqli_query($con, $sql);
		
	if($sql_query)
	{
		$message = "Sucessfully disapproved";
		header("location:voters_approval.php?message="  . urlencode($message));
		exit();
	}
	else
	{
		$message = "Error!";
		header("location:voters_approval.php?message="  . urlencode($message));
		exit();
	}
	
?>

</body>
</html>