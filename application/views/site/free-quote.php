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
            if($value->page == 'free-quote' || $value->page == 'Free-Quote' || $value->page == 'Free Quote' || $value->page == 'free quote'){
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

<body>
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>
        <section class="contact-back sec">
            <div class="row">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">FREE QUOTE</h5>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col l10 push-l1">
                        <div class="feedback-form z-depth-2">
                            <h4>Get a Free Quote</h4>
                            <div class="form-feed-list">
                                <form ref="formss" @submit.prevent="checkForms" action="<?php echo base_url('home/getquote') ?>" method="post">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="qfname" type="text" name="qfname" class="validate" required>
                                            <label for="qfname">First Name</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="qlname" type="text" name="qlname" class="validate">
                                            <label for="qlname">Last Name</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="qemail" type="email" name="qemail" class="validate" required>
                                            <label for="qemail">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="qphone" type="text" name="qphone" class="validate" required>
                                            <label for="qphone">Phone</label>
                                        </div>
                                        <div class="input-field sel-quots col s6">
                                            <select required name="qservice">
                                                <option value="" selected>Select Services</option>
                                                <?php foreach (vendor_category() as $key => $cts) { ?>
                                                <option value="<?php echo $cts->category ?>"><?php echo $cts->category ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-field  col s6">
                                            <input id="qdate" type="text" name="qdate" class="validate datepicker"
                                                required>
                                            <label for="qdate">Event Date</label>
                                        </div>
                                        <div class="input-field  sel-quots  col s6">
                                            <select required name="qcity">
                                                <option value="" selected>Select City</option>
                                                <?php foreach (cities() as $key => $city) { ?>
                                                <option value="<?php echo $city->city ?>"><?php echo $city->city ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-field  sel-quots  col s6">
                                            <select required name="qbudget">
                                                <option value="" selected>Budget</option>
                                                <option value="Below 50k">Below 50k</option>
                                                <option value="Upto 1 Lakh">Upto 1 Lakh</option>
                                                <option value="1lakh - 5lakh">1 Lakh - 5 Lakh</option>
                                                <option value="5lakh - 10lakh">5 Lakh - 10 Lakh</option>
                                                <option value="10lakh - 20lakh">10 Lakh - 20 Lakh</option>
                                                <option value="25lakh - 50lakh">25 Lakh - 50 Lakh</option>
                                                <option value="Above 50 lakh">Above 50 Lakh</option>
                                            </select>
                                            <input type="hidden" name="quiniq"
                                                value="<?php echo random_string('alnum',10) ?>">
                                        </div>
                                        <div class="col l12 s12">
                                            <div class="d-input">
                                                <div class="input-field">
                                                    <textarea id="textarea1" class="materialize-textarea "
                                                        placeholder="How can we help you today?"
                                                        name="qmessage"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col l12 m6 s12 rcaptcha-col">
                                            <div class="d-input">
                                                <div class="input-field">
                                                    <div class="g-recaptcha"
                                                    data-sitekey="6LfMhr0UAAAAAPOaSXvx2hfk0P_ruX4KDruHyu06"></div> <span
                                                class="helper-text red-text">{{ captcha }}</span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col l4 m4 s4">
                                            <button type="submit" class="btn-find-get">Submit</button>
                                        </div>                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);
    });
    </script>
    <script>
    var app = new Vue({
        el: '#app',
        data: {
            ar: '1',
            email: '',
            emailError: '',
            captcha: '',

        },



        methods: {

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
                }
            },
            checkForms(){
                if (grecaptcha.getResponse() == '') {
                    this.captcha = 'Captcha is required';
                } else {
                    this.$refs.formss.submit();
                }
            },


        },
    });
    </script>
</body>

</html>