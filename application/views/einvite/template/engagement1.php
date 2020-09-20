<!DOCTYPE html>

<html lang="en">

<head>
    <title>Wedding Invitation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700%7CFira+Sans:400,400i,700,700i&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/web-font.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/e-font.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/engage.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets1/css/animation.css">

    </style>
</head>

<body>
    <section id="hero" class="section-hero">
        <div class="banner-weadding">
            <div class="banner-sc">
                <div class="owl-stage" style="">

                </div>
            </div>
        </div>
        <div class="announcement-wrapper">
            <div class="announcement animation-chain" data-animation="fadeInUp">
                <h2 style="animation-delay: 0.2s;" class="animated">Engagement Invitation</h2>
                <h1 style="animation-delay: 0.3s;" class="animated"><span class="name"><?php echo (!empty($result->groom))?$result->groom:''; ?></span><span class="and">&amp;</span><span class="name"><?php echo (!empty($result->bride))?$result->bride:''; ?></span></h1>
                <p class="date animated" style="animation-delay: 0.4s;"><span><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></span></p>
                <div class="decor animated" style="animation-delay: 0.5s;">
                </div>
            </div>
            <div class="cta animated">
                <a href="#rsvp" class="btn btn-primary scroll-link">RSVP</a>
            </div>
        </div>
        <div class="scroll-down"></div>
    </section>

    <nav class="nav-fixed">
        <div class="menu-wrapper" style="max-height: 54px; overflow: hidden;">
            <button class="open-menu">Menu</button>
            <ul class="menu">
                <li class=""><a class="scroll-link" href="#hero">Home</a></li>
                <li class=""><a class="scroll-link" href="#couple">Couple</a></li>
                <li><a class="scroll-link" href="#gallery">Gallery</a></li>
                <li class=""><a class="scroll-link" href="#events">Events</a></li>
                <li><a class="scroll-link" href="#people">Family</a></li>
                <li><a class="scroll-link" href="#rsvp">RSVP</a></li>
            </ul>
        </div>
        <div></div>
    </nav>

    <section id="couple" class="section-couple">
        <div class="flowers"></div>
        <h2>Couple</h2>
        <div class="section-intro">
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae dignissimos voluptate reprehenderit inventore quis dicta, aliquam possimus, explicabo assumenda, dolore consequatur praesentium iusto odio esse corporis fugiat pariatur a vel.</p> -->
        </div>
        <div class="bride-and-groom flex-responsive">
            <div class="groom">
                <div class="profile-pic animation-chain" data-animation="fadeInUp">
                    <img src="<?php echo base_url().$result->gimage ?>" alt="" style="animation-delay: 0s;" class="animated">
                </div>
                <h3><?php echo (!empty($result->groom))?$result->groom:''; ?></h3>
                <h4>Groom</h4>
                <p><?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <div class="bride">
                <div class="profile-pic animation-chain" data-animation="fadeInUp">
                    <img src="<?php echo base_url().$result->bimage ?>" alt="" style="animation-delay: 0s;" class="animated">
                </div>
                <h3><?php echo (!empty($result->bride))?$result->bride:''; ?></h3>
                <h4>Bride</h4>
                <p><?php echo (!empty($result->bdetail))?$result->bdetail:''; ?></p>
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="bg-icon" id="gallery">
        <div class="main-containers">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-heading">
                            <h2>MEMORABLE PHOTO GALLERY</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="gallery-slider">
                            <div class="row">
                                <?php if (!empty($result->gallery)) {
                                foreach ($result->gallery as $key => $value) { ?>
                                <div class="col-md-4 col-sm-4">
                                    <a class="example-image-link" href="<?php echo base_url().$value->image ?>" data-lightbox="example-set">
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

    <div class="separator parallax" data-background-image="<?php echo base_url()?>assets1/pic/img/21.jpg" data-parallax-factor=".8"><img src="<?php echo base_url()?>assets1/pic/img/21.jpg" class="parallax-bg-img" style="transform: translate3d(0px, 202.827px, 0px); margin-left: -640px; margin-top: -683.133px;">
        <div class="flowers"></div>
        <h2 data-after-countdown="We got married on Sep 16, 2016.">Counting Down to Our Big Day</h2>
        <div class="decor"><i class="fa fa-heart-o"></i></div>
        <div class="countdown-area" data-final-date="2017/12/31 23:59:59" data-after-countdown="Thank you for attending our wedding!">A happy marriage is the union of two good forgivers!</div>
    </div>

    <section id="events" class="section-events">
        <h2>Events</h2>
        <div class="section-intro">
        </div>
        <ul class="event-list">
            <?php if (!empty($result->event)) {
                foreach ($result->event as $key => $value) {  ?>
            <li class="flex-responsive">
                <div class="event-thumbnail" style="background-image: url(&quot;<?php echo base_url()?>assets1/pic/img/31.jpg&quot;);"></div>
                <div class="event-details animation-chain" data-animation="fadeInUp">
                    <h3 style="animation-delay: 0s;" class="animated"><?php echo (!empty($value->name))?$value->name:''; ?></h3>
                    <ul class="event-info animated" style="animation-delay: 0.1s;">
                        <li><?php echo (!empty($value->address))?$value->address:''; ?></li>
                        <li><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?> <?php echo (!empty($value->time))?$value->time:''; ?></li>
                    </ul>
                    <div class="desc animated" style="animation-delay: 0.2s;">
                        <p><?php echo (!empty($value->desc))?$value->desc:''; ?></p>
                    </div>
                    <div class="cta animated" style="animation-delay: 0.3s;">
                        <a href="#rsvp" class="btn btn-primary scroll-link">RSVP</a>
                    </div>
                </div>
            </li>
            <?php }} ?>

        </ul>
    </section>
    <section id="people" class="section-people">
        <h2>Family</h2>
        <div class="section-intro">
        </div>
        <div class="container-fluid">
            <h3>Groom Family</h3>
            <div class="row animation-chain" data-animation="fadeInUp">
                <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'groom') { ?>
                <div class="col-sm-3 animated" style="animation-delay: 0s;">
                    <div class="profile-pic" style="background-image: url(&quot;<?php echo base_url().$value->image ?>&quot;);">

                    </div>
                    <h4><?php echo (!empty($value->name))?$value->name:''; ?></h4>
                </div>
                <?php } }} ?>
                
                
            </div>
            <h3>Bride Family</h3>
            <div class="row animation-chain" data-animation="fadeInUp">
                <?php if (!empty($result->family)) {
                foreach ($result->family as $key => $value) {
                if ($value->family == 'bride') { ?>
                <div class="col-sm-3 animated" style="animation-delay: 0s;">
                    <div class="profile-pic" style="background-image: url(&quot;<?php echo base_url().$value->image ?>&quot;);">

                    </div>
                    <h4>Rose Hale</h4>
                </div>
                <?php    }} } ?>
            </div>
        </div>
    </section>

    <footer id="rsvp">
        <div class="footer-bg parallax" data-background-image="<?php echo base_url()?>assets1/pic/img/33.jpg" data-parallax-factor=".8"><img src="<?php echo base_url()?>assets1/pic/img/33.jpg" class="parallax-bg-img" style="transform: translate3d(0px, 158.56px, 0px); margin-left: -640px; margin-top: -671.92px;"></div>
        <div class="heart">
            <svg viewBox="0 0 38 35">
        <use class="shape-heart" xlink:href="<?php echo base_url()?>assets1/engage/img/heart.svg#shape-heart"></use>
        </svg>
        </div>
        <h2>RSVP</h2>
        <h3>Groom : <?php echo (!empty($result->grsvp_name))?$result->grsvp_name:''; ?> &amp; Bride : <?php echo (!empty($result->brsvp_name))?$result->brsvp_name:''; ?></h3>
        <p><a class="dd-a" href="tel:+91-1234567890">GROOM : <?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?></a><a class="dd-a" href="tel:+91-1234567890">Bride : <?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></a></p>
        <a href="#hero" class="scroll-link scroll-up"><i class="fa fa-arrow-up"></i></a>
    </footer>










    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets1/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/countdown.js"></script>
    <script src="<?php echo base_url()?>assets1/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url()?>assets1/js/parallax.js"></script>
    <script src="<?php echo base_url()?>assets1/js/rsvp.js"></script>
    <script src="<?php echo base_url()?>assets1/js/main.js"></script>
</body>

</html>