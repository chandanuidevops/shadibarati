<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Shaadi Baraati  - Reception</title>
	<meta name="description" content="UX designer and web developer">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets1/css/bootstrap3.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets1/css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>

	<link
		href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700'
		rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/font-awesome.min.css">

</head>
<body>
	<header>
		<div class="menu">
			<div class="navbar-wrapper">
				<div class="container">

					<div class="logo">
						<h1><a>Sophie & Andy</a></h1>
					</div>

					<div class="navwrapper">
						<div class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
							<div class="container">
								<div class="navArea">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse"
											data-target=".navbar-collapse"> <span class="icon-bar"></span> <span
												class="icon-bar"></span> <span class="icon-bar"></span> </button>
									</div>
									<div class="navbar-collapse collapse">
										<ul class="nav navbar-nav" id="navigation">
											<li class="menuItem"><a class="js-scroll-trigger active" href="#banner">HOME</a></li>
											<li class="menuItem"><a class="js-scroll-trigger" href="#theCouple">The Couple</a></li>
											<li class="menuItem"><a class="js-scroll-trigger" href="#eventsSchedule">Events Schedule</a></li>
											<li class="menuItem"><a class="js-scroll-trigger" href="#importantPeople">FAMILY</a></li>

											<li class="menuItem"><a class="js-scroll-trigger" href="#photoAlbum">GALLERY</a></li>
											<li class="menuItem"><a class="js-scroll-trigger" href="#rsvp">RSVP</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Navbar -->
				</div>
			</div>
		</div>
		<!--menu end-->

		<!-- header start-->
		<div class="banner row" id="banner">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noPadd slides-container p0" style="height:100%">
			
				<div class="slide">
					<div class=" hedaer-inner">
						<img src="<?php echo base_url() ?>assets1/img6/header-image/image01.jpg" alt="image01">
						<div class="bannerText clearfix">
							<h1><?php echo (!empty($result->groom))?$result->groom:''; ?> & <?php echo (!empty($result->bride))?$result->bride:''; ?></h1>
							<h4>To Celebrate our Wedding</h4>
							<div class="heartline">
								<hr>
								<i class="fa fa-heart"></i> </div>
							<h4><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></h4>
							<p class="downArrow"><a href="#theCouple"><i class="fa fa-chevron-down"></i></a></p>
						</div>
						
					</div>
					
				</div>

			</div>
		</div>
	</header>
	<!--Header end -->
	<!--The Couple section -->
	<section class="yellow_section section_gap pb-sm-0" id="theCouple">
		<div class="container">
			<div class="row heading">
				<div class="col-xs-12  noPadd text-center">
					<h2>The Couple<span>Bride & the Groom</span></h2>
				</div>
				
			</div>
			<div class="row clearfix theCouple">
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"> <img src="<?php echo base_url().$result->bimage ?>" alt=" "
						class="bigRound" />
					<h3><?php echo (!empty($result->bride))?$result->bride:''; ?></h3>
					<p><?php echo (!empty($result->bdetail))?$result->bdetail:''; ?></p>
				</div>
				<div class="col-md-2 col-lg-2 line"> <i class="fa fa-heart"></i> </div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"> <img src="<?php echo base_url().$result->gimage ?>" alt=" "
						class="bigRound" />
					<h3><?php echo (!empty($result->groom))?$result->groom:''; ?></h3>
					<p><?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>
				</div>
			</div>
		</div>
	</section>
	<!--/The Couple section -->

	<!--Events Schedule start -->
	<section class="section_gap" id="eventsSchedule">
		<div class="container">
			<div class="row heading">
				<div class="col-xs-12 noPadd text-center">
					<h2>Events Schedule<span>The Wedding Events</span></h2>
				</div>
			
			</div>
			<div class="row events clearfix">
				<?php if (!empty($result->event)) {
                foreach ($result->event as $key => $value) {  

                	if($key == '0'){
                		$img = base_url('assets1/img6/engagement.jpg');
                	}else if($key == '1'){
                		$img = base_url('assets1/img6/wedding-ceremony.jpg');
                	}else{
                		$img = base_url('assets1/img6/wedding-reception.jpg');
                	} ?>
				<div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 events"> <img src="<?php echo $img ?>" alt=" " />
					<div class="desc">
						<h4><a href="#"><?php echo (!empty($value->name))?$value->name:''; ?></a><span><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?> <?php echo (!empty($value->time))?$value->time:''; ?></span></h4>
						<p><?php echo (!empty($value->address))?$value->address:''; ?></p>
						<p><?php echo (!empty($value->desc))?$value->desc:''; ?></p>
					</div>
				</div>
				<?php }} ?>

			</div>
		</div>
	</section>
	<!--/Events Schedule end -->
	<!--Important People -->
	<section class="grey_section section_gap" id="importantPeople">
		<div class="container">
			<div class="row heading">
				<div class="col-xs-12  text-center noPadd">
					<h2>Family members<span>For Bride & the Groom</span></h2>
				</div>
				
			</div>
			<div class="row bride">
				<ul class="clearfix">
					
					<li class="col-xs-12 col-sm-3 col-md-3 col-lg-3 pinkCircle">
						<div class="nameCircle"> <em>Bride <span class="smallTxt">Family</span></em> </div>
					</li>
					
					<?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'bride') { ?>
						<li class="col-xs-12 col-sm-3 col-md-3 col-lg-3 circle"> <img src="<?php echo base_url().$value->image ?>" alt=" " class="smallRound" />
							<h4><?php echo (!empty($value->name))?$value->name:''; ?><span><?php echo (!empty($value->realtion))?$value->realtion:''; ?></span></h4>
						</li>
					<?php    }} } ?>

				</ul>
			</div>
			<div class="row groom">
				<ul class="clearfix">
					<li class="col-xs-12 col-sm-3 col-md-3 col-lg-3 blueCircle">
						<div class="nameCircle"> <em>Groom <span class="smallTxt">Family</span></em> </div>
					</li>
					<?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'groom') { ?>
						<li class="col-xs-12 col-sm-3 col-md-3 col-lg-3 circle"> <img src="<?php echo base_url().$value->image ?>" alt=" " class="smallRound" />
							<h4><?php echo (!empty($value->name))?$value->name:''; ?><span><?php echo (!empty($value->realtion))?$value->realtion:''; ?></span></h4>
						</li>
					<?php } } } ?>
					
				</ul>
			</div>
		</div>
	</section>
	<!--/Important People -->
	<!--Photo Album start -->
	<section class="pricingtables section_gap" id="photoAlbum">
		<div class="container">
			<div class="row heading">
				<div class="col-xs-12  text-center noPadd">
					<h2>Photo Album<span>The Memorable moments </span></h2>
				</div>
				
			</div>
			<div class="row gallery">
				<ul class="thumbnails">
					<?php if (!empty($result->gallery)) {
                    foreach ($result->gallery as $key => $value) { ?>
					<li class="span3 col-xs-12 col-sm-4 col-md-4 col-lg-4"> <span class="hoverZoom"> <span
								class="smallIcon"> <a rel="lightbox-demo" href="<?php echo base_url().$value->image ?>" title="Album Title1" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> </span> </span> <img class="group1" src="<?php echo base_url().$value->image ?>" title="Image Title" /> </li>
					<?php }} ?>
				</ul>
			</div>
			<!-- /.row -->

		</div>
	</section>
	<!--Photo Album end -->

	<!--RSVP section start -->
	<section class="pinkSection section_gap" id="rsvp">
		<div class="container">
			<div class="row heading rsvp">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
					<h2 class="text-white">RSVP <span>JOIN OUR PARTY</span></h2>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
					<h4  class="text-white"><span></span> GROOM : (<a href="tel:<?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?>"><?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?></a>)</h4>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
				<h4  class="text-white"> <span></span> BRIDE : (<a href="tel:<?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?>"><?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></a>)</h4>
				</div>
			</div>
		</div>
	</section>
    <script src="<?php echo base_url() ?>assets1/js/jquery-1.12.4.min.js"></script>
    <!-- Bootstrap main Js File-->
    <script src="<?php echo base_url() ?>assets1/js/bootstrap3.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/js/lightbox-plus-jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets1/js/jquery.easing.min.js"></script>
	<script>
		//scroll page on clicking nav
		(function($) {
        "use strict";
        $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
            $('a.js-scroll-trigger').removeClass('active')
            $(this).addClass('active');
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location
                .hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: (target.offset().top - 0)
                    }, 1000, "easeInOutExpo");
                    return false;
                }
            }
        });
    })(jQuery);
	</script>
</body>
</html>