<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["submit"])){
    $id=$_POST['id'];
    $old_pass=$_POST['old_pass'];
    $new_pass= md5 ($_POST['new_pass']);
    $confirm_pass= md5 ($_POST['confirm_pass']);
    $upd="UPDATE user SET user_pass='$confirm_pass' WHERE id='$id'";

    if ($new_pass != $confirm_pass) {
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "New Password and Confirm Password is not same.";
      header("Location: ../change-password.php");
    }

    elseif ($conn->query($upd) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Password changed successfully.";
      header("Location: ../change-password.php");
    }
    else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../change-password.php");
    }

}
?>
