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

    #marqueeplus {
        background-color: #1b5e20;
        padding: 4px 7px;
        color: #fff;
        cursor: pointer;
    }
    .marqaddnext {

background-color: #f4f4f4;
border-radius: 4px;}
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
                        <p class="h5-para black-text ">Edit Category</p>

                        <div class="card">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>category/update" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="city-form"
                                        enctype="multipart/form-data">


                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="category" name="category" class="validate"
                                                    required
                                                    value="<?php echo (!empty($result->category)?$result->category:'') ?>">
                                                <label for="category">category <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                            </div>
                                        </div>

                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="subtitle" name="subtitle" class="validate"
                                                    value="<?php echo (!empty($result->subtitle)?$result->subtitle:'') ?>">
                                                <label for="subtitle">Subtitle </label>
                                                <p><span class="error"><?php echo form_error('subtitle'); ?></span></p>
                                            </div>
                                        </div>


                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Add Image</span>
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg, .gif">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"
                                                        style="border:transparent">
                                                </div>
                                                <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file
                                                            (eg: .svg) <br> <span class="bold">Max file size:</span>
                                                            512kb </i> <span class="red-text">*</span></small></h6>
                                            </div>

                                            <?php if(!empty($result)) {?>
                                            <div class="form-group">
                                                <input type="hidden" name="edit" value="edit">
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class="city-edit-image"
                                                            src="<?php echo $this->config->item('web_url').$result->image ?>"
                                                            alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>

                                        <div class="row ">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Add Icon</span>
                                                    <input type="file" name="icon" accept=".svg, .SVG">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"
                                                        style="border:transparent">
                                                </div>
                                                <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file
                                                            (eg: .svg ) <br> <span class="bold">Max file size:</span>
                                                            512kb </i> <span class="red-text">*</span></small></h6>
                                            </div>

                                            <?php if(!empty($result)) {?>
                                            <div class="form-group">
                                                <input type="hidden" name="edit" value="edit">
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class="city-edit-image"
                                                            src="<?php echo $this->config->item('web_url').$result->icon ?>"
                                                            alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>


                                        </div>


                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Banner Image</span>
                                                    <input type="file" name="banner_image"
                                                        accept=".png, .jpg, .jpeg, .gif">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"
                                                        style="border:transparent">
                                                </div>
                                                <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file
                                                            (eg: .jpg,png,jpeg ) <br> <span class="bold">Max file
                                                                size:</span> 512kb </i> <span
                                                            class="red-text">*</span></small></h6>
                                            </div>

                                            <?php if(!empty($result)) {?>
                                            <div class="form-group">
                                                <input type="hidden" name="edit" value="edit">
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class="city-edit-image"
                                                            src="<?php echo $this->config->item('web_url').$result->banner ?>"
                                                            alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>

                                        </div>
                                        <br><br>



                                        <div class="row m0">
                                            <p class="bold  black-text col  mb10 h6">Information Services</p>
                                        </div>

                                        <?php if (!empty($service)) {
                                               foreach ($service as $key => $value) { ?>

                                        <div class="row m0 marqaddnext">
                                            <div class="input-field col s12 l6">                                                
                                                <input type="text" id="i_title" name="i_title[]" class="validate"
                                                    value="<?php echo (!empty($value->service)?$value->service:'') ?>" >
                                                <label for="i_title">Title <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                            </div>
                                            <div class="file-field input-field col s12 l4">
                                                <img class="city-edit-image datacls" style="border: 1px dotted;"
                                                    src="<?php echo $this->config->item('web_url').$value->image; ?>"
                                                    alt="image" width="250px" id="targetimg<?php echo $key ?>">
                                                <div class="btn btn-small black-text grey lighten-3"
                                                    style="background-color: #151111c2 !important; box-shadow: none; position: absolute;padding: 0px 8px 0px 10px; bottom: 10px; right: 80px;">
                                                    <i class="far fa-edit left m0 "
                                                        style="font-size: 16px;color: #fff;"></i>
                                                    <!-- <span class="">Add Image</span> -->
                                                    <input type="file" name="i_image[]" accept=".png, .jpg, .jpeg, .gif"  image-index="<?php echo $key ?>" class="imagecls" id="profileimg<?php echo $key ?>" value="<?php echo substr($value->image, 16, 40);  ?>">
                                                </div>
                                                <div class="file-path-wrapper" style="display:none;">
                                                    <input class="file-path validate" type="text">
                                                </div>

                                            </div><br>
                                            <div class="col l2">
                                            <a id="brandplus" class="marqueeplus remov" value="<?php echo $value->id; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                        <input type="hidden" value="<?php echo (!empty($value->i_uniq))?$value->i_uniq:random_string('alnum',10); ?>" name="serviceid[]">

                                        <?php  } } ?>
                                        <br>

                                        

                                        <div class="row m0 marqaddnext" id="marqaddnext">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="i_title" name="i_title[]" class="validate" value="<?php echo (!empty($setting)?$setting['name']:'') ?>">
                                                  <label for="i_title">Title <span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                                </div>
                                                <div class="file-field input-field col s12 l4">
                                                    <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                        <span class="">Add Image</span>
                                                        <input type="file" name="i_image[]" accept=".png, .jpg, .jpeg, .gif" >
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" >
                                                    </div>
                                                    
                                                </div><br>
                                                <div class="col l2">
                                                    <a id="marqueeplus" class="marqueeplus "><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                                </div>
                                            </div><br><br>



                                            <div class="row m0">
                                                <p class="bold  black-text col  mb10 h6">FAQ's</p>
                                            </div>


                                            <?php if (!empty($faq)) {
                                               foreach ($faq as $key1 => $value1) { ?>

                                        <div class="row m0 marqaddnext">
                                            <div class="input-field col s12 l5">                                                
                                                <input type="text" id="quest" name="quest[]" class="validate"
                                                    value="<?php echo (!empty($value1->question)?$value1->question:'') ?>" >
                                                <label for="quest">Question <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('quest'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l5">                                                
                                                <input type="text" id="answ" name="answ[]" class="validate"
                                                    value="<?php echo (!empty($value1->answer)?$value1->answer:'') ?>" >
                                                <label for="answ">Answer <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('answ'); ?></span></p>
                                            </div><br>
                                            <div class="col l2">
                                            <a id="marqueeplus1" class="marqueeplus1 remov" value="<?php echo $value1->id; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                        

                                        <?php  } } ?>

                                            <div class="row m0 marqaddnext" id="marqaddnext1">
                                                <div class="input-field col s12 l5">
                                                  <input type="text" id="quest" name="quest[]" class="validate" required value="<?php echo (!empty($setting)?$setting['name']:'') ?>">
                                                  <label for="quest">Question <span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('quest'); ?></span></p>
                                                </div>
                                                <div class="input-field col s12 l5">
                                                  <input type="text" id="answ" name="answ[]" class="validate" value="<?php echo (!empty($setting)?$setting['name']:'') ?>">
                                                  <label for="answ">Answer </label>
                                                  <p><span class="error"><?php echo form_error('answ'); ?></span></p>
                                                </div><br>
                                                <div class="col l2">
                                                    <a id="marqueeplus1" class="marqueeplus1"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                                </div>
                                            </div>



                                        <div class="col s12">
                                            <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                            <?php ?>
                                        </div>

                                        <input type="hidden" name="city_id" value="<?php echo $result->id ?>">
                                        <input type="hidden" name="cat_uniq" value="<?php echo $result->uniq ?>">


                                        <div class="col s12 mtb20">
                                            <button
                                                class="btn waves-effect waves-light green darken-4 hoverable btn-large"
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
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>

    <script>
    <?php $this->load->view('include/message.php'); ?>

    $(document).ready(function() {

        $(".imagecls").change(function(){
            readURL(this);
        });

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#targetimg'+input.attributes[3].value).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }

    });
    </script>

    
<script>
    $(document).ready(function() {

        $(function() {
            $('#marqueeplus').on('click', function(e) {
                e.preventDefault();
                $('<div class="row m0 marqaddnext"> <div class="input-field col s12 l6"> <input type="text" id="i_title" name="i_title[]" class="validate" required > <label for="i_title">Title <span class="red-text">*</span></label> <p><span class="error"><?php echo form_error('category'); ?></span></p> </div> <div class="file-field input-field col s12 l4"> <div class="btn btn-small black-text grey lighten-3"> <i class="far fa-image left  "></i> <span class="">Add Image</span> <input type="file" name="i_image[]" accept=".png, .jpg, .jpeg, .gif" required> </div> <div class="file-path-wrapper"> <input class="file-path validate" type="text"> </div>  </div><br> <div class="col l2"> <a id="brandplus" class="marqueeplus remov"><i class="fa fa-times" aria-hidden="true"></i></a> </div> </div>')
                    .append().insertBefore('#marqaddnext');

            });
            $(document).on('click', '.marqueeplus.remov', function(e) {
                e.preventDefault();
                $(this).closest('div.row').remove();
            });
        });

        $(function() {
            $('#marqueeplus1').on('click', function(e) {
                e.preventDefault();
                $('<div class="row m0 marqaddnext1"> <div class="input-field col s12 l5"> <input type="text" id="quest" name="quest[]" class="validate" required > <label for="quest">Question <span class="red-text">*</span></label> <p> <span class="error"><?php echo form_error('quest'); ?></span></p> </div> <div class="input-field col s12 l5"> <input type="text" id="answ" name="answ[]" class="validate" value="<?php echo (!empty($setting)?$setting['name']:'') ?>"> <label for="answ">Answer </label> <p><span class="error"><?php echo form_error('answ'); ?></span></p> </div><br> <div class="col l2"> <a id="brandplus" class="marqueeplus1 remov"><i class="fa fa-times" aria-hidden="true"></i></a> </div> </div>')
                    .append().insertBefore('#marqaddnext1');

            });
            $(document).on('click', '.marqueeplus1.remov', function(e) {
                e.preventDefault();
                $(this).closest('div.row').remove();
            });
        });

    });
    </script>

<script>

$(document).ready(function() {
    $('.marqueeplus.remov').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        if (!confirm("Are you sure you want to delete this item?")) {
            return false;
        } else {
            $.ajax({
                url: "<?php echo base_url();?>category/deleteInfo",
                type: "get",
                data: {
                    "id": id,
                },
                success: function(data) {
                    if (!empty(data)) {
                        alert('ok');
                    } else {
                        alert('not ok')
                    }
                }
            });
        }

    });

        $('.marqueeplus1.remov').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        if (!confirm("Are you sure you want to delete this item?")) {
            return false;
        } else {
            $.ajax({
                url: "<?php echo base_url();?>category/delfaq",
                type: "get",
                data: {
                    "id": id,
                },
                success: function(data) {
                    if (!empty(data)) {
                        alert('ok');
                    } else {
                        alert('not ok')
                    }
                }
            });
        }

    });

});

</script>

</body>

</html>