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
                                    <p class="h5-para black-text m0">E-invite</p>
                                </div>
                            </div>

                     
                     <!-- end dash -->
                     

                     <!-- chart-table -->
                     <!-- shorting -->
                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">E-invite</p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                          <th id="a" class="h5-para-p2" width="130px">User Name</th>
                                          <th id="b" class="h5-para-p2" width="100px">Email</th>
                                          <th id="c" class="h5-para-p2" width="120px">Phone</th>
                                          <th id="c" class="h5-para-p2" width="120px">Groom</th>
                                          <th id="c" class="h5-para-p2" width="120px">Bride</th>
                                          <th id="c" class="h5-para-p2" width="120px">Event</th>
                                          <th id="c" class="h5-para-p2" width="120px">Status</th>
                                          <th id="c" class="h5-para-p2" width="120px">Event Date</th>
                                          <th id="c" class="h5-para-p2" width="120px">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    if (!empty($result)) {
                                      $count= 0;
                                      foreach ($result as $key => $value) { $count += 1;
                                      ?>
                                      <tr>
                                            <td><?php echo (!empty($result))?$count:'---'  ?></td>
                                            <td><?php echo (!empty($value->su_name))?$value->su_name:'---'  ?></td>
                                            <td><?php echo (!empty($value->su_email))?$value->su_email:'---'  ?></td>
                                            <td><?php echo (!empty($value->su_phone))?$value->su_phone:'---'  ?></td>
                                            <td><?php echo (!empty($value->groom))?$value->groom:'---'  ?></td>
                                            <td><?php echo (!empty($value->bride))?$value->bride:'---'  ?></td>
                                            <td><?php switch ($value->theme) {
                                                      case 'mehindi1':
                                                          $view = 'Mehendi';
                                                          break;
                                                      case 'mehindi2':
                                                          $view = 'Mehendi';
                                                          break;
                                                      case 'rec1':
                                                          $view = 'Reception';
                                                          break;
                                                      case 'rec2':
                                                          $view = 'Reception';
                                                          break;
                                                      case 'eng1':
                                                          $view = 'Engagement';
                                                          break;
                                                      case 'eng2':
                                                          $view = 'Engagement';
                                                          break;
                                                      case 'wed1':
                                                          $view = 'Wedding';
                                                          break;
                                                      case 'wed2':
                                                          $view = 'Wedding';
                                                          break;
                                                      default:
                                                          $view = '';
                                                          break;
                                                      }

                                                      $groom = (!empty($value->groom))?$value->groom:'#';
                                                      $bride = (!empty($value->bride))?$value->bride:'#';

                                                      echo $view;
                                                      ?></td>
                                            <td class="status"> 
                                              <?php
                                              if (!empty($value->status) && $value->status =='1') { ?>
                                                <span class='white-text green lighten-1'>Published</span>
                                             <?php }else { ?>
                                              <span class='white-text orange lighten-1'>Not Published</span>
                                             <?php } ?>
                                            </td>

                                            <td><?php echo (!empty($value->fndate))?date("M d, Y ", strtotime($value->fndate)):'---'; ?></a></td>
                                            <td class="action-btn  center-align"><a  class="blue hoverable" href="<?php echo $this->config->item('web_url').'/my-website/'.$groom.'-weds-'.$bride.'?site='.urlencode(base64_encode($value->id)).'' ?>"><i class="fas fa-eye "></i></a></td>
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
  <?php $this->load->view('include/message.php'); ?>
  </script>
      <script>
          $(document).ready( function () {
              $('table').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf'
                  ], 
                  order: [[ 0, "asc" ]]
              });
              $('select').formSelect();
          } );
      </script>
      
</body>
</html>
