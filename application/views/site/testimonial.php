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
            $pages = strtolower($value->page);
            if($pages == 'testimonial' || $pages == 'Testimonial'){
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
                <div class="row">
                    <div class="col l12 s12">
                        <div class="banner-up ">
                            <h5 class="white-text">TESTIMONIAL</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col l10 push-l1">
                            <div class="feedback-form z-depth-2">
                                <h4>Write a Testimonial</h4>
                                <div class="form-testimonial-list">
                                    <form ref="formss" @submit.prevent="checkForms" action="<?php echo base_url('testimonial-post')?>" method="post">
                                        <div class="row">
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="fn" name="fname" type="text" class="validate" required="">
                                                        <label for="fn">First Name <span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="ln" type="text" class="validate" name="lname">
                                                        <label for="ln">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="email" type="email" class="validate" name="email">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="phone" type="text" class="validate" name="phone" required="">
                                                        <label for="phone">Phone <span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="best" type="text" class="validate" name="best">
                                                        <label for="best">What did you like best ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="improve" type="text" class="validate" name="improve">
                                                        <label for="improve">How can we improve ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m12 s12">
                                                <div class="feedback-input">
                                                  <label for="phone" class="black-text h-rate">Rate Our Service <span class="red-text">*</span></label>
                                                    <div class="input-field if-feed">
                                                        <p>
                                                    <label class="ratio-all">
                                                        <input value="Excellent" class="with-gap" name="service" type="radio"  checked />
                                                        <span class="ration-rr">Excellent</span>
                                                    </label>
                                                </p>
                                                <p>
                                                    <label class="ratio-all">
                                                        <input value="Good"      class="with-gap" name="service"     type="radio"  />
                                                        <span class="ration-rr">Good</span>
                                                    </label>
                                                </p>
                                                <p >
                                                    <label class="ratio-all">
                                                        <input value="Disappointing" class="with-gap" name="service" type="radio"  />
                                                        <span class="ration-rr">Disappointing</span>
                                                    </label>
                                                </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m12 s12">
                                                <div class="feedback-input">
                                                  <label for="phone" class="black-text h-rate">Would you recommend us to your friends</label>
                                                    <div class="input-field if-feed">
                                                        <p>
                                                    <label class="ratio-all">
                                                        <input value="Yes" class="with-gap" name="recomend" type="radio"  checked />
                                                        <span class="ration-rr">Yes</span>
                                                    </label>
                                                </p>
                                                <p>
                                                 <label class="ratio-all">
                                                        <input value="Yes" class="with-gap" name="recomend"     type="radio"  />
                                                        <span class="ration-rr">No</span>
                                                    </label>
                                                </p>
                                                    </div>
                                                </div>
                                            </div><br />
                                            <div class="col l12 m12 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <textarea required id="textarea1" name="feedback" class="materialize-textarea " ></textarea>
                                                        <label for="textarea1">Write your feedback here</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l12 m12 s12 rcaptcha-col">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <div class="g-recaptcha"
                                                        data-sitekey="6LfMhr0UAAAAAPOaSXvx2hfk0P_ruX4KDruHyu06"></div> <span
                                                    class="helper-text red-text">{{ captcha }}</span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col l12 m12 s12"><br>
                                                <button class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-top">
                <div class="container-fluide">
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div class="testimonial-full">
                                <?php foreach ($result as $key => $value) { ?>
                                    <div class="tes-reviews">
                                        <h5><?php echo $value->fname .' '. $value->lname ?></h5>
                                        <p><?php echo $value->feedback ?></p>
                                        <p>Rate Our Services : <span style="color:red;"><?php echo $value->service ?></span></p>
                                    </div>
                                <?php } ?>
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/slick.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script>
    var app = new Vue({
        el: '#app',
        data: {
            ar: '1',
            email: '',
            emailError: '',
            captcha: '',

        },



        methods: {

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
                }
            },
            checkForms(){
                if (grecaptcha.getResponse() == '') {
                    this.captcha = 'Captcha is required';
                } else {
                    this.$refs.formss.submit();
                }
            },


        },
    });
    </script>

    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    
        $('.testimonial-full').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 3000,
        nextArrow: false,
        prevArrow: false,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false
                }
            }
        ]

    });

    </script>

    
</body>

</html>