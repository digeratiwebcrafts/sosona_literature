<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["submit"])){
    $id=$_POST['id'];
    $sosona=$_POST['sosona_share'];
    $area=$_POST['are_share'];
    $upd="UPDATE lds_share SET sosona_share_pct='$sosona', area_share_pct='$area' WHERE id='$id'";


    if ($conn->query($upd) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Record updated successfully.";
      header("Location: ../settings.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../settings.php");
    }

}
 ?>
