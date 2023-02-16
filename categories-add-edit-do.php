<?php 
require('includes/db-connect.php');


if(isset($_POST["id"]) && !empty($_POST["id"])){

    $upcat=$_POST['categories'];
    $id=$_POST['id'];
    $upd="UPDATE product_category SET category_name='$upcat' WHERE id='$id'";

    if ($conn->query($upd) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error: " . $ins . "<br>" . $con->error;
    }

}else
{
    $cat=$_POST['categories'];

    $ins="INSERT INTO product_category SET category_name='$cat'";

    if ($conn->query($ins) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $ins . "<br>" . $conn->error;
    }

}
 ?>
