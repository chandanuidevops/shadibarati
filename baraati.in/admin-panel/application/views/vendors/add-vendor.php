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
                                                <input type="text" id="name" name="name" class="validate" required
                                                    value="<?php echo (!empty($setting)?$setting['name']:'') ?>">
                                                <label for="name">Name <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                            </div>
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="email" name="email" class="validate" required
                                                    value="<?php echo (!empty($setting)?$setting['email']:'') ?>">
                                                <label for="email">Email <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="phone" name="phone" class="validate" required
                                                    value="<?php echo (!empty($setting)?$setting['phone']:'') ?>">
                                                <label for="phone">Phone No.<span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                              <select name="package" required>
                                                <option value="Wed Elite">Wed Elite</option>
                                                <option value="Wed Leader">Wed Leader</option>
                                                <option value="Wed Assisted">Wed Assisted</option>
                                                <option value="Wed Gold">Wed Gold</option>
                                                <option value="Wed Premium">Wed Premium</option>
                                                <option value="Wed Featured">Wed Featured</option>
                                                <option value="Free Listing">Free Listing</option>
                                              </select>
                                              <label>Packages</label>
                                            </div>
                                            
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="price" name="price" class="validate" required
                                                    value="<?php echo (!empty($setting)?$setting['price']:'') ?>">
                                                <label for="price">Sarting Price <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('price'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="price_for" name="price_for" class="validate"
                                                    required
                                                    value="<?php echo (!empty($result->price_for)?$result->price_for:'') ?>">
                                                <label for="price_for">Price Per<span class="red-text"> *</span></label>
                                                <p><span class="error"><?php echo form_error('price_for'); ?></span></p>
                                            </div>

                                            

                                        </div>

                                        <div class="row m0">
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

                                        </div>

                                      <div class="row m0">
                                      <div class="file-field input-field col s12 l12 rl">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Profile Image</span>
                                                    <input type="file" name="vimage" accept=".png, .jpg, .jpeg, .gif"
                                                        required>
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <span class="helper-text"><b>Note</b>: Please select only image file
                                                    (eg: .jpg, .png, .jpeg, .gif etc.) <br> <span class="bold">Max file
                                                        size:</span> 512kb <span class="red-text">*</span></span>
                                            </div>
                                      </div>

                                        <div class="row">
                                          <div class="input-field col s12 ">
                                            <textarea id="textarea1" name="address" class="materialize-textarea"></textarea>
                                            <label for="textarea1">Address</label>
                                          </div>
                                        </div>


                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' ?> <?php ?>
                                        </div>
                                        <input type="hidden" name="uniq"
                                            value="<?php echo random_string('alnum',10) ?>">

                                        <div class="col s12 center mtb20">
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
    <?php $this->load-> view('include/message.php'); ?>
    </script>
    <script>
    $(document).ready(function() {
        $('select').formSelect();

        $("#vendor-form").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                category: {
                    required: true,
                },
                city: {
                    required: true,
                },
                vimage: {
                    required: true,
                },
                package:{
                  required: true,
                }
            },
            messages: {

                name: "Please enter a vendor Name",
                email: "Please enter a vendor Email",
                phone: "Please enter a vendor Phone Number",
                category: "Please Select the Category",
                city: "Please Select the City",
                vimage: "Please choose your profile image",
                package: "Please Select the Package",
            }
        });
    });
    </script>

</body>

</html>