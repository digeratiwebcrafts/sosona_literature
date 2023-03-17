<?php
include("lib/start.php");
include("lib/config.php");
include("lib/connect.php");
include("class/functions.php"); 
require_once('vendor/autoload.php'); 
$mpdf = new \Mpdf\Mpdf();  
$functions = new functions();
$functions->validUser();
$consigneeId = isset($_REQUEST['consigneeId'])?$_REQUEST['consigneeId']:'';
$currtime = date("Y-m-d h:i:s");
?>

<?php
if(!empty($consigneeId))
{
$consigneeLists = $functions->consigneeLists($consigneeId,'','N');	
}
else
{
$consigneeId = $_SESSION['filter_name'];
$consigneeLists = $functions->consigneeLists($consigneeId,'','N');	
}
$countConsignee = count($consigneeLists);

if($countConsignee > 1)
{
    $pdfName  =  'All-Areas-Groups-LDS-Accounts-'.date("d/m/Y");
}
else
{
	$pdfName = '';
	if(!empty($consigneeLists))
		{
	
	foreach($consigneeLists AS $consigneeListsVal)
					{
						$pdfName .= $consigneeListsVal['name'].'-'.$consigneeListsVal['entry_type'].'-LDS-Accounts-'.date("d/m/Y");
					}
		}
	
}

