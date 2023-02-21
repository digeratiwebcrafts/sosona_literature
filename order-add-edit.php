<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Order Add / Edit';
include "includes/header.php";
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
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
                        <h4><span class="font-weight-semibold">Order Add / Edit</span></h4>
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
                          $id=$_GET['id'];
                          $sel="SELECT `id`,`product_id`, `naws_order_id`, `order_date`, `product_qty`, `product_price` FROM `order` WHERE id='$id'";
                          $rs=$conn->query($sel);
                          while($prow=$rs->fetch_assoc()){
                      ?>
                      <form action="controllers/order-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Product Name:<span class="text-danger">*</span></label>
                          <select class="form-control select-search product-title" data-fouc data-placeholder="-Select product-" name="product_title" id="product-title" required>
                            <option></option>
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
                        </div>
                        <div class="form-group">
                          <label>Naws Order Id:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter naws order id" name="order-id" value="<?php echo $prow['naws_order_id'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Order Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="order-date" value="<?php echo $prow['order_date'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Product Quantity:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter product quantity" name="prod-quantity" value="<?php echo $prow['product_qty'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Product Price:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter product price" name="product-price" value="<?php echo $prow['product_price'];?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $prow['id']?>">
                        <div class="">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                      <?php
                          }
                        }else
                        {
                      ?>
                      <form action="controllers/order-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Product Name:<span class="text-danger">*</span></label>
                          <select class="form-control select-search product-title" data-fouc data-placeholder="-Select product-" name="product_title" id="product-title" required>
                            <option></option>
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
                        </div>
                        <div class="form-group">
                          <label>Naws Order Id:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter naws order id" name="order-id" required>
                        </div>
                        <div class="form-group">
                          <label>Order Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="order-date" required>
                        </div>
                        <div class="form-group">
                          <label>Product Quantity:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter product quantity" name="prod-quantity" required>
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
                    </div>
                  </div>
                  <!-- /basic layout -->
                </div>  
              </div>

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>
