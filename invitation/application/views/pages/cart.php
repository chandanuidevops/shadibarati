<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Invitation</title>

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

        <div class="overlay"></div>

        <?php $this->load->view('includes/header'); ?>

        <section class="flat-shop-cart  ptb-50">
            <div class="loderbox">
                <div class="text-center">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="flat-row-title style1">
                            <h3>Shopping Cart</h3>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div id="cart-box">
                            <div class="text-center">
                                <div class="spinner">
                                    <div class="double-bounce1"></div>
                                    <div class="double-bounce2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-totals ">
                            <h3 style="border-bottom: 1px dotted gray; padding-bottom: 15px;">Price including GST</h3>
                            <form action="<?php echo base_url('checkout') ?>" method="post" >
                                <table class="mt-50">
                                    <tbody>
                                        <tr style="border-bottom: 1px dotted gray;">
                                            <td>Price (<span class="items">0</span> items)</td>
                                            <td class="subtotal">00.00</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Total</td>
                                            <td class="price-total">00.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="btn-cart-totals">

                                    <button type="submit" class="checkout" >Proceed to Checkout</button>
                                </div><!-- /.btn-cart-totals -->
                            </form><!-- /form -->
                        </div><!-- /.cart-totals -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-shop-cart -->

        <?php $this->load->view('includes/footer');?>

    </div><!-- /.boxed -->

    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waypoints.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.circlechart.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/easing.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.zoom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/owl.carousel.js"></script>

    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery-ui.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&region=GB"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waves.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.countdown.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/main.js"></script>

    <?php $this->load->view('includes/searchq'); ?>
    <script>
    $(function() {

// cart cout fetch
        function cartCout() { 
            $.get("<?php echo base_url('cart/cartcount') ?>",
                function (data) {
                    $('.icon-cart span').text(data);
                },
                "html"
            );
         }
        cartCout();

        // loder
        function loder(status) {
            if (status == true) {
                $('.loderbox').css('display', 'block');
            } else {
                $('.loderbox').css('display', 'none');
            }
        }

        $(document).ready(function() {


         




        // cart page
        function cartitems() {
            $.ajax({
                type: "get",
                url: "<?php echo base_url('get-cart') ?>",
                data: "data",
                dataType: "json",
                success: function(response) {
                    $('#cart-box').html(response.items);
                    $('td.subtotal').html(response.total);
                    $('td.price-total').html(response.total);
                    $('.items').html(response.count);
                    if(response.count <= 0){
                        $('.checkout ').hide();
                    }
                    loder(false);
                }
            });
        }

        // change qty update
        function cartqty(id, newqty) {
            loder(true);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('update-qty') ?>",
                data: {
                    'id': id,
                    'qty': newqty
                },
                success: function(response) {
                    cartitems();
                }
            });
        }

        cartitems();


        /****** QTY increement and decrement *******/
        $(document).on("click", '.btn-down', function(e) {
            e.preventDefault();
            var qty = $(this).siblings('.qtyi').val();

            if (qty > 1) {
                var newqty = qty -= 1;
                $(this).siblings('.qtyi').val(newqty);
                var id = $(this).closest('.cart-item').attr('dataid');
                cartqty(id, newqty);
            }
        });
        $(document).on("click", '.btn-up', function(e) {
            e.preventDefault();
            var qty = $(this).siblings('.qtyi').val();
            var newqty = parseInt(qty) + parseInt(1);
            $(this).siblings('.qtyi').val(newqty);
            var id = $(this).closest('.cart-item').attr('dataid');
            cartqty(id, newqty);
        }); /****** QTY increement and decrement end *******/

        /****  brand change ****/
        $(document).on('change', '.colors select', function (e) {
            loder(true);
            var value = $(this).val();
            var url = '<?php echo base_url() ?>change-brand';
            var prd = $(this).closest('.cart-item').attr('dataid');
            $.ajax({
                    type: "post",
                    url: url,
                    data: {ids : value, prd:  prd},
                    success: function(response) {
                        cartitems();
                    }
                });

        });

        /****** Total ammoun count *******/
       
        $(document).on('change', '.qtyi', function(e) {
            e.preventDefault();
            var qty = $('.qtyi').val();
            var id = $(this).closest('.cart-item').attr('dataid');
            cartqty(id, qty);
        });


        /** delete cart item **/
        $(document).on('click', '.remove-btn', function(e) {
            e.preventDefault();
            loder(true);
            var url = $(this).attr('href');
            $.ajax({
                type: "get",
                url: url,
                data: "data",
                success: function(response) {
                    cartitems();
                    cartCout();
                }
            });
        });

        });

    });
    </script>
</body>

</html>