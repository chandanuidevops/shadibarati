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
         .list-dashboard div.round.mat{
         margin: auto;
      }
      
      
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
                     <p class="h5-para black-text  mtb-20">Proposal</p>
                        <div class="dash-list">
                          <?php $this->load->view('include/vendor-proposal'); ?>
                        </div>                     
                    </div>
                    </div>
                     <!-- chart-table -->
                     <!-- shorting -->
                     <div class="shorting-table">
                        <div class="row">
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">New Proposal (<?php echo (!empty($result))?count($result):''; ?>)</p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                          <th id="a" class="h5-para-p2" width="130px">Vendor Name</th>
                                          <th id="b" class="h5-para-p2" width="100px">City</th>
                                          <th id="c" class="h5-para-p2" width="120px">Category</th>
                                          <th id="c" class="h5-para-p2" width="120px">Package Requested</th>
                                          <th id="c" class="h5-para-p2" width="120px">Date</th>
                                          <th id="g" class="h5-para-p2" width="62px">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    if (!empty($result)) {
                                      $count= 0;
                                      foreach ($result as $key => $value) { $count += 1;
                                      ?>
                                       <tr>
                                            <td ><a href="<?php echo base_url('vendors/view-proposal/'.$value->id.'') ?>"><?php echo (!empty($result))?$count:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('vendors/view-proposal/'.$value->id.'') ?>"><?php echo (!empty($value->name))?$value->name:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('vendors/view-proposal/'.$value->id.'') ?>"><?php echo (!empty($value->city))?$value->city:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('vendors/view-proposal/'.$value->id.'') ?>"><?php echo (!empty($value->category))?$value->category:'---'  ?></a></td>
                                            <td ><a href="<?php echo base_url('vendors/view-proposal/'.$value->id.'') ?>"><?php echo (!empty($value->title))?$value->title:'---'  ?></a></td>
                                            <td><a href="<?php echo base_url('vendors/view-proposal/'.$value->id.'') ?>"><?php echo (!empty($value->started_from))?date("M d, Y ", strtotime($value->started_from)):'---'; ?></a></td>
                                            <td class="action-btn  center-align">
                                              <!-- view user -->
                                                <a href="<?php echo base_url('vendors/view-proposal/'.$value->id.'') ?>"  class="blue hoverable"><i class="fas fa-eye "></i></i></a>
                                              <!-- view user -->
                                            </td>
                                          
                                        </tr>
                                      
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
          $(document).ready( function () {
              $('table').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf'
                  ], 
              });
              $('select').formSelect();
              
            $('#header-include').load('include/header.html');
            $('#sidemenu-include').load('include/menu.html');

          } );
      </script>
</body>
</html>
