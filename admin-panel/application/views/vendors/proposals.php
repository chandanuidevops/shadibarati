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
        .bt-red{border-top: 4px solid red; }
        .p-image {width: 260px;}
        .m-10{ margin: 10px !important; }
        .prop-title{
          background-color:
          #D0021B !important;
          line-height: 22px;
          padding: 4px 10px 4px 10px;
          font-size: 20px;
          font-weight: 500;
        }
        .b-none{
          border: none;
        }
        #billing th{width: 150px;}

        .col-befor{
          position: relative;
          padding-right: 15px;
        }
        .col-befor::after{
          content: ":";
          position: absolute;
          right: 7px;
        }
        #billing td{
          padding: 12px 5px;
          
        }
        #billing th{
          font-size: 12px;
        }
        .t-title {font-size: 16px !important; } 
        .listing{border-bottom: 3px solid black; }
        .listing tr{border-bottom: 2px solid rgba(0,0,0,0.12); }
        .terms tr{border: none; }
        .term-sub{padding: 5px; }
        .terms ul:not(.browser-default) > li {list-style-type: decimal; }
        .terms ul{padding-left: 20px; margin: 0; }
        .sell th{font-size: 12px; } 
        .package th{font-size: 12px; }
        .cheque th{font-size: 12px; } 
        .company-repr tbody > tr > th{font-size: 12px; width: 200px; }




     </style>
   </head>
   <body>
    
      <!-- first layout -->
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <div class="col m12 s12 l8 offset-l2">

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container bt-red">

                                      
      <table>
        <thead>
          <tr>
              <th colspan="2"><img class="p-image" src="<?php echo $_SERVER["DOCUMENT_ROOT"] ?>/shaadibaraati/assets/img/logo.png" alt=""></th>
              <th class="right-align">Support : <span class="red-text">1800 4199 456</span><br>Email : <span ><a class="red-text" href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a></span> </th>
          </tr>
          <tr class="b-none"> 
            <th colspan="3" class="center-align"> <center><span class="prop-title red white-text">Proposal Details</span></center>  </th> 
          </tr>
        </thead>        
      </table>


      <table class="striped" id="billing">
        <thead>
          <tr>
              <th class="red-text t-title">Billing Details</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th class="col-befor">invoicing name </th>
            <td><?php echo (!empty($result->name))?$result->name:'---'; ?></td>
            <th class="col-befor">Customer ID    </th>
            <td><?php echo (!empty($result->customer_id))?$result->customer_id:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Email </th>
            <td ><?php echo (!empty($result->email))?$result->email:'---'; ?></td>
            <th class="col-befor">Mobile    </th>
            <td><?php echo (!empty($result->phone))?$result->phone:'---'; ?></td>
          </tr>
            <tr>
            <th class="col-befor">invoicing Address </th>
            <td><?php echo (!empty($result->invoice_address))?$result->invoice_address:'---'; ?></td>
            <th class="col-befor">GSTIN Number   </th>
            <td><?php echo (!empty($result->gst_no))?$result->gst_no:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Proposal Date </th>
            <td><?php echo (!empty($result->p_date))?$result->p_date:'---'; ?></td>
            <th class="col-befor">Proposal Type    </th>
            <td><?php echo (!empty($result->p_type))?$result->p_type:'---'; ?></td>
          </tr>
          
        </tbody>
      </table>


      <table id="billing" class="listing">
        <thead>
          <tr>
              <th class="red-text t-title">Listing Details</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th class="col-befor">Listing name </th>
            <td><?php echo (!empty($result->name))?$result->name:'---'; ?></td>
            <th class="col-befor">Package    </th>
            <td><?php echo (!empty($result->package))?$result->package:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Category </th>
            <td><?php echo (!empty($result->category))?$result->category:'---'; ?></td>
          </tr>
            <tr>
            <th class="col-befor">Lead Email Id </th>
            <td><?php echo (!empty($result->email))?$result->email:'---'; ?></td>
            <th class="col-befor">Lead Mobile Number   </th>
            <td><?php echo (!empty($result->phone))?$result->phone:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Listing Address </th>
            <td><?php echo (!empty($result->list_address))?$result->list_address:'---'; ?></td>
            <th class="col-befor">Landmark    </th>
            <td><?php echo (!empty($result->city))?$result->city:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Contact person </th>
            <td><?php echo (!empty($result->cont_person))?$result->cont_person:'---'; ?></td>
            <th class="col-befor">Listing  City</th>
            <td><?php echo (!empty($result->city))?$result->city:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Working Since </th>
            <td><?php echo (!empty($result->work_since))?$result->work_since:'---'; ?></td>
            <th class="col-befor">Area of service    </th>
            <td><?php echo (!empty($result->city))?$result->city:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Gender </th>
            <td><?php echo (!empty($result->gender))?$result->gender:'---'; ?></td>
            <th class="col-befor">Charges   </th>
            <td><?php echo (!empty($result->charges))?$result->charges:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Facilities   </th>
            <td><?php echo (!empty($result->facility))?$result->facility:'---'; ?></td>
            <th class="col-befor">Other Services   </th>
            <td><?php echo (!empty($result->other_service))?$result->other_service:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Onsite Facility</th>
            <td><?php echo (!empty($result->onsite_facility))?$result->onsite_facility:'---'; ?></td>
            <th class="col-befor">Timing Requirements   </th>
            <td><?php echo (!empty($result->time_require))?$result->time_require:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Payment Mode</th>
            <td><?php echo (!empty($result->pay_mode))?$result->pay_mode:'---'; ?></td>
            <th class="col-befor">Website   </th>
            <td><?php echo (!empty($result->website))?$result->website:'---'; ?></td>
          </tr>

          
        </tbody>
      </table>




      <table class="striped sell">
        <thead>
          <tr>
              <th class="red-text t-title">Online Space Selling Package Information</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th>Package name</th>
            <th>Category Name</th>
            <th>City</th>
            <th>Duration</th>
            <th>Amount</th>
          </tr>
          <tr>
             <td><?php echo (!empty($result->package))?$result->package:'---'; ?></td>
             <td><?php echo (!empty($result->category))?$result->category:'---'; ?></td>
             <td><?php echo (!empty($result->duration))?$result->duration:'---'; ?></td>
             <td><?php echo (!empty($result->amount))?$result->amount:'---'; ?></td>
          </tr>
          
        </tbody>
      </table>


      <table class="striped package">
        <thead>
          <tr>
              <th class="red-text t-title">Package Cost</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="col-befor">Net Amount </th>
            <td><?php echo (!empty($result->net_amount))?$result->net_amount:'---'; ?></td>
            <th class="col-befor">GST Amount    </th>
            <td><?php echo (!empty($result->gst_amount))?$result->gst_amount:'---'; ?></td>
            <th class="col-befor">Total Amount    </th>
            <td><?php echo (!empty($result->tot_amount))?$result->tot_amount:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Total Amount paid for online selling package (In words) </th>
           <td><?php echo (!empty($result->amnt_words))?$result->amnt_words:'---'; ?></td>
          </tr>
        </tbody>
      </table>


      <table class="striped cheque">
        <thead>
          <tr>
              <th class="red-text t-title">Cheque / DD details / online</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="col-befor">Payment Mode </th>
            <td><?php echo (!empty($result->pay_mode))?$result->pay_mode:'---'; ?></td>
            <th class="col-befor">Order id/ Cheque No</th>
            <td><?php echo (!empty($result->ord_id))?$result->ord_id:'---'; ?></td>
          </tr>
          <tr>
            <th class="col-befor">Payment Date/ Cheque Date</th>
            <td><?php echo (!empty($result->o_date))?$result->o_date:'---'; ?></td>
            <th class="col-befor">Amount</th>
            <td><?php echo (!empty($result->tot_amount))?$result->tot_amount:'---'; ?></td>
          </tr>
        </tbody>
      </table>

      <table class="terms">
        <thead>
          <tr>
              <th class="red-text t-title">Terms & Conditions</th>
          </tr>
          <tr>
              <td class="term-sub">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <ul>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit.onse ctetur adip isicing elitonse ctetur adip isicing elit </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adip isicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, cons ectetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consec tetur adipisicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consec tetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit. </li>
            </ul></td>
          </tr>
          
        </tbody>
      </table>


      <table class="striped company-repr">
        <thead>
          <tr>
              <th class="red-text t-title">Company Representative Details</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th >Employee Name</th>
            <th >Designation</th>
            <th >Contact No/Email id </th>
          </tr>
          <tr>
            <td >lorem</td>
            <td >lorem</td>
            <td >lorem</td>
          </tr>
          <tr>
            <td >lorem</td>
            <td >lorem</td>
            <td >lorem</td>
          </tr>
          <tr>
            <td >lorem</td>
            <td >lorem</td>
            <td >lorem</td>
          </tr>
        </tbody>
      </table>



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

        <script>
  <?php $this->load->view('include/message.php'); ?>
    
  </script>
      <script>
    $(document).ready(function() {

        $('select').formSelect();
        $("#city-form").validate({
            rules: {
                city: {
                    required: true,
                },
            },
            messages: {
                
                city: "Please enter a city",
            }
        });
    });
    </script>
        
    </body>
</html>