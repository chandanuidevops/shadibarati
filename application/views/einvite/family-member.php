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
                                <p class="truncate">Family Members</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <form class="" action="<?php echo base_url() ?>family-member" method="POST" enctype="multipart/form-data"> 
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Bride / Groom Family</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <div class="row">
                                                    <div class="col l5 m5 s12">
                                                        <div class="input-field">
                                                            <select class="family" required="" name="family">
                                                                <option value="" disabled>Select Family <span class="red-text">*</span></option>
                                                                <option value="bride">Bride</option>
                                                                <option value="groom">Groom</option>
                                                            
                                                              </select>
                                                               <label for="">Family</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="eid" value="<?php echo $this->input->get('eid') ?>">
                                                    <div class="col l5 s12 m6">
                                                        <div class="input-field">
                                                            <select class="relation" required="" name="relation">
                                                                <option value="" disabled>Select Relation <span class="red-text">*</span></option>
                                                                <option value="father">Father</option>
                                                                <option value="mother">Mother</option>
                                                                <option value="brother">Brother</option>
                                                                <option value="sister">Sister</option>
                                                              </select>
                                                              <label for="">Relation</label>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 s12 m6">
                                                        <div class="input-field">
                                                            <input id="name" type="text" required name="name" class="validate">
                                                            <label for="name">Member Name <span class="red-text">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col l6 s12 m6">
                                                        <div class="feedback-input">
                                                            <div class="file-field input-field">
                                                                <div class="btn hh-file"><span>File</span> <input type="file" name="image"></div>
                                                                <div class="file-path-wrapper"><input required="required" type="text" placeholder="Choose image" class="file-path validate if-file"></div>
                                                                <p><b>Note :</b>PNG , JPG image accepted for better view use 1MB</p>
                                                            </div>
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
                                                                    <div class="col s12">
                                                                    <p class="bold mb10 h6"><?php echo $value->name ?></p>
                                                                </div>
                                                                        <div class="col s12">
                                                                            <img width="100px" src="<?php echo base_url().$value->image ?>" alt="">
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        <div class="col s12">
                                                                            <p>Family Type : <?php echo $value->family ?></p>
                                                                        </div>
                                                                        <div class="clearfix"></div>

                                                                        <div class="col s12">
                                                                            <p>Relation  : <?php echo $value->realtion ?></p>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    <?php   } } ?>
                                                    
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                        <button type="reset" class="waves-effect waves-light btn white plr30 accent-4 black-text">Reset</button>
                                        <?php if (!empty($result)) { ?>
                                        <a href="<?php echo base_url('wedding-photo?eid=').$this->input->get('eid'); ?>" class="tooltipped waves-effect waves-light btn red accent-4 white-text right" data-position="bottom" data-tooltip="Click here if you dont want to add more family member">Next <i class="material-icons dp48" style="position: relative; top: 4px;">chevron_right</i></a>
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
        $(document).ready(function() {
            $('.collapsible-body').css({
                display: 'block',
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
        var app = new Vue({
            el: '#app',
            data: {

            }
        });
    </script>
</body>

</html>