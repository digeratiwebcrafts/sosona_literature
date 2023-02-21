<?php
session_start();
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
  //echo "Record updated successfully";
  $_SESSION['status'] = "success";
  $_SESSION['status_msg'] = "Record updated successfully.";
  header("Location: ../order-add-edit.php");
} else {
  //echo "Error: " . $udp . "<br>" . $conn->error;
  $_SESSION['status'] = "error";
  $_SESSION['status_msg'] = "Something is wrong.";
  header("Location: ../order-add-edit.php");
}

}else

{

  $consignee_title=$_POST['consignee_title'];
  $order_id=$_POST['order-id'];
  $order_date=$_POST['order-date'];
  $order_total=$_POST['order-total'];
  $ins="INSERT INTO `order_new`(`consignee_id`, `naws_order_id`, `order_date`, `order_total`) VALUES ('$consignee_title','$order_id','$order_date','$order_total')";

  if ($conn->query($ins) === TRUE) {
    //echo "New record created successfully";
    $_SESSION['status'] = "success";
    $_SESSION['status_msg'] = "New record created successfully.";
    header("Location: ../order-add-edit.php");
  } else {
    //echo "Error: " . $ins . "<br>" . $conn->error;
    $_SESSION['status'] = "error";
    $_SESSION['status_msg'] = "Something is wrong.";
    header("Location: ../order-add-edit.php");
  }

}

?>