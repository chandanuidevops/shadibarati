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
      <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
      <!-- bar -->
      <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        #manager_col{
          display:none;
        }
        .m-15{
          margin: 15px !important;
        }
        .vend-p{
          margin-left: 10px !important;
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
                            <p class="h5-para black-text ">Lead Assign</p>
                            <?php $this->load->view('include/pre-loader'); ?>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">                                      
                                        <form action="<?php echo base_url() ?>leads/lead_insert" method="post"  id="admin-form" enctype="multipart/form-data">
                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="name" name="name" class="validate" required>
                                                  <label for="name">Name</label>
                                                  <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="phone" name="phone" class="validate" required>
                                                  <label for="phone">Phone</label>
                                                  <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="email" id="email" name="email" class="validate" >
                                                  <label for="email">Email</label>
                                                  <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="budget" name="budget" class="validate" >
                                                  <label for="budget">Budget</label>
                                                  <p><span class="error"><?php echo form_error('budget'); ?></span></p>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                              <div class="input-field col s12 l12">
                                              <textarea id="message" class="materialize-textarea" name="message"></textarea>
                                              <label for="message">Message</label>
                                              </div>
                                            </div> 
                                            <div class="row m0">
                                              <div class="input-field col s12 l6">
                                                <input type="text" id="fndate" name="fndate" class="validate datepicker" >
                                                <label for="fndate">Function Date</label>
                                              </div>
                                                <div class="input-field col s12 l6">
                                                  <select id="city"  name="city">
                                                    <option value="">Choose a city</option>
                                                    <?php if (!empty($city)) { 
                                                      foreach ($city as $cit => $cits) { ?>
                                                        <option value="<?php echo $cits->cityId ?>"><?php echo $cits->city ?></option>                                                     
                                                    <?php  } } ?>
                                                  </select>
                                                  <label for="city">City</label>
                                                </div> 
                                                <div class="input-field col s12 l6">
                                                  <select id="category"  name="category">
                                                    <option value="">Choose a category</option>
                                                    <?php if (!empty($category)) { 
                                                      foreach ($category as $cat => $cats) { ?>
                                                        <option value="<?php echo $cats->catid ?>"><?php echo $cats->category ?></option>                                                     
                                                    <?php  } } ?>                                                 
                                                  </select>
                                                  <label for="c_name">Category</label>
                                                </div> 
                                                <div class="input-field col s12 l6">
                                                  <select id="v_type" name=v_type>
                                                    <option value="">Vendor Type</option>
                                                    <option value="paid">Paid</option>
                                                    <option value="free">Free</option>
                                                    
                                                  </select>
                                                  <label for="v_type">Vendor Type</label>
                                                </div>                                                                                              
                                            </div><br>

                                            <div class="row m0">
                                               <div class="input-field col s12 l6">
                                                  <input type="text" id="svndr" name="svndr" class="validate" >
                                                  <label for="svndr">Search Vendor</label>
                                                  <p><span class="error"><?php echo form_error('svndr'); ?></span></p>
                                                </div>  
                                              </div><br>
                                            
                                            <div class="row m0 z-depth-1">
                                            <p class="vend-p">Vendors</p>
                                              <div class="input-field col s12 l12 ">
                                              <div class="vendor-col">
                                              </div>
                                              </div>
                                            </div>
                                        
                                            <input type="hidden" name="uniq_id" value="<?php echo random_string('alnum',10) ?>">
                                            <input type="hidden" name="v_id" value="<?php echo (!empty($vid))?$vid:''; ?>">
                                            <div class="col s12 mtb20">
                                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result" type="submit">Submit
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
        <script src="<?php echo base_url()?>assets/js/croppie.js"></script>

        <script>
  <?php $this->load->view('include/message.php'); ?>
    
  </script>
      <script>

        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format: 'yyyy-mm-dd',
        });

    $(document).ready(function() {

      $('select').formSelect();


        //lead assign get vendors
        $(document).on('keyup change','#svndr,#city,#category,#v_type',function() {
          var category  = $("#category").children("option:selected").val();
          var city      = $("#city").children("option:selected").val();
          var v_type    = $("#v_type").children("option:selected").val();
          var search    = $('#svndr').val();

          loder(true);
          $.ajax({
              url:"<?php echo base_url() ?>leads/getvendors",
              type:"GET",
              dataType: "html",
              data:{
                'city' : city,'category':category,'v_type' : v_type,'search':search
              },
              success:function(data){
                $('.vendor-col').html(data);
                loder(false)
              },
              error:function(data){
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