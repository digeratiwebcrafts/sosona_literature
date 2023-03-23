<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["submit"])){
    $memb_email = $_POST['memb_email'];
    $memb_pass= md5 ($_POST['memb_pass']);
    // echo "User Email: " . $memb_email . "<br>";
    // echo "User Pass: " . $memb_pass . "<br>";
    // exit();
    $upd="UPDATE user SET user_pass='$memb_pass' WHERE user_email='$memb_email'";

    if ($conn->query($upd) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = $memb_email. " Password changed successfully.";
      header("Location: ../member-access.php");
    }
    else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../member-access.php");
    }

}
?>