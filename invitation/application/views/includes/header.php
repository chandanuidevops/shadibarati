<section id="header" class="header">
				<div class="header-middle">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<div id="logo" class="logo">
									<a href="<?php echo base_url()?>" title="">
										<img src="<?php echo base_url()?>assets/images/logos/logo.png" alt="">
									</a>
								</div><!-- /#logo -->
							</div><!-- /.col-md-3 -->

                            <?php if ($this->session->userdata('inuid') !='') { ?>
                                <div class="col-md-6">
                                <div class="top-search">
                                    <form action="<?php echo base_url('search') ?>" method="get" class="form-search" accept-charset="utf-8">
                                            <div class="box-search">
                                                <input type="text" name="q" autocomplete="off" placeholder="Search cards here?">
                                                <span class="btn-search">
                                                    <button type="submit"><img src="<?php echo base_url()?>assets/images/icons/search-2.png" alt=""></button>
                                                </span>
                                                <div class="search-suggestions">
                                                    <div class="box-suggestions">
                                                        <div class="title">
                                                            Search Suggestions
                                                        </div>
                                                        <ul class="search-result">
                                                            
                                                        </ul>
                                                    </div><!-- /.box-suggestions -->
                                                </div>
                                                <!-- /.search-suggestions -->
                                            </div><!-- /.box-search -->
                                        </form><!-- /.form-search -->
                                </div><!-- /.top-search -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-3">
                                <div class="box-cart">
                                    <div class="inner-box">
                                        <ul class="menu-compare-wishlist">
                                            <li class="wishlist">
                                                <a href="wishlist.html" title="">
                                                    <img src="<?php echo base_url()?>assets/images/icons/wishlist.png" alt="">
                                                </a>
                                            </li>
                                        </ul><!-- /.menu-compare-wishlist -->
                                    </div><!-- /.inner-box -->
                                    <div class="inner-box">
                                        <a href="<?php echo base_url() ?>cart" title="">
                                            <div class="icon-cart">
                                                <img src="<?php echo base_url()?>assets/images/icons/cart.png" alt="">
                                                <span><?php echo (!empty($this->data['cart_item']))?$this->data['cart_item']:'';  ?></span>
                                            </div>
                                        </a>
                                        
                                    </div><!-- /.inner-box -->
                                </div><!-- /.box-cart -->
                            </div><!-- /.col-md-3 -->
                            <?php }  ?>

							


						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.header-middle -->


				<div class="header-bottom">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-2">
								<div id="mega-menu">
									<div class="btn-mega"><span></span>ALL CATEGORIES</div>
									<ul class="menu">
                                        <?php if(!empty(category())){
                                            foreach (category() as $key => $value) { 
                                                $link = str_replace(' ','+', $value->title);
                                                $cat = str_replace('&','%26', $link);
                                            ?>
                                            <li>
                                                
                                                
                                                <a href="<?php echo base_url('search?q=&c=').$cat ?>" title="" class="dropdown">
                                                    <span class="menu-title">
                                                        <?php echo $value->title; ?>
                                                    </span>
                                                </a>
                                                <div class="drop-menu">
                                                    <div class="one-third">
                                                        <div class="cat-title">
                                                            <?php echo $value->title; ?>
                                                        </div>
                                                        <ul>
                                                            <?php $sub = sub_category($value->id);
                                                            if (!empty($sub)) {
                                                                foreach ($sub as $subs => $subsc) {
                                                                    $subl = str_replace(' ','+', $subsc->title);
                                                                    $sub = str_replace('&','%26', $subl);
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo base_url().'search?q=&c='.$cat.'&un='.$value->uniq.'&sub='.$sub ?> " title=""><?php echo $subsc->title; ?></a>
                                                                </li>
                                                            <?php   } } ?>
                                                        </ul> 
                                                    </div>
                                                </div><!-- /.drop-menu -->
                                            </li>
                                        <?php } } ?>
                                    </ul>
								</div><!-- /.mega-menu -->
							</div><!-- /.col-md-3 -->
							<div class="col-md-9 col-10">
							<div class="nav-wrap">
								<div id="mainnav" class="mainnav">
									<ul class="menu">
                                        <li class="column-1">
                                            <a href="<?php echo base_url()?>" title="">Home</a>
                                        </li>
                                        <?php if($this->session->userdata('inuid') == ''){ ?>
                                            <li class="column-1">
                                                <a href="<?php echo base_url('login')?>" title="">Login</a>
                                            </li>
                                            <li class="column-1">
                                                <a href="<?php echo base_url('register')?>" title="">Register</a>
                                            </li>
                                        <?php }else{ ?>
                                            <li class="column-1">
                                                <a href="<?php echo base_url('account')?>" title="">
                                                    <div class="user-img">
                                                        <img src="<?php echo base_url()?>assets/images/user.png" alt="">
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul><!-- /.menu -->
								</div><!-- /.mainnav -->
							</div><!-- /.nav-wrap -->
							<div class="btn-menu">
	                            <span></span>
	                        </div><!-- //mobile menu button -->
						</div><!-- /.col-md-9 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.header-bottom -->
			</section><!-- /#header -->