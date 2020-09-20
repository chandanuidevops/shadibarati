<!DOCTYPE html>
<html>

<head>
    <title>Shaadi Baraati</title>
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slimselect.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/landing.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/swiper.css">
    <?php $this->load->view('includes/favicon.php');  ?>
    <style>

        /* .sel-serv{
            display: none;
        } */

        .sel-quots .select-wrapper .dropdown-content{
            height: 220px;
        }
    </style>
</head>

<body>
    <nav class="z-depth-1 navbar-fixed">
    <div class="nav-wrapper white">
        <a href="#"><img src="<?php echo base_url() ?>assets/img/logo.png" class="img-responsive brand-logo" alt=""></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i
                class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down header-ul ">
            <li><a href="<?php echo base_url() ?>">HOME</a></li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="<?php echo base_url() ?>">HOME</a></li>
</ul>

    <!-- banner -->
    <section class="landing-banner">
        <div class="container-fluide">
            <div class="row">
                <div class="col l5 m5 s12">
                    <div class="title-landing">
                        <h5>Find the Perfect Wedding Vendors For your wedding</h5>
                        <p>Find Phone Number, Email, Portfolio, Reviews & Photos of Wedding Vendors. </p>
                    </div>
                    <div class="title-answer">
                        <h3>Answer 3 Simple Questions & get the Best Suitable Wedding Vendors.</h3>
                    </div>
                </div>
                <div class="col l6 m6 s12">
                    <div class="form-slider">
                        <div class="filter-boxs">
                            <div class="slides">
                                <div id="slide-1" style="opacity: 1; width: 480px;" class="active">
                                    <div class="slide-header"><span class="point-no">1</span>
                                        <h2>What type of planning is required?</h2>
                                    </div>
                                    <span class="input-options next-one " data-option="1,2,3" data-field="#planning_options"><div class="filter-p1 type-label border-bottom vndr-ct-filtrflw-0-nxt-web plan-wed" data-id="1">Full Wedding Planning<span class="sub-text" style="pointer-events: none;">Booking all Services + Coordination + Execution, etc.</span>
                                    <i class="material-icons">chevron_right</i>
                                </div>
                                </span>
                                <span class="input-options next-one" data-option="1,2,4" data-field="#planning_options"><div class="filter-p1 type-label border-bottom vndr-ct-filtrflw-0-nxt-web plan-wed" data-id="2">Partial Planning<span class="sub-text" style="pointer-events: none;">Booking 2-3 Services or just Coordination or just Execution</span>
                                <i class="material-icons">chevron_right</i></div>
                            </span>
                        </div>
                        <div id="slide-2" class="" style="opacity: 1; width: 480px;">
                            <div class="slide-header">
                                <span class="point-no">2</span>
                                <h2>Your total wedding budget?</h2>
                            </div>
                            <span class="input-options next-two" data-option="1" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options border-bottom vndr-ct-filtrflw-1-nxt-web plan-bud" data-id="1">Less than ₹ 15L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <span class="input-options next-two" data-option="2" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options border-bottom vndr-ct-filtrflw-1-nxt-web plan-bud" data-id="2">₹ 15L - 30L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <span class="input-options next-two" data-option="3" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options border-bottom vndr-ct-filtrflw-1-nxt-web plan-bud" data-id="3">₹ 30L - 60L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <span class="input-options next-two" data-option="4" data-field="#budget_options"><div class="filter-p1 budget-label two-slide-options vndr-ct-filtrflw-1-nxt-web plan-bud" data-id="4">More than ₹ 60L <i class="material-icons arrow-p">chevron_right</i></div></span>
                            <div class="slide-footer">
                                <span class="input-options back-one" data-option="" data-field="#budget_options"><button class="action-back vndr-ct-filtrflw-1-bck-web go-back"> <i class="material-icons arrow-btn">chevron_left</i> Back </button></span>
                            </div>
                        </div>
                        <div id="slide-3">
                            <div class="slide-header">
                                <span class="point-no">3</span>
                                <h2>Choose your event date</h2>
                            </div>
                            <div class="third-slide-container">
                                <div class="calender-container cc-date">
                                    <input type="text" id="datep" class="datepicker" name="datep" placeholder="Select Your Event Date">
                                    <span class="next-three"><div class="budget-label no-border third-slide-next-but pad-left but-slide-3-next input-options vndr-ct-filtrflw-2-nxt-web" data-option="" data-field="#event_dates" id="not_decide">Dates not decided yet <i class="material-icons checker-btn">chevron_right</i></div></span>

                                    <div class="input-field sel-quots col s12 p0" id="sel-serv">
                                            <select required name="qservice" class="qservice">
                                                <option value="" selected>Select Services</option>
                                                <?php foreach (vendor_category() as $key => $cts) { ?>
                                                <option value="<?php echo $cts->category ?>"><?php echo $cts->category ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                </div>
                                <div class="slide-footer">
                                    <span class="back-two"><button class="action-back vndr-ct-filtrflw-2-bck-web"><i class="material-icons arrow-btn">chevron_left</i> Back </button></span>
                                    <span class="next-three"><button class="action-pink third-slide-next-but show-on-select vndr-ct-filtrflw-2-nxt-web">Submit</button></span>
                                </div>
                            </div>
                        </div>
                        <div id="slide-4" style="opacity: 0; width: 0px;" class="">
                            <div class="form-container">
                                <span class="result-found">
                            <span style="font-weight:400;">We have found</span>
                                <br>Lots of WEDDING VENDORS
                                <span class="wow flip center" data-wow-iteration="100" data-wow-duration="1s">🎊</span>
                                <br>matching your requirements!
                                </span>
                                <p class="hide-on-phone">Signup to view them &amp; get quotes</p>
                                <form action="<?php echo base_url('home/insertenquiry'); ?>" method="post" class="jqueryform2">
                                    <div class="field">
                                        <input type="text" name="name" id="fullname" placeholder="Name" required="">
                                    </div>
                                    <div class="field">
                                        <input type="email" name="email" id="email" placeholder="Email" required="">
                                    </div>
                                    <div class="field">
                                        <input type="number" name="number" id="number" placeholder="Number" required="">
                                        <input type="hidden" name="uniq" value="<?php echo random_string('alnum',10); ?>">
                                    </div>
                                    <button class="action-pink-form" type="submit" value="submit">View Wedding Vendors</button>
                                </form>
                                <p class="hide-on-phone">Want to change your requirements? - <button class="back-three action-empty-form back-slide-3 vndr-ct-filtrflw-edtrqmt-web go-back">Go Back</button></p>
                                <!-- <button class="action-empty-form back-slide-3 vndr-ct-filtrflw-edtrqmt-web"><i class="fa left fa-angle-left"></i>Go Back &amp; Change</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Swiper -->
        </div>
    </section>

    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="vender-detail">
                        <h4>About Us</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive" alt="">
                        <p>Shaadi Baraati was established to bring a real, high quality Online Wedding Market to Pan India Level. Our passion for excellence is what inspired us in the beginning and it continues to drive us today. We pride ourselves in the
                            superior experience of shopping in our Wedding Store and in the long-term relationships we’ve built with our customers. People come back to Shaadibaraati.com because they know they’ll find what they’re looking for on our shelves
                            - and if they don’t, we’ll help them find it. Getting a customer's satisfaction is very hard. But all the customers in Shaadi Bharaati gives a most satisfied feedback in their wedding. We provide a service based on the customers
                            need is a best thing we follow.</p>
                        <h2>" Because it’s your wedding, it should be unique! "</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <section class="sec bg-col">
        <div class="container-fluide">
            <div class="row">
            <div class="col l12 m12 s12">
                    <div class="vender-detail">
                        <h4>Our Blogs</h4>
                        <img src="<?php echo base_url() ?>assets/img/saprator.png" class="img-responsive " alt="">
                        <p>Read up on these wedding Blogs while you are looking forward to your own special day. </p>
                    </div>
                </div>
            </div>
            
            <div class="row" id="blog">
            
                <div class="col l4 m6 s12" v-for="item in datas">
                    <a :href="item.link" class="">
                        <div class="blog-detail hoverable">
                            <div class="blog-img-box">
                                <img v-if="item.featured_media != null" :src="item.blogImage"  alt=""
                                class="img-responsive blog-img">
                            </div>
                            
                            <div class="blog-li">
                                <h6 class="black-text truncate">{{item.title.rendered}}</h6>
                                <P class="black-text" v-html="item.excerpt.rendered"></P>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <center><a class="btn-cate" href="<?php echo base_url() ?>blog">View All </a></center>
        </div>
    </section>

    
    <section class="sec">
        <div class="container-fluide">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="center-align get-land">
                        <h4>Get In Touch</h4>
                        <p>Subscribe to Shaadi Baraati and Get access to our latest Blogs, Wedding Ideas and get the best quotes from trusted Wedding Vendors. </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col l12 m12 s12">
                        <div class="contatct-item">
                            <div class="col l4 m3 s6">
                                <p> <i class="material-icons">mail</i> </p>
                                <p>Mail</p>
                                <p><a href="mailto:support@shaadibaraati.com">support@shaadibaraati.com</a></p>
                            </div>
                            <div class="col l4 m3 s6">
                                <p> <i class="material-icons">call</i> </p>
                                <p>Toll Free</p>
                                <p><a href="tel:18004199456">1800 4199 456</a></p>
                            </div>
                            <div class="col l4 m3 s6 smslayout">
                                <p> <i class="material-icons">sms</i> </p>
                                <p>For Details TYPE <b>"BARAATI"</b> space your name and send it to 567678080</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
    <div id="div2" style="width:80px;height:80px;display:none;background-color:green;"></div><br>
    <div id="div3" style="width:80px;height:80px;display:none;background-color:blue;"></div>

<section class="sec-footer bg-col">
    <div class="container-fluide">
        <div class="row m0">
            <div class="col l8 m8 s12">
                <div class="landing-footer">
                    <h2>ShaadiBaraati</h2>
                    <a href="<?php echo base_url('about-us') ?>">
                        <p>About Us</p>
                    </a>
                    <a href="<?php echo base_url('privacy-policy') ?>">
                        <p>Privacy Policy</p>
                    </a>
                    <a href="<?php echo base_url('terms-conditions') ?>">
                        <p>Terms & Condition</p>
                    </a>
                </div>
                <div class="copy-land">
                    <p>© Shaadibaraati.com <?php echo date('Y') ?>. All right reserved by Baraati Media &amp; Entertainment Pvt Ltd </p>
                </div>
            </div>
            <div class="col l4 m4 s12">
                <div class="call-to-action">
                    <h5>
                        You Can directly call us!
                    </h5>
                    <p>Give Us call and discuss your requirements.</p>
                    <a href="#">Call us on 1800 4199 456</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/js/vue.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slimselect.min.js"></script>
    <script type="https://raw.githubusercontent.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/swiper.js"></script>
    <script>
    <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                format: 'yyyy-mm-dd',
            });

               var slect = document.querySelectorAll('select[name=qservice]');
                var slectinstances = M.FormSelect.init(slect);

        });
    </script>
    <script>
        $(document).ready(function() {
            $(".datepicker-done").click(function() {
                $(".action-pink").css("display", "block");
            });
            $(".datepicker-cancel").click(function() {
                $(".action-pink").css("display", "none");
            });
        });
        

        $(document).on('click','.plan-wed',function() {
            var wplan = $(this).attr("data-id");
            if (wplan=='2') {
                $('.sel-quots').css('display', 'block');
            }else{
                $('.sel-quots').css('display', 'none');
            }
            $.ajax({
                url: '<?php echo base_url()?>home/setuser',
                type: 'Get',
                dataType: 'html',
                data: {wplan: wplan },
                success: function(data) {
                }
            });
        });
        
        $(document).on('click','.plan-bud',function() {
            var bud = $(this).attr("data-id");
            $.ajax({
                url: '<?php echo base_url()?>home/setuser',
                type: 'Get',
                dataType: 'html',
                data: {bud: bud },
                success: function(data) {

                }
            });
        });

        $(document).on('change','input[name="datep"]',function() {
            var date = $(this).val();
            $.ajax({
                url: '<?php echo base_url()?>home/setuser',
                type: 'Get',
                dataType: 'html',
                data: {date: date },
                success: function(data) {

                }
            });
        });

        $(document).on('change','.qservice',function() {
            var qservice = $(this).val();
            $.ajax({
                url: '<?php echo base_url()?>home/setuser',
                type: 'Get',
                dataType: 'html',
                data: {qservice: qservice },
                success: function(data) {

                }
            });
        });

        $(document).on('click','#not_decide',function() {
            var date = 'Not Decided';
            $.ajax({
                url: '<?php echo base_url()?>home/setuser',
                type: 'Get',
                dataType: 'html',
                data: {date: date },
                success: function(data) {

                }
            });
        });


        $(document).on('click','.action-back,.go-back',function() {
            $.ajax({
                url: '<?php echo base_url()?>home/checkweduser',
                type: 'Get',
                dataType: 'json',
                success: function(response) {

                    var wplan = response.wplan;
                    if (wplan != '') {
                        if ($('.plan-wed').hasClass("active")) { $('.plan-wed').removeClass('active'); }
                        $('.plan-wed[data-id='+wplan+']').addClass('active');
                    }

                    var wbud = response.wbud;

                    if (wbud != '') {
                        if ($('.plan-bud').hasClass("active")) { $('.plan-bud').removeClass('active'); }
                        $('.plan-bud[data-id='+wbud+']').addClass('active');
                    }

                    var wdate = response.date;
                    if (wdate != '' && wdate != 'Not Decided') {
                        $('input[name="datep"]').val(date);
                    }
                    




                }
            });
        });


        var blog = new Vue({
        el : '#blog',
        data:{
            datas: '',
        },
        mounted(){
            this.blogFetch()
        },
        methods: {

            blogFetch(){
                axios.get('<?php echo base_url() ?>home/blogFetch')
                .then(response => {
                    this.datas = response.data;
                })
                .catch(error => {
                  if (error.response) {
                      this.errormsg = error.response.data.error;
                  }
                })
            },


            

        },
        
    })
    </script>
</body>

</html>