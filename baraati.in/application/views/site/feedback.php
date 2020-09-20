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
</head>

<body>
    <div id="app">
        <?php $this->load->view('includes/header.php'); ?>
            <section class="contact-back sec">
                <div class="row">
                    <div class="col l12 s12">
                        <div class="banner-up ">
                            <h5 class="white-text">FEEDBACK</h5>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col l10 push-l1">
                            <div class="feedback-form z-depth-2">
                                <h4>Give Us Your Feedback</h4>
                                <div class="form-feed-list">
                                    <form action="<?php echo base_url('feedback-post') ?>" method="post">
                                        <div class="row">
                                        <div class="col l12 m12 s12">
                                                <div class="feedback-input padd10">
                                                <div class="left">Rate us : </div>
                                                 <star-rating v-model="ar" :star-size="20" class="feed-star"></star-rating>
                                                 <input type="hidden" name="rate" :value="ar">
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="fn" type="text" name="fname" class="validate" required="">
                                                        <label for="fn">First Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="ln" name="lname" type="text" class="validate" required="">
                                                        <label for="ln">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="email" name="email" type="text" class="validate" required="">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col l6 m6 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <input id="phone" name="phone" type="text" class="validate" required="">
                                                        <label for="phone">Phone</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col l12 m12 s12">
                                                <div class="feedback-input">
                                                    <div class="input-field">
                                                        <textarea id="textarea1" name="feedback" requred class="materialize-textarea hh-height" ></textarea>
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
    Vue.component('star-rating', VueStarRating.default);
    var app = new Vue({
        el: '#app',
        data: {
            rev_rating: '',
            ar: '1',
            email: '',
            emailError: '',
           
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
                } 
            },
            
            // rating
            setRating: function(rating) {
                this.rating = "You have Selected: " + rating + " stars";
            },
            showCurrentRating: function(rating) {
                this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " +
                    rating + " stars"
            },
            setCurrentSelectedRating: function(rating) {
                this.currentSelectedRating = "You have Selected: " + rating + " stars";
            },
        },
    });
    </script>
</body>

</html>