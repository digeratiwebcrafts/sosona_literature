<?php
	require('../includes/db-connect.php');
	$id=$_GET['id'];
	$del="DELETE FROM payment WHERE id=$id";
	$conn->query($del);
	header("location: ../payment.php");
?>