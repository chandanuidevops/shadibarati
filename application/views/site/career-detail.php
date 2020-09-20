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
            if($value->page == 'career detail' || $value->page == 'Career Detail' || $value->page == 'Career-Detail' || $value->page == 'career-detail'){
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
                            <h5 class="white-text">CURRENT OPENINGS</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-top">
                <div class="container">
                    <div class="career-detail">
                        <div class="row">
                            <div class="col l12 m12 s12">
                                <div class="career-detail-list">
                                    <h5><?php echo $jobs['0']->title ?></h5>
                                    <?php echo(!empty($jobs['0']->title))? '<p>'.$jobs['0']->title.'</p>' : '' ?>

                                    <?php echo(!empty($jobs['0']->qualification))? '<p><span style="color:#d0021b">Qualification </span>: '.$jobs['0']->qualification.'</p>' : '' ?>
                                    <?php echo(!empty($jobs['0']->experience))? '<p><span style="color:#d0021b">Experience </span>: '.$jobs['0']->experience.'</p>' : '' ?>
                                    <?php echo(!empty($jobs['0']->language))? '<p><span style="color:#d0021b">Language </span>: '.$jobs['0']->language.'</p>' : '' ?>
                                    <?php echo(!empty($jobs['0']->openings))? '<p><span style="color:#d0021b">Openings </span>: '.$jobs['0']->openings.'</p>' : '' ?>
                                </div>
                                <div class="respon-det">
                                    <?php echo(!empty($jobs['0']->responsiblity))? '<h6>Responsiblity</h6>'.$jobs['0']->responsiblity.'' : '' ?>

                                    <?php echo(!empty($jobs['0']->key_role))? '<h6>Key Roles</h6>'.$jobs['0']->key_role.'' : '' ?>

                                    <?php echo(!empty($jobs['0']->location))? '<p class="locati">Location : '.$jobs['0']->location.' </p>' : '' ?>


                                    
                                    <h5 class="apply-email">To apply any of above mentioned position, mail us at hr@shaadibaraati.com with your full resume </h5>
                                </div>
                                <div class="career-form z-depth-2">
                                    <h4>Submit Your Details</h4>
                                    <form action="<?php echo base_url('appaly/').$jobs['0']->id ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col  s12 m6">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="fn" name="name" type="text" class="validate" required="">
                                                        <label for="fn">Name <span class="red-text">*</span></label>
                                                        <input type="hidden" name="position" value="<?php echo $jobs['0']->title ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m6">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="em" name="email" type="text" class="validate" required="">
                                                        <label for="em">Email <span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col  s12 m6">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="pn" name="phone" type="text" minlength="10" maxlength="10" class="validate" required="">
                                                        <label for="pn">Phone<span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 s12 m6">
                                                <div class="feedback-input">
                                                    <div class="file-field input-field">
                                                        <div class="btn hh-file">
                                                            <span>File</span>
                                                            <input type="file" required name="file" accept=".doc,.docx,.pdf" >
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate if-file" required type="text" placeholder="Upload Your Resume">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col l12 s12 m12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <textarea id="textarea1" name="msg" requred class="materialize-textarea"></textarea>
                                                        <label for="textarea1">Type your message here....</label>
                                                    </div>
                                                </div>
                                                <button class="waves-effect waves-light btn red plr30 accent-4 white-text" type="submit">Submit</button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
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
            // option
            var sel = document.querySelectorAll('select');
            var instances = M.FormSelect.init(sel);
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