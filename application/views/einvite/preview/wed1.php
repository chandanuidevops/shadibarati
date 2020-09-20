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
                <h2 class="wow ">Hussain <br><span>&amp;</span> jasmin</h2>
                <span class="date ">12.12.2018</span>
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
                                <figure><img src="<?php echo base_url()?>assets1/img/about/1.jpg" alt="" class="img-fluid"></figure>
                            </div>
                            <div class="content text-center">
                                <h2>Jasmine</h2>
                                <p class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus accusamus perspiciatis praesentium tempora, obcaecati assumenda sed aut deserunt omnis? Recusandae accusantium enim amet? Laboriosam animi nobis natus unde officia minima?</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-12">
                        <div class="about-invitation">
                            <div class="content text-center">
                                <h2 class="wow">Invitation</h2>
                                <p class="wow ">We inviting you and <br>your family on</p>
                                <strong class="wow ">Saturday<br>20 May 2018</strong>
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
                                <figure><img src="<?php echo base_url()?>assets1/img/about/2.jpg" alt="" class="img-fluid"></figure>
                            </div>
                            <div class="content  text-center">
                                <h2>Hussain</h2>
                                <p class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus accusamus perspiciatis praesentium tempora, obcaecati assumenda sed aut deserunt omnis? Recusandae accusantium enim amet? Laboriosam animi nobis natus unde officia minima?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    
    <section class="family-section" id="family">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-md-8 col-lg-8">
                    <div class="family text-center">
                        <h2>Groomsmen & Bridesmaid</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s,</p>
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
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/2.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/3.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/4.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="groom hide">
                <div class="four-times slider" data-sizes="">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="f-img-cont">
                                <div class="f-img">
                                    <img src="<?php echo base_url()?>assets1/img/family/1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="f-details text-center">
                                    <h2>Mr.Clark Wills</h2>
                                    <p>Mark's Father</p>
                                </div>
                            </div>
                        </div>
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
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <div class="event-infobox">
                            <h2>Main Ceremony</h2>
                            <h1>7:30 pm</h1>
                            <span>St. Thomas's<br>Church, London, U.K.</span>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor vel velit auctor aliquet. Aenean sollicitudin, lorem quis </p>
                            
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12  col-lg-4">
                        <div class="event-img text-center">
                            <figure><img src="<?php echo base_url()?>assets1/img/about/3.jpg" alt=""></figure>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12  col-lg-4">
                        <div class="event-infobox">
                            <h2>Wedding Party</h2>
                            <h1>7:30 pm</h1>
                            <span>St. Thomas's<br>Church, London, U.K.</span>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                                auctor vel velit auctor aliquet. Aenean sollicitudin, lorem quis </p>
                           
                        </div>
                    </div>
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
                            <p>HUSSAIN & JASMIN</p>
                            <h2>MEMORABLE PHOTO GALLERY</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 pd-0">
                        <div class="gallery-slider slick-slider">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 pad">
                                    <a class="example-image-link" href="<?php echo base_url()?>assets1/img/gallery/1.jpg"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url()?>assets1/img/gallery/1.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-6 pad">
                                    <a class="example-image-link" href="<?php echo base_url()?>assets1/img/gallery/2.jpg"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url()?>assets1/img/gallery/2.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-6 pad">
                                    <a class="example-image-link" href="<?php echo base_url()?>assets1/img/gallery/3.jpg"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url()?>assets1/img/gallery/3.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-6 pad">
                                    <a class="example-image-link" href="<?php echo base_url()?>assets1/img/gallery/6.jpg"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url()?>assets1/img/gallery/6.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-6 pad">
                                    <a class="example-image-link" href="<?php echo base_url()?>assets1/img/gallery/7.jpg"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url()?>assets1/img/gallery/7.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-6 pad">
                                    <a class="example-image-link" href="<?php echo base_url()?>assets1/img/gallery/8.jpg"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url()?>assets1/img/gallery/8.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
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
                        <h4>Groom : <span>Hussain</span></h4>
                        <p class="telephone"><a href="tel:+">+91-1234567890</a></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="dd">
                        <h4>Groom : <span>Jassmine</span></h4>
                        <p class="telephone"><a href="tel:+">+91-1234567890</a></p>
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