<?php
	require('../includes/db-connect.php');
	$id=$_GET['id'];
	$del="DELETE FROM customer WHERE id='$id'";
	$conn->query($del);
	header("location: ../customer.php");
?>