<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["id"]) && !empty($_POST["id"])){

    $upcat=$_POST['categories'];
    $id=$_POST['id'];
    $upd="UPDATE product_category SET category_name='$upcat' WHERE id='$id'";

    if ($conn->query($upd) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Record updated successfully.";
      header("Location: ../categories-add-edit.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../categories-add-edit.php");
    }

}else
{
    $cat=$_POST['categories'];

    $ins="INSERT INTO product_category SET category_name='$cat'";

    if ($conn->query($ins) === TRUE) {
      //echo "New record created successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "New record created successfully.";
      header("Location: ../categories-add-edit.php");
    } else {
      //echo "Error: " . $ins . "<br>" . $conn->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../categories-add-edit.php");
    }

}
 ?>
