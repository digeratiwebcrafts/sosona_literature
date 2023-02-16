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
<div class="container">
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Category Id</th>
        <th>SKU</th>
        <th>Product Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	    $sel="SELECT * FROM product";
		$rs=$conn->query($sel);
		while($row=$rs->fetch_assoc()){
			?>
      <tr>
        <td><?php echo $row['product_title'];?></td>
        <td><?php echo $row['category_id'];?></td>
        <td><?php echo $row['sku'];?></td>
        <td><?php echo $row['product_price'];?></td>
        <td><a href="product-add-edit.php?id=<?php echo $row['id'];?>">Edit</a>
            <a href="product-del.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
      </tr>
		<?php
		}
		?>
    </tbody>
  </table>
  <div>
  	<a href="product-add-edit.php" class="btn btn-primary">Add</a>
  </div>
</div>
</body>
</html>
