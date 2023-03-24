<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Change Password';
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
                        <h4><span class="font-weight-semibold">Change Password</span></h4>
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

                      <form action="controllers/change-password-do.php" method="post">
                        <div>
                          <label>Old Password:<span class="text-danger">*</span></label>
                          <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" name="old_pass" class="form-control pr-form-control-icon" placeholder="Password" required>
                            <div class="form-control-feedback">
                              <i class="icon-lock2 text-muted"></i>
                            </div>
                            <div class="form-control-feedback view-password">
                                <i class="icon-eye-blocked2 text-muted view-password-icon"></i>
                            </div>
                          </div>
                        </div>
                        <div>
                          <label>New Password:<span class="text-danger">*</span></label>
                          <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" name="new_pass" class="form-control npr-form-control-icon" placeholder="Password" required>
                            <div class="form-control-feedback">
                              <i class="icon-lock2 text-muted"></i>
                            </div>
                            <div class="form-control-feedback view-password">
                                <i class="icon-eye-blocked2 text-muted new-password-icon"></i>
                            </div>
                          </div>
                        </div>
                        <div>
                          <label>Confirm Password:<span class="text-danger">*</span></label>
                          <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" name="confirm_pass" class="form-control cpr-form-control-icon" placeholder="Password" required>
                            <div class="form-control-feedback">
                              <i class="icon-lock2 text-muted"></i>
                            </div>
                            <div class="form-control-feedback view-password">
                                <i class="icon-eye-blocked2 text-muted confirm-password-icon"></i>
                            </div>
                          </div>
                        </div>
                        <?php
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM user WHERE id='$id'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            //echo "id: " . $row["id"]. " - Email: " . $row["user_email"]. " " . $row["user_pass"]. "<br>";
                         

                         ?>
                         <input type="hidden" name="old_pass_db" value="<?php echo $row['user_pass']?>">
                         <?php
                        }
                        } 

                         ?>
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
                        <div class="">
                          <button type="submit" name="submit" class="btn btn-primary">Change</button>
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