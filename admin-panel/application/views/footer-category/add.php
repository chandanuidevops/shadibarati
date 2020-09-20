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
        <!-- bar -->
        <style>
        .ck-editor__editable {
        min-height: 300px;
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
                            <p class="h5-para black-text ">Add Content</p>
                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>f_category/insert" method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form" enctype="multipart/form-data">
                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                    <select id="city" name="city" required="">
                                                        <option value="">Choose a city</option>
                                                        <?php if (!empty($cities)) {

                                                            echo '<option value="all" >All City</option>';

                                                        foreach ($cities as $row => $cit) { ?>
                                                        <option value="<?php echo $cit->id ?>"> <?php echo $cit->city ?></option> <?php  } } ?> </select>
                                                        <label for="city">City</label>
                                                    </div>
                                                    <div class="input-field col s12 l6">
                                                        <select id="category" name="category" required="">
                                                            <option value="">Choose a Category</option>
                                                            <?php if (!empty($categories)) {
                                                                echo '<option value="all" >All Category</option>';
                                                            foreach ($categories as $row => $cats) { ?>
                                                            <option value="<?php echo $cats->id ?>"> <?php echo $cats->category ?></option> <?php  } } ?>
                                                        </select>
                                                        <label for="category">Category</label>
                                                    </div>
                                                </div>
                                                    <input type="hidden" name="uniq" value="<?php echo random_string('alnum',10) ?>">
                                                <br>

                                                <div class="row m0">
                                                    <p class="bold  black-text col  mb10 h6">Vendor Type</p>
                                                </div>
                                                <div class="row m0 marqaddnext" id="marqaddnext1">
                                                    <div class="input-field col s12 l4">
                                                      <input type="text" id="quest" name="type[]" class="validate" required>
                                                      <label for="quest">Type </label>
                                                    </div>
                                                    <div class="input-field col s12 l4">
                                                      <input type="text" id="type" name="type[]" class="validate">
                                                      <label for="type">Type </label>
                                                    </div><br>
                                                    <div class="col l2">
                                                        <a id="marqueeplus1" class="marqueeplus"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                                    </div>
                                                </div><br>
                                                <div class="row m0">
                                                    <p class="bold  black-text col  mb10 h6">Vendor Categories</p>
                                                </div>
                                                <div class="row m0 marqaddnext2" id="marqaddnext2">
                                                    <div class="input-field col s12 l4">
                                                      <input type="text" id="vcategory" name="vcategory[]" class="validate" required>
                                                      <label for="vcategory">Category </label>
                                                    </div>
                                                    <div class="input-field col s12 l4">
                                                      <input type="text" id="vcategory" name="vcategory[]" class="validate">
                                                      <label for="vcategory">Category </label>
                                                    </div><br>
                                                    <div class="col l2">
                                                        <a id="marqueeplus2" class="marqueeplus"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                                    </div>
                                                </div><br>
                                                <div class="row m0">
                                                    <p class="bold  black-text col  mb10 h6">Popular</p>
                                                </div>
                                                <div class="row m0 marqaddnext2" id="marqaddnext3">
                                                    <div class="input-field col s12 l5">
                                                      <input type="text" id="popular" name="popular[]" class="validate" required>
                                                      <label for="popular">Popular </label>
                                                    </div>
                                                    <div class="input-field col s12 l5">
                                                      <input type="text" id="link" name="link[]" class="validate">
                                                      <label for="link">Link </label>
                                                    </div><br>
                                                    <div class="col l2">
                                                        <a id="marqueeplus3" class="marqueeplus"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                                    </div>
                                                </div>
                                                <div class="col s12 mtb20">
                                                    <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit
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
            <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
            <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
            <script>
            <?php $this->load->view('include/message.php'); ?>
            
            </script>
            <script>
            $(document).ready(function() {
            $('select').formSelect();
            $("select").css({display: "inline", height: 0, padding: 0, width: 0});
            $("#city-form").validate({
                rules: {
                city: { required: true, },
                category:{ required: true, }
                },
                messages: {
                city: "Please select a city",
                category: "Please select a category",
                }
            });



            $(function() {
                $('#marqueeplus1').on('click', function(e) {
                    e.preventDefault();
                    $('<div class="row m0 marqaddnext1"> <div class="input-field col s12 l4"><input type="text" id="type" name="type[]" class="validate"><label for="type">Type </label> </div> <div class="input-field col s12 l4"> <input type="text" id="type" name="type[]" class="validate"> <label for="type">Type </label> </div><br> <div class="col l2"> <a id="brandplus" class="marqueeplus1 remov"><i class="fa fa-times" aria-hidden="true"></i></a> </div> </div>')
                        .append().insertBefore('#marqaddnext1');

                });
                $(document).on('click', '.marqueeplus1.remov', function(e) {
                    e.preventDefault();
                    $(this).closest('div.row').remove();
                });
            });


            $(function() {
                $('#marqueeplus2').on('click', function(e) {
                    e.preventDefault();
                    $('<div class="row m0 marqaddnext1"> <div class="input-field col s12 l4"><input type="text" id="vcategory" name="vcategory[]" class="validate" required> <label for="vcategory">Category </label> </div> <div class="input-field col s12 l4"> <input type="text" id="vcategory" name="vcategory[]" class="validate" required> <label for="vcategory">Category </label> </div><br> <div class="col l2"> <a id="brandplus1" class="marqueeplus2 remov"><i class="fa fa-times" aria-hidden="true"></i></a> </div> </div>')
                        .append().insertBefore('#marqaddnext2');

                });
                $(document).on('click', '.marqueeplus2.remov', function(e) {
                    e.preventDefault();
                    $(this).closest('div.row').remove();
                });
            });


            $(function() {
                $('#marqueeplus3').on('click', function(e) {
                    e.preventDefault();
                    $('<div class="row m0 marqaddnext1"> <div class="input-field col s12 l5"><input type="text" id="popular" name="popular[]" class="validate" required> <label for="popular">Popular </label> </div> <div class="input-field col s12 l5"> <input type="text" id="link" name="link[]" class="validate" required> <label for="link">Link </label> </div><br> <div class="col l2"> <a id="brandplus2" class="marqueeplus3 remov"><i class="fa fa-times" aria-hidden="true"></i></a> </div> </div>')
                        .append().insertBefore('#marqaddnext3');

                });
                $(document).on('click', '.marqueeplus3.remov', function(e) {
                    e.preventDefault();
                    $(this).closest('div.row').remove();
                });
            });



            });
            </script>
           
        </body>
    </html>