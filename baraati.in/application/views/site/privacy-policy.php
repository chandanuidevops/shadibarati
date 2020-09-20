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
   <div id="demo">

        <?php $this->load->view('includes/header.php'); ?>

        <section class="contact-back sec">
            <div class="row">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">Privacy  Policy</h5>
                    </div>
                </div>
            </div>
        </section>
    <section class="trsection">
        <div class="container-fluide">
                <p class="tcheading">Website privacy </p>
                <p>This privacy policy sets out how www.shaadibaraati.com uses and protects any information that you give www.shaadibaraati.com when you use this website. ​</p>
                <p>Shaadibaraati.com is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.</p>
                <p>Shaadibaraati.com may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes. This policy is effective from 1st April 2019.</p>
                
                <p class="tcheading">What we collect</p>
                <p class="m0">We may collect the following information:</p>
                <ul>
                    <li>Name and job title</li>
                    <li>Contact information including email address</li>
                    <li>Demographic information such as postcode, preferences and interests</li>
                    <li>Other information relevant to customer surveys and/or offers</li>
                </ul>

                <p class="tcheading">What we do with the information we gather</p>
                <p class="m0">We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</p>
                <ul>
                    <li>Internal record keeping.</li>
                    <li>We may use the information to improve our products and services.</li>
                    <li>We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided.</li>
                    <li>From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail. We may use the information to customize the website according to your interests.</li>
                </ul>

                <p class="tcheading">Security</p>
                <p>We are committed to ensuring that your information is secure. In order to prevent unauthorized access or disclosure we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.</p>

                <p class="tcheading">How we use cookies</p>
                <p>A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences.</p>
                <p>We use traffic log cookies to identify which pages are being used. This helps us analyse data about web page traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.</p>
                <p>Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.​</p>
                <p>You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website. ​</p>

                <p class="tcheading">Links to other websites ​</p>
                <p>Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.</p>

                <p class="tcheading">Controlling your personal information</p>
                <p class="m0">You may choose to restrict the collection or use of your personal information in the following ways:</p>
                <ul>
                    <li>whenever you are asked to fill in a form on the website, look for the box that you can click to indicate that you do not want the information to be used by anybody for direct marketing purposes</li>
                    <li>if you have previously agreed to us using your personal information for direct marketing purposes, you may change your mind at any time by writing to or emailing us at <a href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a></li>
                </ul>

                <p>We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen.</p>
                <p>You may request details of personal information which we hold about you under the Data Protection Act 1998. A small fee will be payable. If you would like a copy of the information held on you please write us at <a href="mailto:info@shaadibaraati.com">Info@shaadibaraati.com</a></p>
                <p>If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible, at the above address. We will promptly correct any information found to be incorrect.</p>

                <p class="tcheading">Contacting Us</p>
                <p>
                If there are any questions regarding this privacy policy you may contact us using the information below:<br />

                <b>Company Name:</b> Baraati media and entertainment  Pvt. Ltd <br />

                <b>E-Mail ID:</b> <a href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a>
                </p>


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