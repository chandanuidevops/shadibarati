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
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
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
                            <p class="h5-para black-text ">Add Job</p>

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <form action="<?php echo base_url() ?>career/add" method="post"  id="category-form" enctype="multipart/form-data">
                                        
                                          <div class="row m0">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="title" name="title" class="validate" required value="">
                                                  <label for="title">Title <span class="red-text">*</span></label>
                                                  <!-- <p><span class="error"><?php echo form_error('title'); ?></span></p> -->
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="openings" name="openings" class="validate"  value="">
                                                  <label for="openings">No of openings <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="qualification" name="qualification" class="validate"  value="">
                                                  <label for="qualification">Qualification <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="experience" name="experience" class="validate"  value="">
                                                  <label for="experience">Experience  <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="language" name="language" class="validate"  value="">
                                                  <label for="language">Language   <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="location" name="location" class="validate"  value="">
                                                  <label for="location">Location   <span class="red-text">*</span></label>
                                                </div>

                                                <div class="input-field col s12">
                                                    <textarea id="textarea1" name="desc" class="materialize-textarea"></textarea>
                                                    <label for="textarea1">Description</label>
                                                </div>

                                                <div class="input-field col s12 l12">
                                                    <p for="" class="mb10">Skills</p>
                                                    <input name="skills" id="tags" value="" />
                                                </div>

                                                <div class="col s12 input-field">
                                                    <p for="" class="mb10">Responsibilities</p>
                                                   
                                                    <div id="toolbar-container"></div>
                                                    <div id="editor"></div>
                                                    <textarea name="responsiblity" id="description" style="display:none"></textarea>
                                                </div>

                                                <div class="col s12 input-field">
                                                    <p for="" class="mb10">Key Role</p>
                                                   
                                                    <div id="role-container"></div>
                                                    <div id="role"></div>
                                                    <textarea name="role" id="keyrole" style="display:none"></textarea>
                                                </div>
                                                

                                            </div>
                                            


                                              <div class="col s12">
                                              <?php 
                                                   echo ($this->session->flashdata('formerror'))? '<span class="red-text">'.$this->session->flashdata('formerror').'</span>' : '' 
                                                   ?>
                                              <?php ?>
                                              </div>

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
        <script src="<?php echo base_url() ?>assets/js/tag.js"></script>
        <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>

        <script>
            <?php $this->load->view('include/message.php'); ?>
            $(document).ready(function () {
                $('#tags').tagsInput({
                    'defaultText':'add a skills',
                });

                $('button[type=submit]').click(function (e) { 
                    e.preventDefault();
                    var values = $('#editor').html();
                    $('#description').val(values);

                    var role = $('#role').html();
                    $('#keyrole').val(role);

                    $('#category-form').submit();
                    
                });
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
        .create(document.querySelector('#role'))
        .then(editor => {
            const roleContainer = document.querySelector('#role-container');
            roleContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });

    </script>


        
    </body>
</html>