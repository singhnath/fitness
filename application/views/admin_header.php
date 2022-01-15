<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<meta name="description" content="">

		<meta name="author" content="">

		<title>Dashboard Workout (4.0)</title>

		<link rel="shortcut icon" type="image/png" href="images/icon.png"/>

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- sweet alert css/js start -->
		<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

       <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
	  <!-- sweet alert css/js end -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>themify-icons/themify-icons.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/font-awesome.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/custom.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/Chart.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/animate.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/jquery.jscrollpane.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/waves.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/switchery.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/dataTables.bootstrap4.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/responsive.bootstrap4.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/buttons.dataTables.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/buttons.bootstrap4.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/switchery.min.css">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css1/bootstrap-glyphicons.css">

         <!--Import Google Icon Font-->

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->

      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css1/materialize.min.css"  media="screen,projection"/>



		<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/dropify.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css1/core.css">



		<style type="text/css">

			.rating-outer span,.rating-symbol-background{

			  color: #ffe000!important;

			}

			.rating-outer span,.rating-symbol-foreground{

			  color: #ffe000!important;

			}

			.ui-datepicker-calendar {

   display: none;

}



		</style>
   <style type="text/css">
   	.error{
   		color: red;
   	}
   </style>
		<script type="text/javascript">

			$(function() {

    $( "#datepicker" ).datepicker({format: 'yyyy'});

    });

		</script>

		<link rel="stylesheet" href="css/jquery-jvectormap-2.0.3.css">

	</head>

	<body class="fixed-sidebar fixed-header content-appear skin-default">



		<div class="wrapper">



			<!-- Preloader -->

			<div class="preloader"></div>



			<!-- Sidebar -->

			<div class="site-overlay"></div>





				<div class="site-sidebar">

	<div class="custom-scroll custom-scroll-light">

		<ul class="sidebar-menu">

			<li class="menu-title">Main</li>

			<li>

				<a href="<?= base_url('dashboard'); ?>" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-anchor"></i></span>

					<span class="s-text">Dashboard</span>

				</a>

			</li>

			

			<li class="menu-title">Members</li>

			<li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-crown"></i></span>

					<span class="s-text">Users</span>

				</a>

				<ul>

					<li><a href="<?php echo base_url(); ?>users/customer">Trainee</a></li>

					<li><a href="<?php echo base_url(); ?>users/trainer">Trainers</a></li>

				</ul>

			</li>

		<!-- 	<li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-car"></i></span>

					<span class="s-text">Booking</span>

				</a>

				<ul>

					<li><a href="<?php echo base_url(); ?>booking/ongoing">OnGoing</a></li>

					<li><a href="<?php echo base_url(); ?>booking/completed">Completed</a></li>

				</ul>

			</li> -->

