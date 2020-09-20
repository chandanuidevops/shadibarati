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
                                <p class="truncate">Select Theme</p>
                            </div>
                            <div class="">
                                <div class="cboady">
                                    <div class="category-list">
                                        <ul class="tabs tab-ll">
                                            <li class="tab tab-li col s3"><a id="actrem" href="#a1" :class="{'active': mehnactive}">Mehndi</a></li>
                                            <li class="tab tab-li col s3"><a href="#a2" :class="{'active': engactive}">Engagement</a></li>
                                            <li class="tab tab-li col s3"><a href="#a3" :class="{'active': wedactive}">Wedding</a></li>
                                            <li class="tab tab-li col s3"><a href="#a4" :class="{'active': recactive}">Reception</a></li>
                                        </ul>
                                    </div>
                                    <div class="dash-template">
                                        <h3>Select Your Template and Start to Create</h3>
                                    </div>
                                    <div class="template-design" id="a1" :class="{'active': mehnactive}" :style="{'display': mentmp}">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1" :style="{'border': menbord}">
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/mehindhi1.png" class="img-responsive" alt="">
                                                            <p>Mehndi Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview') ?>?item=mehindi-1"><i class="material-icons">remove_red_eye</i></a> <a @click="theme('mehindi1')"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1" :style="{'border': menbord2}">
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/mehindhi2.jpg" class="img-responsive" alt="">
                                                            <p>Mehendi Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview')?>?item=mehindi-2"><i class="material-icons">remove_red_eye</i></a> 
                                                            <a @click="theme('mehindi2')"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="template-design" id="a2" :class="{'active': engactive}" :style="{'display': engtmp}">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1" :style="{'border': engbord}">
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/engagement1.png" class="img-responsive" alt="">
                                                            <p>Engagement Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview')?>?item=engagement-1"><i class="material-icons">remove_red_eye</i></a> 
                                                            <a @click="theme('eng1')"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1" :style="{'border': engbord2}" >
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/engagement2.png" class="img-responsive" alt="">
                                                            <p>Engagement Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview')?>?item=engagement-2"><i class="material-icons">remove_red_eye</i></a> 
                                                            <a @click="theme('eng2')"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="template-design" id="a3" :class="{'active': wedactive}" :style="{'display': wedtmp}">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1" :style="{'border': wedbord}" >
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/weddding1.jpg" class="img-responsive" alt="">
                                                            <p>Wedding Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview')?>?item=wedding-1"><i class="material-icons">remove_red_eye</i></a> 
                                                            <a @click="theme('wed1')"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1" :style="{'border': wedbord2}" >
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/wedding2.jpg" class="img-responsive" alt="">
                                                            <p>Wedding Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview')?>?item=wedding-2"><i class="material-icons">remove_red_eye</i></a> 
                                                            <a @click="theme('wed2')"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="template-design" id="a4" :class="{'active': recactive}" :style="{'display': rectmp}">
                                        <div class="row">
                                            <div class="col offset-l2 l10 ">
                                                <div class="row">
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1"  :style="{'border': recbord1}" >
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/reception1.jpg" class="img-responsive" alt="">
                                                            <p>Reception Template 1</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview')?>?item=reception-1"><i class="material-icons">remove_red_eye</i></a> 
                                                            <a @click="theme('rec1')"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col l5 m4 s12">
                                                        <div class="template-m img-wedd z-depth-1" :style="{'border': recbord2}">
                                                            <img src="<?php echo base_url() ?>assets/img/e-invite/reception2.jpg" class="img-responsive" alt="">
                                                            <p>Reception Template 2</p>
                                                        </div>
                                                        <div class="temp-view">
                                                            <a href="<?php echo base_url('e-invite/preview')?>?item=reception-2"><i class="material-icons">remove_red_eye</i></a> 
                                                            <a @click="theme('rec2')"><i class="material-icons">edit</i></a>
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
                mehindi1:'',
                mehindi2:'',
                rec1:'',
                rec2:'',
                wed1:'',
                wed2:'',
                eng1:'',
                eng2:'',
                mentmp:'none',
                engtmp:'none',
                wedtmp:'none',
                rectmp:'none',
                mehnactive:false,
                engactive:false,
                wedactive:false,
                recactive:false,
                recbord1:'',
                recbord2:'',
                menbord:'',
                menbord2:'',
                engbord:'',
                engbord2:'',
                wedbord:'',
                wedbord2:'',

            },
            methods:{
                theme(type){
                    const formData = new FormData();
                    formData.append('theme', type);
                    axios.post('<?php echo base_url() ?>einvite/themeinsert', formData)
                    .then(response => {
                        console.log(response);
                        if(response.data != ''){
                            window.location.href="<?php echo base_url() ?>bide-groom?eid="+response.data;
                        }
                    })
                    .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                    })
                },
                getTheme(){
                    axios.post('<?php echo base_url() ?>einvite/getThemeselect')
                    .then(response => {
                        if(response.data == 'rec1'){
                            this.recactive = true;
                            this.rectmp = 'block';
                            this.recbord1 = '2px solid #d0021b;';
                             var element = document.getElementById("actrem");
                            element.classList.remove("active");

                        }else if(response.data  == 'rec2'){
                            this.recactive = true;
                            this.rectmp = 'block';
                            this.recbord2 = '2px solid #d0021b;';
                            var element = document.getElementById("actrem");
                            element.classList.remove("active");
                        }else if(response.data  == 'mehindi1'){
                            this.mehnactive = true;
                            this.mentmp = 'block';
                            this.menbord = '2px solid #d0021b;';
                        }else if(response.data  == 'mehindi2'){
                            this.mehnactive = true;
                            this.mentmp = 'block';
                            this.menbord2 = '2px solid #d0021b;';
                        }else if(response.data  == 'eng1'){
                            this.engactive = true;
                            this.engtmp = 'block';
                            this.engbord = '2px solid #d0021b;';

                            var element = document.getElementById("actrem");
                            element.classList.remove("active");

                        }else if(response.data  == 'eng2'){
                            this.engactive = true;
                            this.engtmp = 'block';
                            this.engbord2 = '2px solid #d0021b;';

                            var element = document.getElementById("actrem");
                            element.classList.remove("active");
                        }else if(response.data  == 'wed1'){
                            this.wedactive = true;
                            this.wedtmp = 'block';
                            this.wedbord = '2px solid #d0021b;';

                            var element = document.getElementById("actrem");
                            element.classList.remove("active");

                        }else if(response.data  == 'wed2'){
                            this.wedactive = true;
                            this.wedtmp = 'block';
                            this.wedbord2 = '2px solid #d0021b;';

                            var element = document.getElementById("actrem");
                            element.classList.remove("active");

                        }else{
                            this.mehnactive = true;
                            this.mentmp = 'block';
                        }

                    })
                    .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                    })
                },
            },
            mounted: function() {
                this.getTheme();

            },
        });
    </script>
</body>

</html>