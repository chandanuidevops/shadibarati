<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati | Testimonial</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>
            <section class="contact-back sec">
                <div class="row">
                    <div class="col l12 s12">
                        <div class="banner-up ">
                            <h5 class="white-text">TESTIMONIAL</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col l10 push-l1">
                            <div class="feedback-form z-depth-2">
                                <h4>Write a Testimonial</h4>
                                <div class="form-testimonial-list">
                                    <form action="<?php echo base_url('testimonial-post')?>" method="post">
                                        <div class="row">
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="fn" name="fname" type="text" class="validate" required="">
                                                        <label for="fn">First Name <span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="ln" type="text" class="validate" name="lname">
                                                        <label for="ln">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="email" type="text" class="validate" name="email">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="phone" type="text" class="validate" name="phone" required="">
                                                        <label for="phone">Phone <span class="red-text">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="best" type="text" class="validate" name="best">
                                                        <label for="best">What did you like best ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <input id="improve" type="text" class="validate" name="improve">
                                                        <label for="improve">How can we improve ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                  <label for="phone" class="black-text h-rate">Rate Our Service <span class="red-text">*</span></label>
                                                    <div class="input-field if-feed">
                                                        <p>
                                                    <label class="ratio-all">
                                                        <input value="Excellent" class="with-gap" name="service" type="radio"  checked />
                                                        <span class="ration-rr">Excellent</span>
                                                    </label>
                                                </p>
                                                <p>
                                                    <label class="ratio-all">
                                                        <input value="Good"      class="with-gap" name="service"     type="radio"  />
                                                        <span class="ration-rr">Good</span>
                                                    </label>
                                                </p>
                                                <p >
                                                    <label class="ratio-all">
                                                        <input value="Disappointing" class="with-gap" name="service" type="radio"  />
                                                        <span class="ration-rr">Disappointing</span>
                                                    </label>
                                                </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                  <label for="phone" class="black-text h-rate">Would you recommend us to your friends</label>
                                                    <div class="input-field if-feed">
                                                        <p>
                                                    <label class="ratio-all">
                                                        <input value="Yes" class="with-gap" name="recomend" type="radio"  checked />
                                                        <span class="ration-rr">Yes</span>
                                                    </label>
                                                </p>
                                                <p>
                                                 <label class="ratio-all">
                                                        <input value="Yes" class="with-gap" name="recomend"     type="radio"  />
                                                        <span class="ration-rr">No</span>
                                                    </label>
                                                </p>
                                                    </div>
                                                </div>
                                            </div><br />
                                            <div class="col l12 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field if-feed">
                                                        <textarea required id="textarea1" name="feedback" class="materialize-textarea " ></textarea>
                                                        <label for="textarea1">Write your feedback here</label>
                                                    </div>
                                                </div>
                                                <button class="waves-effect waves-light btn red plr30 accent-4 white-text">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sec-top">
                <div class="container-fluide">
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div class="testimonial-full">
                                <?php foreach ($result as $key => $value) { ?>
                                    <div class="tes-reviews">
                                        <h5><?php echo $value->fname .' '. $value->lname ?></h5>
                                        <p><?php echo $value->feedback ?></p>
                                        <p>Rate Our Services : <span style="color:red;"><?php echo $value->service ?></span></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php $this->load->view('includes/footer'); ?>
    </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/css/slick/slick.min.js"></script>

    <script>
        <?php $this->load->view('includes/message'); ?>
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    </script>
    <script>
        $('.testimonial-full').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 3000,
        nextArrow: false,
        prevArrow: false,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });
    </script>
</body>

</html>