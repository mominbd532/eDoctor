</head>
    <nav class="pcoded-navbar menupos-fixed menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div " >
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item">
                    <a href="<?php echo base_url('admin/dashboard');?>"><span class="pcoded-micon"> <i class="mdi mdi-view-dashboard"></i> </span><span class="pcoded-mtext">Deshboard</span></a>
                    </li>
                    <li class="nav-item">
                    <a href="<?php echo base_url('admin/appointment');?>"><span class="pcoded-micon"><i class="mdi mdi-calendar-clock"></i></span><span class="pcoded-mtext">Appointment</span></a>
                    </li>		
                    <li class="nav-item">
                    <a href="<?php echo base_url('admin/prescription');?>"> <span class="pcoded-micon"><i class="mdi mdi-clipboard-text"></i></span><span class="pcoded-mtext">Prescription</span></a>
                    </li>
                    <li class="nav-item">
                    <a href="<?php echo base_url('admin/billing');?>"><span class="pcoded-micon"> <i class="mdi mdi-script"></i></span><span class="pcoded-mtext">Billing</span></a> 
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/patients');?>"> <span class="pcoded-micon"><i class="mdi mdi-account-multiple"></i></span><span class="pcoded-mtext">Patients</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/doctors');?>"> <span class="pcoded-micon"><i class="mdi mdi-account-multiple"></i></span><span class="pcoded-mtext">Doctors</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/medicines');?>"> <span class="pcoded-micon"><i class="mdi mdi-account-multiple"></i></span><span class="pcoded-mtext">Medicines</span></a>
                    </li>
                </ul>
                </div>
        </div>		
    </nav>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <img width="80%" height="100%" src="<?php echo base_url(); ?>assets/images/logo.png" alt="" class="logo">
                <img width="80%" height="100%"  src="<?php echo base_url(); ?>assets/images/logo.png" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>	    
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
                </li>
            </ul>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspop  up="false" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.png" alt="user" class="rounded-circle">
                </a>          
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                     <a class="dropdown-item" href="<?php echo base_url('admin/profile');?>"><i class="dripicons-user text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>adminpost/logout"><i class="dripicons-exit text-muted"></i> Logout</a>
                </div>
            </li>
        </div>
    </header>
    <body>