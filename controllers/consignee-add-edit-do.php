<?php 
session_start();
require('../includes/db-connect.php');


if(isset($_POST["id"]) && !empty($_POST["id"])){

    $id=$_POST['id'];
    $name=$_POST['name'];
    $entry_type=$_POST['entry_type'];
    $city_name=$_POST['city_name'];
    $opening_bal_amt=$_POST['opening_bal_amt'];
    $as_on_date=$_POST['as_on_date'];
    $msg_comments=$_POST['msg_comments'];
    $upd="UPDATE consignee SET name='$name', entry_type='$entry_type', city='$city_name', opening_bal_amt='$opening_bal_amt',as_on_date='$as_on_date',comments='$msg_comments' WHERE id='$id'";

  
    if ($conn->query($upd) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Record Updated successfully.";
      header("Location: ../consignee.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../consignee-add-edit.php");
    }

}else
{
    $name=$_POST['name'];
    $entry_type=$_POST['entry_type'];
    $city_name=$_POST['city_name'];
    $opening_bal_amt=$_POST['opening_bal_amt'];
    $as_on_date=$_POST['as_on_date'];
    $msg_comments=$_POST['msg_comments'];
    $ins="insert into consignee(name,entry_type,city,opening_bal_amt,as_on_date,comments) values('$name','$entry_type','$city_name','$opening_bal_amt','$as_on_date','$msg_comments')";

  
    if ($conn->query($ins) === TRUE) {
      //echo "Record updated successfully";
      $_SESSION['status'] = "success";
      $_SESSION['status_msg'] = "Record inserted successfully.";
      header("Location: ../consignee.php");
    } else {
      //echo "Error: " . $upd . "<br>" . $con->error;
      $_SESSION['status'] = "error";
      $_SESSION['status_msg'] = "Something is wrong.";
      header("Location: ../consignee-add-edit.php");
    }
}
 ?>

