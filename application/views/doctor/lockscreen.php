<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $this->security->xss_clean(htmlspecialchars($site_details['title'])); ?> - Patient Management System</title>
        <meta content="eDoctor - Patient Management System" name="description" />
        <meta content="AuxinInfotech" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="fixed-left">
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-block">
                    <h3 class="text-center m-0">
                    <a href="#" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/<?php echo $this->security->xss_clean(htmlspecialchars($site_details['logo'])); ?>" height="30" alt="logo"></a>
                    </h3>
                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Locked</h4>
                        <p class="text-muted text-center">Hello, enter your password to unlock the screen!</p>
                        <form class="form-horizontal m-t-30" method="post" action="<?php echo base_url('doctorpost/login'); ?>">
                            <div class="user-thumb text-center m-b-30">
                            <a href="#" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/<?php echo $this->security->xss_clean(htmlspecialchars($doctor_details['doctor_photo'])); ?>" height="30" alt="logo"></a>
                                <h6><?php echo $this->security->xss_clean(htmlspecialchars($doctor_details['doctor_name'])); ?></h6>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="email" value="<?php echo $this->security->xss_clean(htmlspecialchars($doctor_details['doctor_email'])); ?>">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
                            </div>
                            <div class="form-group row m-t-20">
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tether.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    </body>
</html>