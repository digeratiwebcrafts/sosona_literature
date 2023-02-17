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
        <th>Naws Order Id</th>
        <th>Order Date</th>
        <th>Product Quantity</th>
        <th>Product Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	   $sel="SELECT `id`, `product_id`, `naws_order_id`, `order_date`, `product_qty`, `product_price` FROM `order`";
		$rs=$conn->query($sel);
		while($row=$rs->fetch_assoc()){

			?>

        <td><?php echo $row['product_id'];?></td>
        <td><?php echo $row['naws_order_id'];?></td>
        <td><?php echo $row['order_date'];?></td>
        <td><?php echo $row['product_qty'];?></td>
        <td><?php echo $row['product_price'];?></td>
        <td><a href="order-add-edit.php?id=<?php echo $row['id'];?>">Edit</a>
        <a href="order-del.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
      </tr> 
		<?php
		}
  
		?>
    </tbody>
  </table>
  <div>
  	<a href="customer-add-edit.php" class="btn btn-primary">Add</a>

  </div>
</div>
</body>
</html>
