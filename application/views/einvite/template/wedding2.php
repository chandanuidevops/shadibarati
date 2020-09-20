<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wedding Invitation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/style.css">

    <style>
    .slick-dots {
        display: none !important;
    }

    .slick-slide {
        margin: 0px 10px;
    }

    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 111111;
        border-bottom: 1px solid #ccc9c9;
    }

    .sticky+.content {
        padding-top: 60px;
    }
    </style>
</head>

<body>
    <header id="home">
        <!-- home banner stAart -->
        <div class="home-banner">
            <div class="banner-title text-center">
                <h2 class="wow "><?php echo (!empty($result->groom))?$result->groom:''; ?> <br><span>&amp;</span> <?php echo (!empty($result->bride))?$result->bride:''; ?></h2>
                <span class="date "><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></span>
                <p>Save The Date</p>
            </div>
        </div>
        <!-- home banner end -->
        <!-- nav start -->
        <section class="box-shadow">

            <nav class="navbar custom-navbar navbar-expand-md bg-white" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url()?>assets1/img/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link  js-scroll-trigger active" href="#home">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  js-scroll-trigger" href="#couple">COUPLE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  js-scroll-trigger" href="#family">FAMILY MEMBERS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  js-scroll-trigger" href="#events">EVENTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  js-scroll-trigger" href="#gallery">GALLERY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  js-scroll-trigger" href="#rsvp">RSVP</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </section>
        <!-- nav end -->
    </header>

    <section class="bg-icon" id="couple">
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-heading">
                            <p>ARE GETTING MARRIED!</p>
                            <h2>Groom and Bride</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="about-list about-list-b">
                            <div class="imgs">
                                <figure><img src="<?php echo base_url().$result->bimage ?>" alt="" class="img-fluid"></figure>
                            </div>
                            <div class="content text-center">
                                <h2><?php echo (!empty($result->bride))?$result->bride:''; ?></h2>
                                <p class="text-justify"><?php echo (!empty($result->bdetail))?$result->bdetail:''; ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-12">
                        <div class="about-invitation">
                            <div class="content text-center">
                                <h2 class="wow">Invitation</h2>
                                <p class="wow ">We inviting you and <br>your family on</p>
                                <strong class="wow "><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?></strong>
                                <span class="wow ">At St. Thomas's Church,<br>London, U.K.</span>
                            </div>
                            <div class="btn-rspd mr-t30 text-center">
                                <a href="#rsvp" class="btn1">Rsvp</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="about-list about-list-g">
                            <div class="imgs">
                                <figure><img src="<?php echo base_url().$result->gimage ?>" alt="" class="img-fluid"></figure>
                            </div>
                            <div class="content  text-center">
                                <h2><?php echo (!empty($result->groom))?$result->groom:''; ?></h2>
                                <p class="text-justify"><?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    
    <section class="family-section" id="family"><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-md-8 col-lg-8">
                    <div class="family text-center">
                        <h2>Groomsmen & Bridesmaid</h2>
                        <div class="tab">
                            <a href="javascript:void(0)" class="f-tab active" datavalue="groom">GROOM</a>
                            <a href="javascript:void(0)" class="f-tab " datavalue="bride">BRIDE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2"></div>
            </div>

            <div class=" bride hide">
                <div class="four-times slider" data-sizes="">
                    <div class="row">
                    <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'bride') { ?>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url().$value->image ?>" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                                    <p><?php echo (!empty($value->realtion))?$value->realtion:''; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php    }} } ?>
                    </div>
                </div>
            </div>

            <div class="groom hide">
                <div class="four-times slider" data-sizes="">
                    <div class="row">
                    <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'groom') { ?>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url().$value->image ?>" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                                    <p><?php echo (!empty($value->realtion))?$value->realtion:''; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } } } ?>
                        
                        
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="bg-icon" id="events">
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-heading">
                            <p>CEREMONY & PARTY</p>
                            <h2>THE WEDDING EVENT</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($result->event)) {
                    foreach ($result->event as $key => $value) { ?>
                        <div class="col-md-4 col-sm-12 col-lg-4" style="margin: auto;">
                        <div class="event-infobox">
                            <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                            <h1><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?> <?php echo (!empty($value->time))?$value->time:''; ?></h1>
                            <span><?php echo (!empty($value->address))?$value->address:''; ?></span>
                            <p><?php echo (!empty($value->desc))?$value->desc:''; ?> </p>
                            
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-icon" id="gallery">
        <div class="main-containers">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-heading">
                            <p><?php echo (!empty($result->groom))?$result->groom:''; ?> & <?php echo (!empty($result->bride))?$result->bride:''; ?></p>
                            <h2>MEMORABLE PHOTO GALLERY</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 pd-0">
                        <div class="gallery-slider slick-slider">
                            <div class="row">
                                <?php if (!empty($result->gallery)) {
                                foreach ($result->gallery as $key => $value) { ?>
                                <div class="col-md-4 col-sm-6 pad">
                                    <a class="example-image-link" href="<?php echo base_url().$value->image ?>"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url().$value->image ?>" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials" id="rsvp">
        <div class="container">
        <div class="section-heading">
                           
                            <h2 class="text-white">RSVP</h2>
                        </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="dd">
                        <h4>Groom : <span><?php echo (!empty($result->grsvp_name))?$result->grsvp_name:''; ?></span></h4>
                        <p class="telephone"><a href="tel:<?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?>"><?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?></a></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="dd">
                        <h4>Groom : <span><?php echo (!empty($result->brsvp_name))?$result->brsvp_name:''; ?></span></h4>
                        <p class="telephone"><a href="tel:<?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?>"><?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets1/js/slick.js"></script>
    <script src="<?php echo base_url()?>assets1/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/script.js"></script>
    <script src="<?php echo base_url()?>assets1/js/vue.js"></script>

    <script>
    //tab for family section
    $(document).ready(function() {
        if ($(".tab .f-tab").hasClass("active")) {
            var attr = "." + $(".tab .f-tab").attr("datavalue");
            $(".hide").hide();
            $(attr).show();
        }
        $(".f-tab").on("click", function() {
            $(".tab .f-tab").removeClass("active");
            $(this).addClass("active");
            if ($(".tab .f-tab").hasClass("active")) {
                var attr = "." + $(".tab .f-tab.active").attr("datavalue");
                $(".hide").hide();
                $(attr).show();
            }
        });
    })



    
    </script>
</body>

</html>