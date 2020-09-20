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
   <!--  <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e149abf7dc3a500126f4d0f&product=inline-share-buttons&cms=sop' async='async'></script> -->
    <style>
        .st-btn.st-first.st-last {width: 25% !important; } 
        .sharethis-inline-share-buttons {display: inline-block !important;
position: relative !important;
right: 0 !important;
top: -8px;
margin-left: 8px; } 
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
                                <p class="truncate">My website</p>
                            </div>
                            <div class="">
                                <div class="cboady">

                                    <div class="template-design" id="a4">
                                        <div class="row">
                                            <div class="col l10 s12 m12 ">
                                                <div class="row">
                                                    <?php 
                                                    if (!empty($result)) {
                                                        $theme='';
                                                        foreach ($result as $key => $value) {

                                                            $groom = (!empty($value->groom))?$value->groom:'#';
                                                            $bride = (!empty($value->bride))?$value->bride:'#';

                                                            switch ($value->theme) {
                                                                case 'mehindi1':
                                                                    $name = 'Mehindi Website';
                                                                    $theme = 'assets/img/e-invite/mehindhi1.png';
                                                                    break;
                                                                case 'mehindi2':
                                                                    $name = 'Mehindi Website';
                                                                    $theme = 'assets/img/e-invite/mehindhi2.jpg';
                                                                    break;
                                                                case 'rec1':
                                                                    $name = 'Reception Website';
                                                                    $theme = 'assets/img/e-invite/reception1.jpg';
                                                                    break;
                                                                case 'rec2':
                                                                    $name = 'Reception Website';
                                                                    $theme = 'assets/img/e-invite/reception2.jpg';
                                                                    break;
                                                                case 'eng1':
                                                                    $name = 'Engagement Website';
                                                                    $theme = 'assets/img/e-invite/engagement1.png';
                                                                    break;
                                                                case 'eng2':
                                                                    $name = 'Engagement Website';
                                                                    $theme = 'assets/img/e-invite/engagement2.png';
                                                                    break;
                                                                case 'wed1':
                                                                    $name = 'Wedding Website';
                                                                    $theme = 'assets/img/e-invite/weddding1.jpg';
                                                                    break;
                                                                case 'wed2':
                                                                    $name = 'Wedding Website';
                                                                    $theme = 'assets/img/e-invite/wedding2.jpg';
                                                                    break;
                                                                default:
                                                                    $name = '';
                                                                    break;
                                                            }
                                                        ?>

                                                        <form action="" style="display: none">
            <input id="gal_id" ref="myTestField" type="text" class="validate in-l"name="gal_id"value="<?php echo $value->id; ?>"> 
        </form>
                                                        <div class="col l5 m6 s12">
                                                            <p><?php echo $name ?></p>
                                                            <div class="template-m img-wedd">
                                                                <img src="<?php echo base_url().$theme ?>" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="temp-view">
                                                                <div class="row">
                                                                <a target="_blank" href="<?php echo base_url().'my-website/'.$groom.'-weds-'.$bride.'?site='.urlencode(base64_encode($value->id)).'' ?>"><i class="material-icons">remove_red_eye</i></a> 
                                                                <a target="_blank" href="<?php echo base_url('bide-groom?eid=').$value->uniq ?>"><i class="material-icons">edit</i></a>
                                                                <!-- <div class="sharethis-inline-share-buttons"></div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php    } } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
        <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        $(document).ready(function() {
            $('.tabs').tabs();
            $('.collapsible-body').css({
                display: 'block',
            });
        });
    </script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                gal_id:'',
                

            },
            methods:{
                themeEdit(){

                    const formData = new FormData();
                    formData.append('gal_id', this.$refs.myTestField.value);
                    axios.post('<?php echo base_url() ?>einvite/changeStatus',formData)
                        .then(response => {
                            if (response.data != '') {
                               window.location.href ="<?php echo base_url('bide-groom') ?>"
                            }
                        })
                        .catch(error => {
                            console.log(response);

                        })

                },
               
            },
            
        });
    </script>
</body>

</html>