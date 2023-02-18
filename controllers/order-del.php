<?php
	require('../includes/db-connect.php');
	$id=$_GET['id'];
	$del="DELETE FROM `order` WHERE id=$id";
	$conn->query($del);
	header("location: ../order.php");
?>