
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta charset="UTF-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/button/css/buttons.dataTables.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
   </head>
   <body>
      <!-- headder -->
         <div id="header-include">
           <?php $this->load->view('include/header.php'); ?>
         </div>
      <!-- end headder -->
     
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <div id="sidemenu-include">
                            <?php $this->load->view('include/menu.php'); ?>
                        </div>

                        <div class="col m12 s12 l9">
                            <?php $this->load->view('include/pre-loader'); ?>

                            <div class="row">
                                <div class="col 12 m6">
                                <p class="h5-para black-text  m0">User Details - <?php echo (!empty($result->su_name))?$result->su_name:'---'  ?></p>
                                </div>
                                <div class="col 12 m6 right-align">
                                <?php if ($result->su_is_active == '0') { ?>
                                    <a href="<?php echo base_url('user/resend_link?id='.$result->su_id.'&mail='.$result->su_email.'')  ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable ">Resend Activation Link</a>
                                <?php }
                                
                                ?>
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col s12">

                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row m0">
                                                <div class="col s12 m5 border-right">
                                                    
                                                        <img src="<?php echo !empty($result->su_profile_file)?$this->config->item('web_url').$result->su_profile_file :'https://via.placeholder.com/150'  ?>" alt="" class="circle responsive-img left mr10" width="120px" />
                                                    
                                                    <div class="ptb10">
                                                        <h6 class="bold"><?php echo (!empty($result->su_name))?$result->su_name:'---'  ?></h6>
                                                        <h6><small><a href="mailto:<?php echo (!empty($result->su_email))?$result->su_email:'---'  ?>" ><?php echo (!empty($result->su_email))?$result->su_email:'---'  ?></a></small></h6>
                                                        <h6><small><a href="tel:<?php echo (!empty($result->su_phone))?$result->su_phone:'---'  ?>"><?php echo (!empty($result->su_phone))?$result->su_phone:'---'  ?></a></small></h6>
                                                    </div>
                                                </div>

                                                <div class="col s12 m7">
                                                    <div class="row m0">
                                                        <div class="col s12 center m6">
                                                           <h5 class="green-text darken-3"><?php echo (!empty($vendor))?count($vendor):''; ?></h5> 
                                                           <p>Total Contacted Vendors</p>
                                                        </div>
                                                        

                                                        <div class="col s12 center m4 mt40">
                                                            <!-- user block and unblock -->

                                                            <?php

                                                            if (($result->su_is_active == '1') || (empty($result->su_is_active))) { ?>


                                                                <a href="<?php echo base_url('users/block/'.$result->su_id.'') ?>" class="waves-effect waves-light btn red hoverable white-text darken-4 plr40" id="block">Block</a>

                                                            <?php }elseif ($result->su_is_active == '2') {  ?>

                                                               <a href="<?php echo base_url('users/unblock/'.$result->su_id.'') ?>" class="waves-effect waves-light btn green hoverable white-text darken-4 plr40" id="unblock">Unblock</a>

                                                           <?php } ?>


                                                           <a href="<?php echo base_url('users/block/'.$result->su_id.'') ?>" class="waves-effect waves-light btn red hoverable white-text darken-4 plr40" id="block" style="display: none">Block</a>
                                                           <a href="<?php echo base_url('users/unblock/'.$result->su_id.'') ?>" class="waves-effect waves-light btn green hoverable white-text darken-4 plr40" id="unblock" style="display: none">Unblock</a>

                                                           <input type="hidden" name="userid" id="userid" value="<?php echo $result->su_id ?>"> 

                                                            

                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row2 -->

                            <div class="row m0 boder-bottom">
                                <div class="col l4 m4 s12 pl0">
                                    <a  href="#personal-detail">
                                        <p class="black-text r-left m0">Profile</p>
                                    </a>
                                </div>
                                <div class="col l4 m4 s12">
                                    <a href="#conatcted-vendors">
                                        <p class="black-text r-left m0">Contacted Vendors</p>
                                    </a>
                                </div>
                            </div><!-- end row3 -->

                            <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6">Personal Details</p>
                                <table>
                                    <tbody><tr>
                                        <th class="w205"><i class="far fa-user mr10"></i> Name</th>
                                        <td><?php echo (!empty($result->su_name))?$result->su_name:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-envelope mr10"></i> Email</th>
                                        <td ><a href="mailto:<?php echo (!empty($result->su_email))?$result->su_email:'---'  ?>" ><?php echo (!empty($result->su_email))?$result->su_email:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-phone mr10"></i> Phone</th>
                                        <td ><a href="tel:<?php echo (!empty($result->su_phone))?$result->su_phone:'---'  ?>" ><?php echo (!empty($result->su_phone))?$result->su_phone:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-calendar-alt mr10"></i> Registered date</th>
                                        <td><?php echo (!empty($result->su_registered_date))?date("M d, Y ", strtotime($result->su_registered_date)):'---'; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="far fa-user mr10"></i> User Type</th>
                                        <td ><?php echo (!empty($result->iam))?$result->iam:'---'  ?></td>
                                    </tr>
                                    <tr> 
                                        <th class="w205"><i class="fa fa-map-marker mr10"></i>Live In</th>
                                        <td ><?php echo (!empty($result->live))?$result->live:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-venus-mars mr10"></i></i>Gender</th>
                                        <td><?php echo (!empty($result->su_name))?$result->su_name:'---'  ?></td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>

                            <div class="row">
                                 <div class="shorting-table" id="conatcted-vendors">
                        <div class="row">
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">Contacted Vendors</p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Name</th>
                                          <th id="b" class="h5-para-p2" width="100px">Email ID</th>
                                          <th id="c" class="h5-para-p2" width="120px">Phone</th>
                                          <th id="e" class="h5-para-p2" width="100px">Reg Date</th>
                                          <th id="f" class="h5-para-p2" width="100px">Description</th>
                                          <th id="g" class="h5-para-p2" width="62px">Function Date</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    if (!empty($vendor)) { 

                                      foreach ($vendor as $key => $value) {

                                      ?>

                                      <tr>
                                            <td ><?php echo (!empty($value->name))?$value->name:'---'  ?></td>
                                            <td ><a href="mailto:<?php echo (!empty($value->email))?$value->email:'---'  ?>" ><?php echo (!empty($value->email))?$value->email:'---'  ?></a></td>
                                            <td ><a href="tel:<?php echo (!empty($value->phone))?$value->phone:'---'  ?>" ><?php echo (!empty($value->phone))?$value->phone:'---'  ?></a></td>
                                            <td><?php echo (!empty($value->date))?date("M d, Y ", strtotime($value->date)):'---'; ?></td>
                                            <td ><?php echo (!empty($value->details))?$value->details:'---'  ?></td>
                                            <td><?php echo (!empty($value->function_date))?date("M d, Y ", strtotime($value->function_date)):'---'; ?></td>
                                        </tr>
                                      
                                    <?php } } ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                            </div><!-- end row4 -->

                        </div><!-- end right side content -->
                    </div>
                </div>
            </div>
        </section>

