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
                    <div class="page-title d-flex w-100">
                        <h4 class="mr-auto"><span class="font-weight-semibold">Area List</span></h4>
                        <a href="customer-add-edit.php" class="btn btn-primary">Add Area</a>
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
                      <th>Area Name</th>
                      <th>Area Email</th>
                      <th>Add.1</th>
                      <th>Add.2</th>
                      <th>Country</th>
                      <th>State</th>
                      <th>Pincode</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sel="SELECT * FROM customer";
                      $counter = 0;
                      $rs=$conn->query($sel);
                      while($row=$rs->fetch_assoc()){
                    ?>
                    <tr>
                      <td><?php echo ++$counter; ?></td>
                      <td><?php echo $row['cust_name'];?></td>
                      <td><?php echo $row['cust_email'];?></td>
                      <td><?php echo $row['cust_address_1'];?></td>
                      <td><?php echo $row['cust_address_2'];?></td>
                      <td><?php echo $row['cust_country'];?></td>
                      <td><?php echo $row['cust_state'];?></td>
                      <td><?php echo $row['cust_pincode'];?></td>
                      <td>
                        <div class="list-icons">
                          <a href="customer-add-edit.php?id=<?php echo $row['id'];?>" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                          <a href="#" data-toggle="modal" data-target="#confirmDeletet" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /striped rows -->

            <!-- Basic modal -->
            <div id="confirmDeletet" class="modal fade" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title w-100 text-center mb-2">Are your sure want to delete</h5>
                  </div>

                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <?php
                      $sel="SELECT * FROM customer";
                      $rs=$conn->query($sel);
                      while($row=$rs->fetch_assoc()){
                    ?>
                    <a href="controllers/customer-del.php?id=<?php echo $row['id']?>" class="btn btn-danger">Yes</a>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- /basic modal -->

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>
