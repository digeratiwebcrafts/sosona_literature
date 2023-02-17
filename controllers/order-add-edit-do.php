<?php
require('../includes/db-connect.php');
if(isset($_POST["id"]) && !empty($_POST["id"])){
  $id=$_POST['id'];
  $product_title=$_POST['product_title'];
  $order_id=$_POST['order-id'];
  $order_date=$_POST['order-date'];
  $prod_quantity=$_POST['prod-quantity'];
  $product_price=$_POST['product-price'];
 
  $upd="UPDATE `order` SET `id`='$id', `product_id`='$product_title',`naws_order_id`='$order_id',`order_date`='$order_date',`product_qty`='$prod_quantity',`product_price`='$product_price' WHERE `id`='$id'";

if ($conn->query($upd) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error: " . $udp . "<br>" . $conn->error;
}

}else

{

  $product_title=$_POST['product_title'];
  $order_id=$_POST['order-id'];
  $order_date=$_POST['order-date'];
  $prod_quantity=$_POST['prod-quantity'];
  $product_price=$_POST['product-price'];
  $ins="INSERT INTO `order`(`product_id`, `naws_order_id`, `order_date`, `product_qty`, `product_price`) VALUES ('$product_title','$order_id','$order_date','$prod_quantity','$product_price')";

  if ($conn->query($ins) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $ins . "<br>" . $conn->error;
  }

}

?>