$content = '';
if(!empty($consigneeLists))
{
	
	foreach($consigneeLists AS $consigneeListsVal)
					{
				
			$content .= '<div class="content_holder" style="page-break-after:auto;">';
			$content .=	'<div class="row">
                        
                            <h5 style="background:#252b36;color: #fff;font-size: 1.125rem;text-align: center;  margin-bottom:0.625rem;font-weight: 400;line-height:1.5715;padding:10px;margin-top:20px;">'.$consigneeListsVal['name'].' '.$consigneeListsVal['entry_type'].' Account</h5>
                        
                    </div>';
            $content .=	 '<div class="row">

                        <div class="col-6" style="width: 50%;">
                            <div class="row">
                                <div class="col" style="width:60%;display: flex;float: left;">
                                    <p style="font-size:12px;width:100%;"><strong>'.$consigneeListsVal['name'].' ( '.$consigneeListsVal['entry_type'].' )</strong> Opening Bal., as on <strong>'.$consigneeListsVal['as_on_date'].'</strong></p>
                                </div>
                                <div class="col" style="width: 35%;float: right;display: flex;padding-left:10px">
                                    <p style="font-size:12px;color: #fff;background: #26a69a;text-align: center;padding: 5px 7px;width:100%;"><strong>'.$consigneeListsVal['opening_bal_amt'].'</strong></p>
                                </div>
                            </div>
                        </div>
                     
                    </div>';
                      $content .=	 '<div class="row">
                         <table>
                        <tr>
                            <td width="50%" style="vertical-align: top;">
                          
                                
                                    <table class="ord-table" style="page-break-inside:auto">  
                                        <thead>
                                            <tr style="background:#c5c5c5;text-align:center;padding:15px 0">
                                                <th colspan="5" class="col-heading" style="padding:10px">Orders</th>
                                            </tr>
                                        </thead>
                                        <thead class="or-heading">
                                            <tr>
                                                <th style="border:1px solid #000;font-size:10pt">Order Date</th>
                                                <th style="border:1px solid #000;font-size:10pt">Naws Order Id</th>
                                                <th style="border:1px solid #000;font-size:10pt">Order Total</th>
                                                <th style="border:1px solid #000;font-size:10pt">Area Share</th>
                                                <th style="border:1px solid #000;font-size:10pt">Area Billing</th>

                                            </tr>
                                        </thead>
                                        <tbody>';
                                       $consigneeOrderLists = $functions->consigneeOrderLists($consigneeListsVal['id'],'N');
                                         	 if(!empty($consigneeOrderLists))
                                         	 {
                                         	 	$total_order_amnt = 0.00;
							                    $total_area_share_amnt = 0.00;
							                    $total_area_billing_amnt = 0.00;
                    
											 	foreach($consigneeOrderLists AS $consigneeOrderListsVal)
											 	{
											 		
											 		$content .='<tr>
		                                                <td style="border:1px solid #000">'.date("d-m-Y", strtotime($consigneeOrderListsVal['order_date']) ).'</td>
		                                                <td style="border:1px solid #000">#'.$consigneeOrderListsVal['naws_order_id'].'</td>
		                                                <td style="border:1px solid #000">'.$consigneeOrderListsVal['order_total'].'</td>
		                                                <td style="border:1px solid #000">'.$consigneeOrderListsVal['area_share_amt'].'</td>
		                                                <td style="border:1px solid #000">'.$consigneeOrderListsVal['area_billing_amt'].'</td>
                                            		</tr>';
                                           
											 		
														$total_order_amnt =  $total_order_amnt + (float)$consigneeOrderListsVal['order_total'];
														$total_area_share_amnt =  $total_area_share_amnt + (float)$consigneeOrderListsVal['area_share_amt'];
														$total_area_billing_amnt =  $total_area_billing_amnt + (float)$consigneeOrderListsVal['area_billing_amt'];
												}
												
												
												$content .='<tr class="bg-purple-100">
                                                <td colspan="2" class="font-weight-bold" style="border:1px solid #000">Total:</td>
                                                <td style="border:1px solid #000">'.number_format((float)$total_order_amnt, 2, '.', '').'</td>
                                                <td style="border:1px solid #000">'.number_format((float)$total_area_share_amnt, 2, '.', '').'</td>
                                                <td style="border:1px solid #000">'.number_format((float)$total_area_billing_amnt, 2, '.', '').'</td>
                                            	</tr>';
												
											 }
											 else
											 {
											 	
											 	$content .= '<tr><td colspan="5" style="border:1px solid #000"> Sorry No Order Record Found</td></tr>';
											 	$total_order_amnt = 0.00;
							                    $total_area_share_amnt = 0.00;
							                    $total_area_billing_amnt = 0.00;
											 }
                                       $content .= ' </tbody>
                                   
                                    </table>
                            
                           </td>';
                          $content .= '
                        
                                <td  width="50%" style="vertical-align: top;">
                                    <table class="table" style="page-break-inside:auto">  
                                        <thead>
                                            <tr style="background:#c5c5c5;text-align:center;">
                                                <th colspan="4" class="col-heading" style="padding:10px">Payments</th>
                                            </tr>
                                        </thead>
                                        <thead class="tb-heading">
                                            <tr>
                                                <th style="border:1px solid #000;font-size:10pt">Payment Date</th>
                                                <th style="border:1px solid #000;font-size:10pt">Payment Amount</th>
                                                <th style="border:1px solid #000;font-size:10pt">Payment Mode</th>
                                                <th style="border:1px solid #000;font-size:10pt">Payment Ref. No.</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        
                                        	$consigneePaymentLists = $functions->consigneePaymentLists($consigneeListsVal['id'],'N');
                                        		if(!empty($consigneePaymentLists))
                                        		{
                                        			$total_payment_amnt = 0.00;
                                        			foreach($consigneePaymentLists AS $consigneePaymentListsVal)
                                        			{
			                                        		$content .= '<tr>
			                                                <td style="border:1px solid #000">'.date("d-m-Y", strtotime($consigneePaymentListsVal['payment_date']) ).'</td>
			                                                <td style="border:1px solid #000">'.$consigneePaymentListsVal['payment_amt'].'</td>
			                                                <td style="border:1px solid #000">'.$consigneePaymentListsVal['payment_mode'].'</td>
			                                                <td style="border:1px solid #000">'.$consigneePaymentListsVal['payment_ref_number'].'</td>			                                                		</tr>';
                                        				
                                        				
                                        				
														$total_payment_amnt =  $total_payment_amnt + (float)$consigneePaymentListsVal['payment_amt'];
													}
													
															$content .='<tr class="bg-purple-100">
		                                                	<td class="font-weight-bold" style="border:1px solid #000">Total:</td>
		                                                	<td colspan="3" style="border:1px solid #000">'.number_format((float)$total_payment_amnt, 2, '.', '').'</td>
		                                            		</tr>';
												
													
													
												}
												else
												{
													$content .= '<tr><td colspan="4" style="border:1px solid #000"> Sorry No Payment Record Found</td></tr>';
													$total_payment_amnt = 0.00;
												}
                                      
                                       $content .= ' </tbody>
                                        
                                    </table> </td>
                                    </tr>
                                    </table>
                              
                         
                    </div>';
                     $dues = (number_format((float)$consigneeListsVal['opening_bal_amt'], 2, '.', '')+ number_format((float)$total_area_billing_amnt, 2, '.', ''))- number_format((float)$total_payment_amnt, 2, '.', '');
                     $content .= '<div class="row">

                        <div class="col-6" style="width: 49%;float: right;">
                            <div class="row" style="display: flex;">
                                <div class="col" style="width:70%;display: flex;float: left;">
                                    <p style="font-size:12px;margin-right:15px;width:100%;"><strong>Total Dues</strong> to SOSONA as on <strong>'.date('d-m-Y').'</strong></p>
                                </div>
                                <div class="col" style="width: 30%;float: right;display: flex;">
                                    <p style="font-size:12px;color: #fff;background: #f58646;text-align: center;padding: 5px 7px;width:100%;"><strong>'.number_format((float)$dues, 2, '.', '').'</strong></p>
                                </div>
                            </div>
                        </div>
                     
                    </div>
						</div>
						<div class="" style="clear: both"></div>';
						         
                 
                
						
					
						
					}
}

$dirHandle = opendir('pdfs');
$randFileName =$pdfName;

$mpdf->pdf_version = '1.5';
$mpdf->SetDisplayMode('fullpage');
$mpdf->shrink_tables_to_fit = 1;
$mpdf->use_kwt = true;
$mpdf->AddPage('','A4-L','','','','5','5','2','0','0','0');
$mpdf->WriteHTML($content,2);

$mpdf->Output(''.$randFileName.'.pdf' , 'D');
$file = 'pdfs/'.$randFileName.'.pdf';



          