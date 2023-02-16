<?php
require('includes/db-connect.php');
if(isset($_POST["id"]) && !empty($_POST["id"])){
$id=$_POST['id'];
$cus_name=$_POST['cust-name'];
$cus_email=$_POST['cust-email'];
$cus_address1=$_POST['address1'];
$cus_address2=$_POST['address2'];
$state=$_POST['state'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];

$upd="UPDATE customer SET cust_name='$cus_name',cust_email='$cus_email',cust_address_1='$cus_address1',cust_address_2='$cus_address2',cust_state='$state',cust_country='$country',cust_pincode='$pincode' WHERE id='$id'";
   if ($conn->query($upd)=== TRUE) {
	 echo "Record updated successfully";
  } else {
    echo "Error: " . $ins . "<br>" . $conn->error;
  }


}else
{
$cus_name=$_POST['cust-name'];
$cus_email=$_POST['cust-email'];
$cus_address1=$_POST['address1'];
$cus_address2=$_POST['address2'];
$state=$_POST['state'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];

$ins="INSERT INTO customer SET cust_name='$cus_name',cust_email='$cus_email',cust_address_1='$cus_address1',cust_address_2='$cus_address2',cust_state='$state',cust_country='$country',cust_pincode='$pincode'";
if ($conn->query($ins)=== TRUE) {
	 echo "New record created successfully";
  } else {
    echo "Error: " . $ins . "<br>" . $conn->error;
  }
}

?>