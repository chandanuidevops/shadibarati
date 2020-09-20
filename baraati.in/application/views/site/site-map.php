<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body >
    <div id="app">

        <?php $this->load->view('includes/header.php'); ?>
        <section class="contact-back sec">
            <div class="row m0">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">Site Map</h5>
                        <p class="tc white-text">Shaadibaraati India's Most Trusted Online Wedding Market</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec scroll-sit">
            <div class="container-fluide">
                <div class="row">
                   <div class="col l12 m12 s12">
                        <div class="div-sitmap">
                            <ul class="mj-sitemap">
                                <li><a href="">Home</a></li>
                                <li><a href="">About Us</a></li>
                                <li><a >Vendors</a>
                                    <ul class="sitemap-sub-title">
                                      <li><a href="">Wedding Photography</a></li>
                                      <li><a href="">Wedding Venues</a></li>
                                      <li><a href="">Wedding Card</a></li>
                                      <li><a href="">Wedding Decorator</a></li>
                                      <li><a href="">Bridal Wear</a></li>
                                      <li><a href="">Groom Wear</a></li>
                                      <li><a href="">Wedding Band</a></li>
                                      <li><a href="">Mehendi Artist</a></li>
                                      <li><a href="">Wedding Jewellery</a></li>
                                      <li><a href="">Wedding Catering</a></li>
                                      <li><a href="">Wedding Cakes</a></li>
                                      <li><a href="">Rental Wear</a></li>
                                      <li><a href="">Wedding Planner</a></li>
                                      <li><a href="">Astrology & Religious Services</a></li>
                                      <li><a href="">Background Verification & Detective </a></li>
                                      <li><a href="">Services</a></li>
                                      <li><a href="">Balloon Decorators</a></li>
                                      <li><a href="">Safa Wala</a></li>
                                      <li><a href="">Honeymoon Packages</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Wed Assistance</a></li>
                                <li><a>Select City</a>
                                    <ul class="sitemap-sub-title">
                                      <li><a href="">Bangalore</a></li>
                                      <li><a href="">Ahmedabad</a></li>
                                      <li><a href="">Chennai</a></li>
                                      <li><a href="">Kerala</a></li>
                                      <li><a href="">Delhi</a></li>
                                      <li><a href="">Jaipur</a></li>
                                      <li><a href="">Kolkata</a></li>
                                      <li><a href="">Mumbai</a></li>
                                      <li><a href="">Chennai</a></li>
                                      <li><a href="">Hyderabad</a></li>
                                      <li><a href="">Chandigarh</a></li>
                                      <li><a href="">Agra</a></li>
                                      <li><a href="">Indore</a></li>
                                    </ul>
                                </li>
                                <li><a href="">E-Invite</a></li>
                                <li><a href="">Real Wedding</a></li>
                                <li><a href="">Wedding Destination</a></li>
                                <li><a href="">Vendor Reviews</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Terms & Condition</a></li>
                                <li><a href="">Testimonial</a></li>
                                <li><a href="">Feedback / Complaints</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Coutact Us</a></li>
                                <!-- <li>ein weiterer Punkt</li>
                                <li>der letzte Punkt
                                    <ul>
                                    <li>Nummer 1</li>
                                    <li>Nummer 2</li>
                                    <li>Nummer 3</li>
                                    <li>Nummer 4</li>
                                    </ul>
                                </li> -->
                                </ul>
                        </div>
                   </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script>
    var demo = new Vue({
        el: '#demo',
        data: {
            email: '',
            emailError: '',
           
        },

        methods: {
            // mobile number check on database
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
                } else {}
            }
        },
    });



    
    </script>
</body>

</html>