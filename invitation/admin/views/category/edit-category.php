<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    
</head>

<body>
    <!-- headder -->
    <div id="header-include">
        <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->
    <!-- first layout -->
    <section class="sec-top">
        <div class="container-wrap">
            <div class="col l12 m12 s12">
                <div class="row">
                    <div id="sidemenu-include">
                        <?php $this->load->view('include/menu.php'); ?>
                    </div>

                    <div class="col m12 s12 l9">
                        <p class="h5-para black-text ">Edit Category</p>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>category/update" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="city-form"
                                        >


                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="category" name="category" class="validate"required value="<?php echo (!empty($result->title)?$result->title:'') ?>"> 
                                                <label for="category">category <span class="red-text">*</span></label>
                                                
                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="<?php echo $result->id ?>">

                                        <div class="col s12 mtb20">
                                            <button class="btn waves-effect waves-light green darken-4 hoverable btn-large"type="submit">Submit <i class="fas fa-paper-plane right"></i> </button> <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- cad end -->
                </div>
            </div>
        </div>
        </div>
    </section>

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>

    <script>
    <?php $this->load->view('include/message.php'); ?>

    </script>

    


</body>

</html>