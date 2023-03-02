<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

	<!-- Sidebar content -->
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-section sidebar-user my-1">
			<div class="sidebar-section-body px-2 py-0">
				<div class="media">
					<div class="align-self-center">
						<button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
							<i class="icon-cross2"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->

		<!-- Main navigation -->
		<div class="sidebar-section">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<li class="nav-item">
					<a href="index.php" class="nav-link <?= ($activePage == 'index') ? 'active':''; ?>">
						<i class="icon-home4"></i>
						<span>
							Dashboard
						</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="accounts.php" class="nav-link <?= ($activePage == 'accounts') ? 'active':''; ?>">
						<i class="icon-notebook"></i> 
						<span>Accounts</span>
					</a>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-coin-dollar"></i> <span>Literature Operation</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Finance">
						<li class="nav-item"><a href="consignee.php" class="nav-link <?= ($activePage == 'consignee') ? 'active':''; ?>">Consignee</a></li>
						<li class="nav-item"><a href="order.php" class="nav-link <?= ($activePage == 'order') ? 'active':''; ?>">Literature Orders</a></li>
						<li class="nav-item"><a href="payment.php" class="nav-link <?= ($activePage == 'payment') ? 'active':''; ?>">Payments Received</a></li>
						<li class="nav-item"><a href="payment-naws.php" class="nav-link <?= ($activePage == 'payment-naws') ? 'active':''; ?>">Payments to Naws</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="settings.php" class="nav-link <?= ($activePage == 'settings') ? 'active':''; ?>">
						<i class="icon-gear"></i> 
						<span>Settings</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="change-password.php" class="nav-link <?= ($activePage == 'change-password') ? 'active':''; ?>">
						<i class="icon-lock2"></i> 
						<span>Change Password</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="logout.php" class="nav-link">
						<i class="icon-switch2"></i> 
						<span>Logout</span>
					</a>
				</li>

			</ul>
		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->
	
</div>
<!-- /main sidebar -->