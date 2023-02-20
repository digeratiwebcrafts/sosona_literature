<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'All Products Edit';
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
                        <h4 class="mr-auto"><span class="font-weight-semibold">All Products Edit</span></h4>
                        <a href="product.php" class="btn btn-primary mr-3">Product List</a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

            <form action="">
                <div class="card-group-control card-group-control-right" id="accordion-control-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a data-toggle="collapse" class="text-body" href="#accordion-control-right-group1">Category Name #1</a>
                                    </h6>
                                </div>

                                <div id="accordion-control-right-group1" class="collapse show" data-parent="#accordion-control-right">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label>SKU:<span class="text-danger">*</span></label>
                                                  <input type="text" class="form-control" placeholder="Enter SKU" name="sku" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label>Product Name:<span class="text-danger">*</span></label>
                                                  <input type="text" class="form-control" placeholder="Enter product name" name="product-name" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                  <label>Product Price:<span class="text-danger">*</span></label>
                                                  <input type="text" class="form-control" placeholder="Enter product price" name="product-price" required>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a class="collapsed text-body" data-toggle="collapse" href="#accordion-control-right-group2">Category Name #2</a>
                                    </h6>
                                </div>

                                <div id="accordion-control-right-group2" class="collapse" data-parent="#accordion-control-right">
                                    <div class="card-body">
                                        <div class="form-group">
                                          <label>SKU:<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter SKU" name="sku" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Product Name:<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter product name" name="product-name" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Product Price:<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter product price" name="product-price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">
                                        <a class="collapsed text-body" data-toggle="collapse" href="#accordion-control-right-group3">Category Name #3</a>
                                    </h6>
                                </div>

                                <div id="accordion-control-right-group3" class="collapse" data-parent="#accordion-control-right">
                                    <div class="card-body">
                                        <div class="form-group">
                                          <label>SKU:<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter SKU" name="sku" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Product Name:<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter product name" name="product-name" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Product Price:<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter product price" name="product-price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </form>

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>