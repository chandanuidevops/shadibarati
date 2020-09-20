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
					<div class="col-md-6">
						<div class="form-login">
							<div class="title">
								<h3>Login</h3>
							</div>
							<form action="#" method="get" id="form-login" accept-charset="utf-8">
								<div class="form-box">
									<label for="name-login">Username or email address * </label>
									<input type="text" id="name-login" name="name-login" placeholder="Ali">
								</div><!-- /.form-box -->
								<div class="form-box">
									<label for="password-login">Password * </label>
									<input type="text" id="password-login" name="password-login" placeholder="******">
								</div><!-- /.form-box -->
								<div class="form-box checkbox">
									<input type="checkbox" id="remember" checked name="remember">
									<label for="remember">Remember me</label>
								</div><!-- /.form-box -->
								<div class="form-box">
									<button type="submit" class="login">Login</button>
									<a href="#" title="">Lost your password?</a>
								</div><!-- /.form-box -->
							</form><!-- /#form-login -->
						</div><!-- /.form-login -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="form-register">
							<div class="title">
								<h3>Register</h3>
							</div>
							<form action="#" method="get" id="form-register" accept-charset="utf-8">
								<div class="form-box">
									<label for="name-register">Email address * </label>
									<input type="text" id="name-register" name="name-register">
								</div><!-- /.form-box -->
								<div class="form-box">
									<label for="password-register">Password</label>
									<input type="text" id="password-register" name="password-register">
								</div><!-- /.form-box -->
								<div class="form-box">
									<button type="submit" class="register">Register</button>
								</div><!-- /.form-box -->
							</form><!-- /#form-register -->
						</div><!-- /.form-register -->
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

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="widget-ft widget-about">
							<div class="logo logo-ft">
								<a href="index.html" title="">
									<img src="<?php echo base_url() ?>assets/images/logos/logo-ft.png" alt="">
								</a>
							</div><!-- /.logo-ft -->
							<div class="widget-content">
								<div class="icon">
									<img src="<?php echo base_url() ?>assets/images/icons/call.png" alt="">
								</div>
								<div class="info">
									<p class="questions">Got Questions ? Call us 24/7!</p>
									<p class="phone">Call Us: (888) 1234 56789</p>
									<p class="address">
										PO Box CT16122 Collins Street West, Victoria 8007,<br />Australia.
									</p>
								</div>
							</div><!-- /.widget-content -->
							<ul class="social-list">
								<li>
									<a href="#" title="">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-pinterest" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-dribbble" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-google" aria-hidden="true"></i>
									</a>
								</li>
							</ul><!-- /.social-list -->
						</div><!-- /.widget-about -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="widget-ft widget-categories-ft">
							<div class="widget-title">
								<h3>Find By Categories</h3>
							</div>
							<ul class="cat-list-ft">
								<li>
									<a href="#" title="">Desktops</a>
								</li>
								<li>
									<a href="#" title="">Laptops & Notebooks</a>
								</li>
								<li>
									<a href="#" title="">Components</a>
								</li>
								<li>
									<a href="#" title="">Tablets</a>
								</li>
								<li>
									<a href="#" title="">Software</a>
								</li>
								<li>
									<a href="#" title="">Phones & PDAs</a>
								</li>
								<li>
									<a href="#" title="">Cameras</a>
								</li>
							</ul><!-- /.cat-list-ft -->
						</div><!-- /.widget-categories-ft -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-2 col-md-6">
						<div class="widget-ft widget-menu">
							<div class="widget-title">
								<h3>Customer Care</h3>
							</div>
							<ul>
								<li>
									<a href="#" title="">
										Contact us
									</a>
								</li>
								<li>
									<a href="#" title="">
										Site Map
									</a>
								</li>
								<li>
									<a href="#" title="">
										My Account
									</a>
								</li>
								<li>
									<a href="#" title="">
										Wish List
									</a>
								</li>
								<li>
									<a href="#" title="">
										Delivery Information
									</a>
								</li>
								<li>
									<a href="#" title="">
										Privacy Policy
									</a>
								</li>
								<li>
									<a href="#" title="">
										Terms & Conditions
									</a>
								</li>
							</ul>
						</div><!-- /.widget-menu -->
					</div><!-- /.col-lg-2 col-md-6 -->
					<div class="col-lg-4 col-md-6">
						<div class="widget-ft widget-newsletter">
							<div class="widget-title">
								<h3>Sign Up To New Letter</h3>
							</div>
							<p>Make sure that you never miss our interesting <br />
								news by joining our newsletter program
							</p>
							<form action="#" class="subscribe-form" method="get" accept-charset="utf-8">
								<div class="subscribe-content">
									<input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail">
									<button type="submit"><img src="<?php echo base_url() ?>assets/images/icons/right-2.png" alt=""></button>
								</div>
							</form><!-- /.subscribe-form -->
							<ul class="pay-list">
								<li>
									<a href="#" title="">
										<img src="<?php echo base_url() ?>assets/images/logos/ft-01.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="<?php echo base_url() ?>assets/images/logos/ft-02.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="<?php echo base_url() ?>assets/images/logos/ft-03.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="<?php echo base_url() ?>assets/images/logos/ft-04.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="<?php echo base_url() ?>assets/images/logos/ft-05.png" alt="">
									</a>
								</li>
							</ul><!-- /.pay-list -->
						</div><!-- /.widget-newsletter -->
					</div><!-- /.col-lg-4 col-md-6 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						<div class="widget widget-apps">
							<div class="widget-title">
								<h3>Mobile Apps</h3>
							</div>
							<ul class="app-list">
								<li class="app-store">
									<a href="#" title="">
										<div class="img">
											<img src="<?php echo base_url() ?>assets/images/icons/app-store.png" alt="">
										</div>
										<div class="text">
											<h4>App Store</h4>
											<p>Available now on the</p>
										</div>
									</a>
								</li><!-- /.app-store -->
								<li class="google-play">
									<a href="#" title="">
										<div class="img">
											<img src="<?php echo base_url() ?>assets/images/icons/google-play.png" alt="">
										</div>
										<div class="text">
											<h4>Google Play</h4>
											<p>Get in on</p>
										</div>
									</a>	
								</li><!-- /.google-play -->
							</ul><!-- /.app-list -->
						</div><!-- /.widget-apps -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<section class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="copyright"> All Rights Reserved © Techno Store 2017</p>
						<p class="btn-scroll">
							<a href="#" title="">
								<img src="<?php echo base_url() ?>assets/images/icons/top.png" alt="">
							</a>
						</p>
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.footer-bottom -->

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

</body>	
<?php $this->load->view('includes/searchq'); ?>
</html>