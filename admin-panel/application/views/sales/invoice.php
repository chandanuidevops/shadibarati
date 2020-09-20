<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
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
        font-size: 12px;
      }
      .fw-700{
        font-weight: 600;
        font-size: 13px;
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
        min-height: 180px;
        max-height: 180px;
      }

      .bill-to {
        background-color: #efebf9;
        padding: 15px;
        border-radius: 4px;
        min-height: 180px;
        max-height: 180px;
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
      
      .val-table .first-tr th {
        padding: 12px;
        border-right: 1px solid #fbfbfb3d !important;
        font-size: 13px;
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
          font-size: 13px;
        }
        .suply-cont{
          font-size: 13px;
        }



    </style>
  </head>
  <body>
    
    <!-- first layout -->
    <section class="">
        <div class="col l12 m12 s12">
          <div class="row m0">
              <div class="card">
                <div class="card-content">
                  <div class="form-container">
                    <h5 class="m0" style="color: #6539c0;padding-bottom: 10px;">Invoice</h5>


                    <table>
                      <tr>
                        <td>
                        <table class="top no-borders" style="width: auto">
                          <thead>
                            <tr>
                              <th class="top-tit">Invoice No</th>
                              <td class="fw-700" colspan="2">#5001</td>
                            </tr>
                            <tr>
                              <th class="top-tit">Invoice Date</th>
                              <td class="fw-700" colspan="2">July 18, 2020</td>
                            </tr>
                            <tr>
                              <th class="top-tit">Due Date</th>
                              <td class="fw-700" colspan="2">July 18, 2020</td>
                            </tr>
                            <tr>
                              <th class="top-tit">Proposal No</th>
                              <td class="fw-700" colspan="2">125</td>
                            </tr>
                          </thead>
                        </table>
                        </td>
                        <td>
                          <td><img src="<?php echo $this->config->item('web_url')?>/assets/img/logo.png" alt=""></td>
                        </td>
                      </tr>
                    </table>

                    

                    <div class="row m0">
                      <div class="bill-box">
                      <div class="col l6 m6 s6" style="padding: 0 6px 0 0;">
                        <div class="bill-by">
                          <h5 class="m0" style="color: #6539c0;padding-bottom: 6px;font-size: 18px;">Billed By</h5>
                          <ul class="m0">
                            <li style="font-weight: 600;">Pargat</li>
                            <li>Bangalore,</li>
                            <li>Bangalore,</li>
                            <li>Karnataka, India- 560040</li>
                            <li><b>GSTIN:</b> 29BWQPS3284R1ZJ</li>
                            <li><b>PAN:</b> BWQPS3284R</li>
                          </ul>
                          
                        </div>
                      </div>
                      <div class="col l6 m6 s6" style="padding: 0 0 0 6px;">
                        <div class="bill-to">
                          <h5 class="m0" style="color: #6539c0;padding-bottom: 6px;font-size: 18px;">Billed To</h5>
                          <ul class="m0">
                            <li style="font-weight: 600;">Pargat</li>
                            <li>Bangalore,</li>
                            <li>Bangalore,</li>
                            <li>Karnataka, India- 560040</li>
                            <li><b>PAN:</b> BWQPS3284R</li>
                          </ul>
                        </div>
                      </div>
                      </div>
                    </div>
                    <div class="row m0">
                      <div class="suply-cont">
                        <div class="col l6 m6 s6">
                          <p class="center-align" style="padding: 15px 0;"><b>Country of Supply : </b> India</p>
                        </div>
                        <div class="col l6 m6 s6">
                          <p class="center-align" style="padding: 15px 0;"><b>Place of Supply : </b> Karnataka (29)</p>
                        </div>
                      </div>
                    </div>

                    <div class="row m0" style="border-radius: 6px; overflow: hidden;">
                      <table class="val-table">
                        <tr class="first-tr">
                          <th></th>
                          <th>Item</th>
                          <th>GST</th>
                          <th>Quantity</th>
                          <th>Rate</th>
                          <th>Taxable Amount</th>
                          <th>CGST</th>
                          <th>SGST</th>
                          <th>Total</th>
                        </tr>
                        <tr class="scnd-tr">
                          <td>1.</td>
                          <td>Wedz Featured</td>
                          <td>18%</td>
                          <td>1</td>
                          <td>₹15,000</td>
                          <td>₹15,000</td>
                          <td>₹1,350</td>
                          <td>₹1,350</td>
                          <td>₹17,700</td>
                        </tr>
                      </table>
                    </div>

                    <div class="row">
                      <div class="col l8 m8 s8">
                        <p class="am-word">Invoice total (in words) : SEVENTEEN THOUSAND SEVEN HUNDRED RUPEES ONLY</p>
                        <h6 style="color: #6539c0;font-size: 16px;">Bank Details</h6>
                        <table class="top no-borders" style="width: auto">
                          <thead>
                            <tr>
                              <th class="top-tit">Account Holder Name</th>
                              <td colspan="2">Baraati Media And Entertainment Pvt Ltd</td>
                            </tr>
                            <tr>
                              <th class="top-tit">Account Number</th>
                              <td colspan="2">25685852963963</td>
                            </tr>
                            <tr>
                              <th class="top-tit">IFSC</th>
                              <td colspan="2">UTIB0000006</td>
                            </tr>
                            <tr>
                              <th class="top-tit">Account Type</th>
                              <td colspan="2">Current</td>
                            </tr> 
                            <tr>
                              <th class="top-tit">Bank</th>
                              <td colspan="2">Axis Bank</td>
                            </tr> 
                          </thead>
                        </table>

                      </div>
                      <div class="col l4 m4 s4 right" style="padding-top: 8px;">
                        <table class="no-borders">
                          <tr> 
                            <th>Taxable Amount</th>
                            <td>₹15,000</td>
                          </tr>
                          <tr> 
                            <th>SGST</th>
                            <td>₹1,350</td>
                          </tr>
                          <tr> 
                            <th>CGST</th>
                            <td>₹1,350</td>
                          </tr>
                          <tr style="border-top: 2px solid black;"> 
                            <th >Total</th>
                            <td>₹17,700</td>
                          </tr>
                          
                        </table>
                      </div>
                    </div>
                    <div class="row m0">
                      <h6 style="color: #6539c0;font-size: 16px;">Terms and Conditions</h6>
                      <ol style="padding-left: 15px;font-size: 13px;">
                        <li>Please pay within 15 days from the date of invoice, overdue interest @ 14% will be charged on delayed payments.</li>
                        <li>Please quote invoice number when remitting funds.</li>
                      </ol>
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