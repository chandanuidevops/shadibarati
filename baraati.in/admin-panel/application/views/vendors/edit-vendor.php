<?php 
$this->ci =& get_instance();
$this->load->model('m_vendors'); 

?>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    .faqform{
        padding: 30px !important;
        border-bottom: 1px dotted #cecece;
    }
    .faqform:last-child{
        padding:0px;
        border-bottom: 0px dotted #cecece;

    }
    .faqform .addfaq{
        visibility: hidden;
    }

    .faqform:last-child .addfaq{
        visibility: visible;
    }

    .faqform:last-child .closefaq{
        visibility: hidden;
    }
    .stcky-nav{
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
.port-delete{
    position: absolute;
text-align: center;
width: 100%;
background: rgba(0,0,0,0.4);
height: 100%;
line-height: 100px;
}
.port-delete i{
color: red;
font-size: 18px;
}
.vid-delete{
    position: relative;

text-align: center;

width: 100%;

background: #fff;

padding: 4px;

top: -5px;

border: 1px dotted;
}
.vid-delete i{
    color: red;
font-size: 18px;
}
.i-img{
    width: 100px !important;
height: auto;
max-height: 95px;
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
                                <p class="h5-para black-text  m0">Update Vendor</p>
                            </div>
                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('vendors/view/'.$result->id)  ?>"
                                    class="waves-effect waves-light btn green darken-4 white-text hoverable ">view
                                    Vendor</a>
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
                                </ul>
                            </div>

                        <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Profile</p>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="name" name="name" class="validate" required
                                                    value="<?php echo (!empty($result->name)?$result->name:'') ?>">
                                                <label for="name">Name <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                            </div>
                                            <div class="input-field col s6 l6">
                                                <input type="text" id="email" name="email" class="validate" required
                                                    value="<?php echo (!empty($result->email)?$result->email:'') ?>">
                                                <label for="email">Email <span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0">
                                            <div class="input-field col s12 l6">
                                                <input type="text" id="phone" name="phone" class="validate" required
                                                    value="<?php echo (!empty($result->phone)?$result->phone:'') ?>">
                                                <label for="phone">Phone No.<span class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                            </div>

                                            <div class="input-field col s12 l6">
                                              <select name="package" required>
                                                <option <?php echo ($result->package == 'Wed Elite') ?"selected":''; ?> value="Wed Elite" >Wed Elite</option>
                                                <option <?php echo ($result->package == 'Wed Leader') ?"selected":''; ?> value="Wed Leader">Wed Leader</option>
                                                <option <?php echo ($result->package == 'Wed Assisted') ?"selected":''; ?> value="Wed Assisted">Wed Assisted</option>
                                                <option <?php echo ($result->package == 'Wed Gold') ?"selected":''; ?> value="Wed Gold">Wed Gold</option>
                                                <option <?php echo ($result->package == 'Wed Premium') ?"selected":''; ?> value="Wed Premium">Wed Premium</option>
                                                <option <?php echo ($result->package == 'Wed Featured') ?"selected":''; ?> value="Wed Featured">Wed Featured</option>
                                                <option <?php echo ($result->package == 'Free Listing') ?"selected":''; ?> value="Free Listing">Free Listing</option>
                                              </select>
                                              <label>Packages</label>
                                            </div>
                                            
                                        </div>
                                        <div class="row m0">
                                        <div class="input-field col s12 l6">
                                                <input type="text" id="price" name="price" class="validate" required
                                                    value="<?php echo (!empty($result->price)?$result->price:'') ?>">
                                                <label for="price">Starting Price <span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('price'); ?></span></p>
                                                <?php if (!empty($result)) { ?>
                                                <input type="hidden" value="1" name="edit">
                                                <?php } ?>
                                                <input type="hidden"
                                                    value="<?php echo (!empty($result->uniq)?$result->uniq:random_string('alnum',10)) ?>"
                                                    name="uniq">
                                            </div>
                                        <div class="input-field col s12 l6">
                                                <input type="text" id="price_for" name="price_for" class="validate" required
                                                    value="<?php echo (!empty($result->price_for)?$result->price_for:'') ?>">
                                                <label for="price">Price Per<span
                                                        class="red-text">*</span></label>
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
                                            <div class="file-field input-field col s12 l12">
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
                                                        size:</span> 512kb <span class="red-text">*</span></span>
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
                                        <input type="hidden" name="vendor_id"
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
                                                <input type="hidden" id="serv" name="serv[]" class="validate"
                                                    value="<?php echo (!empty($serv->id)?$serv->id:'') ?>" >
                                                <input type="text" readonly value="<?php echo (!empty($serv->service)?$serv->service:'') ?>">

                                                <label for="serv">Title </label>
                                                <p><span class="error"><?php echo form_error('serv'); ?></span></p>
                                            </div>
                                            <div class="input-field col s12 l4">                                                
                                                <input type="text" id="sr_subtitle" name="sr_subtitle[]" class="validate"
                                                    value="<?php echo $this->ci->m_vendors->getSubtitle($serv->id, $result->id) ?>" >
                                                <label for="sr_subtitle">Subtitle </label>
                                                <p><span class="error"><?php echo form_error('sr_subtitle'); ?></span></p>
                                            </div>
                                            <div class="col s12 m4">
                                            <div class="form-group">
                                                <div class="" id="edt-image">
                                                    <div class="image view view-first">
                                                        <img class="city-edit-image i-img"
                                                            src="<?php echo $this->config->item('web_url').$serv->image ?>"
                                                            alt="image">
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
                                    <form action="<?php echo base_url() ?>vendors/insert_about" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-about"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">About Vendor</p>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 l12">
                                                <label for="description" class="mb10">About Vendor<span
                                                        class="red-text">*</span></label>
                                                <div id="toolbar-container"></div>
                                                <div id="editor">
                                                    <?php echo (!empty($result->detail)?$result->detail:'') ?> </div>
                                                <textarea name="about" id="description" style="display:none"></textarea>
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
                        <div class="card scrollspy" id="portfolio">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/portfolio_insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data">
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
                                                <span class="helper-text" data-error="wrong"
                                                    data-success="right"><b>Note</b>: Please select only image file (eg:
                                                    .jpg, .png, .jpeg, .gif etc.) <br> <span class="bold">Max file
                                                        size:</span> 512kb <span class="red-text">*</span></span>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        <div class="col s12">
                                            <?php
                                                                        echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : ''
                                                                        ?>
                                            <?php ?>
                                        </div>
                                        <input type="hidden" name="vendor_id"
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
                        <div class="card scrollspy" id="video">
                            <div class="card-content">
                                <div class="form-container">
                                    <form action="<?php echo base_url() ?>vendors/add-video" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Video Links</p>
                                        </div>

                                        <div class="row m0">
                                        
                                        <?php //youtube
                                        if (!empty($video)) {
                                            foreach ($video as $vide => $vids) {
                                        if ($vids->type == '1') {                                             
                                            ?>
                                            <div class="col s12 l3 m6 ">
                                       <div class="portfolio-img"> 
                                        <iframe width="100%" height="200"   src="https://www.youtube.com/embed/<?php echo $vids->link ?>"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                            <div class="vid-delete">
                                                <a href="<?php echo base_url('vendors/video_delete/').$vids->id.'/'.$result->id ?>">
                                            <i class="fas fa-trash"></i></a>
                                        </div>
                                        </div> 
                                        </div>
                                        <?php }else if ($vids->type == '2'){  ?>
                                            <div class="col s12 l3 m6 ">
                                             <div class="portfolio-img"> 
                                            <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo str_replace("/","%2F",$vids->link); ?>&show_text=0&width=476"
                                            width="auto" height="200" style="border:none;overflow:auto" scrolling="no"
                                            frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                                            <div class="vid-delete">
                                                <a href="<?php echo base_url('vendors/video_delete/').$vids->id.'/'.$result->id ?>"><i class="fas fa-trash"></i></a>
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
                                                <input type="text" name="vd_link" id="autocomplete-input"
                                                    class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://www.youtube.com/watch?v=<span style="background-color: cadetblue; color: white; padding: 5px; font-size: 14px;">4GuiHfZDjtc</span>
                                                </p>
                                                <label for="autocomplete-input">Link<span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('vd_link'); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="row m0" id="fb-link">

                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vdfb_link" id="autocomplete-input1"
                                                    class="autocomplete">
                                                <p style="font-size: 12px;">Eg : https://www.facebook.com/<span
                                                        style="background-color: cadetblue; color: white; padding: 5px; font-size: 14px;">countychampionship/videos/349068499381369/</span>
                                                </p>
                                                <label for="autocomplete-input1">Link<span
                                                        class="red-text">*</span></label>
                                                <p><span class="error"><?php echo form_error('vd_link'); ?></span></p>
                                            </div>

                                        </div>
                                        <div class="col s12">
                                            <?php echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' ?>
                                            <?php ?>
                                        </div>
                                        <input type="hidden" name="vendor_id"
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

                        <div class="card scrollspy" id="faq">
                            <div class="card-content">
                                <div class="form-container">
                                    <div class="row m0">
                                            <p class="bold  black-text col  mb10 h6">FAQ's</p>
                                    </div>
                                    <form action="<?php echo base_url() ?>vendors/faq_insert" method="post" id="">
                                        <input type="hidden" value="<?php echo $result->id ?>" name="id">
                                        
                                        <?php foreach ($vendor_faq as $vendor_faq => $faaqval) { 
                                        ?>
                                            <div class="row m0 faqform" id="faqform">
                                                <div class="col s12 m8 input-field">
                                                    <textarea readonly name="quation[]" class="materialize-textarea"><?php echo $faaqval->question  ?></textarea>
                                                    <label for="textarea1">Question</label>
                                                </div>
                                                <input type="text" id="fa_id" name="fa_id[]" class="validate" value="<?php echo (!empty($faaqval->id)?$faaqval->id:'') ?>" >
                                                <div class="col s12 m8 input-field">
                                                    <textarea name="asw[]" class="materialize-textarea"><?php echo $faaqval->answer  ?></textarea>
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
                                    <form action="<?php echo base_url() ?>vendors/offer_insert" method="post"
                                        style="overflow-y: auto;overflow-x: hidden;" id="vendor-form"
                                        enctype="multipart/form-data">
                                        <div class="row m0">
                                            <p class="bold  black-text  mb10 h6">Offer Image</p>
                                        </div>
                                        
                                        
                                        <div class="row m0">
                                            <div class="file-field input-field col s12 l6">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                    <span class="">Add Image</span>
                                                    <input type="file" name="offimage" accept=".png, .jpg, .jpeg, .gif"
                                                        <?php echo (!empty($result)?'':'required') ?>>
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                                <span class="helper-text"><b>Note</b>: Please select only image file
                                                    (eg: .jpg, .png, .jpeg etc.) <br> <span class="bold">Max file
                                                        size:</span> 512kb <span class="red-text">*</span></span>
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
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script>
    <?php $this->load->view('include/message.php'); ?>
    </script>
    <script>
       
        $(document).ready(function() {
        
            
           
        
        });
        $(function(){
            function cloneform(){
                $("#faqform").clone().appendTo("#faq-form-box");
            }

            
            cloneform();

            $(document).on('click', '.addfaq', function(){
                cloneform();
            });

            $(document).on('click', '.closefaq', function(){
                $(this).closest('#faqform').remove()
            });
        });
    </script>

    <script>
    $(document).ready(function() {
        $('select').formSelect();
        // $('.materialboxed').materialbox();
        $('.input-images').imageUploader();
        $('#vendor-about').submit(function() {
            var text = $('#editor').html();
            $('#description').val(text);
            var text1 = $('#editor1').html();
            $('#specific').val(text1);
            var text2 = $('#editor2').html();
            $('#policy').val(text2);
        });
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
        // $("#vendor-about").validate({
        // rules: {
        // about: {
        // required: true,
        // },
        // policy: {
        // required: true,
        // },
        // tags: {
        // required: true,
        // },
        // },
        // messages: {
        // about: "Please enter the about details",
        // policy: "Please enter the vendor policy",
        // tags: "Please enter the tags",
        // }
        // });
    });
    </script>
    <script>
    DecoupledEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    DecoupledEditor
        .create(document.querySelector('#editor1'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container1');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    DecoupledEditor
        .create(document.querySelector('#editor2'))
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container2');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    $(document).ready(function() {
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
    });
    </script>
</body>

</html>