<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dataTable/button/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <style>
    #experience .material-placeholder {
    margin-bottom: 23px;
    }
    .table-box.hide-on-med-and-down {
    overflow-x: auto;
    }
    </style>
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
                <div class="col l6 m6">
                  <p class="h5-para black-text  m0">Vendor Upgrade Details
                    <a target="_blank" href="<?php echo base_url('vendors/proposal-detail/'.$result['id'])  ?>" class="waves-effect waves-light btn blue darken-1 white-text hoverable ">View </a>
                  </p>
                    
                  </div>
                  <div class="col l6 m6 right-align">
                    <?php if ($this->session->userdata('sha_type') == '7') {
                      $ul = 'finance/all-proposal';
                    }else{
                       $ul = 'vendors/new-proposal';
                    }   ?>
                    <a href="<?php echo base_url().$ul; ?>"  class="waves-effect waves-light btn white-text  blue darken-4 hoverable"><i class="fas fa-backward"></i>&nbsp; Back</a>
                    
                    <?php
                    if ($this->session->userdata('sha_type') == '7' && $result['status'] == '1' && $result['live'] != '1') { ?>
                    <a onclick="return confirm('Are you sure you want to Approve?');" href="<?php echo base_url('finance/make-live/'.$result['id'].'') ?>"  class="waves-effect waves-light btn white-text  green hoverable">Make Live</a>
                    <!-- view vendors -->
                    <!-- edit vendors -->
                    <a onclick="return confirm('Are you sure you want to Reject?');" class="waves-effect waves-light btn white-text red hoverable modal-trigger" href="#modal1"  >Reject</a>
                    <?php }
                    if ($this->session->userdata('sha_type') == '7' && $result['live'] == '1') { ?>
                    <a onclick="return confirm('Are you sure you want to Reject?');" class="waves-effect waves-light btn white-text red hoverable modal-trigger" href="#modal1"  >Reject</a>
                    <?php }else if ($this->session->userdata('sha_type') == '7' && $result['status'] == '2'){ ?>
                    <a onclick="return confirm('Are you sure you want to Approve?');" href="<?php echo base_url('finance/make-live/'.$result['id'].'') ?>"  class="waves-effect waves-light btn white-text  green hoverable">Make Live</a>
                    <?php } ?>
                  </div>


                  <!-- Reject with reason -->
                  <div id="modal1" class="modal">
                    <div class="modal-content">
                      <h6>Reject with reason</h6>
                      <form action="<?php echo base_url('finance/reject/'.$result['id'].'') ?>" method="post" style="overflow-y: auto;overflow-x: hidden;" id="city-form" enctype="multipart/form-data">
                        
                        <div class="row m0">
                          <div class="input-field col s12 l6">
                            <input type="text" id="reason" name="reason" class="validate" required>
                            <label for="reason">Reason <span class="red-text">*</span></label>
                          </div>
                        </div>
                        <input type="hidden" name="uniq" value="<?php echo random_string('alnum',10) ?>">
                        
                        <div class="col s12 mtb20">
                          <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit
                          <i class="fas fa-paper-plane right"></i>
                          </button>
                          <br>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Reject with reason -->
                  
                  </div><!-- end row1 -->
                  <div class="row">
                    <div class="col 112 m12">
                      
                      <div class="card scrollspy" id="personal-detail">
                        <div class="card-content">
                          <p class="bold mb10 h6">Vendor Details  &nbsp;&nbsp;&nbsp; <?php 
                          if ($result['status'] == '1' && $result['live'] == '1'){ ?>
                            <a class="waves-effect waves-light btn white-text  green">Live</a>
                          <?php 
                          }else if ($result['status'] == '1') { ?>
                            <a class="waves-effect waves-light btn white-text  green">Approved</a>
                            <?php 
                          }else if ($result['status'] == '2'){ ?>

                            <a class="waves-effect waves-light btn white-text  red">rejected  </a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp; Because <?php echo (!empty($result['reject_reson']))?$result['reject_reson']:'---'; }  ?></p>

                          <table>
                            <tbody>
                              <tr>
                                <th class="w205">Name</th>
                                <td><?php echo (!empty($result['vendorname']))?$result['vendorname']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">City</th>
                                <td><?php echo (!empty($result['city']))?$result['city']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Category</th>
                                <td><?php echo (!empty($result['category']))?$result['category']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Package</th>
                                <td><?php echo (!empty($result['title']))?$result['title']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Category Banner</th>
                                <td><?php echo (!empty($result['cat_banner']))?'Yes':'NO'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">City Banner</th>
                                <td><?php echo (!empty($result['city_banner']))?'Yes':'NO'  ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    
                    
                    <div class="col 112 m12">
                      
                      <div class="card scrollspy" id="personal-detail">
                        <div class="card-content">
                          <p class="bold mb10 h6">Billing Details</p>
                          <table>
                            <tbody>
                              <tr>
                                <th class="w205">Invoice Name</th>
                                <td><?php echo (!empty($result['invoice_name']))?$result['invoice_name']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">GSTIN Number</th>
                                <td><?php echo (!empty($result['gstno']))?$result['gstno']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Customer ID</th>
                                <td><?php echo (!empty($result['vendorId']))?$result['vendorId']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Listing Name</th>
                                <td><?php echo (!empty($result['listing_name']))?$result['listing_name']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Email Id</th>
                                <td><?php echo (!empty($result['listing_mail']))?$result['listing_mail']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Mobile Number</th>
                                <td><?php echo (!empty($result['listing_phone']))?$result['listing_phone']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Order Type</th>
                                <td><?php echo (!empty($result['ord_type']))?$result['ord_type']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Contact Person</th>
                                <td><?php echo (!empty($result['c_person']))?$result['c_person']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Category</th>
                                <td><?php echo (!empty($result['category']))?$result['category']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">City</th>
                                <td><?php echo (!empty($result['city']))?$result['city']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Alternate No</th>
                                <td><?php echo (!empty($result['alt_phone']))?$result['alt_phone']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">invoice_address</th>
                                <td><?php echo (!empty($result['invoice_address']))?$result['invoice_address']:'---'  ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col 112 m12">
                      <div class="card scrollspy" id="personal-detail">
                        <div class="card-content">
                          <p class="bold mb10 h6">Package Details</p>
                          <table>
                            <tbody>
                              <tr>
                                <th class="w205">Net Amount</th>
                                <td><?php echo (!empty($result['nt_amnt']))?$result['nt_amnt']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">GST</th>
                                <td><?php echo (!empty($result['gst_amount']))?$result['gst_amount']:'---'  ?></td>
                              </tr>
                              <?php
                              $amount = $result['nt_amnt'] + $result['gst_amount'];
                              if (!empty($result['discount'])) {
                              $discount =  ($amount * $result['discount']) / 100;
                              }else{
                              $discount =  0;
                              }
                              $total = $amount - $discount;
                              $totalamount = $total+$result['tds'];
                              ?>
                              <tr>
                                <th class="w205">Total Discount</th>
                                <td><?php echo (!empty($result['discount']))?$result['discount'].'% ( &#8377;'.$discount.')':'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205"> Amount Payable after discount</th>
                                <td><?php echo (!empty($total))?$total:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205"> TDS If Applicable</th>
                                <td><?php echo (!empty($result['tds']))?$result['tds']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205"> Total Amount</th>
                                <td><?php echo (!empty($totalamount))?$totalamount:'---'  ?></td>
                              </tr>
                              
                              <tr>
                                <th class="w205"> Amount In Words</th>
                                <td><?php $num = $result['t_amnt'];
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
                                  $words  = str_replace( ',' , ' and' , $words );
                                  } }
                                  else if( ! ( ( int ) $num ) )
                                  {
                                  $words ='';
                                  }
                                  echo $words;
                                  
                                ?></td>
                              </tr>
                              
                              <tr>
                                <th class="w205">Payment Mode</th>
                                <td><?php echo (!empty($result['pay_mode']))?$result['pay_mode']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Instrument No</th>
                                <td><?php echo (!empty($result['inst_no']))?$result['inst_no']:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Payment Date</th>
                                <td><?php echo (!empty($result['pay_date']))?date('d M, Y',strtotime($result['pay_date'])):'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Amount</th>
                                <td><?php echo (!empty($result['amount']))?$result['amount']:'---'  ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col 112 m12">
                      <div class="card scrollspy" id="personal-detail">
                        <div class="card-content">
                          <?php if (!empty($pdcresult)) { foreach ($pdcresult as $key => $value) { ?>
                          <p class="bold mb10 h6">PDC Details</p>
                          <table>
                            <tbody>
                              
                              <tr>
                                <th class="w205">Payment Mode</th>
                                <td><?php echo (!empty($value->mode))?$value->mode:''; ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Instrument No</th>
                                <td><?php echo (!empty($value->instrument))?$value->instrument:''; ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Payment Date</th>
                                <td><?php echo (!empty($value->date))?$value->date:''; ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Amount</th>
                                <td><?php echo (!empty($value->amount))?$value->amount:''; ?></td>
                              </tr>
                            </tbody>
                          </table>
                              <?php }} ?>
                          <p class="bold mb10 h6">Employee Details</p>
                          <table>
                            <tbody>
                              <tr>
                                <th class="w205">Employee Name</th>
                                <td><?php echo (!empty($emp->name))?$emp->name:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Employee ID</th>
                                <td><?php echo (!empty($emp->id))?$emp->id:'---'  ?></td>
                              </tr>
                              <tr>
                                <th class="w205">Manager Name</th>
                                <td><?php echo (!empty($emp->manager->name))?$emp->manager->name:'---'  ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    
                    
                    </div><!-- end row2 -->
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
            <script type="text/javascript" src="<?php echo base_url() ?>assets/js/short.js"></script>
            <!-- data table -->
            <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/datatables.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/dataTables.buttons.min.js">
            </script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.flash.min.js">
            </script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/buttons.html5.min.js">
            </script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/pdfmake.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/dataTable/button/js/vfs_fonts.js"></script>
            <script>
            <?php $this->load->view('include/message.php'); ?>
            $(document).ready(function(){
            $('.modal').modal();
            });
            </script>
          </body>
        </html>