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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>

</head>
<body>

<div class="container mt-3">
   <?php 

     if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id=$_GET['id'];
        $sel="SELECT `id`,`product_id`, `naws_order_id`, `order_date`, `product_qty`, `product_price` FROM `order` WHERE id='$id'";
        $rs=$conn->query($sel);
        while($prow=$rs->fetch_assoc()){
     ?>
  <h2>Edit Order</h2>
         <form action="controllers/order-add-edit-do.php" method="post">
      <div class="mb-3 mt-3">
        <label for="product title">Product Name:</label>
        <select class="form-select product-title" name="product_title" id="product-title">
         <option value="0">Select Product</option>
           <?php
            $sel="SELECT * FROM `product` LEFT JOIN `order` ON product.id=order.product_id";
             $rs=$conn->query($sel);
              while($row=$rs->fetch_assoc()){
            ?>
          <option value="<?php echo $row['id'];?>"<?php if ($row['id'] == $row['product_id']) { echo 'selected'; }?>><?php echo $row['product_title'];?></option>
         
         <?php
      }
     ?>
   </select>
     <label for="custom-order-id">Custom Order Id:</label>
        <input type="text" class="form-control"  placeholder="Enter order id" name="order-id" value="<?php echo $prow['naws_order_id'];?>">
               <label for="Order Date">Order Date:</label>
                <input type="date" class="form-control"  placeholder="" name="order-date" value="<?php echo $prow['order_date'];?>">

                 <label for="product-quantity">Product Quantity:</label>
                  <input type="text" class="form-control"  placeholder="Enter product quantity" name="prod-quantity" value="<?php echo $prow['product_qty'];?>">
                  <label for="product_price">Product Price:</label>
                <div class="price">
             <input type="text" class="form-control"  placeholder="product price" name="product-price" value="<?php echo $prow['product_price'];?>">
       </div>
              
                <input type="hidden" name="id" value="<?php echo $prow['id']?>">
         </div>
        
      <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
    <?php
   }
 }
 else{

  ?>
 <h2>Add Order</h2>
      <form action="controllers/order-add-edit-do.php" method="post">
      <div class="mb-3 mt-3">
        <label for="product title">Product Name:</label>
        <select class="form-select product-title" name="product_title" id="product-title">
         <option value="0">Select Product</option>
           <?php
            $sel="SELECT * FROM product";
             $rs=$conn->query($sel);
              while($row=$rs->fetch_assoc()){

            ?>
          <option value="<?php echo $row['id'];?>"><?php echo $row['product_title'];?></option>

         <?php
      }
     ?>
   </select>
     <label for="custom-order-id">Custom Order Id:</label>
        <input type="text" class="form-control"  placeholder="Enter Order Id" name="order-id">
               <label for="Order Date">Order Date:</label>
                <input type="date" class="form-control"  placeholder="" name="order-date">
                 <label for="product-quantity">Product Quantity:</label>
                  <input type="text" class="form-control"  placeholder="Enter product quantity" name="prod-quantity">
                  <label for="product_price">Product Price:</label>
                <div class="price">
             <input type="text" class="form-control"  placeholder="product price" name="product-price">
       </div>
         </div>
        
      <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <?php
       }
     ?>
  </div>
  <script type="text/javascript">
$(document).ready(function()
{
$(".product-title").change(function()
{
var id=$(this).val();
var post_id = 'pid='+ id;

$.ajax
({
type: "POST",
url: "controllers/ajax-order-add-edit.php",
data: post_id,
cache: false,
success: function(product_price)
{
$(".price").html(product_price);
} 
});

});
});
</script>
</body>
</html>
