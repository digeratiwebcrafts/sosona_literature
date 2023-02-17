<?php
include('../includes/db-connect.php');
if($_POST['pid']){
$id=$_POST['pid'];
if($id==0){
	echo '<input type="text" class="form-control"  placeholder="Enter product price" name="product-price" >';
}else{
	$sel = mysqli_query($conn,"SELECT * FROM `product` WHERE id='$id'");
	while($row = mysqli_fetch_array($sel)){
		echo '<input type="text" class="form-control"  placeholder="Enter product price" name="product-price" value="'.$row['product_price'].'" readonly>';
		}
	}
}
?>