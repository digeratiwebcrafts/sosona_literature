<?php
$pageTitle = 'Accounts';
include "includes/header.php";
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
                        <h4 class="mr-auto"><span class="font-weight-semibold">Accounts</span></h4>
                        <a href="pdf.php" class="btn btn-indigo"><i class="icon-file-pdf mr-2"></i> Export to .pdf</a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                      <label>Select Area / Group:</label>
                                      <select class="form-control " name="filter_name"  >
                                        <option >All</option>
                                        <option value="Area"   <?php if($_SESSION['filter_name'] == 'Area'){echo 'selected';} ?> >Area</option>
                                        <option value="Group" <?php if($_SESSION['filter_name'] == 'Group'){echo 'selected';} ?>>Group</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-0 mt-sm-2">
                                  <input type="hidden" name="command" value="1"/>
                                  <button type="submit" class="btn btn-primary">Filter</button>
                                   <a href="accounts.php?flag=reset" class="btn btn-warning">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- area -->
                <?php
                
                if(!empty($consigneeLists))
                {
                	
					foreach($consigneeLists AS $consigneeListsVal)
					{
						?>
							
					<div class="mb-3">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <h5 class="bg-dark text-white text-center p-2"><?=$consigneeListsVal['entry_type']?> Accounts</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="col-7 col-sm-9">
                                    <p class="mb-0"><span class="font-weight-bold"><?=$consigneeListsVal['name']?> (<?=$consigneeListsVal['entry_type']?> )</span> Opening Bal., as on <span class="font-weight-bold"><?=$consigneeListsVal['as_on_date']?></span></p>
                                </div>
                                <div class="col-5 col-sm-3 text-right">
                                    <span class="badge badge-teal font-weight-bold ml-auto"><?=$consigneeListsVal['opening_bal_amt']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Basic table -->
                            <div class="card h-100">
                                <div class="table-responsive">
                                    <table class="table">  
                                        <thead>
                                            <tr class="text-center bg-info-100">
                                                <th colspan="5">Orders</th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Order Date</th>
                                                <th>Naws Order Id</th>
                                                <th>Order Total</th>
                                                <th>Area Share</th>
                                                <th>Area Billing</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         	<?php
                                         	$consigneeOrderLists = $functions->consigneeOrderLists($consigneeListsVal['id'],'N');
                                         	 if(!empty($consigneeOrderLists))
                                         	 {
                                         	 	$total_order_amnt = 0.00;
							                    $total_area_share_amnt = 0.00;
							                    $total_area_billing_amnt = 0.00;
                    
											 	foreach($consigneeOrderLists AS $consigneeOrderListsVal)
											 	{
											 		?>
											 		 <tr>
		                                                <td><?=date("d-m-Y", strtotime($consigneeOrderListsVal['order_date']) )?></td>
		                                                <td>#<?=$consigneeOrderListsVal['naws_order_id']?></td>
		                                                <td><?=$consigneeOrderListsVal['order_total']?></td>
		                                                <td><?=$consigneeOrderListsVal['area_share_amt']?></td>
		                                                <td><?=$consigneeOrderListsVal['area_billing_amt']?></td>
                                            		</tr>
                                           
											 		<?php
														$total_order_amnt =  $total_order_amnt + (float)$consigneeOrderListsVal['order_total'];
														$total_area_share_amnt =  $total_area_share_amnt + (float)$consigneeOrderListsVal['area_share_amt'];
														$total_area_billing_amnt =  $total_area_billing_amnt + (float)$consigneeOrderListsVal['area_billing_amt'];
												}
												
												?>
												<tr class="bg-purple-100">
                                                <td colspan="2" class="font-weight-bold">Total:</td>
                                                <td><?=number_format((float)$total_order_amnt, 2, '.', '')?></td>
                                                <td><?=number_format((float)$total_area_share_amnt, 2, '.', '')?></td>
                                                <td><?=number_format((float)$total_area_billing_amnt, 2, '.', '')?></td>
                                            	</tr>
												<?php
											 }
											 else
											 {
											 	
											 	echo '<tr><td colspan=4> Sorry No Order Found</td></tr>';
											 	$total_order_amnt = 0.00;
							                    $total_area_share_amnt = 0.00;
							                    $total_area_billing_amnt = 0.00;
											 }
                                         	?>
                                          
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /basic table -->
                        </div>
                        <div class="col-md-6">
                            <!-- Basic table -->
                            <div class="card h-100">
                                <div class="table-responsive">
                                    <table class="table"> 
                                        <thead>
                                            <tr class="text-center bg-info-100">
                                                <th colspan="4">Payments</th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Payment Date</th>
                                                <th>Payment Amount</th>
                                                <th>Payment Mode</th>
                                                <th>Payment Ref. No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        		$consigneePaymentLists = $functions->consigneePaymentLists($consigneeListsVal['id'],'N');
                                        		if(!empty($consigneePaymentLists))
                                        		{
                                        			$total_payment_amnt = 0.00;
                                        			foreach($consigneePaymentLists AS $consigneePaymentListsVal)
                                        			{
                                        				?>
			                                        		<tr>
			                                                <td><?=date("d-m-Y", strtotime($consigneePaymentListsVal['payment_date']) )?></td>
			                                                <td><?=$consigneePaymentListsVal['payment_amt']?></td>
			                                                <td><?=$consigneePaymentListsVal['payment_mode']?></td>
			                                                <td><?=$consigneePaymentListsVal['payment_ref_number']?></td>			                                                		</tr>
                                        				
                                        				<?php
                                        				
														$total_payment_amnt =  $total_payment_amnt + (float)$consigneePaymentListsVal['payment_amt'];
													}
													?>
															<tr class="bg-purple-100">
		                                                	<td class="font-weight-bold">Total:</td>
		                                                	<td colspan="3"><?=number_format((float)$total_payment_amnt, 2, '.', '')?></td>
		                                            		</tr>
													<?php
													
													
												}
												else
												{
													echo '<tr><td colspan=4> Sorry No Payment Record Found</td></tr>';
													$total_payment_amnt = 0.00;
												}
                                        	
                                        	?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /basic table -->
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="row mt-3">
                                <div class="col-7 col-sm-9">
                                    <p class="mb-0"><span class="font-weight-bold">Total Dues</span> to SOSONA as on <span class="font-weight-bold"><?= date('d-m-Y')?></span></p>
                                </div>
                                <div class="col-5 col-sm-3 text-right">
                                <?php  $dues = (number_format((float)$consigneeListsVal['opening_bal_amt'], 2, '.', '')+ number_format((float)$total_area_billing_amnt, 2, '.', ''))- number_format((float)$total_payment_amnt, 2, '.', ''); ?>
                                    <span class="badge badge-warning font-weight-bold ml-auto"><?= number_format((float)$dues, 2, '.', '') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
						<?php
						
						
					}
				}
                
                ?>
                
                <!-- /area -->
                <!-- group -->
                
                <!-- /group -->

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>