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
                                 $sel="SELECT as_on_date FROM `consignee` WHERE entry_type='Region'";
                                $rs=$conn->query($sel);
                                $row_date=$rs->fetch_assoc();
                                $date=$row_date['as_on_date'];

                                 $sql = "SELECT SUM(order_total) FROM order_new";
                                 $result = $conn->query($sql);

                                  if ($result->num_rows > 0) {
                                  //output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    //echo "Total Order: " . $row["SUM(order_total)"];
                                    $total_order = round($row['SUM(order_total)'],2);

                                
                                

                                //$sel_ord="SELECT SUM(order_total)  FROM `order_new` WHERE order_date>='$date'";
                                //$rs=$conn->query($sel_ord);
                                //while($row=$rs->fetch_assoc()){
                                 ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo number_format((float)$total_order, 2, '.', '');?></h3>
                                <p class="mb-0">Total Order Since <span class="font-weight-bold"><?php echo $date ?></span> </p>
                                <?php 
                                    }
                                }else{ 

                                ?>
                                   <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo round($row['SUM(order_total)'],2);?></h3>
                                    <p class="mb-0">Total Order Since <span class="font-weight-bold">No Record Found</span> </p>
                                <?php 
                                    }
                                 ?>
                                 <?php
                                $sql = "SELECT consignee.name, consignee.entry_type, order_new.consignee_id, order_new.order_date, order_new.order_total FROM order_new INNER JOIN consignee ON order_new.consignee_id=consignee.id ORDER BY order_new.id DESC, order_new.order_date DESC LIMIT 1;";
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
                                }else{
                                    ?>
                                    <p class="mb-0 sm-lh opacity-75"><small>Last Order: <span class="">0.00</span> | <span class="">No Record Found</span> <span class=""></span> | <span class="">No Record Found</span></small></p>

                                 <?php
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


                                
                               echo" <h3 class='font-weight-semibold mb-0'><i class='fas fa-rupee-sign'></i>". number_format((float)$naws_total, 2, '.', '') . "</h3>";
                                ?>
                                <p class="mb-0">Total payable to NAWS</p>
                                 <?php
                                $sql = "SELECT * FROM payment INNER JOIN consignee ON consignee.id=payment.payment_by WHERE entry_type='Region' ORDER BY payment.id DESC, payment.payment_date DESC LIMIT 1";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                    ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Payment: <span class=""><?php  echo $row['payment_amt'] ?></span> | <span class=""><?php  echo $row['payment_date'] ?></span></small></p>
                              <?php }  
                               }else{
                                ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Payment: <span class="">0.00</span> | <span class="">No Record Found</span></small></p>
                                <?php
                               }
                              ?>
                            </div>
                        </div>   
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card bg-teal text-white h-100">
                            <div class="card-body">
                                <?php
                                $sel_con="SELECT SUM(opening_bal_amt) AS sum_opening_bal_amt  FROM consignee WHERE entry_type='Area'";
                                $rs_con=$conn->query($sel_con);
                                $con_row=$rs_con->fetch_assoc();
                                
                                $sel_ord_bill="SELECT SUM(order_new.area_billing_amt) AS area_billing_sum FROM order_new INNER JOIN consignee ON order_new.consignee_id=consignee.id WHERE entry_type='Area'";
                                $rs_con=$conn->query($sel_ord_bill);
                                $Area_bill_row=$rs_con->fetch_assoc();
                                
                                $sel_pay="SELECT  SUM(payment.payment_amt) AS area_pay_sum FROM payment INNER JOIN consignee ON payment.payment_by=consignee.id WHERE entry_type='Area'";
                                $pay_conn=$conn->query($sel_pay);
                                $Area_pay_sum=$pay_conn->fetch_assoc();
                                
                                $total_recev_all_areas= round(implode('', $con_row)+implode('',$Area_bill_row)-implode('',$Area_pay_sum),2);
                                    //echo "Total receivable Area Amt: " . $total_recev_all_areas;
                                 ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo number_format((float)$total_recev_all_areas, 2, '.', '');?></h3>
                                <p class="mb-0">Total receivable from All Areas</p>
                                
                                 <?php
                                $sql = "SELECT consignee.name, consignee.entry_type, payment.payment_by, payment.payment_date, payment.payment_amt FROM payment INNER JOIN consignee ON payment.payment_by=consignee.id WHERE consignee.entry_type = 'Area' ORDER BY payment.id DESC, payment.payment_date DESC LIMIT 1";
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
                                }else{ 
                                ?>

                                <p class="mb-0 sm-lh opacity-75"><small>Last Receipt: <span class="">0.00</span> | <span class="">No Record Found</span> | <span class="">No Record Found</span></small></p>

                                <?php 
                                }
                                 ?>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card bg-warning text-white h-100">
                            <div class="card-body">
                                <?php
                              $sel_con="SELECT SUM(opening_bal_amt) AS sum_opening_bal_amt  FROM consignee WHERE entry_type='Group'";
                                $rs_con=$conn->query($sel_con);
                                $con_row=$rs_con->fetch_assoc();
                                
                                $sel_ord_bill="SELECT SUM(order_new.area_billing_amt) AS group_billing_sum FROM order_new INNER JOIN consignee ON order_new.consignee_id=consignee.id WHERE entry_type='Group'";
                                $rs_con=$conn->query($sel_ord_bill);
                                $G_bill_row=$rs_con->fetch_assoc();
                                
                                $sel_pay="SELECT  SUM(payment.payment_amt) AS group_pay_sum FROM payment INNER JOIN consignee ON payment.payment_by=consignee.id WHERE entry_type='Group'";
                                $pay_conn=$conn->query($sel_pay);
                                $Group_pay_sum=$pay_conn->fetch_assoc();
                                
                                $total_recev_all_groups= round(implode('', $con_row)+implode('',$G_bill_row)-implode('',$Group_pay_sum),2);
                                    //echo "Total receivable Area Amt: " . $total_recev_all_groups;
                                ?>
                                <h3 class="font-weight-semibold mb-0"><i class="fas fa-rupee-sign"></i><?php echo number_format((float)$total_recev_all_groups, 2, '.', '');?></h3>
                                <p class="mb-0">Total receivable from Others</p>
                                 
                                 <?php
                                $sql = "SELECT consignee.name, consignee.entry_type, payment.payment_by, payment.payment_date, payment.payment_amt FROM payment INNER JOIN consignee ON payment.payment_by=consignee.id WHERE consignee.entry_type = 'Group' ORDER BY payment.id DESC, payment.payment_date DESC LIMIT 1";
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
                                }else{ 

                                ?>
                                <p class="mb-0 sm-lh opacity-75"><small>Last Receipt: <span class="">0.00</span> | <span class="">No Record Found</span> | <span class="">No Record Found</span></small></p>
                                <?php
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
                                <?php
                                $sel_ar_billing="SELECT SUM(order_new.area_billing_amt) AS area_billing_sum ,consignee.name,consignee.opening_bal_amt,consignee.id AS consignee_id  FROM order_new RIGHT JOIN consignee ON order_new.consignee_id=consignee.id WHERE entry_type='Area' group by consignee.id";

                                 $arbilling_conn=$conn->query($sel_ar_billing);

                                 $sel="SELECT SUM(payment.payment_amt) AS Area_pay_sum FROM payment RIGHT JOIN consignee ON payment.payment_by=consignee.id WHERE entry_type='Area' group by consignee.id";
                                 $rs=$conn->query($sel);

                                 if($rs->num_rows > 0){

                                 $counter = 0;
                                while (($row=$arbilling_conn->fetch_assoc() AND $row1=$rs->fetch_assoc()) || ($row=$arbilling_conn->fetch_assoc() OR $row1=$rs->fetch_assoc())){


                                $sum=round($row['opening_bal_amt'] + $row['area_billing_sum'] - $row1['Area_pay_sum'],2);

                                ?>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0"><?php echo ++$counter; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="accounts.php?&consigneeId=<?=$row['consignee_id']?>"><?php  echo $row['name'] ?></a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0"><i class="fas fa-rupee-sign sm-icon"></i><?php echo number_format((float)$sum, 2, '.', '');?></p>
                                    </div>       
                                </div>
                            <?php 
                          }
                      }else{
                        ?>
                        <div class="row alternate-row">
                           <div class="col-12 text-center">No Record Found</div>               
                        </div>

                      <?php 
                        }

                             ?>
                                <!-- <div class="row alternate-row">
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
                                </div> -->
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

                            
                             <?php
                                
                                 $sel_gr_billing="SELECT SUM(order_new.area_billing_amt) AS group_billing_sum ,consignee.name,consignee.opening_bal_amt,consignee.id AS consignee_id  FROM order_new RIGHT JOIN consignee ON order_new.consignee_id=consignee.id WHERE entry_type='Group' group by consignee.id";

                                 $grbilling_conn=$conn->query($sel_gr_billing);

                                 $sel="SELECT SUM(payment.payment_amt) AS group_pay_sum FROM payment RIGHT JOIN consignee ON payment.payment_by=consignee.id WHERE entry_type='Group' group by consignee.id";
                                 $rs=$conn->query($sel);
                                 if($rs->num_rows > 0){
                                 $counter = 0;
                                while (($row=$grbilling_conn->fetch_assoc() AND $row1=$rs->fetch_assoc()) || ($row=$grbilling_conn->fetch_assoc() OR $row1=$rs->fetch_assoc())){


                                $sum=round($row['opening_bal_amt']+$row['group_billing_sum']-$row1['group_pay_sum'],2);

                                ?>
                                <div class="row alternate-row">
                                    <div class="col-1">
                                        <p class="mb-0"><?php echo ++$counter; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0"><a href="accounts.php?&consigneeId=<?=$row['consignee_id']?>"><?php  echo $row['name'] ?></a></p>
                                    </div>
                                    <div class="col-5">
                                        <p class="mb-0"><i class="fas fa-rupee-sign sm-icon"></i><?php echo number_format((float)$sum, 2, '.', '');?></p>
                                    </div>       
                                </div>
                                <?php }
                                    }

                                else{
                                ?>
                        <div class="row alternate-row">
                           <div class="col-12 text-center">No Record Found</div>               
                        </div>

                      <?php 
                        }

                             ?>
                                <!-- <div class="row alternate-row">
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
                                </div> -->
                            </div>
                        </div>  
                    </div>
                </div>

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>