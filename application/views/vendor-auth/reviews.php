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
    <!-- data table -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
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
                            <div class="vendor-head-review">
                                <div class="review-short">
                                    <select class="browser-default" id="short">
                                                    <option value="10" <?php  echo $this->uri->segment(3)=='10'?'selected':''; ?> >10</option>
                                                    <option value="50"  <?php echo $this->uri->segment(3)=='50'?'selected':''; ?> >50</option>
                                                    <option value="150" <?php echo $this->uri->segment(3)=='150'?'selected':''; ?> >150</option>
                                                    <option value="250" <?php echo $this->uri->segment(3)=='250'?'selected':''; ?> >250</option>
                                                    <option value="251" <?php echo $this->uri->segment(3)>'250'?'selected':''; ?> >250 +</option>
                                        </select>
                                </div>
                                <h6>Review</h6>
                            </div>
                            <div class="vendor-inputs">
                                <div class="review-short-list">
                                    <div class="vender-v-review">
                                        <?php if (!empty($result)) {  
                                            foreach ($result as $key => $value) { ?>
                                                <div class="vendor-review-list">
                                            <ul>
                                                <li class="rev-name truncate"><i class="material-icons">person</i> <?php echo (!empty($value->su_name))?$value->su_name:''; ?></li>
                                                <li class="text-rsc"><i class="material-icons">email</i> <?php echo (!empty($value->su_email))?$value->su_email:''; ?></li>
                                                <li><i class="material-icons">date_range</i> <?php echo (!empty($value->added_date))?date('d M, Y',strtotime($value->added_date)):''; ?></li>
                                                <li class="green v-rev white-text"><i class="material-icons revi-i">star</i><?php echo (!empty($value->rating))?$value->rating:''; ?></li>
                                            </ul>
                                            <p class="p-rev"><?php echo (!empty($value->review))?$value->review:''; ?></p>
                                        </div>
                                        <?php } } ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row m0">
                                <div class="col s12">
                                    <?php echo (!empty($pagelink))?$pagelink: '' ?>
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
        <!-- data table -->
        <script>
            <?php $this->load->view('includes/message'); ?>

            $(document).ready(function(){
                $('#short').on('change',function(event) {
                   var lim = $(this).val();
                   window.location.replace("<?php echo base_url('vendor/reviews/') ?>"+lim);

                });
            });
        </script>

</body>

</html>