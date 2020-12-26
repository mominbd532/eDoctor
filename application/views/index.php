<!DOCTYPE html>
<html lang="en">
  <head>
    <title>eDoctor - Home</title>
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

  <section class="edoctor_slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="d-block w-100" src="<?php echo base_url('assets/front/images/bg_1.jpg'); ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo base_url('assets/front/images/bg_2.jpg'); ?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo base_url('assets/front/images/bg_3.jpg'); ?>" alt="Third slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo base_url('assets/front/images/bg_4.jpg'); ?>" alt="Fourth slide">
              </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>

  </section>


    <section class="ftco-services ftco-no-pb">
		<div class="container">
			<div class="row no-gutters">

          		<div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
            		<div class="media block-6 d-block text-center">
              			<div class="icon d-flex justify-content-center align-items-center">
            				<span class="flaticon-doctor"></span>
              			</div>
              			<div class="media-body p-2 mt-3">
                			<h3 class="heading">Qualitfied Doctors</h3>
                			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              			</div>
            		</div>      
          		</div>

          		<div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
            		<div class="media block-6 d-block text-center">
              			<div class="icon d-flex justify-content-center align-items-center">
            				<span class="flaticon-ambulance"></span>
              			</div>
              			<div class="media-body p-2 mt-3">
                			<h3 class="heading">Emergency Care</h3>
                			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              			</div>
            		</div>    
          		</div>

          		<div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
            		<div class="media block-6 d-block text-center">
              			<div class="icon d-flex justify-content-center align-items-center">
            				<span class="flaticon-stethoscope"></span>
              			</div>
              			<div class="media-body p-2 mt-3">
                			<h3 class="heading">Outdoor Checkup</h3>
                			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              			</div>
            		</div>      
          		</div>

          		<div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
            		<div class="media block-6 d-block text-center">
              			<div class="icon d-flex justify-content-center align-items-center">
            				<span class="flaticon-24-hours"></span>
              			</div>
              			<div class="media-body p-2 mt-3">
                			<h3 class="heading">24 Hours Service</h3>
                			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              			</div>
            		</div>      
          		</div>
        	</div>
		</div>
	</section>
		
	<section class="ftco-section ftco-no-pt ftc-no-pb">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(assets/front/images/about.jpg);"></div>
				<div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
	          		<div class="heading-section mb-5">
	          			<div class="pl-md-5 ml-md-5">
		          			<span class="subheading">About eDoctor</span>
		            		<h2 class="mb-4" style="font-size: 28px;">Medical specialty concerned with the care of acutely ill hospitalized patients</h2>
	            		</div>
	          		</div>

	          		<div class="pl-md-5 ml-md-5 mb-5">
						<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
						<div class="row mt-5 pt-2">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
										<span class="flaticon-first-aid-kit"></span>
									</div>
									<div class="text">
										<h3>Primary Care</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
										<span class="flaticon-dropper"></span>
									</div>
									<div class="text">
										<h3>Lab Test</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
										<span class="flaticon-experiment-results"></span>
									</div>
									<div class="text">
										<h3>Symptom Check</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
										<span class="flaticon-heart-rate"></span>
									</div>
									<div class="text">
										<h3>Heart Rate</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          		<div class="col-md-8 text-center heading-section ftco-animate">
					<span class="subheading">Departments</span>
					<h2 class="mb-4">Clinic Departments</h2>
					<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          		</div>
        	</div>

    		<div class="ftco-departments">
				<div class="row">

            		<div class="col-md-12 nav-link-wrap">
	            		<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	              			<a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Neurology</a>

	             			<a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Surgical</a>

	              			<a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Dental</a>

	              			<a class="nav-link ftco-animate" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Ophthalmology</a>

	              			<a class="nav-link ftco-animate" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Cardiology</a>
	            		</div>
	          		</div>

	          		<div class="col-md-12 tab-wrap">
	            
	            		<div class="tab-content bg-light p-4 p-md-5 ftco-animate" id="v-pills-tabContent">

	              			<div class="tab-pane py-2 fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
	              				<div class="row departments">
	              					<div class="col-lg-4 order-lg-last d-flex align-items-stretch">
	              						<div class="img d-flex align-self-stretch" style="background-image: url(assets/front/images/dept-1.jpg);"></div>
	              					</div>

	              					<div class="col-lg-8">
										<h2>Neurological Deparments</h2>
										<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
										<div class="row mt-5 pt-2">
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-first-aid-kit"></span>
													</div>
													<div class="text">
														<h3>Primary Care</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-dropper"></span>
													</div>
													<div class="text">
														<h3>Lab Test</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-experiment-results"></span>
													</div>
													<div class="text">
														<h3>Symptom Check</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-heart-rate"></span>
													</div>
													<div class="text">
														<h3>Heart Rate</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
										</div>
	              					</div>
	              				</div>
	              			</div>

	              			<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
	              				<div class="row departments">
	              					<div class="col-lg-4 order-lg-last d-flex align-items-stretch">
	              						<div class="img d-flex align-self-stretch" style="background-image: url(assets/front/images/dept-2.jpg);"></div>
	              					</div>
	              					<div class="col-md-8">
										<h2>Surgical Deparments</h2>
										<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
										<div class="row mt-5 pt-2">
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-first-aid-kit"></span>
													</div>
													<div class="text">
														<h3>Primary Care</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-dropper"></span>
													</div>
													<div class="text">
														<h3>Lab Test</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-experiment-results"></span>
													</div>
													<div class="text">
														<h3>Symptom Check</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
														<span class="flaticon-heart-rate"></span>
													</div>
													<div class="text">
														<h3>Heart Rate</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
								<div class="row departments">
									<div class="col-lg-4 order-lg-last d-flex align-items-stretch">
										<div class="img d-flex align-self-stretch" style="background-image: url(assets/front/images/dept-3.jpg);"></div>
									</div>
									<div class="col-md-8">
										<h2>Dental Deparments</h2>
										<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
										<div class="row mt-5 pt-2">
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-first-aid-kit"></span></div>
													<div class="text">
														<h3>Primary Care</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-dropper"></span></div>
													<div class="text">
														<h3>Lab Test</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-experiment-results"></span></div>
													<div class="text">
														<h3>Symptom Check</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-heart-rate"></span></div>
													<div class="text">
														<h3>Heart Rate</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-day-4-tab">
								<div class="row departments">
									<div class="col-lg-4 order-lg-last d-flex align-items-stretch">
										<div class="img d-flex align-self-stretch" style="background-image: url(assets/front/images/dept-4.jpg);"></div>
									</div>
									<div class="col-md-8">
										<h2>Ophthalmology Deparments</h2>
										<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
										<div class="row mt-5 pt-2">
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-first-aid-kit"></span></div>
													<div class="text">
														<h3>Primary Care</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-dropper"></span></div>
													<div class="text">
														<h3>Lab Test</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-experiment-results"></span></div>
													<div class="text">
														<h3>Symptom Check</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-heart-rate"></span></div>
													<div class="text">
														<h3>Heart Rate</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-day-5-tab">
								<div class="row departments">
									<div class="col-lg-4 order-lg-last d-flex align-items-stretch">
										<div class="img d-flex align-self-stretch" style="background-image: url(assets/front/images/dept-5.jpg);"></div>
									</div>
									<div class="col-md-8">
										<h2>Cardiology Deparments</h2>
										<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
										<div class="row mt-5 pt-2">
											<div class="col-md-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-idea"></span></div>
													<div class="text">
														<h3>Primary Care</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-idea"></span></div>
													<div class="text">
														<h3>Lab Test</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-idea"></span></div>
													<div class="text">
														<h3>Symptom Check</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="services-2 d-flex">
													<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-idea"></span></div>
													<div class="text">
														<h3>Heart Rate</h3>
														<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    	</div>
    </section>
		

		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(assets/front/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
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