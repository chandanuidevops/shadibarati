<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">

    <style type="text/css">
    .dash-list a .list-dashboard {
        transition: 0.5s
    }

    .dash-list a:hover .list-dashboard {
        transform: scale(1.1);
        background: #f3f3f3 !important
    }

    .mb-10 {
        margin-bottom: 15px
    }
    .img-box img{
    height:100%;
    width:100;
}
    .img-box {
	position: relative;
	box-shadow: 0px 0px 5px 2px #808080db;
    height: 130px;
    overflow: hidden;
    margin-bottom:20px;
}

    .img-box:hover .action-btn {
        display: block;
    }

    .action-btn {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .shorting-table {
	padding: 10px 30px;
}
    </style>
</head>

<body>
    <!-- headder -->
    <div id="header-include">
        <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->
    <!-- main layout -->
    <section class="sec-top">
        <div class="container-wrap">

            <div class="row">
                <div id="sidemenu-include">
                    <?php $this->load->view('include/menu.php'); ?>
                </div>

                <div class="col m12 s12 l9">
                    <div class="main-bar">
                        <div class="row">
                        <div class="col 12 m6">
                                    <p class="h5-para black-text m0">Category Banner Details</p>
                                </div>
                                <div class="col 12 m6 right-align">
                                    <a href="<?php echo base_url('category-banner/edit/'.$uniq.'') ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable "><i class="fas fa-edit left"></i> Edit  Banner</a>
                                </div>
                        </div>
                        <!-- end dash -->
                        <!-- chart-table -->
                        <!-- shorting -->
                        <div class="shorting-table mb-10">
                        <p class="h5-para black-text mb-10">Category </p>
                            <div class="row mb0">
                                <div class="col s12 m6 l6 mb-10">
                                    <div class="row">
                                          <table>
                                             <tr>
                                                <td><i class="far fa-user mr10"></i>City:</td>
                                                <td><?php echo $city ?></td>
                                             </tr>
                                             <tr>
                                                <td><i class="fas fa-venus-mars mr10"></i>Category:</td>
                                                <td><?php echo $category ?></td>
                                             </tr>
                                          </table>
                                      
                                    </div>
                                </div>
                               
                                  
                              </div>
                              
                        </div>
                        <div class="shorting-table ">
                        <p class="h5-para black-text mb-10"> Banners</p>
                        <div class=" row">
                                        <?php if(!empty($banner)){
                              foreach($banner as $row){
                              ?>
                                        <div class="col s12 m4 l3 mb-10">
                                            <div class="img-box">
                                                <img src="<?php echo $this->config->item('web_url').'/'.$row->image;?>"
                                                    alt="" class="responsive-img"">
                                                    <div class=" action-btn">
                                                            <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('category_banner/deleteSingle/'.$row->id.'/'.$row->uniq) ?> " class="red hoverable delete-btn"><i class="fas fa-trash  "></i></a>
                                                        </div>
                                        </div>

                                    </div>
                                    <?php }}?>
                                </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
    </section>

    <!-- end footer -->
    <script type=" text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js">
    </script>
    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>

    <script>
    $(document).ready(function() {
        $('table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
        });
        $('select').formSelect();
    });
    </script>

</body>

</html>