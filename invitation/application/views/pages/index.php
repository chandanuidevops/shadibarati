<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
		<meta charset="UTF-8">
		<title>Techno Store - Home 2</title>
		<meta name="author" content="CreativeLayers">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/responsive.css">
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/favicon/favicon.png">
	</head>
	<body class="header_sticky background">
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

			<div class="divider35"></div>

			<section class="flat-row flat-slider">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="slider owl-carousel-11">

								<?php if (!empty($banner)) {
									foreach ($banner as $key => $value) { ?>

										<a href="<?php echo $value->link; ?>" target="_blank">

										<div class="slider-item style1">
											<div class="item-image">
												<img src="<?php echo base_url().$value->image; ?>" alt="">
											</div>
											<div class="clearfix"></div>
										</div><!-- /.slider-item style1 -->
									</a>


								<?php } }else{

									echo '<div class="slider-item style10">
									<div class="item-text">
										<div class="content-item"> </div>
										</div>
									</div>';

								} ?> 
								
								
							</div>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>
		

			<section class="flat-row flat-imagebox style1">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="flat-row-title">
								<h3>Trending</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="owl-carousel-19">
							<?php if (!empty($product)) {
								foreach ($product as $key => $value) { 
									if ($value->pr_type == '1') {
								?>
									<div class="owl-carousel-item">
								<div class="product-box style1 v1">
									<div class="imagebox style1">
										<div class="box-image">
											<a href="<?php echo base_url('product/').$value->pr_id ?>" title="">
												<img src="<?php echo base_url().$value->featured_image; ?>" alt="">
											</a>
										</div>
										<div class="box-content">
											<div class="cat-name">
												<a href="<?php echo base_url('product/').$value->pr_id ?>" title=""><?php echo (!empty($value->title))?$value->title:''; ?></a>
											</div>
											<div class="product-name">
												<a href="<?php echo base_url('product/').$value->pr_id ?>" title=""><?php echo (!empty($value->name))?$value->name:''; ?><br /><?php echo (!empty($value->sku))?$value->sku:''; ?></a>
											</div>
											<div class="price">
												<span class="regular"><?php echo (!empty($value->mrp))?$value->mrp:''; ?></span>
												<span class="sale"><?php echo (!empty($value->selling_price))?$value->selling_price:''; ?></span>
											</div>
										</div>
										<div class="clearfix"></div>

										<div class="row">

										<div class="box-bottom">
											<div class="compare-wishlist">
												<a href="#" class="wishlist" title="">
													<img src="<?php echo base_url()?>assets/images/icons/wishlist.png" alt="">Wishlist
												</a>
											</div>
											<div class="btn-add-cart">
												<a href="#" title="">
													<img src="<?php echo base_url()?>assets/images/icons/add-cart.png" alt="">Add to Cart
												</a>
											</div>
										</div>
										</div>
									</div>
								</div>
								<div class="divider60"></div>
							</div>
							<?php }	} } ?> 
							
						</div>
					</div>
				</div>
			</section>

			<section class="flat-row flat-imagebox style4">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="flat-row-title">
								<h3>New Designs</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="wrap-most-view">
							<div class="owl-carousel-6">
								<?php if (!empty($product)) {
								foreach ($product as $key => $value) { 
									if ($value->pr_type == '2') {
								?>
								<div class="imagebox style4">
									<div class="box-image">
										<a href="<?php echo base_url('product/').$value->pr_id ?>" title="">
											<img src="<?php echo base_url().$value->featured_image; ?>" alt="">
										</a>
									</div>
									<div class="box-content">
										<div class="cat-name">
											<a href="<?php echo base_url('product/').$value->pr_id ?>" title=""><?php echo (!empty($value->title))?$value->title:''; ?></a>
										</div>
										<div class="product-name">
											<a href="<?php echo base_url('product/').$value->pr_id ?>" title=""><?php echo (!empty($value->name))?$value->name:''; ?><br /><?php echo (!empty($value->sku))?$value->sku:''; ?></a>
										</div>
										<div class="price">
											<span class="sale"><?php echo (!empty($value->mrp))?$value->mrp:''; ?></span>
											<span class="regular"><?php echo (!empty($value->selling_price))?$value->selling_price:''; ?></span>
										</div>
									</div>
									<div class="box-bottom">
											<div class="compare-wishlist">
												<a href="#" class="wishlist" title="">
													<img src="<?php echo base_url()?>assets/images/icons/wishlist.png" alt="">Wishlist
												</a>
											</div>
											<div class="btn-add-cart">
												<a href="#" title="">
													<img src="<?php echo base_url()?>assets/images/icons/add-cart.png" alt="">Add to Cart
												</a>
											</div>
										</div>
								</div>
							<?php }}}?>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="flat-row flat-imagebox style1">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="flat-row-title">
								<h3>Most Selling</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="owl-carousel-19">
							<?php if (!empty($product)) {
								foreach ($product as $key => $value) { 
									if ($value->pr_type == '3') {
								?>
									<div class="owl-carousel-item">
								<div class="product-box style1 v1">
									<div class="imagebox style1">
										<div class="box-image">
											<a href="<?php echo base_url('product/').$value->pr_id ?>" title="">
												<img src="<?php echo base_url().$value->featured_image; ?>" alt="">
											</a>
										</div>
										<div class="box-content">
											<div class="cat-name">
												<a href="<?php echo base_url('product/').$value->pr_id ?>" title=""><?php echo (!empty($value->title))?$value->title:''; ?></a>
											</div>
											<div class="product-name">
												<a href="<?php echo base_url('product/').$value->pr_id ?>" title=""><?php echo (!empty($value->name))?$value->name:''; ?><br /><?php echo (!empty($value->sku))?$value->sku:''; ?></a>
											</div>
											<div class="price">
												<span class="regular"><?php echo (!empty($value->mrp))?$value->mrp:''; ?></span>
												<span class="sale"><?php echo (!empty($value->selling_price))?$value->selling_price:''; ?></span>
											</div>
										</div>
										<div class="clearfix"></div>

										<div class="row">

										<div class="box-bottom">
											<div class="compare-wishlist">
												<a href="#" class="wishlist" title="">
													<img src="<?php echo base_url()?>assets/images/icons/wishlist.png" alt="">Wishlist
												</a>
											</div>
											<div class="btn-add-cart">
												<a href="#" title="">
													<img src="<?php echo base_url()?>assets/images/icons/add-cart.png" alt="">Add to Cart
												</a>
											</div>
										</div>
										</div>
									</div>
								</div>
								<div class="divider60"></div>
							</div>
							<?php }	} } ?> 
							
						</div>
					</div>
				</div>
			</section>





			

			<section class="flat-iconbox">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="iconbox">
								<div class="box-header">
									<div class="image">
										<img src="<?php echo base_url()?>assets/images/icons/car.png" alt="">
									</div>
									<div class="box-title">
										<h3>Worldwide Shipping</h3>
									</div>
								</div>
								<div class="box-content">
									<p>Free Shipping On Order Over $100</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="iconbox">
								<div class="box-header">
									<div class="image">
										<img src="<?php echo base_url()?>assets/images/icons/order.png" alt="">
									</div>
									<div class="box-title">
										<h3>Order Online Service</h3>
									</div>
								</div>
								<div class="box-content">
									<p>Free return products in 30 days</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="iconbox">
								<div class="box-header">
									<div class="image">
										<img src="<?php echo base_url()?>assets/images/icons/payment.png" alt="">
									</div>
									<div class="box-title">
										<h3>Payment</h3>
									</div>
								</div>
								<div class="box-content">
									<p>Secure System</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="iconbox">
								<div class="box-header">
									<div class="image">
										<img src="<?php echo base_url()?>assets/images/icons/return.png" alt="">
									</div>
									<div class="box-title">
										<h3>Return 30 Days</h3>
									</div>
								</div>
								<div class="box-content">
									<p>Free return products in 30 days</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>



			<?php $this->load->view('includes/footer'); ?>
		</div>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/tether.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/waypoints.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/easing.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.zoom.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.flexslider-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/owl.carousel.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/smoothscroll.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.mCustomScrollbar.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&amp;region=GB"></script>
	   	<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/gmap3.min.js"></script>
	   	<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/waves.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.countdown.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/javascript/main.js"></script>
		<?php $this->load->view('includes/searchq'); ?>
	</body>	
</html>