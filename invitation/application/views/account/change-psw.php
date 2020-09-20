<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Invitation</title>
    <meta name="author" content="CreativeLayers">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/responsive.css">
    <link rel="icon" type="image/png" sizes="60x60" href="<?php echo base_url() ?>assets/favicon/favicon.png">
    <link href="<?php echo base_url()?>assets/stylesheets/jquery.alertable.css" rel="stylesheet">

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
                        <div class="">
                            <div class="form-register">
                                <div class="col-md-12 col-lg-12">
                                <div class="widget-title mb-30">
                                        <h3>Change Password<span></span></h3>
                                    </div>
                                    <form action="<?php echo base_url('change-psw') ?>" method="post" id="accountsettings" accept-charset="utf-8">
                                        <div class="form-box">
                                            <label for="opsw">Current Password <span class="error">*</span></label>
                                            <input type="password" value="" id="opsw" name="opsw">
                                            <span class="error"><?php echo form_error('opsw'); ?></span>
                                        </div>
                                        <div class="form-box">
                                            <label for="npsw">New Password <span class="error">*</span> </label>
                                            <input type="password" value=""  id="npsw" name="npsw">
                                            <span class="error"><?php echo form_error('npsw'); ?></span>
                                        </div>
                                        <div class="form-box">
                                            <label for="cpsw">Confirm New Password <span class="error">*</span></label>
                                            <input type="password" value="" id="cpsw" name="cpsw">
                                            <span class="error"><?php echo form_error('cpsw'); ?></span>
                                        </div>
                                        <div class="form-box">
                                            <button type="submit" class="register">Change Password</button>
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

    </div><!-- /.boxed -->

    <!-- Javascript -->
        <script  src="<?php echo base_url()?>assets/javascript/jquery.min.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/tether.min.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/bootstrap.min.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/waypoints.min.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/easing.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/jquery.zoom.min.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/jquery.flexslider-min.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/owl.carousel.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/smoothscroll.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/jquery.mCustomScrollbar.js"></script>
        <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&amp;region=GB"></script>
        <script src="<?php echo base_url()?>assets/javascript/gmap3.min.js"></script>
        <script  src="<?php echo base_url()?>assets/javascript/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/javascript/main.js"></script>
        <script src="<?php echo base_url()?>assets/javascript/jquer-validation.js"></script>
        <script src="<?php echo base_url()?>assets/javascript/jquery.alertable.js"></script>


    <script>
    $(document).ready(function() {
        $("#accountsettings").validate({
            rules: {
                opsw: { required: true, },
                npsw: {
                    required: true,
                    minlength: 5
                },
                cpsw: {
                    required: true,
                    minlength: 5,
                    equalTo: "#npsw"
                },
            },
            messages: {
                opsw: "Please enter your current password",
                npsw: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                cpsw: {
                    required: "Please provide a confirm password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
            }
        });
    });
    </script>
    <?php $this->load->view('includes/searchq'); ?>


</body>
</html>