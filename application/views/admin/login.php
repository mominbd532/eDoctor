<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $this->security->xss_clean(htmlspecialchars($site_details['title'])); ?> - Patient Management System</title>
        <meta content="eDoctor - Patient Management System" name="description" />
        <meta content="Landinghub(themesbrand)" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{asset('assets/home/siteLogo/'.$gnl->favicon)}}" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
    <title>Welcome Back!</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>eDoctor</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post" action="<?php echo base_url('adminpost/login'); ?>">
          
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>log in</h3>
          <div class="form-group">
            <label class="control-label" >EMAIL</label>
            <input class="form-control" type="text" id="username" name="email" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Password">
          </div>
         
          <div class="form-group btn-container">
            <button class="btn signin_btn btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw" ></i>SIGN IN</button>
          </div> </br>
        </form>

      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url(); ?>asset/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>