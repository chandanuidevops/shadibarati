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
</head>

<body>
    <div id="app">
        <!-- header -->
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->

        <!-- body  -->
        <section class="dsection">
            <div class="container-1">
                <div class="row m0">
                    <!-- left menu -->
 <?php $this->load->view('includes/left-menu.php'); ?>

                   <!-- end left menu -->

                    <div class="col s12 m8 l9">
                        <div class="card profile-edit-page">
                            <div class="card-panel">
                                <div class="row">
                                    <div class="col s12 m4 l3">
                                        <div class="profile-edit">
                                            <img src="<?php echo (!empty($setting->su_profile_file))?$setting->su_profile_file:'https://anthemunited.com/app/uploads/2016/12/steve-lepan.jpg' ?>" class="responsive-img" alt="" id="targetimg">
                                                <a class="btn-floating btn-flat " @click="imageselect()"><i class="material-icons">camera</i></a>
                                        </div>
                                    </div>
                                    <div class="col s12 m7 l6">
                                        <form action="<?php echo base_url() ?>profile/update" method="post" enctype="multipart/form-data">
                                            <input type="file" class="hide" name="profilepic" ref="fileInput" id="profileimg" onchange="putImage()">
                                            <div class="d-input">
                                                <div class="input-field">
                                                    <label for="femail">Name <span class="red-text">*</span></label>
                                                    <input id="femail" type="text" name="name"
                                                        class="validate  in-l" required value="<?php echo (!empty($setting->su_name))?$setting->su_name:'' ?>">
                                                </div>
                                            </div>

                                            <div class="d-input">
                                                <div class="input-field">
                                                    <label for="npsw">Email id</label>
                                                    <input id="npsw" type="email" name="email" readonly="" class="validate  in-l" required value="<?php echo (!empty($setting->su_email))?$setting->su_email:'' ?>">
                                                </div>
                                            </div>

                                            <div class="d-input">
                                                <div class="input-field">
                                                    <label for="cpsw">Phone <span class="red-text">*</span></label>
                                                    <input id="cpsw" type="text"  name="phone" class="validate  in-l" required value="<?php echo (!empty($setting->su_phone))?$setting->su_phone:'' ?>">
                                                </div>
                                            </div>

                                            

                                            <div class="middle">
                                                <p>Gender</p>
                                                <label>
                                                    <input type="radio" name="gender" <?php echo (!empty($setting->gender == '1'))?'checked':'' ?> value="1" />
                                                    <div class="front-end box">
                                                        <span>Male</span>
                                                    </div>
                                                </label>
                                                <label>
                                                    <input type="radio" name="gender" <?php echo (!empty($setting->gender == '2'))?'checked':'' ?> value="2"/>
                                                    <div class="front-end box">
                                                        <span>Female</span>
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="">
                                                <button type="submit" class="red accent-4 waves-effect waves-light btn">Update Profile</button>
                                                <button type="reset" class="indigo accent-4 accent-4 waves-effect waves-light btn">Cancel</button>
                                            </div>



                                        </form>
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
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {

                email: '',
                phone: '',
                name: ''

            },

            methods:{
                imageselect(){
                    this.$refs.fileInput.click()
                }
            }
        });
    </script>

    <script>
    function showImage(src, target) {
        var fr = new FileReader();
 
        fr.onload = function(){
            target.src = fr.result;
        }
        fr.readAsDataURL(src.files[0]);
    }

    function putImage() {
        var src = document.getElementById("profileimg");
        var target = document.getElementById("targetimg");
        showImage(src, target);
    }
    </script>
</body>

</html>