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
                                    <p class="h5-para black-text m0">Sales Report</p>
                                </div>
                                
                            </div>

                            <div class="row">
                                      <div class="col l3 m6">
                                          <select id="year"  fname="year" name="year" class="select-list" required="">
                                            <option value="">Choose a year</option>
                                            <?php for($i=2010; $i <=date('Y'); $i++ ){
                                               ?>
                                              <option value="<?php echo $i; ?>" <?php if($this->input->get('year') == $i){ echo 'selected'; } ?>><?php echo $i; ?></option>
                                            <?php }?>
                                          </select>
                                        </div>

                                        <div class="col l3 m6">
                                          <select id="month"  fname="month" name="month" class="select-list" required="">
                                            <option value="">Choose a month</option>
                                            <?php
                                            $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December',);
                                            foreach ($months as $key => $value) { ?>
                                             <option value="<?php echo $key+1; ?>" <?php if($this->input->get('month') == $key+1){ echo 'selected'; } ?>><?php echo $value; ?></option>
                                            <?php }?>
                                          </select>
                                        </div>

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
                                          <th id="a" class="h5-para-p2" width="130px">Date</th>
                                          <th id="a" class="h5-para-p2" width="130px">Vendor Name</th>
                                          <th id="a" class="h5-para-p2" width="130px">City</th>
                                          <th id="a" class="h5-para-p2" width="130px">Category</th>
                                          <th id="a" class="h5-para-p2" width="130px">Phone No.</th>
                                          <th id="a" class="h5-para-p2" width="130px">Email</th>
                                          <th id="b" class="h5-para-p2" width="100px">Package</th>
                                          <th id="c" class="h5-para-p2" width="120px">Net Amount</th>
                                          <th id="c" class="h5-para-p2" width="120px">Discount</th>
                                          <th id="c" class="h5-para-p2" width="120px">GST</th>
                                          <th id="c" class="h5-para-p2" width="120px">Total</th>
                                          <th id="c" class="h5-para-p2" width="120px">Tenure</th>
                                          <th id="c" class="h5-para-p2" width="120px">Employee Name</th>
                                          <th id="c" class="h5-para-p2" width="120px">Manager</th>
                                          <th id="c" class="h5-para-p2" width="120px">Status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($result[0]->id)) {
                                      foreach ($result as $key => $value) {
                                        $count =$key++;
                                      ?>

                                        <tr>
                                            <td ><?php echo $key ?></td>
                                            <td ><?php echo (!empty($value->added_on))?date('d M, Y',strtotime($value->added_on)):'---'  ?></td>
                                            <td ><?php echo (!empty($value->name))?$value->name:'---'  ?></td>
                                            <td ><?php echo (!empty($value->cityName))?$value->cityName:'---'  ?></td>
                                            <td ><?php echo (!empty($value->categoryName))?$value->categoryName:'---'  ?></td>
                                            <td ><?php echo (!empty($value->phone))?$value->phone:'---'  ?></td>
                                            <td ><?php echo (!empty($value->email))?$value->email:'---'  ?></td>
                                            <td ><?php echo (!empty($value->title))?$value->title:'---'  ?></td>
                                            <td ><?php echo (!empty($value->nt_amnt))?$value->nt_amnt:'---'  ?></td>
                                            <td ><?php echo (!empty($value->discount))?$value->discount.'%':'---'  ?></td>
                                            <td ><?php echo (!empty($value->gst_amount))?$value->gst_amount:'---'  ?></td>
                                            <td ><?php echo (!empty($value->t_amnt))?$value->t_amnt:'---'  ?></td>
                                            <td ><?php echo (!empty($value->tenure))?$value->tenure.'+ 1 months':'---'  ?></td>
                                            <td ><?php echo (!empty($value->employee))?$value->employee:'---'  ?></td>
                                            <td ><?php echo $this->ci->m_report->manager($value->employeename);  ?></td>
                                            <td ><?php  if($value->status == '1' && $value->live == '1'){ echo 'Live'; } else if($value->status == '1' && $value->live == '0'){ echo 'Approved'; }else if($value->status == '2'){ echo 'Rejected'; } else if($value->status == '0'){ echo 'Pending'; } ?></td>
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
