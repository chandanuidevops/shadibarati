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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/ckeditor/toolbarconfigurator/lib/
        codemirror/neo.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <!-- bar -->
        <style>
        .ck-editor__editable {
        min-height: 300px;
        }
        #vimage-error {
        position: absolute !important;
        bottom: -11px;
        line-height: 0;
        left: 11px !important;
        top: auto;
        }
        .rl{position:relative}
        .rl .btn{max-width: 177px;}
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
                            <p class="para black-text ">Add Product</p>
                            <div class="card">
                                <div class="card-content">
                                    <p class="bold  black-text  mb10 h6">Product Detail</p>
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>product/insert" method="post" id="vendor-form"
                                            enctype="multipart/form-data">
                                            <div class="row m0">
                                                <div class="input-field col s6 l6">
                                                    <input type="text" id="name" name="name" class="validate" required value="<?php echo (!empty($result->name))?$result->name:''; ?>">
                                                    <label for="name">Name <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s6 l6">
                                                    <input type="text" id="sku" name="sku" class="validate" required  value="<?php echo (!empty($result->sku))?$result->sku:''; ?>"
                                                    >
                                                    <label for="sku">Sku <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <p>Stock Detail</p>
                                                    <p class="left">
                                                        <label>
                                                            <input class="with-gap" name="stock" type="radio"  <?php echo ($result->is_stock == '1')?'checked':''; ?> value="1" />
                                                            <span>In Stock</span>
                                                        </label>
                                                    </p>
                                                    
                                                    <p class="left">
                                                        <label>
                                                            <input class="with-gap" name="stock" <?php echo ($result->is_stock == '2')?'checked':''; ?> type="radio" value="2" />
                                                            <span>Out of Stock</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <input type="text" id="mrp" name="mrp" class="validate" required value="<?php echo (!empty($result->mrp))?$result->mrp:''; ?>">
                                                    <label for="mrp">Mrp Price<span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <input type="text" id="Sell_price" name="Sell_price" class="validate" required value="<?php echo (!empty($result->selling_price))?$result->selling_price:''; ?>">
                                                    <label for="Sell_price">Selling Price<span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <select name="category" required="" id="category">
                                                        <option value="">Choose a Category</option>
                                                        <?php if (!empty($category)) { foreach ($category as $key => $value) { ?>
                                                            <option value="<?php echo $value->id ?>" <?php  if($value->id == $result->category){ echo 'selected="true"'; } ?> ><?php echo  $value->title 
                                                            ?></option>'; 
                                                        <?php } } ?>
                                                    </select>
                                                    <label>Category</label>
                                                    <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <select name="sub_category" id="sub_category">
                                                        <option value="">Choose a Sub Category</option>
                                                    </select>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <input type="text" id="discount" name="discount" class="validate" value="<?php echo (!empty($result->discount)?$result->discount:'') ?>">
                                                    <label for="discount">Discount in %</label>
                                                </div>
                                                </div>
                                                <div class="row m0">
                                                <div class="file-field input-field col s12 l6">
                                                    <div class="btn btn-small black-text grey lighten-3">
                                                        <i class="far fa-image left  "></i>
                                                        <span class="">Featured Image</span>
                                                        <input type="file" name="fimage" accept=".png, .jpg, .jpeg, .gif">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                    <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file (eg: .svg ) <br> <span class="bold">Max file size:</span> 512kb  </i> <span class="red-text">*</span></small></h6>
                                                </div>

                                                 <?php if (!empty($result->featured_image)) {?> 
                                                <div class="col s12 l3 m6 ">
                                                <div class="portfolio-img">
                                                    <img class="materialboxed z-depth-1" width="100" style="max-width:100%" src="<?php echo $this->config->item('web_url').'/'.$result->featured_image ?>" style="cursor: pointer;">
                                                </div>
                                            </div>
                                            <?php }  ?>

                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s12 l12">
                                                    <p>Description</p>
                                                    <textarea name="description" id="editor" class="form-control col-md-7 col-xs-12"><?php echo (!empty($result->description))?$result->description:''; ?></textarea>
                                                    
                                                </div>
                                            </div>
                                        <input type="hidden" name="uniq" value="<?php echo random_string('alnum',10) ?>">
                                        <div class="col s12 center mtb20">
                                            <button
                                            class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result"
                                            type="submit">Submit
                                            <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                </div>
                            </div>

                        <div class="card scrollspy" id="portfolio">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>product/other" method="post" style="overflow-y: auto;overflow-x: hidden;" id="vendor-form" enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Other Informations & Images</p>
                                        </div>

                                        <div class="row">

                                            <?php if (!empty($result->images)) {
                                foreach ($result->images as $key => $value) { ?>
                                            <div class="col s12 l3 m6 ">
                                                <div class="portfolio-img">
                                                    <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="<?php echo $this->config->item('web_url')  .$value->image ?>" style="cursor: pointer;">
                                                    <div class="port-delete">
                                                        <a href="#">
                                                            <i class="fas fa-trash"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php } } ?>
                                        </div>

                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l12">
                                                <div class="input-images"></div>
                                                <span class="helper-text" data-error="wrong" data-success="right"><b>Note</b>: Please select only image file (eg:
                                                    .jpg, .png, .jpeg, .gif etc.) <br> <span class="bold">Max file
                                                        size:</span> 2MB <span class="red-text">*</span></span>
                                            </div>
                                        </div>

                                        <div class="row m0">
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="weight" name="weight" class="validate" required value="<?php echo (!empty($result->weight))?$result->weight:''; ?>" >
                                                <label for="weight">Weight <span class="red-text">*</span></label>
                                            </div>
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="dimensions" name="dimensions" class="validate" required value="<?php echo (!empty($result->dimensions))?$result->dimensions:''; ?>" 
                                                >
                                                <label for="dimensions">dimensions <span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="no_insert" name="no_insert" class="validate" value="<?php echo (!empty($result->no_of_insert))?$result->no_of_insert:''; ?>" 
                                                >
                                                <label for="no_insert">No of Inserts </label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="material" name="material" class="validate" value="<?php echo (!empty($result->material))?$result->material:''; ?>" 
                                                >
                                                <label for="material">Material </label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="type" name="type" class="validate" value="<?php echo (!empty($result->type))?$result->type:''; ?>"
                                                >
                                                <label for="type">Type </label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="ceremony" name="ceremony" class="validate" value="<?php echo (!empty($result->ceremony))?$result->ceremony:''; ?>"
                                                >
                                                <label for="Ceremony">Ceremony </label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="orientation" name="orientation" class="validate" value="<?php echo (!empty($result->orientation))?$result->orientation:''; ?>"
                                                >
                                                <label for="orientation">Orientation</label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="print_opt" name="print_opt" class="validate" value="<?php echo (!empty($result->print_option))?$result->print_option:''; ?>"
                                                >
                                                <label for="print_opt">Printing option </label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="size" name="size" class="validate" value="<?php echo (!empty($result->size))?$result->size:''; ?>"
                                                >
                                                <label for="size">Size</label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="gsm" name="gsm" class="validate" value="<?php echo (!empty($result->gsm))?$result->gsm:''; ?>"
                                                >
                                                <label for="gsm">GSM</label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="color" name="color" class="validate" value="<?php echo (!empty($result->color))?$result->color:''; ?>"
                                                >
                                                <label for="color">Color</label>
                                            </div>

                                            <div class="input-field col s6 l6">
                                                <input type="text" id="theme" name="theme" class="validate" value="<?php echo (!empty($result->theme))?$result->theme:''; ?>"
                                                >
                                                <label for="theme">Theme</label>
                                            </div>

                                            
                                        </div>

                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        <div class="col s12 center mtb20">
                                            <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>
    <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>
    <script>
    CKEDITOR.replace('editor');
    $(document).ready(function() {
            $('select').formSelect();
            $('.input-images').imageUploader();
            $(document).on('change','#discount',function(){
            $('#dissatus').val('1');
            });
            $(document).on('change','.packge',function(){
            $('#pcchange').val('1');
            });



            $(document).on('change','#category', function(event) {
            event.preventDefault();
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url();?>product/getSubcategory",
                type: "get",
                dataType: "html",
                data: {
                    'id': id,
                },
                success: function(data) {
                    if(data !=''){
                        $('#sub_category').append(data);
                        $('select').formSelect();
                    }
                }
            });
        });
            
    
    });
    </script>
</body>
</html>