<div class="col l3 m12 s12">
  <div class="side-bar white z-depth-1">
    <?php $this->ci =& get_instance();
    $accs = $this->ci->preload->access();
    $accsmenu = explode (",", $accs->menu);
    $access ='';
    $type = $this->session->userdata('sha_type');
    foreach ($accsmenu as $key => $value) {
    ?>
    <ul class="li-list ">
      <?php if ($value == '1' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'dashboard'?'active':''?>"> <a href="<?php echo base_url('dashboard') ?>"><i class="fab fa-delicious li-icon"></i>Dashboard</a></li>
      <?php } if ($value == '2' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'home-banner'?'active':'' ?>"><a href="<?php echo base_url('home-banner/add') ?>"> <i class="far fa-image li-icon"></i>Home Banner</a></li>
      <?php } if ($value == '3' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'cities'?'active':'' ?>"><a href="<?php echo base_url('cities/manage') ?>"><i class="fas fa-city li-icon"></i>Cities</a></li>
      <?php } if ($value == '4' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'category'?'active':'' ?>"><a href="<?php echo base_url('category/manage') ?>"><i class="fas fa-th-list li-icon"></i>Category</a></li>
      <?php } if ($value == '5' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'category-banner'?'active':'' ?>"><a href="<?php echo base_url('category-banner/manage') ?>"><i class="fas fa-th-list li-icon"></i>Category Banner</a></li>
      <?php } if ($value == '6' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'content'?'active':'' ?>"><a href="<?php echo base_url('content/manage') ?>"><i class="fas fa-th-list li-icon"></i>Category Content</a></li>
      <?php }  if ($value == '7' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'footer-category'?'active':'' ?>"><a href="<?php echo base_url('footer-category/manage') ?>"><i class="fas fa-th-list li-icon"></i>Footer Category</a></li>
      <?php }  if ($value == '8' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'real-wedding'?'active':'' ?>"><a href="<?php echo base_url('real-wedding') ?>"><i class="fas fa-image li-icon"></i>Real Wedding</a></li>
      <div class="divider"></div>
      <?php } ?>


      <?php  if ($value == '9' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'users'?'active':'' ?>"><a href="<?php echo base_url('users/manage') ?>"><i class="fas fa-users li-icon"></i>Manage Users</a></li>
      <?php } if ($value == '10' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'employees'?'active':'' ?>"><a href="<?php echo base_url('employees') ?>"><i class="fas fa-users-cog li-icon"></i>Employees</a></li>
      <?php } if ($value == '11' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'vendors'?'active':'' ?>"><a href="<?php echo base_url('vendors/manage') ?>"><i class="fas fa-handshake li-icon"></i>Vendors</a></li>
      <?php } if ($value == '12' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'vendor'?'active':'' && $this->uri->segment(2) == 'approval'?'active':'' ?>"><a href="<?php echo base_url('vendor/approval') ?>"><i class="far fa-check-circle li-icon"></i>
        <?php if($this->ci->preload->vendorApproval() > 0){
        echo '<span class="new badge">'. $this->ci->preload->vendorApproval() .'</span> ';
      } ?>Vendors Approval</a></li>
      <?php } if ($value == '13' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'vendors-discount'?'active':'' ?>"><a href="<?php echo base_url('vendors-discount') ?>"><i class="fas fa-tags li-icon"></i>Vendor Renewal
        <?php if($this->ci->preload->disccount() > 0){
        echo '<span class="new badge">'. $this->ci->preload->disccount() .'</span> ';
      } ?></a></li>
      <?php } if ($type == '1'  || ($type != '7' && $value == '14')) { ?>
      <li class="<?php if($this->uri->segment(1) == 'new-proposal'){ echo 'active'; } ?>"><a href="<?php echo base_url('vendors/new-proposal') ?>"><i class="fas fa-comments li-icon"></i>Sales</a></li>
      <?php }  if($value == '14' && ($type == '7' && $type != '1')){ ?>
      <li class="<?php echo $this->uri->segment(1) == 'finance'?'active':'' ?>"><a href="<?php echo base_url('finance/new-proposal') ?>"><i class="fas fa-comments li-icon"></i>Sales</a></li>
      
      <?php } ?>

      <?php if ($value == '24' || $type == '1') { ?>
      <li class="droup-link <?php  if($this->uri->segment(1) == 'invoice-data' || $this->uri->segment(1) == 'invoice-generate'){ echo 'active'; }  ?>"><a class="droup-link-item"><i class="fas fa-tags li-icon"></i>Invoice</a>
      <ul class="droupmenu">
        <li><a href="<?php echo base_url('invoice-data') ?>">Billed Invoice</a></li>
        <li><a href="<?php echo base_url('invoice-generate') ?>">NON Billed Invoice</a></li>
      </ul>
    </li>
    <div class="divider"></div>
    <?php } ?>


   


      <?php if ($value == '28' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'e-invite'?'active':'' ?>"><a href="<?php echo base_url('e-invite') ?>"><i class="fas fa-ribbon li-icon"></i>E-invite Data</a></li>
      <?php }  ?>


      <?php if ($value == '15' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'package'?'active':'' ?>"><a href="<?php echo base_url('package') ?>"><i class="fas fa-ribbon li-icon"></i>Package</a></li>
      <?php } if ($value == '16' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'banner-package'?'active':'' ?>"><a href="<?php echo base_url('banner-package') ?>"><i class="fas fa-ribbon li-icon"></i>Banner Package</a></li>
      <?php }  if ($value == '17' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'vendor-package'?'active':'' ?>"><a href="<?php echo base_url('vendor-package') ?>"><i class="fas fa-comments-dollar li-icon"></i>Package Request
        <?php if($this->ci->preload->bypackage() > 0){
        echo '<span class="new badge">'. $this->ci->preload->bypackage() .'</span> ';
      } ?></a></li>
      <div class="divider"></div>
      <?php } ?>


      <?php if ($value == '18' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'leads'?'active':'' ?>"><a href="<?php echo base_url('leads') ?>"><i class="fas fa-comments li-icon"></i>Lead Management</a></li>
      <?php } if ($value == '19' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'enquiries'?'active':'' ?>"><a href="<?php echo base_url('enquiries') ?>"><i class="fas fa-comments li-icon"></i>Enquiries</a></li>
      <?php } if ($value == '20' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'free-quote'?'active':'' ?>"><a href="<?php echo base_url('free-quote') ?>"><i class="fas fa-file-alt li-icon"></i>Free Quote Request</a></li>
      <?php } if ($value == '21' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'newsletter-subcribers'?'active':'' ?>"><a href="<?php echo base_url('newsletter-subcribers') ?>"><i class="fas fa-user-plus li-icon"></i>Newsletter Subscribers</a></li>
      <?php } if ($value == '22' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'testimonial'?'active':'' ?>">
        <a href="<?php echo base_url('testimonial') ?>"><i class="far fa-comment-dots li-icon"></i>Testimonial
          <?php if($this->ci->preload->testimonial() > 0){
          echo '<span class="new badge">'. $this->ci->preload->testimonial() .'</span> ';
          } ?>
        </a>
      </li>
      <?php } if ($value == '23' || $type == '1') { ?>
      <li class="<?php echo $this->uri->segment(1) == 'feedback'?'active':'' ?>">
        <a href="<?php echo base_url('feedback') ?>"><i class="fas fa-comment-slash li-icon"></i>Feedback
          <?php if($this->ci->preload->feedback() > 0){
          echo '<span class="new badge">'. $this->ci->preload->feedback() .'</span> ';
          } ?>
        </a>
      </li>
      <?php } if ($value == '24' || $type == '1') { ?>
      <li class="droup-link <?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a class="droup-link-item"><i class="fas fa-user-tie li-icon"></i>Career</a>
      <ul class="droupmenu">
        <li class="<?php echo $this->uri->segment(1) == 'career'?'active':'' ?>"><a href="<?php echo base_url('career') ?>">Jobs</a></li>
        <li class="<?php echo $this->uri->segment(2) == 'applications'?'active':'' ?>"><a href="<?php echo base_url('career/applications') ?>">Applications</a></li>
      </ul>
    </li>
    <div class="divider"></div>
    <?php } ?>


    <?php if ($value == '25' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'sales-report'?'active':'' ?>"><a href="<?php echo base_url('sales-report') ?>"><i class="fas fa-chart-line li-icon"></i>Sales Report</a></li>
    <?php } if ($value == '25' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'leads-report'?'active':'' ?>"><a href="<?php echo base_url('leads-report') ?>"><i class="fas fa-chart-line li-icon"></i>Leads Report</a></li>
    <?php } if ($value == '25' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'visitors-report'?'active':'' ?>"><a href="<?php echo base_url('visitors-report') ?>"><i class="fas fa-chart-line li-icon"></i>Visitors Report</a></li>
    <?php } if ($value == '25' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'employee-report'?'active':'' ?>"><a href="<?php echo base_url('employee-report') ?>"><i class="fas fa-chart-line li-icon"></i>Employee Report</a></li>
    <?php } if ($value == '25' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'team-report'?'active':'' ?>"><a href="<?php echo base_url('team-report') ?>"><i class="fas fa-chart-line li-icon"></i>Team Report</a></li>
    <?php } if ($value == '25' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'live-report'?'active':'' ?>"><a href="<?php echo base_url('live-report') ?>"><i class="fas fa-chart-line li-icon"></i>Live Report</a></li>
    <div class="divider"></div>
    <?php }?>


    <?php if ($value == '26' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'seo'?'active':'' ?>"><a href="<?php echo base_url('seo/manage') ?>"><i class="fas fa-poll-h li-icon"></i>Seo Data</a></li>
    <?php } if ($value == '27' || $type == '1') { ?>
    <li class="<?php echo $this->uri->segment(1) == 'seo-enquiry'?'active':'' ?>"><a href="<?php echo base_url('seo-enquiry') ?>"><i class="fas fa-poll-h li-icon"></i>Seo Enquiry</a></li>
    <?php } } ?>
    <!-- <li class="<?php echo $this->uri->segment(1) == 'cache'?'active':'' ?>"><a href="<?php echo base_url('cache') ?>"><i class="far fa-check-circle li-icon"></i>Cache</a></li> -->
  </ul>
</div>
</div>