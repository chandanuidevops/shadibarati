
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/croppie.css">
    <!-- bar -->
    <style>
    .ck-editor__editable {
    min-height: 300px;
    }
    #manager_col{
    display:none;
    }
    .m-15{
    margin: 15px !important;
    }
    #pdcs{
    display: none;
    }
    #nt_amnt, #gst_amount, #t_amnt,#amt_after_disc {
    cursor: no-drop;
    }
    #ban_pck{
    display: none;
    }
        .marqueeplus1.remov{
      background-color: red;
      padding: 2px 15px;
      color: #fff;
      cursor: pointer;
    }
    </style>
  </head>
  <body>
    <!-- headder -->
    <div id="header-include">
      <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->
    <!-- first layout -->
    <section class="sec-top">
      <div class="container-wrap">
        <div class="col l12 m12 s12">
          <div class="row">
            <div id="sidemenu-include">
              <?php $this->load->view('include/menu.php'); ?>
            </div>
            <div class="col m12 s12 l9">
              <p class="h5-para black-text ">Renewel Vendor Plan</p>
              <div class="card">
                <div class="card-content">
                  <div class="form-container">
                    
                    <form action="<?php echo base_url('vendors/upgrade-update') ?>" method="post"  id="admin-form" enctype="multipart/form-data">
                      <p class="m-15">Renew Vendor Plan</p>
                      
                      <div class="row m0">
                        <div class="input-field col s12 l6">
                          <input type="text" id="id" name="vid" class="validate" required value="<?php echo (!empty($result->vendor_id))?$result->vendor_id:''; ?>">
                          <label for="id">Vendor Id <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select name="vvcity" required="" disabled>
                            <option value="">Choose a City</option>
                            <?php if (!empty($city)) { foreach ($city as $key => $value) {  ?>
                            <option value="<?php echo $value->id ?>" <?php if($result->v_city == $value->id){ echo 'selected'; } ?> ><?php echo $value->city ?> </option>
                            <?php } }?>
                          </select>
                          <label for="city">Vendor City <span class="red-text">*</span></label>
                        </div>
                        <input type="hidden" name="vcity" value="<?php echo $result->v_city ?>">
                        <div class="input-field col s12 l6" >
                          <select name="vvcategory" required="" disabled>
                            <option value="">Choose a Category</option>
                            <?php if (!empty($category)) { foreach ($category as $key => $value) {  ?>
                            <option value="<?php echo $value->id ?>" <?php if($result->v_category == $value->id){ echo 'selected'; } ?> ><?php echo $value->category ?> </option>
                            <?php } }?>
                          </select>
                          <label for="city">Vendor Category <span class="red-text">*</span></label>
                        </div>
                        <input type="hidden" name="vcategory" value="<?php echo $result->v_category ?>">
                        
                        
                        <div class="input-field col s12 l6">
                          <select name="vpackage" required="" id="package" >
                            <option value="">Choose a Package</option>
                            <?php if (!empty($package)) { foreach ($package as $key => $value) {  ?>
                            <option value="<?php echo $value->id ?>" <?php if($result->package == $value->id){ echo 'selected'; } ?>><?php echo $value->title ?> </option>
                            <?php } }?>
                          </select>
                          <label for="package">Package <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select name="c_bnr"  id="c_bnr">
                            <option value="" <?php if(empty($result->city_banner)){ echo 'selected'; } ?>>No</option>
                            <option value="1" <?php if($result->city_banner == "1"){ echo 'selected'; } ?>>Yes</option>
                          </select>
                          <label for="package">City Banner</label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select name="cat_bnr" id="cat_bnr">
                            <option value="" <?php if(empty($result->cat_banner)){ echo 'selected'; } ?>>No</option>
                            <option value="1" <?php if(!empty($result->cat_banner)){ echo 'selected'; } ?>>Yes</option>
                          </select>
                          <label for="cat_bnr">Category Banner</label>
                        </div>
                        
                        <div class="input-field col s12 l6" id="ban_pck" <?php if (!empty($result->ban_pack)) { echo 'style="display:block"';} ?>>
                          <select name="ban_pack" id="ban_pack">
                            <option value="">Choose a Banner Package</option>
                            <?php if (!empty($banner)) { foreach ($banner as $key => $value) {
                            if (!empty($value->pack1)) {
                            echo '<option value="'.$value->pack1.'"'; if ($value->pack1 == $result->ban_pack) {
                              echo "selected";
                            } echo '>'.$value->pack1.'</option>';
                            }
                            if (!empty($value->pack2)) {
                            echo '<option value="'.$value->pack2.'"'; if ($value->pack2 == $result->ban_pack) {
                            echo "selected"; } echo '>'.$value->pack2.'</option>';
                            } } }?>
                          </select>
                          <label for="cat_bnr">Banner Package</label>
                        </div>
                        <input type="hidden" name="ban_price" id="ban_price">
                      </div>
                      <div class="divider"> </div>
                      <p class="m-15">Billing Details</p>
                      <div class="row m0">
                        <div class="input-field col s12 l6">
                          <input type="text" id="i_name" name="i_name" class="validate" required value="<?php echo (!empty($result->invoice_name))?$result->invoice_name:''; ?>">
                          <label for="i_name">Invoicing name <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="gstno" name="gstno" class="validate" value="<?php echo (!empty($result->gstno))?$result->gstno:''; ?>">
                          <label for="gstno">GSTIN Number </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="l_name" name="l_name" class="validate" required value="<?php echo (!empty($result->listing_name))?$result->listing_name:''; ?>">
                          <label for="l_name">Listing name <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="email" id="ld_email" name="ld_email" class="validate" value="<?php echo (!empty($result->listing_mail))?$result->listing_mail:''; ?>">
                          <label for="ld_email">Email Id <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="ld_phone" name="ld_phone" class="validate" value="<?php echo (!empty($result->listing_phone))?$result->listing_phone:''; ?>">
                          <label for="ld_phone">Mobile Number <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l12">
                          <textarea id="invoice_address" class="materialize-textarea" required name="invoice_address"><?php echo (!empty($result->invoice_address))?$result->invoice_address:''; ?></textarea>
                          <label for="invoice_address">Invoicing Address <span class="red-text">*</span></label>
                        </div>
                        <div class="row m0">
                          <div class="input-field col s12 l6">
                            <select id="ord_type" name="ord_type" required="">
                              <option value="">Choose a Order Type</option>
                              <option value="Fresh" <?php if($result->ord_type == 'Fresh'){ echo 'selected'; } ?>>Fresh</option>
                              <option value="Renewal" <?php if($result->ord_type =='Renewal'){ echo 'selected'; } ?>>Renewal</option>
                            </select>
                            <label for="ord_type">Order Type <span class="red-text">*</span></label>
                          </div>
                          <div class="input-field col s12 l6">
                            <input type="text" id="c_person" name="c_person" required class="validate"  value="<?php echo (!empty($result->c_person))?$result->c_person:''; ?>">
                            <label for="i_landl">Contact Person <span class="red-text">*</span></label>
                          </div>
                        </div>
                        
                        <div class="input-field col s12 l6">
                          <input type="text" id="alt_phone" name="alt_phone" class="validate" value="<?php echo (!empty($result->alt_phone))?$result->alt_phone:''; ?>">
                          <label for="alt_phone">Alternate Mobile Number</label>
                        </div>
                        
                        <div class="input-field col s12 l6">
                          <select name="lcity" required="">
                            <option value="">Choose a City</option>
                            <?php if (!empty($city)) { foreach ($city as $key => $value) { ?>
                            <option value="<?php echo $value->id ?>" <?php if($value->id == $result->list_city){ echo 'selected'; } ?>><?php echo $value->city ?></option>
                            <?php } } ?>
                          </select>
                          <label>City <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select id="tenure" name="tenure" required="">
                            <option value="">Choose a tenure</option>
                            <?php $months = array('1', '2', '3', '4', '5', '6', '7 ', '8', '9', '10', '11', '12',);
                            foreach ($months as $key => $value) { ?>
                            <option value="<?php echo $key+1; ?>" <?php if($result->tenure ==  $key+1){ echo 'selected'; } ?>><?php echo $value.'Months';?></option>
                            <?php }?>
                          </select>
                          <label for="tenure">Tenure <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select id="addMon" name="addMon">
                            <option value="">Choose a Additional Months</option>
                            <?php $months = array('1', '2', '3', '4', '5', '6', '7 ', '8', '9', '10', '11', '12',);
                            foreach ($months as $key => $value) { ?>
                            <option value="<?php echo $key+1; ?>" <?php if($result->add_mon ==  $key+1){ echo 'selected'; } ?>><?php echo $value.' Months';?></option>
                            <?php }?>
                          </select>
                          <label for="addMon">Additional Months</label>
                        </div>
                        
                      </div>
                      
                      <div class="divider"> </div>
                      <p class="m-15">Payment Details</p>
                      
                      <div class="row m0">
                        <div class="input-field col s12 l6">
                          <input type="text" autofocus="" readonly="" id="nt_amnt" required name="nt_amnt" class="validate" value="<?php echo (!empty($result->nt_amnt))?$result->nt_amnt:''; ?>">
                          <label class="ntam" for="nt_amnt">Net Amount <span class="red-text">*</span></label>
                          <input type="hidden" id="packPrice">
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" autofocus="" required id="discount" name="discount" class="validate" value="<?php echo (!empty($result->discount))?$result->discount:'0'; ?>">
                          <label for="discount">Total Discount in Percentage <span class="red-text">*</span></label>
                          <!-- <span class="left ponameError red-text"></span> -->
                          <!-- <input type="hidden" id="dsError"> -->
                        </div>
                        
                        <div class="input-field col s12 l6">
                          <input type="text" autofocus="" readonly="" required id="gst_amount" name="gst_amount" class="validate" value="<?php echo (!empty($result->gst_amount))?$result->gst_amount:''; ?>">
                          <label  class="active" for="gst_amount">18% GST Amount : <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" autofocus="" readonly="" required id="amt_after_disc" name="amt_after_disc" class="validate" value="<?php echo (!empty($result->amt_after_disc))?$result->amt_after_disc:''; ?>">
                          <label class="amt_after_disc" for="amt_after_disc">Amt Payable After Disc : <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" autofocus="" id="tds" name="tds" class="validate" value="<?php echo (!empty($result->tds))?$result->tds:''; ?>">
                          <label  class="active" for="tds">TDS If Applicable: </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" autofocus="" readonly="" required id="t_amnt" name="t_amnt" class="validate" value="<?php echo (!empty($result->t_amnt))?$result->t_amnt:''; ?>">
                          <label for="t_amnt">Total Amount <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" readonly="" name="balance" id="balance" value="<?php echo $result->balance; ?>">
                          <label for="balance">Balance Amount <span class="red-text">*</span></label>
                      </div>

                      </div>

                      

                      <div class="divider"> </div>
                      <p class="m-15">Payment Mode : </p>
                      
                      <div class="row m0">
                        <div class="input-field col s12 l6">
                          <select id="pay_mode" name="pay_mode" required="">
                            <option value="">Choose the Payment Mode</option>
                            <option value="Cheque" <?php if($result->pay_mode == 'Cheque'){ echo 'selected'; } ?> >Cheque</option>
                            <option value="Cash" <?php if($result->pay_mode == 'Cash'){ echo 'selected'; } ?> >Cash</option>
                            <option value="Online" <?php if($result->pay_mode == 'Online'){ echo 'selected'; } ?> >Online NEFT/IMPS</option>
                            <option value="GoglePay/PhonePe" <?php if($result->pay_mode == 'GoglePay/PhonePe'){ echo 'selected'; } ?> >GoglePay/PhonePe/Paytm</option>
                            <option value="Razorpay" <?php if($result->pay_mode == 'Razorpay'){ echo 'selected'; } ?> >Razor Pay</option>
                          </select>
                          <label for="pay_mode">Payment Mode <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="inst_no" required name="inst_no" class="validate" value="<?php echo (!empty($result->inst_no))?$result->inst_no:''; ?>">
                          <label for="inst_no">Instrument No <span class="red-text">*</span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pay_date" required name="pay_date" class="datepicker validate" value="<?php echo (!empty($result->pay_date))?$result->pay_date:''; ?>">
                          <label for="pay_date">Payment Date <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="amount" required name="amount" class="validate" value="<?php echo (!empty($result->amount))?$result->amount:''; ?>">
                          <label for="amount">Amount <span class="red-text">*</span></label>
                        </div>
                      </div>
                      <p class="m-15">PDC Details : </p>
                      
                     
                      <div class="row m0 marqaddnext" id="marqaddnext1">
                        <?php if (!empty($pdcresult)){ 
                          if(count($pdcresult) < 3 ) { ?>
                        <div class="col l12">
                          <a id="marqueeplus1" class="marqueeplus1">Add More <i class="fa fa-plus" aria-hidden="true"></i> </a>
                        </div>

                        <?php } foreach ($pdcresult as $key => $value) { ?>
                          <div class="input-field col s12 l6">
                          <input type="text" id="pdc_mode" name="pdc_mode[]" class="validate" value="<?php echo (!empty($value->mode))?$value->mode:''; ?>">
                          <label for="pdc_mode">Payment Mode </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pdc_instrmnt" name="pdc_instrmnt[]" class="validate" value="<?php echo (!empty($value->instrument))?$value->instrument:''; ?>">
                          <label for="pdc_instrmnt">Instrument No </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pdc_pay_date" name="pdc_pay_date[]" class="datepicker validate" value="<?php echo (!empty($value->date))?$value->date:''; ?>">
                          <label for="pdc_pay_date">Payment Date </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pdc_amount" name="pdc_amount[]" class="validate" value="<?php echo (!empty($value->amount))?$value->amount:''; ?>">
                          <label for="pdc_amount">Amount </label>
                        </div>
                       <?php  } }else{ ?>

                        <div class="col l12">
                          <a id="marqueeplus1" class="marqueeplus1">Add More <i class="fa fa-plus" aria-hidden="true"></i> </a>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pdc_mode" name="pdc_mode[]" class="validate" >
                          <label for="pdc_mode">Payment Mode </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pdc_instrmnt" name="pdc_instrmnt[]" class="validate" >
                          <label for="pdc_instrmnt">Instrument No </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pdc_pay_date" name="pdc_pay_date[]" class="datepicker validate">
                          <label for="pdc_pay_date">Payment Date </label>
                        </div>
                        <div class="input-field col s12 l6">
                          <input type="text" id="pdc_amount" name="pdc_amount[]" class="validate" >
                          <label for="pdc_amount">Amount </label>
                        </div>

                      <?php  }  ?>

                        

                      </div>
                      <p class="m-15">Employee Detail</p>
                      
                      <div class="row m0">
                        <div class="input-field col s12 l6">
                          <select id="emp" name="emp" required="">
                            <option value="">Choose the Employee</option>
                            <?php if (!empty($employee)) { foreach ($employee as $emp => $emps) {
                            if ($emps->admin_type != '1' && $emps->admin_type != '2') { ?>
                            <option value="<?php echo $emps->id ?>" <?php if ($emps->id == $result->employee) {echo "selected"; } ?> ><?php echo $emps->name .'&nbsp;-&nbsp;'.$emps->types; ?></option>
                            <?php  }}} ?>
                          </select>
                          <label for="emp">Select Employee <span class="red-text">*</span></label>
                        </div>
                        
                        <div class="input-field col s12 l6">
                          <select id="mang" name="mang" required="">
                            <option value="">Choose the Manager</option>
                            <?php if (!empty($employee)) { foreach ($employee as $emp => $emps) {
                            if ($emps->admin_type == '2' || $emps->admin_type == '8' || $emps->admin_type == '9') { ?>
                            <option value="<?php echo $emps->id ?>" <?php if ($emps->id == $result->manager) {echo "selected"; } ?> ><?php echo $emps->name ?></option>
                            <?php  }}} ?>
                          </select>
                          <label for="mang">Select Manager <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select id="bran_mang" name="bran_mang" required="">
                            <option value="">Choose the Branch Manager</option>
                            <?php if (!empty($employee)) { foreach ($employee as $emp => $emps) {
                            if ($emps->admin_type == '8') { ?>
                            <option value="<?php echo $emps->id ?>" <?php if ($emps->id == $result->bran_mang) {echo "selected"; } ?> ><?php echo $emps->name ?></option>
                            <?php  }}} ?>
                          </select>
                          <label for="bran_mang">Select Branch Manager <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select id="nation_head" name="nation_head" required="">
                            <option value="">Choose the National Head</option>
                            <?php if (!empty($employee)) { foreach ($employee as $emp => $emps) {
                            if ($emps->admin_type == '9') { ?>
                            <option value="<?php echo $emps->id ?>" <?php if ($emps->id == $result->nation_head) {echo "selected"; } ?> ><?php echo $emps->name ?></option>
                            <?php  }}} ?>
                          </select>
                          <label for="nation_head">Select National Head <span class="red-text">*</span></label>
                        </div>
                        <div class="input-field col s12 l6">
                          <select id="telecaller" name="telecaller">
                            <option value="">Choose the Tele Caller</option>
                            <?php if (!empty($employee)) { foreach ($employee as $emp => $emps) {
                            if ($emps->admin_type == '6') { ?>
                            <option value="<?php echo $emps->id ?>" <?php if ($emps->id == $result->telecaller) {echo "selected"; } ?> ><?php echo $emps->name ?></option>
                            <?php  }}} ?>
                          </select>
                          <label for="telecaller">Select Tele Caller <span class="red-text">*</span></label>
                        </div>
                      </div>
                      <input type="hidden" name="uniq" value="<?php echo (!empty($result->uniq))?$result->uniq:''; ?>">
                      <input type="hidden" name="id" value="<?php echo (!empty($result->id))?$result->id:''; ?>">
                      <div class="col s12 mtb20">
                        <button class="btn waves-effect waves-light green darken-4 hoverable btn-large upload-result" type="submit">Submit
                        <i class="fas fa-paper-plane right"></i>
                        </button>
                        <br>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div><!-- cad end -->
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/croppie.js"></script>
    <script>
    <?php $this->load->view('include/message.php'); ?>
    
    </script>
    <script>
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {
    format: 'yyyy-mm-dd',
    });
    $(document).ready(function() {
    $('select').formSelect();
    $("select").css({display: "inline", height: 0, padding: 0, width: 0});
 

    $(function() {
      var count = 0;
      $('#marqueeplus1').on('click', function(e) {
      count += 1;
      e.preventDefault();
      var inLength = $(":input[name='pdc_mode[]']").length;
      if (inLength <=2) {
      $('<div class="row m0 marqaddnext1"> <div class="col l12"> <a id="brandplus" class="marqueeplus1 remov"><i class="fa fa-times" aria-hidden="true"></i></a> </div> <div class="input-field col s12 l6"> <input type="text" id="pdc_mode" name="pdc_mode[]" class="validate" > <label for="pdc_mode">Payment Mode </label> </div> <div class="input-field col s12 l6"> <input type="text" id="pdc_instrmnt" name="pdc_instrmnt[]" class="validate" > <label for="pdc_instrmnt">Instrument No </label> </div> <div class="input-field col s12 l6"> <input type="text" id="pdc_pay_date" name="pdc_pay_date[]" class="datepicker validate"> <label for="pdc_pay_date">Payment Date </label> </div> <div class="input-field col s12 l6"> <input type="text" id="pdc_amount" name="pdc_amount[]" class="validate" > <label for="pdc_amount">Amount </label> </div> </div><br>') .append().insertBefore('#marqaddnext1');
      }
      });
      $(document).on('click', '.marqueeplus1.remov', function(e) {
      e.preventDefault();
      $(this).closest('div.row').remove();
      });
    });


    $(document).on('change', '#package', function() {
        var pack = $(this).val();
        var ban_price = $('input[name="ban_price"]').val();
        if (ban_price == '') {var ban_price = 0; }
        var balance = $('#balance').val();
        var discount = $('#discount').val();
        var tds   = $('#tds').val();
        if (discount == '') { var discounts = 0; }else{ var discounts = discount; }
        $.ajax({
            url: '<?php echo base_url() ?>vendors_upgrade/getPrice',
            type: 'GET',
            dataType: 'json',
            data: {
                package: pack
            },
            success: function(data) {
              
              $('#packPrice').val(data.price);
              var netAMount = parseInt(data.price) + parseInt(ban_price);

              $('#nt_amnt').val(netAMount);
              $(".ntam").addClass("active");

              if (discounts =='' || discounts == 'undefined') {
                var discamount  = 0;
              }else{
                var discamount = (parseInt(data.price) * discounts) / 100; 
              }
              var total = (parseInt(netAMount) - discamount);
              var gst = (total * 18) / 100;
              $('#gst_amount').val(gst);
              var tots = (parseInt(total)) + parseInt(gst) - parseInt(balance);
              var deltds = ((parseInt(total)) * (tds)) / 100;
              var tot = (parseInt(tots) - deltds);
              $('#t_amnt').val(tot);
            }
        });
    });

    // banner package select
    $(document).on('change', '#ban_pack', function() {
        var netam     = $("#nt_amnt").val();
        var pack      = $(this).children("option:selected").val();
        var packPrice = $("#packPrice").val();
        var gst       = $("#gst_amount").val();
        var balance   = $('#balance').val();
        var discount = $('#discount').val();
        if (discount == '') { var discounts = 0; }else{ var discounts = discount; }
        var tds   = $('#tds').val();

        if (pack != '') {
            var res = pack.split(":");
            if (res != '') {
                var price = res[1];
                $('input[name=ban_price]').val($.trim(price));

                var netAMount = parseInt($.trim(price)) + parseInt(netam);
                $('#nt_amnt').val(netAMount);
            }
        } else {
            var price = 0;
            $('input[name=ban_price]').val(price);
            var netAMount = packPrice;
            $('#nt_amnt').val(packPrice);
        }

        if (discounts =='' || discounts == 'undefined') {
          var discamount  = 0;
        }else{
          var discamount = (parseInt(data.price) * discounts) / 100; 
        }
          var total = (parseInt(netAMount) - discamount);
          var gst = (total * 18) / 100;
          $('#gst_amount').val(gst);
          var tots = (parseInt(total)) + parseInt(gst) - parseInt(balance);
          var deltds = ((parseInt(total)) * (tds)) / 100;
          var tot = parseInt(tots) - deltds;
          $('#t_amnt').val(tot);
    });

    $(document).on('change', '#c_bnr,#cat_bnr', function() {
        var pack      = $('#c_bnr').val();
        var packs     = $('#cat_bnr').val();
        var package   = $('#package').val();
        var packPrice = $("#packPrice").val();
        var ban_price = $("#ban_price").val();
        if (ban_price == '') {var ban_price = 0; }
        var netAMount = parseInt(packPrice) + parseInt(ban_price);
        var gst       = $("#gst_amount").val();
        var balance   = $('#balance').val();
        var discount  = $('#discount').val();
        if (discount == '') { var discounts = 0; }else{ var discounts = discount; }
        var tds   = $('#tds').val();

        if (pack != '' || packs != '') {
            $('#ban_pck').css('display', 'block');
            $('#nt_amnt').val(netAMount);
            var netAMount = parseInt(packPrice) + parseInt(ban_price);
        } else {
            $('#ban_pck').css('display', 'none');
            $('#nt_amnt').val(packPrice);
            var netAMount = packPrice;
        }

        if (discounts =='' || discounts == 'undefined') {
          var discamount  = 0;
        }else{
          var discamount = (parseInt(data.price) * discounts) / 100; 
        }
        var total = (parseInt(netAMount) - discamount);
        var gst = (total * 18) / 100;
        $('#gst_amount').val(gst);
        var tots = (parseInt(total)) + parseInt(gst) - parseInt(balance);
        var deltds = ((parseInt(total)) * (tds)) / 100;
        var tot = parseInt(tots) - deltds;
        $('#t_amnt').val(tot);

    });

    $(document).on('change', '#discount', function() {
        // ****Get all the values
        var discount = $(this).val();
        var netam     = $("#nt_amnt").val();
        // var gst       = $("#gst_amount").val();
        var ban_price = $('#ban_price').val();
        var balance   = $('#balance').val();
        var tds   = $('#tds').val();


        // **** calculate the discount with netamount
        if (discount == '') { var discount = 0; var discamount = 0; }else{ var discamount = (parseInt(netam) * discount) / 100; }
        if (ban_price == '') { var ban_price = 0; }


        // **** get the total by discount with netamount
        if ((netam != '')) {
            var amt_after_disc =(parseInt(netam) - discamount);
            $('#amt_after_disc').val(amt_after_disc);
            var gst = (amt_after_disc * 18) / 100;
            $('#gst_amount').val(gst);

            var tots = (parseInt(amt_after_disc)) + parseInt(gst) - parseInt(balance);
            var deltds = ((parseInt(amt_after_disc)) * (tds)) / 100;
            var tot = parseInt(tots) - deltds;
            $('#t_amnt').val(tot);
        }
    });


        $(document).on('change', '#tds', function() {
        var tds = $(this).val();
        if (tds == '') {
            tds = 0;
        }
        var discount = $('#discount').val();
        var netam     = $("#nt_amnt").val();
        var balance   = $('#balance').val();
        if (discount == '') { var discount = 0; var discamount = 0; }else{ var discamount = (parseInt(netam) * discount) / 100; }

        var amt_after_disc =(parseInt(netam) - discamount);
        var gst = (amt_after_disc * 18) / 100;
        var tot = (parseInt(amt_after_disc)) + parseInt(gst) - parseInt(balance); 
        if (amt_after_disc == '') { amt_after_disc = 0; }
        var deltds = ((parseInt(amt_after_disc)) * (tds)) / 100;
        var total = parseInt(tot) - deltds;
        $('#t_amnt').val(total);
    });

    $(document).on('change', '#pay_mode', function() {
        var payMode = $(this).val();
        if (payMode == 'cheque') {
            $('#pdcs').css('display', 'block');
        } else {
            $('#pdcs').css('display', 'none');
        }
    });

    // $(document).on('submit', '#admin-form', function(e) {
    //     var val = $('#dsError').val();
    //     if (val =='1') {
    //       e.preventDefault();
    //       M.toast({html: 'You are not allowed to add the discount more than assigned', classes: 'red', displayLength : 5000 });
    //     }

    // });

    

    


   

    
 
    
    
    });
    </script>
    
  </body>
</html>