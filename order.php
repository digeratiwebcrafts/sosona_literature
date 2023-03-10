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
           <?php
             if (isset($_SESSION['status']) && $_SESSION['status'] == "success") {
                  unset($_SESSION['status']);
                  ?>

                  <div class="alert alert-success border-0 p-2">
                      <span class="font-weight-semibold"><?php echo $_SESSION['status_msg']; ?></span>
                  </div>

            <?php } ?>

            <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>Order By:</label>
                                      <select class="form-control select-search" name="consignee-id" data-fouc data-placeholder="-Select Option-">
                                        <?php
                              $sel="SELECT * FROM consignee";
                               $rs=$conn->query($sel);
                                while($row=$rs->fetch_assoc()){

                            ?>
                                        <option></option>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</option>

                             <?php
                            }
                             ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>From Date:</label>
                                      <input type="date" class="form-control" id="startDate" placeholder="" name="from-date">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>To Date:</label>
                                      <input type="date" class="form-control" id="endDate" placeholder="" name="to-date">
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-1">
                                  <button type="submit" name="btn-filter" class="btn btn-primary mr-2" onclick="myFunction()">Filter</button>
                                  <a href="order.php" class="btn btn-warning">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  


            <!-- Striped rows -->
            <div class="card">
              <div class="table-responsive">
                <table class="table datatable-basic">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Consignee Name</th>
                      <th>Naws Order Id</th>
                      <th>Order Date</th>
                      <th>Order Total</th>
                      <th>Share Amt.</th>
                      <th>Billing Amt.</th>
                      <th class="table-comment-width">Comments</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                        if (isset($_POST["btn-filter"])){
                            $form_date=$_POST['from-date'];
                            $to_date=$_POST['to-date'];
                            $order_by=$_POST['consignee-id'];

                            if (($form_date < $to_date) && $order_by== TRUE) {
                               

                        if(isset($_POST['from-date'])  && isset($_POST['to-date']) && isset($_POST['consignee-id'])){

                          $query="SELECT *  FROM `consignee` INNER JOIN `order_new` ON order_new.consignee_id=consignee.id WHERE order_date BETWEEN '$form_date' AND '$to_date' AND consignee_id='$order_by' ";
                      $counter = 0;
                      $rs=$conn->query($query);
                      while($row=$rs->fetch_assoc()){

                          ?>
                    <tr>
                      <td><?php echo ++$counter; ?></td>
                      <td><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</td>
                      <td><?php echo $row['naws_order_id'];?></td>
                      <td><?php echo $row['order_date'];?></td>
                      <td><?php echo $row['order_total'];?></td>
                      <td><?php echo $row['area_share_amt'];?></td>
                      <td><?php echo $row['area_billing_amt'];?></td>
                      <td><?php echo $row['comments'];?></td>
                      <td class="text-center">
                          <div class="list-icons">
                              <div class="dropdown">
                                  <a href="#" class="list-icons-item" data-toggle="dropdown">
                                      <i class="icon-menu9"></i>
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a href="order-add-edit.php?id=<?php echo $row['id'];?>" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
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
                            <a href="controllers/order-del.php?id=<?php echo $row['id']?>" class="btn btn-danger">Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>


                          <?php
                    
                      
                       
                    }
                }
                }elseif ($form_date < $to_date || $order_by== TRUE) {
                    
                      if(isset($_POST['from-date'])  && isset($_POST['to-date']) && isset($_POST['consignee-id'])){
                        $query="SELECT *  FROM consignee INNER JOIN order_new ON order_new.consignee_id=consignee.id WHERE order_date BETWEEN '$form_date' AND '$to_date' OR consignee_id='$order_by' ";
                      $counter = 0;
                      $rs=$conn->query($query);
                      while($row=$rs->fetch_assoc()){

                        ?>

                    <tr>
                      <td><?php echo ++$counter; ?></td>
                      <td><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</td>
                      <td><?php echo $row['naws_order_id'];?></td>
                      <td><?php echo $row['order_date'];?></td>
                      <td><?php echo $row['order_total'];?></td>
                      <td><?php echo $row['area_share_amt'];?></td>
                      <td><?php echo $row['area_billing_amt'];?></td>
                      <td><?php echo $row['comments'];?></td>
                      <td class="text-center">
                          <div class="list-icons">
                              <div class="dropdown">
                                  <a href="#" class="list-icons-item" data-toggle="dropdown">
                                      <i class="icon-menu9"></i>
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a href="order-add-edit.php?id=<?php echo $row['id'];?>" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
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
                            <a href="controllers/order-del.php?id=<?php echo $row['id']?>" class="btn btn-danger">Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>


                <?php
                    
                      
                       
                    }
                }
                   

                }

                ?>
                <?php

                   }else{ ?>

                  <?php
                      $sel="SELECT *  FROM consignee INNER JOIN order_new ON order_new.consignee_id=consignee.id ";
                      $counter = 0;
                      $rs=$conn->query($sel);
                      while($row=$rs->fetch_assoc()){
                   ?>
                    
                    <tr>
                      <td><?php echo ++$counter; ?></td>
                      <td><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</td>
                      <td><?php echo $row['naws_order_id'];?></td>
                      <td><?php echo $row['order_date'];?></td>
                      <td><?php echo $row['order_total'];?></td>
                      <td><?php echo $row['area_share_amt'];?></td>
                      <td><?php echo $row['area_billing_amt'];?></td>
                      <td><?php echo $row['comments'];?></td>
                      <td class="text-center">
                          <div class="list-icons">
                              <div class="dropdown">
                                  <a href="#" class="list-icons-item" data-toggle="dropdown">
                                      <i class="icon-menu9"></i>
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a href="order-add-edit.php?id=<?php echo $row['id'];?>" class="dropdown-item"><i class="icon-pencil7"></i> Edit</a>
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
                            <a href="controllers/order-del.php?id=<?php echo $row['id']?>" class="btn btn-danger">Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /basic modal -->
                    <?php
                    }
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
