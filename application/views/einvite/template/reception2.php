<!doctype html>
<html lang="en">


<head>

    <!-- Basic -->
    <meta charset="utf-8">


    <!-- Page Title -->
    <title>Shaadi Baraati - Reception</title>

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link href="<?php echo base_url() ?>assets1/img7/favicon.ico" rel="shortcut icon" type="image/x-icon">
   

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/vendor/bootstrap/css/bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/vendor/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/vendor/owlcarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/vendor/animate_css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/vendor/magnific-popup/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/vendor/vegas/dist/vegas.min.css">

    <!-- Fonts CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/reception2.css">

</head>

<body>
    <!-- slider Section -->
    <div id="banner" class="banner">
        <img src="<?php echo base_url() ?>assets1/img7/portfolio_1.jpg" alt="" width="100%">
        <div class="holder-caption">
            <div class=" relative-z">
                <h1><span class="custom-color">W</span>edding</h1>
                <div class="slider-text-holder">
                    <h2><?php echo (!empty($result->groom))?$result->groom:''; ?> & <?php echo (!empty($result->bride))?$result->bride:''; ?></h2>
                   
                </div>
            </div>
            <div class="slider-scroll">
                <a class="scroll-link" href="#about">
                    <i class="fa fa-angle-down fade-down"></i>
                </a>
            </div>
            <!-- <div class="img-overlay"></div> -->
        </div>
    </div>
    <!-- slider Section End -->

    <!-- Sticky Menu -->
    <header id="nav-holder">
        <nav id="primary-navbar" class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Arl<span class="custom-color">i</span>n
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto menu-right">
                        <li class="nav-item">
                            <a class="nav-link" href="#slider">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#people">Family</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#portfolio">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#event">Event</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#footer">RSVP</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Sticky Menu End -->

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="big-head-wrap">
                        <img class="headline-hearth" src="<?php echo base_url() ?>assets1/img7/headline_hearth.svg" alt="wedding-head-image">
                    </div>
                    <h2 class="big-heading mt-0 mt-0">Happy <span class="custom-color">Couple</span></h2>
                    <img class="headline_1" src="<?php echo base_url() ?>assets1/img7/headline_simple.svg" alt="">
                    <p class="sub-heading col-lg-8 offset-lg-2 margin-b-5"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center margin-xs-b-2 margin-sm-b-2">
                    <figure>
                        <img src="<?php echo base_url().$result->bimage ?>" alt="bride" class="img-fluid rounded-circle">
                    </figure>
                    <div class="about-content col-sm-8 offset-sm-2">
                        <h4><?php echo (!empty($result->bride))?$result->bride:''; ?>
                            <span class="custom-color">Bride</span>
                        </h4>
                        <p><?php echo (!empty($result->bdetail))?$result->bdetail:''; ?></p>

                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <figure>
                        <img src="<?php echo base_url().$result->gimage ?>" alt="groom" class="img-fluid rounded-circle">
                    </figure>
                    <div class="about-content col-sm-8 offset-sm-2">
                        <h4><?php echo (!empty($result->groom))?$result->groom:''; ?>
                            <span class="custom-color">Groom</span>
                        </h4>
                        <p><?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
    <!-- Portfolio Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="big-head-wrap">
                        <img class="headline-hearth" src="<?php echo base_url() ?>assets1/img7/headline_hearth.svg" alt="">
                    </div>
                    <h2 class="big-heading mt-0 mt-0">
                        <span class="custom-color">Our</span> Gallery
                    </h2>
                    <img class="headline_1" src="<?php echo base_url() ?>assets1/img7/headline_simple.svg" alt="">
                    <p class="sub-heading col-lg-8 offset-lg-2 margin-b-5"></p>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <!-- Portfolio Images -->
            <div class="row grid">
            <?php if (!empty($result->gallery)) {
            foreach ($result->gallery as $key => $value) { ?>
                <div class="grid-item popup-gallery col-lg-3 col-md-6 col-sm-12 party transition"
                    data-category="transition">
                    <div class="item">
                        <a href="<?php echo base_url().$value->image ?>">
                            <div class="thumbnail-overlay">
                                <img class="img-fluid" src="<?php echo base_url().$value->image ?>" alt="">
                                <span class="thumbnail-title">
                                    <i class="fa fa-search-plus"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
             <?php }} ?>
            </div>
        </div>
    </section>
    <!-- Portfolio Section End -->

    <!-- Event Section -->
    <section id="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="big-head-wrap">
                        <img class="headline-hearth" src="<?php echo base_url() ?>assets1/img7/headline_hearth.svg" alt="">
                    </div>
                    <h2 class="big-heading mt-0 mt-0">
                        <span class="custom-color">Wedding</span> Event
                    </h2>
                    <img class="headline_1" src="<?php echo base_url() ?>assets1/img7/headline_simple.svg" alt="">
                    <p class="sub-heading col-lg-8 offset-lg-2 margin-b-5"></p>
                </div>
            </div>

        </div>
        <div class="container relative-z">
            <div class="card-deck">
                <?php if (!empty($result->event)) {
                foreach ($result->event as $key => $value) {  ?>
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url() ?>assets1/img7/blog_1_350x234.jpg" alt="blog">
                    <div class="card-body">
                        <h5 class="font-weight-light card-title"><?php echo (!empty($value->name))?$value->name:''; ?></h5>
                        <p class="card-text"><?php echo (!empty($value->desc))?$value->desc:''; ?></p>
                        <p class="link"><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?> <?php echo (!empty($value->time))?$value->time:''; ?> <?php echo (!empty($value->address))?$value->address:''; ?></p>
                    </div>
                </div>
            <?php  }} ?>
            </div>
        </div>
    </section>
    <!-- Event Section End -->
    <!-- Comment Section -->
    <!-- <section id="comment">
        <div class="container relative-z">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div  class="">
                        <div class="item">
                            <h3 class="heading text-center">Adipiscing elit. Sed turpis massa, scelerisque vel diam non,
                                tristique condimentum dui.</h3>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        
    </section> -->
    <!-- Comment Section End -->




    <!-- People Section -->
    <section id="people">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="big-head-wrap">
                        <img class="headline-hearth" src="<?php echo base_url() ?>assets1/img7/headline_hearth.svg" alt="">
                    </div>
                    <h2 class="big-heading mt-0 mt-0">
                        Important <span class="custom-color">People</span>
                    </h2>
                    <img class="headline_1" src="<?php echo base_url() ?>assets1/img7/headline_simple.svg" alt="">
                    <p class="sub-heading col-lg-8 offset-lg-2 margin-b-5">Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Sed turpis massa, scelerisque vel diam non.</p>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-6 text-center">
                    <h4 class="margin-b-2">Bridemaids</h4>
                    <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'bride') { ?>
                        <div class="people-img text-center">
                            <img class="" src="<?php echo base_url().$value->image ?>" alt="">
                            <p><?php echo (!empty($value->name))?$value->name:''; ?></p>
                            <p><?php echo (!empty($value->realtion))?$value->realtion:''; ?></p>
                        </div>
                    <?php    }} } ?>

                </div>
                <div class="col col-lg-6 text-center">
                    <h4 class="margin-b-2">Groomsmen's</h4>
                    <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'groom') { ?>
                        <div class="people-img text-center">
                            <img class="" src="<?php echo base_url().$value->image ?>" alt="">
                            <p><?php echo (!empty($value->name))?$value->name:''; ?></p>
                            <p><?php echo (!empty($value->realtion))?$value->realtion:''; ?></p>
                        </div>
                    <?php } } } ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- People Section End -->



    <!-- Footer RSVP -->
    <footer id="footer" class="relative-z">
        <div id="rsvp" class="container relative-z">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="big-head-wrap">
                        <img class="headline-hearth op-03" src="<?php echo base_url() ?>assets1/img7/headline_hearth.svg" alt="">
                    </div>
                    <h2 class="big-heading mt-0 mt-0">
                        <span class="custom-color">R</span>SVP
                    </h2>
                    <img class="headline_1" src="<?php echo base_url() ?>assets1/img7/headline_simple.svg" alt="">
                    <p class="sub-heading col-lg-8 offset-lg-2 "></p>
                        <h4  class="text-white cnt"> <span> GROOM : (<a href="tel:<?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?>"><?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?></a>) </span> / <span> BRIDE : (<a href="tel:<?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?>"><?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></a>) </span></h4>
                </div>
            </div>

        </div>

    </footer>
    <!-- Footer RSVP End -->



    <!-- Scroll Up -->
    <div class="scrollup">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <!-- Scroll Up End -->

    <!-- Frameworks -->
    <script src="<?php echo base_url() ?>assets1/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url() ?>assets1/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/vendor/vegas/dist/vegas.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets1/vendor/jquery-validation/js/jquery.validate.min.js"></script> -->
    <script src="<?php echo base_url() ?>assets1/vendor/waypoint/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/vendor/isotope/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/vendor/owlcarousel/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/vendor/countup/js/countUp.min.js"></script>
    <script src="<?php echo base_url() ?>assets1/vendor/jquery.scrollTo/jquery.scrollTo.min.js"></script>

    <!-- Theme Sett -->
    <script src="<?php echo base_url() ?>assets1/js/reception2.js"></script>

    <!-- Google Map Settings-->


    </script>


</body>



</html>