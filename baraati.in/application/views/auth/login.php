<!DOCTYPE html>
<html>

<head>
    <title>Shaadi Baraati</title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <section class="back-sig">
            <div class="container-reg" v-bind:class="{'hide-card': forgotpassword}">
                <div class="sign-reg">
                    <div class="row m0">
                        <div class="col xl7 l6 s12 m6 ">
                            <div class="reg-li">
                                <h6>LOGIN</h6>
                                <img src="assets/img/saprator.png" class="img-responsive" alt="">
                                <P>"Grow your Business With Shaadi Baraati"</P>
                            </div>
                            <!-- <div class="social-reg">
                                <a class="btn-floating btn-large waves-effect waves-light white pos-al"><img
                                        src="assets/img/svg/google.svg" class="img-responsive g-icon" alt="">></a>
                                <a class="btn-floating btn-large waves-effect waves-light white pos-al1"><i
                                        class="fab fa-facebook-f  i-icon"></i></a>
                            </div> -->
                            <form action="<?php echo base_url('login/check') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-input-login">
                                    <div class="d-input">
                                        <div class="input-field">
                                            <input id="email" type="email" class="validate  in-l"
                                                placeholder="Email Address" v-model="email" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="d-input">
                                        <div class="input-field">
                                            <input id="password" type="password" class="validate  in-l" v-model="passw"
                                                placeholder="Password" name="password" required="">

                                        </div>
                                    </div>
                                    <p class="m0"><a class="fp" @click="forgotpassword = !forgotpassword">Forgot
                                            Password ?</a></p>
                                </div>
                                <center> <button class="sub-reg z-depth-1" type="submit" value="Submit">Submit</button>
                                </center>
                                <div class="ss-h">
                                    <p class="p-arg-login">If You Have an Account ?<a href="<?php echo base_url('register') ?>" class="cr sr-ang">Sign Up</a></p>
                                    <p class="p-arg-login">Are You a Vendor ?<a href="<?php echo base_url('vendor-register') ?>" class="cr si-vender">Sign Up</a></p>
                                </div>
                                
                            </form>
                        </div>
                        <div class="col xl5 l6 s12  m6 p0">
                            <div class="img-reg">
                                <img src="assets/img/reg.png" class="img-responsive" width="100%" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frp-block" >
                <div class="forgotpsw-contatiner" v-bind:class="{'hide-card': !forgotpassword}">
                        <div class="reg-li" >
                            <h6>Forgot Password</h6>
                            <img src="assets/img/saprator.png" alt="" class="img-responsive">
                            <p>Enter your email, and we'll send you instructions on how to reset your password.</p>
                            <div class="form-forgot">
                                <form ref="form"  @submit.prevent="checkForm" action="<?php echo base_url('forgot-password') ?>" method="post" enctype="multipart/form-data">
                                    <div class="d-input">
                                        <div class="input-field">
                                            <label for="femail">Enter your email id</label>
                                            <input id="femail" type="email"  class="validate  in-l" required="" name="email" v-model="email" @change="emailCheck">
                                            <span class="helper-text red-text" >{{ emailError }}</span>
                                        </div>
                                    </div>
                                    <div class="sub-btn-box">
                                        <button type="submit" class="red accent-4 waves-effect waves-light btn-small">Reset
                                            Password</button>
                                    </div>
                                    <div class="d-input">
                                        <div class="input-field">
                                            <a href="#!" class="fp" @click="forgotpassword = !forgotpassword">Nevermind,
                                                I remember my password</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>


        </section>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>

    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);

            // nav
            var sidenav = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(sidenav);

        });

    </script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                name: '',
                email: '',
                num: '',
                passw: '',
                copassw: '',
                forgotpassword: false,
                emailError:''
            },


            methods: {
                

                // email check on database
                emailCheck(){

                    this.emailError = '';
                    const formData = new FormData();
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>authentication/emailcheck', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.emailError = 'Account doesnot exist with this email id!';
                        }else{
                            this.emailError = '';
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

                
                checkForm(){
                   if((this.emailError == '')){
                        this.$refs.form.submit()
                   }else{
                   }
                }
            },

        });

    </script>

</body>

</html>