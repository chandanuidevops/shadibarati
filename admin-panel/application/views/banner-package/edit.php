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
                            <p class="h5-para black-text ">Add Package</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>banner-package/update" method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form" enctype="multipart/form-data">
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="title" name="title" class="validate" required value="<?php echo (!empty($result->title))?$result->title:''; ?>" >
                                                  <label for="title">Title <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="page" name="page" class="validate" required value="<?php echo (!empty($result->page))?$result->page:''; ?>">
                                                  <label for="page">Page <span class="red-text">*</span></label>
                                                </div>
                                            </div>

                                            <div class="row m0">
                                              <div class="input-field col s12 l6">
                                                  <input type="text" id="pack1" name="pack1" class="validate" value="<?php echo (!empty($result->pack1))?$result->pack1:''; ?>">
                                                  <label for="pack1">Pack 1 <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="pack2" name="pack2" class="validate" value="<?php echo (!empty($result->pack2))?$result->pack2:''; ?>">
                                                  <label for="pack2">Pack 2 <span class="red-text">*</span></label>
                                                </div>
                                                
                                            </div>

                                            <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="limit" name="limit" class="validate" value="<?php echo (!empty($result->p_limit))?$result->p_limit:''; ?>">
                                                  <label for="limit">Limit <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="tenure" name="tenure" class="validate" value="<?php echo (!empty($result->tenure))?$result->tenure:''; ?>">
                                                  <label for="tenure">Tenure <span class="red-text">*</span></label>
                                                </div>
                                                
                                            </div>

                                            <input type="hidden" name="id" value="<?php echo (!empty($result->id))?$result->id:''; ?>">
                                            
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
        $("#city-form").validate({
            rules: {
                city: {
                    required: true,
                },
            },
            messages: {
                
                city: "Please enter a city",
            }
        });
    });
    </script>
        
    </body>
</html>