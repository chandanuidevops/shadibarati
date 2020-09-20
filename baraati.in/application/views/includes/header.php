
<div class="navbar-fixed">
        <nav class="z-depth-1 navbar-fixed">
            <div class="nav-wrapper white">
                <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/img/logo.png" class="img-responsive brand-logo" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i
                        class="material-icons">menu</i></a>
                    <div class="right hide-on-med-and-down header-ul ">
                        <ul >
                            <li><a href="<?php echo base_url()?>">HOME</a></li>
                            <li><a class="dropdown-trigger" href="<?php echo base_url('categories')?>" data-target="vendordropdown" >VENDORS</a></li>
                            <li><a href="<?php echo base_url() ?>wed-assistance">WED ASSISTANCE</a></li>
                            <!-- <li><a href="#">E-INVITE</a></li> -->
                            <li><a href="#">REAL WEDDING</a></li>
                            <li><a href="#citymodel" class="modal-trigger">SELECT CITY</a></li>
                            <li><a href="<?php echo base_url() ?>blog">BLOG</a></li>
                            <?php if ($this->session->userdata('shdid') !='') { ?>
                                <li class="br-lo"><a href="<?php echo base_url('profile') ?>">Profile </a><span class="l-d">|</span></li>
                                <li class="br-lo"><a href="<?php echo base_url('logout') ?>">Logout</a></li>
                            <?php }else{ ?>
                            <li class="br-lo"><a href="<?php echo base_url('login') ?>">SIGN IN </a></li>
                            <li><span class="black-text">|</span></li>
                            <li class="br-lo"><a href="<?php echo base_url('register') ?>">SIGN UP</a></li>
                            <li class="tollfree" ><a href="tel:18004199456" class="tooltipped"  data-position="bottom" data-tooltip="1800 4199 456"> <i class="material-icons">local_phone</i><span>Toll Free</span></a></li>
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
                if($count % 2 == 1){ $num = $count - 1; }else{ $num = $count; }
                if($key < $num){
                    echo '<li>

                    <a href="'.base_url().'vendors/all/'.$clink.'">
                        <img src="'.base_url().$cvalue->icon.'" alt="'.$cvalue->category.'" />'.$cvalue->category.'</a>
                    </li>';
                }
                
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

                        <a  class="viewmore">All Cities</a>
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
            <li><a href="<?php echo base_url('categories')?>">VENDORS</a></li>
            <!-- <li><a href="#">WED ASSISTANCE</a></li> -->
            <!-- <li><a href="#">E-INVITE</a></li> -->
            <li><a href="<?php echo base_url() ?>wed-assistance">WED ASSISTANCE</a></li>
            <li><a href="<?php echo base_url() ?>blog">BLOG</a></li>
            <?php if ($this->session->userdata('shdid') !='') { ?>
                    <li class="br-lo"><a href="<?php echo base_url('profile') ?>">Profile </a></li>
                    <li class="br-lo"><a href="<?php echo base_url('logout') ?>">Logout</a></li>
            <?php }else{ ?>
                    <li class="br-lo"><a href="<?php echo base_url('login') ?>">SIGN IN </a></li>
                    <li class="br-lo"><a href="<?php echo base_url('register') ?>">SIGN UP</a></li>
            <?php } ?>
        </ul>
    </div>
