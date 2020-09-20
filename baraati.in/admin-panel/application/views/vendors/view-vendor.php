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
                            <div class="col 12 m6">
                                <p class="h5-para black-text  m0">Vendor Details -
                                    <?php echo (!empty($result->name))?$result->name:'---'  ?></p>
                            </div>

                            <div class="col 12 m6 right-align">
                                <a href="<?php echo base_url('vendors/edit/'.$result->id)  ?>" class="waves-effect waves-light btn green darken-4 white-text hoverable ">Edit Vendor</a>
                            </div>
                        </div><!-- end row1 -->
                        <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row m0">
                                            <div class="col s12 m6 border-right">

                                                <img src="<?php echo !empty($result->profile_file)?$this->config->item('web_url').$result->profile_file :'https://via.placeholder.com/150'  ?>"
                                                    alt="" class="circle responsive-img left mr10" width="120px"
                                                    height="100px;" />

                                                <div class="ptb10">
                                                    <h6 class="bold">
                                                        <?php echo (!empty($result->name))?$result->name:'---'  ?></h6>
                                                    <h6><small><a
                                                                href="mailto:<?php echo (!empty($result->email))?$result->email:'---'  ?>"><?php echo (!empty($result->email))?$result->email:'---'  ?></a></small>
                                                    </h6>
                                                    <h6><small><a
                                                                href="tel:<?php echo (!empty($result->phone))?$result->phone:'---'  ?>"><?php echo (!empty($result->phone))?$result->phone:'---'  ?></a></small>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col s12 m6">
                                                <div class="row m0">
                                                    <div class="col s12 center m6">
                                                        <h5 class="green-text darken-3"><?php echo count($enquiry) ?>
                                                        </h5>
                                                        <p>Total Enquiries</p>
                                                    </div>

                                                    <div class="col s12 center m4 mt40">
                                                        <!-- user block and unblock -->
                                                        <?php
                                                        if ((!empty($result->is_active)) && $result->is_active == '1') { ?>
                                                        <a href="<?php echo base_url('users/block/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn red hoverable white-text darken-4 plr40"
                                                            id="block">Block</a>
                                                        <?php }elseif ((!empty($result->is_active)) && $result->is_active == '2') { ?>
                                                        <a href="<?php echo base_url('users/unblock/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn green hoverable white-text darken-4 plr40"
                                                            id="unblock">Unblock</a>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url('users/block/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn red hoverable white-text darken-4 plr40"
                                                            id="block" style="display: none">Block</a>
                                                        <a href="<?php echo base_url('users/unblock/'.$result->id.'') ?>"
                                                            class="waves-effect waves-light btn green hoverable white-text darken-4 plr40"
                                                            id="unblock" style="display: none">Unblock</a>
                                                        <input type="hidden" name="userid" id="userid"
                                                            value="<?php echo $result->id ?>">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-buttons show-on-large hide-on-med-and-down">
                                <ul class="tabs1 transparent">
                                    <li class="tab1 col s2"><a href="#personal-detail" class="active">Profile</a></li>
                                    <li class="tab1 col s2"><a href="#profile" class="">Details</a></li>
                                    <li class="tab1 col s2"><a href="#experience" class="">Portfolio</a></li>
                                    <li class="tab1 col s2"><a href="#education" class="">Enquiries</a></li>
                                    <li class="tab1 col s2"><a href="#education1" class="">Reviews</a></li>
                                    <li class="tab1 col s2"><a href="#education2" class="">Offer</a></li>
                                </ul>
                            </div>
                            <div class="card scrollspy" id="personal-detail">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Profile</p>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="w205"><i class="far fa-user mr10"></i> Name</th>
                                                <td><?php echo (!empty($result->name))?$result->name:'---'  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="w205"><i class="fas fa-envelope mr10"></i> Email</th>
                                                <td><a
                                                        href="mailto:<?php echo (!empty($result->email))?$result->email:'---'  ?>"><?php echo (!empty($result->email))?$result->email:'---'  ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="w205"><i class="fas fa-phone mr10"></i> Phone</th>
                                                <td><a
                                                        href="tel:<?php echo (!empty($result->phone))?$result->phone:'---'  ?>"><?php echo (!empty($result->phone))?$result->phone:'---'  ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="w205"><i class="fas fa-calendar-alt mr10"></i> Registered
                                                    date</th>
                                                <td><?php echo (!empty($result->registered_date))?date("M d, Y ", strtotime($result->registered_date)):'---'; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="w205"><i class="fas fa-venus-mars mr10"></i>Category</th>
                                                <td><?php echo (!empty($result->category))?$result->category:'---'  ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="w205"><i class="fas fa-venus-mars mr10"></i>City</th>
                                                <td><?php echo (!empty($result->city))?$result->city:'---'  ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card scrollspy" id="profile">
                                <div class="card-content">
                                    <p class="bold mb10 h6">About</p>
                                    <ul class="profile-box">
                                        <li class="profile-items">
                                            <div class="profile-item-content">
                                                <p><?php echo (!empty($result->detail))?$result->detail:'---'  ?></p>
                                            </div>
                                        </li>                                       
                                    </ul>
                                </div>
                            </div>
                            <!-- Work Experiance -->
                            <div class="card scrollspy" id="experience">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Portfolio</p>
                                    <div class="row">
                                        <?php if (!empty($port)) {
                                foreach ($port as $key => $value) { ?>
                                        <div class="col s12 l3 m6 ">
                                            <img class="materialboxed z-depth-1" width="200"
                                                src="<?php echo $this->config->item('web_url').'/vendor-portfolio/'.$value->thumb_image ?>">
                                        </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="card scrollspy" id="education">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Enquiries</p>
                                    <div class="table-box hide-on-med-and-down">
                                        <table id="dynamic" class="striped">
                                            <thead>
                                                <tr class="tt">
                                                    <th id="a" class="h5-para-p2" width="130px">Name</th>
                                                    <th id="b" class="h5-para-p2" width="100px">Email ID</th>
                                                    <th id="c" class="h5-para-p2" width="120px">Phone</th>
                                                    <th id="e" class="h5-para-p2" width="100px">Enquired Date</th>
                                                    <th id="e" class="h5-para-p2" width="100px">Function Type</th>
                                                    <th id="e" class="h5-para-p2" width="100px">Function Time</th>
                                                    <th id="f" class="h5-para-p2" width="100px">Description</th>
                                                    <th id="g" class="h5-para-p2" width="62px">Function Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                    if (!empty($enquiry)) {
                                      foreach ($enquiry as $key => $value) {
                                      ?>
                                                <tr>
                                                    <td><?php echo (!empty($value->user_name))?$value->user_name:'---'  ?></td>
                                                    <td><a
                                                            href="mailto:<?php echo (!empty($value->user_email))?$value->user_email:'---'  ?>"><?php echo (!empty($value->user_email))?$value->user_email:'---'  ?></a>
                                                    </td>
                                                    <td><a
                                                            href="tel:<?php echo (!empty($value->user_phone))?$value->user_phone:'---'  ?>"><?php echo (!empty($value->user_phone))?$value->user_phone:'---'  ?></a>
                                                    </td>
                                                    <td><?php echo (!empty($value->date))?date("M d, Y ", strtotime($value->date)):'---'; ?>
                                                    </td>
                                                    <td><?php echo (!empty($value->fn_type) == '1')?'Pre Wedding':'---'; (!empty($value->fn_type) == '2')?'Wedding':'---'  ?> </td>
                                                    <td><?php echo (!empty($value->fn_type) == '1')?'Evening':'---'; (!empty($value->fn_type) == '2')?'Day':'---'  ?> </td>
                                                    <td><?php echo (!empty($value->wed_detail))?$value->wed_detail:'---'  ?> </td>
                                                    <td><?php echo (!empty($value->fn_date))?date("M d, Y ", strtotime($value->fn_date)):'---'; ?>
                                                    </td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                             <div class="card scrollspy" id="education1">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Reviews</p>
                                    <div class="table-box hide-on-med-and-down">
                                        <table id="dynamic1" class="striped">
                                            <thead>
                                                <tr class="tt">
                                                    <th id="a" class="h5-para-p2" width="130px">User Name</th>
                                                    <th id="b" class="h5-para-p2" width="100px">User Email ID</th>
                                                    <th id="e" class="h5-para-p2" width="100px">Rating</th>
                                                    <th id="e" class="h5-para-p2" width="100px">Good At</th>
                                                    <th id="e" class="h5-para-p2" width="100px">Review</th>
                                                    <th id="g" class="h5-para-p2" width="62px">Date</th>
                                                    <th id="g" class="h5-para-p2" width="62px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                    if (!empty($review)) {
                                      foreach ($review as $key => $value) {
                                      ?>
                                                <tr>
                                                    <td><?php echo (!empty($value->user_name))?$value->user_name:'---'  ?></td>
                                                    <td><a
                                                            href="mailto:<?php echo (!empty($value->user_email))?$value->user_email:'---'  ?>"><?php echo (!empty($value->user_email))?$value->user_email:'---'  ?></a>
                                                    </td>
                                                    <td><?php echo (!empty($value->rating))?$value->rating:'---'  ?></td>
                                                    <td><?php echo (!empty($value->proffesional))?'Proffesionalism ,':'';  echo (!empty($value->quality))?'Quality Of Work,':''; echo (!empty($value->service))?'On Time Service ,':''; echo (!empty($value->money))?'Value for Money ,':''; echo (!empty($value->experience))?'Highly Experienced ,':''; ?></td>
                                                    <td><?php echo (!empty($value->review))?substr($value->review,0,150).'...':'---'  ?></td>

                                                    <td><?php echo (!empty($value->added_date))?date("M d, Y ", strtotime($value->added_date)):'---'; ?>
                                                    </td>
                                                    <td class="action-btn  center-align">
                                                        <!-- view user -->
                                                        <a href="#modal<?php echo $value->id ?>"  class="blue hoverable  modal-trigger"><i class="fas fa-edit "></i></a>


                                                        <div id="modal<?php echo $value->id ?>" class="modal" style="width: 35%;">
                                        <div class="modal-content">
                                            <h6>Edit review</h6>
                                            <form action="<?php echo base_url() ?>vendor-review/update" method="post"
                                                enctype="multipart/form-data">
                                                <div class="col l12">
                                                    <div class="row m0">
                                                        <div class="input-field col s12">
                                                            <input type="hidden" value="<?php echo $value->id ?>" name="id">
                                                            <input type="hidden" value="<?php echo $value->vendor_id ?>" name="vendid">
                                                             <textarea id="revw" class="materialize-textarea" name="revw" required="true"><?php echo $value->review ?></textarea>
                                                            <label for="revw">Review</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <button
                                                            class="btn waves-effect waves-light green darken-4 hoverable btn-small"
                                                            type="submit">Submit </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    
                                                        <!-- view user -->
                                                        <!-- delete user -->
                                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('vendor-review/delete/'.$value->id.'/'.$value->vendor_id) ?> " class="red hoverable delete-btn"><i class="fas fa-trash  "></i></a>
                                                        <!-- delete user -->
                                                    </td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="card scrollspy" id="education2">
                                <div class="card-content">
                                    <p class="bold mb10 h6">Offer</p>
                                    <div class="table-box hide-on-med-and-down">
                                        <img src="<?php echo (!empty($offer['image']))?$this->config->item('web_url').$offer['image']:''  ?>" alt="" style="width: 400px; height: auto;">
                                        
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
    </script>
    <script>
    $(document).ready(function() {
        $('.scrollspy').scrollSpy();
        $('.materialboxed').materialbox();
        $('.modal').modal();
        $('#dynamic').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
        });
        $('#dynamic1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
        });
        $('select').formSelect();
        //block user
        $("#block").on('click', function(event) {
            event.preventDefault();
            var id = $("input[name='userid']").val();
            loder(true);
            $.ajax({
                url: "<?php echo base_url();?>vendors/block_vendor",
                type: "get",
                dataType: "html",
                data: {
                    'id': id,
                    'status': '2'
                },
                success: function(data) {
                    console.log(data);
                    $('#unblock').css('display', ' inline-block ');
                    $('#block').css('display', 'none');
                    loder(false);
                }
            });
        });
        //unbloack user
        $("#unblock").on('click', function(event) {
            event.preventDefault();
            var id = $("input[name='userid']").val();
            loder(true);
            $.ajax({
                url: "<?php echo base_url();?>vendors/block_vendor",
                type: "get",
                dataType: "html",
                data: {
                    'id': id,
                    'status': '1'
                },
                success: function(data) {
                    console.log(data);
                    $('#block').css('display', ' inline-block ');
                    $('#unblock').css('display', 'none');
                    loder(false);
                }
            });
        });
        //page loader
        function loder(status) {
            if (status == true) {
                $('.preloader-verfy').css('display', 'block');
            } else {
                $('.preloader-verfy').css('display', 'none');
            }
        }

    });
    </script>
</body>

</html>