
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
                                <p class="h5-para black-text  m0">Detail</p>
                                <!-- <small><i>Hello, Comapny name. Check out what's happening!</i></small> -->
                            </div><!-- end row1 -->


                            <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6">Free Quote Request</p>
                                <table>
                                    <tbody><tr>
                                        <th class="w205">Name</th>
                                        <td><?php echo (!empty($result->firstname))?$result->firstname.$result->firstname:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Email</th>
                                        <td ><a href="mailto:<?php echo (!empty($result->email))?$result->email:'---'  ?>" ><?php echo (!empty($result->email))?$result->email:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Phone</th>
                                        <td ><a href="tel:<?php echo (!empty($result->phone))?$result->phone:'---'  ?>" ><?php echo (!empty($result->phone))?$result->phone:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Service</th>
                                        <td><?php echo (!empty($result->service))?$result->service:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">City</th>
                                        <td><?php echo (!empty($result->city))?$result->city:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Budget</th>
                                        <td><?php echo (!empty($result->budget))?$result->budget:'---'  ?></td>
                                    </tr>

                                    <tr>
                                        <th class="w205"> Function date</th>
                                        <td><?php echo (!empty($result->date))?date("M d, Y ", strtotime($result->date)):'---'; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Message</th>
                                        <td><?php echo (!empty($result->message))?$result->message:'---'  ?></td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>

                            

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

