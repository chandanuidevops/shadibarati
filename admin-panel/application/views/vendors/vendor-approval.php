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
                <div class="col l3 m6">
                  <p class="h5-para black-text m0">Vendors Approval</p>
                </div>
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
                <div class="col l3 m6 right-align">
                  <a href="<?php echo base_url('vendors/add')  ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable "><i class="fas fa-plus left"></i> ADD Vendors</a>
                </div>
              </div>
              
              <!-- end dash -->
              
              <!-- chart-table -->
              <!-- shorting -->
              <div class="shorting-table">
                <div class="row">
                  <div class="col l12 m12 s12">
                    <div class="">
                      <p class="h5-para-p2">Manage Vendors Approval</p>
                      <table id="dynamic" class="striped">
                        <thead>
                          <tr class="tt">
                            <th id="a" class="h5-para-p2" width="130px">Name</th>
                            <th id="b" class="h5-para-p2" width="100px">Email ID</th>
                            <th id="c" class="h5-para-p2" width="120px">Phone</th>
                            <th id="c" class="h5-para-p2" width="120px">City</th>
                            <th id="c" class="h5-para-p2" width="120px">Category</th>
                            <th id="e" class="h5-para-p2" width="100px">Reg Date</th>
                            <th id="f" class="h5-para-p2" width="100px">Status</th>
                            <th id="g" class="h5-para-p2" width="62px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (!empty($result)) {
                          foreach ($result as $key => $value) {
                          ?>
                          <tr>
                            <td ><?php echo (!empty($value->name))?$value->name:'---'  ?></td>
                            <td ><a href="mailto:<?php echo (!empty($value->email))?$value->email:'---'  ?>" ><?php echo (!empty($value->email))?$value->email:'---'  ?></a></td>
                            <td ><a href="tel:<?php echo (!empty($value->phone))?$value->phone:'---'  ?>" ><?php echo (!empty($value->phone))?$value->phone:'---'  ?></a></td>
                            <td ><?php echo (!empty($value->city))?$value->city:'---'  ?></td>
                            <td ><?php echo (!empty($value->category))?$value->category:'---'  ?></td>
                            <td><?php echo (!empty($value->regdate))?date("M d, Y ", strtotime($value->regdate)):'---'; ?></td>
                            <td class="status">
                              <?php
                              if (!empty($value->status) && $value->status =='1') { ?>
                              <span class='white-text green lighten-1'>Active</span>
                              <?php }else if (empty($value->status)){ ?>
                              <span class='white-text red'>InActive</span>
                              <?php }else if (!empty($value->status) && $value->status =='2') { ?>
                              <span class='white-text red'>Blocked</span>
                              <?php }else if (!empty($value->status) && $value->status =='3') { ?>
                              <span class='white-text orange lighten-1'>Approval Pending</span>
                              <?php } ?>
                            </td>
                            <td class="action-btn  center-align">
                              <!-- view vendors -->
                              <a href="<?php echo base_url('vendors/view/'.$value->id.'') ?>"  class="blue hoverable"><i class="fas fa-eye "></i></i></a>
                              <!-- view vendors -->
                              <!-- edit vendors -->
                              <a href="<?php echo base_url('vendors/edit/'.$value->id.'') ?>"  class="blue hoverable"><i class="fas fa-edit "></i></i></a>
                              <!-- edit vendors -->
                              <!-- delete vendors -->
                              <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('vendors/delete/'.$value->id.'') ?> " class="red hoverable delete-btn"><i class="fas fa-trash  "></i></a>
                              <!-- delete vendors -->
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
    <?php $this->load->view('include/message.php'); ?>
    
    </script>
    <script>
    $(document).ready( function () {
    $('table').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel', 'pdf'
    ],
    order: [[ 5, "desc" ]]

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