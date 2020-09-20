
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
                           
                            <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6 ">Feedback</p>
                                
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="w205">First Name</th>
                                            <td><?php echo (!empty($result['0']->fname))?$result['0']->fname:'---'  ?></td>
                                        </tr>
                                        <tr>
                                            <th class="w205">Last Name</th>
                                            <td><?php echo (!empty($result['0']->lname))?$result['0']->lname:'---'  ?></td>
                                        </tr>
                                    <tr>
                                        <th class="w205">Email</th>
                                        <td ><a href="mailto:<?php echo (!empty($result['0']->email))?$result['0']->email:'---'  ?>" ><?php echo (!empty($result['0']->email))?$result['0']->email:'---'  ?></a></td>
                                    </tr>
                                    <tr>
                                        <th class="w205">Phone</th>
                                        <td ><a href="tel:<?php echo (!empty($result['0']->phone))?$result['0']->phone:'---'  ?>" ><?php echo (!empty($result['0']->phone))?$result['0']->phone:'---'  ?></a></td>
                                    </tr>
                                    
                                    <tr>
                                        <th class="w205">Ratings</th>
                                        <td><?php echo (!empty($result['0']->rating))?$result['0']->rating:'---'  ?></td>
                                    </tr>

                                   
                                    <tr>
                                        <th class="w205">Feed Back</th>
                                        <td><?php echo (!empty($result['0']->feedback))?$result['0']->feedback:'---'; ?></td>
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
        <?php $this->load->view('include/message.php'); ?>
        
        <?php if ($this->session->flashdata('error')) { ?>
    		<script>M.toast({html: '<?php echo $this->session->flashdata('error') ?>', classes: 'red'});</script>
        <?php } ?>

        <?php if ($this->session->flashdata('success')) { ?>
            <script>M.toast({html: '<?php echo $this->session->flashdata('success') ?>', classes: 'green'});</script>
       <?php } ?>

         
    </body>
</html>

