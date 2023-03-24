<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Payment Add / Edit';
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
                    
                        <?php
                      if(isset($_GET["id"]) && !empty($_GET["id"])){
                        echo'<h4><span class="font-weight-semibold">Payment Edit</span></h4>';
                      }else{
                        echo'<h4><span class="font-weight-semibold">Payment Add</span></h4>';
                      }
                      ?>
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
                  } ?>
                  <!-- Basic layout-->
                  <div class="card">
                    <div class="card-body">
                     <?php 
                       if(isset($_GET["id"]) && !empty($_GET["id"])){
                          $id=$_GET['id'];
                          $sel="SELECT * FROM payment WHERE id='$id'";
                          $rs=$conn->query($sel);
                          while($pay_row=$rs->fetch_assoc()){
                      ?>
                      <form action="controllers/payment-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Payment By:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" name="payment-by" data-fouc data-placeholder="-Select Option-" required>
                            <option></option>
                            <?php
                              $sel="SELECT * FROM consignee WHERE entry_type!='Region'";
                               $rs=$conn->query($sel);
                                while($row=$rs->fetch_assoc()){

                            ?>
                            
                            <option value="<?php echo $row['id'];?>"<?php if ($row['id'] == $pay_row['payment_by']) { echo 'selected'; }?>><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Payment Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="payment-date" value="<?php echo $pay_row['payment_date'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Payment Amount:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter payment amt" name="payment-amt" value="<?php echo $pay_row['payment_amt'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Payment Mode:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" name="payment-mode" data-fouc data-placeholder="-Select Option-" required>
                            <option></option>
                            <option value="Cash Deposit"<?php if($pay_row['payment_mode'] =='Cash Deposit') echo "selected"; ?>>Cash Deposit</option>
                            <option value="Bank Transfer"<?php if($pay_row['payment_mode'] =='Bank Transfer') echo "selected"; ?>>Bank Transfer</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Payment Ref. No.:<span class="text-danger"></span></label>
                          <input type="text" class="form-control" placeholder="Enter Payment Ref. No." name="payment-ref-no" value="<?php echo $pay_row['payment_ref_number'];?>">
                        </div>
                        <div class="form-group">
                          <label>Comments:</label>
                          <textarea rows="5" cols="5" class="form-control" placeholder="Enter your comments here" name="comments"><?php echo $pay_row['comments'];?></textarea>
                          <input type="hidden" name="id" value="<?php echo $pay_row['id'];?>">
                        </div>
                        <div class="">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                      <?php
                    }
                       }else
                       {
                      ?>
                       
                       <form action="controllers/payment-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Payment By:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" name="payment-by" data-fouc data-placeholder="-Select Option-" required>
                            <option></option>
                            <?php
                              $sel="SELECT * FROM consignee WHERE entry_type!='Region'";
                               $rs=$conn->query($sel);
                                while($row=$rs->fetch_assoc()){

                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Payment Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="payment-date" required>
                        </div>
                        <div class="form-group">
                          <label>Payment Amount:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter payment amt" name="payment-amt" required>
                        </div>
                        <div class="form-group">
                          <label>Payment Mode:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" name="payment-mode" data-fouc data-placeholder="-Select Option-" required>
                            <option></option>
                            <option value="Cash Deposit">Cash Deposit</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Payment Ref. No.:<span class="text-danger"></span></label>
                          <input type="text" class="form-control" placeholder="Enter Payment Ref. No." name="payment-ref-no">
                        </div>
                        <div class="form-group">
                          <label>Comments:</label>
                          <textarea rows="5" cols="5" class="form-control" placeholder="Enter your comments here" name="comments"></textarea>
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
