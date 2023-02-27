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
                        <h4><span class="font-weight-semibold">Consignee Add / Edit</span></h4>
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
                  }
                  ?> 
                  <!-- Basic layout-->
                  <div class="card">
                    <div class="card-body">
                     <?php 
                       if(isset($_GET["id"]) && !empty($_GET["id"])){
                        $id=$_GET['id'];
                        $sel="SELECT * FROM consignee WHERE id='$id'";
                        $rs=$conn->query($sel);
                        while($row=$rs->fetch_assoc()){
                      ?>
                      <form action="controllers/consignee-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Name:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $row['name'];?>" required>
                        </div>
                        <?php
                        if ($row['entry_type']!=='Region') {
                          
                        ?>
                        <div class="form-group">
                          <label>Entry Type:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" data-fouc data-placeholder="-Select Area-" name="entry_type" required>
                                  <option></option>
                              <option value="Area"<?php if($row['entry_type'] == 'Area') echo "selected"; ?>>Area</option>
                              <option value="Group"<?php if($row['entry_type'] == 'Group') echo "selected"; ?>>Group</option>
                              
                          </select>
                        </div>
                      <?php }else{ ?>
                        <div class="form-group">
                          <label>Entry Type:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" data-fouc data-placeholder="-Select Area-" name="entry_type" required>
                          
                              <option value="Region"<?php if($row['entry_type'] == 'Region') echo "selected"; ?>>Region</option>
                          </select>
                        </div>
                      <?php
                      } ?>
                        <div class="form-group">
                          <label>City:<span class="text-danger"></span></label>
                          <input type="text" class="form-control" placeholder="Enter city name" name="city_name" value="<?php echo $row['city'];?>" >
                        </div>
                        <div class="form-group">
                          <label>Opening Balance:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter opening balance amt" name="opening_bal_amt" value="<?php echo $row['opening_bal_amt'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>As On Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="as_on_date" value="<?php echo $row['as_on_date'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Comments:<span class="text-danger"></span></label>
                          <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here" name="msg_comments"  ><?php echo $row['comments'];?></textarea>
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        </div>
                        <div class="">
                          <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                      <?php
                    }
                        }else
                        {
                        
                      ?>
                      <form action="controllers/consignee-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Name:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter name" name="name" required>
                        </div>
                        <div class="form-group">
                          <label>Entry Type:<span class="text-danger">*</span></label>
                          <select class="form-control select-search" data-fouc data-placeholder="-Select Area-" name="entry_type" required>
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
                          <label>As On Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="as_on_date" required>
                        </div>
                        <div class="form-group">
                          <label>Comments:<span class="text-danger">*</span></label>
                          <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here" name="msg_comments"></textarea>
                        </div>
                        <div class="">
                          <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
