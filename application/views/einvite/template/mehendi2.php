<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shaadi Barati | Mehendi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/grid-gallery.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/mehendi2.css">
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e149abf7dc3a500126f4d0f&product=inline-share-buttons' async='async'></script>
    <style>
        .sticky {
    position: fixed;
    top: 0;
    width: 100%;
    }
 

    </style>

</head>

<body>
    <header>
        <div class="top">
            <h4>Smith & Karina</h4>
        </div>
    </header>
    <nav class="navbar navbar-expand-md navbar-light  custom-navbar" id="navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link js-scroll-trigger active" href="#home">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#couple">COUPLE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#event">EVENT</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#gallery">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#family">FAMILY</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#rsvp">RSVP</a>
                </li>


            </ul>
        </div>
    </nav>
    <section class="banner" id="home">
        <img src="<?php echo base_url() ?>assets1/img5/banner.jpg" alt="" style="width: 100%" class="img-fluid">
        <div class="banner-title text-center">
            <h1><?php echo (!empty($result->groom))?$result->groom:''; ?> & <?php echo (!empty($result->bride))?$result->bride:''; ?></h1>
            <span>MEHENDI INVITATION</span>
        </div>
    </section>
    <section class="main pb0" id="couple">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="title">
                            Happy Couple
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 prl-0">
                    <img src="<?php echo base_url().$result->gimage ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-3 prl-0 bg-color border-r">
                    <div class="box">
                        <h4><?php echo (!empty($result->groom))?$result->groom:''; ?> </h4>
                        <p><?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>
                    </div>
                </div>
                <div class="col-md-3 prl-0 bg-color">
                    <div class="box text-right">
                        <h4><?php echo (!empty($result->bride))?$result->bride:''; ?></h4>
                        <p><?php echo (!empty($result->bdetail))?$result->bdetail:''; ?></p>
                    </div>
                </div>
                <div class="col-md-3 prl-0">
                    <img src="<?php echo base_url().$result->bimage ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="main  pt-140 bg-color" id="event">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="title">
                            Mehendi Events
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="row mt-4">
                <?php if (!empty($result->event)) {
                foreach ($result->event as $key => $value) {  ?>

                    <div class="col-md-4" style="margin: auto">
                    <div class="card custom-card text-center">
                        <img src="<?php echo base_url() ?>assets1/img5/2.png" alt="" class="img-fluid">
                        <h2 class="text">Date & Time</h2>
                        <h5><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?> <?php echo (!empty($value->time))?$value->time:''; ?></h5>
                        <p class="location"> <?php echo (!empty($value->address))?$value->address:''; ?></p>
                        <p><?php echo (!empty($value->desc))?$value->desc:''; ?></p>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <section class="main " id="gallery">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="title">
                            Captured Moments
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 col-12">
                <div id="gg-screen"></div>
                <div class="gg-box">
                    <?php if (!empty($result->gallery)) {
                    foreach ($result->gallery as $key => $value) { ?>
                        <div class="gg-element">
                            <img src="<?php echo base_url().$value->image ?>">
                        </div>
                    <?php }} ?>
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main bg2 ">
        <div class="container">

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="date text-center">
                        <h4>Save The Date</h4>
                        <p class="p1">For the wedding of</p>
                        <h5><?php echo (!empty($result->groom))?$result->groom:''; ?> & <?php echo (!empty($result->bride))?$result->bride:''; ?></h5>

                        <p class="p2">PLEASE RESERVE BEFORE <?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></p>
                        <div class="rs">
                            <a href="">RSVP <i class="fas fa-long-arrow-alt-down"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="row mt-4">

            </div>
        </div>
    </section>
    <section class="main" id="family">
        <div class="container">
            <div class="section-title text-center" >
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="title tab-title">
                            Family Members
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class=" mt-4">

                <nav>
                    <div class="nav nav-tabs custom-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-brides-tab" data-toggle="tab" href="#nav-brides"
                            role="tab" aria-controls="nav-brides" aria-selected="true">Bride Side</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Groom Side</a>

                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-brides" role="tabpanel"
                        aria-labelledby="nav-brides-tab">
                        <div class="row">
                            <?php if (!empty($result->family)) {
                        foreach ($result->family as $key => $value) {
                        if ($value->family == 'bride') { ?>
                            <div class="col-md-4 mb-4">
                                <a href="<?php echo base_url().$value->image ?>" class=" example-image-link"
                                    data-lightbox="example-set">
                                <img src="<?php echo base_url().$value->image ?>" alt="" class="img-fluid"></a>
                                <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                                <h4><span><em><?php echo (!empty($value->realtion))?$value->realtion:''; ?></em></span></h4>
                            </div>
                        <?php    }} } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                    <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'groom') { ?>
                            <div class="col-md-4 mb-4">
                                <a href="<?php echo base_url().$value->image ?>" class=" example-image-link"
                                    data-lightbox="example-set">
                                <img src="<?php echo base_url().$value->image ?>" alt="" class="img-fluid"></a>
                                <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                                <h4><span><em><?php echo (!empty($value->realtion))?$value->realtion:''; ?></em></span></h4>
                            </div>
                    <?php  }} } ?>      
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="main bg-rsvp" id="rsvp">
            <div class="rsvp-title text-center">
                <h1>Rsvp</h1>
                <h3 class="names"><?php echo (!empty($result->grsvp_name))?$result->grsvp_name:''; ?> & <?php echo (!empty($result->brsvp_name))?$result->brsvp_name:''; ?></h3>
                <div class="contacts">
                    <p>Groom : <a href="tel:<?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?>"><?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?></a> / Bride : <a href="tel:<?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?>"><?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></a></p>
                </div>
            </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets1/js/grid-gallery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets1/js/lightbox-plus-jquery.min.js"></script>
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

var navbar = document.getElementById("navbar");
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