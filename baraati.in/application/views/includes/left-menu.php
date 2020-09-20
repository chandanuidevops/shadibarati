 <div class="col s12 m4 l3">
                        <div class="sidemenu">
                            <div class="card-panel   profile-box">
                                <a href="<?php echo base_url('profile')?>" class=" pb-edit btn-floating btn-flat waves-effect waves-light"><i
                                        class="material-icons">edit</i></a>
                                <div class="pb-pic">
                                    <?php $this->load->model('m_account');
                                    $profile = $this->m_account->profile_pic($this->session->userdata('shdid'));
                                     ?>
                                    <img src="<?php echo (!empty($profile->su_profile_file))?$profile->su_profile_file:'https://anthemunited.com/app/uploads/2016/12/steve-lepan.jpg' ?>" alt="">
                                </div>
                                <div class="pb-content center-align">
                                    <h6 class="white-text "><?php echo (!empty($profile->su_name))?ucfirst($profile->su_name):'' ?></h6>
                                </div>
                            </div>
                            <div class="">
                                <ul class="sidemenu-list-container z-depth-1">
                                    <li>
                                        <a href="<?php echo base_url('profile') ?>" class="<?php if( ($this->uri->segment(1)=="profile") && ($this->uri->segment(2) == '') ){echo "active";}?>"> <i class=" material-icons ">person</i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('profile/shortlisted-vendor') ?>" class="<?php if(($this->uri->segment(1)=="profile") && ($this->uri->segment(2) == 'shortlisted-vendor')){echo "active";}?>"><i class=" material-icons ">favorite</i> Shortlisted Vendor's</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url('profile/enquired-vendors') ?>" class="<?php if(($this->uri->segment(1)=="profile") && ($this->uri->segment(2) == 'enquired-vendors')){echo "active";}?>"><i class=" material-icons ">comment</i> Enquired Vendor's</a>
                                    </li>

                                   <!--  <li>
                                        <a href=""><i class=" material-icons ">settings</i> Account Settings</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>