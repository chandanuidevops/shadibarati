<!DOCTYPE html>
<html>

<head>
    <title>Shaadi Baraati</title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <!-- header -->
    <?php $this->load->view('includes/header.php'); ?>
    <!-- end header -->
    <section>
        <div class="row">
            <div class="banner-img">
                <img src="<?php echo base_url() ?>assets/img/banner.jpg" class="img-responsive" width="100%" alt="">
                <div class="lec-search">
                    <h5 class="hide-on-small-only">India's Most Trusted Online Wedding Market</h5>
                    <p class="hide-on-small-only">Find the best wedding vendors with thousands of trusted reviews</p>
                    <div class="row">
                        <form action="<?php echo base_url()?>vendors" method="post" id="search-form">
                            <div class="form-search">
                                <div class="container">
                                    <div class="col l4 s4 mp">
                                        <div class="input-field if-fil">
                                            <select class="" name="q" id="sel-city">
                                                <option value="" selected>City</option>
                                                <?php if (!empty($city)) {
                                                    foreach ($city as $citys => $cities) { ?>
                                                <option value="<?php echo $cities->city ?>"> <?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                                <?php   } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col l6 s5 mp">
                                        <div class="input-field  if-fil-sel">
                                            <select name="ct" class="" id="sel-cato">
                                                <option value="" selected>Category</option>
                                                <?php if (!empty($category)) {
                                                    foreach ($category as $categorys => $categories) { ?>
                                                <option value="<?php echo $categories->category ?>"> <?php echo (!empty($categories->category))?$categories->category:''; ?> </option>
                                                <?php   } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col l2 s3 mp">
                                        <div class="input-field ">
                                            <button type="submit" class="btn-find">Get Start</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-col">
        <section>
            <div class="container-city">
                <div class="col 12">
                    <div class="top-cities">
                        <h4>Top Cities</h4>
                        <p>Find the best Vendor Cities with thousands of trusted reviews</p>
                        <div class="top-city-slide">

                            <div class="top-citys">
                                <?php 

                                if (!empty($city)) { 
                                    foreach ($city as $key => $value) { 
                                    $ctlink = strtolower(str_replace(" ","-",$value->city));
                                    if (!empty($value->image)) {
                                ?>
                                <a href="<?php echo base_url('vendors/').$ctlink ?>" class="black-text">
                                    <div class="top-city-sl">
                                        <center><img src="<?php echo (!empty($value->image))?$value->image:''  ?>"
                                                class="img-responsive city-icon" alt="">
                                        </center>
                                        <p><?php echo (!empty($value->city))?$value->city:''  ?></p>
                                    </div>
                                </a>
                                <?php } } }?>

                                <a href="#citymodel" class="modal-trigger">
                                    <div class="top-city-sl city-more" style="height: 153px;">
                                        <div class="viewall-button">
                                            <i class="material-icons">arrow_forward</i>
                                        </div>
                                        <p>VIEW ALL</p>
                                    </div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec">
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12">
                        <div class="vender-detail">
                            <h4>Vendors Categories</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>Find trusted wedding services in all Indian cities & Book Verified Vendors in simple steps. </p>
                        </div>
                    </div>
                </div>
                <div class="vender-list">
                    <div class="row">
                        <?php if (!empty($category)) {
                    foreach ($category as $cat => $cats) { 
                        if($cat < 6)   {
                            $clink = strtolower(str_replace(" ","-",$cats->category));
                    ?>
                        <div class="col l4 s6 ">
                            <a href="<?php echo base_url().'vendors/all/'.urlencode($clink)?>">
                                <div class="vender-im hoverable">
                                    <img src="<?php echo (!empty($cats->image))?$cats->image:''  ?>" class="img-responsive" width="100%" alt="<?php echo (!empty($cats->category))?$cats->category:''  ?>">
                                    <div class="title-ven">
                                        <p class="m0"><?php echo (!empty($cats->category))?$cats->category:''  ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php    } } }?>
                    </div>
                    <center><a href="<?php echo base_url() ?>categories"><button class="btn-cate">View All
                                Categories</button></a></center>

                </div>
            </div>
        </section>
    </div>
    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col s12">
                    <div class="vender-detail">
                        <h4>How It's Works</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Book the Best Verified Vendors according to you requirement in 3 Simple Steps.</p>
                    </div>
                </div>
            </div>
            <div class="work-detail">
                <div class="row">
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/icon/c.png" class="img-responsive" alt="">
                            <h6>SEARCH</h6>
                            <p>Get Quotations, Compare, And Book The Best Vendor For Your Wedding.</p>
                            <!-- <p class="cr">1</p> -->
                        </div>
                    </div>
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/icon/b.png" class="img-responsive" alt="">
                            <h6>SELECT</h6>
                            <p>Select The Preferred Vendors And Send Your Requirements To Them.</p>
                            <!-- <p class="cr">2</p> -->
                        </div>
                    </div>
                    <div class="col l4 m4">
                        <div class="steps-det">
                            <img src="<?php echo base_url() ?>assets/img/icon/a.png" class="img-responsive " alt="">
                            <h6>BOOK</h6>
                            <p>Get Quotations, Compare, And Book The Best Vendor For Your Wedding.</p>
                            <!-- <p class="cr">3</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="h-wed-assistance sec bg-col pb-0">
        <div class="">
            <div class="row m0">
                <div class="col s12 l12">
                    <div class="vender-detail">
                        <h4>What is Wed Assistance ?</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Plan your dream wedding with the help of our wedding planning experts. </p>
                    </div>
                </div>
                <div class="col s12 no-padding">
                            
                    <div class="h-wed-slider">
                        

                        <div class="hwed-item hwd1">
                            <div class="row m0" >
                                <div class="col s12 m7 l7 push-l5 push-m5 redsahde">
                                    <div class="hwd-conetnt">
                                        <div class="wdheading">Hello Wed Planner</div>
                                        <p>Hello Wedding Planner is an online wedding services brought to you by Shaadi Baraati at free of cost, that helps you to plan your wedding with a qualified wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind.</p>
                                        <br><br>
                                        <div class="btbtn">
                                            <a class="bokmore-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="hwed-item hwd2">
                            <div class="row m0" >
                                <div class="col s12 m7 l7 push-l5 push-m5 redsahde">
                                    <div class="hwd-conetnt">
                                        <div class="wdheading">Assisted  Wed Planner</div>
                                        <p>Assisted Wedding Planner is a Assisted wedding services brought to you by Shaadi Baraati at One-time nominal fee starting at Rs.999/- that helps you plan your wedding with a unlimited qualified wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind and Dedicated Relationship manager is assigned for each and every queries.Your dedicated relationship expert remains your single point of contact.</p>
                                        <div class="btbtn">
                                            <a class="bokmore-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                        <div class="hwed-item hwd3">
                            <div class="row m0" >
                                <div class="col s12 m7 l7 push-l5 push-m5 redsahde">
                                    <div class="hwd-conetnt">
                                        <div class="wdheading">Premium Wed Planner</div>
                                        <p>Guaranteed hassle-free wedding planning experience including wedding day coordination. Our expert takes care of research and scheduling for you and Makes visit to your place. Premium Wedding Planner is a wedding services brought to you by Shaadi Baraati at one-time nominal fee starting at Rs.9999/- that helps you to plan your wedding with a Trusted wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind.</p>
                                        <div class="btbtn">
                                            <a class="bokmore-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="h-wed-slider">
                        
                        <div class="h-wd-item ">
                            <div class="h-wd-item-contanier">
                                <div class="h-wd-item-content">
                                    <div class="h-wd-item-content-headin">Hello Wed Planner</div>
                                    <div class="h-wd-item-content-phara">Hello Wedding Planner is an online wedding services brought to you by Shaadi Baraati at free of cost, that helps you to plan your wedding with a qualified wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind.</div>
                                    <div class="h-wd-item-button">
                                        <a class="btn-cate">Book Now</a>
                                    </div>
                                   
                                    <div class="margin-box"></div>
                                </div>
                            </div>
                        </div>

                        <div class="h-wd-item ">
                            <div class="h-wd-item-contanier">
                                <div class="h-wd-item-content">
                                    <div class="h-wd-item-content-headin">Assisted Wed Planner</div>
                                    <div class="h-wd-item-content-phara">Assisted Wedding Planner is a Assisted wedding services brought to you by Shaadi Baraati at One-time nominal fee starting at Rs.999/- that helps you plan your wedding with a unlimited qualified wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind and Dedicated Relationship manager is assigned for each and every queries.Your dedicated relationship expert remains your single point of contact.</div>
                                    <div class="h-wd-item-button">
                                        <a class="btn-cate">Book Now</a>
                                    </div>
                                   
                                    <div class="margin-box"></div>
                                </div>
                            </div>
                        </div>


                        <div class="h-wd-item ">
                            <div class="h-wd-item-contanier">
                                <div class="h-wd-item-content">
                                    <div class="h-wd-item-content-headin">Premium Wed Planner</div>
                                    <div class="h-wd-item-content-phara">Guaranteed hassle-free wedding planning experience including wedding day coordination. Our expert takes care of research and scheduling for you and Makes visit to your place. Premium Wedding Planner is a wedding services brought to you by Shaadi Baraati at one-time nominal fee starting at Rs.9999/- that helps you to plan your wedding with a Trusted wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind.</div>
                                    <div class="h-wd-item-button">
                                        <a class="btn-cate">Book Now</a>
                                    </div>
                                   
                                    <div class="margin-box"></div>
                                </div>
                            </div>
                        </div>


                    </div>  -->
                </div>
            </div>
        </div>                        
    </section>



    <section class="sec ">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>E-Invite</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Customize and send free Online Invitation for your Mehendi, Engagement, Wedding And Reception Events using our wide selection of templates. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="vender-list">
                    <div class="row">
                        <div class="col l3 s6 p10">
                            <a href="">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei1.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Mehndi</h6>
                                        <p class="m0">Add a Personal touch to your Mehendi Ceremony E-Invites.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                            <a href="">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei2.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Engagement</h6>
                                        <p class="m0">Announce you Engagement with Exquisite Customized E -Invites.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                            <a href="">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei3.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Wedding</h6>
                                        <p class="m0">Brag about your wedding hassle free with our personalized E-Invites.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                            <a href="">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei4.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite">
                                        <h6 class="white-text">Reception</h6>
                                        <p class="m0">Indulged your loved once to a Lavish reception by sending them E-Invites.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <div class="sec bg-col pb-0">
        <section>
            <div class="container">
                <div class="row m0">
                    <div class="col l12">
                        <div class="vender-detail">
                            <h4>Real Wedding Storie's</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>Real Life Happy Couple’s share their touching and Sweet wedding stories. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="">
                    <div class="wedding-list">
                        <div class="wedding-detail">
                            <a href="">
                                <img src="<?php echo base_url() ?>assets/img/real-wedding/rw1.jpg"
                                    class="img-responsive icn-real" width="100%" alt="">
                                <div class="title-real-wedding">
                                    <h6 class="white-text">Naveen </h6>
                                    <p class="m0">Bangalore</p>
                                </div>
                            </a>
                        </div>

                        <div class="wedding-detail">
                            <a href="">
                                <img src="<?php echo base_url() ?>assets/img/real-wedding/rw2.jpg"
                                    class="img-responsive icn-real" width="100%" alt="">
                                <div class="title-real-wedding">
                                    <h6 class="white-text">Naveen </h6>
                                    <p class="m0">Bangalore</p>
                                </div>
                            </a>
                        </div>
                        <div class="wedding-detail">
                            <a href="">
                                <img src="<?php echo base_url() ?>assets/img/real-wedding/rw3.jpg"
                                    class="img-responsive icn-real" width="100%" alt="">
                                <div class="title-real-wedding">
                                    <h6 class="white-text">Naveen </h6>
                                    <p class="m0">Bangalore</p>
                                </div>
                            </a>
                        </div>
                        <div class="wedding-detail">
                            <a href="">
                                <img src="<?php echo base_url() ?>assets/img/real-wedding/rw4.jpg"
                                    class="img-responsiveicn-real" width="100%" alt="">
                                <div class="title-real-wedding">
                                    <h6 class="white-text">Naveen </h6>
                                    <p class="m0">Bangalore</p>
                                </div>
                            </a>
                        </div>
                        <div class="wedding-detail">
                            <a href="">
                                <img src="<?php echo base_url() ?>assets/img/real-wedding/rw5.jpg"
                                    class="img-responsiveicn-real" width="100%" alt="">
                                <div class="title-real-wedding">
                                    <h6 class="white-text">Naveen </h6>
                                    <p class="m0">Bangalore</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="sec mb30">
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>Happy Couple's</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>What our Happy Couple's says. </p>
                    </div>
                </div>
            </div>
            <div class="test-com">
                <div class="row">
                        <div class="col l8 s12 m12 push-l2">
                    <div class=" testimonial-wedd">

                            <div class="testi-coup">
                               
                                   
                                    
                                        <center><img src="<?php echo base_url() ?>assets/img/review/Ravi-S-rathore.jpg"
                                                class="img-responsive tsimg" alt=""></center>
                                        <h6 class="black-text">Mr & Mrs. Rathore</h6>
                                        <p>"Shaadi Baraati was very professional and dedicated. They have eased my
                                            wedding smooth and all the vendors were on time and even Shaadi Baraati Team
                                            was available on my wedding to ensure the quality services"</p>
                                        <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                                class="img-responsive"> </center>
                                    
                                
                            </div>

                            <div class="testi-coup">
                                
                                        <center><img src="<?php echo base_url() ?>assets/img/review/Raj-Nandi-Testimonial.jpg"
                                                class="img-responsive tsimg" alt=""></center>
                                        <h6 class="black-text">Mr & Mrs. Nandi</h6>
                                        <p>"We never thought planning a wedding would be this easy. Thankyou Shaadi Baraati for making life easy for us. We are so happy that we found your website"</p>
                                        <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                                class="img-responsive"> </center>
                                  
                            </div>


                            <div class="testi-coup">
                                
                                        <center><img src="<?php echo base_url() ?>assets/img/review/Bharadwaj.jpg"
                                                class="img-responsive tsimg" alt="Bharadwaj"></center>
                                        <h6 class="black-text">Mr & Mrs Bhardwaj</h6>
                                        <p>"Thank you Shaadi Baraati for hassle free events and making my dream come true"</p>
                                        <center> <img src="<?php echo base_url() ?>assets/img/testi-line.jpg" alt=""
                                                class="img-responsive"> </center>
                                        <!-- <p class="cr">26-07-2019</p> -->
                                  
                            </div>
                            </div>

                            
                            
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec bg-col">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12">
                    <div class="vender-detail">
                        <h4>Our Blogs</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive " alt="">
                        <p>Read up on these wedding Blogs while you are looking forward to your own special day. </p>
                    </div>
                </div>
            </div>
            
            <div class="row" id="blog">
            
                <div class="col l4 m4 s12" v-for="item in datas">
               
                    <a :href="item.link" class="">
                        <div class="blog-detail hoverable">
                            <div class="blog-img-box">
                                <img :src="item.better_featured_image.media_details.sizes.medium.source_url" alt=""
                                class="img-responsive blog-img">
                            </div>
                            
                            <div class="blog-li">
                                <h6 class="black-text truncate">{{item.title.rendered}}</h6>
                                <P class="black-text" v-html="item.excerpt.rendered"></P>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <center><a class="btn-cate" href="<?php echo base_url() ?>blog">View All </a></center>
        </div>
    </section>



    <?php $this->load->view('includes/footer'); ?>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>


    <script>
    <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
    

        // top-cities
        $('.top-citys').slick({
            slidesToShow: 5,
            slidesToScroll: 5,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false,
                    }
                }
            ]
        });
        // testimonial
        $('.testimonial-wedd').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            nextArrow: '<span class="next"><i class="Tiny material-icons ll">chevron_left</i></span>',
            prevArrow: '<span class="prev"><i class="Tiny material-icons rr">chevron_right</i></span>',
            arrows: true,
        });

        // wed assistence 
        $('.h-wed-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll:1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                }
            ]
            
        });

        // real-wedding
        $('.wedding-list').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 3000,
            nextArrow: false,
            prevArrow: false,
            dots: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]

        });
    </script>
    <script>

   


    var demo = new Vue({
        el: '#demo',
        data: {
            email: '',
            emailError: '', 
           
        },
       

        methods: {
            
            // email check on database
            emailCheck() {
                this.emailError = '';
                const formData = new FormData();
                formData.append('email', this.email);
                axios.post('<?php echo base_url() ?>home/emailcheck', formData)
                    .then(response => {
                        if (response.data == '1') {
                            this.emailError = 'You are already subscribed.';
                        } else {
                            this.emailError = '';
                        }
                    })
                    .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                    })
            },
            checkForm() {
                if (this.emailError == '') {


                    this.$refs.form.submit()
                } else {}
            }
        },
    });

    var blog = new Vue({
        el : '#blog',
        data:{
            datas: '',
        },
        mounted(){
            this.blogFetch()
        },
        methods: {
            // blog fetch
            blogFetch(){
            axios.get('https://www.baraati.in/blog/wp-json/wp/v2/posts?per_page=3&orderby=date&order=desc')
                .then(response => {
                    this.datas = response.data; 
                    console.log(this.datas);
                })
            },
        }
    })




    // for submit and change the url

    $(document).ready(function() {
        $(document).on('change', '#sel-city,#sel-cato', function(e) {
            e.preventDefault();

            var cityval = $('#sel-city').children("option:selected").val();
            var city = cityval.toLowerCase();
            var categoryval = $('#sel-cato').children("option:selected").val();
            var cat = categoryval.toLowerCase();
            if (city == '') {
                var finalUrl = '<?php echo base_url()?>vendors/all/' + cat;
            } else {
                var finalUrl = '<?php echo base_url()?>vendors/' + city + '/' + cat;
            }
            var url = finalUrl.replace(" ", "-", );
            $("#search-form").attr('action', url);
        });

    });
    </script>
</body>

</html>