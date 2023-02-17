<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
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
                        <h4><span class="font-weight-semibold">Area Add / Edit</span></h4>
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
                        $sel="SELECT * FROM customer WHERE id='$id'";
                        $rs=$conn->query($sel);
                        while($row=$rs->fetch_assoc()){
                     ?>
                      <form action="controllers/customer-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Customer Name:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter customer name" name="cust-name" value="<?php echo $row['cust_name'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Customer Email:<span class="text-danger">*</span></label>
                          <input type="email" class="form-control" placeholder="Enter customer email" name="cust-email" value="<?php echo $row['cust_email'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Address Lane 1:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter address Lane 1" name="address1" value="<?php echo $row['cust_address_1'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Address Lane 2:</label>
                          <input type="text" class="form-control" placeholder="Enter address Lane 2" name="address2" value="<?php echo $row['cust_address_2'];?>">
                        </div>
                        <div class="form-group">
                          <label>Country:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter country name" name="country" value="<?php echo $row['cust_country'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>State:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter state name" name="state" value="<?php echo $row['cust_state'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Pincode:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter pincode" name="pincode" value="<?php echo $row['cust_pincode'];?>" required>
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
                      <form action="controllers/customer-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Customer Name:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter customer name" name="cust-name" required>
                        </div>
                        <div class="form-group">
                          <label>Customer Email:<span class="text-danger">*</span></label>
                          <input type="email" class="form-control" placeholder="Enter customer email" name="cust-email" required>
                        </div>
                        <div class="form-group">
                          <label>Address Lane 1:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter address Lane 1" name="address1"  required>
                        </div>
                        <div class="form-group">
                          <label>Address Lane 2:</label>
                          <input type="text" class="form-control" placeholder="Enter address Lane 2" name="address2">
                        </div>
                        <div class="form-group">
                          <label>Country:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter country name" name="country" required>
                        </div>
                        <div class="form-group">
                          <label>State:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter state name" name="state" required>
                        </div>
                        <div class="form-group">
                          <label>Pincode:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter pincode" name="pincode" required>
                        </div>
                        <div class="">
                          <button type="submit" class="btn btn-primary">Update</button>
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