<?php
session_start();
require('../includes/db-connect.php');
if(isset($_POST["id"]) && !empty($_POST["id"])){

  $pro_name=$_POST['product-name'];
  $pro_sku=$_POST['sku'];
  $pro_cat=$_POST['product-cat'];
  $pro_price=$_POST['product-price'];
  $id=$_POST['id'];
  $upd="UPDATE product SET product_title='$pro_name',sku='$pro_sku',category_id='$pro_cat',product_price='$pro_price' WHERE id='$id'";

if ($conn->query($upd) === TRUE) {
  //echo "Record updated successfully";
  $_SESSION['status'] = "success";
  $_SESSION['status_msg'] = "Record updated successfully.";
  header("Location: ../product-add-edit.php");
} else {
  //echo "Error: " . $ins . "<br>" . $con->error;
  $_SESSION['status'] = "error";
  $_SESSION['status_msg'] = "Something is wrong.";
  header("Location: ../product-add-edit.php");
}

}else

{

  $pro_name=$_POST['product-name'];
  $pro_sku=$_POST['sku'];
  $pro_cat=$_POST['product-cat'];
  $pro_price=$_POST['product-price'];
  $ins="INSERT INTO product SET product_title='$pro_name',sku='$pro_sku',category_id='$pro_cat',product_price='$pro_price'";

  if ($conn->query($ins) === TRUE) {
    //echo "New record created successfully";
    $_SESSION['status'] = "success";
    $_SESSION['status_msg'] = "New record created successfully.";
    header("Location: ../product-add-edit.php");
  } else {
    //echo "Error: " . $ins . "<br>" . $conn->error;
    $_SESSION['status'] = "error";
    $_SESSION['status_msg'] = "Something is wrong.";
    header("Location: ../product-add-edit.php");
  }

}


?>