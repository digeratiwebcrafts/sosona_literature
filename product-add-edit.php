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

        $get_id=$_GET['id'];
        $sel="SELECT * FROM product WHERE id='$get_id'";
        $rs=$conn->query($sel);
        while($row=$rs->fetch_assoc()){
   ?>
   <h2>Edit Product</h2>
      <form action="product-add-edit-do.php" method="post">
      <div class="mb-3 mt-3">
      <label for="product-name">Product Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Product Name" name="product-name" value="<?php echo $row['product_title'];?>">
      <label for="sku">SKU:</label>
      <input type="text" class="form-control"  placeholder="Enter Product SKU" name="sku" value="<?php echo $row['sku'];?>">

      <label for="categories">Category:</label>
      <select class="form-select" name="product-cat" id="product-cat">
        <option value="">Select Category</option>
        <?php
          $sel="SELECT prc.id, prc.category_name,pr.product_title,pr.sku,pr.category_id,pr.product_price FROM product_category prc, product pr";
          $rs=$conn->query($sel);
          while($row_data=$rs->fetch_assoc()){
          
      ?>
        
        <option value="<?php echo $row_data['id'];?>"<?php if ($row_data['category_id'] == $row_data['id']) { echo 'selected'; }else{?> <?php } ?>><?php echo $row_data['category_name'];?></option>
        
        <?php
        }
      ?>
    </select>

      <label for="product-price">Product Price:</label>
      <input type="text" class="form-control"  placeholder="Enter Product Price" name="product-price" value="<?php echo $row['product_price'];?>">
      <input type="hidden" name="id" value="<?php echo $row['id']?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  
  <?php
      }
    }else
    {
  ?>
 <h2>Add Product</h2>

<form action="product-add-edit-do.php" method="post">
    <div class="mb-3 mt-3">
      <label for="categories">Product Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Product Name" name="product-name">
      <label for="categories">SKU:</label>
      <input type="text" class="form-control"  placeholder="Enter Product Name" name="sku">
      <label for="categories">Category:</label>
      <select class="form-select" name="product-cat" id="product-cat">
        <option value="">Select Category</option>
        <?php
          $sel="SELECT * FROM product_category";
          $rs=$conn->query($sel);
          while($row=$rs->fetch_assoc()){
      ?>
        
        <option value="<?php echo $row['id'];?>"><?php echo $row['category_name'];?></option>

        <?php
        }
      ?>
    </select>
      <label for="categories">Product Price:</label>
      <input type="text" class="form-control"  placeholder="Enter Product Name" name="product-price">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  <?php
     }
  ?>
  
</div>

</body>
</html>
