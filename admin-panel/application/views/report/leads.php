<?php $this->ci =& get_instance(); $this->load->model('m_report'); ?>
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
                                    <p class="h5-para black-text m0">Leads Report</p>
                                </div>
                                
                            </div>

              <div class="row">
                <div class="col l3 m6">
                  <select id="city"  fname="city" class="select-list" name="city">
                    <option value="">Choose a city</option>
                    <option value="">All city</option>
                    <?php if (!empty($city)) {
                    foreach ($city as $cit => $cits) { ?>
                    <option value="<?php echo $cits->id ?>" <?php if($this->input->get('city') == $cits->id){ echo 'selected'; } ?> ><?php echo $cits->city ?></option>
                    <?php  } } ?>
                  </select>
                </div>
                <div class="col l3 m6">
                  <select id="category"  fname="category" class="select-list" name="city">
                    <option value="">Choose a category</option>
                    <option value="">All category</option>
                    <?php if (!empty($category)) {
                    foreach ($category as $cit => $cits) { ?>
                    <option value="<?php echo $cits->id ?>" <?php if($this->input->get('category') == $cits->id){ echo 'selected'; } ?> ><?php echo $cits->category ?></option>
                    <?php  } } ?>
                  </select>
                </div>
                <div class="col l3 m6">
                  <select id="package"  fname="package" class="select-list" name="city">
                    <option value="">Choose a Package</option>
                    <?php if (!empty($package)) {
                    foreach ($package as $pack => $pac) { ?>
                    <option value="<?php echo $pac->id ?>" <?php if($this->input->get('package') == $pac->id){ echo 'selected'; } ?> ><?php echo $pac->title ?></option>
                    <?php  } } ?>
                  </select>
                </div>

              </div>
              <div class="clearfix"></div>

                     
                     <!-- end dash -->
                     

                     <!-- chart-table -->
                     <!-- shorting -->
                     <div class="shorting-table">
                        <div>
                           <div class="col l12 m12 s12">
                              <div class="">
                                 <p class="h5-para-p2">Manage Report</p>
                                <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2" width="130px">Sl No.</th>
                                          <th id="a" class="h5-para-p2" width="130px">Customer Name</th>
                                          <th id="a" class="h5-para-p2" width="130px">Customer Email</th>
                                          <th id="c" class="h5-para-p2" width="120px">Customer Phone</th>
                                          <th id="c" class="h5-para-p2" width="120px">Category</th>
                                          <th id="c" class="h5-para-p2" width="120px">City</th>
                                          <th id="c" class="h5-para-p2" width="120px">Date</th>
                                          <th id="b" class="h5-para-p2" width="100px">Enquiry Type</th>
                                          <th id="c" class="h5-para-p2" width="120px">Message</th>
                                          <th id="c" class="h5-para-p2" width="120px">Leads Count</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($result)) {
                                      $count =0;
                                      foreach ($result as $key => $value) {
                                        $count++;
                                       $leads = (!empty($value->leads))?'/'.$value->leads:'';
                                       $lCount = $this->ci->m_report->leadsCount($value->user_name,$value->category);
                                      ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td ><?php echo (!empty($value->user_name))?$value->user_name:'---'  ?></td>
                                            <td ><?php echo (!empty($value->user_email))?$value->user_email:'---'  ?></td>
                                            <td ><?php echo (!empty($value->user_phone))?$value->user_phone:'---'  ?></td>
                                            <td ><?php echo (!empty($value->category))?$value->category:'---'  ?></td>
                                            <td ><?php echo (!empty($value->location))?$value->location:'---'  ?></td>
                                            <td ><?php echo (!empty($value->date))?date('d M,Y',strtotime($value->date)):'---'  ?></td>
                                            <td ><?php echo (!empty($value->assigned))?'Admin verified ':'OTP Verified'  ?></td>
                                            <td ><?php echo (!empty($value->wed_detail))?$value->wed_detail:'---'  ?></td>
                                            <td ><?php echo (!empty($lCount))?$lCount:'---';  ?></td>

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
              });
              $('select').formSelect();

                  $('.select-list').change(function(){

                if(window.location.href.indexOf("?") < 0){
                    var windowUrl = window.location.href+'?';
                } else{
                    var windowUrl = window.location.href;
                }

                  var val = $(this).val();
                  var name = '&'+$(this).attr('fname')+'=';
                  var names=$(this).attr('fname');
                  var url = windowUrl+name+val;
                  var originalURL = windowUrl+name+val;
                  var alteredURL = removeParam(names, originalURL);
                  window.location = alteredURL+name+val;
              });

              function removeParam(key, sourceURL) {
                var rtn = sourceURL.split("?")[0],
                    param,
                    params_arr = [],
                    queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
                if (queryString !== "") {
                    params_arr = queryString.split("&");
                    for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                        param = params_arr[i].split("=")[0];
                        if (param === key) {
                            params_arr.splice(i, 1);
                        }
                    }
                    rtn = rtn + "?" + params_arr.join("&");
                }
                return rtn;
            }

          } );
      </script>
      
</body>
</html>
