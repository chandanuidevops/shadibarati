<?php 
$this->ci =& get_instance();
$this->load->model('m_account'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/image-uploader.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <?php $this->load->view('includes/favicon.php');  ?>

    <style>
        .img-wed {height: 140px; margin-bottom: 10px; overflow: hidden; max-height: 140px; } 
    </style>
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
                                <p class="truncate">Wedding Photos</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <form action="<?php echo base_url('wedding-photo/insert') ?>" method="post" enctype="multipart/form-data">
                                        <div class="bg-detail">
                                            <div class="title-br">
                                                <h5>Upload Photos</h5>
                                            </div>
                                            <div class="detial-bg-list">
                                                <!-- Portfolio  -->
                                                <div class="list-profile">
                                                    <div class="">
                                                                <div class="row m0">

                                                        
                                                            <div v-for="image  in imgs" :key="image.id" class="col l4 m3 s6">
                                                                <div class="wedding-photo">
                                                                    <div class="img-wed">
                                                                        <img :src="image.image"  class="img-responsive" alt="">
                                                                    </div>
                                                                    <div class="wed-hov">
                                                                        <a v-on:click="galDelete(image.id)">
                                                                            <i class="large material-icons">delete</i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="eid" value="<?php echo $this->input->get('eid') ?>">
                                                                
                                               

                                                        </div>

                                                        
                                                        <div class="row m0">
                                                            <div class="col col l12 m10 s12">
                                                                <div class="file-field input-field mm-drop">
                                                                    <div class="input-images pad10" id="file"></div>
                                                                    <span class="helper-text-vender "><b class="notes">Note</b>: Please select only image file
                                (eg: .jpg, .png, etc.) <br> <b class="notes">Max filesiemens
                                    size:</b> 1MB <span class="red-text">*</span></span>
                                                                </div>
                                                            </div>
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
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/image-uploader.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.collapsible-body').css({
                display: 'block',
            });
            $('.input-images').imageUploader();
        });
    </script>
    <script>
        var demo = new Vue({
            el: '#app',
            data: {
                imgs: [],
            },
            methods: {
                getData: function() {
                axios.post('<?php echo base_url('einvite/gallery?eid='.$this->input->get('eid')) ?>')
                    .then(response => {
                        if (response.data != '') {
                            this.imgs   = response.data;
                        }
                    })
                    .catch(error => {
                        console.log(response);

                    })
                },
                galDelete(id){
                       axios.post('<?php echo base_url('einvite/galDelete/') ?>'+id+'<?php echo '?eid='.$this->input->get('eid') ?>')
                       .then(response => {
                            if (response.data != '') {
                                this.imgs   = response.data;
                                 M.toast({html: 'Image deleted Successfully', classes: 'green', displayLength : 5000 });
                            }
                        })
                        .catch(error => {
                            console.log(response);

                        })
                }

            },
            mounted: function() {
                this.getData();
            }

        });
    </script>
</body>

</html>