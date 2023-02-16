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
        $sel="SELECT * FROM product_category WHERE id='$id'";
        $rs=$conn->query($sel);
        while($row=$rs->fetch_assoc()){
   ?>
  <h2>Edit Categories</h2>
 <form action="categories-add-edit-do.php" method="post">
    <div class="mb-3 mt-3">
      <label for="categories">Categories:</label>
      <input type="text" class="form-control" id="cat" placeholder="Enter Categories" name="categories" value="<?php echo $row['category_name']?>">
      <input type="hidden" name="id" value="<?php echo $row['id']?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
    
  
  
      <?php
    }
  }else
  {
?>

 <h2>Add Categories</h2>

<form action="categories-add-edit-do.php" method="post">
    <div class="mb-3 mt-3">
      <label for="categories">Categories:</label>
      <input type="text" class="form-control" id="cat" placeholder="Enter Categories" name="categories">

    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
<?php
  }
    ?>
  
</div>

</body>
</html>
