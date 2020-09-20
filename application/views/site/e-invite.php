<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $seo = seo();
    $m_titl = '';
    $m_descp = '';
    $m_key = '';
    $m_can = '';

    if (!empty($seo[0])) {
        foreach ($seo as $key => $value) {
            if($value->page == 'e-invite' || $value->page == 'E-Invite' || $value->page == 'E invite' || $value->page == 'e invite'){
                $m_titl     = $value->title;
                $m_descp    = $value->m_desc;
                $m_key      = $value->keywords;
                $m_can      = $value->can_link; 
                $m_description = $value->description; 
            }
        }
    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $m_descp ?>" />
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <meta name="keywords" content="<?php echo $m_key ?>" />
    <meta name="p:domain_verify" content="14689d3a8168f4758e45146daa554c8b"/>
    <title><?php echo $m_titl ?> | Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body>
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>
        <section class="contact-back sec">
            <div class="row m0">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h1 class="white-text">E-Invite</h1>
                        <p class="tc white-text pad0-11">Easily customise your Wedding Website design.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec grey lighten-5">
            <div class="container-invit">
                <div class="row">
                    <div class="col l12 m12 s12">
                        <div class="e-invite z-depth-1">
                            <div class="e-invite-detail">
                                <h2>Create Your Free Wedding Invitation Website and Invite Your Family & Friends</h2>
                                <p class="tc black-text pad-10">Your wedding events schedule, RSVP, and many more : share all of your details with guests through your Wedding Website!!</p>
                                <center><a href="<?php echo base_url('login') ?>" class="waves-effect waves-light btn red plr30 accent-4 white-text">Sign In</a></center>
                            </div>
                            <div class="e-invite-detail">
                                <h3 class="black-text">Working Process</h3>
                                <!-- <p class="tc black-text pad-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                                    nec, pellentesque eu, pretium quis, sem. Nulla coo, rhoncus ut, imperdiet a, venenatis</p> -->
                            </div>
                            <div class="pro-flow">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <div class="proce-box">
                                            <i class="material-icons">laptop_chromebook</i>
                                            <h6>Create a Website</h6>
                                            <p class="tc black-text pad-10">Select your design, add details, and personalize your website for you loved once.</p>
                                        </div>

                                    </div>
                                    <div class="col s12 m4">

                                        <div class="proce-box">
                                            <i class="material-icons">assignment</i>
                                            <h6>Add Information</h6>
                                            <p class="tc black-text pad-10">Inform guests about your wedding events schedule, locations, and many more.</p>
                                        </div>

                                    </div>
                                    <div class="col s12 m4">
                                        <div class="proce-box">
                                            <i class="material-icons">list</i>
                                            <h6>Guest List</h6>
                                            <p class="tc black-text pad-10">Sync guest list automatically.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="white sec-bt" id="template">
            <div class="container">
                <div class="row">
                    <div class="col l12 m12 s12">
                        <div class="e-invite-detail dash-template-invite">
                            <h3 class="">Select Your Template and Start to Create</h3>
                            <center><img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt=""></center>
                            <p class="tc black-text pad-10">Quickly Create and share all of your details in one place,Quickly customize your Wedding Website Templates.</p>
                        </div>
                    </div>
                </div>
                <div class="pro-flows">
                    <!-- <div class="row">
                        <div class="col s12 m4">
                            <div class="hv wedding-temp">
                                <img src="<?php echo base_url() ?>assets/img/wedding1.jpg" class="img-responsive we-im" alt="">
                                <div class="overlays">
                                    <a> <i class="material-icons">remove_red_eye</i></a>
                                    <a> <i class="material-icons">create</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="hv wedding-temp">
                                <img src="<?php echo base_url() ?>assets/img/wedding1.jpg" class="img-responsive" alt="">
                                <div class="overlays">
                                    <a> <i class="material-icons">remove_red_eye</i></a>
                                    <a> <i class="material-icons">create</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="hv wedding-temp">
                                <img src="<?php echo base_url() ?>assets/img/wedding1.jpg" class="img-responsive" alt="">
                                <div class="overlays">
                                    <a> <i class="material-icons">remove_red_eye</i></a>
                                    <a> <i class="material-icons">create</i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="cboady-invite">
                        <div class="category-list">
                            <ul class="tabs tab-ll">
                                <li class="tab tab-li col s3"><a href="#a1">Mehndi</a></li>
                                <li class="tab tab-li col s3"><a href="#a2">Engagement</a></li>
                                <li class="tab tab-li col s3"><a href="#a3">Wedding</a></li>
                                <li class="tab tab-li col s3"><a href="#a4">Reception</a></li>
                            </ul>
                        </div>
                        <!-- <div class="dash-template-invite">
                            <h3>Select Your Template and Start to Create</h3>
                        </div> -->
                        <div class="template-design" id="a1">
                            <div class="row">
                                <div class="col offset-l2 l10 ">
                                    <div class="row">
                                        <div class="col l5 m4 s12">
                                            <div class="template-m ">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/mehindhi1.jpg" class="img-responsive" alt="">
                                                <p>Mehndi Template 1</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview') ?>?item=mehindi-1"><i class="material-icons">remove_red_eye</i></a> <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
                                            </div>
                                        </div>
                                        <div class="col l5 m4 s12">
                                            <div class="template-m ">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/mehindhi2.jpg" class="img-responsive" alt="">
                                                <p>Mehndi Template 2</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview')?>?item=mehindi-2"><i class="material-icons">remove_red_eye</i></a> 
                                             <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
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
                                            <div class="template-m ">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/engagement1.jpg" class="img-responsive" alt="">
                                                <p>Engagement Template 1</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview')?>?item=engagement-1"><i class="material-icons">remove_red_eye</i></a> 
                                            <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
                                            </div>
                                        </div>
                                        <div class="col l5 m4 s12">
                                            <div class="template-m">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/engagement2.jpg" class="img-responsive" alt="">
                                                <p>Engagement Template 2</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview')?>?item=engagement-2"><i class="material-icons">remove_red_eye</i></a> 
                                            <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
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
                                            <div class="template-m ">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/weddding1.jpg" class="img-responsive" alt="">
                                                <p>Wedding Template 1</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview')?>?item=wedding-1"><i class="material-icons">remove_red_eye</i></a> 
                                            <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
                                            </div>
                                        </div>
                                        <div class="col l5 m4 s12">
                                            <div class="template-m ">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/wedding2.jpg" class="img-responsive" alt="">
                                                <p>Wedding Template 2</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview')?>?item=wedding-2"><i class="material-icons">remove_red_eye</i></a> 
                                            <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
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
                                            <div class="template-m ">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/reception1.jpg" class="img-responsive" alt="">
                                                <p>Reception Template 1</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview')?>?item=reception-1"><i class="material-icons">remove_red_eye</i></a> 
                                            <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
                                            </div>
                                        </div>
                                        <div class="col l5 m4 s12">
                                            <div class="template-m ">
                                                <img src="<?php echo base_url()?>assets/img/e-invite/reception2.jpg" class="img-responsive" alt="">
                                                <p>Reception Template 2</p>
                                            </div>
                                            <div class="temp-view">
                                            <a target="_blank" href="<?php echo base_url('e-invite/preview')?>?item=reception-2"><i class="material-icons">remove_red_eye</i></a> 
                                            <a href="<?php echo base_url('select-theme') ?>"><i class="material-icons">edit</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <?php    
        if (!empty($m_description)) { ?>
        <section class="result-body conts p0" style="border-top: 1px solid #e3e3e3;">
            <div class="container-2">
                <div class="row m0">
                    <div class="col l11 m12 s12">
                        <?php echo (!empty($m_description))?$m_description:''; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>


        <?php $this->load->view('includes/footer'); ?>
        </div>
        <!-- script -->
        <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/script.js"></script>
        <script>
            $(document).ready(function() {
                $('.tabs').tabs();
            });
        </script>

        <!-- <script>
            var a = 0;
            $(window).scroll(function() {

                var oTop = $('#counter').offset().top - window.innerHeight;
                if (a == 0 && $(window).scrollTop() > oTop) {
                    $('.counter-value').each(function() {
                        var $this = $(this),
                            countTo = $this.attr('data-count');
                        $({
                            countNum: $this.text()
                        }).animate({
                                countNum: countTo
                            },

                            {

                                duration: 3000,
                                easing: 'swing',
                                step: function() {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function() {
                                    $this.text(this.countNum);
                                }

                            });
                    });
                    a = 1;
                }

            });
        </script> -->

        <script>
            var demo = new Vue({
                el: '#demo',
                data: {
                    email: '',
                    emailError: '',

                },

                methods: {
                    // mobile number check on database
                    // email check on database
                    emailCheck() {
                        this.emailError = '';
                        const formData = new FormData();
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>home/emailcheck', formData)
                            .then(response => {
                                if (response.data == '1') {
                                    this.emailError = 'You are already subscribed.';
                                } else {
                                    this.emailError = '';
                                }
                            })
                            .catch(error => {
                                if (error.response) {
                                    this.errormsg = error.response.data.error;
                                }
                            })
                    },
                    checkForm() {
                        if (this.emailError == '') {


                            this.$refs.form.submit()
                        } else {}
                    }
                },
            });
        </script>
</body>

</html>