<!-- 			<li class="menu-title">Transaction</li>

			<li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-map-alt"></i></span>

					<span class="s-text">Map</span>

				</a>

				<ul>

					<li><a href="user_map.html">User Locations</a></li>

					<li><a href="provider_map.html">Provider Locations</a></li>

				</ul>

			</li> -->

			<!-- <li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-view-grid"></i></span>

					<span class="s-text">Ratings & Reviews</span>

				</a>

				<ul>

					<li><a href="user_review.html">User Ratings</a></li>

					<li><a href="provider_review.html">Trainer Ratings</a></li>

				</ul>

			</li> -->

			<!-- <li class="menu-title">Services</li>

			<li>

				<a href="service_history.html" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-infinite"></i></span>

					<span class="s-text">Services History</span>

				</a>

			</li>

			<li>

				<a href="scheduled_services.html" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-palette"></i></span>

					<span class="s-text">Scheduled Services</span>

				</a>

			</li> -->

			<!-- <li class="menu-title">General</li>

			

			<li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-view-grid"></i></span>

					<span class="s-text">Category Master</span>

				</a>

				<ul>

					<li><a href="list_category.html">List Category</a></li>

					<li><a href="create_category.html">Add Category</a></li>

				</ul>

			</li> -->



			<!-- <li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-view-grid"></i></span>

					<span class="s-text">Service Types</span>

				</a>

				<ul>

					<li><a href="list_service_type.html">List Service Types</a></li>

					<li><a href="create_service_type.html">Add New Service Type</a></li>

					<li><a href="service_category.html">Service Category</a></li>

				</ul>

			</li> -->

			<!-- <li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-layout-tab"></i></span>

					<span class="s-text">Documents</span>

				</a>

				<ul>

					<li><a href="list_document.html">List Documents</a></li>

					<li><a href="create_document.html">Add New Document</a></li>

				</ul>

			</li> -->

		<li class="menu-title">Workout</li>

				<li class="with-sub">

					<a href="#" class="waves-effect  waves-light">

						<span class="s-caret"><i class="fa fa-angle-down"></i></span>

						<span class="s-icon"><i class="ti-crown"></i></span>

						<span class="s-text">Workout</span>

					</a>

					<ul>
						<li><a href="<?php echo base_url(); ?>workout">Workout</a></li>
						<li><a href="<?php echo base_url(); ?>workout/workout_plan">Workout Plan</a></li>

					</ul>

				</li>
				<li class="menu-title">Report</li>

				<li class="with-sub">

					<a href="#" class="waves-effect  waves-light">

						<span class="s-caret"><i class="fa fa-angle-down"></i></span>

						<span class="s-icon"><i class="ti-crown"></i></span>

						<span class="s-text">Report</span>

					</a>

					<ul>
						<li><a href="<?= base_url('workout/report') ?>">Report</a></li>
					</ul>

				</li>

			<li class="menu-title">Accounts</li>

			<!-- <li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-crown"></i></span>

					<span class="s-text">Statements</span>

				</a>

				<ul>

					<li><a href="<?php echo base_url(); ?>statement/overallStatement">Overall Booking Statements</a></li>

					<li><a href="<?php echo base_url(); ?>statement/trainerStatement">Trainer Statement</a></li>

					<li><a href="<?php echo base_url(); ?>statement/dailyStatement">Daily Statement</a></li>

					<li><a href="<?php echo base_url(); ?>statement/monthlyStatement">Monthly Statement</a></li>

					<li><a href="<?php echo base_url(); ?>statement/yearlyStatement">Yearly Statement</a></li>

				</ul>

			</li> -->

			

			<li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-layout-tab"></i></span>

					<span class="s-text">Trainer Account</span>

				</a>

				<ul>

					<li><a href="<?php echo base_url(); ?>account/approve">Approved</a></li>

					<li><a href="<?php echo base_url(); ?>account/unapprove">Unapproved</a></li>

				</ul>

			</li>

			<!-- 	<li>

				<a href="<?php echo base_url(); ?>statement/releasePayment" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-infinite"></i></span>

					<span class="s-text">Release Trainer Payment</span>

				</a>

			</li>

			<li class="with-sub">

				<a href="#" class="waves-effect  waves-light">

					<span class="s-caret"><i class="fa fa-angle-down"></i></span>

					<span class="s-icon"><i class="ti-layout-tab"></i></span>

					<span class="s-text">Wallet System</span>

				</a>

				<ul>

					<li><a href="<?php echo base_url(); ?>statement/trainerWallet">Trainer Wallet</a></li>

					<li><a href="<?php echo base_url(); ?>statement/transactionHistory">Transaction History</a></li>

				</ul>

			</li>

			

			<li class="menu-title">Payment Details</li>

			<li>

				<a href="#" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-infinite"></i></span>

					<span class="s-text">Payment History</span>

				</a>

			</li>

			<li>

				<a href="#" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-money"></i></span>

					<span class="s-text">Payment Settings</span>

				</a>

			</li> -->

			<!-- <li class="menu-title">Settings</li> -->

			<!-- <li>

				<a href="#" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-settings"></i></span>

					<span class="s-text"> Settings</span>

				</a>

			</li> -->

			

			<!-- <li class="menu-title">Others</li>

			<li>

				<a href="help.html" class="waves-effect waves-light">

					<span class="s-icon"><i class="ti-help"></i></span>

					<span class="s-text">Help</span>

				</a>

			</li>

			<li>

				<a href="translations.html" class="waves-effect waves-light">

					<span class="s-icon"><i class="ti-smallcap"></i></span>

					<span class="s-text">Translations</span>

				</a>

			</li> -->

			<!-- <li class="menu-title">Account</li>

			<li>

				<a href="account_settings.html" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-user"></i></span>

					<span class="s-text">Account Settings</span>

				</a>

			</li>

			<li>

				<a href="change_password.html" class="waves-effect  waves-light">

					<span class="s-icon"><i class="ti-exchange-vertical"></i></span>

					<span class="s-text">Change Password</span>

				</a>

			</li> -->

			<li class="compact-hide">

				<a href="<?php echo base_url(); ?>SignOut/"></i></span>

					<span class="s-text">Sign out</span>

                </a>



              

			</li>

			

		</ul>

	</div>

</div>	

<div class="site-header">

	<nav class="navbar navbar-light">

		<div class="navbar-left">

			<a class="navbar-brand" href="dashboard.html">

							<!-- 	<div class="logo" style="background: url(<?php echo base_url(); ?>img/logo.png) no-repeat;background-size: contain;filter: invert(100%);"></div>  -->
							<h3 style="color:#fff;">Workout (4.0)</h3>

			</a>

			<div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">

				<span class="hamburger"></span>

			</div>

			<div class="toggle-button-second dark float-xs-right hidden-md-up">

				<i class="ti-arrow-left"></i>

			</div>

			<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">

				<span class="more"></span>

			</div>

		</div>

		<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">

			<div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">

				<span class="hamburger"></span>

			</div>



			<ul class="nav navbar-nav">

				<li class="nav-item hidden-sm-down">

					<a class="nav-link toggle-fullscreen" href="#">

						<i class="ti-fullscreen"></i>

					</a>

				</li>

			</ul>

			

			<ul class="nav navbar-nav float-md-right">

				<li class="nav-item dropdown hidden-sm-down">

					<a href="#" data-toggle="dropdown" aria-expanded="false">

						<span class="avatar box-32">

							<img src="<?php echo base_url(); ?>img/avatar.jpg" alt="">

						</span>

					</a>

					<div class="dropdown-menu dropdown-menu-right animated fadeInUp">

						<!-- <a class="dropdown-item" href="profile.html">

							<i class="ti-user mr-0-5"></i> Profile

						</a>

						<a class="dropdown-item" href="change_password.html">

							<i class="ti-settings mr-0-5"></i> Change Password

						</a> -->
<!-- 
						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="help.html"><i class="ti-help mr-0-5"></i> Help</a> -->

						<a class="dropdown-item" href="<?php echo base_url(); ?>SignOut/"><i class="ti-power-off mr-0-5"></i> Sign out</a>

					</div>

				</li>

			</ul>



		</div>

	</nav>

</div>