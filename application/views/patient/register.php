<!DOCTYPE html>
<html lang="en">
  <head>
    <title>eDoctor - Sign Up</title>
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

  </head>
  <body>

  <section class="nav-section">
      <div class="row align-items-center doctor_logo">
          <div class="col-md-2 pl-lg-5 align-items-center">
              <a class="navbar-brand" href="<?php echo base_url('site');?>">e<span>Doctor</span></a>
          </div>
          <div class="col-md-10">
              <nav class="navbar navbar-expand-lg navbar-light bg-light float-md-right">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span> Menu
                  </button>
                  <div class="collapse navbar-collapse float-md-right" id="navbarTogglerDemo01">

                      <p class="button-custom order-lg-last mt-2 mb-2 pr-lg-5 float-right"><a href="<?php echo base_url('doctor/register');?>" class="btn btn-success py-2 px-3">Become Doctor</a></p>
                      <p class="button-custom order-lg-last mt-2 mb-2 float-md-right"><a href="<?php echo base_url('patient/register');?>" class="btn btn-secondary py-2 px-3">Become Patient</a></p>

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
                    <h1 class="mb-2 bread">Already our patient? Please Login here</h1>
                    <a href="<?php echo base_url('patient');?>" class="btn btn-secondary py-3 px-4">Login</a>
                </div>
            </div>
        </div>
    </section>
		

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(../assets/front/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row">
    		    <div class="col-md-6 py-5 pr-md-5">
	                <div class="heading-section heading-section-white ftco-animate mb-5">
	          	        <span class="subheading">Consultation</span>
                        <h2 class="mb-4">Become Our Patient</h2>
	                </div>
	                <form method="post" action="<?php echo base_url('patientpost/register'); ?>" enctype="multipart/form-data" class="appointment-form ftco-animate">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="Full Name" name="name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Age" name="age">
		    				</div>
                        </div>
                        <div class="d-md-flex">
		    				<div class="form-group">
							<select name="gender" class="form-control">
								<option value="" class="form-control">Select</option>
								<option value="male" class="form-control">Male</option>
								<option value="female" class="form-control">Female</option>
							</select>
		    				</div>
		    				<div class="form-group ml-md-4">
                                <input type="phone" class="form-control" placeholder="Phone" name="phone">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		    					<div class="form-field">
          					        <div class="select-wrap">
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
		                        </div>
		    				</div>
	    					<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Address" name="add">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		        <div class="icon"></div>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
	            		        </div>
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		                    <div class="form-group ml-md-4">
		                        <input type="submit" value="Submit" class="btn btn-secondary py-3 px-4">
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
  </body>
</html>