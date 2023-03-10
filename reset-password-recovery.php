<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'SOSONA | Reset Password Recovery';
include "includes/header.php";
?>
<!-- Page content -->
<div class="page-content">

	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Inner content -->
		<div class="content-inner">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Password recovery form -->
				<form class="login-form" action="controllers/reset-password-recovery-do.php" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="assets/images/na-lgo-blue.svg" class="w-25 mb-2" alt="">
								<h5 class="mb-0 font-weight-bold">Password recovery</h5>
								<span class="d-block text-muted">Update your Password here</span>
							</div>
							<?php

							if (isset($_SESSION['emailuser']) == TRUE) {

							 ?>
							<div>
								<?php
					              if (isset($_SESSION['status']) && $_SESSION['status'] == "error") {
					                  unset($_SESSION['status']);
					                  ?>

					                  <div class="alert alert-danger border-0 p-2">
					                      <span class="font-weight-semibold"><?php echo $_SESSION['status_msg']; ?></span>
					                  </div>

					                  <?php
					              } else if (isset($_SESSION['status']) && $_SESSION['status'] == "success") {
					                  unset($_SESSION['status']);
					                  ?>

					                  <div class="alert alert-success border-0 p-2">
					                      <span class="font-weight-semibold"><?php echo $_SESSION['status_msg']; ?></span>
					                  </div>

					            <?php } ?>
							</div>

	                        <div>
	                          <label>New Password:<span class="text-danger">*</span></label>
	                          <div class="form-group form-group-feedback form-group-feedback-left">
	                            <input type="password" name="new_pass" class="form-control npr-form-control-icon" placeholder="Password" required>
	                            <div class="form-control-feedback">
	                              <i class="icon-lock2 text-muted"></i>
	                            </div>
	                            <div class="form-control-feedback view-password">
	                                <i class="icon-eye-blocked2 text-muted new-password-icon"></i>
	                            </div>
	                          </div>
	                        </div>
	                        <div>
	                          <label>Confirm Password:<span class="text-danger">*</span></label>
	                          <div class="form-group form-group-feedback form-group-feedback-left">
	                            <input type="password" name="confirm_pass" class="form-control cpr-form-control-icon" placeholder="Password" required>
	                            <div class="form-control-feedback">
	                              <i class="icon-lock2 text-muted"></i>
	                            </div>
	                            <div class="form-control-feedback view-password">
	                                <i class="icon-eye-blocked2 text-muted confirm-password-icon"></i>
	                            </div>
	                          </div>
	                        </div>
	                        <input type="hidden" name="usermail" value="<?php echo $_SESSION['emailuser']; ?>">
	                        <div class="form-group">
	                          <button type="submit" name="submit" class="btn btn-primary btn-block">Change</button>
	                        </div>
	                        <div class="text-center">
								<a href="login.php">Log in</a>
							</div>
	                        <?php 

	                         }
	                         else{	                 
							?>
							<div class="alert alert-danger border-0 p-2 text-center">
		                      <span class="font-weight-semibold">Link Expired</span>
		                  	</div>
		                  	<?php 
		                  	}
							?>
						</div>
					</div>
				</form>
				<!-- /password recovery form -->

			</div>
			<!-- /content area -->