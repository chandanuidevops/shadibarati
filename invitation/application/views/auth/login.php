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
		<!-- <div class="preloader">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div> -->
		<!-- /.preloader -->

		

		<?php $this->load->view('includes/header'); ?>


		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="form-login">
							<div class="title">
								<h3>Login</h3>
							</div>
							<form action="<?php echo base_url('login/validate')?>" method="post" id="form-login" accept-charset="utf-8">
								<div class="form-box">
									<label for="email">email address <span style="color:red">*</span> </label>
									<input type="email" id="email" name="email" required="">
								</div>
								<div class="form-box">
									<label for="password">Password <span style="color:red">*</span> </label>
									<input type="password" id="password" name="password" required="">
								</div><!-- /.form-box -->
								<div class="form-box">
									<button type="submit" class="login">Login</button>
									<a href="#" title="">Lost your password?</a>
								</div><!-- /.form-box -->
							</form><!-- /#form-login -->
						</div><!-- /.form-login -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-account -->

		<section class="flat-row flat-iconbox style1 background">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="<?php echo base_url() ?>assets/images/icons/car.png" alt="">
								</div>
								<div class="box-title">
									<h3>Worldwide Shipping</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="<?php echo base_url() ?>assets/images/icons/order.png" alt="">
								</div>
								<div class="box-title">
									<h3>Order Online Service</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="<?php echo base_url() ?>assets/images/icons/payment.png" alt="">
								</div>
								<div class="box-title">
									<h3>Payment</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="<?php echo base_url() ?>assets/images/icons/return.png" alt="">
								</div>
								<div class="box-title">
									<h3>Return 30 Days</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-iconbox -->

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
        $("#form-login").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },

            },
            messages: {
                email: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },

            }
        });
    });
    </script>

</body>	
<?php $this->load->view('includes/searchq'); ?>
</html>