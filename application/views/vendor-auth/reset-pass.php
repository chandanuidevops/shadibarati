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
     <?php $this->load->view('includes/favicon.php');  ?>
    <style>
        .helper-text.red-text {
    min-height: 0 !important;
    text-align: left !important;
}
    </style>
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
                            <form ref="form"  @submit.prevent="checkForm" action="<?php echo base_url() ?>vendor/password-update" method="post" enctype="multipart/form-data">
                                <div class="d-input">
                                    <div class="input-field">
                                        <label for="femail">Email Address</label>
                                        <input id="femail" type="email" name="femail" class="validate  in-l" v-on:keyup="emailCheck" v-model="email">
                                        <span class="helper-text red-text" >{{ emailError }}</span>
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <label for="npsw">New Password</label>
                                        <input id="npsw" type="password" name="npsw" class="validate  in-l" v-model="passw" >
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <label for="cpsw">Confirm Password</label>
                                        <input id="cpsw" type="password" name="cpsw" class="validate  in-l" v-model="copassw" v-on:keyup="checkCpsw">
                                        <input type="hidden" name="refid" value="<?php echo $id ?>">
                                        <span class="helper-text red-text">{{ cpswerror }}</span>
                                    </div>
                                </div>
                                <div class="col s12 center">
                                            <?php 
                                                 echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                 ?>
                                            <?php ?>
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
      <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>


    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>

    <script>
        var app = new Vue({
            el: '#app',

            data: {
                email: '',
                emailError: '',
                passw: '',
                copassw: '',
                cpswerror: '',
            },
            methods: {
                // email check on database
                emailCheck(){

                    this.emailError = '';
                    const formData = new FormData();
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>vendor/emailcheck1', formData)
                      .then(response => {
                        console.log(response)
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

                // email check on database

                // check psw
                checkCpsw(){
                    if(this.passw != this.copassw){
                        this.cpswerror = 'Password must match with previous entry!';
                    }else{
                        this.cpswerror = '';
                    }
                },
                checkForm(){
                   if((this.cpswerror == '')  && (this.emailError =='')){
                        this.$refs.form.submit()
                   }else{
                   }
                }
            },

        });
    </script>
</body>

</html>