<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shaadi Baraati</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets1/css/shaadi.css" />
</head>

<body>
    <nav class=" navbar navbar-expand-sm fixed-top navbar-bg">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url() ?>assets1/img2/logo.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#story">Couple</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#family">Family</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#events">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#rsvp">RSVP</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="" id="home">
        <div id=" top" class="main-hero">
            <div class="c-hero-banner c-hero-banner--main">
                <div class="cover"></div>
                <div class="c-hero-banner__section c-hero-banner__image">
                    <img class="lazyload" src="<?php echo base_url() ?>assets1/img2/banner-img.jpg" alt="image" class="img-fluid" />
                </div>
                <div class="mask">
                    <img src="<?php echo base_url() ?>assets1/img2/mask.png" alt="" />
                </div>
                <div class="banner-text">
                    <div class="title">
                        <h1><?php echo (!empty($result->groom))?$result->groom:''; ?><span> <br> &amp; <br> </span><?php echo (!empty($result->bride))?$result->bride:''; ?></h1>
                        <div class="line"><img src="<?php echo base_url() ?>assets1/img2/banner-hedingLIne.png" alt=""></div>
                        <div class="date"><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></div>
                        <div class="statest">We are getting married!</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="love-story  section position-relative text-center" id="story">
        <div class="d-none d-sm-block love-story__flower-parallax position-absolute parallax"
            style="transform: translateY(94.9333px);">
            <img src="<?php echo base_url() ?>assets1/img2/ls-flower-prlx.png" alt="flower" />
        </div>
        <div class="container">
            <div class="love-story__flowers m-auto">
                <img src="<?php echo base_url() ?>assets1/img2/story-flowers.png" alt="flowers" />
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="box-wedding mb-3">
                        <div class="people">
                            <img src="<?php echo base_url().$result->gimage ?>" alt="" class="rounded-circle">
                        </div>
                        <div class="people-info">
                            <div class="name"><?php echo (!empty($result->groom))?$result->groom:''; ?></div>
                            <h2 class="position">The Groom</h2>
                            <p class="text-center"> <?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>
                        </div>
                     
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-wedding mb-3">
                        <div class="people">
                            <img src="<?php echo base_url().$result->bimage ?>" alt="" class="rounded-circle">
                        </div>
                        <div class="people-info">
                            <div class="name"><?php echo (!empty($result->bride))?$result->bride:''; ?></div>
                            <h2 class="position">The Bride</h2>
                            <p class="text-center"> <?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <section class="main" id="family">
        <div id="people" class="section">
            <div class="content-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h2 class="title text-center" style="display: block;">
                               Family Members
                            </h2>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="pita pita-primary">
                                The Bride's Side
                            </div>
                            <?php if (!empty($result->family)) {
                                foreach ($result->family as $key => $value) { 
                                    if ($value->family == 'groom') {
                                    ?>
                                   <div class="box-people row-reverse">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="people-info">
                                                <div class="name"><?php echo (!empty($value->name))?$value->name:''; ?></div>
                                                <h3 class="position"><?php echo (!empty($value->realtion))?$value->realtion:''; ?></h3>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="people">
                                                <img src="<?php echo base_url().$value->image ?>" alt="" class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php    }} } ?>


                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="pita pita-secondary">
                                The Groom's Side
                            </div>

                            <?php if (!empty($result->family)) {
                                foreach ($result->family as $key => $value) {
                                if ($value->family == 'bride') { ?>

                                   <div class="box-people">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="people">
                                                    <img src="<?php echo base_url().$value->image ?>" alt="" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="people-info">
                                                    <div class="name"><?php echo (!empty($value->name))?$value->name:''; ?></div>
                                                    <h3 class="position"><?php echo (!empty($value->realtion))?$value->realtion:''; ?></h3>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php    }} } ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main" id="gallery">
        <div id="people" class="section">
            <div class="content-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h2 class="title text-center" style="display: block;">
                                Wedding Photo
                            </h2>

                        </div>
                    </div>
                    <div class="gallery-img">
                        <div class="row">
                            <?php if (!empty($result->gallery)) {
                                foreach ($result->gallery as $key => $value) { ?>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <a href="<?php echo base_url().$value->image ?>" class="icon example-image-link"
                                        data-lightbox="example-set">
                                        <img src="<?php echo base_url().$value->image ?>" class="image">
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

    <section class="date-section mainsection bodybg section--blue countdown text-center">
        <div class="container">
            <div class="date-section__flowers m-auto">
                <img src="<?php echo base_url() ?>assets1/img2/date-flowers.png" alt="flowers" />
            </div>
            <div class="date-section__block">
                <div class="d-inline-block">
                    <h2 class="title--special"><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></h2>
                </div>
            </div>
          
        </div>
    </section>
    <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5e10785d7dc3a500126f4c9e&product=sticky-share-buttons"></script>
    <section id="events" class="events section mainsection bodybg ">
        <div class="container">
            <h1 class="title text-center" style="display: block;">Wedding events</h1>
                <div class="accordion__body">
                    <div >
                        <?php if (!empty($result->event)) {
                        foreach ($result->event as $key => $value) {
                            if($key % 2 != 0){
                                $eve = 'col-md-6 order-2';
                                $eve2 = 'col-md-6 order-1 text-left';
                            }else{
                                $eve = 'col-md-6 order-1 ';
                                $eve2 = 'col-md-6 order-2 text-left';                            }
                        ?>
                        <div class="row">
                            <h2 class="accordion__item-heading">Reception</h2>
                            <div class="<?php echo $eve ?>">
                                <img class="accordion__item-img" src="<?php echo base_url() ?>assets1/img2/ceremony.png" alt="ceremony" />
                            </div>
                            <div class="<?php echo $eve2 ?>">
                               <h2 class="cd"><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                                <h3 class="tt"><?php echo (!empty($value->venue))?$value->name:''; ?></h3>
                                <p class="loc">
                                    <i class="fas fa-map-marker-alt"></i>
                                   <span> <?php echo (!empty($value->address))?$value->address:''; ?></span>
                                </p>
                                <p class=" loc">
                                    <i class="far fa-calendar-alt"></i>
                                    <span><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?></span> <br><span><?php echo (!empty($value->time))?$value->time:''; ?></span>
                                </p>
                                <p><?php echo (!empty($value->desc))?$value->desc:''; ?>
                                </p>
                            </div>
                        </div><br>
                    <?php } } ?>
                        
                    </div>
                  
                </div>
            </div>
           
        </div>
    </section>
    <section>
        <article class="rsvp_main" id="rsvp">
            <div class="rsvp_main_parallax">
                <div class="rsvp_bottom_bg">
                    
                    <div class="container">
                        <h1 class="title text-center" style="display: block;color:white">RSVP</h1>
                        <div class=" text-center">
                           <div class="row">
                               <div class="col-sm-6 rsvpname">
                                <h4>Bride : <span><?php echo (!empty($result->brsvp_name))?$result->brsvp_name:''; ?></span></h4>
                                <h5><?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></h5>
                               </div>
                               <div class="col-sm-6 rsvpname">
                                <h4>Groom : <span><?php echo (!empty($result->grsvp_name))?$result->grsvp_name:''; ?></span></h4>
                                <h5><?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?></h5>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets1/js/lightbox-plus-jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets1/js/jquery.easing.min.js"></script>

<script src="<?php echo base_url() ?>assets1/js/shaadi.js"></script>
<script></script>

</html>