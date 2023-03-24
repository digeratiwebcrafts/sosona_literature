<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Consignee List';
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
                    <div class="page-title d-flex w-100">
                        <h4 class="mr-auto"><span class="font-weight-semibold">Consignee List</span></h4>
                        <a href="consignee-add-edit.php" class="btn btn-primary">Add Consignee</a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="row">
                      <?php
                      $sel="SELECT *  FROM  consignee";
                      $rs=$conn->query($sel);
                      while($row=$rs->fetch_assoc()){
                    ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                       <label class="font-weight-bold">Name:</label>
                                    </div>
                                    <div class="col-sm-7">
                                       <p><?php echo $row['name']; ?></p>   
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                       <label class="font-weight-bold">Type:</label>
                                    </div>
                                    <div class="col-sm-7">
                                       <p><?php echo $row['entry_type']; ?></p>   
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                       <label class="font-weight-bold">City:</label>
                                    </div>
                                    <div class="col-sm-7">
                                       <p><?php echo $row['city']; ?></p>   
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                       <label class="font-weight-bold">Opening Balance:</label>
                                    </div>
                                    <div class="col-sm-7">
                                       <p><?php echo $row['opening_bal_amt']; ?></p>   
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                       <label class="font-weight-bold">Comments:</label>
                                    </div>
                                    <div class="col-sm-12">
                                       <p><?php echo $row['comments']; ?></p>   
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                       <a href="consignee-add-edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary w-100">Edit</a>
                                    </div>
                                    <div class="col-sm-6">
                                       <a href="#" class="btn btn-danger w-100" data-toggle="modal" data-target="#confirmDeletet<?php echo $row['id'] ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic modal -->
                        <div id="confirmDeletet<?php echo $row['id'] ?>" class="modal fade" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title w-100 text-center mb-2">Are your sure want to delete</h5>
                              </div>

                              <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a href="controllers/consignee-del.php?id=<?php echo $row['id']?>" class="btn btn-danger">Yes</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /basic modal --> 
                    </div> 
                    <?php
                    }
                    ?>


                </div>  
            
            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>