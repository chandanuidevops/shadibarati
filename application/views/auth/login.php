<!DOCTYPE html>
<html>

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
     <?php $this->load->view('includes/favicon.php');  ?>
</head>
<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->

        <section class="vendor-sig">
            <div class="container" v-bind:class="{'hide-card': forgotpassword}">
                <div class="vendor-reg">
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <div class="vendor-cont vcl">
                                <h4>"Plan your wedding With Shaadi Baraati"</h4>
                                <p>Sign Up to acess your Dashboard</p>
                                <p>If You Don't have an Account ?</p>
                                <a href="<?php echo base_url('register') ?>"><button class="vend-btn">Customer Sign Up</button></a>
                            </div>
                        </div>
                        <div class="col l6 m6 s12">
                            <div class="vend-background">
                                <div class="head-tile">
                                    <h6>Customer Sign in</h6>
                                    <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                                </div>
                                <div class="form-vendor-reg">
                                <form action="<?php echo base_url('login/check') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-input-vendor-login">
                                            <div class="row">
                                                <div class="col l12 m12 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0 pb">
                                                            <input id="email" type="email" class="validate  in-l"  v-model="email" v-on:keyup="emailCheck" placeholder="Enter Your email" name="email" required="">
                                                            <span class="helper-text red-text" >{{ emailError }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m12 s12">
                                                    <div class="d-input">
                                                        <div class="input-field m0 pb">
                                                            <input id="passsword" type="password" class="validate  in-l" placeholder="Enter Your Password" name="password" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col l12 m12 s12">
                                                    <p class="m0 tl"><a class="fp" @click="forgotpassword = !forgotpassword">Forgot Password ?</a></p>
                                                </div>
                                            </div>
                                            <button class="sub-reg z-depth-1 tl" type="submit" value="Submit">Submit</button>

                                            <div class="row" style="margin-top: 17px;">
                                                <div class="col s6">
                                                    
                                                    <a href="<?php echo $authURL; ?>"> <img style="border-radius: 10px;" src="<?php echo base_url() ?>assets/img/fb.png" class="img-responsive"
                                                    alt=""> </a>
                                                    
                                                </div>
                                                <div class="col s6">
                                                    <a href="<?php echo $loginURL; ?>">  <img style="border-radius: 10px;" src="<?php echo base_url() ?>assets/img/google.png" class="img-responsive"
                                                    alt=""> </a>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container" v-bind:class="{'hide-card': !forgotpassword}">
                <div class="vendor-reg">
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <div class="vendor-cont vcl">
                                <h4>"Grow your Business With Shaadi Baraati"</h4>
                                <p>Sign In to acess your Dashboard</p>
                                <p>If You Don't have an Account ?</p>
                                <a href="<?php echo base_url() ?>register"><button class="vend-btn">Sign Up</button></a>
                            </div>
                        </div>
                        <div class="col l6 m6 s12">
                            <div class="vend-background">
                                <div class="head-tile">
                                    <h6>Vendor Sign in</h6>
                                    <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                                </div>
                                <div class="form-vendor-reg">
                                <form ref="form"  @submit.prevent="checkForm" action="<?php echo base_url('forgot-password') ?>" method="post" enctype="multipart/form-data">
                                    <div class="d-input">
                                        <div class="input-field">
                                            <label for="femail">Enter your email id</label>
                                            <input id="femail" type="email"  class="validate  in-l" required="" name="email" v-model="email" v-on:keyup="emailCheck">
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