<!-- Modal Trigger -->

<!-- Modal Structure -->







        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
        <!-- data table -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/vfs_fonts.js"></script>
        <script>
  <?php $this->load->view('include/message.php'); ?>
    
  </script>
        <script>
            $(document).ready( function () {
                $('.modal').modal();
                $('#dynamic').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ], 
                });
                $('select').formSelect();



                //block user
                 $("#block").on('click', function(event) {
                    event.preventDefault();
                    var id = $( "input[name='userid']" ).val();
                    loder(true);
                    $.ajax({
                        url: "<?php echo base_url();?>user/block_user",
                        type: "get",
                        dataType: "html",
                        data: {'id' : id,'status' : '2'},
                        success: function(data) {
                            console.log(data);
                            $('#unblock').css('display', 'block');
                            $('#block').css('display', 'none');
                            loder(false);
                        }
                    });
                });


                 //unbloack user
                 $("#unblock").on('click', function(event) {
                    event.preventDefault();
                    var id = $( "input[name='userid']" ).val();
                    loder(true);
                    $.ajax({
                        url: "<?php echo base_url();?>user/block_user",
                        type: "get",
                        dataType: "html",
                        data: {'id' : id,'status' : '1'},
                        success: function(data) {
                            console.log(data);
                            $('#block').css('display', 'block');
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


                
            } );
        </script>

         <script>
    (function($) {
        "use strict";
        $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
            $('a.js-scroll-trigger').removeClass('active')
            $(this).addClass('active');
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location
                .hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: (target.offset().top - 72)
                    }, 1000, "easeInOutExpo");
                    return false;
                }
            }
        });
    })(jQuery);
    </script>
    </body>
</html>

