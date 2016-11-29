<?php $this->load->view('admin/components/page_head'); ?>
  <body class="hold-transition skin-blue-light sidebar-mini fixed">
    <div class="wrapper">
      <header class="main-header" >
          <!-- Logo -->
            <a href="<?php echo base_url() ?>index.php/admin/dashboard" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>R</b>in</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Roinn</b></span>
            </a>
              <!--<div class="navbar-header">
                <a href="<?php echo base_url() ?>index.php/admin/dashboard" class="navbar-brand"><b>Roinn</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                  <i class="fa fa-bars"></i>
                </button>
              </div>-->
               <!-- Header Navbar: style can be found in header.less -->
              <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
                </a>
              <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                      <!-- Menu toggle button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                          <!-- inner menu: contains the messages -->
                          <ul class="menu">
                            <li><!-- start message -->
                              <a href="#">
                                <div class="pull-left">
                                  <!-- User Image -->
                                  <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                </div>
                                <!-- Message title and timestamp -->
                                <h4>
                                  Support Team
                                  <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                </h4>
                                <!-- The message -->
                                <p>Why not buy a new awesome theme?</p>
                              </a>
                            </li><!-- end message -->
                          </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                      </ul>
                    </li><!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                      <!-- Menu toggle button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                          <!-- Inner Menu: contains the notifications -->
                          <ul class="menu">
                            <li><!-- start notification -->
                              <a href="#">
                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                              </a>
                            </li><!-- end notification -->
                          </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                      </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                      <!-- Menu Toggle Button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                          <!-- Inner menu: contains the tasks -->
                          <ul class="menu">
                            <li><!-- Task item -->
                              <a href="#">
                                <!-- Task title and progress text -->
                                <h3>
                                  Design some buttons
                                  <small class="pull-right">20%</small>
                                </h3>
                                <!-- The progress bar -->
                                <div class="progress xs">
                                  <!-- Change the css width attribute to simulate progress -->
                                  <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">20% Complete</span>
                                  </div>
                                </div>
                              </a>
                            </li><!-- end task item -->
                          </ul>
                        </li>
                        <li class="footer">
                          <a href="#">View all tasks</a>
                        </li>
                      </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                      <!-- Menu Toggle Button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="<?php echo base_url('dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo $this->session->userdata('userName'); ?></span>
                      </a>
                      <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                          <img src="<?php echo base_url('dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                          <p>
                            Alexander Pierce - Web Developer
                            <small>Member since Nov. 2012</small>
                          </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                          <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                          </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                          <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                          </div>
                          <div class="pull-right">
                            <?php echo anchor('admin/user/logout', '<button class="btn btn-default btn-flat"> Salir </button> '); ?>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /.navbar-custom-menu -->
              </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="<?php echo base_url('dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p>Alexander Pierce</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>
              <!-- search form -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>
              <?php echo get_menu_admin($menu); ?>
            </section>
          </aside>
        <!-- Full Width Column -->
        <div class="content-wrapper">
           <!-- Content Header (Page header) -->
             <!-- Content Header (Page header) -->
            <section class="content-header">
              <?php echo $breadcrumbs; ?>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="col-md-12 col-sm-12">
                <?php $this->load->view($subview); ?>
              </div>
                <!--<?php echo dump($usuarios->profiles_id);?>-->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    <?php $this->load->view('admin/components/page_tail'); ?>