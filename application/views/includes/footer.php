       <section class="sec footer-wed">
        <div class="container-2">
           <div class="row m0">
               <div class="col s12 m12 l6 bfrb">
               
                    <div class="left-align">
                        <h4>Wedz Assistance</h4>
                        <p>Assisted Wedding Planner is Assisted wedding services brought to you by Shaadi Baraati at One-time nominal fee starting at Rs.999/- that helps you plan your wedding with a unlimited qualified wedding vendors as every minute detail is considered carefully with your needs, taste & budget in mind and Dedicated Relationship manager is assigned for each and every queries.Your dedicated relationship expert remains your single point of contact.</p>
                    </div>
                     
                    <div class="wed-bottom">
                        <div class="wed-bottom-inner">
                            <img src="<?php echo base_url()?>assets/img/icon/c.png" alt="">
                            <span>SEARCH</span>
                        </div>
                        <div class="wed-bottom-inner">
                            <img src="<?php echo base_url()?>assets/img/icon/b.png" alt="">
                            <span>SELECT</span>
                        </div>
                        <div class="wed-bottom-inner">
                            <span><img src="<?php echo base_url()?>assets/img/icon/a.png" alt=""></span>
                            <span>BOOK</span>
                        </div>
                    </div>
                    <div class="social-media ">
                        <ul>
                            <li><a href="https://www.facebook.com/shaadibaraatiofficial" target="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/facebook-brands.svg"
                                        class="img-responisve socil-icon" alt=""> </a></li>
                            <li><a href="https://www.twitter.com/shaadibaraati" target="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/twitter-brands.svg"
                                        class="img-responisve socil-icon" alt=""></a></li>
                            <li><a href="https://www.youtube.com/channel/UCdFxvtsmbh2mUrIGE5d7Txg"
                                    target="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/youtube.svg"
                                        class="img-responisve socil-icon" alt=""></a></li>
                            <li><a href="https://www.instagram.com/shaadibaraatiofficial/" target="_blank"><img
                                        src="<?php echo base_url() ?>assets/img/svg/instagram-brands.svg"
                                        class="img-responisve socil-icon" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="row m0">
                        <div class="start-row">
                            <div class="col s6 m6 l6 p0">
                                <div class="startup-img imstrt1">
                                    <center>
                                        <img src="<?php echo base_url('assets/img/startup.jpg') ?>"  alt="">
                                    </center>
                                </div>
                            </div>
                            <div class="col s6 m6 l6 p0">
                                <div class="startup-img imstrt2">
                                    <center>
                                        <img src="<?php echo base_url('assets/img/msme.png') ?>"  alt="">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    
               </div>
               <div class="col s12 m12 l6">
                    <div class="touch-email">
                     <div class="row">
                        <div class="col l12">
                            <div class="center-align">
                                <h4>Get In Touch</h4>
                                <p>Subscribe to Shaadi Baraati and Get access to our latest Blogs, Wedding Ideas and get the best quotes from trusted Wedding Vendors. </p>
                            </div>
                        </div>
                            <div class="col  s12">
                                <div class="row m0">
                                    <form ref="form"  @submit.prevent="checkForm" action="<?php echo base_url('subscribe') ?>" method="post" id="demo">
                                        <div class="col l8 m8 s8">
                                            <div class="input-field if-mail">
                                                <input id="email" type="email" name="email" class="validate email-si"
                                                    placeholder="Email" required="" @change="emailCheck" v-model="email">
                                                <span v-if="emailError != null" class="helper-text red-text">{{ emailError }}</span>
                                            </div>
                                        </div>
                                        <div class="col l4 m4 s4">
                                            <button type="submit" class="btn-find-get">Get Start</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="row contatct-item">
                                    <div class="col s6 m4">
                                        <p> <i class="material-icons">mail</i> </p>
                                        <p>Mail</p>
                                        <p><a href="mailto:support@shaadibaraati.com">support@shaadibaraati.com</a></p>
                                    </div>
                                    <div class="col s6 m4">
                                        <p> <i class="material-icons">call</i> </p>
                                        <p>Toll Free</p>
                                        <p><a href="tel:18004199456">1800 4199 456</a></p>
                                    </div>
                                    <div class="col s12 m4 smslayout">
                                        <p> <i class="material-icons">sms</i> </p>
                                        <p>For Details TYPE <b>"BARAATI"</b> space your name and send it to 567678080</p>
                                    </div>
                                </div>

                                
                                <div class="row m0 footerbutton">
                                    <div class="col s4">
                                        <a href="<?php echo base_url('free-quote') ?>" class="b1 modal-trigger">Get Free Quote</a>
                                    </div>
                                    <div class="col s4">
                                        <a href="<?php echo base_url('vendor') ?>" class="b2">Register as Vendor</a>
                                    </div>
                                    <div class="col s4">
                                        <a href="https://pages.razorpay.com/pl_Ckj0SFClrYvOzF/view" class="b3">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                           

                        </div>
                    </div>
               </div>
               <div class="clearfix"></div>
               
           </div>
            
        </div>
    </section>
 
    <section class="sec-footer">
        <div class="container-fluide">
            <div class="row">
                
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Bangalore</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/bangalore/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Bangalore' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Delhi</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/delhi-ncr/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Delhi' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Indore</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/indore/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Indore' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                 <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Kolkata</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/kolkata/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Kolkata' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div> 
                <div class="col l3">
                    <div class="list-foot vl">
                        <h6>Hyderabad</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/hyderabad/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category.' in Hyderabad' ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot">
                        <h6>Vendor Categories</h6>
                        <div class="line"></div>
                        <ul>
                            <?php $this->load->model('m_home');
                           $category = $this->m_home->getCategory();

                           if (!empty($category)) {
                            foreach ($category as $key => $value) { ?>
                            <li><a class="hov-a" href="<?php echo base_url('vendors/all/').str_replace(" ","-",strtolower($value->category) ) ?>"><?php echo $value->category ?></a></li>
                           <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col l3">
                    <div class="list-foot">
                        <h6>Vendor Cities</h6>
                        <div class="line"></div>
                        <ul style="column-count:2">
                        <?php $this->load->model('m_home');
                           $city = $this->m_home->getCity();
                            if (!empty($city)) {
                                foreach ($city as $key1 => $value1) { ?>
                                <li><a class="hov-a" href="<?php echo base_url('vendors/').str_replace(" ","-",strtolower($value1->city)) ?>"><?php echo $value1->city ?></a></li>
                               <?php } } ?>
                        </ul>
                    </div>
                </div>

                
                <div class="col l3">
                    <div class="list-foot">
                        <h6>Quick Links</h6>
                        <div class="line"></div>
                        <ul>
                            <a href="<?php echo base_url('about-us') ?>" ><li class="hov">About Us</li></a>
                            <a href="<?php echo base_url('contact-us') ?>" ><li class="hov">Contact Us</li></a>
                            <a href="<?php echo base_url('privacy-policy') ?>" ><li class="hov">Privacy Policy</li></a>
                            <a href="<?php echo base_url('terms-conditions') ?>" ><li class="hov">Terms & Conditions</li></a>
                            <a href="<?php echo base_url() ?>testimonial" ><li class="hov">Testimonial</li></a>
                            <!-- <a href="#" ><li class="hov">wedding Destination</li></a> -->
                            <a href="<?php echo base_url() ?>einvite" ><li class="hov">E-Invite</li></a>
                            <a href="<?php echo base_url() ?>real-wedding" ><li class="hov">Real Wedding</li></a>
                            <!-- <a href="<?php echo base_url() ?>feedback" ><li class="hov">Feedback / Complaints</li></a> -->
                            <a href="<?php echo base_url() ?>wedzmagazine" ><li class="hov">Shaadi Baraati Magazine</li></a>
                            <a href="<?php echo base_url() ?>site-map" ><li class="hov">Sitemap</li></a>
                            <a href="<?php echo base_url() ?>career" ><li class="hov">Career</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
        
        <div class="coptext">
            <div class="logo-imges">
            <div class="container">
            <div class="row m0">
                <div class="col l3 m3 s6 p0">
                        <div class="iconbox style1 v1">
                            <div class="box-header im1">
                                <center>
                                <img src="<?php echo base_url('assets/img/magazine.png') ?>"  alt="">
                            </center>
                            </div>
                        </div>
                </div>
                <div class="col l3 m3 s6 p0">
                    <div class="iconbox style1 v1">
                        <div class="box-header im2">
                            <center>
                            <img src="<?php echo base_url('assets/img/invitation.png') ?>"  alt="">
                        </center>
                        </div>
                    </div>
                </div>
                <div class="col l3 m3 s6 p0">
                    <div class="iconbox style1 v1">
                        <div class="box-header im3">
                            <center>
                            <img src="<?php echo base_url('assets/img/assistance.png') ?>"  alt="">
                        </center>
                        </div>
                    </div>
                </div>
                <div class="col l3 m3 s6 p0">
                    <div class="iconbox style1 v1">
                        <div class="box-header im4">
                            <center>
                            <img src="<?php echo base_url('assets/img/bazar.png') ?>"  alt="">
                        </center>
                        </div>
                    </div>
                </div>
               <!--  <div class="col l2 m3 s6">
                    <div class="iconbox style1 v1">
                        <div class="box-header im5">
                            <center>
                            <img src="<?php echo base_url('assets/img/startup.jpeg') ?>"  alt="">
                        </center>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        </div>

        <p>© Shaadibaraati.com <?php echo date('Y'); ?>. All right reserved by Baraati Media & Entertainment Pvt Ltd   <a href="<?php echo base_url('terms-conditions') ?>">Terms & Conditions</a>  <a href="<?php echo base_url('privacy-policy') ?>" >Privacy Policy</a>
            </p>

        </div>
    </section>

    <div id="modalf" class="modal">
    <div class="modal-content">
      <h6>Get a Quote - 40% Discount on Wedding Vendors
Please Fill The Correct Detail For Quotation !</h6>
      <div class="row">
    <form class="col s12" action="<?php echo base_url('home/getquote') ?>" method="post">
      <div class="row m0">
        <div class="input-field col s6">
          <input id="qfname" type="text" name="qfname" class="validate" required>
          <label for="qfname">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="qlname" type="text" name="qlname" class="validate">
          <label for="qlname">Last Name</label>
        </div>
      </div>
      <div class="row m0">
        <div class="input-field col s6">
          <input id="qemail" type="text" name="qemail" class="validate" required>
          <label for="qemail">Email</label>
        </div>
        <div class="input-field col s6">
          <input id="qphone" type="text"  name="qphone" class="validate" required>
          <label for="qphone">Phone</label>
        </div>
      </div>
      <div class="row m0">
      <div class="input-field col s6">
            <select required name="qservice">
                <option value="" selected>Select Services</option>
                <?php foreach (vendor_category() as $key => $cts) { ?>
                    <option value="<?php echo $cts->category ?>"><?php echo $cts->category ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-field col s6">
          <input id="qdate" type="text" name="qdate" class="validate datepicker" required>
          <label for="qdate">Event Date</label>
        </div>
      </div>
      <div class="row m0">
      <div class="input-field col s6">
      <select required name="qcity">
                <option value="" selected>Select City</option>
                <?php foreach (cities() as $key => $city) { ?>
                    <option value="<?php echo $city->city ?>"><?php echo $city->city ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-field col s6">
            <select required name="qbudget">
                <option value="" selected>Budget</option>
                <option value="Below 50k">Below 50k</option>
                <option value="Upto 1 Lakh">Upto 1 Lakh</option>
                <option value="1lakh - 5lakh">1 Lakh - 5 Lakh</option>
                <option value="5lakh - 10lakh">5 Lakh - 10 Lakh</option>
                <option value="10lakh - 20lakh">10 Lakh - 20 Lakh</option>
                <option value="25lakh - 50lakh">25 Lakh - 50 Lakh</option>
                <option value="Above 50 lakh">Above 50 Lakh</option> 
            </select>
      <input type="hidden" name="quiniq" value="<?php echo random_string('alnum',10) ?>">

        </div>
      </div>
      <div class="col l12 s12"> 
          <div class="d-input"> 
          <div class="input-field"> 
              <textarea id="textarea1" class="materialize-textarea " placeholder="How can we help you today?" name="qmessage" ></textarea> 
            </div> </div> </div>
      <div class="col l4 m4 s4">
        <button type="submit" class="btn-find-get">Get Start</button>
    </div>

      
      
    </form>
  </div>
    </div>
  </div>