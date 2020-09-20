<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $seo = seo();
    $m_titl = '';
    $m_descp = '';
    $m_key = '';
    $m_can = '';

    if (!empty($seo[0])) {
        foreach ($seo as $key => $value) {
            if($value->page == 'real-wedding' || $value->page == 'Real-Wedding' || $value->page == 'real wedding' || $value->page == 'Real Wedding'){
                $m_titl     = $value->title;
                $m_descp    = $value->m_desc;
                $m_key      = $value->keywords;
                $m_can      = $value->can_link; 
                $m_description = $value->description; 
            }
        }
    }
    ?>
    <title><?php echo $m_titl ?> | Shaadi Baraati</title>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $m_descp ?>" />
    <link rel="canonical" href="<?php echo $m_can ?>" />
    <meta name="keywords" content="<?php echo $m_key ?>" />
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/slimselect.min.css">
    <?php $this->load->view('includes/favicon.php');  ?>
    <style>
        
        .wed-detail p{
            color:black;
        }
       
    </style>
</head>

<body>
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>
        <section class="contact-back sec">
            <div class="row m0">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">Real Wedding</h5>
                        <p class="tc white-text pad0-11">Browse by city to find wedding professionals in your area and view photos of their work.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="real-thumb">
            <div class="container-fluide">
                <div class="row">
                    <div class="col l12 m12 s12">
                        <div class="e-invite-detail">
                            <h3>It is all About Real Weddings Stories</h3>
                            <p class="tc black-text pad-10">What greater thing is there for two human souls, than to feel that they are joined for life–to strength each other in all labor, to rest on each other in all sorrow, to minister to each other in silent unspeakable memories at the moment of the last parting?</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(!empty($records)){
                        foreach($records as $row){ 
                            $rname = !empty($row->name)?$row->name:'';
                            $rcity = !empty($row->city)?$row->city:'';

                            ;?>
                        <a href="<?php echo base_url('real-wedding/'.str_replace(" ","-",strtolower($rname)).'-'.str_replace(" ","-",strtolower($rcity)).'/'.$row->id.'') ?>" >
                            <div class="col l4 s12 m4">
                                <div class="card-wed">
                                    <div class="img-box">

                                    <img src="<?php echo base_url().'/'.$row->image;?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="wed-detail">
                                        <p class="truncate"><b><?php echo $row->name;?></b> | <?php echo $row->city;?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php }}?>
                </div>
                <div class="row m0">
                    <div class="col s12">
                        <?php echo (!empty($pagelink))?$pagelink: '' ?>
                    </div>
                </div>


                <!-- <div class="class-pagi">
                    <ul class="pagination">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </div> -->
            </div>
        </section>

        <?php    
        if (!empty($m_description)) { ?>
        <section class="result-body conts p0" style="border-top: 1px solid #e3e3e3;">
            <div class="container-2">
                <div class="row m0">
                    <div class="col l11 m12 s12">
                        <?php echo (!empty($m_description))?$m_description:''; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>


        <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <!-- <script src="<?php echo base_url()?>/assets/js/slimselect.min.js"></script> -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('select');
            var instances = M.FormSelect.init(sel);
        });

        var app = new Vue({
            el: '#app',
            data: {
                listItem: '',
                isShow: true,
                isDay: true,
                isbudget: true,
                isAvg: true,
                isFilter: true,
                autocomplete: '',
                vendor: '',
                visible: false,
                previsible: false,
                email: '',
                emailError: '',
                

            },
            created() {
                window.addEventListener('resize', this.handleResize)
                this.handleResize();
            },
            mounted() {
                new SlimSelect({
                    select: '#sel-cato'
                });
                new SlimSelect({
                    select: '#sel-city'
                });
            },
            methods: {

                // email check on database
                emailCheck() {
                    this.emailError = '';
                    const formData = new FormData();
                    formData.append('email', this.email);
                    axios.post('<?php echo base_url() ?>home/emailcheck', formData)
                        .then(response => {
                            if (response.data == '1') {
                                this.emailError = 'You are already subscribed.';
                            } else {
                                this.emailError = '';
                            }
                        })
                        .catch(error => {
                            if (error.response) {
                                this.errormsg = error.response.data.error;
                            }
                        })
                },
                checkForm() {
                    if (this.emailError == '') {


                        this.$refs.form.submit()
                    } else {}
                },
                handleResize() {
                    if (window.innerWidth <= 600) {
                        this.isFilter = false;
                    }
                },


                vendorcheck() {
                    this.autocomplete = '';
                    this.visible = true;
                    this.previsible = true;
                    const formData = new FormData();
                    formData.append('vendor', this.vendor);
                    axios.post('<?php echo base_url() ?>search/vendorcheck', formData)
                        .then(response => {
                            if (response.data != '') {
                                this.previsible = false;
                                this.autocomplete = response.data;
                            } else {
                                this.previsible = false;
                                this.autocomplete = '';
                            }
                        })
                        .catch(error => {
                            this.previsible = false;
                            if (error.response) {
                                this.errormsg = error.response.data.error;
                            }
                        })
                }
            },

        });
    </script>
    <script>
        // search in reasult page
        $(document).ready(function() {


            $(document).on('change', '#sel-city,#sel-cato', function(e) {
                e.preventDefault();

                var cityval = $('#sel-city').children("option:selected").val();
                var city = cityval.toLowerCase();
                var categoryval = $('#sel-cato').children("option:selected").val();
                var cat = categoryval.toLowerCase();

                if (city == '') {
                    var finalUrl = '<?php echo base_url()?>vendors/all/' + cat.replace(" ", "-", );
                } else {
                    var finalUrl = '<?php echo base_url()?>vendors/' + city.replace(" ", "-", ) + '/' + cat.replace(" ", "-", );
                }
                var url = finalUrl.replace(" ", "-", );



                $("#search-form").attr('action', url);
                $("#search-form").submit();
            });


            $('html').click(function() {
                // $('.sg-box').hide();
                $(".sg-box").removeClass("visible");
            })

            $('.sg-box').click(function(e) {
                e.stopPropagation();
            });

            $('#search-vend').keyup(function() {
                $(".sg-box").addClass("visible");
            })

        });
    </script>
</body>

</html>