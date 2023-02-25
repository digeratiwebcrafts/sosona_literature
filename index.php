<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Dashboard';
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
                        <h4><span class="font-weight-semibold">Dashboard</span></h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <div class="card bg-info text-white h-100">
                            <div class="card-body">
                                <?php
                                $sql = "SELECT SUM(order_total) FROM order_new";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    //echo "Total Order: " . $row["SUM(order_total)"];
                                 ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo $row['SUM(order_total)'];?></h3>
                                <p class="mb-0">Total Order</p>
                                <?php 
                                    }
                                }
                                 ?>
                                 <?php
                                $sql = "SELECT consignee.name, consignee.entry_type, order_new.consignee_id, order_new.order_date, order_new.order_total FROM order_new INNER JOIN consignee ON order_new.consignee_id=consignee.id ORDER BY order_new.order_date DESC LIMIT 1;";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    //echo "Last Order: " . $row["order_total"] . "<br>";
                                    //echo "Name (Type): " . $row["consignee_id"] . "<br>";
                                    //echo "Last Order Date: " . $row["order_date"] . "<br>";

                                 ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Order: <span class=""><?php echo $row['order_total'];?></span> | <span class=""><?php echo $row['name'];?></span> <span class="">(<?php echo $row['entry_type'];?>)</span> | <span class=""><?php echo $row['order_date'];?></span></small></p>
                                <?php 
                                    }
                                }
                                 ?>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card bg-pink text-white h-100">
                            <div class="card-body">
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i>38,289</h3>
                                <p class="mb-0">Total payable to NAWS</p>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Payment: <span class="">1000.00</span> | <span class="">22-02-23</span></small></p>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card bg-teal text-white h-100">
                            <div class="card-body">
                                <?php
                                $sql = "SELECT SUM(consignee.opening_bal_amt), SUM(order_new.area_billing_amt), SUM(payment.payment_amt) FROM order_new INNER JOIN consignee ON order_new.consignee_id=consignee.id INNER JOIN payment ON order_new.consignee_id=payment.payment_by WHERE consignee.entry_type = 'Area'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    //echo "Total Opening Bal. Area Amt: " . $row["SUM(consignee.opening_bal_amt)"]. "<br>";
                                    //echo "Total Area Billing Amt: " . $row["SUM(order_new.area_billing_amt)"]. "<br>";
                                    //echo "Total Payment. Area Amt: " . $row["SUM(payment.payment_amt)"]. "<br>";
                                    $total_recev_all_areas = ($row["SUM(consignee.opening_bal_amt)"] + $row["SUM(order_new.area_billing_amt)"]) - $row["SUM(payment.payment_amt)"]. "<br>";
                                    //echo "Total receivable Area Amt: " . $total_recev_all_areas;
                                 ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo $total_recev_all_areas;?></h3>
                                <p class="mb-0">Total receivable from All Areas</p>
                                <?php 
                                    }
                                }
                                 ?>
                                 <?php
                                $sql = "SELECT consignee.name, consignee.entry_type, order_new.consignee_id, order_new.order_date, order_new.order_total FROM order_new INNER JOIN consignee ON order_new.consignee_id=consignee.id WHERE consignee.entry_type = 'Area' ORDER BY order_new.order_date DESC LIMIT 1;";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    //echo "Last Order: " . $row["order_total"] . "<br>";
                                    //echo "Name (Type): " . $row["consignee_id"] . "<br>";
                                    //echo "Last Order Date: " . $row["order_date"] . "<br>";

                                 ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Receipt: <span class=""><?php echo $row['order_total'];?></span> | <span class=""><?php echo $row['name'];?></span> | <span class=""><?php echo $row['order_date'];?></span></small></p>
                                <?php 
                                    }
                                }
                                 ?>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card bg-warning text-white h-100">
                            <div class="card-body">
                                
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i>38,289</h3>
                                <p class="mb-0">Total receivable from Others</p>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Receipt: <span class="">1000.00</span> | <span class="">Name</span> | <span class="">22-02-23</span></small></p>
                            </div>
                        </div>  
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="">
                                <h5 class="card-title bb-1 mb-0 px-3 py-2">Areas</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-1">
                                        <label class="font-weight-bold">#</label>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Area Name</label>
                                    </div>
                                    <div class="col-5">
                                        <label class="font-weight-bold">Total Receivable</label>
                                    </div>       
                                </div>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0">1</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="#">Abced Name</a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0">5000.00</p>
                                    </div>       
                                </div>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0">2</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="#">Abced Name</a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0">5000.00</p>
                                    </div>       
                                </div>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0">3</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="#">Abced Name</a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0">5000.00</p>
                                    </div>       
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="">
                                <h5 class="card-title bb-1 mb-0 px-3 py-2">Others</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-1">
                                        <label class="font-weight-bold">#</label>
                                    </div>
                                    <div class="col-6">
                                        <label class="font-weight-bold">Other Name</label>
                                    </div>
                                    <div class="col-5">
                                        <label class="font-weight-bold">Total Receivable</label>
                                    </div>       
                                </div>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0">1</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="#">Abced Name</a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0">5000.00</p>
                                    </div>       
                                </div>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0">2</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="#">Abced Name</a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0">5000.00</p>
                                    </div>       
                                </div>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0">3</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="#">Abced Name</a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0">5000.00</p>
                                    </div>       
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>