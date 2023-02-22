<?php
session_start();
require('../includes/db-connect.php');
if(isset($_POST["id"]) && !empty($_POST["id"])){
  $id=$_POST['id'];
  $consignee_title=$_POST['consignee_title'];
  $consignee_type=$_POST['consignee-type'];
  $order_id=$_POST['order-id'];
  $order_date=$_POST['order-date'];
  $order_total=$_POST['order-total'];
  $comments=$_POST['comments'];
  
  if ($consignee_type==Area) {
  $sel="SELECT * FROM lds_share";
  $rs=$conn->query($sel);
  while($row=$rs->fetch_assoc()){
  $area_shr=$row['area_share_pct'];
  $area_share_amount=round(($area_shr / 100) * $order_total,2);
  $area_bill=round($order_total - $area_share_amount,2);
  $sosona_shr=$row['sosona_share_pct'];
  $sosona_shr_amount=round(($sosona_shr / 100) * $order_total,2);
  $sosona_bill=round($area_bill - $sosona_shr_amount,2);

 
   $upd="UPDATE order_new SET consignee_id='$consignee_title',naws_order_id='$order_id',order_date='$order_date',order_total='$order_total',area_share_amt='$area_share_amount',area_billing_amt='$area_bill',sosona_share_amt='$sosona_shr_amount',sosona_billing_amt='$sosona_bill',comments='$comments' WHERE id='$id'";

  if ($conn->query($upd) === TRUE) {
    //echo "New record created successfully";
    $_SESSION['status'] = "success";
    $_SESSION['status_msg'] = "New record created successfully.";
    header("Location: ../order-add-edit.php");
  } else {
    //echo "Error: " . $ins . "<br>" . $conn->error;
    $_SESSION['status'] = "error";
    $_SESSION['status_msg'] = "Something is wrong.";
    header("Location: ../order-add-edit.php");
  }
}
}else{
      $sel="SELECT * FROM lds_share";
      $rs=$conn->query($sel);
      while($row=$rs->fetch_assoc()){

      $area_shr=$row['area_share_pct'];
      /*$area_share_amount=$order_total;*/
      $area_bill=$order_total;
      $sosona_shr=$row['sosona_share_pct'] + $area_shr;
      $sosona_shr_amount=round(($sosona_shr / 100) * $order_total,2);
      $sosona_bill=round($order_total - $sosona_shr_amount,2);

      $upd="UPDATE order_new SET consignee_id='$consignee_title',naws_order_id='$order_id',order_date='$order_date',order_total='$order_total',area_billing_amt='$area_bill',sosona_share_amt='$sosona_shr_amount',sosona_billing_amt='$sosona_bill',comments='$comments' WHERE id='$id'";

  if ($conn->query($upd) === TRUE) {
    //echo "New record created successfully";
    $_SESSION['status'] = "success";
    $_SESSION['status_msg'] = "New record created successfully.";
    header("Location: ../order-add-edit.php");
  } else {
    //echo "Error: " . $ins . "<br>" . $conn->error;
    $_SESSION['status'] = "error";
    $_SESSION['status_msg'] = "Something is wrong.";
    header("Location: ../order-add-edit.php");
  }
  }
}

}else

{

  $consignee_title=$_POST['consignee_title'];
  $consignee_type=$_POST['consignee-type'];
  $order_id=$_POST['order-id'];
  $order_date=$_POST['order-date'];
  $order_total=$_POST['order-total'];
  $comments=$_POST['comments'];
  
  if ($consignee_type==Area) {
  $sel="SELECT * FROM lds_share";
  $rs=$conn->query($sel);
  while($row=$rs->fetch_assoc()){
  $area_shr=$row['area_share_pct'];
  $area_share_amount=round(($area_shr / 100) * $order_total,2);
  $area_bill=round($order_total - $area_share_amount,2);
  $sosona_shr=$row['sosona_share_pct'];
  $sosona_shr_amount=round(($sosona_shr / 100) * $order_total,2);
  $sosona_bill=round($area_bill - $sosona_shr_amount,2);

  $ins="INSERT INTO `order_new`(`consignee_id`, `naws_order_id`, `order_date`, `order_total`,`area_share_amt`,`area_billing_amt`,`sosona_share_amt`,`sosona_billing_amt`,`comments`) VALUES ('$consignee_title','$order_id','$order_date','$order_total','$area_share_amount','$area_bill','$sosona_shr_amount','$sosona_bill','$comments')";

  if ($conn->query($ins) === TRUE) {
    //echo "New record created successfully";
    $_SESSION['status'] = "success";
    $_SESSION['status_msg'] = "New record created successfully.";
    header("Location: ../order-add-edit.php");
  } else {
    //echo "Error: " . $ins . "<br>" . $conn->error;
    $_SESSION['status'] = "error";
    $_SESSION['status_msg'] = "Something is wrong.";
    header("Location: ../order-add-edit.php");
  }
}
}else{
      $sel="SELECT * FROM lds_share";
      $rs=$conn->query($sel);
      while($row=$rs->fetch_assoc()){
      $area_shr=$row['area_share_pct'];
      /*$area_share_amount=$order_total;*/
      $area_bill=$order_total;
      $sosona_shr=$row['sosona_share_pct'] + $area_shr;
      $sosona_shr_amount=round(($sosona_shr / 100) * $order_total,2);
      $sosona_bill=round($order_total - $sosona_shr_amount,2);

      $ins="INSERT INTO `order_new`(`consignee_id`, `naws_order_id`, `order_date`, `order_total`,`area_billing_amt`,`sosona_share_amt`,`sosona_billing_amt`,`comments`) VALUES ('$consignee_title','$order_id','$order_date','$order_total','$area_bill','$sosona_shr_amount','$sosona_bill','$comments')";

  if ($conn->query($ins) === TRUE) {
    //echo "New record created successfully";
    $_SESSION['status'] = "success";
    $_SESSION['status_msg'] = "New record created successfully.";
    header("Location: ../order-add-edit.php");
  } else {
    //echo "Error: " . $ins . "<br>" . $conn->error;
    $_SESSION['status'] = "error";
    $_SESSION['status_msg'] = "Something is wrong.";
    header("Location: ../order-add-edit.php");
  }
  }
}
}

  



?>