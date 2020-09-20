<!DOCTYPE html>
<html>

<head>
    <?php
    $seo = seo();
    $m_titl = '';
    $m_descp = '';
    $m_key = '';
    $m_can = '';

    if (!empty($seo[0])) {
        foreach ($seo as $key => $value) {
            if($value->page == 'Home' || $value->page == 'home'){
                $m_titl     = $value->title;
                $m_descp    = $value->m_desc;
                $m_key      = $value->keywords;
                $m_can      = $value->can_link; 
            }
        }

    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <meta name="description" content="<?php echo $m_descp ?>" />
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <meta name="keywords" content="<?php echo $m_key ?>" />
    <meta name="p:domain_verify" content="14689d3a8168f4758e45146daa554c8b"/>
    <title><?php echo $m_titl ?> | Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slimselect.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <?php $this->load->view('includes/favicon.php');  ?>
    

</head>

<body>
    <!-- header -->
    <?php $this->load->view('includes/header.php'); ?>
    <!-- end header -->
    <section class="hom-bannr">
        <div class="row">
            <div class="banner-img">
                <img src="<?php echo base_url() ?>assets/img/banners.jpg" class="img-responsive" width="100%" alt="">
                <div class="lec-search">
                    <h1 class="hide-on-small-only">India's Most Trusted Online Wedding Market</h1>
                    <p class="hide-on-small-only">Find the best wedding vendors with thousands of trusted reviews</p>
                    <div class="row">
                        <form action="<?php echo base_url()?>vendors" method="post" id="search-form">
                            <div class="form-search">
                                <div class="container">
                                    <div class="col  s4 m4 mp">
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
                                    <div class="col  m6 s4 mp">
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
                                    <div class="col  m2 s4 mp">
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
                    <div class="col l12 m12 s12">
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
                        <h4>What is Wedz Assistance ?</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Plan your dream wedding with the help of our wedding planning experts. </p>
                    </div>
                </div>
                <div class="col s12 no-padding">
                            
                    <div class="h-wed-slider">

                        
                        <div class="hwed-item">
                            <div class="row m0" >
                                <a href="<?php echo base_url()?>wed-assistance"  class="modal-trigger">
                                    <img class="img-responsive as-img" src="<?php echo base_url('assets/img/free-assistance.png')?>" alt="">
                                </a>
                            </div>
                        </div>


                        <div class="hwed-item">
                            <div class="row m0" >
                                <a href="<?php echo base_url()?>wed-assistance"  class="modal-trigger">
                                    <img class="img-responsive as-img" src="<?php echo base_url('assets/img/assistance2.jpg')?>" alt="">
                                </a>
                            </div>
                        </div>
                           
                        <div class="hwed-item">
                            <div class="row m0" >
                                <a href="<?php echo base_url()?>wed-assistance" target="_blank" class="modal-trigger">
                                    <img class="img-responsive as-img" src="<?php echo base_url('assets/img/asistance1.jpg')?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                        
    </section>

<?php if (!empty($ban) && (count($ban) ==4 || count($ban) ==2)) {
    $img1='';
    $img2='';
    $img3='';
    $img4='';
    foreach ($ban as $bans => $bann) { 

        if ($bann->position == 'l1') {
            $img1 = (!empty($bann->img))?$bann->img:'';
            $link1 = (!empty($bann->link))?'href="'.$bann->link.'"':'';
        }

        if ($bann->position == 'r1') {
            $img2 = (!empty($bann->img))?$bann->img:'';
            $link2 = (!empty($bann->link))?'href="'.$bann->link.'"':'';
        }

        if ($bann->position == 'l2') {
            $img3 = (!empty($bann->img))?$bann->img:'';
            $link3 = (!empty($bann->link))?'href="'.$bann->link.'"':'';

        }

        if ($bann->position == 'r2') {
            $img4 = (!empty($bann->img))?$bann->img:'';
            $link4 = (!empty($bann->link))?'href="'.$bann->link.'"':'';
        }
    }

?>
    <section class="sec h_ban bg-col">
        <div class="container-fluide">
            <div class="row">
                <div class="col s12 l12">
                    <div class="vender-detail">
                        <h4>Shaadi Baraati Inhouse Services</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
            <div class="row m0">
                <div class="vender-list">
                    <div class="row m0">
                        <?php if (!empty($img1)) { ?>
                            <div class="col l6 s12 m6 p10">
                                <a <?php echo $link1; ?> target="_blank">
                                    <div class="vender-ei hoverable">
                                        <img src="<?php echo base_url().$img1 ?>"
                                            class="img-responsive icn-li" width="100%" alt="">
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                        <?php if (!empty($img2)) { ?>
                        <div class="col l6 s12 m6 p10">
                            <a <?php echo $link2; ?> target="_blank">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url().$img2 ?>"
                                        class="img-responsive icn-li" width="100%" alt="">
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if (!empty($img3)) { ?>
                        <div class="col l6 s12 m6 p10">
                            <a <?php echo $link3; ?> target="_blank">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url().$img3 ?>"
                                        class="img-responsive icn-li" width="100%" alt="">
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if (!empty($img4)) { ?>
                        <div class="col l6 s12 m6 p10">
                            <a <?php echo $link4; ?> target="_blank">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url().$img4 ?>"
                                        class="img-responsive icn-li" width="100%" alt="">
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


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
            <div class="row m0">
                <div class="vender-list">
                    <div class="row m0">
                        <div class="col l3 s6 p10">
                            <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei1.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Mehndi</h6>
                                            <p class="m0">Add a Personal touch to your Mehendi Ceremony E-Invites.</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                        <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei2.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Engagement</h6>
                                            <p class="m0">Announce you Engagement with Exquisite Customized E -Invites.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                        <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei3.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Wedding</h6>
                                            <p class="m0">Brag about your wedding hassle free with our personalized E-Invites.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col l3 s6 p10">
                        <a href="<?php echo base_url('einvite#template')?>">
                                <div class="vender-ei hoverable">
                                    <img src="<?php echo base_url() ?>assets/img/vender/ei4.jpg"
                                        class="img-responsive icn-li" width="100%" alt="">
                                    <div class="title-einvite valign-wrapper">
                                        <div>
                                            <h6 class="white-text">Reception</h6>
                                            <p class="m0">Indulged your loved once to a Lavish reception by sending them E-Invites.</p>
                                        </div>
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
                    <div class="col l12 m12 s12">
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
                        <?php
                        if (!empty($real)) {
                           foreach ($real as $key => $value) {
                           $rimg = (!empty($value->image))?$value->image:''; ?>
                            <div class="wedding-detail">
                                <a href="<?php echo base_url('real-wedding/detail/').$value->id ?>">
                                    <img src="<?php echo base_url().$rimg ?>"
                                        class="img-responsive icn-real" width="100%" alt="">
                                    <div class="title-real-wedding">
                                        <h6 class="white-text"><?php echo (!empty($value->name))?$value->name:''; ?> </h6>
                                        <p class="m0"><?php echo (!empty($value->city))?$value->city:''; ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php   }
                        }
                        ?>
                        

                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="sec mb30">
        <div class="container">
            <div class="row">
            <div class="col l12 m12 s12">
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
            <div class="col l12 m12 s12">
                    <div class="vender-detail">
                        <h4>Our Blogs</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive " alt="">
                        <p>Read up on these wedding Blogs while you are looking forward to your own special day. </p>
                    </div>
                </div>
            </div>
            
            <div class="row" id="blog">
            
                <div class="col l4 m6 s12" v-for="item in datas">
                    <a :href="item.link" class="">
                        <div class="blog-detail hoverable">
                            <div class="blog-img-box">
                                <img v-if="item.featured_media != null" :src="item.blogImage"  alt=""
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

    <div class="c19-popup"><a href="https://docs.google.com/forms/d/e/1FAIpQLScT4rYiS8gIRFkuUo8xfInuceDXrVrXWxpP5DmhOSmaE3Xr3A/viewform?vc=0&c=0&w=1&usp=mail_form_link" target="_blank" class="c19-body corona-read"><div class="c19-1"><p>Planning an #IntimateWedding?</p><p>Let’s bring your dream wedding to life</p></div><div class="c19-2"><span>YES</span></div></a><span class="close-c19 corona-close">X</span></div>



      <!-- Modal Trigger -->

  <!-- Modal Structure -->
    <div id="pop-modal" class="modal pop-modal">
        <div class="pop-overlay"></div>
        <div class="modal-content pmcd">
            <p class="top-text">Welcome to <span style="color: #d0021b">Shaadibaraati.com</span> - India's Most Trusted Online Wedding Market</p>
            <div class="row m0">
                <div class="pop-fs-txt">
                    <div class="col l6 m6 s6">
                        <h2 class="pop-mod-header m0"><span>#</span>Intimate Wedding</h2>
                    </div>
                    <div class="col l6 m6 s6">
                        <p class="pop-sharedet m0">Share your details below & get upto 30% off</p> 
                    </div>
                </div>
                <div class="pop-scn-txt">
                    <div class="col l6 offset-l3 m12 s12">
                        <h2 class="pop-mod-header m0 center-align">Getting Married Soon?</h2>
                    </div>
                </div>
                <div class="pop-thrd-txt">
                    <div class="col l8 offset-l2 m12 s12">
                        <h2 class="pop-mod-header m0 center-align">Our Guarnteed Best Prices</h2>
                    </div>
                </div>

                
                    
            </div>
            <p class="top-text">Hassle Free Planning & Booking at Our Guaranteed Best Prices.</p>
            <div class="row m0">
                <div class="col l12 m12 s12">
                  <ul class="tabs">
                    <li class="tab col l4 m4 s4"><a class="tabLink pop-t1" href="#pop-test1">Wedz Assist</a></li>
                    <li class="tab col l4 m4 s4"><a class="tabLink pop-t2" class="active" href="#pop-test2">Basic Details</a></li>
                    <li class="tab col l4 m4 s4"><a class="tabLink pop-t3" href="#pop-test3">Wedding Details</a></li>
                  </ul>
                </div>
                <div id="pop-test1" class="col l12 m12 s12 pmp0">
                    <div class="row">
                        <div class="col l6 m6 s6 pmpr0">
                            <p class="top-text mt0">Works Book a vendors in simple steps</p>
                            <div class="tab-ssb">
                                <div class="tab-ssb-inner">
                                    <img src="<?php echo base_url()?>assets/img/icon/c.png" alt="">
                                    <span>SEARCH</span>
                                </div>
                                <div class="tab-ssb-inner">
                                    <img src="<?php echo base_url()?>assets/img/icon/b.png" alt="">
                                    <span>SELECT</span>
                                </div>
                                <div class="tab-ssb-inner">
                                    <span><img src="<?php echo base_url()?>assets/img/icon/a.png" alt=""></span>
                                    <span>BOOK</span>
                                </div>
                            </div>
                            <div class="tab-wed-vendrs">
                                <h6 class="tab-wed-head">Find the Top wedding vendors</h6>
                                <ul>
                                    <?php if (!empty(vendor_category())) {
                                        foreach (vendor_category() as $vkey => $vvalue) { 
                                        $clink = strtolower(str_replace(" ","-",$vvalue->category));
                                        echo  '<li><a href="'.base_url().'vendors/all/'.$clink.'">'.$vvalue->category.'</a></li>';
                                        if ($vkey == 7) {
                                            break;
                                        }
                                    } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col l6 m6 s6 pmp0">
                            <p class="top-text">Need help with wedding Planning vendor selection?</p>
                            <div class="center-align tab-wed-yes">
                                <a class="waves-effect waves-light btn tab-wed-yes-btns" href="#" >Yes</a>
                                <a class="waves-effect waves-light btn modal-close">No</a>
                            </div>
                            <ul class="tab-right-ul">
                                <li>Online Support</li>
                                <li>Provided verified vendors only</li>
                                <li>Unlimited Vendor Details</li>
                                <li>Exclusive packages and discounts</li>
                                <li>Dedicated wedding planning expert takes care of research</li>
                                <li>Bargain on your behalf</li>
                                <li>No hidden cost</li>
                                <li>Your dedicated RM remains your single point of contact</li>
                            </ul>
                            <p class="mt10 mb0 center-align" style="font-size: 12px; font-weight: 600;">Planning An #IntimateWedding?</p>
                        </div>
                    </div>
                    <div class="center">
                        <p class="pop-sharedet ft-tx m0 center">Share your details below & get upto 30% off</p> 
                    </div>
                </div>
                <div id="pop-test2" class="col s12">
                    <div class="row">
                        <div class="col l6 m6 s6">
                            <div class="tab-ssb">
                                <div class="tab-ssb-inner2">
                                    <center>
                                        <img src="<?php echo base_url()?>assets/img/popup/t2.png" alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="tab-wed-vendrs">
                                <h6 class="tab-wed-head">Find the Top wedding vendors</h6>
                                <ul>
                                    <?php if (!empty(vendor_category())) {
                                        foreach (vendor_category() as $vkey => $vvalue) { 
                                        $clink = strtolower(str_replace(" ","-",$vvalue->category));
                                        echo  '<li><a href="'.base_url().'vendors/all/'.$clink.'">'.$vvalue->category.'</a></li>';
                                        if ($vkey == 7) {
                                            break;
                                        }
                                    } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col l6 m6 s6">
                            <p class="top-text mb0">Fill your details to view our list of suggestions Share your details below & get upto 30% off</p>
                            <div class="center-align tab-wed-yes">
                                <div class="col s12 m12 l10 offset-l1">
                                    <div class="row m0">
                                        <div class="col l12 m12 s12">
                                            <form id="pop-form" method="post">
                                                <div class="input-field mb0">
                                                    <input id="poname" type="text" class="validate"  required="" placeholder="Name" name="poname">
                                                    <span class="left ponameError red-text"></span>
                                                </div>
                                                <div class="input-field mb0">
                                                    <input id="pophone" type="text" class="validate" required=""  placeholder="Phone" name="pophone">
                                                    <span class="left pophoneError red-text"></span>
                                                </div>
                                                <div class="input-field mb0">
                                                    <input id="poemail" type="email" class="validate" required=""  placeholder="Email" name="poemail">
                                                    <span class="left poemailError red-text"></span>
                                                </div>
                                                <div class="input-field" style="margin-top: 2rem;">
                                                     <button style="border-radius: 0px" class="waves-effect waves-light btn pop-next">Next</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <p class="pop-sharedet ft-tx m0 center">Share your details below & get upto 30% off</p> 
                    </div>
                </div>
                <div id="pop-test3" class="col s12">
                    <div class="row m0">
                        <div class="col l6 m6 s6">
                            <div class="tab-ssb">
                                <div class="tab-ssb-inner3">
                                    <center>
                                        <img src="<?php echo base_url()?>assets/img/popup/t1.png" alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="tab-wed-vendrs mt0">
                                <h6 class="tab-wed-head">Find the Top wedding vendors</h6>
                                <ul>
                                    <?php if (!empty(vendor_category())) {
                                        foreach (vendor_category() as $vkey => $vvalue) { 
                                        $clink = strtolower(str_replace(" ","-",$vvalue->category));
                                        echo  '<li><a href="'.base_url().'vendors/all/'.$clink.'">'.$vvalue->category.'</a></li>';
                                        if ($vkey == 7) {
                                            break;
                                        }
                                    } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col l6 m6 s6">
                            <p class="top-text">Get customized list of suggestions according to your preference</p>
                            <div class="center-align tab-wed-yes">
                                <div class="row">
                                    <form id="pop-form2" method="post">
                                        <div class="col l12 m12 s12">
                                            <div class="input-field">
                                                <select name="pop_cit" required="" id="pop_cit" class="pop-select pop_cit">
                                                    <option value="">Select Your City</option>
                                                    <?php if (!empty(cities())) {
                                                        foreach (cities() as $vcity => $vcities) {
                                                            echo '<option value="'.$vcities->city.'">'.$vcities->city.'</option>';
                                                        }
                                                    } ?>
                                                </select>
                                                <span class="left pop_citError red-text"></span>
                                            </div>
                                            <div class="input-field">
                                                <select name="pop_cat" required="" id="pop_cat" class="pop-select pop_cat">
                                                    <option value="">Select a Service</option>
                                                    <?php if (!empty(vendor_category())) {
                                                        foreach (vendor_category() as $vkey => $vvalue) {
                                                            echo '<option value="'.$vvalue->category.'">'.$vvalue->category.'</option>';
                                                        }
                                                    } ?>
                                                </select>
                                                <span class="left pop_catError red-text"></span>
                                            </div>
                                            <div class="input-field">
                                                <select required name="pop_bud" class="pop-select pop_bud">
                                                    <option value="" selected>Budget</option>
                                                    <option value="Below 50k">Below 50k</option>
                                                    <option value="Upto 1 Lakh">Upto 1 Lakh</option>
                                                    <option value="1lakh - 5lakh">1 Lakh - 5 Lakh</option>
                                                    <option value="5lakh - 10lakh">5 Lakh - 10 Lakh</option>
                                                    <option value="10lakh - 20lakh">10 Lakh - 20 Lakh</option>
                                                    <option value="25lakh - 50lakh">25 Lakh - 50 Lakh</option>
                                                    <option value="Above 50 lakh">Above 50 Lakh</option>
                                                </select>
                                                <span class="left pop_budError red-text"></span>
                                            </div>
                                            <div class="input-field pop-date">
                                                <input id="pop_date" type="text" name="pop_date" placeholder="Event Date" class="validate datepicker pop_date" required>
                                                <span class="left pop_dateError red-text"></span>
                                            </div>
                                            <div class="input-field">
                                                    <textarea id="textarea1" class="materialize-textarea pop_msg" placeholder="Message" name="pop_msg"></textarea>
                                                    <span class="left pop_msgError red-text"></span>
                                            </div>
                                            <div class="input-field" style="margin-top: 2rem;">
                                                     <button style="border-radius: 0px" class="waves-effect waves-light btn pop-next">SUBMIT</button>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <p class="pop-sharedet ft-tx m0 center">Share your details below & get upto 30% off</p> 
                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php $this->load->view('includes/footer'); ?>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slimselect.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
 

    <script>
    <?php $this->load->view('includes/message'); ?>
    </script>
    <script>

        if( window.innerWidth > 767 ){
            setTimeout(function(){

                var Modalelem = document.querySelector('#pop-modal');
                var instance = M.Modal.init(Modalelem,{ dismissible: true });
                instance.open();
    
            }, 10000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.pop-select');
            var instances = M.FormSelect.init(elems);
        });
        
          new SlimSelect({ select: '.input-field select'});
          new SlimSelect({ select: '.input-field select#sel-cato'});
          
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
            arrows: true,
            prevArrow: '<span class="material-icons larr">keyboard_arrow_left</span>',
            nextArrow: '<span class="material-icons rarr">keyboard_arrow_right</span>',
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

            blogFetch(){
                axios.get('<?php echo base_url() ?>home/blogFetch')
                .then(response => {
                    this.datas = response.data;
                })
                .catch(error => {
                  if (error.response) {
                      this.errormsg = error.response.data.error;
                  }
                })
            },


            

        },
        
    })




    // for submit and change the url

    $(document).ready(function() {

        var cookieArr = document.cookie.split(";");
        var cookiePair = cookieArr[0].split("=");

        if (cookiePair[1] != '' && cookiePair[1] == 'shaadipop') {
            $(".c19-popup").css('display', 'none');
        }else{
            $(".c19-popup").css('display', 'block');
        }

        $(document).on('change', '#sel-city,#sel-cato', function(e) {
            e.preventDefault();

            var cityval = $('#sel-city').children("option:selected").val();
            var city = cityval.toLowerCase();
            var categoryval = $('#sel-cato').children("option:selected").val();
            var cat = categoryval.toLowerCase();
            if (city == '') {
                var finalUrl = '<?php echo base_url()?>vendors/all/' + cat.replace(" ", "-", );
            } else {
                var finalUrl = '<?php echo base_url()?>vendors/' + city.replace(" ", "-", ) + '/' + cat.replace(" ", "-", );
            }
            var url = finalUrl.replace(/\s+/g, '-');

            $("#search-form").attr('action', url);  
        });

        $(document).on('click', '.corona-close', function(e) {
            e.preventDefault();
            $(".c19-popup").fadeOut();
            $(".c19-popup").css('display', 'none');
            document.cookie = "covid=shaadipop; max-age=" + 7200;
        });


        $(document).on('click', '.pop-t3', function(e) {
            $('.ponameError > span').remove();
            $('.pophoneError > span').remove();
            $('.poemailError > span').remove();
            var poname  = $('input[name="poname"]').val();
            var pophone = $('input[name="pophone"]').val();
            var poemail = $('input[name="poemail"]').val();
            if (poname == '')  { $('.ponameError').append("<span>Please Enter Your Name"); }
            if (pophone == '') { $('.pophoneError').append("<span>Please Enter Your Phone Number"); }
            if (poemail == '') { $('.poemailError').append("<span>Please Enter Your Email"); }
            if (poname == '' || pophone == '' || poemail == '') {
                $('#pop-test2').addClass('active');
                $("#pop-test2").attr("style", "display:block");
                $('.pop-t2').addClass('active');
                $('#pop-test3').attr("style", "display:none");
                $('#pop-test3').removeClass('active');
                $('.pop-t3').removeClass('active');
            }else{
                $('.pop-fs-txt').css('display','none');
                $('.pop-scn-txt').css('display','none');
                $('.pop-thrd-txt').css('display','block');
            }
        });

        $(document).on('click', '.tab-wed-yes-btns', function(e) {
            $('#pop-test2').addClass('active');
                $("#pop-test2").attr("style", "display:block");
                $('.pop-t2').addClass('active');
                $('#pop-test3').attr("style", "display:none");
                $('#pop-test3').removeClass('active');
                $('.pop-t3').removeClass('active');
                $('.pop-t1').removeClass('active');
                $('#pop-test1').attr("style", "display:none");

        });

         $(document).on('click', '.pop-t1', function(e) {
                $('.pop-t2').removeClass('active');
                $('.pop-fs-txt').css('display','block');
                $('.pop-scn-txt').css('display','none');
                $('.pop-thrd-txt').css('display','none');
         });

         $(document).on('click', '.pop-t2', function(e) {
                $('.pop-fs-txt').css('display','none');
                $('.pop-scn-txt').css('display','block');
                $('.pop-thrd-txt').css('display','none');
         });





        


        

        $(document).on('submit', '#pop-form', function(e) {
            e.preventDefault();
            $('.ponameError > span').remove();
            $('.pophoneError > span').remove();
            $('.poemailError > span').remove();
            var poname  = $('input[name="poname"]').val();
            var pophone = $('input[name="pophone"]').val();
            var poemail = $('input[name="poemail"]').val();
            if (poname == '')  {  $('.ponameError').append("<span>Please Enter Your Name"); }
            if (pophone == '') { $('.pophoneError').append("<span>Please Enter Your Phone Number"); }
            if (poemail == '') { $('.poemailError').append("<span>Please Enter Your Email"); }
            var DataString = $(this).serialize();

            if (poname != '' && pophone != '' && poemail != '') {
                $.ajax({
                    url: '<?php echo base_url()?>home/popSetuser',
                    type: 'POST',
                    dataType: 'json',
                    data: DataString,
                    success: function(data) {
                        if (data !='') {
                            $('#pop-test3').addClass('active');
                            $("#pop-test3").attr("style", "display:block");
                            $('.pop-t3').addClass('active');
                            $('#pop-test2').attr("style", "display:none");
                            $('#pop-test3').removeClass('active');
                            $('.pop-t2').removeClass('active');
                            $('.pop-fs-txt').css('display','none');
                            $('.pop-scn-txt').css('display','none');
                            $('.pop-thrd-txt').css('display','block');
                        }else{
                             e.preventDefault();
                        }

                    }
                });
            }
        });

        $(document).on('submit', '#pop-form2', function(e) {
            e.preventDefault();

            $('.pop_citError > span').remove();
            $('.pop_catError > span').remove();
            $('.pop_budError > span').remove();
            $('.pop_dateError > span').remove();
            $('.pop_msgError > span').remove();

            var pop_cit     = $('input[name="pop_cit"]').val();
            var pop_cat     = $('input[name="pop_cat"]').val();
            var pop_bud     = $('input[name="pop_bud"]').val();
            var pop_date    = $('input[name="pop_date"]').val();
            var pop_msg     = $('input[name="pop_msg"]').val();

            if (pop_cit == '')  {  $('.pop_citError').append("<span>Please Enter Your Name"); }
            if (pop_cat == '') { $('.pop_catError').append("<span>Please Enter Your Phone Number"); }
            if (pop_bud == '') { $('.pop_budError').append("<span>Please Enter Your Email"); }
            if (pop_date == '') { $('.pop_dateError').append("<span>Please Enter Your Email"); }
            if (pop_msg == '') { $('.pop_msgError').append("<span>Please Enter Your Email"); }
            var DataString = $(this).serialize();

            if (pop_cit != '' && pop_cat != '' && pop_bud != '' && pop_date != '' && pop_msg != '') {
                $.ajax({
                    url: '<?php echo base_url()?>home/popsetUsers',
                    type: 'POST',
                    dataType: 'json',
                    data: DataString,
                    success: function(resp) {
                        var msg = resp.msg;
                        M.toast({html: msg, classes: 'green darken-2'});
                        $('#pop-modal').modal('close');
                    }
                });
            }
         });


    });
    </script>
</body>

</html>