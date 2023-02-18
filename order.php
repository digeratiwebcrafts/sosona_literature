<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Order List';
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
                    <div class="page-title d-flex w-100">
                        <h4 class="mr-auto"><span class="font-weight-semibold">Order List</span></h4>
                        <a href="order-add-edit.php" class="btn btn-primary">Add Order</a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

            <!-- Striped rows -->
            <div class="card">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Naws Order Id</th>
                      <th>Order Date</th>
                      <th>Product Qty</th>
                      <th>Product Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                      $sel="SELECT * FROM `product` INNER JOIN `order` ON product.id=order.product_id";
                      $counter = 0;
                      $rs=$conn->query($sel);
                      while($row=$rs->fetch_assoc()){
                    ?>
                    <tr>
                      <td><?php echo ++$counter; ?></td>
                      <td><?php echo $row['product_title'];?></td>
                      <td><?php echo $row['naws_order_id'];?></td>
                      <td><?php echo $row['order_date'];?></td>
                      <td><?php echo $row['product_qty'];?></td>
                      <td><?php echo $row['product_price'];?></td>
                      <td>
                        <div class="list-icons">
                          <a href="order-add-edit.php?id=<?php echo $row['id'];?>" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                          <a href="#" data-toggle="modal" data-target="#confirmDeletet<?php echo $row['id'] ?>" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <!-- Basic modal -->
                    <div id="confirmDeletet<?php echo $row['id'] ?>" class="modal fade" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title w-100 text-center mb-2">Are your sure want to delete</h5>
                          </div>

                          <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <a href="controllers/order-del.php?id=<?php echo $row['id']?>" class="btn btn-danger">Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /basic modal -->
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /striped rows -->

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>
