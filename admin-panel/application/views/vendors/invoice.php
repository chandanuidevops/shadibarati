<?php $this->ci =& get_instance(); $this->load->model('m_vdiscount'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <!-- bar -->
    <style>
    .card .card-content {padding: 35px; }
    .top-tit{font-weight: 600; margin-right: 20px; color: gray;padding-right: 25px; }
    .top.no-borders tr,th,td{
    border: none !important;
    padding: 2px 0px;
    font-size: 10px;
    }
    .fw-700{
    font-weight: 600;
    font-size: 12px;
    }
    .fw-600{
    font-weight: 600;
    }
    .bill-box {
    margin-top: 15px;
    padding-bottom: 10px;
    }
    .bill-by {
    background-color: #efebf9;
    padding: 15px;
    border-radius: 4px;
    font-size: 12px;
    }
    .bill-by tr td, .bill-by tr th{
    font-size: 12px !important;
    padding: 1px 0px 1px 10px;
    }
    .bill-to tr td, .bill-to tr th{
    font-size: 12px !important;
    padding: 1px 0px 1px 10px;
    }
    .bill-to {
    background-color: #efebf9;
    padding: 15px;
    border-radius: 4px;
    font-size: 12px;
    }
    .val-table .first-tr{
    background-color: #6539c0;
    color: white;
    border-radius: 4px;
    border: none !important;
    }
    .val-table .scnd-tr{
    background-color: #efebf9;
    color: black;
    border-radius: 4px;
    border: none !important;
    }
    
    .val-table .first-tr td {
    padding: 12px;
    border-right: 1px solid #fbfbfb3d !important;
    font-size: 12px;
    color: white;
    }
    .val-table .scnd-tr td{
    padding: 10px;
    }
    .am-word{
    font-weight: 600;
    font-size: 12px;
    padding: 10px 0;
    }
    .no-borders tr,th,td{
    border: none;
    }
    .bill-box ul li{
    font-size: 12px;
    }
    .suply-cont{
    font-size: 12px;
    }
    </style>
  </head>
  <body>
    
    <!-- first layout -->
    <section class="">
      <div class="c">
        <div class="col l12 m12 s12">
          <div class="row">
              <div class="card">
                <div class="card-content">
                  <div class="form-container">
                    <h5 class="m0" style="color: #6539c0;padding-bottom: 10px;">Invoice</h5>


                    <table class="top no-borders">
                      <tr>
                        <td>
                        <table class="top no-borders" style="margin: 0px">
                          <tr>
                            <td class="top-tit" style="width: 150px">Invoice No</td>
                            <td class="fw-600" colspan="2"><?php echo (!empty($result['invoice_no']))?$result['invoice_no']:'---'; ?></td>
                          </tr>
                          <tr>
                            <td class="top-tit" style="width: 150px">Invoice Date</td>
                            <td class="fw-600" colspan="2"><?php echo (!empty($result['in_date']))?date('M d, Y',strtotime($result['in_date'])):'---'; ?></td>
                          </tr>
                          <tr>
                            <td class="top-tit" style="width: 150px">Due Date</td>
                            <td class="fw-600" colspan="2"><?php echo (!empty($result['due_date']))?date('M d, Y',strtotime($result['due_date'])):''; ?></td>
                          </tr>
                          <tr>
                            <td class="top-tit" style="width: 150px;padding-bottom: 20px;">Proposal No</td>
                            <td class="fw-600" style="padding-bottom: 20px;" colspan="2"><?php echo (!empty($result['renewal_id']))?$result['renewal_id']:'---'; ?></td>
                          </tr>
                        </table>
                     </td>
                     <td style="color:#fff;">TEST</td>
                     <td style="color:#fff;">TEST</td>
                     <td style="color:#fff;">TEST</td>
                        <td style="line-height: 84px;">
                          <img src="<?php echo $this->config->item('web_url')?>/assets/img/logo.png" alt="">
                        </td>
                      </tr>
                    </table>


                    
                    <table class="no-borders" style="padding-top: 10px;">
                      <tr>
                        <td style="padding-right: 20px;width: 50%;border-radius: 5px;">
                          <table class="bill-by no-borders">
                            <tr>
                              <td style="padding-bottom: 2px;padding-top: 10px;"><h5 class="m0" style="color: #6539c0;padding-bottom: 2px;padding-top: 10px;font-size: 14px;">Billed By</h5></td>
                            </tr>
                            <tr><td style="font-weight: 600;">Baraati Media And Entertainment Pvt Ltd</td></tr>
                            <tr><td>32/1, Kundan Complex, 2nd Floor, Ulsoor, </td></tr>
                            <tr><td>Bangalore, </td></tr>
                            <tr><td>Karnataka, India- 560040</td></tr>
                            <tr><td><b>GSTIN:</b> 29AAICB5254G1ZJ</td></tr>
                            <tr><td style="padding-bottom: 15px"><b>PAN:</b> AAICB5254G</td></tr>
                          </table>
                        </td>
                        <td style="width: 50%;border-radius: 5px;">
                          <table class="bill-to">
                            <tr>
                              <td  style="padding-bottom: 2px;padding-top: 10px;"><h5 class="m0" style="color: #6539c0;padding-bottom: 2px;font-size: 14px;padding-top: 10px;">Billed To</h5></td>
                            </tr>
                            <tr><td style="font-weight: 600;"><?php echo (!empty($result['c_name']))?$result['c_name']:'---'; ?></td></tr>
                            <tr><td><?php echo (!empty($result['c_address']))?$result['c_address']:'---'; ?>, </td></tr>
                            <tr><td><?php echo $this->ci->m_vdiscount->cityName($result['city']); ?>, </td></tr>
                            <tr><td><?php echo $this->ci->m_vdiscount->stateName($result['state']); ?>, India- <?php echo (!empty($result['pincode']))?$result['pincode']:'---'; ?></td></tr>
                            <tr><td><b>PAN:</b> <?php echo (!empty($result['pan_no']))?$result['pan_no']:'---'; ?></td></tr>
                            <tr><td style="padding-bottom: 15px;color: #efebf9;">test</td></tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                    <table class="top no-borders" style="margin: 0px">
                      <tr>
                        <td style="text-align: center;padding: 10px 0;"> <b>Country of Supply : </b> India </td>
                        <td style="text-align: center;padding: 10px 0;"><b>Place of Supply : </b> <?php echo $this->ci->m_vdiscount->stateName($result['state']); ?></td>
                      </tr>
                    </table>
                    
                    <table class="val-table">
                      <tr class="first-tr">
                        <td>sl no.</td>
                        <td>Item</td>
                        <td>HSCN/SAC</td>
                        <td>GST</td>
                        <td>Quantity</td>
                        <td>Rate</td>
                        <td>Discount</td>
                        <td>Taxable Amount</td>
                        <?php if (!empty($result['gst']) && $result['state'] == '18') { ?>
                        <td>CGST</td>
                        <td>SGST</td>
                        <?php }else if (!empty($result['gst']) && $result['state'] != '18') { ?>
                        <td>IGST</td>
                        <?php } ?>
                        <td>Total</td>
                      </tr>
                      <tr class="scnd-tr">
                        <td>1.</td>
                        <td><?php echo (!empty($result['packName']))?$result['packName']:'---'; ?></td>
                        <td>998365</td>
                        <td>18%</td>
                        <td>1</td>
                        <td><?php echo (!empty($result['nt_amnt']))?'₹ '.$result['nt_amnt']:'---'; ?></td>
                        <td><?php echo (!empty($result['discount']))?$result['discount']:'0'; ?></td>
                        <td><?php echo (!empty($result['amt_after_disc']))?'₹ '.$result['amt_after_disc']:'---'; ?></td>
                        <?php if (!empty($result['gst']) && $result['state'] == '18') { ?>
                        <td><?php echo (!empty($result['cgst']))?$result['cgst']:'---'; ?></td>
                        <td><?php echo (!empty($result['sgst']))?$result['sgst']:'---'; ?></td>
                        <?php }else if (!empty($result['gst']) && $result['state'] != '18') { ?>
                        <td><?php echo (!empty($result['igst']))?$result['igst']:'---'; ?></td>
                        <?php } ?>
                        <td><?php echo (!empty($result['total']))?$result['total']:'---'; ?></td>
                      </tr>
                    </table>
                    <div class="row m0">
                      <div class="col l12 m12 s12">
                        <p class="am-word">Invoice total (in words) : <?php echo (!empty($result['w_amount']))?$result['w_amount']:'---'; ?></p>
                      </div>
                    </div>
                    <table class="no-borders" style="padding-top: 10px;">
                      <tr>
                        <td style="padding-right: 20px;width: 70%;border-radius: 5px;">
                          <table class="no-borders">
                            <tr>
                              <td style="padding-bottom: 2px;padding-top: 10px;"><h5 class="m0" style="color: #6539c0;padding-bottom: 2px;padding-top: 10px;font-size: 14px;">Bank Details</h5></td>
                            </tr>
                            <tr>
                              <td class="top-tit">Account Holder Name</td>
                              <td colspan="2">Baraati Media And Entertainment Pvt Ltd</td>
                            </tr>
                            <tr>
                              <td class="top-tit">Account Number</td>
                              <td colspan="2">919020055863383</td>
                            </tr>
                            <tr>
                              <td class="top-tit">IFSC</td>
                              <td colspan="2">UTIB0000006</td>
                            </tr>
                            <tr>
                              <td class="top-tit">Account Type</td>
                              <td colspan="2">Current</td>
                            </tr>
                            <tr>
                              <td class="top-tit">Bank</td>
                              <td colspan="2">Axis Bank</td>
                            </tr>
                            <tr>
                              <td class="top-tit">Branch</td>
                              <td colspan="2">MG Road, Bangalore</td>
                            </tr>
                          </table>
                        </td>
                        <td style="width: 30%;border-radius: 5px;">
                          <table class="no-borders">
                            <tr>
                              <td>Taxable Amount</td>
                              <td><?php echo (!empty($result['amt_after_disc']))?'&nbsp;&nbsp;₹ '.$result['amt_after_disc']:'---'; ?></td>
                            </tr>
                            <?php if (!empty($result['gst']) && $result['state'] == '18') { ?>
                            <tr>
                              <td>CGST</td>
                              <td><?php echo (!empty($result['cgst']))?'(+) &nbsp; ₹ '.$result['cgst']:'---'; ?></td>
                            </tr>
                            <tr>
                              <td>SGST</td>
                              <td><?php echo (!empty($result['sgst']))?'(+) &nbsp; ₹ '.$result['sgst']:'---'; ?></td>
                            </tr>
                            <?php }else if (!empty($result['gst']) && $result['state'] != '18') { ?>
                            <tr>
                              <td>IGST</td>
                              <td><?php echo (!empty($result['igst']))?'(+) &nbsp; ₹ '.$result['igst']:'---'; ?></td>
                            </tr>
                            <?php } ?>

                            <tr>
                              <td>TDS</td>
                              <td><?php 

                              $tdsAmount = ((int)$result['total'] * (int)$result['tds'])/100;


                              echo (!empty($result['tds']))?'(-) &nbsp; ₹ '.(int)$tdsAmount:'---'; ?></td>
                            </tr>
                            
                            <tr style="border-top: 2px solid black;">
                              <td>Total</td>
                              <td><?php
                                $tots = (!empty($result['total']))?(int)$result['total']:0;
                              echo (!empty($tots))?'&nbsp;&nbsp;₹ '.$tots:'---'; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                    
                    
                  </div>
                <div class="row m0">
                  <h6 style="color: #6539c0;font-size: 12px;">Terms and Conditions</h6>
                  <ol style="padding-left: 25px;font-size: 11px; ">
                    <li>Shaadibaraati.com is owned by Baraati Media & Entertainment Pvt Ltd.</li>
                    <li>This Invoice is valid subject to Cheque realization only.</li>
                    <li>All disputes are subject to bangalore jurisdiction only.</li>
                    <li>Official support email id of Shaadi Baraati is support@shaadibaraati.com .</li>
                  <?php if (!empty($result['terms'])) {
                      foreach ($result['terms'] as $key => $value) { 
                       echo '<li>'.$value->terms.'</li>';
                       }
                    } ?>
                  </ol>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
</body>
</html>