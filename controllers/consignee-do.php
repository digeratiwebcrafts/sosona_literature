<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["submit"])){
    $id=$_POST['id'];
    $sosona=$_POST['sosona_share'];
    $area=$_POST['are_share'];
    $upd="insert into students(name,age,gender) values('$name','$age','$gender')";


    if ($conn->query($up) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Record inserted successfully.";
      header("Location: ../consignee.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../consignee.php");
    }

}
 ?>
