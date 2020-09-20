<?php 
$this->ci =& get_instance();
$this->load->model('m_vendors'); 

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $title ?>
    </title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <!-- bar -->
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        
        .currencyinput {
            border: 1px inset #ccc;
        }
        
        .currencyinput input {
            border: 0;
        }
        
        .input-field .prefix~input,
        .input-field .prefix~label {
            margin-left: 10rem;
        }
        
        .input-field .prefix {
            font-size: 1rem;
        }
        
        #youtube-link,
        #fb-link {
            display: none;
        }
        
        .faqform {
            padding: 30px !important;
            border-bottom: 1px dotted #cecece;
        }
        
        .faqform:last-child {
            padding: 0px;
            border-bottom: 0px dotted #cecece;
        }
        
        .faqform .addfaq {
            visibility: hidden;
        }
        
        .faqform:last-child .addfaq {
            visibility: visible;
        }
        
        .faqform:last-child .closefaq {
            visibility: hidden;
        }
        
        .stcky-nav {
            position: sticky;
            top: 65px;
            z-index: 9999;
            background-color: #fff;
        }
        
        .portfolio-img {
            position: relative;
            overflow: hidden;
            margin-bottom: 10px;
        }
        
        .portfolio-img:hover .port-delete {
            top: 0;
        }
        
        .port-delete {
            position: absolute;
            text-align: center;
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            height: 100%;
            line-height: 100px;
        }
        
        .port-delete i {
            color: red;
            font-size: 18px;
        }
        
        .vid-delete {
            position: relative;
            text-align: center;
            width: 100%;
            background: #fff;
            padding: 4px;
            top: -5px;
            border: 1px dotted;
        }
        
        .vid-delete i {
            color: red;
            font-size: 18px;
        }
        
        .i-img {
            width: 50px !important;
            height: auto;
            max-height: 95px;
        }
        #modal1{
            z-index: 99999 !important;
        }
        .portfolio-img.video-thumb{
            min-height: 250px;
            max-height: 250px;
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
                        <div class="row">
                           <div class="col 12 m6">
                                <p class="h5-para black-text  m0">Update Vendor </p>
                               <!--   <a href="<?php echo base_url('vendors/seo-data/'.$result->id) ?>"  class="add-seo-btn"><i class="fas fa-edit "></i><span>Seo Data</span></a> -->
                            </div> 
                            <div class="col 12 m6 right-align">
                                <a class="waves-effect waves-light btn modal-trigger blue " href="#modal1">Reset Password</a>

                                <a href="<?php echo base_url('vendors/view/'.$result->id)  ?>" class="waves-effect waves-light btn blue darken-4 white-text hoverable ">view
                                    Vendor</a>
                                    <?php if ($result->is_active == '3') { ?>
                                       <a onclick="return confirm('Are you sure you want to Approve this vendor?');" href="<?php echo base_url('vendor/approval/'.$result->id)  ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable ">Approve Vendor</a>

                                       <a onclick="return confirm('Are you sure you want to Reject this vendor?');" href="<?php echo base_url('vendor/reject/'.$result->id)  ?>" class="waves-effect waves-light btn red darken-4 white-text hoverable ">Reject Vendor</a>
                                    <?php } ?>

                                <?php
                                if ((!empty($result->is_active)) && $result->is_active == '1') { ?>
                                <a href="<?php echo base_url('users/block/'.$result->id.'') ?>"
                                    class="waves-effect waves-light btn red hoverable white-text darken-4 plr40"
                                id="block">Block</a>
                                <?php }elseif ((!empty($result->is_active)) && $result->is_active == '2') { ?>
                                <a href="<?php echo base_url('users/unblock/'.$result->id.'') ?>"
                                    class="waves-effect waves-light btn green hoverable white-text darken-4 plr40"
                                id="unblock">Unblock</a>
                                <?php } ?>
                                <a href="<?php echo base_url('users/block/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn red hoverable white-text darken-4 plr40"
                                                            id="block" style="display: none">Block</a>
                                                        <a href="<?php echo base_url('users/unblock/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn green hoverable white-text darken-4 plr40"
                                                            id="unblock" style="display: none">Unblock</a>
                                                        <input type="hidden" name="userid" id="userid"
                                                            value="<?php echo $result->id ?>">

                                
                            </div>
                        </div>



                        <div id="modal1" class="modal">
                        <div class="modal-content">
                          <form action="<?php echo base_url('vendors/reset_pass') ?>" method="post" id="admin-forms" enctype="multipart/form-data">
                            <div class="row m0">
                              <div class="input-field col s12 l6">
                                <input type="password" id="password" name="password" class="validate" required >
                                <input type="hidden" name="eid" value="<?php echo (!empty($result->id))?$result->id:''; ?>">
                                <label for="password">New Password<span class="red-text">*</span></label>
                              </div>
                            </div>
                            <button class="btn waves-effect waves-light green darken-4 hoverable btn-large " type="submit">Submit
                                <i class="fas fa-paper-plane right"></i>
                                </button>
                          </form>
                        </div>
                      </div>
              



                        <div class="tab-buttons show-on-large hide-on-med-and-down stcky-nav z-depth-1">
                            <ul class="tabs1 transparent">
                                <li class="tab1 col s2"><a href="#personal-detail" class="active">Profile</a></li>
                                <li class="tab1 col s2"><a href="#information" class="">Information & Service</a></li>
                                <li class="tab1 col s1"><a href="#about" class="">About</a></li>
                                <li class="tab1 col s2"><a href="#portfolio" class="">Portfolio</a></li>
                                <li class="tab1 col s2"><a href="#video" class="">Video Links</a></li>
                                <li class="tab1 col s1"><a href="#faq" class="">FAQ's</a></li>
                                <li class="tab1 col s2"><a href="#offer" class="">Offers</a></li>
                                <li class="tab1 col s2"><a href="#seo" class="">SEO</a></li>
                            </ul>
                        </div>

                        <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/insert" method="post" id="vendor-form" enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Profile</p>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="name" name="name" class="validate" required value="<?php echo (!empty($result->name)?$result->name:'') ?>">
                                                <label for="name">Name <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                            </div>
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="email" name="email" class="validate" required value="<?php echo (!empty($result->email)?$result->email:'') ?>">
                                                <label for="email">Email <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="phone" name="phone" class="validate" required value="<?php echo (!empty($result->phone)?$result->phone:'') ?>">
                                                <label for="phone">Phone No.<span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <select name="package" class="packge">
                                                    <option value="0">Free Listing</option>

                                                    <?php if (!empty($package)) {
                                                    foreach ($package as $pack => $packg) { ?>
                                                         <option value="<?php echo (!empty($packg))?$packg->id:''; ?>" <?php if($packg->id == $result->package ){ echo 'selected';  } ?>><?php echo (!empty($title))?$packg->title:''; ?></option>
                                                   <?php }
                                                } ?>

                                                
                                              </select>
                                                <label>Packages</label>
                                            </div>

                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="price" name="price" class="validate" value="<?php echo (!empty($result->price)?$result->price:'') ?>">
                                                <label for="price">Starting Price <span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('price'); ?></span></p>
                                                <?php if (!empty($result)) { ?>
                                                <input type="hidden" value="1" name="edit">
                                                <?php } ?>
                                                <input type="hidden" value="<?php echo (!empty($result->uniq)?$result->uniq:random_string('alnum',10)) ?>" name="uniq">
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="price_for" name="price_for" class="validate" value="<?php echo (!empty($result->price_for)?$result->price_for:'') ?>">
                                                <label for="price">Price Per<span                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('price_for'); ?></span></p>
                                            </div>


                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <select name="category"> <option value="">Choose a category</option> <?php if (!empty($category)) { foreach ($category as $key => $value) { ?> <option value="<?php echo $value->id ?>"                           <?php echo $value->id == $result->category?"selected":''; ?>> <?php echo $value->category ?></option> <?php } } ?> </select>
                                                <label>Category</label>
                                                <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <select name="city"> <option value="">Choose a City</option> <?php if (!empty($city)) { foreach ($city as $key => $value) { ?> <option value="<?php echo $value->id ?>" <?php echo $value->id == $result->city?"selected":''; ?>> <?php echo $value->city ?></option> <?php } } ?> </select>
                                                <label>City</label>
                                                <p><span class="error"><?php echo form_error('city'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="discount" name="discount" class="validate" value="<?php echo (!empty($result->discount)?$result->discount:'') ?>">
                                                <label for="price">Discount<span                                                        class="red-text">*</span></label>
                                            </div>
                                        </div>


                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Profile Image</span>
                                                    <input type="file" name="vimage" accept=".png, .jpg, .jpeg, .gif"
                                                        <?php echo (!empty($result)?'':'required') ?>>
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <span class="helper-text"><b>Note</b>: Please select only image file
                                                    (eg: .jpg, .png, .jpeg etc.) <br> <span class="bold">Max file
                                                        size:</span> 550KB <span class="red-text">*</span></span>
                                            </div>

                                             <?php if (!empty($result->profile_file)) {?> 
                                                <div class="col s12 l3 m6 ">
                                                <div class="portfolio-img">
                                                    <img class="materialboxed z-depth-1" width="100" style="max-width:100%" src="<?php echo $this->config->item('web_url').'/'.$result->profile_file ?>" style="cursor: pointer;">
                                                </div>
                                            </div>
                                            <?php }  ?>

                                        </div>

                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <p>
                                                  <label>
                                                    <input type="checkbox" name="v_verify" <?php if(!empty($result->verified)){ echo "checked"; }?> value="1"      class="filled-in"/>
                                                    <span>Verified Vendor</span>
                                                  </label>
                                                </p>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <p>
                                                  <label>
                                                    <input type="checkbox" name="v_chat" <?php if(!empty($result->v_chat)){ echo "checked"; }   ?> value="1" class="filled-in" />
                                                    <span>Video Chat available</span>
                                                  </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="c_person" name="c_person" class="validate"
                                                value="<?php echo (!empty($result->c_person)?$result->c_person:'') ?>">
                                                <label for="c_person">Contact Person</label>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 ">
                                                <textarea id="textarea1" name="address" class="materialize-textarea"><?php echo (!empty($result->address)?$result->address:'') ?></textarea>
                                                <label for="textarea1">Address</label>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <?php
                                                        echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                        ?>
                                                <?php ?>
                                        </div>
                                        <input type="hidden" name="vendor_id" value="<?php echo random_string('alnum',10) ?>">
                                        <input name="vid"  type="hidden" value="<?php echo $this->uri->segment(3)
                                         ?>">
                                         <input type="hidden" name="dissatus" id="dissatus" >
                                         <input type="hidden" name="pcchange" id="pcchange" >
                                        
                                        <div class="col s12 center mtb20">
                                            <button class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result" type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card scrollspy" id="information">
                            <div class="card-content">
                                <div class="form-container">
                                    <div class="row m0">
                                        <p class="bold  black-text col  mb10 h6">Information and Service</p>
                                    </div>


                                    <form action="<?php echo base_url() ?>vendors/service" method="post" id="">
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">

                                        <?php foreach ($service as $ser => $serv) { ?>

                                        <div class="row m0" id="info-form">
                                            <div class="input-field col s12 l4">
                                                <input type="hidden" id="serv" name="serv[]" class="validate" value="<?php echo (!empty($serv->id)?$serv->id:'') ?>">
                                                <input type="text" readonly value="<?php echo (!empty($serv->service)?$serv->service:'') ?>">
                                                <label for="serv">Title </label>
                                                <p><span class="error"><?php echo form_error('serv'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l4">
                                                <input type="text" id="sr_subtitle" name="sr_subtitle[]" class="validate" value="<?php echo $this->ci->m_vendors->getSubtitle($serv->id, $result->id) ?>">
                                                <label for="sr_subtitle">Subtitle </label>
                                                <p><span class="error"><?php echo form_error('sr_subtitle'); ?></span></p>
                                            </div>
                                            <div class="col s12 m4">
                                                <div class="form-group">
                                                    <div class="" id="edt-image">
                                                        <div class="image view view-first">
                                                            <img class="city-edit-image i-img" src="<?php echo $this->config->item('web_url').$serv->image ?>" alt="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <?php } ?>


                                        <div class="col s12 input-field">
                                            <button class="btn waves-effect waves-light green darken-4 hoverable " type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="card scrollspy" id="about">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/insert_about" method="post" id="vendor-about" enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">About Vendor</p>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 l12">
                                                <label for="description" class="mb10">About Vendor<span
                                                        class="red-text">*</span></label>
                                                <textarea name="about" id="description"><?php echo (!empty($result->detail)?$result->detail:'') ?></textarea>
                                                <p><span class="error"><?php echo form_error('about'); ?></span></p>
                                            </div>
                                        </div>


                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        <div class="col s12">
                                            <?php
                                                                echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                                ?>
                                                <?php ?>
                                        </div>
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
                        <div class="card scrollspy" id="portfolio">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/portfolio_insert" method="post" style="overflow-y: auto;overflow-x: hidden;" id="vendor-form" enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Portfolio Images</p>
                                        </div>

                                        <div class="row">

                                            <?php if (!empty($port)) {
                                foreach ($port as $key => $value) { ?>
                                            <div class="col s12 l3 m6 ">
                                                <div class="portfolio-img">
                                                    <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="<?php echo $this->config->item('web_url').'/vendor-portfolio/'.$value->thumb_image ?>" style="cursor: pointer;">
                                                    <div class="port-delete">
                                                        <a href="<?php echo base_url('vendors/gallery_delete/').$value->id.'/'.$result->id ?>">
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
                                                        size:</span> 550KB <span class="red-text">*</span></span>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''; ?>
                                        </div>
                                        <input type="hidden" name="vendor_id" value="<?php echo random_string('alnum',10) ?>">
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
                        <div class="card scrollspy" id="video">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/add-video" method="post" style="overflow-y: auto;overflow-x: hidden;" id="vendor-form" enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Video Links</p>
                                        </div>

                                        <div class="row m0">

                                            <?php //youtube
                                        if (!empty($video)) {
                                        foreach ($video as $vide => $vids) {
                                        	
                                        	echo "<pre>";
                                            print_r ($vids);
                                            echo "</pre>";

                                        if ($vids->type == '1') {  
                                            $vidlink = explode("?v=",$vids->link);
                                            if (!empty($vidlink[1])) {
                                                $vidlinks = $vidlink[1];
                                            }else{
                                                $vidlinks = $vids->link;
                                            }

                                            ?>
                                            <div class="col s12 l3 m6 ">
                                                <div class="portfolio-img video-thumb">
                                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $vidlinks ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <div class="vid-delete">
                                                        <a  onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('vendors/video_delete/').$vids->id.'/'.$result->id ?>">
                                                            <i class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }else if ($vids->type == '2'){  

                                            $vidlink = explode("facebook.com/",$vids->link);
                                            if (!empty($vidlink[1])) {
                                                $vidlinks = $vidlink[1];
                                            }else{
                                                $vidlinks = $vids->link;
                                            }


                                            ?>
                                            <div class="col s12 l3 m6 ">
                                                <div class="portfolio-img video-thumb">
                                                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo str_replace(" / ","%2F ",$vidlinks); ?>&show_text=0&width=476" width="auto" height="200" style="border:none;overflow:auto" scrolling="no" frameborder="0"
                                                        allowTransparency="true" allowFullScreen="true"></iframe>
                                                    <div class="vid-delete">
                                                        <a  onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('vendors/video_delete/').$vids->id.'/'.$result->id ?>"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php } } } ?>
                                        </div>


                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <select name="vd_category" required="" id="vd_category">
                                                    <option value="">Choose a category</option>
                                                    <option value="1">Youtube</option>
                                                    <option value="2">Facebook</option>
                                                </select>
                                                <label>Category</label>
                                                <p><span class="error"><?php echo form_error('category'); ?></span></p>
                                                <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                            </div>
                                        </div>
                                        <div class="row m0" id="youtube-link">
                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vd_link" id="autocomplete-input" class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://www.youtube.com/watch?v=d-4cYdH_6kg <br>
                                                <b>Note :</b> Please Upload the actual URL </p>
                                                <label for="autocomplete-input">Link<span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('vd_link'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0" id="fb-link">

                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vdfb_link" id="autocomplete-input1" class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://www.facebook.com/shaadibaraatiofficial/videos/712634046205862/<br>
                                               <b> Note : </b> Please Upload only the share link</p>
                                                <label for="autocomplete-input1">Link<span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('vd_link'); ?></span></p>
                                            </div>

                                        </div>
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' ?>
                                            <?php ?>
                                        </div>
                                        <input type="hidden" name="vendor_id" value="<?php echo random_string('alnum',10) ?>">
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

                        <div class="card scrollspy" id="faq">
                            <div class="card-content">
                                <div class="form-container">
                                    <div class="row m0">
                                        <p class="bold  black-text col  mb10 h6">FAQ's</p>
                                    </div>
                                    <form action="<?php echo base_url() ?>vendors/faq_insert" method="post" id="">
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">

                                        <?php foreach ($vendor_faq as $vendor_faq => $faaqval) {
 
                                            $fqanw = $this->ci->m_vendors->fansw($faaqval->id,$result->id);
                                            
                                            if (!empty($fqanw)) {
                                                $ans = $fqanw;                                                
                                            }else{
                                                $ans = $faaqval->answer; 
                                            }
                                        ?>
                                        <div class="row m0 faqform" id="faqform">
                                            <div class="col s12 m8 input-field">
                                                <textarea readonly name="quation[]" class="materialize-textarea"><?php echo $faaqval->question  ?></textarea>
                                                <label for="textarea1">Question</label>
                                            </div>
                                            <input type="hidden" id="fa_id" name="fa_id[]" class="validate" value="<?php echo (!empty($faaqval->id)?$faaqval->id:'') ?>">
                                            <div class="col s12 m8 input-field">
                                                <textarea name="asw[]" class="materialize-textarea"><?php echo $ans  ?></textarea>
                                                <label for="textarea1">Answers</label>
                                            </div>
                                        </div>


                                        <?php } ?>


                                        <div id="faq-form-box"></div>
                                        <div class="col s12 input-field">
                                            <button class="btn waves-effect waves-light green darken-4 hoverable " type="submit">Submit
                                                <i class="fas fa-paper-plane right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="card scrollspy" id="offer">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/offer_insert" method="post" style="overflow-y: auto;overflow-x: hidden;" id="vendor-form" enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Offer Image</p>
                                        </div>


                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Add Image</span>
                                                    <input type="file" name="offimage" accept=".png, .jpg, .jpeg, .gif" <?php echo (!empty($result)? '': 'required') ?>>
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <span class="helper-text"><b>Note</b>: Please select only image file
                                                    (eg: .jpg, .png, .jpeg etc.) <br> <span class="bold">Max file
                                                        size:</span> 550KB <span class="red-text">*</span></span>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <?php
                                                        echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                        ?>
                                                <?php ?>
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

                        <div class="card scrollspy" id="seo">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/updateSeo" method="post" style="overflow-y: auto;overflow-x: hidden;" id="vendor-form" enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">SEO Data</p>
                                        </div>
                                            <input type="hidden" required="" id="id" name="id" class="validate"
                                                value="<?php echo (!empty($result->id))?$result->id:''; ?>">

                                            <div class="input-field col s12 l6">
                                                <input type="text" required="" id="setitle" name="setitle" class="validate"
                                                    value="<?php echo (!empty($seo->title))?$seo->title:''; ?>">
                                                <label for="setitle">Title <span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12 l12">
                                                <textarea id="can_url" name="can_url"
                                                    class="materialize-textarea"><?php echo (!empty($seo->can_link))?$seo->can_link:''; ?></textarea>
                                                <label for="can_url">Canonical Url</label>
                                            </div>


                                            <div class="input-field col s12 l12">
                                                <textarea id="skeywords" required="" name="skeywords"
                                                    class="materialize-textarea"><?php echo (!empty($seo->keywords))?$seo->keywords:''; ?></textarea>
                                                <label for="skeywords">Keywords<span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12">
                                                <textarea id="sdescription" required="" name="sdescription"
                                                    class="materialize-textarea"><?php echo (!empty($seo->m_desc))?$seo->m_desc:''; ?></textarea>
                                                <label for="sdescription">Meta Description</label>
                                            </div>

                                            <!-- <div class="row m0">
                                                <div class="col s12 l12">
                                                    <label for="content" class="mb10">Content</label>
                                                    <textarea name="scontent" id="scontent" class="form-control col-md-7 col-xs-12"><?php echo (!empty($seo->description))?$seo->description:''; ?></textarea>
                                                </div>
                                            </div> -->


                                            <div class="col s12 mtb20">
                                                  <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit <i class="fas fa-paper-plane right"></i> </button> <br>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- cad end -->




                </div>
            </div>
        </div>
        </div>
    </section>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/ckeditor1/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>
    <script>
        <?php $this->load->view('include/message.php'); ?>
    </script>
    <script>
        // CKEDITOR.replace('scontent');
        CKEDITOR.replace('description');
    </script>
    <script>
        $(document).ready(function() {




        });
        $(function() {
            function cloneform() {
                $("#faqform").clone().appendTo("#faq-form-box");
            }


            cloneform();

            $(document).on('click', '.addfaq', function() {
                cloneform();
            });

            $(document).on('click', '.closefaq', function() {
                $(this).closest('#faqform').remove()
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select').formSelect();
            // $('.materialboxed').materialbox();
            $('.input-images').imageUploader();
            // $('#vendor-about').submit(function() {
            //     var text = $('#editor').html();
            //     $('#description').val(text);
                
            // });
            $('input.autocomplete').autocomplete({
                data: {
                    "Apple": null,
                    "Microsoft": null,
                    "Google": 'https://placehold.it/250x250'
                },
            });
            $("#vendor-form").validate({
                rules: {
                    about: {
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
                },
                messages: {
                    about: "Please enter a vendor Name",
                    email: "Please enter a vendor Email",
                    phone: "Please enter a vendor Phone Number",
                    category: "Please Select the Category",
                    city: "Please Select the City",
                }
            });

            $uploadCrop = $('#upload-demo').croppie({
                enableExif: true,
                viewport: {
                    width: 700,
                    height: 500,
                    type: 'box'
                },
                boundary: {
                    width: 750,
                    height: 550
                }
            });

            


           


        });
    </script>
    <!-- <script>
        DecoupledEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');
                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
    </script> -->
    <script>
        $(document).ready(function() {

            $(document).on('change','#discount',function(){
            $('#dissatus').val('1');
        });

            $(document).on('change','.packge',function(){
            $('#pcchange').val('1');
        });

            
            
            $('.modal').modal();
            $('.scrollspy').scrollSpy();
            $("#vd_category").change(function() {
                var cat = $(this).children("option:selected").val();
                if (cat == '2') {
                    $("#fb-link").css("display", "block");
                    $("#youtube-link").css("display", "none");
                } else if (cat == '1') {
                    $("#youtube-link").css("display", "block");
                    $("#fb-link").css("display", "none");
                }
            });

            $("#block").on('click', function(event) {
            event.preventDefault();
            var id = $("input[name='userid']").val();
            loder(true);
            $.ajax({
                url: "<?php echo base_url();?>vendors/block_vendor",
                type: "get",
                dataType: "html",
                data: {
                    'id': id,
                    'status': '2'
                },
                success: function(data) {
                    console.log(data);
                    $('#unblock').css('display', ' inline-block ');
                    $('#block').css('display', 'none');
                    loder(false);
                }
            });
        });
        //unbloack user
        $("#unblock").on('click', function(event) {
            event.preventDefault();
            var id = $("input[name='userid']").val();
            loder(true);
            $.ajax({
                url: "<?php echo base_url();?>vendors/block_vendor",
                type: "get",
                dataType: "html",
                data: {
                    'id': id,
                    'status': '1'
                },
                success: function(data) {
                    console.log(data);
                    $('#block').css('display', ' inline-block ');
                    $('#unblock').css('display', 'none');
                    loder(false);
                }
            });
        });
        //page loader
        function loder(status) {
            if (status == true) {
                $('.preloader-verfy').css('display', 'block');
            } else {
                $('.preloader-verfy').css('display', 'none');
            }
        }

        });
    </script>
</body>

</html>