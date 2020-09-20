<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shaadi Barati | Mehendi</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/bootstrap3.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/lightbox.min.css">
    <!-- Fonts -->
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Oswald:400,300,700'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic,700italic,600italic,800italic'> <!-- Theme Main Style --> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/libs/theme-style.css">
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e149abf7dc3a500126f4d0f&product=inline-share-buttons' async='async'></script>
    <style>
        .sticky {
    position: fixed;
    top: 0;
    width: 100%;
    }
    .sticky {
  padding-bottom: 300px;
}

    </style>
</head>

<body>

    <!-- START SECTION: home -->
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="title text-white"><span></span>Mehandi Function<span></span></h3>
                    <ul class="names text-white">
                        <li><?php echo (!empty($result->groom))?$result->groom:''; ?></li>
                        <li class="circle">&amp;</li>
                        <li><?php echo (!empty($result->bride))?$result->bride:''; ?></li>
                    </ul>
                    <div class="date text-white"><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></div>

                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION: home -->

    <!-- START: main-sticky-nav -->
    <header>
        <div class="sticky-wrapper" id="nav-sticky-wrapper">
            <nav id="nav" class="navbar navbar-default">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <ul class="names">
                            <li><?php echo (!empty($result->groom))?$result->groom:''; ?></li>
                            <li class="circle">&amp;</li>
                            <li><?php echo (!empty($result->bride))?$result->bride:''; ?></li>
                        </ul>
                    </a>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav_menu">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="nav_menu">
                        <ul id="nav_list" class="nav navbar-nav navbar-right">
                            <li><a href="#home" class="js-scroll-trigger active">Home</a></li>
                            <li><a href="#couple" class=" js-scroll-trigger">Couple</a></li>
                            <li><a href="#gallery" class=" js-scroll-trigger">Gallery</a></li>
                            <li><a href="#featured-people" class=" js-scroll-trigger">Family Members</a></li>
                            <li><a href="#footer" class=" js-scroll-trigger">RSVP</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </div>
    </header>
    <!-- END: main-sticky-nav -->

    <!-- START SECTION: couple -->
    <section id="couple" class="bg-gray-1 content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 text-center">
                    <div class="profile">
                        <h2><span><?php echo (!empty($result->groom))?$result->groom:''; ?> </span></h2>
                        <img src="<?php echo base_url().$result->gimage ?>" class="img-responsive img-circle" alt="Groom" />
                        <p><?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>

                    </div>
                </div>
                <div class="col-md-6 col-xs-12 text-center">
                    <div class="profile">
                        <h2><span><?php echo (!empty($result->bride))?$result->bride:''; ?></span></h2>
                        <img src="<?php echo base_url().$result->bimage ?>" class="img-responsive img-circle" alt="Groom" />
                        <p><?php echo (!empty($result->bdetail))?$result->bdetail:''; ?></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION: couple -->
    <!-- START SECTION: gallery -->
    <section id="gallery" class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
                    <div class="title-block">
                        <h1>Photo <span><em>Gallery</em></span></h1>
                        <div class="divider"></div>

                    </div>
                </div>
            </div>
            <div class=" gallery-popup">
                <div class="row">

                    <?php if (!empty($result->gallery)) {
                    foreach ($result->gallery as $key => $value) { ?>
                        <div class="col-md-4 mb-4"> <a class="example-image-link" href="<?php echo base_url().$value->image ?>" data-lightbox="example-set"><img src="<?php echo base_url().$value->image ?>" alt="" class="img-responsive"></a> </div> 
                    <?php }} ?>
                </div>

            </div>
        </div>
    </section>
    <!-- END SECTION: gallery -->
    <!-- START SECTION: frase -->
    <section id="frase" class="img-bg-2 main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
                    <h2><i class="fas fa-quote-left"></i>Celebrate love with all your heart and share it with all your
                        loved ones.<i
                            class="fas fa-quote-right"></i></h2>
                </div>

            </div>
        </div>
    </section>
    <!-- END SECTION: frase -->


    <!-- START SECTION: featured-people -->
    <section id="featured-people" class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
                    <div class="title-block">
                        <h1>Family <span><em>Members</em></span></h1>
                        <div class="divider"></div>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">

                    <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'groom') { ?>

                    <div class="featured">
                        <img src="<?php echo base_url().$value->image ?>" class="img-responsive img-circle" alt="Groom" />
                        <div class="text">
                            <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                            <h4><span><em><?php echo (!empty($value->realtion))?$value->realtion:''; ?></em></span></h4>
                            <p>From Groom side.</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php } } } ?>
                    
                </div>
                <div class="col-sm-6 col-xs-12 featured-right">

                    <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'bride') { ?>
                    <div class="featured">
                        <img src="<?php echo base_url().$value->image ?>" class="img-responsive img-circle" alt="Groom" />
                        <div class="text">
                            <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                            <h4><span><em><?php echo (!empty($value->realtion))?$value->realtion:''; ?></em></span></h4>
                            <p>From Bride side</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php    }} } ?>

                   
                    
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION: featured-people -->

    <!-- START SECTION: our-event -->
    <section id="our-story " class="bg-gray-1 main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
                    <div class="title-block">
                        <h1>Our <span><em>Events</em></span></h1>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
            <ul class="timeline">
                <?php if (!empty($result->event)) {
                foreach ($result->event as $key => $value) { 
                    if($key % 2 != 0){
                        $eve = 'timeline-inverted';
                    }else{
                        $eve = '';
                    }
                ?>
                <li class="<?php echo $eve ?>" >
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h2 class="timeline-title"><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?></h2>
                        </div>
                        <div class="timeline-body text-center">

                            <h2 class="timeline-title"><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                            <h6> <?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?><?php echo (!empty($value->time))?$value->time:''; ?> <?php echo (!empty($value->address))?$value->address:''; ?></h6>
                            <p><?php echo (!empty($value->desc))?$value->desc:''; ?></p>
                        </div>
                    </div>
                </li>
            <?php }} ?>


                


            </ul>

        </div>
    </section>
    <!-- END SECTION: our-event -->


    <!-- START: footer -->
    <section id="footer" class="img-bg-5 main">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12 text-center">
                    <h1>RSVP!</h1>
                    <ul class="names">
                        <li><span><?php echo (!empty($result->grsvp_name))?$result->grsvp_name:''; ?></li>
                        <li class="circle">&amp;</li>
                        <li><span><?php echo (!empty($result->brsvp_name))?$result->brsvp_name:''; ?></li>
                    </ul>
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <h4 class=" cnt">Groom's: <span>Contact no( <a href="tel:<?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?>"><?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?></a> )</span></h4>
                        </div>
                        <div class="col-md-6 text-left">
                            <h4  class=" cnt">Bride's: <span>Contact no( <a href="tel:<?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?>"><?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></a> )</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: footer -->

    <!-- START: scripts -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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

    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("nav-sticky-wrapper");
    var sticky = navbar.offsetTop;

    function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
    }
    </script>
</body>

</html>