<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
		<meta charset="UTF-8">
		<title><?php echo $title ?></title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/responsive.css">
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/favicon/favicon.png">
		<link href="<?php echo base_url()?>assets/stylesheets/jquery.alertable.css" rel="stylesheet">
	</head>
<body class="header_sticky">
	<div class="boxed">

		<div class="overlay"></div>

		<!-- Preloader -->
		<div class="preloader">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div><!-- /.preloader -->

		

		<?php $this->load->view('includes/header'); ?>


		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="form-register">
							<div class="title">
								<h3>Register</h3>
							</div>
							<form action="<?php echo base_url('register/submit')?>" method="post" id="form-register" accept-charset="utf-8">
								<div class="form-box">
									<label for="name">Username <span style="color:red">*</span></label>
									<input type="text" id="name" name="name" required="">
								</div>
								<div class="form-box">
									<label for="email">Email address <span style="color:red">*</span></label>
									<input type="email" id="email" name="email" required="">
								</div>
								<div class="form-box">
									<label for="password">Password <span style="color:red">*</span></label>
									<input type="password" id="password" name="password"  required="">
								</div>
								<div class="clearfix"></div>

								<div class="form-box">
									<label for="c_password">Confim Password <span style="color:red">*</span></label>
									<input type="password" id="c_password" name="c_password"  required="">
								</div>
								<div class="clearfix"></div>
								<div class="form-box">
									<button type="submit" class="register">Register</button>
								</div>
								<div class="clearfix"></div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php $this->load->view('includes/footer'); ?>

	</div><!-- /.boxed -->

		<!-- Javascript -->
		<script  src="<?php echo base_url()?>assets/javascript/jquery.min.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/tether.min.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/bootstrap.min.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/waypoints.min.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/easing.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/jquery.zoom.min.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/jquery.flexslider-min.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/owl.carousel.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/smoothscroll.js"></script>
		<script  src="<?php echo base_url()?>assets/javascript/jquery.mCustomScrollbar.js"></script>
		<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&amp;region=GB"></script>
	   	<script src="<?php echo base_url()?>assets/javascript/gmap3.min.js"></script>
	   	<script  src="<?php echo base_url()?>assets/javascript/waves.min.js"></script>
		<script src="<?php echo base_url()?>assets/javascript/main.js"></script>
		<script src="<?php echo base_url()?>assets/javascript/jquer-validation.js"></script>
		<script src="<?php echo base_url()?>assets/javascript/jquery.alertable.js"></script>
		<?php $this->load->view('includes/message'); ?>

		  <script>
    $(document).ready(function() {
        $("#form-register").validate({
            rules: {
                name: "required",
                password: {
                    required: true,
                    minlength: 5
                },
                c_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },

            },
            messages: {
                name: "Please enter a Username",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                c_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",

            }
        });
    });
    </script>



</body>	
<?php $this->load->view('includes/searchq'); ?>
</html>