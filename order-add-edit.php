<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Order Add / Edit';
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
                      <?php
                      if(isset($_GET["id"]) && !empty($_GET["id"])){
                        echo'<h4><span class="font-weight-semibold">Order Edit</span></h4>';
                      }else{
                        echo'<h4><span class="font-weight-semibold">Order Add</span></h4>';
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
                          $sel="SELECT * FROM order_new WHERE id='$id'";
                          $rs=$conn->query($sel);
                          while($ord_row=$rs->fetch_assoc()){
                      ?>
                      <form action="controllers/order-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Consignee Name:<span class="text-danger">*</span></label>
                          <select class="form-control select-search upd-consignee-title" data-fouc data-placeholder="-Select Consignee-" name="consignee_title" id="consignee-title" required>
                            <option></option>
                            <?php
                             $sel="SELECT * FROM consignee";
                               $rs=$conn->query($sel);
                                while($row=$rs->fetch_assoc()){
                                

                            ?>
                            <option value="<?php echo $row['id'];?>"<?php if ($row['id'] == $ord_row['consignee_id']) { echo 'selected'; }?>><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</option>


                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group updconsignee-type">
                          <!-- <label>Consignee Type:<span class="text-danger"></span></label> -->
                          <input type="hidden" class="form-control" placeholder="consignee" name="consignee-type">
                        </div>
                        <div class="form-group">
                          <label>Naws Order Id:<span class="text-danger"></span></label>
                          <input type="text" class="form-control" placeholder="Enter naws order id" name="order-id" value="<?php echo $ord_row['naws_order_id'];?>">
                        </div>
                        <div class="form-group">
                          <label>Order Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="order-date" value="<?php echo $ord_row['order_date'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Order Total:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter order total" name="order-total" value="<?php echo $ord_row['order_total'];?>" required>
                        </div>
                        <div class="form-group">
                          <label>Comments:</label>
                          <textarea rows="5" cols="5" class="form-control" placeholder="Enter your comments here" name="comments"><?php echo $ord_row['comments'];?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $ord_row['id']?>">
                        <div class="">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                      <?php
                          }
                        }else
                        {
                      ?>
                      <form action="controllers/order-add-edit-do.php" method="post">
                        <div class="form-group">
                          <label>Consignee Name:<span class="text-danger">*</span></label>
                          <select class="form-control select-search consignee-title" data-fouc data-placeholder="-Select Consignee-" name="consignee_title" id="consignee-title" required>
                            <option></option>
                            <?php
                              $sel="SELECT * FROM consignee";
                               $rs=$conn->query($sel);
                                while($row=$rs->fetch_assoc()){

                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?> (<?php echo $row['entry_type'];?>)</option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group consignee-type">
                          <!-- <label>Consignee Type:<span class="text-danger"></span></label> -->
                          <input type="hidden" class="form-control" placeholder="consignee" name="consignee-type">
                        </div>
                        <div class="form-group">
                          <label>Naws Order Id:<span class="text-danger"></span></label>
                          <input type="text" class="form-control" placeholder="Enter naws order id" name="order-id">
                        </div>
                        <div class="form-group">
                          <label>Order Date:<span class="text-danger">*</span></label>
                          <input type="date" class="form-control" placeholder="" name="order-date" required>
                        </div>
                        <div class="form-group">
                          <label>Order Total:<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" placeholder="Enter order total" name="order-total" required>
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

                      <script type="text/javascript">
                        $(document).ready(function()
                        {
                        $(".consignee-title").change(function()
                        {
                        var id=$(this).val();
                        var post_id = 'pid='+ id;

                        $.ajax
                        ({
                        type: "POST",
                        url: "controllers/ajax-order-add.php",
                        data: post_id,
                        cache: false,
                        success: function(cons)
                        {
                        $(".consignee-type").html(cons);
                        } 
                        });

                        });
                        });


                        $(document).ready(function()
                        {
                       var id= $(".upd-consignee-title").val();
                        
                        /*var id=$(this).val();*/
                        var post_id = 'cid='+ id;

                        $.ajax
                        ({
                        type: "POST",
                        url: "controllers/ajax-order-edit.php",
                        data: post_id,
                        cache: false,
                        success: function(updcons)
                        {
                        $(".updconsignee-type").html(updcons);

                        } 
                        });

                        });

                        $(document).ready(function()
                        {
                        $(".upd-consignee-title").change(function()
                        {
                        var id=$(this).val();
                        var post_id = 'pid='+ id;

                        $.ajax
                        ({
                        type: "POST",
                        url: "controllers/ajax-order-edit.php",
                        data: post_id,
                        cache: false,
                        success: function(cons)
                        {
                        $(".updconsignee-type").html(cons);
                        } 
                        });

                        });
                        });
                        
                      </script>
                    </div>
                  </div>
                  <!-- /basic layout -->
                </div>  
              </div>

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>
