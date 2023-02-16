<?php
require('includes/db-connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ledger Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
   <?php 

     if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id=$_GET['id'];
        $sel="SELECT * FROM customer WHERE id='$id'";
        $rs=$conn->query($sel);
        while($row=$rs->fetch_assoc()){
     ?>
      <h2>Edit Customer</h2>
      <form action="customer-add-edit-do.php" method="post">
      <div class="mb-3 mt-3">
      <label for="customer-name">Customer Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Customer Name" name="cust-name" value="<?php echo $row['cust_name'];?>">
      <label for="customer-email">Customer Email:</label>
      <input type="email" class="form-control"  placeholder="Enter Customer Name" name="cust-email" value="<?php echo $row['cust_email'];?>">
       <label for="address1">Customer Address Lane 1:</label>
      <input type="text" class="form-control"  placeholder="Enter Address Lane 1" name="address1" value="<?php echo $row['cust_address_1'];?>">
      <label for="address2">Customer Address Lane 2:</label>
      <input type="text" class="form-control"  placeholder="Enter Address Lane 2" name="address2" value="<?php echo $row['cust_address_2'];?>">
      <label for="state">State:</label>
      <input type="text" class="form-control"  placeholder="Enter State" name="state" value="<?php echo $row['cust_state'];?>">
      <label for="country">Country:</label>
      <input type="text" class="form-control"  placeholder="Enter Country" name="country" value="<?php echo $row['cust_country'];?>">
      <label for="pincode">Pincode:</label>
      <input type="text" class="form-control"  placeholder="Enter Pincode" name="pincode" value="<?php echo $row['cust_pincode'];?>">
      <input type="hidden" name="id" value="<?php echo $row['id']?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  <?php
   }
 }else{

  ?>
 <h2>Add Customer</h2>
      <form action="customer-add-edit-do.php" method="post">
      <div class="mb-3 mt-3">
      <label for="customer-name">Customer Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Customer Name" name="cust-name">
      <label for="customer-email">Customer Email:</label>
      <input type="email" class="form-control"  placeholder="Enter Customer Name" name="cust-email">
       <label for="address1">Customer Address Lane 1:</label>
      <input type="text" class="form-control"  placeholder="Enter Address Lane 1" name="address1">
      <label for="address2">Customer Address Lane 2:</label>
      <input type="text" class="form-control"  placeholder="Enter Address Lane 2" name="address2">
      <label for="state">State:</label>
      <input type="text" class="form-control"  placeholder="Enter State" name="state">
      <label for="country">Country:</label>
      <input type="text" class="form-control"  placeholder="Enter Country" name="country">
      <label for="pincode">Pincode:</label>
      <input type="text" class="form-control"  placeholder="Enter Pincode" name="pincode">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  <?php
   }
  ?>

  </div>
</body>
</html>
