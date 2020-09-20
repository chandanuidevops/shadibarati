<?php  $this->ci =& get_instance();
$this->load->model('m_search'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <style>
    .fixed-action-btn {
        position: relative;
        right: 0;
        bottom: 0;
    }

    .check-group p {
        float: left;
        margin-right: 10px;
    }

    .favcol {
        border-color: #d0021b;
        background: #d0021b !important;
        box-shadow: 0 0 2px #9f0202 !important;
    }

    .favcol i {
        color: #fff !important;
    }

    [type="radio"]:checked+span::after,
    [type="radio"].with-gap:checked+span::before,
    [type="radio"].with-gap:checked+span::after {
        border: 2px solid #d50000;
    }

    [type="radio"]:checked+span::after,
    [type="radio"].with-gap:checked+span::after {
        background-color: #d50000;
    }

    .fixed-action-btn {
        position: relative;
        right: 0;
        bottom: 0;
    }

    html {
        scroll-behavior: smooth;
    }


    .check-group p {
        float: left;
        margin-right: 10px;
    }

    .favcol {
        border-color: #d0021b;
        background: #d0021b !important;
        box-shadow: 0 0 2px #9f0202 !important;
    }

    .favcol i {
        color: #fff !important;
    }
    .tit{
    	white-space: nowrap !important;
overflow: visible !important;
text-overflow: unset !important;
    }

    .r-crd-price{
        line-height: 22px;
    }
    .simil-crd{
        border-radius: 0 0 2px 2px;
        padding: 12px !important;
height: 98px;
    }
    </style>
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->

        <!-- body  -->

        <?php if (!empty($vendor)) {
            foreach ($vendor as $key => $value) { ?>
        <section id="detail">
            <div class="container-fluide">
                <div class="row">
                    <div class="col s12 m12 l8">
                        <div class="banner-container ">
                            <img class="responsive-img z-depth-1"
                                src="<?php echo (!empty($value->profile_file))?base_url().$value->profile_file:''; ?>"
                                alt="<?php echo (!empty($value->name))?$value->name:''; ?>" width="100%">
                        </div>
                        <!-- basic info -->
                        <div class="detail-bs-info">
                            <div class="card">
                                <div class="card-container">
                                    <div class="row m0">
                                        <div class="col s12">
                                            <div class="dt-card-title">
                                                <p><?php echo (!empty($value->name))?$value->name:''; ?></p>
                                            </div>
                                        </div>
                                        <div class="col s12 m7 l8">
                                            <span
                                                class="mb10 location"><?php echo (!empty($value->city))?$value->city:''; ?></span>
                                            <p><?php echo (!empty($value->address))?$value->address:''; ?> </p>
                                        </div>

                                        <form action="" style="display: none">
                                            <input id="vndr_id" ref="myTestField" type="text" class="validate in-l"
                                                name="vndr_id"
                                                value="<?php echo (!empty($value->id))?$value->id:''; ?>">
                                        </form>


                                        <div class="col s12 m5 l4">
                                            <div class="dbi-right">

                                                <!-- <?php if($value->fav == '1'){ echo 'favcol'; } ?>  -->


                                                <div class="btn-group">
                                                    <a v-on:click="favourite" :class="{'favcol': favcol }"
                                                        class="btn-floating  waves-effect waves-red transparent z-depth-0"><i
                                                            class="fas fa-heart tiny"></i></a>
                                                    <span>Favorite</span>
                                                </div>

                                                <div class="btn-group">
                                                    <a class="btn-floating  waves-effect waves-red transparent z-depth-0"
                                                        href="#vendor-rating"><i class="fas fa-star tiny"></i></a>
                                                    <span>

                                                        <?php if (!empty($value->review)) {
                                                    $ratingSum = 0;
                                                    foreach ($value->review as $rev => $revw) {
                                                    $ratingSum += $revw->rating;
                                                     $avg = $ratingSum / count($value->review);
                                            } 

                                            echo round($avg, 1); 


                                        }else{
                                            echo '0';
                                        }

                                        ?>



                                                    </span>
                                                </div>

                                                <div class="btn-group">
                                                    <div class="fixed-action-btn">
                                                        <a
                                                            class="btn-floating  waves-effect waves-red transparent z-depth-0"><i
                                                                class="fas fa-share-alt tiny"></i></a>
                                                        <span>Share</span>
                                                        <ul>
                                                            <li> <a href="http://www.facebook.com/sharer.php?s=100&p[summary]=<?php echo $value->name ?>&p[url]=<?php echo current_url(); ?>&p[title]=<?php echo $value->name ?>"
                                                                    target="_blank" class="btn-floating blue"><i
                                                                        class="fab fa-facebook-f"></i></a></li>

                                                            <li><a href="http://twitter.com/home?url=<?php echo $value->name ?>+<?php echo current_url(); ?>"
                                                                    target="_blank" class="btn-floating blue"><i
                                                                        class="fab fa-twitter"></i></a></li>

                                                            <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo current_url(); ?>&description=<?php $desc = str_replace(' ', '-', $value->name); echo $desc ?>"
                                                                    class="btn-floating red" target="_blank"><i
                                                                        class="fab fa-pinterest-p"></i></a></li>

                                                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;amp;url=<?php echo current_url(); ?>/&amp;amp;title=<?php echo $value->name ?>&amp;amp;source=5ineproject.com/shaadibaraati"
                                                                    target="_blank" class="btn-floating blue"><i
                                                                        class="fab fa-linkedin-in"></i></a></li>
                                                        </ul>

                                                    </div>
                                                </div>
                                                <a class="waves-effect waves-light btn red plr20 accent-4 white-text"
                                                    onclick="focusMethod()">View
                                                    Contact</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- tabs -->
                        <div class="tab-links">
                            <ul class="tabs z-depth-1">
                                <?php if (!empty($value->detail)) { ?>
                                <li class="tab "><a href="#about-vendor" class="active">About
                                        <?php echo (!empty($value->name))?$value->name:''; ?></a></li>
                                <?php } ?>
                                <?php if (!empty($value->service) || !empty($value->faq)) { ?>
                                <li class="tab"><a href="#vendor-services">Services</a></li>
                                <?php }?>
                                <li v-if="imgs.length > 0" class="tab"><a href="#vendor-gallery">Gallery</a></li>
                                <li class="tab"><a href="#vendor-rating">Reviews</a></li>
                            </ul>
                        </div>

                        <!-- about vendor -->

                        <?php if (!empty($value->detail)) { ?>
                        <div class="about-vendor" id="about-vendor">
                            <div class="card">
                                <div class="card-container">
                                    <div class="row m0">
                                        <div class="col s12">
                                            <div class="dt-card-title">
                                                <p><?php echo (!empty($value->name))?$value->name:''; ?></p>
                                            </div>
                                            <p><?php echo (!empty($value->detail))? $value->detail :''; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- end about vendor -->




                    </div><!-- left -->

                    <div class="col s12 m12 l4">
                        <div class="right-form">
                            <div class="card">
                                <div class="card-container">
                                    <div class="borderbox">
                                        <div class="bbx-heading">
                                            Starting Price
                                        </div>
                                        <div class="bbx-content">
                                            <ul>
                                                <li>
                                                    <span class="bbx-name">Starting Price</span>
                                                    <span class="bbx-rate">-  <?php
                                                    $amount = (!empty($value->price))?$value->price:'';
                                                    $num =$amount;
                                                    $explrestunits ='';
                                                    if(strlen($num)>3){
                                                    $lastthree = substr($num, strlen($num)-3, strlen($num));
                                                    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
                                                    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
                                                    $expunit = str_split($restunits, 2);
                                                    for($i=0; $i < sizeof($expunit);  $i++){
                                                    // creates each of the 2's group and adds a comma to the end
                                                    if($i==0)
                                                    {
                                                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                                                    }else{
                                                    $explrestunits .= $expunit[$i].",";
                                                    }
                                                    }
                                                    $thecash = $explrestunits.$lastthree;
                                                    } else {
                                                    $thecash = $num;
                                                    }
                                                    echo (!empty($thecash))?'&#8377; '.$thecash:'';  echo (!empty($value->price_for))?'&nbsp;'.$value->price_for:' Per day'; ?> </span>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                    <div class="borderbox">
                                        <div class="bbx-heading">
                                            SEND MESSAGE
                                        </div>

                                        <?php

                                        $this->load->model('m_vendors');
                                        $user = $this->m_vendors->userget($this->session->userdata('shdid'));

                                       
                                         ?>
                                        <form class="row m0" action="<?php echo base_url()?>enquire-vendor"
                                            method="post">
                                            <div class="row m0">
                                                <div class="input-field col s6">
                                                    <input id="name" type="text" class="validate" name="e_name"
                                                        <?php echo (!empty($user->su_name))?'readonly':''; ?>
                                                        value="<?php echo (!empty($user->su_name))?$user->su_name:''; ?>"
                                                        required>
                                                    <label for="name">Name</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="email" type="text" class="validate" name="e_email"
                                                        <?php echo (!empty($user->su_email))?'readonly':''; ?>
                                                        value="<?php echo (!empty($user->su_email))?$user->su_email:''; ?>"
                                                        required>
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s6">
                                                    <input id="phone" type="text" class="validate" name="e_mobile"
                                                        <?php echo (!empty($user->su_phone))?'readonly':''; ?>
                                                        value="<?php echo (!empty($user->su_phone))?$user->su_phone:''; ?>"
                                                        required>
                                                    <label for="phone">Mobile Number</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="date" type="text" class="validate datepicker"
                                                        name="fn_date">
                                                    <label for="date">Function Date</label>
                                                </div>
                                            </div>

                                            <?php if ($value->category == 'wedding venues' || $value->category == 'Wedding Venues') { ?>
                                            <div class="row m0">
                                                <div class="input-field col s6">
                                                    <input id="guest" type="text" class="validate" name="guest_no">
                                                    <label for="guest">Number of Guest</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="rooms" type="text" class="validate" name="rooms">
                                                    <label for="rooms">No of rooms</label>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <p>Function Type</p>
                                                <p>
                                                    <label>
                                                        <input class="with-gap" name="fn_type" type="radio" checked
                                                            value="1" />
                                                        <span>Pre-Wedding</span>
                                                    </label>
                                                    <label>
                                                        <input class="with-gap" name="fn_type" type="radio" value="2" />
                                                        <span>Wedding</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="row m0">
                                                <p>Function Time</p>
                                                <p>
                                                    <label>
                                                        <input class="with-gap" name="fn_time" type="radio" checked
                                                            value="1" />
                                                        <span>Evening</span>
                                                    </label>
                                                    <label>
                                                        <input class="with-gap" name="fn_time" type="radio" value="2" />
                                                        <span>Day</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <?php } ?>
                                            <div class="row m0">
                                                <div class="input-field col s12">
                                                    <textarea id="wed_detail" class="materialize-textarea" required
                                                        name="wed_detail"></textarea>
                                                    <label for="wed_detail">Details about your wedding</label>
                                                </div>
                                            </div>

                                            <input type="hidden" name="vendor_id" value="<?php echo $value->uniq ?>">
                                            <input type="hidden" name="uniq"
                                                value="<?php echo random_string('alnum',20); ?>">




                                            <div class="input-field">
                                                <button
                                                    class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <img src="<?php echo (!empty($value->offer['image']))?base_url($value->offer['image']):''  ?>"
                                class="responsive-img" alt="">
                            <div id="vendor-services"></div>
                        </div>

                    </div><!-- right -->

                    <div class="clearfix"></div>
                    <!-- Servicess -->
                    <?php if(!empty($value->service)){ ?>
                    <div id="">
                        <div class="card">
                            <div class="card-container">
                                <div class="col s12">
                                    <div class="dt-card-title">
                                        <p>Services</p>
                                    </div>
                                </div>
                                <div class="row m0">

                                    <?php if ($value->service) { foreach ($value->service as $servic => $ser) { ?>

                                    <div class="col s6 m4 l2">
                                        <div class="service-box center-align">
                                            <img style="height:40px" class="responsive-img"
                                                src="<?php echo (!empty($ser->image))?base_url().$ser->image:''; ?>"
                                                alt="">
                                            <p class="sb-title m0">
                                                <?php echo (!empty($ser->service))?$ser->service:''; ?></p>
                                            <p class="detail m0">
                                                <?php echo $this->ci->m_search->getSubtitle($value->id,$ser->id); ?></p>
                                        </div>
                                    </div>
                                    <?php  } } ?>

                                    <div class="clearfix"></div>
                                    <?php if (!empty($value->faq)) { ?>

                                    <div class="col s12">
                                        <div class="vs-info-container">
                                            <div class="vs-ic-title" @click="isShow = !isShow">
                                                <span>Information Detail</span>
                                                <span class="right"><i class="fas fa-minus" v-if="isShow"></i> <i
                                                        class="fas fa-plus" v-if="!isShow"></i></span>
                                            </div>
                                            <transition name="slide">
                                                <div class="vs-contentbox" v-if="isShow">
                                                    <?php  foreach ($value->faq as $key => $faqs) {  ?>
                                                    <div class="vs-ic-content">
                                                        <p class="vs-qtn"><?php echo $faqs->quotation ?></p>
                                                        <p class="vs-aws"><?php echo $faqs->asw ?></p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </transition>
                                        </div>
                                    </div>
                                                    <?php }  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php } ?>
                    <!-- end Servicess -->

                    <!-- gallery -->
                    <div id="vendor-gallery" v-if="imgs.length > 0">
                        <div class="card">
                            <div class="card-container">
                                <div class="row m0">
                                    <div class="col s12">
                                        <div class="dt-card-title">
                                            <p>Photo Gallery</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="" onload="myFunction()">
                                        <div v-for="(src, index) in imgs" :key="index" class="pic col5s">
                                            <div @click="() => showImg(index)" v-if="index < 11">
                                                <img :src="src" class="">
                                            </div>
                                            <div v-else-if="index == 11 && imgs.length < 13" @click="loadMore"
                                                class="load-more-pick">
                                                <span class="morecount">+ {{ count }} more</span>
                                                <img :src="src" class="">
                                            </div>
                                            <div @click="() => showImg(index)" v-else>
                                                <img :src="src" class="">
                                            </div>
                                        </div>
                                    </div>
                                    <vue-easy-lightbox :visible="visible" :imgs="imgs" @hide="handleHide">
                                    </vue-easy-lightbox>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end gallery -->


                    <!-- video section -->
                    <?php if (!empty($value->video)) { ?>
                    <div id="vendor-video">
                        <div class="card">
                            <div class="card-container">
                                <div class="row m0">
                                    <div class="col s12">
                                        <div class="dt-card-title">
                                            <p>Videos</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>



                                    <?php 
                                    $totalrate = 1;
                                    $vid='';
                                    
                                    if (!empty($value->video)) {
                                        foreach ($value->video as $vid => $vids) { ?>
                                    <div v-if="videocount >= <?php echo $vid +  $totalrate ?>"
                                        class="col s12 m6 l4 mb15">
                                        <?php //youtube
                                        if ($vids->type == '1') { ?>
                                        <iframe width="100%" height="200"
                                            src="https://www.youtube.com/embed/<?php echo $vids->link ?>"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                        <?php }else if ($vids->type == '2'){ ?>
                                        <iframe
                                            src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo str_replace("/","%2F",$vids->link); ?>&show_text=0&width=476"
                                            width="100%" height="200" style="border:none;overflow:auto" scrolling="no"
                                            frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>

                                        <?php } ?>
                                    </div>
                                    <?php  } } ?>

                                    <div class="center-align">

                                        <button @click="morevideo" v-if="<?php echo $vid + 1 ?> > 3 && videocount < 4"
                                            class="waves-effect waves-light btn red plr30 accent-4 white-text">View
                                            More</button>


                                    </div>





                                </div>
                            </div>
                            
                           
                        </div>
                    </div>

                    <?php } ?>
                    <div id="vendor-rating"></div>

                   
                    <!-- end video section -->

                    <!-- rating and review -->
                    <div>
                        <div class="card">
                            <div class="card-container">
                                <div class="row m0">
                                    <div class="col s12">
                                        <div class="dt-card-title">
                                            <p>Write a Review</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <form action="<?php echo base_url('review/submit') ?>" method="post"
                                        ref="reviewForm" @submit.prevent="checkForm">
                                        <div class="col s12 mt20">
                                            <div class="left rateus"> Rate us : </div>
                                            <star-rating v-model="ar" :star-size="20"></star-rating>
                                        </div>

                                        <div class="col s12 m10 l12">

                                            <div class="row m0 check-group">
                                                <p>
                                                    <label>
                                                        <input name="rev_proffesional" class="filled-in" type="checkbox"
                                                            @change="onFocus" value="1"
                                                            v-model="useriview.professionalism" />
                                                        <span>Professionalism</span>
                                                    </label>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input name="rev_quality" class="filled-in" type="checkbox"
                                                            @change="onFocus" value="1"
                                                            v-model="useriview.qualityofWork" />
                                                        <span>Quality of Work</span>
                                                    </label>
                                                </p>

                                                <p>
                                                    <label>
                                                        <input name="rev_service" class="filled-in" type="checkbox"
                                                            @change="onFocus" value="1"
                                                            v-model="useriview.onTimeService" />
                                                        <span>On Time Service</span>
                                                    </label>
                                                </p>

                                                <p>
                                                    <label>
                                                        <input name="rev_money" class="filled-in" type="checkbox"
                                                            @change="onFocus" value="1"
                                                            v-model="useriview.valueOfMoney" />
                                                        <span>Value for Money</span>
                                                    </label>
                                                </p>

                                                <p>
                                                    <label>
                                                        <input name="rev_experience" class="filled-in" type="checkbox"
                                                            @change="onFocus" value="1"
                                                            v-model="useriview.highlyExperiencw" />
                                                        <span>Highly Experienced</span>
                                                    </label>
                                                </p>
                                            </div>

                                            <div class="row m0">
                                                <div class="input-field col l7 s12">
                                                    <textarea ref="tsarea" id="textarea1" name="rev_description"
                                                        v-on:focus="onFocus" class="materialize-textarea"
                                                        required="">{{useriview.review}}</textarea>
                                                    <label for="textarea1">Write Review</label>
                                                </div>
                                            </div>


                                            <input type="hidden" value="" name="rev_rating" v-model="ar">
                                            <input type="hidden" value="<?php echo $value->id ?>" name="rev_vendor">
                                            <input type="hidden" value="<?php echo $value->uniq ?>" name="vendoruniq">
                                            <button
                                                class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>

                                    <?php if(!empty($value->review)){ ?>

                                    <div class="full-line"></div>

                                    <?php } ?>

                                </div>

                                <div class="row m0">
                                    <div class="">

                                        <?php 

                                            if(!empty($value->review)){

                                            if ($value->review) {
                                                    $ratingSum = 0;
                                                    $num1 = 0;
                                                    $num2 = 0;
                                                    $num3 = 0;
                                                    $num4 = 0;
                                                    $num5 = 0;
                                                    foreach ($value->review as $rev => $revw) {
                                                    $ratingSum += $revw->rating;

                                                    if ($revw->rating == 1) {$num1 += 1;} elseif ($revw->rating == 2) {$num2 += 1;} elseif ($revw->rating == 3) {$num3 += 1;} elseif ($revw->rating == 4) {$num4 += 1;} elseif ($revw->rating == 5) {$num5 += 1;}
                                                    }
                                                     $avg = $ratingSum / count($value->review);
                                            }  ?>
                                        <div class="">
                                            <div class="row m0">
                                                <div class="push  col m5">
                                                    <div class="rating">
                                                        <div class="title">
                                                            Rating Distribution
                                                            <?php echo (!empty($value->review))?count($value->review):''; ?>
                                                            reviews
                                                        </div>

                                                        <div class="score">
                                                            <div class="average-score">
                                                                <p class="numb">
                                                                    <?php echo (!empty($avg))?round($avg, 1):''; ?></p>
                                                            </div>
                                                            <div class="queue">

                                                                <?php

                                                            for ($i = 0; $i < 5; $i++) {

                                                                (!empty($avg))?$avg:$avg=''; 


                                                                if ($i < round($avg, 0, PHP_ROUND_HALF_DOWN)) {
                                                                $startCheck = ' ratingStar';
                                                                } else { 
                                                                $startCheck = '';
                                                                }
                                                                echo ' <i class="fa fa-star avg-start ' . $startCheck . '" aria-hidden="true"></i>';
                                                            }
                                                            ?>

                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>

                                                        <ul class="queue-box">
                                                            <li class="five-star">
                                                                <span>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                </span>
                                                                <span
                                                                    class="start-count"><?php echo (!empty($num5))?$num5:'0' ?></span>
                                                                <span class="start-progress">
                                                                    <span class="start-bar"
                                                                        style="width: <?php echo (!empty($value->review))?(($num5 / count($value->review)) * 100):'';  ?>%"></span>
                                                                </span>
                                                            </li>
                                                            <li class="four-star">
                                                                <span>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </span>
                                                                <span
                                                                    class="start-count"><?php echo (!empty($num4))?$num4:'0' ?></span>
                                                                <span class="start-progress">
                                                                    <span class="start-bar"
                                                                        style="width:<?php echo (!empty($value->review))?(($num4 / count($value->review)) * 100):'';  ?>%"></span>
                                                                </span>
                                                            </li>
                                                            <li class="three-star">
                                                                <span>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </span>
                                                                <span
                                                                    class="start-count"><?php echo (!empty($num3))?$num3:'0' ?></span>
                                                                <span class="start-progress">
                                                                    <span class="start-bar"
                                                                        style="width:<?php echo (!empty($value->review))?(($num3 / count($value->review)) * 100):'';  ?>%"></span>
                                                                </span>

                                                            </li>
                                                            <li class="two-star">
                                                                <span>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </span>
                                                                <span
                                                                    class="start-count"><?php echo (!empty($num2))?$num2:'0' ?></span>
                                                                <span class="start-progress">
                                                                    <span class="start-bar"
                                                                        style="width:<?php echo (!empty($value->review))?(($num2 / count($value->review)) * 100):'';  ?>%"></span>


                                                                </span>
                                                            </li>
                                                            <li class="one-star">
                                                                <span>
                                                                    <i class="fa fa-star ratingStar"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </span>
                                                                <span
                                                                    class="start-count"><?php echo (!empty($num1))?$num1:'0' ?></span>
                                                                <span class="start-progress">
                                                                    <span class="start-bar"
                                                                        style="width:<?php echo (!empty($value->review))?(($num1 / count($value->review)) * 100):'';  ?>%"></span>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.rating -->

                                                </div><!-- /.col-md-6 -->

                                                <div class="col m7">
                                                    <ul class="review-list">


                                                        <?php 
                                                        $totalrate = 1;
                                                        $ustags = '';
                                                        if(!empty($value->userReview)){
                                                            $totalrate += 1;
                                                            $usrate = '';
                                                            for ($i = 0; $i < 5; $i++) {
                                                                if ($i < $value->userReview->rating){ $startCheck = ' ratingStar'; }else { $startCheck = ''; }
                                                                    $usrate    .=  '<i class="fa fa-star avg-start ' . $startCheck . '" aria-hidden="true"></i>';    
                                                            }
                                                            $usname         = (!empty($value->userReview->user_name))?$value->userReview->user_name:'---';
                                                            $usdate         = (!empty($value->userReview->added_date))?date("M d, Y ", strtotime($value->userReview->added_date)):'---';
                                                            $proffesional   = (!empty($value->userReview->proffesional))?'Professionalism &nbsp;&nbsp;':'';  
                                                            $quality        =(!empty($value->userReview->quality))?'Quality of Work &nbsp;&nbsp;':''; 
                                                            $money          =(!empty($value->userReview->money))?'  Value For Money &nbsp;&nbsp;':''; 
                                                            $service        =(!empty($value->userReview->service))?'  On Time Service &nbsp;&nbsp;':''; 
                                                            $experience     =(!empty($value->userReview->experience))?'  Higly Experienced &nbsp;&nbsp;':'';
                                                            $ustags         = $proffesional.$quality.$money.$service.$experience;
                                                            $usreview       = $value->userReview->review;
                                                            $ustrate        = $value->userReview->rating;
                                                            echo '
                                                                <li>
                                                                    <div class="review-edit"><a class="waves-effect waves-teal btn-flat right" href="#vendor-rating" @click="editRating"><i class="material-icons tiny left">edit</i> Edit</a></div>
                                                                    <div class="review-metadata">
                                                                        <div class="queue">'.$usrate.'</div>
                                                                        <div class="name">'.$usname.' : '.$usdate.'</div>
                                                                    </div>

                                                                    <div class="review-content">
                                                                        <div class="ntg">
                                                                            <span class="">'.$ustags.'</span>
                                                                            <p>'.$usreview.'</p>
                                                                        <div>
                                                                    </div>
                                                                </li>
                                                            ';
                                                            
                                                        }



                                                            if ($value->review) { 
                                                                foreach ($value->review as $revs => $revsw) 
                                                                { 
                                                                    if($this->session->userdata('shdid') != $revsw->user_id)
                                                                    {
                                                        ?>
                                                        <li v-if="reviewcount >=  <?php echo $revs +  $totalrate ?>">
                                                            <div class="review-metadata">

                                                                <div class="queue">
                                                                    <?php 
                                                                        for ($i = 0; $i < 5; $i++) {
                                                                        if ($i < $revsw->rating) {
                                                                            $startCheck = ' ratingStar';
                                                                        } else {
                                                                            $startCheck = '';
                                                                        }
                                                                            echo ' <i class="fa fa-star avg-start ' . $startCheck . '" aria-hidden="true"></i>';
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="name">
                                                                    <?php echo (!empty($revsw->user_name))?$revsw->user_name:'---'; ?>
                                                                    : <span>
                                                                        <?php echo (!empty($revsw->added_date))?date("M d, Y ", strtotime($revsw->added_date)):'---'; ?></span>
                                                                </div>
                                                            </div><!-- /.review-metadata -->
                                                            <div class="review-content">
                                                                <div class="ntg">
                                                                    <span
                                                                        class=""><?php echo (!empty($revsw->proffesional))?'Professionalism &nbsp;&nbsp;':''; ?><?php echo (!empty($revsw->quality))?'Quality of Work &nbsp;&nbsp;':''; ?><?php echo (!empty($revsw->money))?'  Value For Money &nbsp;&nbsp;':''; ?><?php echo (!empty($revsw->service))?'  On Time Service &nbsp;&nbsp;':''; ?><?php echo (!empty($revsw->experience))?'  Higly Experienced &nbsp;&nbsp;':''; ?></span>
                                                                </div>
                                                                <p>
                                                                    <?php echo $revsw->review; ?>
                                                                </p>
                                                            </div><!-- /.review-content -->
                                                        </li>
                                                        <?php   } }  }?>







                                                    </ul><!-- /.review-list -->
                                                    <button @click="morereview"
                                                        v-if="<?php echo $revs + 1 ?> > 3 && reviewcount < 4"
                                                        class="waves-effect waves-light btn red plr30 accent-4 white-text">View
                                                        More</button>
                                                </div><!-- /.col-md-12 -->
                                            </div>



                                        </div>

                                        <?php } ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <?php   if (!empty($value->similar)) { ?>
        <section style="background: #fff; padding: 30px 0;">
            <div class="container-fluide">
                <div class="row">
                    <div class="col 12 m6">
                        <h4 class="m0">Similar Vendors</h4>
                    </div>
                    <div class="col 12 m6 right-align">
                        <?php if(count($value->similar) > 4){ ?>
                        <a href="<?php echo base_url('vendors/'.str_replace(" ","-",strtolower($value->city)).'/'.str_replace(" ","-",strtolower($value->category))) ?>"
                            class="similar-more"> View All</a>
                        <?php } ?>
                    </div>
                </div>


                <div class="col s12 m12 l12">
                    <div class="row  result-item-box">



                        <?php  foreach ($value->similar as $sim => $simi) { 
                                
                                ?>
                        <div class="col s6 m4 l3">
                            <div class="result-items hoverable">
                                <div class="card z-depth-0">
                                    <a href="<?php echo base_url('detail/'.str_replace(" ","-",strtolower($simi->category)).'/'.urlencode(str_replace(" ","-",strtolower($simi->name))).'/'.$simi->uniq)?>"
                                        target="_blank">
                                        <div class="card-image">
                                            <img
                                                src="<?php echo (!empty($simi->profile_file))?base_url().$simi->profile_file:'' ?>">
                                        </div>
                                        <div class="card-content simil-crd">
                                            <div class="row m0">
                                                <div class="col s12 m6">
                                                    <p class="m0 r-crd-title tit">
                                                        <?php echo (!empty($simi->name))?$simi->name:'' ?></p>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="col s12 m5">
                                                    <p class="m0 r-crd-location">
                                                        <?php echo (!empty($simi->city))?$simi->city:'' ?></p>
                                                </div>

                                                <div class="col s12 m7">
                                                    <p class="m0 r-crd-price"><?php
                                                    $amount = (!empty($simi->price))?$simi->price:'';
                                                    $num =$amount;
                                                    $explrestunits ='';
                                                    if(strlen($num)>3){
                                                    $lastthree = substr($num, strlen($num)-3, strlen($num));
                                                    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
                                                    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
                                                    $expunit = str_split($restunits, 2);
                                                    for($i=0; $i < sizeof($expunit);  $i++){
                                                    // creates each of the 2's group and adds a comma to the end
                                                    if($i==0)
                                                    {
                                                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                                                    }else{
                                                    $explrestunits .= $expunit[$i].",";
                                                    }
                                                    }
                                                    $thecash = $explrestunits.$lastthree;
                                                    } else {
                                                    $thecash = $num;
                                                    }
                                                    echo (!empty($thecash))?'&#8377; '.$thecash:''; echo (!empty($value->price_for))?'&nbsp'.$value->price_for:' Per day'; ?></p>
                                                </div>
                                                <div class="cdivider hide-on-small-only"></div>
                                                <div class="col s12 m6 hide-on-small-only">
                                                    <p class=" r-crd-category"><?php echo $simi->category ?></p>
                                                </div>
                                                <div class="col s12 m6 hide-on-small-only">
                                                    <p class="m0 r-crd-ratings right"> <?php echo $this->ci->m_search->countReview($value->id).' Reviews' ?><span class="c-badge green"><i
                                                                class="material-icons">star</i> <?php echo $this->ci->m_search->avgrating($value->id) ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php   } } ?>
                    </div>
                </div>
            </div>

        </section>



        <?php } } ?>





        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vue-easy-lightbox.umd.min.js"></script>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>


    <script>
    <?php $this->load->view('includes/message'); ?>
    </script>

    <script>
    Vue.component('star-rating', VueStarRating.default);
    var app = new Vue({
        el: '#app',
        data: {
            isShow: true,
            visible: false,
            favcol: false,
            vndr_id: '',
            rev_rating: '',
            ar: '1',
            imgs: [],
            email: '',
            emailError: '',
            count: '',
            reviewcount: 3,
            videocount: 3,
            useriview: {
                professionalism: false,
                qualityofWork: false,
                onTimeService: false,
                valueOfMoney: false,
                highlyExperiencw: false,
                review: '',
            },
        },



        methods: {
            // more review view
            morereview() {
                this.reviewcount = 1000;
            },
            // more review view
            morevideo() {
                this.videocount = 1000;
            },
            // edite Review
            editRating() {

                this.useriview.professionalism = '<?php echo  (!empty($proffesional))?'1':''?>';
                this.useriview.qualityofWork = '<?php echo   (!empty($quality)) ? ' 1 ' : ' ' ?>';
                this.useriview.onTimeService = '<?php echo   (!empty($service)) ? ' 1 ' : ' ' ?>';
                this.useriview.valueOfMoney = '<?php echo   (!empty($money)) ? ' 1 ' : ' ' ?>';
                this.useriview.highlyExperiencw = '<?php echo   (!empty($experience)) ? ' ' : ' ' ?>';
                this.useriview.review = '<?php echo  (!empty($usreview))?$usreview:' '; ?>';
                this.ar = '<?php echo  (!empty($ustrate))?$ustrate:' '; ?>';
                this.$refs.tsarea.focus()
            },
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
            },
            showImg(index) {
                this.index = index
                this.visible = true
            },
            handleHide() {
                this.visible = false
            },
            // rating
            setRating: function(rating) {
                this.rating = "You have Selected: " + rating + " stars";
            },
            showCurrentRating: function(rating) {
                this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " +
                    rating + " stars"
            },
            setCurrentSelectedRating: function(rating) {
                this.currentSelectedRating = "You have Selected: " + rating + " stars";
            },
            loadMore() {
                const formData = new FormData();
                formData.append('vndr_id', this.$refs.myTestField.value);
                axios.post('<?php echo base_url() ?>detail/full-gallery', formData)
                    .then(response => {
                        if (response.data != '') {
                            this.imgs = response.data;
                        }
                    })
                    .catch(error => {
                        console.log(response);

                    })
            },
            getData: function() {
                const formData = new FormData();
                formData.append('vndr_id', this.$refs.myTestField.value);
                axios.post('<?php echo base_url() ?>detail/gallery', formData)
                    .then(response => {
                        if (response.data != '') {
                            this.imgs = response.data;
                        }
                    })
                    .catch(error => {
                        console.log(response);

                    })

            },

            checkForm() {
                if ((this.ar <= '3')) {
                    if (confirm('Do you really want to review this vendor with ' + this.ar + ' rating')) {
                        this.$refs.reviewForm.submit()
                    }
                } else {
                    this.$refs.reviewForm.submit()
                }
            },

            getCount: function() {
                const formData = new FormData();
                formData.append('vndr_id', this.$refs.myTestField.value);
                axios.post('<?php echo base_url() ?>details/gallery-count', formData)
                    .then(response => {
                        if (response.data != '') {
                            this.count = response.data;
                        }
                    })
                    .catch(error => {
                        console.log(response);

                    })

            },

            onFocus() {
                axios.post('<?php echo base_url() ?>review/session-check')
                    .then(response => {
                        if (response.data == '') {
                            window.location.href = "<?php echo base_url('login') ?>";
                        }
                        this.rev_rating = this.ar;
                    })
                    .catch(error => {})
            },
            favourite() {
                const formData = new FormData();
                formData.append('vndr_id', this.$refs.myTestField.value);
                axios.post('<?php echo base_url() ?>make-favourite', formData)
                    .then(response => {
                        if (response.data == '5') {
                            window.location.href = "<?php echo base_url('login') ?>";;
                        } else if (response.data == '0') {
                            this.favcol = false;
                        } else if (response.data == '1') {
                            this.favcol = true;
                        }
                    })
                    .catch(error => {
                        console.log(response);

                    })

            },
            getfavourite() {
                const formData = new FormData();
                formData.append('vndr_id', this.$refs.myTestField.value);
                axios.post('<?php echo base_url() ?>get-favourite', formData)
                    .then(response => {
                        if (response.data == '5') {
                            window.location.href = "<?php echo base_url('login') ?>";;
                        } else if (response.data == '0') {
                            this.favcol = false;
                        } else if (response.data == '1') {
                            this.favcol = true;
                        }
                    })
                    .catch(error => {
                        console.log(response);

                    })

            }
        },
        mounted: function() {
            this.getData();
            this.getfavourite();
            this.getCount();


        }
    });

    focusMethod = function getFocus() {
        document.getElementById("name").focus();
    }

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, {
            direction: 'buttom',
            // hoverEnabled: false
        });


        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format: 'yyyy-mm-dd',
        });

        var scrolls = document.querySelectorAll('.scrollspy');
        var instances = M.ScrollSpy.init(scrolls);
    });
    </script>

</body>

</html>