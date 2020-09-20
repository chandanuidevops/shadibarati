<?php  $this->ci =& get_instance();
$this->load->model('m_search');
$this->load->model('m_vendors');
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    $m_titl = '';
    $m_descp = '';
    $m_key = '';
    $m_can = '';
    if (!empty($content)) {
    $m_titl     = (!empty($content->title))?$content->title:'';
    $m_descp    = (!empty($content->meta_desc))?$content->meta_desc:'';
    $m_key      = (!empty($content->keywords))?$content->keywords:'';
    $m_can      = (!empty($content->canoncial))?$content->canoncial:'';
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <style>
        strong {
        font-weight: 600;
        }
        
        .preloader {
        display: none;
        }
        
        .main {
        position: absolute;
        width: 100%;
        top: 0px;
        background: rgba(0, 0, 0, 0);
        z-index: 2;
        }
        .banner-slider {
        max-height:310px;
        min-height:310px;
        overflow: hidden;
        }
        @media screen and (min-width: 1400px) {
        .banner-slider {
        max-height:350px;
        min-height:350px;
        overflow: hidden;
        }
        }
        
        @media (max-width:991px) {
        .banner-slider {
        max-height:180px;
        min-height:180px;
        overflow: hidden;
        }
        .slick-slide img {
        width: auto;
        }
        .vend-head {
        font-size: 15px !important;
        }
        }
        
        @media (max-width:600px) {
        .main {
        top: 0px;
        }
        .banner-slider {
        max-height: 229px;
        /* height: 246px; */
        min-height: 84px;
        overflow: hidden;
        }
        .slick-slide img {
        width: auto;
        }
        }
        .vend-head {
        margin-top: 0;
        font-size: 22px;
        font-weight: 600;
        padding-left: 10px;
        }
        .result-heads.imgres{
        background-size: cover;
        }
        .result-heads.imgres .slick-slide img{
        width: 100%;
        }
        
        
        .material-tooltip {
        /* top: 1236.68px !important; */
        background-color: #3498db;
        }
        #modal1 {
        top: 20% !important;
        }
        </style>
    </head>
    <body>
        <?php if(!empty($banner)){
        foreach($banner as $ban => $bans){
        //  echo $back = strtolower($bans->city).'<br>';
        // echo $back1 = strtolower(str_replace("-"," ",$this->uri->segment(2))).'<br>1';
        if((strtolower($bans->city) == strtolower(str_replace("-"," ",$this->uri->segment(2)))) && (str_replace(" ","-",strtolower($bans->category)) == $this->uri->segment(3))  ){
        $back ='1'.'<br>';
        
        ?>
        <?php }}}?>
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <div id="app">
            <!-- body  -->
            <!-- <section class="result-head" style="background-image:url(<?php echo $this->m_vendors->bannimage(ucwords(str_replace("-"," ",$this->uri->segment(3)))); ?>)">
                <div class="center-align container" >
                    <div class="row m0">
                        <div id="searchble-container" class="row m0">
                            <h4 class="white-text">India's Most Trusted Online Wedding Market</h4>
                            <form action="<?php echo base_url()?>vendors" method="post" id="search-form">
                                <div class="col s12 m10 push-m1 l8 push-l2 mb10">
                                    <input type="search" autocomplete="off" placeholder="Search vendor..." name="vendor"
                                    v-on:keyup="vendorcheck" v-model="vendor" id="search-vend">
                                <ul class="sg-box" :class="{'visible': visible }" v-html="autocomplete"></ul>
                                <div class="preloader" :class="{'previsible': previsible }">
                                    <div class="preloader-wrapper big active" id="prelod">
                                        <div class="spinner-layer spinner-blue">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="gap-patch">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                        <div class="spinner-layer spinner-red">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="gap-patch">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                        <div class="spinner-layer spinner-yellow">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="gap-patch">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                        <div class="spinner-layer spinner-green">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="gap-patch">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m8 push-m2 l8 push-l2" class="serch-select">
                                <div class="col s12 m6 ">
                                    <select name="ct" class="select-search" id="sel-cato">
                                        <option value="">All Categories</option>
                                        <?php
                                        if (!empty(vendor_category())) {
                                        foreach (vendor_category() as $categorys => $categories) { ?>
                                        <option <?php echo (ucwords(str_replace("-"," ",$this->uri->segment(3))) == $categories->category)?'selected':''; ?> value="<?php echo $categories->category ?>" > <?php echo (!empty($categories->category))?$categories->category:''; ?> </option>
                                        <?php   } } ?>
                                    </select>
                                </div>
                                <div class="col s12 m6">
                                    <select name="q" id="sel-city">
                                        <option value="">All Cities</option>
                                        <?php if (!empty(cities())) {foreach (cities() as $citys => $cities) { ?>
                                        <option <?php echo (strtolower(str_replace("-"," ",$this->uri->segment(2))) == strtolower($cities->city))?'selected':''; ?> value="<?php echo $cities->city ?>" > <?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                        <?php   } } ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="pb-0">
            <div class="result-heads imgres" style="background-image:url(<?php echo
                $this->m_vendors->bannimage(ucwords(str_replace("-"," ",$this->uri->segment(3))));
                ?>);">
                <div class="banner-slider">
                    <?php if(!empty($banner)){
                    foreach($banner as $ban => $bans){
                    if((strtolower($bans->city) == strtolower(str_replace("-"," ",$this->uri->segment(2)))) && (str_replace(" ","-",strtolower($bans->category)) == $this->uri->segment(3))  ){
                    $back ='1';
                    ?>
                    <div>
                        <img src="<?php echo base_url($bans->image) ?>" class="img-responsive" alt="">
                    </div>
                    <?php }}}?>
                </div>
                <!-- <div class="row m0 search-in">
                    <h4 class="white-text">India's Most Trusted Online Wedding Market</h4>
                </div> -->
                <?php
                
                ?>
            </div>
        </section>
        <section class="search-for">
            <div class="container-fluide">
                <div class="row m0">
                    <div class="col l12 s12 m12">
                        <div class="vendor-search vender-he">
                            <form action="<?php echo base_url()?>vendors" method="post" id="search-form">
                                <div class="row m0">
                                    <div class="col s12 m6 l6 ">
                                        <div class="kill">
                                            <input type="search" autocomplete="off" placeholder="Search vendor..." name="vendor" v-on:keyup="vendorcheck" v-model="vendor" id="search-vend">
                                            
                                        <ul class="sg-box" :class="{'visible': visible }" v-html="autocomplete"></ul>
                                    </div>
                                    <div class="preloader" :class="{'previsible': previsible }">
                                        <div class="preloader-wrapper big active" id="prelod">
                                            <div class="spinner-layer spinner-blue">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                            <div class="spinner-layer spinner-red">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                            <div class="spinner-layer spinner-yellow">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                            <div class="spinner-layer spinner-green">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col l3 s12 m3">
                                    <select name="ct" class="select-search" id="sel-cato">
                                        <option value="">All Categories</option>
                                        <?php if (!empty(vendor_category())) {
                                        foreach (vendor_category() as $categorys => $categories) { ?>
                                        <option <?php echo (ucwords(str_replace("-"," ",$this->uri->segment(3))) == $categories->category)?'selected':''; ?> value="<?php echo $categories->category ?>" > <?php echo (!empty($categories->category))?$categories->category:''; ?> </option>
                                        <?php   } } ?>
                                    </select>
                                </div>
                                <div class="col l3 s12 m3">
                                    <select name="q" id="sel-city">
                                        <option value="">All Cities</option>
                                        <?php if (!empty(cities())) {foreach (cities() as $citys => $cities) { ?>
                                        <option <?php echo (strtolower(str_replace("-"," ",$this->uri->segment(2))) == strtolower(str_replace("-"," ",$cities->city)))?'selected':''; ?> value="<?php echo $cities->city ?>" > <?php echo (!empty($cities->city))?$cities->city:''; ?></option>
                                        <?php   } } ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php if (empty($vendors)) { ?>
    <section class="no-result">
        <div class="col l12">
            <center>
            <img src="<?php echo base_url('assets/img/no-result.png') ?>" alt="">
            </center>
        </div>
    </section>
    <?php }else{?>
    <section class="result-body">
        <div class="container-2">
            <div class="row m0">
                <!-- left menu -->
                <!-- <div class="col s12 m4 l3">
                    <a @click="isFilter = !isFilter"
                        class="btn-floating btn filter-btn waves-effect waves-light red accent-4 hide-on-med-and-up"><i
                    class="material-icons">filter_list</i></a>
                    <div class="filter-container" v-if="isFilter">
                        <div class="filter-header">
                            <span><i class="material-icons">filter_list</i></span>
                            <span>Filter by Your Choice</span>
                            <span class="right center-align hide-on-med-and-up  waves-effect waves-red"
                                @click="isFilter = !isFilter">
                                <i class="material-icons">close</i>
                            </span>
                        </div>
                        <div class="filter-divider"></div>
                        -->
                        <!-- locality -->
                        <!-- <div class="filter-sub-head" >
                            <span >Locality</span>
                            <span class="right  waves-effect waves-red" @click="isShow = !isShow">
                                <i class="material-icons" v-if="isShow">remove</i>
                                <i class="material-icons" v-if="!isShow">add</i>
                            </span>
                        </div>
                        <transition name="slide" >
                            <div class="filter-item" v-if="isShow">
                                <ul class="chekbox-item">
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </transition> -->
                        <!-- days -->
                        <!-- <div class="filter-sub-head">
                            <span >No of Days</span>
                            <span class="right  waves-effect waves-red" @click="isDay = !isDay">
                                <i class="material-icons" v-if="isDay">remove</i>
                                <i class="material-icons" v-if="!isDay">add</i>
                            </span>
                        </div>
                        <transition name="slide">
                            <div class="filter-item" v-if="isDay">
                                <ul class="chekbox-item">
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="filled-in"  />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </transition> -->
                        <!-- Budget -->
                        <!-- <div class="filter-sub-head">
                            <span>Budget</span>
                            <span class="right  waves-effect waves-red" @click="isbudget = !isbudget">
                                <i class="material-icons" v-if="isbudget">remove</i>
                                <i class="material-icons" v-if="!isbudget">add</i>
                            </span>
                        </div>
                        <transition name="slide">
                            <div class="filter-item" v-if="isbudget">
                                <ul class="chekbox-item">
                                    <li>
                                        <label>
                                            <input type="checkbox" name="budget" class="filled-in" value="1000" />
                                            <span>1000</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="budget" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="budget" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="budget" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="budget" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </transition> -->
                        <!-- ratings -->
                        <!-- <div class="filter-sub-head">
                            <span>Average ratings</span>
                            <span class="right  waves-effect waves-red" @click="isAvg = !isAvg">
                                <i class="material-icons" v-if="isAvg">remove</i>
                                <i class="material-icons" v-if="!isAvg">add</i>
                            </span>
                        </div>
                        <transition name="slide">
                            <div class="filter-item" v-if="isAvg">
                                <ul class="chekbox-item">
                                    <li>
                                        <label>
                                            <input type="checkbox" name="rating" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="rating" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="rating" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="rating" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="rating" class="filled-in" />
                                            <span>Filled in</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </transition> -->
                    <!-- </div>
                </div> -->
                <!-- end left menu -->
                <div class="col s12 m12 l12">
                    <div class="row  result-item-box">
                        <h1 class="vend-head"><?php
                        $cts = $this->uri->segment(2);
                        if ($cts == 'all') {
                            $cts = 'India';
                        }else if ($cts == 'delhi-ncr'){
                        $cts = 'Delhi NCR';
                        }
                        echo ucwords(str_replace("-", " ", $this->uri->segment(3))).'&nbsp;in&nbsp;'.ucwords(str_replace("-", " ",$cts));
                        ?></h1>
                        <?php if (!empty($vendors)) {
                        
                        $lableImg = '<img src="'.base_url().'assets/img/lable.png" class="v-lable-image" />';
                        foreach ($vendors as $key => $value) {
                        $pack = $this->ci->m_search->packageName($value->package);
                        if (empty($pack) || empty($value->discount_status)) {
                        $pack = 'Free Listing';
                        }
                        $lable_class = strtolower(str_replace(' ', '-', $pack));
                        
                        ?>
                        <div class="col s12 m6 l3 result-items-cols">
                            <div class="result-items hoverable">
                                <div class="card z-depth-0">
                                    <a href="<?php echo base_url(str_replace(" ","-",strtolower(!empty($value->category)?$value->category:'all-category')).'/'.str_replace(" ","-",strtolower(!empty($value->city)?$value->city:'all')).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq)?>" target="_blank">
                                        <div class="card-image">
                                            <span class="v-lable <?php echo $lable_class ?>"><?php echo $lableImg . $pack ?></span>
                                            <img src="<?php echo (!empty($value->profile_file))? base_url().$value->profile_file:'' ?>">
                                        </div>
                                        <div class="card-content">
                                            <div class="row m0">
                                                <div class="col s12 m12">
                                                    <p class="m0 r-crd-title tit">
                                                        <span class="res-tit"><?php echo (!empty($value->name))?character_limiter($value->name, 30):''; ?></span>
                                                        <span class="ver-icn"><?php echo (!empty($value->verified))?'&nbsp;<img class="tooltipped" data-position="bottom" data-tooltip="Address & Background Verified By Shaadi Baraati" src="'.base_url('assets/img/verified.svg').'" alt="">':''; ?></span>
                                                    </p>
                                                    
                                                </div>
                                                <div class="col s12 m5">
                                                    <p class="m0 r-crd-location">
                                                        <?php echo (!empty($value->city))?$value->city:'' ?>
                                                    </p>
                                                </div>
                                                <div class="col s12 m7">
                                                    <p class="m0 r-crd-price">
                                                        <?php
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
                                                        echo (!empty($thecash))?'&#8377; '.$thecash:''; echo (!empty($value->price_for))?'&nbsp'.$value->price_for:' Per day'; ?>
                                                    </p>
                                                </div>
                                                <?php
                                                if (!empty($value->v_chat)) { ?>
                                                <div class="col s12 m12">
                                                    <p class="m0 meet-avail">
                                                        <a class="modal-trigger" href="#modal1">
                                                            <i class="material-icons"> videocam </i>
                                                            Available for Video Call
                                                        </a>
                                                    </p>
                                                </div>
                                                <?php }else{ ?>
                                                <div class="col s12 m12">
                                                    <p class="m0 meet-avail">
                                                        <br>
                                                    </p>
                                                </div>
                                                <?php } ?>
                                                
                                                
                                                <div class="cdivider "></div>
                                                <div class="col s6 m6 ">
                                                    <p class=" r-crd-category">
                                                        <?php echo $value->category ?>
                                                    </p>
                                                </div>
                                                <div class="col s6 m6 ">
                                                    <p class="m0 r-crd-ratings">
                                                        <?php echo $this->ci->m_search->countReview($value->id) ?> reviews <span class="c-badge green"><i
                                                        class="material-icons">star</i> <?php echo $this->ci->m_search->avgrating($value->id) ?> </span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="modal1" class="modal meeting-modal">
                                <div class="modal-content">
                                    <div class="meet-top">
                                        <h4 class="avail-tit"><span class="material-icons"> voice_chat </span>   Available for Video Call</h4>
                                        <p>You can have a video call with this Vendor & discuss your details in Safe Environment.</p>
                                    </div>
                                    <div class="meet-bottom">
                                        <p><b>Available for video call on:</b></p>
                                        <ul>
                                            <li>Google Meet/Hangouts</li>
                                            <li>WhatsApp Call</li>
                                            <li>Google Duo</li>
                                        </ul>
                                        <p>You will receive all details once you request <b>'Quotation'</b> or <b>'Contact Details'</b> of this Vendor.</p>
                                        <h6 class="center-align">Doubtful because of COVID-19? We are here to help you!</h6>
                                        <p>WhatsApp/Call with your personal Wedding Planning Expert – Now @ +91 8431282823
                                            Tell us your doubts, requirements, budget and get best recommendations
                                            Get the best deal in your budget and plan!
                                        </p>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <?php   } } ?>
                        </div>
                        <div class="row m0">
                            <div class="col s12">
                                <?php echo (!empty($pagelink))?$pagelink: '' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <?php
        if (!empty($content->key1) || !empty($content->key2) || !empty($content->key3) || !empty($content->key4) || !empty($content->key5)) { ?>
        <section class="result-body rel-seo">
            <div class="container-2">
                <div class="row m0">
                    <div class="col l12 m12 s12">
                        <h2 class="rel-heading">Related Search</h2>
                        <ul>
                            <li><a target="_blank" href=""><?php echo (!empty($content->key1))?$content->key1:''; ?></a></li>
                            <li><a target="_blank" href=""><?php echo (!empty($content->key2))?$content->key2:''; ?></a></li>
                            <li><a target="_blank" href=""><?php echo (!empty($content->key3))?$content->key3:''; ?></a></li>
                            <li><a target="_blank" href=""><?php echo (!empty($content->key4))?$content->key4:''; ?></a></li>
                            <li><a target="_blank" href=""><?php echo (!empty($content->key5))?$content->key5:''; ?></a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <?php    }
        if (!empty($content->description)) { ?>
        <section class="result-body conts p0" style="border-top: 1px solid #e3e3e3;">
            <div class="container-2">
                <div class="row m0">
                    <div class="col l11 m12 s12">
                        <?php echo (!empty($content->description))?$content->description:''; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>

        <?php if (!empty($foot)) { ?>
        <section class="sec-footer">
            <div class="container-fluide">
                <div class="row">
                    <div class="col l4">
                        <div class="list-foot vl">
                            <h6>By Vendor Type</h6>
                            <div class="line"></div>
                            <ul>
                                <?php if (!empty($foot)) {
                                foreach ($foot as $fot1 => $fot1s) {
                                if ($fot1s->seggregation ==1) {?>
                                <li><a target="_blank"  class="hov-a" href=""><?php echo (!empty($fot1s->type))?$fot1s->type:'';  ?></a></li>
                                <?php }} } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col l4">
                        <div class="list-foot vl">
                            <h6>Vendor Categories in <?php echo (!empty($value->city))?$value->city:''; ?></h6>
                            <div class="line"></div>
                            <ul>
                                <?php if (!empty($foot)) {
                                foreach ($foot as $fotkey => $fotvalue) { if ($fotvalue->seggregation ==2) {?>
                                <li><a target="_blank" class="hov-a" href="<?php echo base_url('vendors/').str_replace(" ","-",strtolower($value->city)).'/'.str_replace(" ","-",strtolower($fotvalue->vendor_category) ) ?>"><?php echo (!empty($fotvalue->vendor_category))?$fotvalue->vendor_category:'';  ?></a></li>
                                <?php }} } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col l4">
                        <div class="list-foot vl">
                            <h6>Popular Vendors</h6>
                            <div class="line"></div>
                            <ul>
                                <?php if (!empty($foot)) {
                                foreach ($foot as $fotkey1 => $fotvalue1) { if ($fotvalue1->seggregation ==3) { ?>
                                <li><a class="hov-a" target="_blank" href="<?php echo (!empty($fotvalue1->link))?$fotvalue1->link:''; ?>"><?php echo (!empty($fotvalue1->popular))?$fotvalue1->popular:'';  ?></a></li>
                                <?php } } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slimselect.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>
    <script>
    <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
    var app = new Vue({
    el: '#app',
    data: {
    listItem: '',
    isShow: true,
    isDay: true,
    isbudget: true,
    isAvg: true,
    isFilter: true,
    autocomplete: '',
    vendor: '',
    visible: false,
    previsible: false,
    email: '',
    emailError: '',
    },
    created() {
    window.addEventListener('resize', this.handleResize)
    this.handleResize();
    },
    mounted() {
    new SlimSelect({
    select: '#sel-cato'
    });
    new SlimSelect({
    select: '#sel-city'
    });
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
    },
    handleResize() {
    if (window.innerWidth <= 600) {
    this.isFilter = false;
    }
    },
    vendorcheck() {
    this.autocomplete = '';
    this.visible = true;
    this.previsible = true;
    const formData = new FormData();
    formData.append('vendor', this.vendor);
    axios.post('<?php echo base_url() ?>search/vendorcheck', formData)
    .then(response => {
    if (response.data != '') {
    this.previsible = false;
    this.autocomplete = response.data;
    } else {
    this.previsible = false;
    this.autocomplete = '';
    }
    })
    .catch(error => {
    this.previsible = false;
    if (error.response) {
    this.errormsg = error.response.data.error;
    }
    })
    }
    },
    });
    </script>
    <script>
    // search in reasult page
    $(document).ready(function() {
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
    $("#search-form").submit();
    });
    $('.tooltipped').tooltip();
    $('html').click(function() {
    // $('.sg-box').hide();
    $(".sg-box").removeClass("visible");
    })
    $('.sg-box').click(function(e) {
    e.stopPropagation();
    });
    $('#search-vend').keyup(function() {
    $(".sg-box").addClass("visible");
    })
    });
    </script>
    <script>
    $('.banner-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 2000,
    arrows: true,
    dots: false,
    prevArrow: '<span class="material-icons larr">keyboard_arrow_left</span>',
    nextArrow: '<span class="material-icons rarr">keyboard_arrow_right</span>',
    });
    </script>
</body>
</html>