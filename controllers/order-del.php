<?php
	require('../includes/db-connect.php');
	$id=$_GET['id'];
	$del="DELETE FROM order_new WHERE id=$id";
	$conn->query($del);
	header("location: ../order.php");
?>