<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$pageTitle = 'SOSONA | Reset Password';
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
				<form class="login-form" action="controllers/reset-password-do.php" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="assets/images/na-lgo-blue.svg" class="w-25 mb-2" alt="">
								<h5 class="mb-0 font-weight-bold">Password recovery</h5>
								<span class="d-block text-muted">We'll send you instructions in email</span>
							</div>
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

							<div class="form-group form-group-feedback form-group-feedback-right">
								<input type="email" class="form-control" name="useremail" placeholder="Your email" required>
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
							</div>
							
							<div class="text-center">
								<a href="login.php">Log in</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /password recovery form -->

			</div>
			<!-- /content area -->