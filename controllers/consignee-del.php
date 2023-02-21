<?php
	require('../includes/db-connect.php');
	$id=$_GET['id'];
	$del="DELETE FROM consignee WHERE id=$id";
	$conn->query($del);
	header("location: ../consignee-add-edit.php");
?>