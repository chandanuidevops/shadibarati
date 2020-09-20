<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Conjugal</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon.png">
    <!-- google fonts css -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&amp;display=swap" rel="stylesheet">
    <!-- bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- font awesome icon css -->
    <!-- <link href="css/fontawesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css">
    <!-- slick slider  css -->
    <link href="<?php echo base_url()?>assets1/css/slick.css" rel="stylesheet">
    <!-- venobox css -->
    <link href="<?php echo base_url()?>assets1/css/venobox.css" rel="stylesheet">
    <!-- barCharts css -->
    <!-- <link href="css/jquery.barCharts.css" rel="stylesheet"> -->
    <!-- main css -->
    <link href="<?php echo base_url()?>assets1/css/eng-style.css" rel="stylesheet">
    <!-- main css -->
    <link href="<?php echo base_url()?>assets1/css/responsive.css" rel="stylesheet">

</head>
<style type="text/css">
	.far.fa-heart.slidNext.slick-arrow {
    display: none !important;
}

.far.fa-heart.slidPrv.slick-arrow {

    display: none !important;

}
</style>

<body>
    <nav class="navbar navbar-expand-lg custom_nav">
        <div class="container">
            <a class="navbar-brand d-lg-none  d-sm-block" href="#">Engagemnet</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#slider">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#welcome_part">Couple</a>
                    </li>         
                     <li class="nav-item"><a href="#event_part" class="nav-link"> Event &amp; Parties </a></li>
                    <li class="nav-item"><a href="#Family" class="nav-link">Family</a></li>
                    <li class="nav-item"><a href="#Gallery" class="nav-link">Galley</a></li>
          
                    <li class="nav-item"><a href="#rsvp" class="nav-link">RSVP</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="slider">
        <i class="far fa-heart slidPrv slick-arrow" style="display: block;"></i>
        <i class="far fa-heart slidNext slick-arrow" style="display: block;"></i>
        <div class="slider_img text-center slick-initialized slick-slider">
            <div class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 4047px;">
                    <div class="slid_div slick-slide" style="background: rgba(0, 0, 0, 0) url(&quot;<?php echo base_url()?>assets1/pic/eng2-img/sa1.jpg&quot;) repeat scroll 0% 0%; width: 1349px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 1000ms linear 0s;"
                        data-slick-index="0" aria-hidden="true" tabindex="-1">
                        <div class="caprion_wrapper">
                            <div class="container text-center">
                                <div class="slide-caption">
                                    <h6><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?>

                                    </h6>
                                    <h2>We Invite you all to Celebrate Our Engagement</h2>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slid_div slick-slide" style="background: rgba(0, 0, 0, 0) url(&quot;<?php echo base_url()?>assets1/pic/eng2-img/saki02.jpg&quot;) repeat scroll 0% 0%; width: 1349px; position: relative; left: -1349px; top: 0px; z-index: 998; opacity: 0; transition: opacity 1000ms linear 0s;"
                        data-slick-index="1" aria-hidden="true" tabindex="-1">
                        <div class="caprion_wrapper">
                            <div class="container text-center">
                                <div class="slide-caption">
                                    <h6><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?>

                                    </h6>
                                    <h2>We are Invite all to Celebrate Our Engagement</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slid_div slick-slide slick-current slick-active" style="background: rgba(0, 0, 0, 0) url(&quot;<?php echo base_url()?>assets1/pic/eng2-img/sali3.jpg&quot;) repeat scroll 0% 0%; width: 1349px; position: relative; left: -2698px; top: 0px; z-index: 999; opacity: 1;"
                        data-slick-index="2" aria-hidden="false" tabindex="0">
                        <div class="caprion_wrapper">
                            <div class="container text-center">
                                <div class="slide-caption">
                                    <h6><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?>

                                    </h6>
                                    <h2>We are Invite all to Celebrate Our Engagement</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="welcome_part" class="section_padding">
        <div class="container text-center">
            <div class="row welcome_txt">
                <div class="col-sm-4 col-xs-6">
                    <div class="welcome">
                    <img src="<?php echo base_url().$result->gimage ?>" alt="wellcome">
                        <h5><?php echo (!empty($result->groom))?$result->groom:''; ?></h5>
                        <p><?php echo (!empty($result->gdetail))?$result->gdetail:''; ?></p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="welcome welcome_txt">
                        <h2>Couple</h2>
                        <h6><?php echo (!empty($result->fndate))?date('d M, Y',strtotime($result->fndate)):''; ?></h6>

                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <div class="welcome">
                    <img src="<?php echo base_url().$result->bimage ?>" alt="wellcome">
                        <h5><?php echo (!empty($result->bride))?$result->bride:''; ?></h5>
                        <p><?php echo (!empty($result->bdetail))?$result->bdetail:''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="event_part" style="" class="section_padding">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="event-heading text-center">
                        <h2>The Wedding Event</h2>
                        <img src="<?php echo base_url()?>assets1/pic/eng2-img/shapew.png" alt="shape">

                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($result->event)) {
                foreach ($result->event as $key => $value) {   ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="event">
                        <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                        <div class="event_txt">
                            <p><?php echo (!empty($value->desc))?$value->desc:''; ?></p>
                            <img src="<?php echo base_url()?>assets1/pic/eng2-img/shape.png" alt="">
                            <div class="event_img">
                                <h6><?php echo (!empty($value->date))?date('d M, Y',strtotime($value->date)):''; ?> <?php echo (!empty($value->time))?$value->time:''; ?></h6>
                            </div>
                            <div class="event_txt2">
                                <p><?php echo (!empty($value->address))?$value->address:''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>

        </div>
    </section>

    <section id="Family" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="all_heading">
                        <h2>Family Members</h2>
                        <img src="<?php echo base_url()?>assets1/pic/eng2-img/shape.png" alt="shape">
                    </div>
                </div>
            </div>
            <h2 class="fami-g">Groom Family</h2>
            <div class="row">
                <?php if (!empty($result->family)) {
                foreach ($result->family as $key => $value) {
                if ($value->family == 'groom') { ?>
                <div class="col-lg-3">
                    <div class="team_member">
                        <div class="team_inners">
                            <center><img src="<?php echo base_url().$value->image ?>" class="team_img" alt="shape"></center>
                            <div class="overlay">
                            </div>
                        </div>
                        <div class="caption text-center">
                            <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                            <h3><?php echo (!empty($value->realtion))?$value->realtion:''; ?></h3>
                        </div>
                    </div>
                </div>
                <?php } } } ?>
            </div>
            <h2 class="fami-g">Bride Family</h2>
            <div class="row">
                <?php if (!empty($result->family)) {
                    foreach ($result->family as $key => $value) {
                    if ($value->family == 'bride') { ?>
                <div class="col-lg-3">
                    <div class="team_member">
                        <div class="team_inners">
                            <center><img src="<?php echo base_url().$value->image ?>" class="team_img" alt="shape"></center>
                            <div class="overlay">
                            </div>
                        </div>
                        <div class="caption text-center">
                            <h2><?php echo (!empty($value->name))?$value->name:''; ?></h2>
                            <h3><?php echo (!empty($value->realtion))?$value->realtion:''; ?></h3>
                        </div>
                    </div>
                </div>
                <?php    }} } ?>
            </div>
        </div>
    </section>

    <section id="Gallery" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="event-heading text-center">
                        <h2>Our Gallery</h2>
                        <img src="<?php echo base_url()?>assets1/pic/eng2-img/shape.png" alt="">

                    </div>
                </div>
            </div>
        </div>
        <div class="Gallery_filter">
            <div class="filtr-container">
                <div class="row mx-0">
                    <?php if (!empty($result->gallery)) {
                    foreach ($result->gallery as $key => $value) { ?>
                    <div class=" col-sm-6 col-md-3 filtr-item plr px-0">
                        <img class="img-responsive" src="<?php echo base_url().$value->image ?>" alt="sample image">
                        <div class="overly">
                            <div class="box-content">
                                <h3><?php echo (!empty($result->groom))?$result->groom:''; ?></h3>
                                <span><?php echo (!empty($result->bride))?$result->bride:''; ?></span>
                            </div>
                            <div class="top-right"><a class="venobox vbox-item" href="<?php echo base_url().$value->image ?>"><i class="fa fa-link"></i></a>
                                <a href="<?php echo base_url().$value->image ?>"></a>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>

                </div>
            </div>
        </div>
    </section>

    <section id="Instagram">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center Instagram_bg">
                    <div class="all_heading">
                        <h2> Rsvp</h2>
                        <img src="<?php echo base_url()?>assets1/pic/eng2-img/shape.png" alt="shape">
                    </div>
                </div>
            </div>
            <div class="footer-content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="con">
                            <div class="content-sub">
                                <h2>RSVP </h2>
                                <p><small>(Bride)</small></p>
                                <span>Contact : <?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="con">
                            <div class="content-sub">
                                <h2>RSVP </h2>
                                <p><small>(Groom)</small></p>
                                <span>Contact :<?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <!-- main jquery file  js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- slick  js -->
    <script src="<?php echo base_url()?>assets1/js/e-slick.js"></script>
    <!--venobox  js -->
    <script src="<?php echo base_url()?>assets1/js/e-venobox.min.js"></script>
    <!-- main  js -->
    <script src="<?php echo base_url()?>assets1/js/e-script.js"></script>
</body>

</html>