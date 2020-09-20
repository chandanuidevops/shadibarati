<?php 
$this->ci =& get_instance();
$this->load->model('m_account'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>

        <!-- body  -->
        <section class="dsection">
            <div class="container-1">
                <div class="row m0">
                    <!-- left menu -->
                    <?php $this->load->view('includes/left-menu.php'); ?>
                    <!-- end left menu -->

                    <div class="col s12 m8 l9">
                        <div class="card">
                            <div class="chead">
                                <p class="truncate">Wedding Event</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <form class="" action="<?php echo base_url('invite-event/insert') ?>" method="POST">
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Event Details</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <div class="row m0">
                                                    <div class="col l6 m5 s12">
                                                        <div class="input-field">
                                                            <input id="eve_name" type="text" name="eve_name" required="" class="validate">
                                                            <label for="eve_name">Event Name  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l6 s12 m6">
                                                        <div class="input-field">
                                                            <input id="eve_venue" type="text" name="eve_venue" required="" class="validate">
                                                            <label for="eve_venue">Venue <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l6 s12 m6">
                                                        <div class="input-field">
                                                            <input id="eve_date" type="text" name="eve_date" required="" class="datepicker">
                                                            <label for="eve_date">Event Date <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l6 s12 m6">
                                                        <div class="input-field">
                                                             <input type="text" name="eve_time" class="validate" required>
                                                            <label for="eve_time">Event Time  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="eid" value="<?php echo $this->input->get('eid') ?>">

                                                    <div class="col l6 s12 m6">
                                                        <div class="input-field">
                                                            <textarea id="eve_add" name="eve_add" class="materialize-textarea"></textarea>
                                                            <label for="eve_add">Address  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l6 m6 s12">
                                                        <div class="input-field ">
                                                            <textarea id="eve_dec" name="eve_dec" class="materialize-textarea"></textarea>
                                                            <label for="eve_dec">Event Description  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>

                                                    
                                                     <div class="clearfix"></div>

                                                    <div class="row mo">
                                                    <?php
                                                    if (!empty($result)) {
                                                        foreach ($result as $key => $value) { ?>
                                                        <div class="col l5 m5 s12">
                                                            <div class="card scrollspy" id="personal-detail">
                                                                <div class="card-content">
                                                                    <p class="bold mb10 h6"><?php echo $value->name ?></p>
                                                                        <div class="col s12">
                                                                            <p><?php echo $value->venue ?></p>
                                                                        </div>
                                                                        <div class="clearfix"></div>

                                                                        <div class="col s12">
                                                                            <p><?php echo date('d M, Y',strtotime($value->date)) ?> <span><?php echo $value->time ?></span></p>
                                                                        </div>
                                                                        <div class="clearfix"></div>

                                                                        <div class="col s12">
                                                                            <p><?php echo (!empty($value->address))?$value->address:''; ?></p>
                                                                        </div>
                                                                        <div class="col s12">
                                                                            <p><?php echo (!empty($value->desc))?$value->desc:''; ?></p>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    <?php   } } ?>
                                                    
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                        <button type="reset" class="waves-effect waves-light btn white plr30 accent-4 black-text">Reset</button>
                                        <?php if (!empty($result)) { ?>
                                        <a href="<?php echo base_url('family-member?eid=').$this->input->get('eid'); ?>" class="tooltipped waves-effect waves-light btn red accent-4 white-text right" data-position="bottom" data-tooltip="Click here if you dont want to add more event">Next <i class="material-icons dp48" style="position: relative; top: 4px;">chevron_right</i></a>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- script -->
    <script src="<?php echo base_url()?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        $(document).ready(function() {
            $('.collapsible-body').css({
                display: 'block',
            });
        });
    </script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                list: [{
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    }, {
                        id: '1'
                    },

                ]
            }
        });
    </script>
</body>

</html>