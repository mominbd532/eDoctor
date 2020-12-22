<!DOCTYPE html>
<html lang="en">
  <head>
    <title>eDoctor - Doctor Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/custom.css">

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
  </head>
  <body>
    <section class="nav-section">
      <div class="row align-items-center doctor_logo">
          <div class="col-md-2 pl-lg-5 align-items-center">
              <a class="navbar-brand" href="<?php echo base_url('site');?>">e<span>Doctor</span></a>
          </div>
          <div class="col-md-10">
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span> Menu
                  </button>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                          <li class="nav-item pr-3 d-flex topper align-items-center">
                              <!--                              <a class="nav-link" href="#">Home</a>-->
                              <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                              <span class="text"><?php echo $this->security->xss_clean(htmlspecialchars($site_details['address'])); ?></span>
                          </li>
                          <li class="nav-item pr-3 d-flex topper align-items-center">
                              <!--                              <a class="nav-link" href="#">Home</a>-->
                              <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                              <span class="text"><?php echo $this->security->xss_clean(htmlspecialchars($site_details['email'])); ?></span>

                          </li>
                          <li class="nav-item d-flex topper align-items-center">
                              <!--                              <a class="nav-link" href="#">Home</a>-->
                              <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center">
                                  <span class="icon-phone2"></span>
                              </div>
                              <span class="text"><?php echo $this->security->xss_clean(htmlspecialchars($site_details['user_phone'])); ?></span>

                          </li>

                      </ul>

                      <form class="form-inline my-2 my-lg-0">
                          <p class="button-custom order-lg-last mb-0"><a href="<?php echo base_url('patient/register');?>" class="btn btn-secondary py-2 px-3">Become Patient</a></p>
                      </form>
                  </div>
              </nav>
          </div>
      </div>



  </section>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/front/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Already our Doctor? Please Login here</h1>
                    <a href="<?php echo base_url('doctor');?>" class="btn btn-secondary py-3 px-4">Login</a>
                </div>
            </div>
        </div>
    </section>
		

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(../assets/front/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row">
    		    <div class="col-md-6 py-5 pr-md-5">
	                <div class="heading-section heading-section-white ftco-animate mb-5">
                        <h2 class="mb-4">Become Our Doctor</h2>
	                </div>
	                <form class="form-horizontal m-t-30" method="post" action="<?php echo base_url('doctorpost/register'); ?>" enctype="multipart/form-data">
                        	<div class="row">
                        		<div class="col-md-6">
                        			<div class="form-group">
		                                <label for="doctorname">Doctor's Name</label>
		                                <input type="text" class="form-control" id="doctor_name" name="doctor_name" placeholder="Enter doctor's name" pattern="[A-Za-z. ]{1,}" title="Enter Proper Name(Alphabets only)" autofocus required="">
                                        <?php if(isset($error['doctor_name'])){?> <span class="text-danger"><?php echo $error['doctor_name']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        		<div class="col-md-6">
                        			<div class="form-group">
		                                <label for="doctor_email">Email Address</label>
		                                <input type="doctor_email" class="form-control" id="doctor_email" name="doctor_email" placeholder="Enter Email address" required="" style="width: 90%;">
                                        <?php if(isset($error['doctor_email'])){?> <span class="text-danger"><?php echo $error['doctor_email']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        	</div>

                        	<div class="row">
                        		<div class="col-md-6">
                        			<div class="form-group">
		                                <label for="doctor_phone">Phone</label>
		                                <input type="text" class="form-control" id="doctor_phone" name="doctor_phone" placeholder="+1-234-567-7890" pattern="[\+0-9\-]{5,20}" title="Enter Numeric values only(Min 5 Numers)" required="">
                                        <?php if(isset($error['doctor_phone'])){?> <span class="text-danger"><?php echo $error['doctor_phone']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        		<div class="col-md-6">
                                    <div class="form-group">
		                                <label for="doctor_hospital">Hospital</label>
		                                <input type="text" class="form-control" id="doctor_hospital" name="doctor_hospital" placeholder="You are currently working" required="">
                                        <?php if(isset($error['doctor_hospital'])){?> <span class="text-danger"><?php echo $error['doctor_hospital']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        	</div>
                            <div class="row">
                        		<div class="col-md-6">
                                    <div class="form-group">
		                                <label for="doctor_designation">Designation</label>
		                                <input type="text" class="form-control" id="doctor_designation" name="doctor_designation" placeholder="Enter Designation" required="" style="width: 90%;">
                                        <?php if(isset($error['doctor_designation'])){?> <span class="text-danger"><?php echo $error['doctor_designation']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        		<div class="col-md-6">
                                    <div class="form-group">
		                                <label for="doctor_qualification">Qualifications</label>
		                                <input type="text" class="form-control" id="doctor_qualification" name="doctor_qualification" placeholder="Your Qualifications" required="">
                                        <?php if(isset($error['doctor_qualification'])){?> <span class="text-danger"><?php echo $error['doctor_qualification']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        	</div>

                        	<div class="row">
                        		<div class="col-md-6">
                        			<div class="form-group">
		                                <label for="userpassword">Password</label>
		                                <input type="password" class="form-control" id="password" name="doctor_password" placeholder="Enter password" required="">
                                        <?php if(isset($error['doctor_password'])){?> <span class="text-danger"><?php echo $error['doctor_password']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        		<div class="col-md-6">
                        			<div class="form-group">
		                                <label for="confirmpassword">Confirm Password</label>
		                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-Enter password" required="" style="width: 90%;">
                                        <?php if(isset($error['cpassword'])){?> <span class="text-danger"><?php echo $error['cpassword']; ?></span> <?php } ?>
		                            </div>
                        		</div>
                        	</div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Profile Image</label>
                                <div class="col-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="<?php echo base_url(); ?>assets/images/logo-placeholder.jpg" alt="image" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div style="padding-left: 25px;">
                                            <button type="button" class="btn btn-info waves-effect waves-light btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" name="doctor_photo" class="btn-light" accept="image/png" required="" />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row m-t-20">
                                <div class="col-sm-12 text-right" style="margin-left: -35px;">
                                    <button class="btn btn-primary w-md waves-effect waves-light" style="background: #17a2b8; border: 1px solid #17a2b8;" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
    			</div>
    			<div class="col-lg-6 p-5 bg-counter aside-stretch">
					<h3 class="vr">About eDoctor Facts</h3>
    				<div class="row pt-4 mt-1">
		

                        <div class="col-md-12 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 p-5 bg-light">
                                <div class="text">
                                    <strong class="number" data-number="<?php echo $patientTotal; ?>">0</strong>
                                    <span>Happy Patients</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 p-5 bg-light">
                                <div class="text">
                                    <strong class="number" data-number="<?php echo $doctorTotal; ?>">0</strong>
                                    <span>Number of Doctors</span>
                                </div>
                            </div>
                        </div>
         
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      	<div class="container">
			<div class="row">
                <div class="col-md-6 text-center">
					<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <?php echo $this->security->xss_clean(htmlspecialchars($site_details['user_name'])); ?></p>
				</div>
				<div class="col-md-6 pr-3 d-flex topper align-items-center">
                    <p class="button-custom order-lg-last mb-0" style="padding-left: 67%;padding-bottom: 1%;"><a href="<?php echo base_url('doctor/register');?>" class="btn btn-secondary py-2 px-3">Become Doctor</a></p>
                </div>
    		</div>
      	</div>
    </footer>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/scrollax.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/js/main.js"></script>
    <!-- jQuery  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

    <!-- Bootstrap fileupload js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

    <script>
    $(document).ready(function(){
        $('#cpassword').on('blur',function(){
            var pass = $('#password').val();
            var cpass = $(this).val();
            if(cpass != pass)
            {
                alert('Password Not Match!! Please Re-enter Correct Passwrord.');
            }    
        });
    });
    </script>
  </body>
</html>