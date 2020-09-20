<?php $this->ci =& get_instance();
$this->load->model('m_venquiry');
 ?>
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
                                <p class="h5-para black-text  m0">Enquiry - <?php echo (!empty($result->user_name))?$result->user_name:'---'  ?></p>
                                <!-- <small><i>Hello, Comapny name. Check out what's happening!</i></small> -->
                            </div><!-- end row1 -->


                            <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6">Details</p>
                                <table>
                                    <tbody>
                                    <tr>
                                        <th class="w205">Name</th>
                                        <td><?php echo (!empty($result->user_name))?$result->user_name:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Added By</th>
                                        <td><?php echo  $this->m_venquiry->addedby($result->assigned);  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Email</th>
                                        <td ><a href="mailto:<?php echo (!empty($result->user_email))?$result->user_email:'---'  ?>" ><?php echo (!empty($result->user_email))?$result->user_email:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Phone</th>
                                        <td ><a href="tel:<?php echo (!empty($result->user_phone))?$result->user_phone:'---'  ?>" ><?php echo (!empty($result->user_phone))?$result->user_phone:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Category</th>
                                        <td><?php echo (!empty($result->category))?$result->category:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">City</th>
                                        <td><?php echo (!empty($result->location))?$result->location:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Budget</th>
                                        <td><?php echo (!empty($result->budget))?$result->budget:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Function Date</th>
                                        <td><?php echo (!empty($result->fn_date))?$result->fn_date:'---'  ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"> Enquired date</th>
                                        <td><?php echo (!empty($result->date))?date("M d, Y ", strtotime($result->date)):'---'; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Message</th>
                                        <td><?php echo (!empty($result->wed_detail))?$result->wed_detail:'---'  ?></td>
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


                
            } );
        </script>


    </body>
</html>

