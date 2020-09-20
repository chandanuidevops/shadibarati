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
            if($value->page == 'contact-us' || $value->page == 'contact us' || $value->page == 'Contact Us' || $value->page == 'Contact-Us'){
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
    <style>
    .padd-li {
        padding: 12px 0px;
    }
</style>
</head>

<body >
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>

        <section class="contact-back sec">
            <div class="row">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">CONTACT US</h5>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluide">
                <div class="contact-form">
                    <div class="row m0">
                        <div class="col l7 m7 s12 back-con">
                            <div class="padd-con">
                                <div class="hch">
                                    <h6 class="white-text">How can we help you ?</h6>
                                    <p class="white-text">if you have any question about the site or need support,
                                        please fill out the form
                                    </p>
                                </div>
                                <div class="form-contact">
                                    <form action="<?php echo base_url('contact-us/insert') ?>" method="post" enctype="multipart/form-data" id="contactform">
                                        <div class="row">
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="name" type="text" class="validate in-l con-us"
                                                            placeholder="Name" v-model="name" name="name" required="true" <?php echo (!empty($user['su_name']))?'value="'.$user['su_name'].'" readonly':'' ?>>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="email" type="text" class="validate in-l con-us"
                                                            placeholder="Email" v-model="name" name="email" required="true" <?php echo (!empty($user['su_email']))?'value="'.$user['su_email'].'" readonly':'' ?>>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="phone" type="text" class="validate in-l con-us"
                                                            placeholder="Phone" v-model="name" name="phone" required="true" <?php echo (!empty($user['su_phone']))?'value="'.$user['su_phone'].'" readonly':'' ?>>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <input id="subject" type="text" class="validate in-l con-us"
                                                            placeholder="Subject" v-model="name" name="subject">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="uniq" value="<?php echo random_string('alnum',16); ?>">
                                            <div class="col l12 s12">
                                                <div class="d-input">
                                                    <div class="input-field">
                                                        <textarea id="textarea1" class="materialize-textarea con-us"
                                                            placeholder="Message" name="message"></textarea>
                                                        <!-- <label for="textarea1 white-text">Textarea</label> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l12 s12">
                                                <div class="d-input">
                                                    <div class="g-recaptcha" data-sitekey="6LfMhr0UAAAAAPOaSXvx2hfk0P_ruX4KDruHyu06"></div>
                                                </div>
                                                <div class="error text-denger" style="margin-bottom:10px;color:#fff"></div>
                                            </div>


                                            <div class="col l12 s12">
                                                <button class="whit-btn" type="submit" value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="back-add">
                            <div class="col l5 m5 s12">
                                <div class="address-detail">
                                    <div class="row m0 bor-bot">
                                        <div class="col l12 s12">
                                            <div class="padd-li">
                                                <div class="row m0">
                                                        <div class="col l1 s1 p10">
                                                            <i class="material-icons">location_on</i>
                                                        </div>
                                                        <div class="col l11 s11 p10">
                                                            <p class="m0"><b>Corporate Office - </b>32/1, Kundan Complex, 2nd Floor, Ulsoor, Bangalore 560008 Karnataka India</p>
                                                        </div>

                                                        <div class="col l1 s1 p10">
                                                            <i class="material-icons">location_on</i>
                                                        </div>
                                                        <div class="col l11 s11 p10">
                                                            <p class="m0"><b>Branch Office - </b> Delhi Plot No-A, 61, 1st Floor, A Block, Sector 16, Noida, Uttar Pradesh 201301 India</p>
                                                        </div>
                                                        <div class="col l1 s1 p10">
                                                            <i class="material-icons">location_on</i>
                                                        </div>
                                                        <div class="col l11 s11 p10">
                                                            <p class="m0"><b>Branch Office -</b> Indore Office No. 307 , 3rd Floor  Royal Ratan Building Near Ahinsha Tower MG Road Indore -  452001</p>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l12 s12">
                                            <div class="padd-li">
                                                <div class="row m0">
                                                    <div class="col l1 s1">
                                                        <i class="material-icons">mail</i>
                                                    </div>
                                                    <div class="col l11 s11">

                                                    <a class="m0 white-text" href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a><br>
                                                    <a class="m0 white-text" href="mailto:support@shaadibaraati.com">support@shaadibaraati.com</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l12 s12">
                                            <div class="padd-li">
                                                <div class="row m0">
                                                        <div class="col l1 s1">
                                                        <i class="material-icons">phone</i>
                                                    </div>
                                                    <div class="col l11 s11s">
                                                        <a class="m0 white-text" href="tel:18004199456">Toll Free: 1800 4199 456</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="sec">
        <div class="container">
            <div class="row">
                <div class="col l12">
                    <div class="col-tabs">
                        <ul class="collapsible">
                            <li class="active">
                                <div class="collapsible-header" style="font-weight: 600;">Vendors</div>
                                <div class="collapsible-body"><span>If you are a registered vendor or a business looking to promote your brand on our portal, please send in your queries at <a href="mailto:support@shaadibaraati.com">support@shaadibaraati.com</a></span>

                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Marketing Collaborations</div>
                                <div class="collapsible-body"><span>For brand collaborations - sponsored content, social media activation etc., please write <a href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a></span></div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Wedding Submissions</div>
                                <div class="collapsible-body"><span>Shaadi Baraati features wedding across cultures, styles and budgets, blogs. To submit your wedding, kindly email us 20-30 photos at <a href="mailto:support@shaadibaraati.com">support@shaadibaraati.com</a></span> 

​</span></div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Careers</div>
                                <div class="collapsible-body"><span>We are a team of passionate young minds looking to reinvent the wedding industry. Please check our careers page for current openings and email us at <a href="mailto:hr@shaadibaraati.com">hr@shaadibaraati.com</a>

​</span></div>
                            </li>
                            <li>
                                <div class="collapsible-header" style="font-weight: 600;">Customers</div>
                                <div class="collapsible-body"><span>We love to hear from our precious users. For any feedback or queries simply write in to  <a href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a></span></div>
                            </li>
                        </ul>

                    </div>
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
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>


    <script>
        <?php $this->load->view('includes/message'); ?>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    </script>
                <script type="text/javascript">

             $(function(){

                 $('#contactform').on('submit', function(e) {

                  if(grecaptcha.getResponse() == "") {

                     e.preventDefault();

                    $('.error').text('Captcha is required');

                }

                });

             });

            </script>
</body>

</html>