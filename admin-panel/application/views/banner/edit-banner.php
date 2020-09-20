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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <!-- bar -->
    <style>
    .ck-editor__editable {
        min-height: 300px;
    }

    select {
        visibility: hidden;
        display: block;
        position: absolute;
    }

    .img .error {
        position: absolute !important;
        right: 0 !important;
        text-align: right;
        text-transform: capitalize;
    }
    .img-box {
	position: relative;
	box-shadow: 0px 0px 5px 2px #808080db;
    height: 130px;
    overflow: hidden;
    margin-bottom:20px;
}
.img-box img{
    height:100%;
    width:100;
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
    </style>
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
                        <p class="h5-para black-text ">Edit Category Banner</p>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action='<?php echo base_url("category-banner/update/").$uniqId ?>' method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form"
                                        enctype="multipart/form-data">

                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <select id="city" name="city" required>
                                                    <option value="">Choose a city</option>
                                                    <?php if (!empty($cities)) { 
                                                      foreach ($cities as $row => $cit) { ?>

                                                    <option value="<?php echo $cit->id ?>"<?php echo $cit->id == $cId? "selected":''; ?>> <?php echo $cit->city ?></option>
                                                    <?php  } } ?>
                                                </select>
                                                <label for="city">City</label>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <select id="category" name="category" required>
                                                    <option value="">Choose a category</option>
                                                    <?php if (!empty($categories)) { 
                                                      foreach ($categories as $row => $cats) { ?>
                                                    <option value="<?php echo $cats->id ?>"<?php echo $cats->id == $cateId? "selected":''; ?>> <?php echo $cats->category ?></option>

                                                    <?php  } } ?>
                                                </select>
                                                <label for="category">Category</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <?php if(!empty($banner)){foreach($banner as $row){ ?>
                                                <div class="col s3 m3 mb-10">
                                                    <div class="img-box">
                                                        <img src="<?php echo $this->config->item('web_url').'/'.$row->image;?>" alt="" class="responsive-img"">
                                                        <div class=" action-btn">
                                                            <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('category_banner/deleteSingle/'.$row->id.'/'.$row->uniq) ?> " class="red hoverable delete-btn"><i class="fas fa-trash  "></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }}?>
                                        </div>
                                        
                                        <div class=" row m0">
                                                    <div class="col s12 l12">
                                                        <div class="input-field">
                                                            <div class="input-images-1" style="padding-top: .5rem;">
                                                            </div>
                                                        </div>
                                                        <h6 class=" m0"><small> <i><b>Note</b>: Please select only image
                                                                    file
                                                                    (eg: .jpg, .png, .jpeg etc.) <br> <span
                                                                        class="bold">Max
                                                                        file size:</span> 512kb </i> <span
                                                                    class="red-text">*</span></small></h6>
                                                    </div>
                                                </div>

                                                <div class="col s12">
                                                    <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                                    <?php ?>
                                                </div>

                                                <input type="hidden" name="banner_id"
                                                    value="<?php echo random_string('alnum',10) ?>">
                                                    <input name="ipimg" class="ipimg" type="hidden" value="<?php echo $this->uri->segment(3); ?> ">


                                                <div class="col s12 mtb20">
                                                    <button
                                                        class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result"
                                                        type="submit">Submit
                                                        <i class="fas fa-paper-plane right"></i>
                                                    </button>
                                                    <br>
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
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/image-uploader.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>

    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>
    <script>
    $(document).ready(function() {

        $('select').formSelect();

        $("#city-form").validate({
            rules: {
                city: {
                    required: true,
                },
                category: {
                    required: true,
                },
            },
            messages: {
                city: "Please choose a city",
                category: "Please choose category",
            }
        });

    });

    $(function() {
        $('.input-images-1').imageUploader();
    });
    </script>
</body>

</html>