<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["id"]) && !empty($_POST["id"])){

    $id=$_POST['id'];
    $entry_type=$_POST['entry_type'];
    $payment_date=$_POST['payment-date'];
    $payment_amt=$_POST['payment-amt'];
    $payment_mode=$_POST['payment-mode'];
    $payment_ref_no=$_POST['payment-ref-no'];
    $comments=$_POST['comments'];

    $upd="UPDATE payment SET payment_by='$entry_type',payment_date='$payment_date',payment_amt='$payment_amt',payment_mode='$payment_mode',payment_ref_number='$payment_ref_no',comments='$comments' WHERE id='$id'";
    

  
    if ($conn->query($upd) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Payment Record Updated Successfully.";
      header("Location: ../payment-naws.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../payment-naws-add-edit.php");
    }

}else
{
    $entry_type=$_POST['entry_type'];
    $payment_date=$_POST['payment-date'];
    $payment_amt=$_POST['payment-amt'];
    $payment_mode=$_POST['payment-mode'];
    $payment_ref_no=$_POST['payment-ref-no'];
    $comments=$_POST['comments'];

    $ins="INSERT INTO payment SET payment_by='$entry_type',payment_date='$payment_date',payment_amt='$payment_amt',payment_mode='$payment_mode',payment_ref_number='$payment_ref_no',comments='$comments'";

  
    if ($conn->query($ins) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "New Payment Record Inserted Successfully.";
      header("Location: ../payment-naws.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../payment-naws-add-edit.php");
    }
}
 ?>

