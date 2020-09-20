<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $m_titl ?> | Shaadi Baraati</title>
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
                                <h6>Buy Package</h6>
                            </div>
                            <div class="vendor-inputs">
                                <h6 class="pack-head">Package Sheet for Year <?php echo date('Y').'-'.date('Y', strtotime('+1 year')); ?>  Pan India Per City</h6>
                                <div class="pack-detail">
                                    <div class="row">

                                        <?php if (!empty($result)) {
                                           foreach ($result as $key => $value) { ?>

                                            <div class="col l4 m6 s12">
                                            <div class="package-list">
                                                <div class="title-pack">
                                                    <h5><?php echo (!empty($value->title))?ucwords($value->title):''; ?></h5>
                                                    <p>Package Cost <?php echo (!empty($value->price_per))?$value->price_per:''; ?></p>
                                                    <h6><?php echo (!empty($value->price))?'₹ '.$value->price:''; ?></h6>
                                                </div>
                                                <ul class="detail-li">
                                                    <li>Minimum Lead Count : <span><?php echo (!empty($value->leads))?$value->leads:''; ?></span></li>
                                                    <li>List Position : <span><?php echo (!empty($value->list_position))?$value->list_position:''; ?></span></li>
                                                    <li>Banner : <span><?php if(!empty($value->banner)){ echo 'Yes'; }else{ echo 'No'; } ?></span></li>
                                                </ul>
                                                <a href="<?php echo base_url('vendor/buy-package?p='.$value->id.'&t=package') ?>" onclick="return confirm('Are you sure you want to buy this package');" class="buy-pack ">BUY NOW</a>
                                            </div>
                                        </div>
                                         <?php  } } ?> 
                                         
                                        
                                        
                                        
                                        
                                       
                                    </div>
                                </div>
                                <!-- Banner price -->
                                <h6 class="pack-head">Banner Price</h6>
                                <div class="pack-detail">
                                    <div class="row">
                                        <?php if (!empty($banner)) {
                                           foreach ($banner as $bann => $banne) { ?>
                                        <div class="col l4 m6 s12">
                                            <div class="package-list">
                                                <div class="title-pack">
                                                    <h5><?php echo (!empty($banne->title))?ucwords($banne->title):''; ?></h5>
                                                    <p><?php echo (!empty($banne->page))?ucwords($banne->page):''; ?></p>
                                                </div>
                                                <ul class="detail-li">
                                                    <li>12 Month Pack : <span><?php echo (!empty($banne->pack1))?$banne->pack1:''; ?></span></li>
                                                    <li>6 Month Pack : <span><?php echo (!empty($banne->pack2))?$banne->pack2:''; ?></span></li>
                                                    <li>Limit : <span><?php echo (!empty($banne->p_limit))?$banne->p_limit:''; ?></span></li>
                                                    <li>Tenure : <span><?php echo (!empty($banne->tenure))?$banne->tenure:''; ?></span></li>
                                                </ul>
                                                <a href="<?php echo base_url('vendor/buy-package?p='.$banne->id.'&t=banner') ?>"   onclick="return confirm('Are you sure you want to buy this package');" class="buy-pack ">BUY NOW</a>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- buy now -->
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <div class="buy-form">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="inpu-pack  pt">
                                <div class="col l12 s12">
                                    <h4>Buy Your Package</h4>
                                    <p>Package Sheet for Year 2018-2019 - Pan India Per City</p>
                                </div>
                                <a class="modal-close close-op">
                                    <i class="material-icons">close</i></a>
                                <div class="col l6 s12">
                                    <div class="d-input  pt">
                                        <div class="input-field m0 pb">
                                            <input id="packname" type="text" class="validate  in-l" readonly="" value="<?php echo (!empty($value->name))?$value->name:''; ?>"  name="packname" required="">
                                            <label for="packname">Name</label>
                                            <!-- <span class="helper-text red-text">{{ emailError }}</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col l6 s12">
                                    <div class="d-input  pt">
                                        <div class="input-field m0 pb">
                                            <input id="packemail" type="email" class="validate  in-l" readonly="" value="<?php echo (!empty($value->email))?$value->email:''; ?>" name="packemail" required="">
                                            <label for="ackemail">Email</label>
                                            <!-- <span class="helper-text red-text">{{ emailError }}</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col l6 s12">
                                    <div class="d-input  pt">
                                        <div class="input-field m0 pb">
                                            <input id="packvender" type="text" class="validate  in-l" v-model="packvendor" name="packvendor">
                                            <label for="packvender">Vendor Type</label>
                                            <!-- <span class="helper-text red-text">{{ emailError }}</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col l6 s12">
                                    <div class="d-input  pt">
                                        <div class="input-field m0 pb">
                                            <input id="packphone" type="text" class="validate  in-l" readonly="" value="<?php echo (!empty($value->phone))?$value->phone:''; ?>" name="packphone">
                                            <label for="packphone">Phone</label>
                                            <!-- <span class="helper-text red-text">{{ emailError }}</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col l12 s12">
                                    <div class="feedback-input  pt">
                                        <div class="input-field if-feed">
                                            <textarea required id="textarea1" name="packdesc" class="materialize-textarea "></textarea>
                                            <label for="textarea1">Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l12 s12">
                                <button class="waves-effect waves-light btn red plr30 accent-4 white-text">Confirm Your Package</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
        </script>
        <script>
            var demo = new Vue({
                el: '#app',
                data: {
                    packname: '',
                    packemail: '',
                    packvendor: '',
                    packphone: '',
                },
                // methods: {
                //     checkform() {
                //         if (this.packemail && this.packphone) {
                //             return true;
                //         }
                //         this.errors = [];

                //         if (!this.packemail) {
                //             this.errors.push('Enter a correct Email')
                //         }
                //         if (!this.packphone) {
                //             this.errors.push('Enter a correct phone')
                //         }
                //     }
                // },
            })
        </script>
</body>

</html>