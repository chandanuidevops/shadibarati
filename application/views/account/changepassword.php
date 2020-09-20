<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $title ?> </title>
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body >
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <section class="dsection">
            <div class="container-fluide">
                <div class="row">
                    <?php $this->load->view('includes/left-menu.php'); ?>
                    <div class="col l9 m9 s12">
                        <div class="vendor-detail-inputs  white z-depth-1">
                            <div class="vendor-head">
                                <h6>Change Password</h6>
                            </div>
                            <form ref="c_forms" @submit.prevent="contForm" action="<?php echo base_url('update-password') ?>" method="post">
                                <div class="vendor-inputs wid-50">
                                    <div class="row">
                                        <div class="col l12 m5 s12">
                                            <div class="input-field">
                                                <input id="curtpasword" @change="cuenpasscheck" type="password" v-model="curtpassw" name="curtpassword" required="">
                                                <label for="curtpassword">Current Password<span class="red-text">*</span></label>
                                                <span class="helper-text red-text">{{ curtpaserror }}</span>
                                            </div>
                                        </div>
                                        <div class="col l12 m5 s12">
                                            <div class="input-field">
                                                <input id="newpassword" type="password" class="validate" v-model="newpassw" name="newpassword" required="">
                                                <label for="newpassword">New Password<span class="red-text">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col l12 m5 s12">
                                            <div class="input-field">
                                                <input id="confpassword" type="password" class="validate  in-l" v-model="copassw" v-on:keyup="checkCpsw" name="cpassword" required="">
                                                <span class="helper-text red-text">{{ cpswerror }}</span>

                                                <label for="confpassword">Confirm Password<span class="red-text">*</span></label>
                                            </div>
                                        </div>

                                        <div class="col s12">
                                              <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                              <?php ?>
                                        </div>
                                    </div>
                                    <button class="sub-reg z-depth-1" type="submit" value="Submit">Submit</button>
                                </div>
                            </form>
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
            var demo = new Vue({
                el: '#app',
                data: {
                    newpassw: '',
                    copassw: '',
                    curtpassw: '',
                    cpswerror: '',
                    curtpaserror:'',
                },

                methods: {
                    cuenpasscheck(){
                        this.curtpaserror = '';
                        const formData = new FormData();
                        formData.append('pass', this.curtpassw);
                        axios.post('<?php echo base_url() ?>account/curnpasscheck', formData)
                        .then(response => {
                            if (response.data == '') {
                                this.curtpaserror = 'Invalid Current password';
                            } else {
                                this.curtpaserror = '';
                            }
                        })
                        .catch(error => {
                                if (error.response) {
                                this.errormsg = error.response.data.error;
                            }
                        })

                    },checkCpsw() {
                        if (this.newpassw != this.copassw) {
                            this.cpswerror = 'Password must match with previous entry!';

                        } else {
                            this.cpswerror = '';
                        }
                    },
                    contForm() {
                        if ((this.cpswerror == '') && (this.curtpaserror == '')) {
                            this.$refs.c_forms.submit();
                        } else {}
                    }
                },
            });
        </script>
</body>

</html