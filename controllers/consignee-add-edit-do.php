<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["submit"])){
    
    $name=$_POST['name'];
    $entry_type=$_POST['entry_type'];
    $city_name=$_POST['city_name'];
    $opening_bal_amt=$_POST['opening_bal_amt'];
    $msg_comments=$_POST['msg_comments'];
    $ins="insert into consignee(name,entry_type,city,opening_bal_amt,comments) values('$name','$entry_type','$city_name','$opening_bal_amt','$msg_comments')";


    if ($conn->query($ins) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Record inserted successfully.";
      header("Location: ../consignee-add-edit.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../consignee-add-edit.php");
    }

}
 ?>
