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
  
    .bordered tr td {
    font-size: 12px;
    font-weight: 600;
    }
    td, th {
    padding: 5px 5px; }
    .top-head span{
    font-size: 12px;
    }
    .bordered tr{
    border-bottom: 1px solid black;
    }
    .terms tr{
    border-bottom: none;
    }
    .ord-head{
    background-color: #d0021b;
    padding: 6px 10px;
    color: white;
    font-weight: 600;
    font-size: 13px !important;
    border: 1px solid black;
    position: relative;
    top: 30px;
    }
    .bg1{
    background-color: rgba(0,0,0,0.12);
    border: 1px solid black !important;
    border-right: none !important;
    border-left: none !important;
    }
    </style>
  </head>
  <body>
    
    <!-- first layout -->
    <section class="">
      <div class="col l12 m12 s12">
        <div class="row m0">
          <div class="card m0">
            <div class="card-content"  style="padding: 30px 40px;">
              <div class="form-container">
                
                <table class="bordered">
                  <tbody>
                    
                    <tr class="top-head">
                      <td colspan="1"><img class="p-image" src="<?php echo base_url() ?>/assets/img/logo.png" alt=""></td>
                      <td style="text-align: center;"><span class="ord-head">Order And Agreement Form</span></td>
                      <td  class="right-align">
                        <span>Toll Free :  1800 4199 456 </span><br>
                        <span>Baraati Media & Entertainment Pvt LTD.</span><br>
                        <span>PAN No : AAICB5254G</span> <br>
                        <span>GST NO : 29AAICB5254GIZJ</span> <br>
                        <span>CIN : U92190KA2019PTC125842</span>
                      </td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2" ><b>Billing Details :  </b></td>
                      <td ><b>Order Date : <?php echo (!empty($result['pay_date']))?date('d M, Y',strtotime($result['pay_date'])):''; ?> </b></td>
                    </tr>
                    <tr>
                      <td colspan="3"> Invoicing Name: <?php echo (!empty($result['invoice_name']))?$result['invoice_name']:''; ?></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2">GSTIN Number : <?php echo (!empty($result['gstno']))?$result['gstno']:''; ?> </td>
                      <td >Customer ID : <?php echo (!empty($result['vendorId']))?$result['vendorId']:''; ?> </td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                      <td colspan="3"> Listing Name : <?php echo (!empty($result['listing_name']))?$result['listing_name']:''; ?> </td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="3">Email Id : <?php echo (!empty($result['listing_mail']))?$result['listing_mail']:''; ?> </td>
                    </tr>
                    <tr >
                      <td colspan="3"> Invoicing Address: <?php echo (!empty($result['invoice_address']))?$result['invoice_address']:''; ?> </td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2">Order Type : <?php echo (!empty($result['ord_type']))?$result['ord_type']:''; ?> </td>
                      <td >Mobile No : <?php echo (!empty($result['listing_phone']))?$result['listing_phone']:''; ?> </td>
                    </tr>
                    <tr>
                      <td colspan="2"> Contact Person : <?php echo (!empty($result['c_person']))?$result['c_person']:''; ?></td>
                      <td>Category : <?php echo (!empty($result['category']))?$result['category']:''; ?> </td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2">Alternate No : <?php echo (!empty($result['alt_phone']))?$result['alt_phone']:''; ?></td>
                      <td >City : <?php echo (!empty($result['city']))?$result['city']:''; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="3" ><b>Package Details : </b></td>
                    </tr>
                    <tr>
                      <td colspan="2"> Package Name : <?php echo (!empty($result['title']))?$result['title']:''; ?></td>
                      <td>Category Name : <?php echo (!empty($result['category']))?$result['category']:''; ?></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2">Listing City : <?php echo (!empty($result['city']))?$result['city']:''; ?></td>
                      <td >Tenure : <?php
                        if (!empty($result['tenure'])) {
                        echo $result['tenure'];
                        if (!empty($result['add_mon'])) {
                        echo ' + '.$result['add_mon'];
                        }
                        echo ' Month(s)';
                      }?></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="3" ><b>Payment Details : </b></td>
                    </tr>
                    <tr>
                      <td colspan="2"> Net Amount : <?php echo (!empty($result['nt_amnt']))?$result['nt_amnt']:''; ?></td>
                      <td>Total Discount : <?php echo (!empty($result['discount']))?$result['discount']:'0'; ?></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2">Amt Payable After Disc : <?php echo (!empty($result['amt_after_disc']))?$result['amt_after_disc']:''; ?></td>
                      <td >18% GST Amount : <?php echo (!empty($result['gst_amount']))?$result['gst_amount']:''; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3"> TDS If Applicable : <?php echo (!empty($result['tds']))?$result['tds']:''; ?></td>
                    </tr>
                    <tr class="bg1" >
                      <td colspan="3"> Total Amount : <?php echo (!empty($result['t_amnt']))?$result['t_amnt']:''; ?></td>
                    </tr>
                    <tr>
                      <?php $num = $result['t_amnt'];
                      $num    = ( string ) ( ( int ) $num );
                      if((int) ($num) && ctype_digit($num))
                      {
                      $words  = array( );
                      $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
                      $list1  = array('','one','two','three','four','five','six','seven',
                      'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                      'fifteen','sixteen','seventeen','eighteen','nineteen');
                      $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                      'seventy','eighty','ninety','hundred');
                      $list3  = array('','thousand','million','billion','trillion',
                      'quadrillion','quintillion','sextillion','septillion',
                      'octillion','nonillion','decillion','undecillion',
                      'duodecillion','tredecillion','quattuordecillion',
                      'quindecillion','sexdecillion','septendecillion',
                      'octodecillion','novemdecillion','vigintillion');
                      $num_length = strlen( $num );
                      $levels = ( int ) ( ( $num_length + 2 ) / 3 );
                      $max_length = $levels * 3;
                      $num    = substr( '00'.$num , -$max_length );
                      $num_levels = str_split( $num , 3 );
                      foreach( $num_levels as $num_part )
                      {
                      $levels--;
                      $hundreds   = ( int ) ( $num_part / 100 );
                      $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                      $tens       = ( int ) ( $num_part % 100 );
                      $singles    = '';
                      if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
                      }
                      $commas = count( $words );
                      if( $commas > 1 )
                      {
                      $commas = $commas - 1;
                      }
                      $words  = implode( ', ' , $words );
                      //Some Finishing Touch
                      //Replacing multiples of spaces with one space
                      $words  = trim( str_replace( ' ,' , ',' , trim( ucwords( $words ) ) ) , ', ' );
                      if( $commas )
                      {
                      $words  = str_replace( ',' , ' and' , $words ).' Rupees Only';
                      } }
                      else if( ! ( ( int ) $num ) )
                      {
                      $words ='';
                      }
                      
                      ?>
                      <td colspan="3"> Amount In Words : <?php echo $words; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="3" ><b>Payment Mode : </b></td>
                    </tr>
                    <tr>
                      <td colspan="2"> Mode : <?php echo (!empty($result['pay_mode']))?$result['pay_mode']:''; ?></td>
                      <td>Instrument No : <?php echo (!empty($result['inst_no']))?$result['inst_no']:''; ?></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2">Payment Date : <?php echo (!empty($result['pay_date']))?$result['pay_date']:''; ?></td>
                      <td >Amount : <?php echo (!empty($result['amount']))?$result['amount']:''; ?></td>
                    </tr>
                    
                    <?php if (!empty($pdcresult)) { 
                      foreach ($pdcresult as $key => $value) {
                    ?>
                    <tr>
                      <td colspan="3"></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="3" ><b>PDC Details : </b></td>
                    </tr>
                    <tr>
                      <td colspan="2"> Mode : <?php echo (!empty($value->mode))?$value->mode:''; ?></td>
                      <td>Instrument No : <?php echo (!empty($value->instrument))?$value->instrument:''; ?></td>
                    </tr>
                    <tr class="bg1">
                      <td colspan="2">Payment Date : <?php echo (!empty($value->date))?$value->date:''; ?></td>
                      <td >Amount : <?php echo (!empty($value->amount))?$value->amount:''; ?></td>
                    </tr>
                    <?php }} ?>
                    
                  </table>
                  
                  
                  
                  <table class="terms">
                    <thead>
                      <tr>
                        <th class="t-title">Terms & Conditions</th>
                      </tr>
                      <tr>
                        <td class="term-sub"><b>Shaadi Baraati</b> is a division of <b>Baraati Media & Entertainment Pvt Ltd.</b> Shaadi Baraati provides information & assistance to Vendor in providing leads of Shaadi Baraati customers for marriage related services. The condition for opting services of Shaadi Baraati is mentioned herein below </td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <ol>
                            <li><b>Eligibility </b>- Vendor is engaged in the business of providing Matrimonial Services and has agreed to provide service for the Leads from Shaadi Baraati.  </li>
                            <li>Customer information shall be provided to the Vendor(s) by way of shared Lead(s). There is no exclusivity in providing Lead(s).</li>
                            <li>Lead feedback from the Vendor is to be submitted to Shaadi Baraati within 24 hours.</li>
                            <li>The Vendor(s) shall pay advance as may be mutually agreed with ShaadiBaraati.com.</li>
                            <li>The Vendor shall pay the agreed commission to Shaadibaraati.com once the Vendor closes the deal with the Customer. The amount of commission shall be deducted from the Advance provided and the Vendor shall pay the balance it any to Shaadi Baraati within 3 (three) working days of the intimation of the balance outstanding.</li>
                            <li><b>Invoicing</b>: Shaadi Baraati will raise an invoice for the commission for the converted leads on monthly basis to the Vendor(s). </li>
                            <li>Once the Advance amount is fully deducted, the Vendor shall provide further Advance amount in respect of leads as agreed mutually between the parties.</li>
                            <li>SB shall have the right to conduct surprise inspections in respect of the Mandapam (s) to check on the leads         provided by SB which has been converted into business between the Vendor and the Customer </li>
                            <li>Shaadi Baraati cannot guarantee or assume responsibility for any specific results to the Vendor </li>
                            <li> Vendor(s) are required to exercise due care and caution while interacting with the customer and satisfy         themselves before they agree to provide services to the customer. </li>
                            <li>Shaadi Baraati has no obligation, to monitor any such disputes arising between the Vendor(s) and the customer(s) and Shaadi Baraati shall not be party to any such dispute/litigation etc. </li>
                            <li>If Baraati Media & entertainment Pvt Ltd receive feedback/ complaints against Vendor(s) service, then Baraati Media & Entertainment Pvt Ltd. shall have the right to remove the Vendor(s) from the Lead shared list and shall not deal with such Vendor(s). </li>
                            <li><b>Policy -</b> Baraati Media & Entertainment Pvt Ltd has the right to change its terms and conditions without notice to the Vendor(s). </li>
                            <li><b>Taxes:-</b> Taxes including GST and Deduction of tax at source shall be applicable at applicable rates as on date. </li>
                            <li><b>Relation between parties -</b> Each party shall be and act as an independent contractor and not as partner, joint         venture, or agent of the other. </li>
                            <li><b>Confidential Information- </b> The term "Confidential Information" means all know-how, methods, financial, business, technical information, Customer information disclosed by or for a party, but not including any information the Vendor(s) can demonstrate is (a) was furnished to it without restriction by a third party, (b)         generally available in public without breach of these terms or (c) independently developed by it without reliance on such information. Except for the specific rights granted by this Agreement, the Vendor(s) shall not possess access, use or disclose any of Baraati Media & Entertainment Pvt Ltd Confidential Information without its prior written consent, and shall use reasonable care to protect the Confidential Information. . Promptly after any termination of these terms Vendor(s) shall return the Confidential Information, records and materials to Baraati Media & Entertainment Pvt Ltd.</li>
                            <li><b>Limitation of Liability -</b> In no event will Baraati Media & Entertainment Pvt Ltd. be liable to the Vendor(s) in               connection with these terms for a) any indirect, consequential, incidental, punitive; exemplary or special losses, whether arising in agreement, tort or otherwise; b) loss of data/programs, loss of profits or revenue, loss of anticipated savings or loss of goodwill, even if such losses or damages were reasonably foreseeable or where Baraati Media & Entertainment Pvt Ltd. has been advised of the possibility of such losses or damages. </li>
                            <li><b>Refund-</b> The advance payment made to Baraati Media & Entertainment Pvt Ltd. towards Any package is treated as no refundable. Payments once made cannot be assigned to any person/Party or adjusted towards any other service </li>
                            <li><b>Termination-</b> No Termination once activated from either side for termination of this agreement.</li>
                            <li><b>Indemnity-</b> The Vendor shall indemnify and keep indemnified Baraati Media & Entertainment Pvt Ltd.          against all loss, damages, and claims, actions that are initiated against Baraati Media & Entertainment Pvt Ltd. for any act or omission by Vendor to (i) leads shared by Baraati Media & Entertainment Pvt Ltd. ; (ii) for breach of confidentiality of these terms and Customer information; (iv) for breach of applicable law. </li>
                            <li><b>Jurisdiction and Dispute Resolution -</b> Any disputes arising out of or in connection with this agreement, during its subsistence and after its termination in any manner whatsoever, including the validity of this Agreement shall be referred to arbitration of a sole arbitrator nominated by the Baraati Media & Entertainment Pvt Ltd. to the dispute in accordance with the provisions contained in the Arbitration and Conciliation Act, 1996 or any amendment made thereto. The place of Arbitration shall be Bengaluru and the language of Arbitration shall be English. The decision of the arbitrator shall be final and binding on the parties. </li>
                            <hr >
                            <span><small>Note : “This is an electronically <b>generated</b> report,  <b>hence does not require a signature”.</b> All right reserved by <b>Baraati Media & Entertainment Pvt Ltd</b> </small></span>
                          </ol>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                  
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
      <script>
      <?php $this->load->view('include/message.php'); ?>
      
      </script>
      <script>
      $(document).ready(function() {
      $('select').formSelect();
      });
      </script>
      
    </body>
  </html>