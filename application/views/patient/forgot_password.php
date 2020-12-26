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
    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(../assets/front/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row">
    		    <div class="col-md-6 py-5 pr-md-5">
	                <div class="heading-section heading-section-white ftco-animate mb-5">
                    <p class="text-muted text-center"><label class="status" style="color:white;">Enter your email and instructions will be sent to you!</label></p>
	                </div>
                    <form class="form-horizontal m-t-30">
                        <div class="form-group">
                            <label for="useremail">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your registered email" required="">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit" id="reset">Reset</button>
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
				<div class="col-md-12 text-center">
					<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <?php echo $this->security->xss_clean(htmlspecialchars($adminDetails['user_name'])); ?></p>
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

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

        <script>
            $('document').ready(function(){
                $('#reset').click(function(e){
                    e.preventDefault();
                    var email = $('#email').val();
                    if(email)
                    {
                        $.ajax({
                            type:'POST',
                            url:'../user_operation/patient_recoverpassword',
                            dataType:'json',
                            data:{email:email},
                            success: function(data){
                                if(data.status == 1)
                                {
                                    $(".status").css('color','green');
                                    $('.status').html('Your password will be sent to your registered email.');
                                }
                                else
                                {
                                    $(".status").css('color','red');
                                    $('.status').html('Please enter your registered email.');
                                }
                            },
                            error:function()
                            {
                                alert('oops! Something went wrong!!!');
                            }
                        });
                    }
                    else
                    {
                        alert('Please enter your registered email.!!');
                        $('#email').focus();
                    }
                });
            });
        </script>
  </body>
</html>