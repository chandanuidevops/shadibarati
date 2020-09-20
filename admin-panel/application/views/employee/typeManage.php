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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    
    <style type="text/css">
    .dash-list a .list-dashboard{transition: 0.5s}
    .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}
    
    </style>
  </head>
  <body>
    <!-- headder -->
    <div id="header-include">
      <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->
    <!-- main layout -->
    <section class="sec-top">
      <div class="container-wrap">
        <div class="row">
          <!-- menu  -->
          <div id="sidemenu-include">
            <?php $this->load->view('include/menu.php'); ?>
          </div>
          <div class="col m12 s12 l9">
            <div class="main-bar">
              <div class="row">
                <div class="col 12 m6">
                  <p class="h5-para black-text m0">Employee Types</p>
                </div>
              </div>

              <div class="card">
                <div class="card-content">
                  <div class="form-container">
                    <form action="<?php echo base_url() ?>employees/types-insert" method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form" enctype="multipart/form-data">
                      
                      <div class="row m0">
                        <div class="input-field col s12 l6">
                          <input type="text" id="type" name="type" class="validate" required value="<?php echo (!empty($setting)?$setting['name']:'') ?>">
                          <label for="type">Type <span class="red-text">*</span></label>
                        </div>
                      </div>
                      <input type="hidden" name="uniq" value="<?php echo random_string('alnum',10) ?>">
                      
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
              
              
              <div class="shorting-table">
                <div>
                  <div class="col l12 m12 s12">
                    <div class="">
                      <p class="h5-para-p2">Manage Employee Types</p>
                      <table id="dynamic" class="striped">
                        <thead>
                          <tr class="tt">
                            <th id="a" class="h5-para-p2" width="130px">Sl No</th>
                            <th id="c" class="h5-para-p2" width="120px">Employee Type</th>
                            <th id="g" class="h5-para-p2" width="62px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (!empty($result)) {
                            $sl = 0;
                          foreach ($result as $key => $value) {
                            $sl++;
                          ?>
                          <tr>
                            <td ><?php echo (!empty($value->types))?$sl:'---'  ?></td>
                            <td ><?php echo (!empty($value->types))?$value->types:'---'  ?></td>
                            
                            <td class="action-btn  center-align">
                              <a class="blue hoverable modal-trigger" href="#modal<?php echo $value->id; ?>"  ><i class="fas fa-edit "></i></a>
                              <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('employees/delete-types/'.$value->id.'') ?> " class="red hoverable delete-btn"><i class="fas fa-trash  "></i></a>
                            </td>
                          </tr>

                          <div id="modal<?php echo $value->id; ?>" class="modal">
                            <div class="modal-content">
                              <h6>Edit Employee Type</h6>
                              <form action="<?php echo base_url() ?>employees/types-insert" method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form" enctype="multipart/form-data">
                                    <div class="row m0">
                                      <div class="input-field col s12 l6">
                                        <input type="text" id="type" name="type" class="validate" required value="<?php echo (!empty($value->types)?$value->types:'') ?>">
                                        <label for="type">Type <span class="red-text">*</span></label>
                                      </div>
                                    </div>
                                    <input type="hidden" name="uniq" value="<?php echo (!empty($value->uniq)?$value->uniq:'') ?>">
                                    
                                    <div class="col s12 mtb20">
                                      <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit
                                      <i class="fas fa-paper-plane right"></i>
                                      </button>
                                      <br>
                                    </div>
                                  </form>
                            </div>
                          </div>
                          
                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end footer -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/chart.min.js"></script>
    <!-- data table -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
    <script>
    <?php $this->load->view('include/message.php'); ?>
    
    </script>
    <script>
    $(document).ready( function () {
      $('table').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf'
        ],
      });
      $('select').formSelect();
      $('.modal').modal();
    } );
    </script>
    
  </body>
</html>