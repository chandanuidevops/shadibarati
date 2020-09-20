<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>

        <div class="back-sig">
            <div class="frp-block">
                <div class="forgotpsw-contatiner" style="top: 0px">
                    <div class="reg-li">
                        <h6>Change Password</h6>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" alt="" class="img-responsive">
                        <p>Change your Shaadi Baraati account password</p>
                        <div class="form-forgot">
                            <form action="<?php echo base_url() ?>forgot-password/update" method="post" enctype="multipart/form-data">
                                <div class="d-input">
                                    <div class="input-field">
                                        <label for="femail">Email Address</label>
                                        <input id="femail" type="email" name="femail" class="validate  in-l">
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <label for="npsw">New Password</label>
                                        <input id="npsw" type="password" name="npsw" class="validate  in-l">
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <label for="cpsw">Confirm Password</label>
                                        <input id="cpsw" type="password" name="cpsw" class="validate  in-l">

                                        <input type="hidden" name="refid" value="<?php echo $id ?>">
                                    </div>
                                </div>
                                <div class="sub-btn-box">
                                    <button class="red accent-4 waves-effect waves-light btn-small">Reset
                                        Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>


    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>

    <script>
        var app = new Vue({
            el: '#app',
        }):
    </script>
</body>

</html>