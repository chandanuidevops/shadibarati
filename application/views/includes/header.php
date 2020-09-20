<?php $logo = base_url().'assets/img/logo.png'; ?>
<div class="logo-brand">
    <a href="<?php echo base_url()?>"><img src="<?php echo $logo ?>" class="img-responsive" alt=""></a>
</div>

<div class="">
    <nav class="z-depth-1 nav-head">
        <div class="nav-wrapper white topbar1">
            <div class="to-innr">
                <a href="<?php echo base_url('free-quote') ?>" target="_blank" class=" white-text">&nbsp; Get a Free quote &nbsp;</a>
                <span class="white-text">| </span>
                <span class="white-text">Toll Free: <a href="tel:18004199456">1800 4199 456</a></span>

                <ul class="right ul-social">
                    <li><a href="https://www.facebook.com/shaadibaraatiofficial" target="_blank">
                        <i class="fab fa-facebook socil-icon"></i></a></li>
                    <li><a href="https://www.twitter.com/shaadibaraati" target="_blank">
                        <i class="fab fa-twitter socil-icon"></i>
                    </a></li>
                    <li><a href="https://www.youtube.com/channel/UCdFxvtsmbh2mUrIGE5d7Txg" target="_blank">
                        <i class="fab fa-youtube socil-icon"></i></a></li>
                    <li><a href="https://www.instagram.com/shaadibaraatiofficial/" target="_blank"><i class="fab fa-instagram socil-icon"></i></a></li>
                </ul>
                <a href="<?php echo base_url('wedding-enquiry') ?>" target="_blank" class="right white-text">&nbsp; Hire Best Wedding Vendors &nbsp; &nbsp; &nbsp;</a>
            </div>


        </div>

        <div class="nav-wrapper white" id="myHeader">
            <a href="<?php echo base_url()?>"><img src="<?php echo $logo ?>" class="img-responsive brand-logo" alt=""></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i
                        class="material-icons">menu</i></a>
            <div class="right hide-on-med-and-down header-ul ">
                <ul>
                    <li><a href="<?php echo base_url()?>">HOME</a></li>
                    <li><a class="dropdown-trigger" href="<?php echo base_url('vendors')?>" data-target="vendordropdown">VENDORS</a></li>
                    <li><a href="<?php echo base_url() ?>wed-assistance">WEDZ ASSISTANCE</a></li>
                    <li><a href="<?php echo base_url('einvite')?>">E-INVITE</a></li>
                    <li><a href="<?php echo base_url('real-wedding') ?>">REAL WEDDING</a></li>
                    <li><a href="#citymodel" class="modal-trigger">SELECT CITY</a></li>
                    <li><a href="<?php echo base_url() ?>blog">BLOG</a></li>
                    <?php  if ($this->session->userdata('shvid') !='') {  ?>
                    <li class="br-lo vendor-img"><a href="<?php echo base_url('vendor/profile') ?>" class="profle-img">
                                    <?php echo (!empty(profile()))?'<img src="'.base_url().profile().'">':'<i class="material-icons dp48">person_pin</i>'; ?>
                                    </a></li>
                    <li class="br-lo"><a href="<?php echo base_url('vendor/logout') ?>">Logout</a></li>
                    <?php }else if ($this->session->userdata('shdid') !='') { ?>
                    <li class="br-lo"><a href="<?php echo base_url('profile') ?>">Profile </a><span class="l-d">|</span></li>
                    <li class="br-lo"><a href="<?php echo base_url('logout') ?>">Logout</a></li>
                    <?php }else{ ?>
                    <li class="br-lo"><a class="dropdown-trigger" href="#" data-target="dropdown1">SIGN IN </a></li>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li class="br-lo"><a class="black-text" href="<?php echo base_url('login') ?>"><i class="material-icons dp48">person</i> Customer</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li class="br-lo"><a class="black-text" href="<?php echo base_url('vendor/login') ?>"><i class="material-icons dp48">enhanced_encryption</i>  Vendor</a></li>
                    </ul>

                    <li class="tollfree">
                        <a href="tel:18004199456" class="tooltipped" data-position="bottom" data-tooltip="1800 4199 456"> <i class="material-icons">local_phone</i><span>Toll Free</span></a>
                    </li>
                    <?php } ?>

                </ul>
            </div>

        </div>
    </nav>


    <ul id="vendordropdown" class="dropdown-content">
        <?php foreach (vendor_category() as $key => $cvalue) { 
                // id, icon, uniq, category
                $count = count(vendor_category());
                $clink = strtolower(str_replace(" ","-",$cvalue->category));
                if($count % 2 == 1){  }else{ $num = $count; }
                
                    echo '<li>

                    <a href="'.base_url().'vendors/all/'.$clink.'">
                        <img src="'.base_url().$cvalue->icon.'" alt="'.$cvalue->category.'" />'.$cvalue->category.'</a>
                    </li>';
                
                
            } ?>
        <!-- <li><a href=""></a></li> -->
    </ul>

    <!-- Modal Structure -->
    <div id="citymodel" class="modal">
        <div class="modal-content">
            <a href="#!" class="modal-close waves-effect waves-green right"> <i class="material-icons">close</i></a>
            <div class="center-align">
                <h4> <i class="material-icons">location_on</i> Popular Cities</h4>
                <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                <p>Find top vendors in your city.</p>

                <ul class="citylist">
                    <?php foreach (cities() as $key => $city) { 
                                if($city->status == 1){
                            ?>
                    <li class="hoverable">
                        <a href="<?php echo base_url('vendors/').strtolower(str_replace(" ","-",$city->city)) ?>">
                                    <img src="<?php echo base_url().$city->icon ?>" class="img-responsive city-icon" alt="<?php echo $city->city ?>" >
                                    <p class="m0"><?php echo $city->city ?></p>
                                </a>
                    </li>
                    <?php } }?>

                </ul>

                <a class="viewmore">All Cities</a>
            </div>

            <div class="morecitylink">
                <ul>
                    <?php foreach (cities() as $key => $city) { 
                                if($city->status != 1){ 
                                    echo '<li><a href="'.base_url().'vendors/'.strtolower(str_replace(" ","-",$city->city)).'">'.$city->city.'</a></li>';
                                } 
                            }?>

                </ul>
            </div>

        </div>
    </div>



    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo base_url()?>">HOME</a></li>
        <li><a href="<?php echo base_url('vendors')?>">VENDORS</a></li>
        <li><a href="<?php echo base_url('einvite')?>">E-INVITE</a></li>
        <li><a href="<?php echo base_url() ?>wed-assistance">WEDZ ASSISTANCE</a></li>
        <li><a href="<?php echo base_url('real-wedding') ?>">REAL WEDDING</a></li>
        <li><a href="#citymodel" class="modal-trigger">SELECT CITY</a></li>
        <li><a href="<?php echo base_url() ?>blog">BLOG</a></li>
        <?php if ($this->session->userdata('shdid') !='') { ?>
        <li class="br-lo"><a href="<?php echo base_url('profile') ?>">Profile </a></li>
        <li class="br-lo"><a href="<?php echo base_url('logout') ?>">Logout</a></li>
        <?php }else{ ?>
        <li class="br-lo"><a href="<?php echo base_url('login') ?>">CUSTOMER SIGN IN </a></li>
        <li class="br-lo"><a href="<?php echo base_url('vendor/login') ?>">VENDOR SIGN IN </a></li>

        <?php } ?>
    </ul>
</div>