<html lang="en">

<head>

<title>Matrix Admin</title>

<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/colorpicker.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/datepicker.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/uniform.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/select2.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/fullcalendar.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-style.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-media.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin-style.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-wysihtml5.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin-style.css" />

    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/jquery.gritter.css" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>



<!--Header-part-->

<div id="header">

  <h1><a href="<?= base_url()?>">Happy Service Admin</a></h1>

</div>

<!--top-Header-menu-->



<div id="user-nav" class="navbar navbar-inverse">

  <ul class="nav">

    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>

      <ul class="dropdown-menu">

        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>

        <li class="divider"></li>

        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>

        <li class="divider"></li>

        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>

      </ul>

    </li>

    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>

  </ul>

</div>

<!--close-top-Header-menu-->
<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.php/users"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span></a>
      <ul>
        <li><a href="<?php echo base_url(); ?>index.php/users/customer">Customers</a></li>

        <li><a href="<?php echo base_url(); ?>index.php/users/trainer">Trainers</a></li>

      </ul>

    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-signal"></i> <span>Booking History</span></a> 

      <ul>

        <li><a href="<?php echo base_url(); ?>index.php/booking/ougoing">OnGoing Session</a></li>

        <li><a href="<?php echo base_url(); ?>index.php/booking/completed">Completed Session</a></li>

      </ul>

    </li>

    <li> <a href="<?php echo base_url(); ?>index.php/setting/setting"><i class="icon icon-signal"></i> <span>Setting</span></a> </li>

  </ul>

</div>

<!--sidebar-menu-->