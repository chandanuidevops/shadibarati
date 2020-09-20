<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body>
    <!-- header -->

    <?php $this->load->view('includes/header.php'); ?>

    <!-- end header -->

    <section class="vendor-sig">
        <div class="container-fluide">
            <div class="vendor-reg">
                <div class="row">
                    <div class="col l6 m6 s12">
                        <div class="vendor-cont">
                            <h4>"Plan your wedding With Shaadi Baraati"</h4>
                            <p>Sign Up to acess your Dashboard</p>
                            <p>Already have an Account ?</p>
                            <a href="<?php echo base_url('login') ?>"><button class="vend-btn">Customer Sign
                                    In</button></a>
                        </div>

                    </div>
                    <div class="col l6 m6 s12">
                        <div class="vend-background">
                            <div class="head-tile">
                                <h6>Customer Registration</h6>

                                <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive"
                                    alt="">
                            </div>
                            <div class="form-vendor-reg">
                                <form id="demo" ref="form" @submit.prevent="checkForm" action="<?php echo base_url('register/add') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-input-vendor-login">
                                        <div class="col l12 m6 s12">
                                            <div class="d-input">
                                                <div class="input-field">
                                                    <input id="name" type="text" class="validate in-l "
                                                        placeholder="Name" v-model="name" required="" name="name">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l6 m6 s12">
                                        <div class="d-input">
                                            <div class="input-field">
                                                <input id="number" type="text" class="validate  in-l" v-model="phone"
                                                    placeholder="Mobile No" v-on:change="mobileCheck" required=""
                                                    name="phone">
                                                <span class="helper-text red-text">{{ phoneError }}</span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col l6 m6 s12">
                                        <div class="d-input">
                                            <div class="input-field">
                                                <input id="email" type="email" class="validate  in-l"
                                                    placeholder="Email Address" v-model="email" v-on:change="emailCheck"
                                                    required="" name="email">
                                                <span class="helper-text red-text">{{ emailError }}</span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col l6 m6 s12">
                                        <div class="d-input">
                                            <div class="input-field">
                                                <input id="password" type="password" class="validate  in-l"
                                                    v-model="passw" placeholder="Password" required="" name="password">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col l6 m6 s12">
                                        <div class="d-input">
                                            <div class="input-field">
                                                <input id="co_password" type="password" class="validate  in-l"
                                                    placeholder="Confirm Password" v-on:keyup="checkCpsw"
                                                    v-model="copassw" required="" name="cnpassword">
                                                <span class="helper-text red-text">{{ cpswerror }}</span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col l12 m6 s12">
                                        <div class="d-input">
                                            <div class="input-field">
                                                <input id="live" type="text" class="validate  in-l" placeholder="You live in"
                                                    required="" name="live">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row m0 radio-iam">
                                        <div class="col l12 m6 s12">
                                            
                                        <p>
                                       <span> I am</span>
                                            <label>
                                            <input class="with-gap" name="iam" type="radio" checked value="bride" />
                                            <span>Bride</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                            <input class="with-gap" name="iam" type="radio" value="groom" />
                                            <span>Groom</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label>
                                            <input class="with-gap" name="iam" type="radio" value="other"  />
                                            <span>Other</span>
                                            </label>
                                        </p>
                                        </div>

                                        </div>
                                        <div class="col l12 m6 s12 rcaptcha-col">
                                        <div class="d-input">
                                            <div class="input-field">
                                                <div class="g-recaptcha"
                                                    data-sitekey="6LfMhr0UAAAAAPOaSXvx2hfk0P_ruX4KDruHyu06"></div> <span
                                                    class="helper-text red-text">{{ captcha }}</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <center> <button class="sub-reg z-depth-1" type="submit"
                                            value="Submit">Submit</button>
                                    </center>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- script -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>

    <script>
    <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);

        // nav
        var sidenav = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(sidenav);

    });
    </script>

    <script>
    var demo = new Vue({
        el: '#demo',
        data: {
            name: '',
            phoneError: '',
            email: '',
            phone: '',
            passw: '',
            copassw: '',
            emailError: '',
            cpswerror: '',
            nameError: '',
            phoneError: '',
            captcha: ''
        },

        methods: {
            // mobile number check on database
            mobileCheck() {

                this.phoneError = '';
                if (this.phone.length !=10) {
                    this.phoneError = 'Mobile number must be 10 digits.';
                }else{
                    const formData = new FormData();
                    formData.append('phone', this.phone);
                    axios.post('<?php echo base_url() ?>authentication/phone_check', formData)
                    .then(response => {
                        if (response.data == '1') {
                            this.phoneError = 'This Phone number already exist!';
                        } else {
                            this.phoneError = '';
                        }
                    })
                    .catch(error => {
                            if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                    })
                }
            },

            // email check on database
            emailCheck() {


                this.emailError = '';
                const formData = new FormData();
                formData.append('email', this.email);
                axios.post('<?php echo base_url() ?>authentication/emailcheck', formData)
                    .then(response => {
                        if (response.data == '1') {
                            this.emailError = 'This email id already exist!';
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

            // check psw
            checkCpsw() {
                if (this.passw != this.copassw) {
                    this.cpswerror = 'Password must match with previous entry!';

                } else {
                    this.cpswerror = '';
                }
            },
            checkForm() {
                if ((this.cpswerror == '') && (this.phoneError == '') && (this.emailError == '')) {
                    if (grecaptcha.getResponse() == '') {
                        this.captcha = 'Captcha is required';
                    } else {
                        this.$refs.form.submit();
                    }
                } else {}
            }
        },
    });
    </script>
</body>
</html>