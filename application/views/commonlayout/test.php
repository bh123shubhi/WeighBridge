<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>North DMC Weighbridge</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="global_assets/js/plugins/ui/perfect_scrollbar.min.js"></script>
	<script src="assets/js/app.js"></script>
	
	<script src="global_assets/js/demo_pages/layout_fixed_sidebar_custom.js"></script>
	<script src="global_assets/js/demo_pages/dashboard.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
	<script src="global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	<script src="global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo fixed-top">
		<div class="navbar-brand">
			<a href="#" class="d-inline-block">
				<img src="global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="navbar-text ml-md-3">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				Hi, Rajesh!
			</span>

			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link">
						<i class="icon-switch2"></i>
						<span class="d-md-none ml-2">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md sidebar-fixed ">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content ps ps--active-y">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<img src="global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">Rajesh Kumar</h6>
							<span class="font-size-sm text-white text-shadow-dark">Administrator</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-cog5"></i>
									<span>Account settings</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="#" class="nav-link active">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-truck"></i> <span>Vehicle Entry / Exit</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="vehicle_entry.html" class="nav-link"><i class="icon-enter"></i>Vehicle Entry </a></li>
								<li class="nav-item"><a href="vehicle_exit.html" class="nav-link"><i class="icon-exit"></i>Vehicle Exit</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-enter"></i>Vehicle Entry List</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><i class="icon-exit"></i>Vehicle Exit List</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-stats-dots"></i> <span>Reports</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Reports">
								
								<li class="nav-item"><a href="zone_wise_report.html" class="nav-link">Zone Wise Report</a></li>
								<li class="nav-item"><a href="garbage_wise_report.html" class="nav-link">Garbage Category Wise Report</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Fleet Operator Report</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Agency Wise Report</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Vehicle Wise Report</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Master</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Master">
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link legitRipple">Vehicle Master</a>
									<ul class="nav nav-group-sub" style="display: none;">
										<li class="nav-item"><a href="mcd_vehicle_list.html" class="nav-link legitRipple">MCD Owned Vehicle</a></li>
										<li class="nav-item"><a href="private_vehicle_list.html" class="nav-link legitRipple">Private Vehicle</a></li>
										<li class="nav-item"><a href="zone_time_list.html" class="nav-link legitRipple">Zone Time</a></li>
									</ul>
								</li>
								<li class="nav-item"><a href="zone_list.html" class="nav-link">Zone</a></li>
								<li class="nav-item"><a href="garbage_category_list.html" class="nav-link">Garbage Category</a></li>
								<li class="nav-item"><a href="fleet_operator_list.html" class="nav-link">Fleet Operator Master</a></li>
								<li class="nav-item"><a href="agency_name_list.html" class="nav-link">Agency Master</a></li>
								<li class="nav-item"><a href="operator_list.html" class="nav-link">Operator Master</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-cog3"></i> <span>Settings</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Settings">
								<li class="nav-item"><a href="#" class="nav-link">Email Settings</a></li>
								<li class="nav-item"><a href="#" class="nav-link">SMS Settings</a></li>
								<li class="nav-item"><a href="#" class="nav-link">General Settings</a></li>
								<li class="nav-item-divider"></li>
								<li class="nav-item"><a href="#" class="nav-link">System Settings</a></li>
								
							</ul>
						</li>
						<!-- /main -->
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Main Buttons -->
				<div class="row">
					<div class="col-lg-6"> <div class="card"><a href="vehicle_entry.html" class="btn btn-light bg-primary legitRipple p-4"><i class="icon-enter mr-2"></i> Entry Vehicle</a></div> </div>
					<div class="col-lg-6"> <div class="card"><a href="vehicle_exit.html" class="btn btn-light bg-warning legitRipple p-4"><i class="icon-exit mr-2"></i> Exit Vehicle</a></div></div>
				</div>
				<!-- /main Buttons -->


				<!-- Dashboard content -->
				
				<div class="row">
					<div class="col-xl-12">

						<!-- Marketing campaigns -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Vehicle at SLF</h6>
							</div>

							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Registration</th>
											<th>Slip No.</th>
											<th>Garbage Type</th>
											<th>In Weight</th>
											<th>Tare Weight</th>
											<th>Net Garbage</th>
											<th>SLF Entry Time</th>
										</tr>
									</thead>
									<tbody>
										<tr class="table-active table-border-double">
											<td colspan="7" class="font-weight-bold">Vehicle Currently In</td>
											<td class="text-right">
												<span class="progress-meter" id="today-progress" data-progress="30"></span>
											</td>
										</tr>
										<tr>
											<td>1</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 4CS 6742</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Garbage</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">02:00:00 P.M.</h6></td>
										</tr>
										<tr>
											<td>2</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 3CA 4322</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Silt</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">02:15:10 P.M.</h6></td>
										</tr>
										<tr>
											<td>3</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 2CA 9977</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Garbage</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">02:30:45 P.M.</h6></td>
										</tr>
										<tr>
											<td>4</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 6AS 3513</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Garbage</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">03:00:00 P.M.</h6></td>
										</tr>
										<tr>
											<td>5</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 7AS 6789</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Garbage</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">03:10:05 P.M.</h6></td>
										</tr>
										<tr>
											<td>6</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 8AS 4563</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Malba</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">04:20:05 P.M.</h6></td>
										</tr>
										<tr>
											<td>7</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 1CA 7498</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Malba</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">04:42:35 P.M.</h6></td>
										</tr>
										<tr>
											<td>8</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 5SA 7896</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Malba</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">04:42:35 P.M.</h6></td>
										</tr>
										<tr>
											<td>9</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 8CA 4653</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Malba</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">04:42:35 P.M.</h6></td>
										</tr>
										<tr>
											<td>10</td>
											<td>
												<div class="d-flex align-items-center">
													
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold">DL 5CA 5832</a>
														
													</div>
												</div>
											</td>
											<td><span class="text-muted">11001</span></td>
											<td><span class="text-success-600"> Malba</span></td>
											<td><h6 class="font-weight-semibold mb-0">11085</h6></td>
											<td><h6 class="font-weight-semibold mb-0">7200</h6></td>
											<td><h6 class="font-weight-semibold mb-0">3840</h6></td>
											<td><h6 class="font-weight-semibold mb-0">04:42:35 P.M.</h6></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /marketing campaigns -->

					</div>

				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020 - 2021. <a href="#">Weighbridge Software For North DMC</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
