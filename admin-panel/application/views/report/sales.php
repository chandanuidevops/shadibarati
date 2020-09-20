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
                  <select id="nathead"  fname="nathead" class="select-list" name="nathead">
                    <option value="">Choose a National Head</option>
                    <?php if (!empty($employee)) {
                    foreach ($employee as $emp1 => $emps1) {
                    if ($emps1->admin_type == '9' ) { ?>
                    <option value="<?php echo $emps1->id ?>" <?php if($this->input->get('nathead') == $emps1->id){ echo 'selected'; } ?> ><?php echo $emps1->name ?></option>
                    <?php } } } ?>
                  </select>
                </div>
                <div class="col l3 m6">
                  <select id="branch"  fname="branch" class="select-list" name="branch">
                    <option value="">Choose a Branch Head</option>
                    <?php if (!empty($employee)) {
                    foreach ($employee as $emp2 => $emps2) {
                    if ($emps2->admin_type == '8' ) { ?>
                    <option value="<?php echo $emps2->id ?>" <?php if($this->input->get('branch') == $emps2->id){ echo 'selected'; } ?> ><?php echo $emps2->name ?></option>
                    <?php  } } } ?>
                  </select>
                </div>
                <div class="col l3 m6">
                  <select id="asm"  fname="asm" class="select-list" name="asm">
                    <option value="">Area Sales Manager</option>
                    <?php if (!empty($employee)) {
                    foreach ($employee as $emp3 => $emps3) {
                    if ($emps3->admin_type == '8' ) { ?>
                    <option value="<?php echo $emps3->id ?>" <?php if($this->input->get('asm') == $emps3->id){ echo 'selected'; } ?> ><?php echo $emps3->name ?></option>
                    <?php } } } ?>
                  </select>
                </div>
                <div class="col l3 m6">
                  <select id="tele"  fname="tele" class="select-list" name="tele">
                    <option value="">Choose a Telecaller</option>
                    <?php if (!empty($employee)) {
                    foreach ($employee as $emp4 => $emps4) {
                    if ($emps4->admin_type == '6' ) { ?>
                    <option value="<?php echo $emps4->id ?>" <?php if($this->input->get('tele') == $emps4->id){ echo 'selected'; } ?> ><?php echo $emps4->name ?></option>
                    <?php } } } ?>
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
                            <th id="a" class="h5-para-p2" width="130px">Phone No.</th>
                            <th id="a" class="h5-para-p2" width="130px">Email</th>
                            <th id="a" class="h5-para-p2" width="130px">Category</th>
                            <th id="a" class="h5-para-p2" width="130px">City</th>
                            <th id="b" class="h5-para-p2" width="100px">Package</th>
                            <th id="c" class="h5-para-p2" width="120px">Net Amount</th>
                            <th id="c" class="h5-para-p2" width="120px">Discount</th>
                            <th id="c" class="h5-para-p2" width="120px">GST</th>
                            <th id="c" class="h5-para-p2" width="120px">Total</th>
                            <th id="c" class="h5-para-p2" width="120px">Tenure</th>
                            <th id="c" class="h5-para-p2" width="120px">Employee Name</th>
                            <th id="c" class="h5-para-p2" width="120px">Manager</th>
                            <th id="c" class="h5-para-p2" width="120px">Branch Head</th>
                            <th id="c" class="h5-para-p2" width="120px">National Head</th>
                            <th id="c" class="h5-para-p2" width="120px">Tele Caller</th>
                            <th id="c" class="h5-para-p2" width="120px">Status</th>
                            <!-- <th id="c" class="h5-para-p2" width="120px">Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (!empty($result)) {
                          foreach ($result as $key => $value) {
                          $count =$key++;
                          ?>
                          <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo (!empty($value->added_on))?date('d M, Y',strtotime($value->added_on)):'---'  ?></td>
                            <td><?php echo (!empty($value->vendorname))?$value->vendorname:'---'  ?></td>
                            <td><?php echo (!empty($value->listing_phone))?$value->listing_phone:'---'  ?></td>
                            <td><?php echo (!empty($value->listing_mail))?$value->listing_mail:'---'  ?></td>
                            <td><?php echo (!empty($value->category))?$value->category:'---'  ?></td>
                            <td><?php echo (!empty($value->city))?$value->city:'---'  ?></td>
                            <td><?php echo (!empty($value->title))?$value->title:'---'  ?></td>
                            <td><?php echo (!empty($value->nt_amnt))?$value->nt_amnt:'---'  ?></td>
                            <td><?php echo (!empty($value->discount))?$value->discount.'%':'---'  ?></td>
                            <td><?php echo (!empty($value->gst_amount))?$value->gst_amount:'---'  ?></td>
                            <td><?php echo (!empty($value->t_amnt))?$value->t_amnt:'---'  ?></td>
                            <td><?php echo (!empty($value->tenure))?$value->tenure.' + 1 Months':'---'  ?></td>
                            <td><?php echo (!empty($value->empname))?$value->empname:'---'  ?></td>
                            <td><?php if (!empty($employee)) {
                              foreach ($employee as $key1 => $value1) {
                                if (!empty($value->manager) && $value->manager == $value1->id) {
                                  echo $value1->name;
                                }
                              }
                            } ?></td>
                            <td><?php if (!empty($employee)) {
                              foreach ($employee as $key1 => $value1) {
                                if (!empty($value->bran_mang) && $value->bran_mang == $value1->id) {
                                  echo $value1->name;
                                }
                              }
                            } ?></td>
                            <td><?php if (!empty($employee)) {
                              foreach ($employee as $key1 => $value1) {
                                if (!empty($value->nation_head) && $value->nation_head == $value1->id) {
                                  echo $value1->name;
                                }
                              }
                            } ?></td>
                            <td><?php if (!empty($employee)) {
                              foreach ($employee as $key1 => $value1) {
                                if (!empty($value->telecaller) && $value->telecaller == $value1->id) {
                                  echo $value1->name;
                                }
                              }
                            } ?></td>

                            <td class="status"> 
                              <?php
                              if($value->status == '1' && $value->live == '1'){ echo '<span class="white-text green lighten-1">Live</span>'; }else if($value->status == '1' && $value->live == '0'){ echo '<span class="white-text green">Approved</span>'; }else if($value->status == '2'){ echo '<span class="white-text red">Rejected</span>'; }else if($value->status == '0'){ echo '<span class="white-text blue lighten-1">Pending</span>';

                              } ?>
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
    <!-- data table -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTable/button/js/vfs_fonts.js"></script>
    <script> <?php $this->load->view('include/message.php'); ?> </script>
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

            
    });
    </script>
    
  </body>
</html>