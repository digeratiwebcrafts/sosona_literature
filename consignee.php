<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Consignee Add';
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
                        <h4><span class="font-weight-semibold">Consignee Add</span></h4>
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

                      <form action="controllers/consignee-do.php" method="post">
                        <div class="form-group">
                          <label>Entry Type:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" data-fouc data-placeholder="-Select Area-" name="area_type" required>
                              <option></option>
                              <option value="Area">Area</option>
                              <option value="Group">Group</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>City:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter city name" name="city_name" required>
                        </div>
                        <div class="form-group">
                          <label>Opening Balance:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter opening balance amt" name="opening_bal_amt" required>
                        </div>
                        <div class="form-group">
                          <label>Comments:<span class="text-danger">*</span></label>
                          <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here" name="msg_comments"></textarea>
                        </div>
                        <div class="">
                          <button type="submit" name="submit" class="btn btn-primary">Add</button>
                        </div>
                      </form>

                    </div>
                  </div>
                  <!-- /basic layout -->
                </div>  
              </div>

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>
