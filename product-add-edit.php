<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Product Add / Edit';
include "includes/header.php";
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
include "includes/loggedin-checker.php";
?>
<!-- Main navbar -->
<?php 
include "includes/top-navbar.php";
 ?>
 <!-- /Main navbar -->
 <!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <?php 
    include "includes/left-sidebar.php";
     ?>
    <!-- /Main sidebar -->

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><span class="font-weight-semibold">Product Add / Edit</span></h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

              <div class="row">
                <div class="col-lg-6">

                  <?php
                  if (isset($_SESSION['status']) && $_SESSION['status'] == "error") {
                      unset($_SESSION['status']);
                      ?>

                      <div class="alert alert-danger border-0 p-2">
                          <span class="font-weight-semibold"><?php echo $_SESSION['status_msg']; ?></span>
                      </div>

                      <?php
                  } else if (isset($_SESSION['status']) && $_SESSION['status'] == "success") {
                      unset($_SESSION['status']);
                      ?>

                      <div class="alert alert-success border-0 p-2">
                          <span class="font-weight-semibold"><?php echo $_SESSION['status_msg']; ?></span>
                      </div>

                  <?php } ?>
                  <!-- Basic layout-->
                  <div class="card">
                    <div class="card-body">

                      <?php
                       if(isset($_GET["id"]) && !empty($_GET["id"])){

                            $get_id=$_GET['id'];
                            $sel="SELECT * FROM product WHERE id='$get_id'";
                            $rs=$conn->query($sel);
                            while($row=$rs->fetch_assoc()){
                       ?>
                      <form action="controllers/product-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>SKU:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter SKU" name="sku" value="<?php echo $row['sku'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Product Name:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter product name" name="product-name" value="<?php echo $row['product_title'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Category Name:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" data-fouc data-placeholder="-Select category-" name="product-cat" id="product-cat" required>
                            <option></option>
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
                        </div>
                        <div class="form-group">
                          <label>Product Price:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter product price" name="product-price" value="<?php echo $row['product_price'];?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <div class="">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                      <?php
                          }
                        }else
                        {
                      ?>
                      <form action="controllers/product-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>SKU:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter SKU" name="sku" required>
                        </div>
                        <div class="form-group">
                          <label>Product Name:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter product name" name="product-name"  required>
                        </div>
                        <div class="form-group">
                          <label>Category Name:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" data-fouc data-placeholder="-Select category-" name="product-cat" id="product-cat" required>
                              <option></option>
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
                        </div>
                        <div class="form-group">
                          <label>Product Price:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter product price" name="product-price" required>
                        </div>
                        <div class="">
                          <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                      </form>
                      <?php
                        }
                      ?>

                    </div>
                  </div>
                  <!-- /basic layout -->
                </div>  
              </div>

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>
