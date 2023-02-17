<?php
	require('../includes/db-connect.php');
	$id=$_GET['id'];
	$del="DELETE FROM product WHERE id='$id'";
	$conn->query($del);
	header("location: ../product.php");
?>