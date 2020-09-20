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

        <?php  $this->load->view('includes/header');?>


        <main id="account-settings" class="secs-top sec-bot">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <?php $this->load->view('includes/ds_sidebar'); ?>
                        <!-- /.sidebar -->
                    </div><!-- /.col-lg-3 col-md-4 -->
                    <div class="col-lg-9 col-md-8">
                        <div class="list-group">
                            <?php if(!empty($shipping)){ 
                                            $ncheck = '';
                                         foreach ($shipping as $key => $value) { ?>
                            <div class="list-group-item">
                                <div class="list-group-item-heading">
                                    <div class="row radio">
                                        <div class="col-sm-4">
                                            <label>
                                                <input type="radio" <?php echo($value->status == 1)? 'checked' : '' ?>
                                                    name="optionShipp" class="shippoption"
                                                    value="<?php echo $value->id ?>">
                                                <?php echo $value->name. ', '.  $value->street ?>
                                            </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <dl class="dl-small">
                                                <dt><?php echo $value->name ?></dt>
                                                <dd><?php echo $value->street.', '.$value->street1.', '.$value->city ?>
                                                </dd>
                                                <dd><?php echo $value->religion.' - '.$value->zip_code ?> </dd>
                                            </dl>
                                            <a href="<?php echo base_url('shipping-address-edit/').$value->id ?>" class="btn small-btn btn-info">Edit</a>
                                            <a class="btn small-btn btn-link" href="<?php echo base_url('delte-shipping/').$value->id.'/account' ?>">Delete this address</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } else{ $ncheck = 'checked';  }?>
                            <div class="list-group-item">
                                <div class="list-group-item-heading">
                                    <form action="<?php echo base_url() ?>save-shipping" method="post"
                                        class="custom-form">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="radio">
                                                    <label class="bg-lable">
                                                        <input <?php echo $ncheck ?> type="radio" name="optionShipp"
                                                            id="optionShipp2" value="new">
                                                        Add a new address
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 new-ad-form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputname">Name</label>
                                                            <input type="text" class="form-control form-control-large"
                                                                id="inputname" name="name" required
                                                                placeholder="Enter name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputphone">Phone</label>
                                                            <input type="number" class="form-control form-control-large"
                                                                id="inputphone" name="phone" required
                                                                placeholder="Enter Phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputAddress1">Street address 1</label>
                                                            <input type="text" class="form-control form-control-large"
                                                                id="inputAddress1" name="street" required
                                                                placeholder="Enter address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputAddress2">Street address 2</label>
                                                            <input type="text" class="form-control form-control-large"
                                                                id="inputAddress2" name="street1"
                                                                placeholder="Enter address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputState" class="control-label">State</label>
                                                            <select name="state"
                                                                class="form-control form-control-large">
                                                                <option>Select state</option>
                                                                <option>Andhra Pradesh</option>
                                                                <option>Arunachal Pradesh</option>
                                                                <option>Assam</option>
                                                                <option>Bihar</option>
                                                                <option>Chhattisgarh</option>
                                                                <option>Goa</option>
                                                                <option>Gujarat</option>
                                                                <option>Haryana</option>
                                                                <option>Himachal Pradesh</option>
                                                                <option>Jammu and Kashmir</option>
                                                                <option>Jharkhand</option>
                                                                <option>Karnataka</option>
                                                                <option>Kerala</option>
                                                                <option>Madhya Pradesh</option>
                                                                <option>Maharashtra</option>
                                                                <option>Manipur</option>
                                                                <option>Meghalaya</option>
                                                                <option>Mizoram</option>
                                                                <option>Nagaland</option>
                                                                <option>Odisha</option>
                                                                <option>Punjab</option>
                                                                <option>Rajasthan </option>
                                                                <option>Sikkim</option>
                                                                <option>Tamil Nadu</option>
                                                                <option>Telangana</option>
                                                                <option>Tripura</option>
                                                                <option>Uttar Pradesh</option>
                                                                <option>Uttarakhand</option>
                                                                <option>West Bengal</option>
                                                                <option>Andaman and Nicobar</option>
                                                                <option>Chandigarh</option>
                                                                <option>Dadar and Nagar Haveli</option>
                                                                <option>Daman and Diu</option>
                                                                <option>Delhi</option>
                                                                <option>Lakshadweep</option>
                                                                <option>Puducherry</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputCity">City</label>
                                                            <input name="city" type="text" class="form-control"
                                                                id="inputCity" required placeholder="Enter city">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputZip">ZIP Code</label>
                                                            <input name="zip" type="text"
                                                                class="form-control form-control-small" id="inputZip"
                                                                required placeholder="Enter zip">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="custom-btn" name="addnew" type="submit">Save
                                                    Address</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-lg-9 col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </main><!-- /#shop -->

        <?php  $this->load->view('includes/footer');?>

        <!-- Large modal -->


       

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
    <?php $this->load->view('includes/searchq'); ?>
    <script>
    $(function() {

        $(document).on('load, change', '#optionShipp2,  input[type=radio]', function(e) {
            if ($('#optionShipp2').is(':checked')) {
                $('.new-ad-form').css('display', 'block');
            } else {
                $('.new-ad-form').css('display', 'none');
            }

        });

        $('.shippoption').change(function(e) {
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>shipping-change",
                data: {
                    id: id
                },
                success: function(response) {

                }
            });

        });
    });

    $(document).ready(function() {
        if ($('#optionShipp2').is(':checked')) {
            $('.new-ad-form').css('display', 'block');
        } else {
            $('.new-ad-form').css('display', 'none');
        }
    });
    </script>
</body>

</html>