<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?> | Shaadi Baraati</title>
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body class="#fafafa grey lighten-5">
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <section class="sec">
            <div class="container-fluide">
                <div class="row">
                    <?php $this->load->view('includes/vendor-sidebar.php'); ?>
                    <div class="col l9 m9 s12">
                        <div class="vendor-detail-inputs b-sho white">
                            <div class="vendor-head">
                                <h6>Lead Details</h6>
                            </div>
                            <div class="vendor-inputs">


                             <div class="col l12 m12 s12">
                              <div class="row">
                                    <div class="col s12 m6 l4 mb-10">Name:</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo $result['0']->user_name ?></div>
                              </div>
                              <div class="row">
                                    <div class="col s12 m6 l4 mb-10">Email:</div>
                                    <div class="col s12 m6 l8 mb-10"><a href="mailto:<?php echo $result['0']->user_email ?>"><?php echo (!empty($result['0']->user_email))?$result['0']->user_email:'---'; ?></a></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Phone:</div>
                                    <div class="col s12 m6 l8 mb-10"><a href="tel:<?php echo $result['0']->user_phone ?>"><?php echo (!empty($result['0']->user_phone))?$result['0']->user_phone:'---'; ?></a></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Enquired On</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->date))?date('d M, Y',strtotime($result['0']->date)):'---' ?></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Function Date</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->fn_date))?date('d M, Y',strtotime($result['0']->fn_date)):'---' ?></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Location</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->location))?$result['0']->location:'---'; ?></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Budget</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->budget))?$result['0']->budget:'---'; ?></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Wedding Detail</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->wed_detail))?$result['0']->wed_detail:'---'; ?></div>
                              </div>

                              <?php if (!empty($result['0']->category) && $result['0']->category =='Wedding  Venues') { ?>
                                <div class="row">
                                <div class="col s12 m6 l4 mb-10">Function Type</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->fn_type))?$result['0']->fn_type:'---'; ?></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Function Time</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->fn_time))?$result['0']->fn_time:'---'; ?></div>
                              </div>
                              <div class="row">
                                <div class="col s12 m6 l4 mb-10">Guest No</div>
                                    <div class="col s12 m6 l8 mb-10"><?php echo (!empty($result['0']->guest_no))?$result['0']->guest_no:'---'; ?></div>
                              </div>


                              <?php } ?>

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
        <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/script.js"></script>
        <script>
            <?php $this->load->view('includes/message'); ?>
        </script>
       
</body>

</html