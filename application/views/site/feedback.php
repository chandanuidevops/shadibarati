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
            if($value->page == 'feedback' || $value->page == 'Feedback' || $value->page == 'feedbacks' || $value->page == 'Feedbacks'){
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
                            <h5 class="white-text">Subscribe Now</h5>
                                <p class="tc white-text pad0-11">Shaadi Baraati | Wedz Magazine - Indian Wedding Magazine for Brides & Grooms</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col l10 push-l1">
                            <div class="feedback-form z-depth-2">
                                <h4>Fill the below details to get your free copy now.</h4>
                                <div class="form-feed-list">
                                    <form ref="formss" @submit.prevent="checkForms" action="<?php echo base_url('feedback-post') ?>" method="post">
                                        <div class="row">
                                            <!-- <div class="col l12 m12 s12">
                                                <div class="feedback-input padd10">
                                                <div class="left">Rate us : </div>
                                                 <star-rating v-model="ar" :star-size="20" class="feed-star"></star-rating>
                                                 <input type="hidden" name="rate" :value="ar">
                                                </div>
                                            </div> -->
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="fn" type="text" name="fname" class="validate" required="">
                                                        <label for="fn">First Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="ln" name="lname" type="text" class="validate" required="">
                                                        <label for="ln">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="email" name="email" type="email" class="validate" required="">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="phone" name="phone" minlength="10" maxlength="10" type="text" class="validate" required="">
                                                        <label for="phone">Phone</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l12 m12 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <textarea id="textarea1" name="feedback" requred class="materialize-textarea" ></textarea>
                                                        <label for="textarea1">Message</label>
                                                    </div>
                                                </div>
                                            </div>

                                                <div  id="digital-copy" class="col l12 m6 s12 rcaptcha-col">
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
            <?php if (!empty($this->session->userdata('magUse'))) { ?>
                <section class="result-body " >
                <div class="container">
                    <div class="row m0">
                            <div class="col l10 push-l1">
                            <div class="feedback-form z-depth-2">
                                <h4>Download your Digital copy Now <a target="_blank" href="https://www.shaadibaraati.com/magazine/wedz-magazine.pdf">Click Here</a></h4>
                            </div>  

                        </div>

                    </div>
                </div>
            </section>
             <?php } ?>

            

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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>

    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/7239df9837bb114154f5562eb/d0698c2620adcad0ad3cd344f.js");</script>

    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    </script>
        <script>
    Vue.component('star-rating', VueStarRating.default);
    var app = new Vue({
        el: '#app',
        data: {
            rev_rating: '',
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
                    // if ((this.ar <= '3')) {
                        // if (confirm('Do you really want to give a ' + this.ar + ' rating')) {
                            // this.$refs.formss.submit()
                        // }
                    // }else{
                        this.$refs.formss.submit();
                    // }
                }
            },
            
            // rating
            setRating: function(rating) {
                this.rating = "You have Selected: " + rating + " stars";
            },
            showCurrentRating: function(rating) {
                this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " +
                    rating + " stars"
            },
            setCurrentSelectedRating: function(rating) {
                this.currentSelectedRating = "You have Selected: " + rating + " stars";
            },
        },
    });
    </script>
</body>

</html>