<?php
	require('../includes/db-connect.php');
	$id=$_GET['id'];
	$del="DELETE FROM product_category WHERE id='$id'";
	$conn->query($del);
	header("location: ../categories.php");
?>