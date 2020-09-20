<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <!-- header -->

    <?php $this->load->view('includes/header.php'); ?>
    
    <!-- end header -->
    <section class="back-sig">
        <div class="container-reg">
            <div class="sign-reg">
                <div class="row m0">
                    <div class="col xl7 l6 s12 m6 ">
                        <div class="reg-li">
                            <h6>SIGN UP</h6>
                            <img src="<?php echo base_url()?>assets/img/saprator.png" class="img-responsive" alt="">
                            <P>"Grow your Business With Shaadi Baraati"</P>
                        </div>
                        <!-- <div class="social-reg">
                            <a class="btn-floating btn-large waves-effect waves-light white pos-al"><img
                                        src="<?php echo base_url()?>assets/img/svg/google.svg" class="img-responsive g-icon" alt="">></a>
                            <a class="btn-floating btn-large waves-effect waves-light white pos-al1"><i
                                        class="fab fa-facebook-f  i-icon"></i></a>
                        </div> -->
                        <form id="demo" ref="form"  @submit.prevent="checkForm"  action="<?php echo base_url('register/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-input">
                                <div class="d-input">
                                    <div class="input-field">
                                        <input id="name" type="text" class="validate in-l " placeholder="Name"
                                            v-model="name" required="" name="name">
                                            
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <input id="number" type="text" class="validate  in-l" v-model="phone"
                                            placeholder="Mobile No" @change="mobileCheck" required="" name="phone">
                                            <span class="helper-text red-text" >{{ phoneError }}</span>
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <input id="email" type="email" class="validate  in-l"
                                            placeholder="Email Address" v-model="email" @change="emailCheck" required="" name="email">
                                            <span class="helper-text red-text" >{{ emailError }}</span>
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <input id="password" type="password" class="validate  in-l" v-model="passw"
                                            placeholder="Password" required="" name="password">

                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <input id="co_password" type="password" class="validate  in-l"
                                            placeholder="Confirm Password" @change="checkCpsw" v-model="copassw"  required="" name="cnpassword">
                                         <span class="helper-text red-text">{{ cpswerror }}</span>

                                    </div>
                                </div>
                            </div>
                            <center> <button class="sub-reg z-depth-1"  type="submit" value="Submit">Submit</button>
                            </center>
                            <div class="ss-h">
                                <p class="p-arg">If You Have an Account ?<a href="<?php echo base_url('login') ?>" class="cr sr-ang">Sign In</a></p>
                                <p class="p-arg">Are You a Vendor ?<a href="<?php echo base_url('vendor-register') ?>" class="cr si-vender">Sign In</a></p>
                            </div>
                            <!-- <div class="my-data">
                                <p>{{ name }}</p>
                                <p>{{ num }}</p>
                                <p>{{ email }}</p>
                                <p>{{ passw }}</p>
                                <p>{{ copassw }}</p>
                            </div> -->
                        </form>
                    </div>
                    <div class="col xl5 l6 s12  m6 p0">
                        <div class="img-reg">
                            <img src="<?php echo base_url()?>assets/img/reg.png" class="img-responsive" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- script -->
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
        var demo = new Vue({
            el: '#demo',
            data: {
                name: '',
                phoneError: '',
                email: '',
                phone: '',
                passw: '',
                copassw: '',
                emailError:'',
                cpswerror: '',
                nameError: '',
                phoneError: '',
            },

            methods: {
                // mobile number check on database
                mobileCheck(){
                    this.phoneError = '';
                    const formData = new FormData();
                        formData.append('phone', this.phone);
                        axios.post('<?php echo base_url() ?>authentication/phone_check', formData)
                      .then(response => {
                        if(response.data == '1'){
                            this.phoneError = 'This Phone number already exist!';
                        }else{
                            this.phoneError = '';
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

                // email check on database
                emailCheck(){

                    this.emailError = '';
                    const formData = new FormData();
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>authentication/emailcheck', formData)
                      .then(response => {
                        if(response.data == '1'){
                            this.emailError = 'This email id already exist!';
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

                // check psw
                checkCpsw(){
                    if(this.passw != this.copassw){
                        this.cpswerror = 'Password must match with previous entry!';

                    }else{
                        this.cpswerror = '';
                    }
                },
                checkForm(){
                   if((this.cpswerror == '') && (this.phoneError == '') && (this.emailError =='')){

                       
                        this.$refs.form.submit()
                   }else{
                   }
                }
            },
        });
    </script>
</body>

</html>