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
                                //$sql = "SELECT SUM(order_total) FROM order_new";
                                //$result = $conn->query($sql);

                                //if ($result->num_rows > 0) {
                                  // output data of each row
                                  //while($row = $result->fetch_assoc()) {
                                    //echo "Total Order: " . $row["SUM(order_total)"];
                                $sel="SELECT as_on_date FROM `consignee` WHERE entry_type='Region'";
                                $rs=$conn->query($sel);
                                $row=$rs->fetch_assoc();
                                $date=$row['as_on_date'];
                                

                                $sel_ord="SELECT SUM(order_total)  FROM `order_new` WHERE order_date>='$date'";
                                $rs=$conn->query($sel_ord);
                                while($row=$rs->fetch_assoc()){
                                 ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo $row['SUM(order_total)'];?></h3>
                                <p class="mb-0">Total Order</p>
                                <?php 
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

                                <?php
                                 $sel_pay="SELECT  SUM(payment.payment_amt) AS naws_pay_sum FROM payment INNER JOIN consignee ON payment.payment_by=consignee.id WHERE entry_type='Region'";
                                      $pay_conn=$conn->query($sel_pay);
                                      $naws_pay_sum=$pay_conn->fetch_assoc();
                                      
                                      
                                      $sel_shr="SELECT * FROM lds_share";
                                      $shr_conn=$conn->query($sel_shr);
                                      $shr_row=$shr_conn->fetch_assoc();
                                      $shr_total=$shr_row['sosona_share_pct'] + $shr_row['area_share_pct'];
                                      

                                      $sel_con="SELECT * FROM consignee WHERE entry_type='Region'";
                                      $rs_con=$conn->query($sel_con);
                                      $con_row=$rs_con->fetch_assoc();
                                      $opening_bal=$con_row['opening_bal_amt'];
                                      

                                      $sel_order="SELECT SUM(order_new.order_total) AS order_total_sum  FROM order_new";
                                      $rs=$conn->query($sel_order);
                                      $order_total=$rs->fetch_assoc();
                                      
                                      
                                      $total_shr_amt=($shr_total / 100) * implode('', $order_total);
                                      
                                      $opn_bal_ord_total_sum=$opening_bal+implode('', $order_total);
                                      
                                        $naws_total=round($opn_bal_ord_total_sum - $total_shr_amt - implode('', $naws_pay_sum),2);


                                
                               echo" <h3 class='font-weight-semibold mb-0'><i class='fas fa-rupee-sign'></i>$naws_total</h3>";
                                ?>
                                <p class="mb-0">Total payable to NAWS</p>
                                 <?php
                                $sql = "SELECT * FROM payment INNER JOIN consignee ON consignee.id=payment.payment_by WHERE entry_type='Region' ORDER BY payment.payment_date DESC LIMIT 1";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                    ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Payment: <span class=""><?php  echo $row['payment_amt'] ?></span> | <span class=""><?php  echo $row['payment_date'] ?></span></small></p>
                              <?php }  
                               }
                              ?>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card bg-teal text-white h-100">
                            <div class="card-body">
                                <?php
                                $sql = "SELECT SUM(opening_bal_amt), SUM(area_billing_amt), SUM(payment_amt) FROM consignee LEFT JOIN order_new ON order_new.consignee_id=consignee.id LEFT JOIN payment ON payment.payment_by=consignee.id WHERE consignee.entry_type = 'Area'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    $total_recev_all_areas = ($row["SUM(opening_bal_amt)"] + $row["SUM(area_billing_amt)"]) - $row["SUM(payment_amt)"]. "<br>";
                                    //echo "Total receivable Area Amt: " . $total_recev_all_areas;
                                 ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo $total_recev_all_areas;?></h3>
                                <p class="mb-0">Total receivable from All Areas</p>
                                <?php 
                                    }
                                }
                                 ?>
                                 <?php
                                $sql = "SELECT consignee.name, consignee.entry_type, payment.payment_by, payment.payment_date, payment.payment_amt FROM payment INNER JOIN consignee ON payment.payment_by=consignee.id WHERE consignee.entry_type = 'Area' ORDER BY payment.payment_date DESC LIMIT 1";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    //echo "Last Receipt: " . $row["payment_amt"] . "<br>";
                                    //echo "Name (Type): " . $row["name"] . "<br>";
                                    //echo "Last Order Date: " . $row["payment_date"] . "<br>";

                                 ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Receipt: <span class=""><?php echo $row['payment_amt'];?></span> | <span class=""><?php echo $row['name'];?></span> | <span class=""><?php echo $row['payment_date'];?></span></small></p>
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
                                <?php
                                $sql = "SELECT SUM(opening_bal_amt), SUM(area_billing_amt), SUM(payment_amt) FROM consignee LEFT JOIN order_new ON order_new.consignee_id=consignee.id LEFT JOIN payment ON payment.payment_by=consignee.id WHERE consignee.entry_type = 'Group'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    $total_recev_all_groups = ($row["SUM(opening_bal_amt)"] + $row["SUM(area_billing_amt)"]) - $row["SUM(payment_amt)"]. "<br>";
                                    //echo "Total receivable Area Amt: " . $total_recev_all_groups;
                                 ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo $total_recev_all_groups;?></h3>
                                <p class="mb-0">Total receivable from Others</p>
                                <?php 
                                    }
                                }
                                 ?>
                                 <?php
                                $sql = "SELECT consignee.name, consignee.entry_type, payment.payment_by, payment.payment_date, payment.payment_amt FROM payment INNER JOIN consignee ON payment.payment_by=consignee.id WHERE consignee.entry_type = 'Group' ORDER BY payment.payment_date DESC LIMIT 1";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    //echo "Last Receipt: " . $row["payment_amt"] . "<br>";
                                    //echo "Name (Type): " . $row["name"] . "<br>";
                                    //echo "Last Order Date: " . $row["payment_date"] . "<br>";

                                 ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Receipt: <span class=""><?php echo $row['payment_amt'];?></span> | <span class=""><?php echo $row['name'];?></span> | <span class=""><?php echo $row['payment_date'];?></span></small></p>
                                <?php 
                                    }
                                }
                                 ?>
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