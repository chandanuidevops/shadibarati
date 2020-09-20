<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/stylesheets/responsive.css">
</head>
<body class="header_sticky">
    <div class="boxed">

        <div class="overlay"></div>

        <!-- Preloader -->
        <!-- <div class="preloader">
            <div class="clear-loading loading-effect-2">
                <span></span>
            </div>
        </div> -->
        <!-- /.preloader -->



        <?php $this->load->view('includes/header'); ?>

        

        <section class="flat-product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="<?php echo base_url().$product->featured_image; ?>">
                                  <a href='#' id="zoom" class='zoom'><img src="<?php echo base_url().$product->featured_image; ?>" alt='' width='400' height='300' /></a>
                                </li>
                                <?php if (!empty($product->images)) {
                                    foreach ($product->images as $key => $value) { ?>
                                    <li data-thumb="<?php echo base_url().$value->image ?>">
                                      <a href='#' id="zoom1" class='zoom'><img src="<?php echo base_url().$value->image ?>" alt='' width='400' height='300' /></a>
                                    </li>
                                <?php    } } ?> 
                                
                            </ul><!-- /.slides -->
                        </div><!-- /.flexslider -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="product-detail style4">
                            <div class="header-detail">
                                <h4 class="name"><?php echo (!empty($product->name))?$product->name:'';  ?></h4>
                                <div class="category">
                                   <?php echo (!empty($product->category))?$product->category:'';  ?>
                                </div>
                                <div class="reviewed">
                                    <div class="status-product">
                                        Availablity <span> <?php echo (!empty($product->is_stock) && $product->is_stock=='1')?'Yes':'No';  ?></span>
                                    </div>
                                </div><!-- /.reviewed -->
                            </div><!-- /.header-detail -->
                            <div class="content-detail">
                                <div class="price">
                                    <div class="regular">
                                        <?php echo (!empty($product->mrp))?'&#8377;'.$product->mrp:'';  ?>
                                    </div>
                                    <div class="sale">
                                        <?php echo (!empty($product->selling_price))?'&#8377;'.$product->selling_price:'';  ?>
                                    </div>
                                </div>
                                <div class="info-text">
                                    <?php echo (!empty($product->description))?$product->description:'';  ?>
                                </div>
                                <div class="product-id">
                                    SKU: <span class="id"><?php echo (!empty($product->sku))?$product->sku:'';  ?></span>
                                </div>
                            </div><!-- /.content-detail -->
                            <div class="footer-detail">
                                <form action="<?php echo base_url('add-cart/') . $product->pr_id ?>" method="post" id="form-carts">
                                <div class="quanlity-box">
                                    <div class="quanlity">
                                        <span class="btn-down"></span>
                                        <input type="number" name="qty" min="50" value="50"  id="qty" max="1000"
                                                placeholder="Quantity">
                                        <span class="btn-up"></span>
                                    </div>
                                    <p id="qtyerror"></p>
                                </div><!-- /.quanlity-box -->
                                <div class="box-cart style2">
                                    <div class="btn-add-cart">

                                         <button class="add-cart"
                                                type="<?php echo ($product->is_stock > 0) ? 'disabled' : 'disabled' ?>"><img
                                                    src="<?php echo base_url() ?>assets/images/icons/add-cart.png"
                                                    alt="">Add to Cart</button>
                                    </div>
                                    <div class="compare-wishlist">
                                        <a href="compare.html" class="wishlist" title=""><img src="<?php echo base_url()?>assets/images/icons/wishlist.png" alt="">Wishlist</a>
                                    </div>
                                </div><!-- /.box-cart style2 -->
                              
                            </div><!-- /.footer-detail -->
                        </div><!-- /.product-detail style4 -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-product-detail -->

    <?php if (!empty($product->images)) { ?>
        <section class="flat-product-content">
            <ul class="product-detail-bar">
                <li class="active">Other Features</li>
            </ul><!-- /.product-detail-bar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tecnical-specs">
                            <table>
                                <tbody>
                                    <?php if (!empty($product->images)) {
                                    echo '<tr>
                                            <td>Weight</td>
                                            <td>'.$product->weight.'</td>
                                         </tr>';
                                     }?>

                                     <?php if (!empty($product->dimensions)) {
                                    echo '<tr>
                                            <td>Dimensions</td>
                                            <td>'.$product->dimensions.'</td>
                                         </tr>';
                                     }?>

                                     <?php if (!empty($product->no_of_insert)) {
                                    echo '<tr>
                                            <td>No of Insert</td>
                                            <td>'.$product->no_of_insert.'</td>
                                         </tr>';
                                     }?>

                                     <?php if (!empty($product->material)) {
                                    echo '<tr>
                                            <td>Material</td>
                                            <td>'.$product->material.'</td>
                                         </tr>';
                                     }?>

                                     <?php if (!empty($product->type)) {
                                    echo '<tr>
                                            <td>Type</td>
                                            <td>'.$product->type.'</td>
                                         </tr>';
                                     }?>

                                     <?php if (!empty($product->ceremony)) {
                                    echo '<tr>
                                            <td>Ceremony</td>
                                            <td>'.$product->ceremony.'</td>
                                         </tr>';
                                     }?>

                                      <?php if (!empty($product->orientation)) {
                                    echo '<tr>
                                            <td>Orientation</td>
                                            <td>'.$product->orientation.'</td>
                                         </tr>';
                                     }?>

                                      <?php if (!empty($product->print_option)) {
                                    echo '<tr>
                                            <td>Print Option</td>
                                            <td>'.$product->print_option.'</td>
                                         </tr>';
                                     }?>

                                       <?php if (!empty($product->size)) {
                                    echo '<tr>
                                            <td>Size</td>
                                            <td>'.$product->size.'</td>
                                         </tr>';
                                     }?>

                                       <?php if (!empty($product->gsm)) {
                                    echo '<tr>
                                            <td>Gsm</td>
                                            <td>'.$product->gsm.'</td>
                                         </tr>';
                                     }?>

                                       <?php if (!empty($product->color)) {
                                    echo '<tr>
                                            <td>Color</td>
                                            <td>'.$product->color.'</td>
                                         </tr>';
                                     }?>

                                        <?php if (!empty($product->theme)) {
                                    echo '<tr>
                                            <td>Theme</td>
                                            <td>'.$product->theme.'</td>
                                         </tr>';
                                     }?>
                                </tbody>
                            </table>
                        </div><!-- /.tecnical-specs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-product-content -->
    <?php } ?>

        

        <?php $this->load->view('includes/footer'); ?>

    </div><!-- /.boxed -->

        <!-- Javascript -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/tether.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.circlechart.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/easing.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.zoom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/owl.carousel.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/smoothscroll.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.mCustomScrollbar.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&amp;region=GB"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/gmap3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/waves.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/jquery.countdown.js"></script>

        <script type="text/javascript" src="<?php echo base_url()?>assets/javascript/main.js"></script>
        <?php $this->load->view('includes/searchq'); ?>

        <script>
            $(document).ready(function() {

                $(document).on('submit','#form-carts',function(e){
                    var quantity = $('input[name=qty]').val();

                    if(quantity < 50){
                        e.preventDefault();
                        $('#qtyerror').append('<span style="color:red">Please Select the quantity greater than 50</span>');
                    }else{
                        $('#qtyerror > span').remove();
                        $('#form-carts').submit();
                    }
                })



                $('.btn-down').click(function(e) {
                    e.preventDefault();
                    var qty = $('#qty').val();
                    if (qty > 1) {
                        var newqty = qty -= 1;
                        $('#qty').val(newqty);
                    }
                });
                $('.btn-up').click(function(e) {
                    e.preventDefault();
                    var qty = $('#qty').val();
                    var newqty = parseInt(qty) + parseInt(1);
                    $('#qty').val(newqty);
                });
            });
        </script>

</body> 
</html>