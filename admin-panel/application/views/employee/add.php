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
                            <p class="h5-para black-text ">Add admin user</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>employees/insert" method="post"  id="admin-form" enctype="multipart/form-data">
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="name" name="name" class="validate" required >
                                                  <label for="name">Name<span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('name'); ?></span></p>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="email" name="email" class="validate" required >
                                                  <label for="email">Email<span class="red-text">*</span></label>
                                                  <p><span class="error"><?php echo form_error('email'); ?></span></p>
                                                </div>
                                            </div>
                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="phone" name="phone" class="validate">
                                                  <label for="phone">Phone</label>
                                                  <p><span class="error"><?php echo form_error('phone'); ?></span></p>
                                                </div>
                                            
                                                <div class="input-field col s12 l6">
                                                  <select name="Ad_type" required id="Ad_type">
                                                    <option value="">Choose Employee Type</option>
                                                    <?php if (!empty($employee)) {
                                                      foreach ($employee as $key => $value) {
                                                        echo '<option value="'.$value->id.'">'.$value->types.'</option>';
                                                    } } ?>
                                                  </select>
                                                  <label>Employee Type</label>
                                                </div>
                                            </div>

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                <select name="discount" required id="discount">
                                                    <option value="">Choose Discount Percentage</option>
                                                    <option value="10">10%</option>
                                                    <option value="20">20%</option>
                                                    <option value="30">30%</option>
                                                    <option value="40">40%</option>
                                                    <option value="40+">40 +</option>
                                                  </select>
                                                  <label>Discount Percentage</label>
                                                </div>
                                                <div class="input-field col s12 l6 " id="manager_col">
                                                  <select name="manager" required id="manager">
                                                    <option value="">Choose Manager</option>
                                                    <?php if(!empty($manager)){
                                                      foreach($manager as $mang => $mangs){
                                                        echo '<option value="'.$mangs->id.'">'.$mangs->name.'</option>';
                                                      }
                                                    } ?>                                                    
                                                  </select>
                                                  <label>Manager</label>
                                                </div>
                                            </div>

                                            <div class="row m0">
                                              <div class="input-field col s12 l6">
                                                <select name="month" required id="discount">
                                                  <option value="">Choose a Month in <?php echo date('Y') ?></option>
                                                  <option value="1">Jan</option>
                                                  <option value="2">Feb</option>
                                                  <option value="3">March</option>
                                                  <option value="4">April</option>
                                                  <option value="5">May</option>
                                                  <option value="6">June</option>
                                                  <option value="7">July</option>
                                                  <option value="8">August</option>
                                                  <option value="9">September</option>
                                                  <option value="10">October</option>
                                                  <option value="11">November</option>
                                                  <option value="12">December</option>
                                                  </select>
                                                  <label>Employee Target</label>
                                              </div>

                                              <div class="input-field col s12 l6">
                                                <input type="text" id="target" name="target" class="validate">
                                                <label for="target">Target</label>
                                              </div>

                                              <div class="input-field col s12 l6">
                                                <select name="city" id="city">
                                                  <option value="">Choose a City</option>
                                                  <?php
                                                  if(!empty($city)){
                                                    foreach ($city as $key => $value) { ?>
                                                      <option value="<?php echo $value->id ?>"><?php echo $value->city ?></option>
                                                   <?php } } ?>
                                                </select>
                                                <label>Employee Branch</label>
                                              </div>
                                              
                                            <div>

                                              <div class="clearfix"></div>

                                            <div class="row m0">
                                            <div class="ml-15">
                                              <p>Access Permission</p>
                                              <div class="input-field col s12 l12">
                                              <?php if (!empty($menues)) {
                                                  foreach ($menues as $menu => $men) {
                                                    echo '
                                                    <div class="col l4">                                                    
                                                      <p>
                                                        <label> 
                                                          <input type="checkbox" name="menu[]" class="filled-in" value="'.$men->id.'"/> <span>'.$men->title.'</span> 
                                                        </label>
                                                      </p> 
                                                    </div>';
                                                  }
                                              } ?>

                                              </div>
                                            </div>
                                              

                                            </div>


                                            
                                            
                                              <div class="col s12">
                                              <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                              <?php ?>
                                              </div>

                                              <input type="hidden" name="ref_id" value="<?php echo random_string('alnum',10) ?>">

                                            
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
    $(document).ready(function() {

      $('select').formSelect();

        $("#admin-form").validate({
            rules: {
                name: {required: true, }, 
                email: {required: true, }, 
                Ad_type:{required:true,},
              },             
            messages: {
                
                name: "Please enter a name",
                email: "Please enter a email",
                ad_type:"Please select the Employee type",
            }
        });

        

        $(document).on('change','#Ad_type',function(){
          var adtype = $(this).val();
          if(adtype != '2'){
            $('#manager_col').css('display','block');
          }else{
            $('#manager_col').css('display','none');
          }
        })

    });
    </script>
        
    </body>
</html>