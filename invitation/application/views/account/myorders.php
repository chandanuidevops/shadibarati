<?php $this->ci =& get_instance(); ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Gifting Express</title>
    <meta name="author" content="CreativeLayers">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/style.css">
    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/responsive.css">
    <link rel="icon" type="image/png" sizes="60x60" href="<?php echo base_url() ?>assets/favicon/favicon.png">

</head>

<body class="header_sticky background">
    <div class="boxed">

        <?php $this->load->view('includes/header'); ?>



        <main id="account-settings" class="secs-top sec-bot">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <?php $this->load->view('includes/ds_sidebar'); ?>
                        <!-- /.sidebar -->
                    </div><!-- /.col-lg-3 col-md-4 -->
                    <div class="col-lg-9 col-md-8">
                        <?php   if(!empty($orders)){ 
                            $this->ci->load->model('m_orders');
                            
                            foreach ($orders as $key => $value) {
                                $toatalP = 0;
                                foreach ($value as $keysd => $valuesd) {

                                    // branding fetch
                                    $branding = $this->ci->m_orders->getBranding($valuesd->orderid);
                                    $Tbrandprice = 0;
                                    if (!empty($branding)) {
                                        foreach ($branding as $brandinKey => $brandinValues) {
                                            $Tbrandprice += $brandinValues->brand_price;
                                        }
                                    }
                                    // discount calculation
                                    $discount = ($valuesd->price * $valuesd->discount) / 100 ;

                                    // gst calculation
                                    $nGst = 0;
                                    if(!empty($valuesd->gst)){
                                        $nGst = ((($valuesd->price  - $discount) + $Tbrandprice) * $valuesd->gst) / 100;
                                    }
                                     // nAmount
                                    $amount = ((($valuesd->price - $discount) + $Tbrandprice) + $nGst) * $valuesd->quantity;

                                    $date = date('d M Y', strtotime($valuesd->orderd_on));
                                    $toatalP =  $toatalP + $amount;
                                }
                        ?>
                        <div class="cart-items">
                            <div class="cart-item">

                                <div class="ord-header">
                                    <a href="#!" class="track-order">Track order</a>
                                    <ul class="ord-header-list">
                                        <li>
                                            <p>Order Placed</p>
                                            <span><?php echo $date; ?></span>
                                        </li>
                                        <li>
                                            <p>Total</p>
                                            <span> &#8377; <?php echo $toatalP; ?></span>
                                        </li>
                                        <li>
                                            <p>Order id:</p>
                                            <span># <?php echo $key ?></span>
                                        </li>
                                    </ul>

                                </div>
                                <?php
                                
                                
                            foreach ($value as $vkey => $vale2) { 
                                
                                // branding fetch
                                $branding = $this->ci->m_orders->getBranding($vale2->orderid);
                                $Tbrandprice = 0;
                                if (!empty($branding)) {
                                    foreach ($branding as $brandinKey => $brandinValues) {
                                        $Tbrandprice += $brandinValues->brand_price;
                                    }
                                }
                                // discount calculation
                                $discount = ($vale2->price * $vale2->discount) / 100 ;

                                // gst calculation
                                $nGst = 0;
                                if(!empty($vale2->gst)){
                                    $nGst = ((($vale2->price  - $discount) + $Tbrandprice) * $vale2->gst) / 100;
                                }
                                 // nAmount
                                $amount = ((($vale2->price - $discount) + $Tbrandprice) + $nGst) * $vale2->quantity;

                                $date = date('d M Y', strtotime($vale2->orderd_on));
                                $toatalP =  $toatalP + $amount;
                                
                                
                            ?>
                                <div class="row order-list">
                                    <div class="col-4 col-sm-2">
                                        <div class="cart-item-image">
                                            <img src="<?php echo base_url().$vale2->image_path ?>" class="" alt="">

                                        </div>
                                    </div>
                                    <div class="col-8 col-sm-6">
                                        <div class="cart-item-content">
                                            <div class="c-title">
                                                <p><a
                                                        href="<?php echo base_url('product/').$vale2->product_id ?>"><?php echo $vale2->ptitle ?></a>
                                                </p>
                                            </div>
                                            <div class="c-category">
                                                <p><?php echo $vale2->name ?></p>
                                                <p><span>Quantity  </span> <?php echo $vale2->quantity ?></p>
                                                <?php 
                                                if(!$Tbrandprice == 0){
                                                    echo '<p><span>Branding Charges    </span> ₹ '. $Tbrandprice.' </p>';
                                                } 

                                                if(!$discount == 0){
                                                    echo '<p><span>Discount - '.$vale2->discount.'%   </span> ₹ '. $discount. '</p>';
                                                }

                                                if(!$nGst == 0){
                                                    echo '<p><span>GST - '.$vale2->gst.'%   </span> ₹ '.$nGst.'</p>';
                                                }

                                                
                                                ?>
                                                
                                                
                                                
                                            </div>
                                            <div class="c-price">
                                                <p>Price : ₹ <span><?php echo $amount ?></span></p>
                                            </div>
                                            <div class="brand-charge">
                                                <div class="footer-detail">
                                                    <div class="quanlity-box">

                                                    </div><!-- /.quanlity-box -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="review-button">
                                            <div class="add-review">
                                                <button type="button" class="btn btn-info1 btn-review "
                                                    data-value="<?php echo $vale2->product_id?>" data-toggle="modal"
                                                    data-target="#myModal"> Write a review </button>

                                                <button 
                                                    type="button" 
                                                    class="btn btn-danger1 btn-escalation "
                                                    data-value="<?php echo $vale2->product_id?>" 
                                                    data-toggle="modal"
                                                    data-img = "<?php echo base_url().$vale2->image_path?>"
                                                    data-name = "<?php echo $vale2->ptitle?>"
                                                    data-target="#escalation">Rise an Escalation </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <?php    } ?>
                            </div>
                        </div>




                        <?php       
                            }
                        }
                        else{ 

                        } 
                    ?>




                    </div><!-- /.col-lg-9 col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </main><!-- /#shop -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="m-title">
                            <a type="button" class="close" data-dismiss="modal">&times;</a>
                            <h4>Write a Review</h4>
                        </div>
                        <div class="m-body">
                            <div class='rating-stars text-center'>
                                <h5>Overall rating</h5>
                                <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10 push-sm-1">
                                        <form action="<?php echo base_url('review')  ?>" method="post">
                                            <input type="hidden" value="1" name="rating" class="ratingcout">
                                            <input type="hidden" name="product" class="products">
                                            <div class="form-group">
                                                <label for="">Add a headline</label>
                                                <input type="text" name="headline" class="form-control" name="hedline">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Write your review</label>
                                                <textarea name="cmd" rows="5" class="form-control"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <button class="checkout" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        

        <!-- escalation popup -->
        <div class="modal fade" id="escalation" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="m-title">
                            <a type="button" class="close" data-dismiss="modal">&times;</a>
                            <h4>Rise an escation about the product</h4>
                        </div>
                        <div class="m-body">
                            <form action="<?php echo base_url('escalation')?>" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="esimage-box text-center">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-10 push-sm-1">
                                        <div class="form-group">
                                            <label for="">Add a headline</label>
                                            <input type="hidden" name="product" class="esproductsid">
                                            <input type="text" name="headline" class="form-control" name="hedline">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Write Description</label>
                                            <textarea name="cmd" rows="5" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                                <button class="checkout" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                
                    </div>                
                </div>                
            </div>                
        </div>                


        <?php  $this->load->view('includes/footer');?>

    </div><!-- /.boxed -->

    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.circlechart.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/easing.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.zoom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/owl.carousel.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&region=GB"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waves.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.countdown.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.validate.min.js"></script>
    <?php $this->load->view('includes/searchq'); ?>
    <script>
    $(document).ready(function() { $("#accountsettings").validate({ rules: { phone: { required: true, }, email: { required: true, email: true }, }, messages: { phone: "Please provide a Phone number", email: "Please enter a valid email address", } }); });

    //  rating 
    $(document).ready(function() {

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function() {
            $(this).parent().children('li.star').each(function(e) {
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            $('input.ratingcout').val(ratingValue);
        });

        $('.btn-review').click(function(e) {
            e.preventDefault();
            var vals = $(this).attr('data-value');
            $('input.products').val(vals);
        });

        $('.btn-escalation').click(function(e) {
            e.preventDefault();
            var vals = $(this).attr('data-value');
            var img = $(this).attr('data-img');
            var name = $(this).attr('data-name');
            $('input.esproductsid').val(vals);
            var prdDetail = '<img src="'+img+'" alt=""> <p>'+name+'</p>';
            $('.esimage-box').html(prdDetail);
        });

    });
    </script>

</body>

</html>