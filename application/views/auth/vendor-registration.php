<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="canonical" href="<?php echo current_url(); ?>" />
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
    <section class="vendor-register sec">
        <div class="row">
            <div class="col l12 s12">
                <div class="banner-up center-align">
                    <h5 class="white-text">Shaadi Baraati</h5>
                    <p class="white-text m0">Yours No 1 Online Wedding Partner</p>
                    <p class="white-text m0">Give Your Business Massive Growth with Shaadi Baraati</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col l10 push-l1">
                    <div class="vend-reg-form z-depth-2">
                        <div class="vender-detail">
                            <h4>Get Your Free Listing!</h4>
                            <img src="http://localhost/shaadibaraati/assets/img/saprator.png" class="img-responsive" alt="">
                            <p>List your business with Shaadi Baraati and give it's growth exponentially</p>
                        </div>
                        <div class="form-testimonial-list ">
                            <form action="<?php echo base_url('vendor-register/send') ?>" method="post">
                                <div class="row">
                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <input id="bname" name="bname" type="text" class="validate" required="">
                                                <label for="bname">Brand name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <input id="cperson" name="cperson" type="text" class="validate" required="">
                                                <label for="cperson">Contact Person</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <input id="email" name="email" type="email" class="validate" required="">
                                                <label for="email">Email Id</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <input id="phone" name="phone" type="number" class="validate" required="">
                                                <label for="phone">Phone</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field">
                                                <select required name="service">
                                                    <option value="" disabled selected>Select Services</option>
                                                    <?php foreach (vendor_category() as $key => $cts) { ?>
                                                        <option value="<?php echo $cts->category ?>"><?php echo $cts->category ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field">
                                                <select required name="city">
                                                    <option value="" disabled selected>Select City</option>
                                                    <?php foreach (cities() as $key => $city) { ?>
                                                        <option value="<?php echo $city->city ?>"><?php echo $city->city ?></option>
                                                    <?php } ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <input id="weburl" name="weburl" type="url" class="validate">
                                                <label for="weburl">Website Link</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col l6 m6 s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <input id="pin" name="pin" type="text" class="validate" required="">
                                                <label for="pin">Pin Code</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col  s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <textarea id="address" name="address" class="materialize-textarea"></textarea>
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col  s12">
                                        <div class="feedback-input">
                                            <div class="input-field if-feed">
                                                <textarea required id="des" name="des" class="materialize-textarea"></textarea>
                                                <label for="des">Describtion About Company</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
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

    <!-- end header -->
    <section class="back-sig hide">
        <div class="container-reg">
            <div class="sign-reg">
                <div class="row m0">
                    <div class="col xl7 l6 s12 m6 ">
                        <div class="reg-li">
                            <h6>VENDOR SIGN UP</h6>
                            <img src="<?php echo base_url()?>assets/img/saprator.png" class="img-responsive" alt="">
                            <P>"Grow your Business With Shaadi Baraati"</P>
                        </div>
                        <!-- <div class="social-reg">
                            <a class="btn-floating btn-large waves-effect waves-light white pos-al"><img
                                        src="<?php echo base_url()?>assets/img/svg/google.svg" class="img-responsive g-icon" alt="">></a>
                            <a class="btn-floating btn-large waves-effect waves-light white pos-al1"><i
                                        class="fab fa-facebook-f  i-icon"></i></a>
                        </div> -->
                        <form id="demo" action="<?php echo base_url('vendor-register/send') ?>" method="post"
                            enctype="multipart/form-data">
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
                                            placeholder="Mobile No" required="" name="phone">
                                        <span class="helper-text red-text">{{ phoneError }}</span>
                                    </div>
                                </div>
                                <div class="d-input">
                                    <div class="input-field">
                                        <input id="email" type="email" class="validate  in-l"
                                            placeholder="Email Address" v-model="email" required="" name="email">
                                        <span class="helper-text red-text">{{ emailError }}</span>
                                    </div>
                                </div>


                            </div>
                            <center> <button class="sub-reg z-depth-1" type="submit" value="Submit">Submit</button>
                            </center>
                            <div class="ss-h">
                                <p class="p-arg">Are You a user ?<a href="<?php echo base_url('login') ?>"
                                        class="cr si-vender">Sign In</a></p>
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
                            <img src="<?php echo base_url()?>assets/img/reg.png" class="img-responsive" width="100%"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
        },
    });
    </script>
</body>

</html>