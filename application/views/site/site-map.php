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
            if($value->page == 'site-map' || $value->page == 'Site-Map' || $value->page == 'Site Map' || $value->page == 'site map'){
                $m_titl     = $value->title;
                $m_descp    = $value->m_desc;
                $m_key      = $value->keywords;
                $m_can      = $value->can_link; 
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
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="<?php echo base_url('about-us') ?>">About Us</a></li>
                                <li><a href="<?php echo base_url('vendors')?>">Vendors</a>
                                    <ul class="sitemap-sub-title">

                                      <?php foreach (vendor_category() as $key => $cvalue) { 
                                        // id, icon, uniq, category
                                        $count = count(vendor_category());
                                        $clink = strtolower(str_replace(" ","-",$cvalue->category));
                                        if($count % 2 == 1){  }else{ $num = $count; }
                                        
                                            echo '<li>

                                            <a href="'.base_url().'vendors/all/'.$clink.'"> '.$cvalue->category.'</a> </li>';
                                        
                                        
                                    } ?>


                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url() ?>wed-assistance">Wedding Assistance</a></li>
                                <li><a>Select City</a>
                                    <ul class="sitemap-sub-title">

                                      <?php foreach (cities() as $key => $city) { 
                                   ?>
                                    <li >
                                    <a href="<?php echo base_url('vendors/').strtolower(str_replace(" ","- ",$city->city)) ?>">
                                               <?php echo $city->city ?>
                                            </a>
                                </li>
                                <?php  }?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('e-invite')?>">E-Invite</a></li>
                                <li><a href="<?php echo base_url('real-wedding') ?>">Real Wedding</a></li>
                                <li><a href="#citymodel" class="modal-trigger">Select City</a></li>
                                <li><a href="<?php echo base_url('e-invite')?>">E-Invite</a></li>
                                <li><a href="<?php echo base_url('privacy-policy') ?>">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url('terms-conditions') ?>">Terms & Condition</a></li>
                                <li><a href="<?php echo base_url() ?>testimonial">Testimonial</a></li>
                                <li><a href="<?php echo base_url() ?>feedback">Feedback / Complaints</a></li>
                                <li><a href="<?php echo base_url() ?>career">Career</a></li>
                                <li><a href="<?php echo base_url() ?>blog">Blog</a></li>
                                <li><a href="<?php echo base_url('contact-us') ?>">Contact Us</a></li>

                                </ul>
                        </div>
                   </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
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