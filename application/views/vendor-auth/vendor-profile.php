<?php 
$this->ci =& get_instance();
$this->load->model('m_vendorDetail');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <title><?php echo $title ?></title>
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <?php $this->load->view('includes/favicon.php');  ?>
    <style>
        .sub-reg.z-depth-1 {margin: 15px 0 5px 21px; } 
        #emailmodal {width: 35%; } 
        #phonemodal {width: 35%; } 
         body {
            overflow: auto !important;
        }


    </style>
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>
        <!-- end header -->
        <?php if (!empty($vendor)) {
           foreach ($vendor as $key => $value) {?>
          
         <section class="sec">
            <div class="container-fluide">
                <div class="row">

                    <?php if ($value->is_active == '3') { ?>
                       <div class=" col l12 m12 s12 pend-box">
                        <span class="white-text"><b>Note:Your Profile is under verification process, admin approval is pending.</b></span>
                        
                    </div>
                    <?php } ?>

                    

                    


                    <?php $this->load->view('includes/vendor-sidebar.php'); ?>
                    <div class="col l9 m9 s12">
                        <div class="vendor-detail-inputs b-sho">
                            <div class="vendor-head">
                                <h6>Business Profile</h6>
                            </div>
                            <div class="vendor-inputs">
                                <div class="row">
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="cname" type="text" class="validate" readonly="" value="<?php echo (!empty($value->name))?$value->name:''; ?>">
                                            <label for="cname">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="email" type="email" class="validate"  @change="emailCheck" v-model="email">
                                            <label :class="{ active: active }" for="email">Email</label>
                                            <span class="helper-text red-text" >{{ emailError }}</span>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="phone" type="text" class="validate" @change="phoneCheck" v-model="phone">
                                            <label :class="{ active: active }" for="phone">Phone No</label>
                                            <span class="helper-text red-text" >{{ phoneError }}</span>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="city" type="text" class="validate" readonly="" value="<?php echo (!empty($value->city))?$value->city:''; ?>">
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <label :class="{ active: active }" for="price">Price</label>
                                            <input id="price" type="text" class="validate"  v-model="price" @change="addPrice">
                                            <span class="helper-text red-text" >{{ priceError }}</span>
                                        </div>
                                    </div>
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <label :class="{ active: active }" for="per">Price Per</label>
                                            <input id="per" type="text" class="validate" @change="pricePer"  v-model="per">
                                            <span class="helper-text red-text" >{{ perError }}</span>
                                        </div>
                                    </div> 
                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <label :class="{ active: active }" for="c_person">Contact Person</label>
                                            <input id="c_person" type="text" class="validate" @change="contactPerson"  v-model="c_person">
                                            <span class="helper-text red-text" >{{ c_personError }}</span>
                                        </div>
                                    </div>
                                    <div class="col l12 m5 s12">
                                        <div class="input-field">
                                            <label :class="{ active: active }" for="vaddress">Address <span class="red-text">*</span></label>
                                            <textarea id="vaddress" rows="10" class="materialize-textarea" v-on:keyup="address"  v-model="vaddress" :style="{ height: height + 'px' }"  >{{ addressError }}</textarea>
                                        </div>
                                    </div>
                                                                      
                                    <div class="col l6 m5 s12">
                                        <div class="file-field input-field">
                                            <div class="btn hh-file">
                                                <span class="banner-ioc"><i class=" material-icons vender-icon">perm_media</i>Banner Image</span>
                                                <input type="file" id="banner"  id="file" ref="file" v-on:change="upload()" >
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate if-file" type="text" placeholder="Upload Your Image"  id="banner">
                                            </div>
                                        </div>
                                        <span class="helper-text-vender"><b class="notes">Note</b>: Please select only image file
                                            (eg: .jpg, .png, .jpeg etc.) <br> <b class="notes">Max file
                                                size:</b> 550KB <span class="red-text">*</span></span>
                                                <div class="clearfix"></div>
                                                <span class="helper-text red-text" >{{ bannerError }}</span>
                                    </div>

                                    <div class="col l6 m5 s12">
                                        <div class="input-field">
                                            <input id="category" type="text" class="validate" readonly="" value="<?php echo (!empty($value->category))?$value->category:''; ?>">
                                            <label for="category">Category</label>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>About Company</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="row">
                                        <div class="col l12 m5 s12">
                                            <div id="toolbar-container"></div>
                                                <div id="editor"> <?php echo (!empty($value->detail)?$value->detail:'') ?></div> 
                                                <textarea name="about" id="description" cols="30" rows="10" style="display: none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio  -->
                            <div class="list-profile">
                                <div class="vendor-head1 ">
                                            <h6>Portfolio</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="row m0">
                                        <?php if ($value->gallery) {
                                            foreach ($value->gallery as $gal => $gals) { ?>
                                                <div class="col l3 m3 s6">
                                            <div class="portfolio-img">
                                                <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="<?php echo base_url().$gals->path ?>" style="cursor: pointer;">
                                                <div class="port-delete">
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('vendor_detail/gallery_delete/').$gals->id ?>">
                                                        <i class="large material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                         <?php   } } ?>
                                        
                                    </div>
                                    <form action="<?php echo  base_url()?>vendor_detail/portfolio" method="post" enctype="multipart/form-data">
                                    <div class="row m0">
                                        <div class="col col l12 m10 s12">
                                            <div class="file-field input-field mm-drop">
                                                <div class="input-images pad10" id="file" ></div>
                                                <span class="helper-text-vender "><b class="notes">Note</b>: Please select only image file
                                                            (eg: .jpg, .png, .jpeg etc.) <br> <b class="notes">Max file
                                                                size:</b> 550KB <br> <b class="notes">Max files
                                                                </b> upto 30 files. <span class="red-text">*</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <button class="sub-reg z-depth-1" type="submit" value="Submit">Submit</button>
                                    </div>
                                    </form>
                                </div>

                                
                            </div>
                            <!-- Video -->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>Video Links</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="row">

                                        <?php //youtube
                                        if (!empty($value->video)) {
                                            foreach ($value->video as $vide => $vids) {
                                            $vidlink = explode("?v=",$vids->link);
                                            if (!empty($vidlink[1])) {
                                                $vidlinks = $vidlink[1];
                                            }else{
                                                $vidlinks = $vids->link;
                                            }
                                        if ($vids->type == '1') {?>

                                            <div class="col l4 m3 s12">
                                            <div class="portfolio-img vd">
                                                <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $vidlinks ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="200"></iframe>
                                                <div class="vid-delete">
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('vendor_detail/video_delete/').$vids->id?>"><i class="material-icons">delete</i></a>
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

                                            <div class="col l4 m3 s12">
                                            <div class="portfolio-img vd">
                                                <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo str_replace(" / ","%2F ",$vidlinks); ?>&show_text=0&width=476" width="auto" height="200" style="border:none;overflow:auto" scrolling="no" frameborder="0"
                                                        allowTransparency="true" allowFullScreen="true"></iframe>
                                                <div class="vid-delete">
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('vendor_detail/video_delete/').$vids->id ?>">
                                                        <i class=" material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>

                                            <?php } } } ?>



                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col col l8 m10 s12">
                                            <div class="input-field sele-ty">
                                                <select name="vd_category" required="" id="vd_category" v-model="vcategory">
                                                            <option value="">Select Your Video category</option>
                                                            <option value="1">Youtube</option>
                                                            <option value="2">Facebook</option>
                                                        </select>
                                                <p><span class="error"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div >
                                            <div class="input-field col s12 l8">
                                                <input type="text" name="vd_link" id="autocomplete-input"  @change="videoAdd" class="autocomplete" v-model="vlink">
                                                <p id="youtube-link" style="font-size: 12px;">Eg : https://www.youtube.com/watch?v=d-4cYdH_6kg <br>
                                                <b>Note :</b> Please Upload the actual URL</p>
                                                <p id="fb-link" style="font-size: 12px;">Eg : https://www.facebook.com/shaadibaraatiofficial/videos/712634046205862/<br>
                                               <b> Note : </b> Please Upload only the share link</span>
                                                </p>
                                                <label for="autocomplete-input">Link<span class="red-text">*</span></label>
                                                <p><span class="error"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Information & Services -->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>Information & Services</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <?php if ($value->service) {
                                        foreach ($value->service as $ser => $serv) { ?>
                                        <div class="infor-ser">
                                        <div class="row">
                                            <div class="col l1 m3 s2 ">
                                                <div class="" id="edt-image">
                                                    <div class="image-information">
                                                        <img class="infor-service i-img" src="<?php echo (!empty($serv->image)?base_url().$serv->image:'') ?>" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="text" readonly name="title_info" value="<?php echo (!empty($serv->service)?$serv->service:'') ?>">
                                                    <label for="serv">Title </label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" class="servid" value="<?php echo (!empty($serv->id)?$serv->id:'') ?>">
                                                    <input type="text" value="<?php echo $this->ci->m_vendorDetail->getSubtitle($serv->id, $this->session->userdata('shvid')) ?>" class="serv">
                                                    <label for="serv">Subtitle</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                    
                                </div>
                            </div>
                            <!-- FAQ -->
                            <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>FAQ</h6>
                                </div>
                                <?php if (!empty($value->faq)) {
                                    foreach ($value->faq as $faq1 => $faq2) { ?>
                                        <div class="vendor-inputs">
                                    <div class="faq-ser">
                                        <div class="row mb0">
                                            <div class="col l7 m3 s12">
                                                <div class="input-field ">
                                                    <input type="text" id="info" name="title_info" class="validate" readonly value="<?php echo (!empty($faq2->question))?$faq2->question:''; ?>" >
                                                    <label for="serv">Question</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>                                            
                                            <div class="col l5 m3 s12">
                                                <div class="input-field ">
                                                    <input type="hidden" name="faid" value="<?php echo (!empty($faq2->id))?$faq2->id:''; ?>" class="faid">

                                                <?php 
                                                $ans1 = $this->ci->m_vendorDetail->getAnswer($this->session->userdata('shvid'),$faq2->id);

                                                $ans2 = (!empty($faq2->answer))?$faq2->answer:'';

                                                if (!empty($ans1)) {
                                                    $ans = $ans1;
                                                }else{
                                                    $ans = $ans2;
                                                }
                                                ?>

                                                    <input type="text" id="info" name="sub_title" class="validate faansw" value="<?php echo $ans ?>">

                                                    <input type="hidden" value="<?php echo (!empty($faq2->question))?$faq2->question:''; ?>" class="faqs">
                                                    
                                                    <label for="serv">Answer</label>
                                                    <p><span class="error"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   <?php }
                                } ?>
                                
                            </div>
                            <!-- Offer Image-->
                           <!--  <div class="list-profile">
                                <div class="vendor-head1">
                                    <h6>Offer Image</h6>
                                </div>
                                <div class="vendor-inputs">
                                    <div class="offer-ser">
                                        <div class="row mb0">
                                            <div class="col l7 m7 s12">
                                                <div class="file-field input-field">
                                                    <div class="btn hh-file">
                                                        <span class="banner-ioc"><i class=" material-icons vender-icon">perm_media</i>Add Image</span>
                                                        <input type="file" id="file1" ref="file1" v-on:change="offerload()">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate if-file" type="text" placeholder="Upload Your Image">
                                                    </div>
                                                </div>
                                                <span class="helper-text-vender"><b class="notes">Note</b>: Please select only image file
                                                            (eg: .jpg, .png, .jpeg etc.) <br> <b class="notes">Max file
                                                                size:</b> 550KB <span class="red-text">*</span></span>
                                            </div>

                                            <?php if ($value->offer) { ?>
                                            
                                                <div class="col l3 m3 s6">
                                            <div class="portfolio-img">
                                                <img class="materialboxed z-depth-1" width="200" style="max-width:100%" src="<?php echo base_url().$value->offer->image ?>" style="cursor: pointer;">
                                                <div class="port-delete">
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');"  href="<?php echo base_url('vendor_detail/offer_delete/').$value->offer->id ?>">
                                                        <i class="large material-icons">delete</i></a>
                                                </div>
                                            </div>
                                        </div>
                                         <?php   }  ?>

                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php  } } ?>


          <div id="emailmodal" class="modal">
            <div class="modal-content">
              <h4>Verify Email</h4>
              <p>Please enter the OTP which has been sent to your mail</p>
               <div class="col l7 m3 s12">
                    <div class="input-field ">
                        <input type="text" id="otp" name="otp" class="validate" @change="emailOtp" v-model="eotp" >
                        <label for="otp">OTP</label>
                         <span class="helper-text red-text" >{{ eotpError }}</span>
                    </div>
               </div>
            </div>
          </div>

          <div id="phonemodal" class="modal">
            <div class="modal-content">
              <h4>Verify Phone</h4>
              <p>Please enter the OTP which has been sent to your Phone</p>
               <div class="col l7 m3 s12">
                    <div class="input-field ">
                        <input type="text" id="potp" name="potp" class="validate" @change="phoneOtp" v-model="potp" >
                        <label for="potp">OTP</label>
                         <span class="helper-text red-text" >{{ potpError }}</span>
                    </div>
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
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script>
        <?php $this->load->view('includes/message'); ?>
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
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);

            // nav
            var sidenav = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(sidenav);

        });
    </script>
    <!-- <script>
        CKEDITOR.replace('editor');
    </script> -->

    <script>
        $(document).ready(function() {
            $('.input-images').imageUploader();
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

        // update details
        $("#description").on('keyup', function(event) {
            event.preventDefault();
            var node = $(this).val();
            $.ajax({
                url: "<?php echo base_url();?>vendor_detail/about",
                type: "get",
                dataType: "html",
                data: {'about' : node},
                success: function(data) {
                }
            });
        });


         // faq add
        $(".faansw").on('change', function(event) {
            event.preventDefault();
            var answ = $(this).val();
            var faid =  $(this).prevAll('.faid').val();
            var faqs =  $(this).next('.faqs').val();


            $.ajax({
                url: "<?php echo base_url();?>vendor_detail/faqAdd",
                type: "get",
                dataType: "html",
                data: {'answ' : answ,'faid' : faid,'faqs' : faqs},
                success: function(data) {
                }
            });
        });

        $(".serv").on('change', function(event) {
            event.preventDefault();
            var answ = $(this).val();
            var servid =  $(this).prevAll('.servid').val();

            $.ajax({
                url: "<?php echo base_url();?>vendor_detail/serviceAdd",
                type: "get",
                dataType: "html",
                data: {'answ' : answ,'servid' : servid},
                success: function(data) {
                }
            });
        });

        // update details
        $("#editor").on('keyup', function(event) {
            event.preventDefault();
            var node = $(this).text();

            $.ajax({
                url: "<?php echo base_url();?>vendor_detail/about",
                type: "get",
                dataType: "html",
                data: {'about' : node},
                success: function(data) {
                }
            });
        });


        


        });
    </script>
        
     <script>
        var demo = new Vue({
            el: '#app',
            data: {
                price: '',
                priceError: '',
                active:false,
                per:'',
                perError:'',
                vaddress:'',
                addressError:'',
                height:'',
                file:'',
                bannerError:'',
                offerError:'',
                offer:'',
                about:'',
                aboutError:'',
                vcategory:'',
                vlink:'',
                file1:'',
                email:'',
                emailError:'',
                eotp:'',
                emailOtp:'',
                phoneError :'',
                potp :'',
                phone :'',
                eotpError:'',
                potpError:'',
                c_person:'',
                c_personError:'',
            },

            methods: {
                // mobile number check on database
                addPrice(){
                    this.priceError = '';
                    const formData = new FormData();
                        formData.append('price', this.price);
                        axios.post('<?php echo base_url() ?>vendor_detail/addPrice', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.priceError = 'Something went wrong, please try again!';
                        }else{
                            this.price = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

                contactPerson(){
                    this.c_personError = '';
                    const formData = new FormData();
                        formData.append('c_person', this.c_person);
                        axios.post('<?php echo base_url() ?>vendor_detail/contactPerson', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.c_personError = 'Something went wrong, please try again!';
                            M.toast({html: 'Something went wrong, please try again later!.', classes: 'red darken-2'});
                        }else{
                            this.c_person = response.data;
                            M.toast({html: 'Contact person name updated succesfully.', classes: 'green darken-2'});
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                pricePer(){
                    this.priceError = '';
                    const formData = new FormData();
                        formData.append('per', this.per);
                        axios.post('<?php echo base_url() ?>vendor_detail/pricePer', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.priceError = 'Something went wrong, please try again!';
                        }else{
                            this.per = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                address(){
                    this.addressError = '';
                    const formData = new FormData();
                        formData.append('vaddress', this.vaddress);
                        axios.post('<?php echo base_url() ?>vendor_detail/address', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.addressError = 'Something went wrong, please try again!';
                        }else{
                            this.vaddress = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                
                upload(){
                        this.bannerError = '';
                        this.file = this.$refs.file.files[0];
                        const formData = new FormData();
                        formData.append('banner', this.file);
                        axios.post('<?php echo base_url() ?>vendor_detail/ban_upload', 
                        formData,
                        { 
                            headers: {
                            'Content-Type': 'multipart/form-data'
                            } 
                        }
                        ).then(response => {
                            console.log(response)
                        if(response.data == ''){
                            this.bannerError = 'Something went wrong, please try again!';
                            M.toast({html: 'Something went wrong, please try again!', classes: 'red darken-2'});
                        }else{
                            this.banner = response.data;
                            M.toast({html: 'Banner Images upload succesfully.', classes: 'green darken-2'});
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                 offerload(){
                        this.offerError = '';
                        this.file1 = this.$refs.file1.files[0];    
                        const formData = new FormData();
                        formData.append('offer', this.file1);
                        axios.post('<?php echo base_url() ?>vendor_detail/offer', 
                        formData,
                        { 
                            headers: {
                            'Content-Type': 'multipart/form-data'
                            } 
                        }
                        ).then(response => {
                        if(response.data == ''){
                            this.offerError = 'Something went wrong, please try again!';
                        }else{
                            this.offer = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },videoAdd(){
                        this.addressError = '';
                        const formData = new FormData();
                        formData.append('category', this.vcategory);
                        formData.append('link', this.vlink);
                        axios.post('<?php echo base_url() ?>vendor_detail/videoadd', formData)
                      .then(response => {
                        if(response.data == ''){
                            this.addressError = 'Something went wrong, please try again!';
                        }else{
                            this.vaddress = response.data;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                }, // email check on database
                emailCheck(){

                        this.emailError = '';
                        const formData = new FormData();
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>vendor_detail/emailcheck', formData)
                      .then(response => {
                        if(response.data == '1'){
                            this.emailError = 'This email id is already exist!';
                        }else if(response.data == '2'){
                            this.emailError = 'This email id is already exist with shaadibaraati user!';
                        }else if(response.data == '3'){
                            this.emailError = 'Something went wrong, Try again Later!';
                        }else{
                                var Modalelem = document.querySelector('#emailmodal');
                                var instance = M.Modal.init(Modalelem,{ dismissible: false

                                });
                                instance.open();
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                 emailOtp(){

                        this.eotpError = '';
                        const formData = new FormData();
                        formData.append('eotp', this.eotp);
                        formData.append('email', this.email);
                        axios.post('<?php echo base_url() ?>vendor_detail/eotpVerify', formData)
                      .then(response => {
                        if(response.data == '1'){
                            this.potpError = 'Invalid OTP, Please try again later!';
                        }else{
                                this.phone = response.data;
                                var Modalelem = document.querySelector('#emailmodal');
                                var instance = M.Modal.init(Modalelem,{ dismissible: true

                                });
                                instance.close();
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                phoneCheck(){

                        this.phoneError = '';
                        const formData = new FormData();
                        formData.append('phone', this.phone);
                        axios.post('<?php echo base_url() ?>vendor_detail/phone_check', formData)
                      .then(response => {
                        if(response.data == '1'){
                            this.phoneError = 'This Phone number is already exist!';
                        }else if(response.data == '2'){
                            this.phoneError = 'This Phone number is already exist with shaadibaraati user!';
                        }else if(response.data == '3'){
                            this.phoneError = 'Something went wrong, Try again Later!';
                        }else{
                                var Modalelem = document.querySelector('#phonemodal');
                                var instance = M.Modal.init(Modalelem,{ dismissible: false

                                });
                                instance.open();
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                phoneOtp (){
                    this.phoneError = '';
                        const formData = new FormData();
                        formData.append('phone', this.phone);
                        formData.append('potp', this.potp);
                        axios.post('<?php echo base_url() ?>vendor_detail/potpVerify', formData)
                      .then(response => {
                            if(response.data == '1'){
                                this.eotpError = 'Invalid OTP, Please try again later!';
                            }else{
                                    this.email = response.data;
                                    var Modalelem = document.querySelector('#phonemodal');
                                    var instance = M.Modal.init(Modalelem,{ dismissible: true

                                    });
                                    instance.close();
                            }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },getPrice(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getPrice')
                      .then(response => {
                        if(response.data != ''){
                            this.price = response.data;
                            this.active = true;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                getPer(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getPer')
                      .then(response => {
                        if(response.data != ''){
                            this.per    = response.data;
                            this.active = true;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                getPhone(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getPhone')
                      .then(response => {
                        if(response.data != ''){
                            this.phone    = response.data;
                            this.active = true;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                getEmail(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getEmail')
                      .then(response => {
                        if(response.data != ''){
                            this.email    = response.data;
                            this.active = true;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                getAddress(){
                        axios.post('<?php echo base_url() ?>vendor_detail/getAddress')
                      .then(response => {
                        if(response.data != ''){
                            this.vaddress       = response.data;
                            this.height         = response.data.length/2.5;
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },
                getPerson(){
                      axios.post('<?php echo base_url() ?>vendor_detail/getPerson')
                      .then(response => {
                        if(response.data != ''){
                            this.c_person    = response.data;
                            this.active = true;
                            
                        }
                      })
                      .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                      })
                },

            },
            mounted: function() {
            this.getPrice();
            this.getPer();
            this.getAddress();
            this.getEmail();
            this.getPhone();
            this.getPerson();
        },
        });
    </script>
</body>

</html>