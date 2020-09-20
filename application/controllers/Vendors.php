<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        //Do your magic here
		$this->load->model('m_vendors');
		$this->load->model('m_home');
		$this->load->library('form_validation');
    }


    /**
     * vendors-> load view page
     * url : vendors
    **/
    public function detail($category="",$city="",$name="",$uniqid="")
    {
        if($this->session->userdata('shurls') != ''){ 
          $this->session->unset_userdata('shurls');
        }
        $output = $this->m_vendors->getVendors($uniqid);
        if (!empty($output )) {
          foreach ($output as $key => $value) {
             $value->service     = $this->m_vendors->getService($value->id);
             $value->video       = $this->m_vendors->getVideo($value->id);
             $value->review      = $this->m_vendors->getReview($value->id);
             $value->userReview  = $this->m_vendors->getuserReview($value->id);
             $value->fav         = $this->m_vendors->getFavourite($value->id);
             $value->faq         = $this->m_vendors->faq($value->catId);
             $value->offer       = $this->m_vendors->offer($value->id);
             $value->similar     = $this->m_vendors->similarVendors($value->cityId,$value->catId,$value->id);
          }
        }
        $data['seo'] = $this->m_vendors->getvendSeo($value->id);
        $data['vendor'] = $output;
        $data['title']  = $value->name.'- ShaadiBaraati';
        $this->load->view('vendors/detail', $data, FALSE);
    }

    public function phone_check($value='')
    {
      $phone = $this->input->post('phone');
      $otp = random_string('numeric',6);
            $curl = curl_init();
            $post_fields = array();
            $post_fields["method"] = "sendMessage";
            $post_fields["send_to"] = '91'.$phone.'';
            $post_fields["msg"]  = 'Dear Customer

Your OTP is '.$otp.' . Use this OTP to get vendor details.

With Love
Shaadibaraati.com
1800 4199 456';

                
            $post_fields["msg_type"] = "TEXT";
            $post_fields["userid"] = "2000187670";
            $post_fields["password"] = "Sidhu@9787";
            $post_fields["auth_scheme"] = "PLAIN";
            $post_fields["format"] = "JSON";

            curl_setopt_array($curl, array(CURLOPT_URL => "http://enterprise.smsgupshup.com/GatewayAPI/rest",CURLOPT_RETURNTRANSFER => true,CURLOPT_ENCODING => "",CURLOPT_MAXREDIRS => 10,CURLOPT_TIMEOUT => 30,CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,CURLOPT_CUSTOMREQUEST => "POST",CURLOPT_POSTFIELDS => $post_fields));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
               $output = '';
            } 
            else 
            {
              $output = $otp;
            }
        echo $output;
    }


    public function gallery($value='')
    {
        // $data ='';
       $vndr_id =  $this->input->post('vndr_id');
      $output = $this->m_vendors->getGallery($vndr_id);
      if(!empty($output)){
          foreach ($output as $key => $value) {
            $data[] =  base_url().'vendor-portfolio/'.$value->thumb_image;
        }
      }else{
        $data = '';
      }
      
      

       echo json_encode($data);
    }


    public function galleryCount($id = null)
    {
      $output = '';
      $vndr_id =  $this->input->post('vndr_id');
      $output = $this->m_vendors->galleryCount($vndr_id);

      switch ($output) {
        case $output <= 20:
        echo $output = 12;
        break;
        case $output <= 40:
        echo $output = 30;
        break;
        case $output <= 75:
        echo $output = 50;
        break;
        case $output <= 100:
        echo $output = 75;
        break;
        case $output > 100:
        echo $output = 100;
        break;
        
        default:
          echo $output = 100;
          break;
      }



    }


    public function full_gallery($value='')
    {
        $data = array();
        $vndr_id =  $this->input->post('vndr_id');
        $output = $this->m_vendors->full_gallery($vndr_id);
        if(!empty($output)){
          foreach ($output as $key => $value) {
            $data[] =  base_url().'vendor-portfolio/'.$value->thumb_image;
          }
        }
        
       echo json_encode($data);
    }


    //check if the user logged in or not
    public function reviewSession($value='')
    {

      $url = $this->input->post('url');
      $urls = array(
          'shurls' => $url,
        );
      $this->session->set_userdata($urls);
      $user =  $this->session->userdata('shdid');
      if (!empty($user)) {
        echo "1";
      }else{
        echo "0";
      }
    }

    public function review_submit($value='')
    {

      $proffesional   = $this->input->post('rev_proffesional');
        $quality      = $this->input->post('rev_quality');
        $service      = $this->input->post('rev_service');
        $money        = $this->input->post('rev_money');
        $experience   = $this->input->post('rev_experience');
        $description  = $this->input->post('rev_description');
        $rating       = $this->input->post('rev_rating');
        $vendorid     = $this->input->post('rev_vendor');
        $vendoruniq   = $this->input->post('vendoruniq');

        $user   = $this->m_vendors->getUser($this->session->userdata('shdid'));
        $vendor = $this->m_vendors->getVendors($vendoruniq);

        foreach ($vendor as $key => $value) {}

      $this->form_validation->set_rules('rev_rating', 'Rating', 'required|alpha_numeric_spaces');
      $this->form_validation->set_rules('rev_description', 'Review', 'trim|required|alpha_numeric_spaces');
      if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('error', $error);
            redirect(base_url().str_replace(" ","-",strtolower($value->city)).'/'.str_replace(" ","-",strtolower($value->category)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq,'refresh');
      }else{
        
        $insert = array(
          'proffesional' => $proffesional, 
          'quality'      => $quality, 
          'service'      => $service, 
          'money'        => $money, 
          'experience'   => $experience, 
          'review'       => $description, 
          'vendor_id'    => $vendorid,
          'user_id'      => $user->su_id,
          'user_name'    => $user->su_name,
          'user_email'   => $user->su_email,
          'rating'       => $rating,
          'status'       =>  '1'
        );

          if($this->m_vendors->addReview($insert)){
               $this->session->set_flashdata('success', 'Review added Successfully');
          }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again later!');
          }
          redirect(base_url().str_replace(" ","-",strtolower($value->city)).'/'.str_replace(" ","-",strtolower($value->category)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq,'refresh');
    }

  }


  public function makeFavourite($id='')
  {
      $user =  $this->session->userdata('shdid');
      if (!empty($user)) {

        $vndr_id = $this->input->post('vndr_id');
        $output = $this->m_vendors->makeFavourite($user,$vndr_id);
        echo $output; //1 if favourited , 3 if not performed anything, 0 not favourited
        
      }else{
        echo "5"; //not logged in
      }
  }


  public function getFavourite($value='')
  {
    $vndr_id = $this->input->post('vndr_id');
    $output  = $this->m_vendors->getFavourite($vndr_id);
    echo  $output;
  }


  public function enquireVendor($id='')
  {

        $name       =   $this->input->post('e_name');
        $email      =   $this->input->post('e_email');
        $mobile     =   $this->input->post('e_mobile');
        $fnDate     =   $this->input->post('fn_date');
        $guestNo    =   $this->input->post('guest_no');
        $rooms      =   $this->input->post('rooms');
        $fnType     =   $this->input->post('fn_type');
        $fnTime     =   $this->input->post('fn_time');
        $WedDetail  =   $this->input->post('wed_detail');
        $vendor_id  =   $this->input->post('vendor_id');
        $uniq       =   $this->input->post('uniq');
        $location   =   $this->input->post('location');
        $budget     =   $this->input->post('budget');

        $vendors = $this->m_vendors->getVendors($vendor_id);

        foreach ($vendors as $key => $value) { }

          $url = str_replace('', '-', strtolower($value->city)).'/'.str_replace('', '-', strtolower($value->category)).'/'.str_replace('', '-', strtolower($value->name)).'/'.$vendor_id;


        $this->form_validation->set_rules('e_name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('e_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('e_mobile', 'Phone Number', 'required|numeric');
        $this->form_validation->set_rules('fn_date', 'Event Date', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('budget', 'Budget', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('wed_detail', 'Wedding Detail', 'alpha_numeric_spaces');
        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect($url,'refresh');
        }else{
        $insert = array('user_name'  =>  $name , 'user_email' =>  $email , 'user_phone' =>  $mobile , 'vendor_id'  =>  $value->id, 'fn_date'    =>  $fnDate , 'fn_type'    =>  $fnType , 'fn_time'    =>  $fnTime , 'guest_no'   =>  $guestNo , 'wed_detail' =>  $WedDetail , 'category'   =>  $value->category , 'uniq'       =>  $uniq, 'location'   =>  $location, 'budget'      =>  $budget );
        
        $data['output']  =  $this->m_vendors->addenquiry($insert);
        $data['result']  =  $insert;
        $data['value']    =   $value;
          if (!empty($data['output'])  && !empty($vendors)) {

            $output1 = $this->send_user($data);
            $output2 = $this->send_admin($data);
            $output3 = $this->sms_vendor($data);
            $output4 = $this->sms_user($data);
              if (!empty($output1)  && !empty($output2)) {
                  $this->session->set_flashdata('success', 'Your request has been submitted successfully, Our team will contact you soon.');
                  redirect($url,'refresh');
              } else {
                  $this->session->set_flashdata('error', 'Unable to submit your request, Please try again later!');
                  redirect($url,'refresh');
              }
          }else{
                $this->session->set_flashdata('error', 'Unable to submit your request, Please try again later!');
                redirect($url,'refresh');
          }
        }
  }

  public function sms_vendor($data = '')
  {
 
    $Name     = $data['result']['user_name'];
    $category = $data['value']->category;
    $phone    = $data['result']['user_phone'];
    $fn_date  = $data['result']['fn_date'];
    $budget   = $data['result']['budget'];
    $location = $data['result']['location'];
    $remarks = $data['result']['wed_detail'];
    $number   = $data['value']->phone;
 
    $curl = curl_init();
    $post_fields = array();
    $post_fields["method"] = "sendMessage";
    $post_fields["send_to"] = '91'.$number.'';
    $post_fields["msg"]  = 'Dear Vendor,

    Hurry!!!!!
    '.$Name.'is looking for  '.$category.' services.
    Mob:  '.$phone.'
    Event Date:  '.$fn_date.'
    Budget :  '.$budget.'
    Location :  '.$location.'
    
    With Love
    Shaadibaraati.com
    18004199456';

        
    $post_fields["msg_type"] = "TEXT";
    $post_fields["userid"] = "2000187670";
    $post_fields["password"] = "Sidhu@9787";
    $post_fields["auth_scheme"] = "PLAIN";
    $post_fields["format"] = "JSON";

    curl_setopt_array($curl, array(CURLOPT_URL => "http://enterprise.smsgupshup.com/GatewayAPI/rest",CURLOPT_RETURNTRANSFER => true,CURLOPT_ENCODING => "",CURLOPT_MAXREDIRS => 10,CURLOPT_TIMEOUT => 30,CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,CURLOPT_CUSTOMREQUEST => "POST",CURLOPT_POSTFIELDS => $post_fields));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
       "cURL Error #:" . $err;
    } 
    else 
    {
      $response;
    }
 
  }

  public function sms_user($data = '')
  { 

    $Name = $data['value']->name;
    $phone    = $data['value']->phone; 
    $email = $data['value']->email;
    $number   = $data['result']['user_phone'];
 
    $curl = curl_init();
    $post_fields = array();
    $post_fields["method"] = "sendMessage";
    $post_fields["send_to"] = '91'.$number.'';
     $post_fields["msg"]  ='Vendor Details:
Company Name: '.$Name.'
Mob: '.$phone.'
Email: '.$email.'

With Love
Shaadi Baraati
18004199456';
    $post_fields["msg_type"] = "TEXT";
    $post_fields["userid"] = "2000187670";
    $post_fields["password"] = "Sidhu@9787";
    $post_fields["auth_scheme"] = "PLAIN";
    $post_fields["format"] = "JSON";
   
    curl_setopt_array($curl, array(CURLOPT_URL => "http://enterprise.smsgupshup.com/GatewayAPI/rest",CURLOPT_RETURNTRANSFER => true,CURLOPT_ENCODING => "",CURLOPT_MAXREDIRS => 10,CURLOPT_TIMEOUT => 30,CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,CURLOPT_CUSTOMREQUEST => "POST",CURLOPT_POSTFIELDS => $post_fields));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
       "cURL Error #:" . $err;
    } 
    else 
    {
       $response;
    }
 
  }




    public function send_user($data='')
    {

      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $msg = $this->load->view('email/vendorEnquiry-user', $data, true);
      $this->email->set_newline("\r\n");
      $this->email->from($from, 'ShaadiBaraati');
      $this->email->to($data['result']['user_email']);
      $this->email->subject('Vendor enquiry request-'.$data['value']->name);
      $this->email->message($msg);
      if ($this->email->send()) {
          return true;
      }else{
          return false;
      }
    }

    public function send_admin($data='')
    {

      $this->load->config('email');
      $this->load->library('email');

      $to = $this->config->item('vr_to');
      $cc = $this->config->item('vr_cc');

      $from = $this->config->item('smtp_user');
      $msg = $this->load->view('email/vendor-enquiry', $data, true);
      $this->email->set_newline("\r\n");
      $this->email->from($from, 'ShaadiBaraati');
      $this->email->to($to);
      $this->email->cc($cc);
      // $this->email->to($data['result']['user_email']);
      $this->email->subject('Vendor enquiry request-'.$data['value']->name);
      $this->email->message($msg);
      if ($this->email->send()) {
          return true;
      }else{
          return false;
      }
    }


  public function allCategory($id='')
  {
    $data['category']   = $this->m_vendors->getCategory();
    $this->load->view('vendors/all-category.php',$data);
  }






        






    
}