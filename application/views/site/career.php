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
            $pages = strtolower($value->page);
            if($pages == 'career' || $pages == 'careers'){
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
                            <h5 class="white-text">CAREER</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-top">
                <div class="container">
                    <div class="row">
                        <div class="col l12">
                      <div class="vender-detail">
                            <h4>Current Opening</h4>
                            <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                            <p>There Are Jobs – Then there are careers. The chances to do kind of work that’s adds up to something meaningful. The opportunity to challenge yourself and learn new skills. The Stage to being surrounded by smart, ambitious, motivated people. That’s the kind of working environment you can expect from Shaadi Baraati. Sound appealing?
Come Join us.</p>
                        </div>
                        </div>
                    </div>
                    <div class="career-top">
                        <div class="row">
                            <?php if(!empty($jobs)){ 
                                foreach ($jobs as $key => $value) {  
                            ?>
                                <div class="col l6 m6 s12">
                                    <a href="<?php echo base_url('career/').$value->id ?>">
                                        <div class="care-detail">
                                            <h3><?php echo $value->title ?></h3>
                                            <p><?php echo mb_strimwidth($value->des, 0, 110, "..."); ?></p>
                                            <p><span style="color:red">Experience </span>: <?php echo $value->experience ?></p>
                                            <p><span style="color:red">Openings </span>: <?php echo $value->openings ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php } }?>
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

        var app = new Vue({
        el: '#app',
        data: {
            email: '',
            emailError: '', 
           
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
                } else {}
            }
        },
    });
    </script>
</body>

</html>