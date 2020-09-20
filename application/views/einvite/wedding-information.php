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
                                <p class="truncate">RSVP</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <form action="<?php echo base_url('wedding-information/insert') ?>" method="POST">
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Bride Information</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <div class="row">
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="bname" type="text" name="bname" class="validate" value="<?php echo (!empty($result->brsvp_name))?$result->brsvp_name:''; ?>">
                                                            <label for="bname">Bride Contact Name  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="brelation" type="text" name="brelation" class="validate" value="<?php echo (!empty($result->brsvprel))?$result->brsvprel:''; ?>">
                                                            <label for="brelation">Bride Relation  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="eid" value="<?php echo $this->input->get('eid') ?>">
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="bnumber" type="text" name="bnumber" class="validate"  value="<?php echo (!empty($result->brsvp_phone))?$result->brsvp_phone:''; ?>">
                                                            <label for="bnumber">Bride Contact No  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Groom Information</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <div class="row">
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="gname" type="text" name="gname" class="validate" value="<?php echo (!empty($result->grsvp_name))?$result->grsvp_name:''; ?>">
                                                            <label for="gname">Groom Contact Name  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="grelation" type="text" name="grelation" class="validate" value="<?php echo (!empty($result->grsvprel))?$result->grsvprel:''; ?>">
                                                            <label for="grelation">Groom Relation  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <input id="gnumber" type="text" name="gnumber" class="validate" value="<?php echo (!empty($result->grsvp_phone))?$result->grsvp_phone:''; ?>">
                                                            <label for="gnumber">Groom Contact No  <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                        <button type="reset" class="waves-effect waves-light btn white plr30 accent-4 black-text">Reset</button>
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