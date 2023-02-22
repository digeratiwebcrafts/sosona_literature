<?php
session_start();
$pageTitle = 'SOSONA | Login';
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

				<!-- Login form -->
				<form class="login-form" action="controllers/login.php" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="assets/images/na-lgo-blue.svg" class="w-25 mb-2" alt="">
								<h5 class="mb-0 font-weight-bold">SOSONA</h5>
								<span class="d-block text-muted">Literature Accounts</span>
							</div>
							
                        	<?php 
							if (isset($_SESSION['message']))
								{
								 ?>
								<div class="alert alert-danger border-0 p-2">
                        			<span class="font-weight-semibold">
                        				<?php 
                        				echo $_SESSION['message']; 
                        				unset($_SESSION['message']);
                        				?>	
                        			</span>
                    			</div>
							<?php 	}?>
                                

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="username" class="form-control" placeholder="Username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="userpass" class="form-control" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
							</div>

							<div class="text-center">
								<a href="reset-password.php">Forgot password?</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->
			