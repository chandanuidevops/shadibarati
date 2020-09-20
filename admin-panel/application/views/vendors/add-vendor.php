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
                            <p class="h5-para black-text ">Add Vendor</p>
                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>vendors/insert" method="post" id="vendor-form"
                                            enctype="multipart/form-data">
                                            <div class="row m0">
                                                <div class="input-field col s6 l6">
                                                    <input type="text" id="name" name="name" class="validate" required >
                                                    <label for="name">Name <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s6 l6">
                                                    <input type="text" id="email" name="email" class="validate" required
                                                    value="<?php echo (!empty($setting)?$setting['email']:'') ?>">
                                                    <label for="email">Email <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                    <input type="text" id="phone" name="phone" class="validate" required
                                                    value="<?php echo (!empty($setting)?$setting['phone']:'') ?>">
                                                    <label for="phone">Phone No.<span class="red-text">*</span></label>
                                                </div>
                                                <?php if($this->session->userdata('sha_type') =='1'){ ?>
                                                <div class="input-field col s12 l6">
                                                    <select name="package" class="packge">
                                                        <option value="0">Free Listing</option>
                                                        <?php if (!empty($package)) {
                                                        foreach ($package as $pack => $packg) { ?>
                                                        <option value="<?php echo (!empty($packg))?$packg->id:''; ?>"><?php echo (!empty($title))?$packg->title:''; ?></option>
                                                        <?php }
                                                        } ?>
                                                        
                                                    </select>
                                                    <label>Packages</label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                            
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="price" name="price" class="validate"
                                                value="<?php echo (!empty($setting)?$setting['price']:'') ?>">
                                                <label for="price">Sarting Price <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('price'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="price_for" name="price_for" class="validate"
                                                value="<?php echo (!empty($result->price_for)?$result->price_for:'') ?>">
                                                <label for="price_for">Price Per</label>
                                                <p><span class="error"><?php echo form_error('price_for'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <select name="category" required="">
                                                    <option value="">Choose a category</option>
                                                    <?php if (!empty($category)) { foreach ($category as $key => $value) { echo '<option value="'.$value->id.'">'.$value->category.'</option>'; } } ?>
                                                </select>
                                                <label>Category</label>
                                                <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <select name="city" required="">
                                                    <option value="">Choose a City</option>
                                                    <?php if (!empty($city)) { foreach ($city as $key => $value) { echo '<option value="'.$value->id.'">'.$value->city.'</option>'; } } ?>
                                                </select>
                                                <label>City</label>
                                                <p><span class="error"><?php echo form_error('city'); ?></span></p>
                                            </div>
                                            <?php if($this->session->userdata('sha_type') =='1'){ ?>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="discount" name="discount" class="validate" value="<?php echo (!empty($result->discount)?$result->discount:'') ?>">
                                                <label for="discount">Discount in %</label>
                                            </div>
                                            <?php } ?>
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Add Image</span>
                                                    <input type="file" name="vimage" accept=".png, .jpg, .jpeg, .gif">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file (eg: .svg ) <br> <span class="bold">Max file size:</span> 550KB  </i> <span class="red-text">*</span></small></h6>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <p>
                                                  <label>
                                                    <input type="checkbox" name="v_verify" value="1" />
                                                    <span>Verified Vendor</span>
                                                  </label>
                                                </p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <p>
                                                  <label>
                                                    <input type="checkbox" name="v_chat" value="1" />
                                                    <span>Video Chat available</span>
                                                  </label>
                                                </p>
                                            </div>

                                             <div class="input-field col s12 l6">
                                                <input type="text" id="c_person" name="c_person" class="validate"
                                                value="<?php echo (!empty($result->c_person)?$result->c_person:'') ?>">
                                                <label for="c_person">Contact Person</label>
                                            </div>

                                            <div class="input-field col s12 ">
                                                <textarea id="textarea1" name="address" class="materialize-textarea"></textarea>
                                                <label for="textarea1">Address</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="dissatus" id="dissatus" >
                                        <input type="hidden" name="pcchange" id="pcchange" >
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' ?> <?php ?>
                                        </div>
                                        <input type="hidden" name="uniq"
                                        value="<?php echo random_string('alnum',10) ?>">
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
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>
    <script>
    <?php $this->load-> view('include/message.php'); ?>
    </script>
    <script>
    $(document).ready(function() {
    $('select').formSelect();
    $(document).on('change','#discount',function(){
    $('#dissatus').val('1');
    });
    $(document).on('change','.packge',function(){
    $('#pcchange').val('1');
    });
    
    
    });
    </script>
</body>
</html>