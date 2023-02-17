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
                    <div class="page-title d-flex">
                        <h4><span class="font-weight-semibold">Dashboard</span></h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

            

            </div>
            <!-- /content area -->

<?php include "includes/footer.php"; ?>