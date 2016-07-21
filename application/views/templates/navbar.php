
<html lang="en">

<head>
<!-- test git 7/20 -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin</title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/css/calendar/fullcalendar.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">

  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type='text/javascript'></script>

  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js" type='text/javascript'></script>
  <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js" type='text/javascript'></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js" type='text/javascript'></script>

  <script src="<?php echo base_url(); ?>assets/js/custom.js" type='text/javascript'></script>
  <!-- pace -->
  <script src="<?php echo base_url(); ?>assets/js/pace/pace.min.js" type='text/javascript'></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/moment/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/echart/echarts-all.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/echart/green.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/input_mask/jquery.inputmask.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/chartjs/chart.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/datepicker/bootstrap-datepicker.js'); ?>"></script>


</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url('home/dashboard'); ?>" class="site_title"><i class="fa fa-cog"></i> <span>Tappyn Admin</span></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?php echo base_url('assets/images/tappyn_logo.png'); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $user->first_name . ' ' . $user->last_name; ?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('home/dashboard'); ?>">Dashboard</a>
                    </li>
                    <li><a href="<?php echo base_url('home/reporting'); ?>">Reporting</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-copyright"></i> Contests <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('contests/index'); ?>">View All</a>
                    </li>
                    <li><a href="<?php echo base_url('contests/index?status=active'); ?>">Active</a>
                    </li>
                    <li><a href="<?php echo base_url('contests/index?status=completed'); ?>">Completed</a>
                    </li>
                    <!-- <li><a href="#">Create</a>
                    </li> -->
                  </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('users/index'); ?>">View All</a>
                    </li>
                    <li><a href="#">Search</a>
                    </li>
                  </ul>
                </li>
                <!-- <li><a><i class="fa fa-building-o"></i> Companies <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="#">View All</a>
                    </li>
                    <li><a href="#">Search</a>
                    </li>
                  </ul>
                </li> -->
                <li><a><i class="fa fa-edit"></i> Submissions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('submissions/index'); ?>">View All</a></li>
                    <li><a href="#">Search</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bank"></i> Payouts <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('payouts/index'); ?>">View All</a></li>
                    <li><a href="<?php echo base_url('payouts/index?claimed=0'); ?>">Pending</a></li>
                    <li><a href="<?php echo base_url('payouts/index?claimed=1'); ?>">Claimed</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bank"></i> Vouchers <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('vouchers/index'); ?>">View All</a></li>
                    <li><a href="<?php echo base_url('vouchers/create'); ?>">Create</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bank"></i> A/B test <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('ads/index'); ?>">View All</a></li>
                    <li><a href="<?php echo base_url('ads/import'); ?>">Import result</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="menu_section">
              <h3>Admin</h3>
              <ul class="nav side-menu">
                <li><a href="<?php echo base_url('auth/index'); ?>"><i class="fa fa-cog"></i> Admins</a></li>
                <li><a href="<?php echo base_url('emails/index'); ?>"><i class="fa fa-bug"></i> Emails</a></li>
                <li><a href="<?php echo base_url('query'); ?>"><i class='fa fa-database'></i> Query Sandbox</a></li>
                <li><a href="<?php echo base_url('munin'); ?>"><i class="fa fa-dashboard"></i> Munin monitoring</a></li>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="<?php echo base_url('auth/edit_user/' . $user->id); ?>"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('auth/logout'); ?>">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <?php echo $user->first_name . ' ' . $user->last_name; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="<?php echo base_url('auth/edit_user/' . $user->id); ?>">  Settings</a>
                  </li>
                  <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <!-- <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                                    <img src="images/img.jpg" alt="Profile Image" />
                                                </span>
                      <span>
                                                    <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                    </a>
                  </li>
                </ul>
              </li> -->

            </ul>
          </nav>
        </div>

      </div>

      <!-- <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
      </div> -->

      <div class="right_col" role="main">
        <div class="">
