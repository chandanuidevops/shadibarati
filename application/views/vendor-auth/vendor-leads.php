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
                            <div class="vendor-head">
                                <h6>Leads</h6>
                            </div>
                            <div class="vendor-inputs">
                                <div class="table-css">
                                    <p class="h5-para-p2">Enquiries</p>
                                    <div class="leads-list ">
                                        <table id="dynamic" class="striped">
                                            <thead>
                                                <tr class="tt">
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Enquired On</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
        
                                            if (!empty($result)) {
                                              $count= 0;
                                              foreach ($result as $key => $value) { $count += 1;                                        
                                              ?>
                                                    <tr class="lead-tr">
                                                        <td>
                                                            <a href="<?php echo base_url('vendor/leads/'.$value->id.'') ?>">
                                                                <?php echo (!empty($result))?$count:'---'  ?>
                                                            </a>
                                                        </td>
                                                        <td><a class="text-ext" href="<?php echo base_url('vendor/leads/'.$value->id.'') ?>"><?php echo (!empty($value->user_name))?$value->user_name:'---'  ?></a></td>
                                                        <td><a href="<?php echo base_url('vendor/leads/'.$value->id.'') ?>"><?php echo (!empty($value->user_email))?$value->user_email:'---'  ?></a></td>
                                                        <td><a href="<?php echo base_url('vendor/leads/'.$value->id.'') ?>"><?php echo (!empty($value->user_phone))?$value->user_phone:'---'  ?></a></td>
                                                        <td><a href="<?php echo base_url('vendor/leads/'.$value->id.'') ?>"><?php echo (!empty($value->date))?date("M d, Y ", strtotime($value->date)):'---'; ?></a></td>
                                                        <td class="action-btn  center-align">
                                                            <!-- view user -->
                                                            <a href="<?php echo base_url('vendor/leads/'.$value->id.'') ?>" class=" lead-view hoverable"><i class="material-icons dp48 white-text">remove_red_eye</i></a>
                                                            <!-- view user -->
                                                        </td>

                                                    </tr>

                                                    <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
        <!-- data table -->
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
        <script>
            <?php $this->load->view('includes/message'); ?>
        </script>

        <script>
            $(document).ready(function() {
                var table = $('table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'csv'
                    ]

                });
                $('select').formSelect();
            });
        </script>
</body>

</html>