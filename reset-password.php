<?php
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
				<form class="login-form" action="">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="assets/images/na-lgo-blue.svg" class="w-25 mb-2" alt="">
								<h5 class="mb-0 font-weight-bold">Password recovery</h5>
								<span class="d-block text-muted">We'll send you instructions in email</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-right">
								<input type="email" class="form-control" placeholder="Your email">
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
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