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

<body >
    <div id="app">

        <?php $this->load->view('includes/header.php'); ?>
        <section class="contact-back sec">
            <div class="row m0">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">About US</h5>
                        <p class="tc white-text">Shaadibaraati India's Most Trusted Online Wedding Market</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec">
            <div class="container-fluide">
                <div class="row">
                    <div class="col l6 m5 s12">
                        <div class="about-img">
                            <img src="assets/img/about.png" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col l6 m7 s12">
                        <div class="">
                            <h4>Who We Are</h4>
                            <p class="tj">Shaadi Baraati  was established to bring a real, high quality Online Wedding Market to Pan India Level. Our passion for excellence is what inspired us in the beginning and it continues to drive us today. We pride ourselves in the superior experience of shopping in our Wedding Store and in the long-term relationships we’ve built with our customers. People come back to Shaadibaraati.com because they know they’ll find what they’re looking for on our shelves - and if they don’t, we’ll help them find it. Getting a customer's satisfaction is very hard. But all the customers in Shaadi Bharaati gives a most satisfied feedback in their wedding. We provide a service based on the customers need is a best thing we follow.</p>
                            <p class="tj"><i>" Because it’s your wedding, it should be unique! "</i></p>
                            <p class="tj"> Some things never change, like the thought of sharing one's life with somebody who means the world and has really become the only world that one wants to be part of. It's the one time in your life when perfection means everything. The slightest detail, that flower in the corner, those drapes at the back, the right aromas, ethereal music and a magical ambiance, everything you could ever imagine to profess your love and seal it forever. We at Shaadi Baraati transform your celebration into a memory for a lifetime, we leave you and your guests awestruck by our party throwing skills and killer creativity. Every celebration you want us to plan is a new adventure - embark on yours with us. Although several wedding planners are there, we shows the uniqueness in our wedding planning. We give different and beautifull venus and photography's, which attract the people. The Bridal and groom wedding dresses and jewellers are very beautiful and perfect match with their partner and venue.  The website attract me and I have a idea to go for it. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-back " id="counter" >
            <div class="container">
                <div class="row m0">
                    <div class="col l4 m4 s12">
                        <div class="about-sha ">
                            <i class="fas fa-users"></i>
                            <p class="counter-value" data-count="1000000">0</p>
                            <h5>Vendors</h5>
                        </div>
                    </div>
                    <div class="col l4 m4 s12">
                        <div class="about-sha">
                            <i class="fas fa-star"></i>
                            <p class="counter-value" data-count="700000">0</p>
                            <h5>Customer</h5>
                        </div>
                    </div>
                    <div class="col l4 m4 s12">
                        <div class="about-sha">
                            <i class="fas fa-heart"></i>
                            <p class="counter-value" data-count="5000">0</p>
                            <h5>Weddings</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec">
            <div class="container-fluide">
                <div class="row m0">
                    <div class="col l6 m7 s12">
                        <div class="wwr-oo">
                            <h4 class="mt0">Business Directory</h4>
                            <p class="tj">Though we might be new to this blooming industry but our dedication towards our work make us stand out in the crowd. Our Staff looks forward to every function with keen enthusiasm, making your experience once in a lifetime. Quality, excellence and experience! This is what we are here to provide you with the best. We get a satisfaction from the customer's satisfaction in their wedding. We feel proud of ourselves to giving a excellent wedding planning from the beginning. Every couple want to get a different wedding and beautiful memories for their long term relationship. We give the best way to get their dream wedding within their budget. Many of our customers again visit our website Shaadibaraati.com and they give a good feedback about their wedding. </p>
                                <p class="tj">Every detail is considered carefully with your needs, taste & budget in mind. We really care about the client, the success of the Event. We believe every occasion should be an elegant occasion. So, come join us and let us give you the experience of a lifetimeI am visiting the Shaadi Bharaati website. We plan for your all wedding events like Mehandi, Engagement, Wedding, Reception and also for a Honeymoon packages.  We take care of each and every steps for the function from wedding decoration to wedding jewellery. We have all the wedding vendors like wedding photographers, Bridal makeup artists, Wedding Decorators, Choreographers, Bridal designers, Wedding caterers, Mehandi artists, Wedding planners, Wedding bands and everything for the wedding.</p>
                                <!-- <a href="<?php echo base_url() ?>vendors"><button class="btn-about">I am Vendor</button></a> -->
                        </div>
                    </div>
                    <div class="col l6 m5 s12">
                        <div class="about-img">
                            <img src="assets/img/about-oo.jpg" class="img-responsive" alt="">
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
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>


<script>
var a = 0;
$(window).scroll(function() {

var oTop = $('#counter').offset().top - window.innerHeight;
if (a == 0 && $(window).scrollTop() > oTop) {
  $('.counter-value').each(function() {
    var $this = $(this),
      countTo = $this.attr('data-count');
    $({
      countNum: $this.text()
    }).animate({
        countNum: countTo
      },

      {

        duration: 3000,
        easing: 'swing',
        step: function() {
          $this.text(Math.floor(this.countNum));
        },
        complete: function() {
          $this.text(this.countNum);
          //alert('finished');
        }

      });
  });
  a = 1;
}

});
</script>

<script>
    var demo = new Vue({
        el: '#demo',
        data: {
            email: '',
            emailError: '',
           
        },

        methods: {
            // mobile number check on database
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
            }
        },
    });

    </script>
</body>

</html>