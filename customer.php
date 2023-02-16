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
        <th>Customer Name</th>
        <th>Customer Email</th>
        <th>Address Lane 1</th>
        <th>Address Lane 2</th>
        <th>Customer State</th>
        <th>Customer Country</th>
        <th>Pincode</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	    $sel="SELECT * FROM customer";
		$rs=$conn->query($sel);
		while($row=$rs->fetch_assoc()){
			?>
      <tr>
        <td><?php echo $row['cust_name'];?></td>
        <td><?php echo $row['cust_email'];?></td>
        <td><?php echo $row['cust_address_1'];?></td>
        <td><?php echo $row['cust_address_2'];?></td>
        <td><?php echo $row['cust_state'];?></td>
        <td><?php echo $row['cust_country'];?></td>
        <td><?php echo $row['cust_pincode'];?></td>
        <td><a href="customer-add-edit.php?id=<?php echo $row['id'];?>">Edit</a>
        <a href="customer-del.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure?');">Delete</a>
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
