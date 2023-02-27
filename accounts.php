<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'Accounts';
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
                        <h4 class="mr-auto"><span class="font-weight-semibold">Accounts</span></h4>
                        <a href="#" class="btn btn-indigo"><i class="icon-file-pdf mr-2"></i> Export to .pdf</a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="">
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                      <label>Select Area / Group:</label>
                                      <select class="form-control select-search" data-fouc data-placeholder="-Select Option-">
                                        <option></option>
                                        <option>Area</option>
                                        <option>Group</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-0 mt-sm-2">
                                  <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- area -->
                <div class="mb-3">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <h5 class="bg-dark text-white text-center p-2">Area Accounts</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="col-7 col-sm-9">
                                    <p class="mb-0"><span class="font-weight-bold">Area Name (Type)</span> Opening Bal., as on <span class="font-weight-bold">insertion_date</span></p>
                                </div>
                                <div class="col-5 col-sm-3 text-right">
                                    <span class="badge badge-teal font-weight-bold ml-auto">154210.00</span>
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
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>#1253</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>#1253</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>#1253</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
                                            <tr class="bg-purple-100">
                                                <td colspan="2" class="font-weight-bold">Total:</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
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
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>5000.00</td>
                                                <td>Cash Deposit</td>
                                                <td>#Adr4</td>
                                            </tr>
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>5000.00</td>
                                                <td>Cash Deposit</td>
                                                <td>#Adr4</td>
                                            </tr>
                                            <tr class="bg-purple-100">
                                                <td class="font-weight-bold">Total:</td>
                                                <td colspan="3">1000.00</td>
                                            </tr>
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
                                    <p class="mb-0"><span class="font-weight-bold">Total Dues</span> to SOSONA as on <span class="font-weight-bold">current_date</span></p>
                                </div>
                                <div class="col-5 col-sm-3 text-right">
                                    <span class="badge badge-warning font-weight-bold ml-auto">50000.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /area -->
                <!-- group -->
                <div class="mb-3">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <h5 class="bg-dark text-white text-center p-2">Group Accounts</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="col-7 col-sm-9">
                                    <p class="mb-0"><span class="font-weight-bold">Group Name (Type)</span> Opening Bal., as on <span class="font-weight-bold">insertion_date</span></p>
                                </div>
                                <div class="col-5 col-sm-3 text-right">
                                    <span class="badge badge-teal font-weight-bold ml-auto">154210.00</span>
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
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>#1253</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>#1253</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>#1253</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
                                            <tr class="bg-purple-100">
                                                <td colspan="2" class="font-weight-bold">Total:</td>
                                                <td>1000.00</td>
                                                <td>100.00</td>
                                                <td>500.00</td>
                                            </tr>
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
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>5000.00</td>
                                                <td>Cash Deposit</td>
                                                <td>#Adr4</td>
                                            </tr>
                                            <tr>
                                                <td>20-02-2023</td>
                                                <td>5000.00</td>
                                                <td>Cash Deposit</td>
                                                <td>#Adr4</td>
                                            </tr>
                                            <tr class="bg-purple-100">
                                                <td class="font-weight-bold">Total:</td>
                                                <td colspan="3">1000.00</td>
                                            </tr>
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
                                    <p class="mb-0"><span class="font-weight-bold">Total Dues</span> to SOSONA as on <span class="font-weight-bold">current_date</span></p>
                                </div>
                                <div class="col-5 col-sm-3 text-right">
                                    <span class="badge badge-warning font-weight-bold ml-auto">50000.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /group -->

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>