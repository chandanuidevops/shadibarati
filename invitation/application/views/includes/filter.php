<section class="flat-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <?php echo '<span style="font-size: 18px; line-height: 47px;">'. (!empty($_GET['q']) ? $_GET['q'] : 'Results' ).'</span>'
                    ?>
                    <ul class="icons" style="float: right;">
                        <li class="filter waves-effect">
                            <span class="f-icon"><i class="fa fa-filter" aria-hidden="true"></i></span>
                            <span class="f-text">Filter</span>
                        </li>
                    </ul><!-- /.icons -->
                    <form action="<?php echo base_url('search') ?>" method="GET">
                        <div class="box-filter">
                            <div class="widget widget-categories">
                                <div class="widget-title">
                                    <h3>Categories<span></span></h3>
                                </div>
                                <ul class="cat-list style1 widget-content">
                                <?php 
                                    foreach ($this->data['categories']['full'] as $key => $value) { 
                                    $link = str_replace(' ','+', $value->title);
                                    $nlink = str_replace('&','%26', $link); 
                                    if(!empty($_GET['min'])){$min = $_GET['min'];} else{$min = '';}
                                    if(!empty($_GET['max'])){$max = $_GET['max'];} else{$max = '';}
                                ?>
                                    <li>
                                     <a href="<?php echo base_url('search?q=&c=').$nlink.'&min='.$min.'&max='.$max ?>" title="<?php echo $value->title ?>"> <span class="">
                                            <?php echo $value->title ?>
                                        </span>
                                    </a>
                                    </li>
                                  <?php } ?> 
                              </ul><!-- /.cat-list -->
                            </div><!-- /.widget-categories -->
                            <div class="widget widget-price">
                                <div class="widget-title">
                                    <h3>Price<span></span></h3>
                                </div>
                                <div class="widget-content">
                                    <p>Price</p>
                                        <div class="price search-filter-input">
                                            <input name="q" value="<?php echo (!empty($_GET['q'])? $_GET['q'] : '') ?>" type="hidden">
                                            <input name ="c"  value="<?php echo (!empty($_GET['c'])? $_GET['c'] : '') ?>" type="hidden">
                                            <div class="input-sets">
                                                <label for="">MIN</label>
                                                <input  value="<?php echo (!empty($_GET['min'])? $_GET['min'] : '0') ?>" name="min" type="text">
                                            </div>
                                            <div class="input-sets">
                                                <label for="">MAX</label>
                                                <input  value="<?php echo (!empty($_GET['max'])? $_GET['max'] : '999999') ?>" name="max" type="text">
                                            </div>
                                        </div>
                                </div>
                            </div><!-- /.widget widget-price -->
                            <button type="submit" class="brandfilter">Products Filter</button>
                        </div><!-- /.box-filter -->
                    </form>
                    <div class="clearfix"></div>
                </div><!-- /.sort-product style1 -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

