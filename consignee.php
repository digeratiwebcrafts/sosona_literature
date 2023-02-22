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
                <!-- Basic datatable -->
                <div class="card">

                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>City</th>
                                <th>Opening Bal.</th>
                                <th>Comments</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $sel="SELECT *  FROM  consignee";
                              $rs=$conn->query($sel);
                              while($row=$rs->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['entry_type']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['opening_bal_amt']; ?></td>
                                <td><?php echo $row['comments']; ?></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="consignee-add-edit.php?id=<?php echo $row['id'];?>" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#confirmDeletet<?php echo $row['id'] ?>"><i class="icon-trash"></i> Delete</a>
                                            </div>
                                        </div>
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
                                    <a href="controllers/consignee-del.php?id=<?php echo $row['id']?>" class="btn btn-danger">Yes</a>
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
                <!-- /basic datatable -->
            
            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>