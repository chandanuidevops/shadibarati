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
            if($value->page == 'wed-assistance' || $value->page == 'Wed-Assistance' || $value->page == 'wed assistance' || $value->page == 'Wed Assistance'){
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

<body >
    <div id="app">

        <?php $this->load->view('includes/header.php'); ?>

        <section class="wed-assis-banner">
            <div class="row">
                <div class="col l12 s12">
                    <div class="">
                        <h3 class="white-text">Wedz Assistance</h3>
                        <p class="text-center white-text">Plan your dream wedding with the help of our wedding planning experts</p>
                        <img src="<?php echo base_url()?>assets/img/saprator.png" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="weda-service">
            <div class="container-fluide">
                <div class="row">
                    <div class="col s12">
                        <div class="wda-serviceitem">
                            <div class="row m0">
                                <div class="col s12 m6 l6">
                                    <div class="wdas-item-content ">
                                        <p class="wdatitle">Assisted Wedz Planner</p>
                                        <p>Assisted Wedding Planner is a Assisted wedding services brought to you by Shaadi Baraati at One-time nominal fee starting at Rs.999/- that helps you plan your wedding with a unlimited qualified wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind and Dedicated Relationship manager is assigned for each and every queries.Your dedicated relationship expert remains your single point of contact..</p>
                                        <a href="https://rzp.io/l/stBAenC" class="btn-web waves-effect waves-red modal-trigger">Book Now</a>
                                    </div>
                                </div>
                                <div class="col s12 m6 l6 p0">
                                        <img class="img-responsive" src="<?php echo base_url()?>assets/img/wedz-assist1.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="wda-serviceitem">

                            <div class="row m0">
                                <div class="col s12 m6 l6 p0">
                                    <center>
                                        <img class="img-responsive" src="<?php echo base_url()?>assets/img/wedz-assist2.jpg" alt="">
                                    </center>
                                </div>
                                <div class="col s12 m6 l6">
                                    <div class="wdas-item-content ">
                                        <p class="wdatitle">Premium Wedz Planner</p>
                                        <p>Guaranteed hassle-free wedding planning experience including wedding day coordination. Our expert takes care of research and scheduling for you and Makes visit to your place. Premium Wedding Planner is a wedding services brought to you by Shaadi Baraati at one-time nominal fee starting at Rs.9999/- that helps you to plan your wedding with a Trusted wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind.</p>
                                        <a href="https://rzp.io/l/5L0fPSy"  class="btn-web waves-effect waves-red modal-trigger">Book Now</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        

                    </div>
                </div>
            </div>
        </section>

        <section class="wd-testimonial">
            <div class="container">
                <div class="slidtestimonial">
                    <div class="testi-coup"> 
                        <center>
                            <img src="<?php echo base_url() ?>assets/img/review/Ravi-S-rathore.jpg" class="img-responsive tsimg" alt="">
                        </center> 
                        <h6 class="">Mr & Mrs. Rathore</h6> <p>"Shaadi Baraati was very professional and dedicated. They have eased my wedding smooth and all the vendors were on time and even Shaadi Baraati Team was available on my wedding to ensure the quality services"</p> 
                       
                    </div>

                   <div class="testi-coup">
                        <center>
                            <img src="<?php echo base_url() ?>assets/img/review/Raj-Nandi-Testimonial.jpg" class="img-responsive tsimg" alt="">
                        </center>
                        <h6 class="">Mr & Mrs. Nandi</h6>
                        <p>"We never thought planning a wedding would be this easy. Thankyou Shaadi Baraati for making life easy for us. We are so happy that we found your website"</p>
                        
                   </div>


                   <div class="testi-coup">
                        <center>
                            <img src="<?php echo base_url() ?>assets/img/review/Bharadwaj.jpg" class="img-responsive tsimg" alt="Bharadwaj">
                        </center>
                        <h6 class="">Mr & Mrs Bhardwaj</h6>
                        <p>"Thank you Shaadi Baraati for hassle free events and making my dream come true"</p>
                       
                   </div>
                </div>
            </div>
        </section>


        <section class="wd-pricing">
            <div class="container-fluide">
                <div class='pricing pricing-palden ' >
                    

                    <!-- <div class='pricing-item '>
                        <div class='pricing-deco'>
                            <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                            <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                            <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                            <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                            <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                            </svg>
                            <div class='pricing-price'><span class='pricing-currency'></span>
                            Hello Wed Planner
                            </div>
                            <h3 class='pricing-title'>Free</h3>
                        </div>
                        <ul class='pricing-feature-list'>
                            <li class='pricing-feature'>Online Support.</li>
                            <li class='pricing-feature'>Provide verified vendors only.</li>
                            <li class='pricing-feature'>Unlimited Vendor Details.</li>
                            <li class='pricing-feature'>Exclusive packages and discounts. </li>
                            <li class='pricing-feature'>Dedicated wedding planning expert takes care of research.</li>
                            <li class='pricing-feature'>Bargain on your behalf</li>
                            <li class='pricing-feature'>No hidden cost</li>
                            <li class='pricing-feature'>Free Service</li>
                            <li class='pricing-feature'> Get accurate quotes </li>
                        </ul>
                        <button class='pricing-action'>Free</button>
                    </div> -->

                    <div class='pricing-item pricing__item--featured'>
                        <div class='pricing-deco'>
                            <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                            <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                            <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                            <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                            <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                            </svg>
                            <div class='pricing-price'><span class='pricing-currency'></span> Assisted Wedz Planner  
                            <span class='pricing-period'> </span>
                            </div>
                            <h3 class='pricing-title'>₹ 999 + Taxes</h3>
                        </div>
                        <ul class='pricing-feature-list'>
                            <li class='pricing-feature'>Online Support.</li>
                            <li class='pricing-feature'>Provide verified vendors only</li>
                            <li class='pricing-feature'>Unlimited Vendor Details</li>
                            <li class='pricing-feature'>Exclusive packages and discounts</li>
                            <li class='pricing-feature'>Dedicated wedding planning expert takes care of research</li>
                            <li class='pricing-feature'>Bargain on your behalf</li>
                            <li class='pricing-feature'>No hidden cost</li>
                            <li class='pricing-feature'>Your dedicated RM remains your single point of contact</li>
                            <li class='pricing-feature'>Get accurate quotes </li>
                            <li class='pricing-feature'> One-time nominal fee starting @ ₹999 + Taxes </li>
                        </ul>
                      <a href="https://rzp.io/l/stBAenC" class='pricing-action' target="_blank">Pay Now</a>
                    </div>

                    <div class='pricing-item '>
                        <div class='pricing-deco'>
                            <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                            <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                            <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                            <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                            <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                            </svg>
                            <div class='pricing-price'><span class='pricing-currency'></span>Premium Wedz Planner
                            <span class='pricing-period'></span>
                            </div>
                            <h3 class='pricing-title'>₹ 9999 + Taxes</h3>
                        </div>
                        <ul class='pricing-feature-list'>
                            <li class='pricing-feature'>Online Support</li>
                            <li class='pricing-feature'>Provide verified vendors only</li>
                            <li class='pricing-feature'>Unlimited Vendor Details</li>
                            <li class='pricing-feature'>Exclusive packages and discounts</li>
                            <li class='pricing-feature'>Dedicated wedding planning expert takes care of research </li>
                            <li class='pricing-feature'>Bargain on your behalf</li>
                            <li class='pricing-feature'>No hidden cost</li>
                            <li class='pricing-feature'>Your dedicated RM remains your single point of contact</li>
                            <li class='pricing-feature'>Makes visit to your place</li>
                            <li class='pricing-feature'>Expertise in all wedding category</li>
                            <li class='pricing-feature'>Get accurate quotes </li>
                            <li class='pricing-feature'>One-time nominal fee starting @ ₹9999 + Taxes</li>
                            
                        </ul>
                        <a href="https://rzp.io/l/5L0fPSy" target="_blank" class='pricing-action'>Pay Now</a>
                    </div>
                </div>
            </div>
        </section>

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
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slick.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</script>
    <script>
        <?php $this->load->view('includes/message'); ?>

        $(document).ready(function () {
            $('.slidtestimonial').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                nextArrow: '<span class="next"><i class="Tiny material-icons ll">chevron_left</i></span>',
                prevArrow: '<span class="prev"><i class="Tiny material-icons rr">chevron_right</i></span>',
                arrows: true,


            });
        });
    </script>
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