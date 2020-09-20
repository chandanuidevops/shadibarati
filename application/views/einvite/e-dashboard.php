<?php 
$this->ci =& get_instance();
$this->load->model('m_account'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>

        <!-- body  -->
        <section class="dsection">
            <div class="container-1">
                <div class="row m0">
                    <!-- left menu -->
                    <div class="col s12 m4 l3">
                        <div class="sidemenu">
                            <div class="card-panel   profile-box">
                                <div class="pb-pic">
                                    <img src="assets/img/pp.jpg" class="img-responsive" alt="">
                                </div>
                                <center>
                                    <p class="white-text"><b>Rishabh</b></p>
                                </center>
                                <div class="pb-content center-align">
                                    <h6 class="white-text ">
                                        <?php echo (!empty($profile->su_name))?ucfirst($profile->su_name):'' ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="">
                                <ul class="e-invite-contain z-depth-1">
                                    <li>
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#">Manage User Details</a>
                                    </li>
                                    <li>
                                        <a href="#">Wedding Event</a>
                                    </li>
                                    <li>
                                        <a href="#">Family Members</a>
                                    </li>
                                    <li>
                                        <a href="#">Wedding Photos</a>
                                    </li>
                                    <li>
                                        <a href="#">Wedding Information</a>
                                    </li>
                                    <li>
                                        <a href="#">My Website</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end left menu -->

                    <div class="col s12 m8 l9">
                        <div class="card">
                            <div class="chead">
                                <p class="truncate">Dashboard</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <div class="category-list">
                                        <ul class="tabs tab-ll">
                                            <li class="tab tab-li col s3"><a href="#a1">Mehndi</a></li>
                                            <li class="tab tab-li col s3"><a href="#a2">Engagement</a></li>
                                            <li class="tab tab-li col s3"><a href="#a3">Wedding</a></li>
                                            <li class="tab tab-li col s3"><a href="#a4">Reception</a></li>
                                        </ul>
                                    </div>
                                    <div class="dash-template">
                                        <h3>Select Your Template and Start to Create</h3>
                                    </div>
                                    <div class="template-design" id="a1">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template1.jpg" class="img-responsive" alt="">
                                                            <p>Mehndi Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template2.jpg" class="img-responsive" alt="">
                                                            <p>Mehndi Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="template-design" id="a2">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template1.jpg" class="img-responsive" alt="">
                                                            <p>Engagement Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template1.jpg" class="img-responsive" alt="">
                                                            <p>Engagement Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="template-design" id="a3">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template1.jpg" class="img-responsive" alt="">
                                                            <p>Wedding Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template1.jpg" class="img-responsive" alt="">
                                                            <p>Wedding Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="template-design" id="a4">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template2.jpg" class="img-responsive" alt="">
                                                            <p>Reception Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m">
                                                            <img src="assets/img/template1.jpg" class="img-responsive" alt="">
                                                            <p>Reception Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a><i class="material-icons">remove_red_eye</i></a> <a><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- script -->
    <script src="<?php echo base_url()?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('.tabs').tabs();
        });
    </script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                list: [{
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    },

                ]
            }
        });
    </script>
</body>

</html>