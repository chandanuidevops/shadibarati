<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        //Do your magic here
		$this->load->model('m_home');
		$this->load->library('form_validation');
	}


	/**
     * home-> load view page
     * url : base_url
    **/
	public function index()
	{
        $data['title']      = 'ShaadiBaraati';
        $data['city']       = $this->m_home->getCity();
        $data['category']   = $this->m_home->getCategory();
        $data['real']       = $this->m_home->realWed();
        $data['ban']       = $this->m_home->hom_banget();
        $this->session->unset_userdata('pophone');
        $this->session->unset_userdata('poemail');
        $this->session->unset_userdata('poname');
        $this->m_home->insertVisitor($this->input->ip_address());
		$this->load->view('site/index', $data, FALSE);
    }


    /**
     * newsletter subscription-> email check exist
     * url : emailcheck
    **/
	public function emailcheck($value='')
	{
		$email = $this->input->post('email');
        $output = $this->m_home->email_check($email);
		echo  $output;
    }
    

    /**
     * newsletter subscription-> add detail
     * url : subscribe
    **/
    public function subscribe($id = null)
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[newsletter.email]',
                array('required'      => 'You have not provided %s.', 'is_unique'     => 'This %s already exists.') );
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('error', $error);
        	redirect(base_url(),'refresh');
        }else{

            $email = $this->input->post('email');
            $output = $this->m_home->subscribe($email);

            if (!empty($output)) {
                $this->session->set_flashdata('success', 'Thank you for subscribing to our website');
                redirect(base_url());
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, Please try again later!');
                redirect(base_url());
            }
        }
        
        
    }


    public function contact($id='')
    {
        $data['title']  = 'contact - ShaadiBaraati';
        $data['user']   = $this->m_home->getuser($this->session->userdata('shdid'));
        $this->load->view('site/contact-us',$data);
    }

    public function insertcontact($value='')
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric');
        $this->form_validation->set_rules('subject', 'Subject', 'alpha_numeric_spaces');
        $this->form_validation->set_rules('message', 'Message', 'alpha_numeric_spaces');
        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect('contact-us','refresh');
        }else{

            $name       =   $this->input->post('name');
            $email      =   $this->input->post('email');
            $phone      =   $this->input->post('phone');
            $subject    =   $this->input->post('subject');
            $message    =   $this->input->post('message');
            $uniq       =   $this->input->post('uniq');

            $insert = array(
              'name'    =>  $name , 
              'email'   =>  $email , 
              'phone'   =>  $phone , 
              'subject' =>  $subject , 
              'message' =>  $message ,
              'uniq'    =>  $uniq
            );

            $data['result'] = $insert;
            $data['output']  =  $this->m_home->addenquiry($insert);
            if (!empty($data['output'])) {
                $this->load->config('email');
                $this->load->library('email');
                
                $to = $this->config->item('vr_to');
                $cc = $this->config->item('vr_cc');

                $from = $this->config->item('smtp_user');
                $msg = $this->load->view('email/enquiry', $data, true);
                $this->email->set_newline("\r\n");
                $this->email->from($from, 'ShaadiBaraati');
                $this->email->to($to);
                $this->email->cc($cc);
                $this->email->subject('Enquiry Form');
                $this->email->message($msg);
                if ($this->email->send()) {
                    $this->session->set_flashdata('success', 'Your request has been submitted successfully, <br />Our team will contact you soon.');
                    redirect('contact-us','refresh');
                } else {
                    $this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
                    redirect('contact-us','refresh');
                }
            }else{
                  $this->session->set_flashdata('error', 'Unable to submit your request, <br />Please try again later!');
                  redirect('contact-us','refresh');
            }
        }
    }

    public function privacy_policy()
    {
        $data['title']  = 'privacy-policy - ShaadiBaraati';
        $this->load->view('site/privacy-policy',$data);
    }
    

    public function terms_conditions()
    {
        $data['title']  = 'terms-conditions - ShaadiBaraati';
        $this->load->view('site/terms-conditions',$data);
    }

    public function about_us()
    {

        $vend   = $this->db->get('vendor')->num_rows();
        $cust   = $this->db->get('user')->num_rows();
        $wed    = $this->db->get('vendor_enquiry')->num_rows();
        $data['vendor']     = 10000 + $vend; 
        $data['customer']   = 125000  + $cust; 
        $data['wedding']    = 5000 + $wed; 
        $data['title']  = 'about-us - ShaadiBaraati';
        $this->load->view('site/about-us',$data);
    }
    public function site_map()
    {
        $data['title']  = 'site-map - ShaadiBaraati';
        $this->load->view('site/site-map',$data);
    }

    public function wed_assistance()
    {
        $data['title']  = 'ShaadiBaraati | Wed assistance';
        $this->load->view('site/wed-assistance',$data);
    }
    public function feedback()
    {

       $magUse = $this->session->userdata('magUse');
       $magtime = $this->session->userdata('magtime');
       $now = date('Y-m-d H:i:s');

       $hourdiff = round((strtotime($magtime) - strtotime($now))/3600, 1);

       if (!empty($magUse) && $hourdiff >=1  ) {
           $this->session->unset_userdata('magUse');
           $this->session->unset_userdata('magtime');
       }
        $data['title']  = 'ShaadiBaraati | Wedz Magazine';
        $this->load->view('site/feedback',$data);
    }

    public function career($id = null)
    {
        $data['title']  = 'ShaadiBaraati | Career';
        if(!empty($id)){
            $data['jobs'] = $this->m_home->jobs($id);
            $this->load->view('site/career-detail',$data);
        }else{
            $data['jobs'] = $this->m_home->jobs();
            $this->load->view('site/career',$data);
        }

        
    }

    public function career_detail()
    {
        $data['title']  = 'ShaadiBaraati | Career Detail';
        $this->load->view('site/career-detail',$data);
    }
    public function testimonial()
    {
        $data['title']  = 'ShaadiBaraati | Testimonial';
        $data['result'] = $this->m_home->getTestimonial();
        $this->load->view('site/testimonial',$data);
    }

    public function freeQuote($var = null)
    {   
        $this->load->view('site/free-quote');        
    }
    
    public function getquote($id = null)
    {
        $email = $_POST["qemail"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Please enter the valid email address";
          $this->session->set_flashdata('error', $emailErr);
          redirect('free-quote','refresh');
        }

        $this->form_validation->set_rules('qfname', 'First Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('qlname', 'Last Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('qemail', 'Email', 'required');
        $this->form_validation->set_rules('qphone', 'Phone Number', 'required|numeric');
        $this->form_validation->set_rules('qservice', 'Service', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('qdate', 'Event Date', 'required');
        $this->form_validation->set_rules('qcity', 'City', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('qbudget', 'Budget', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('qmessage', 'Message', 'alpha_numeric_spaces');
        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect('free-quote','refresh');
        }else{

            $qfname     =   $this->input->post('qfname');
            $qlname     =   $this->input->post('qlname');
            $qemail     =   $this->input->post('qemail');
            $qphone     =   $this->input->post('qphone');
            $qservice   =   $this->input->post('qservice');
            $qdate      =   $this->input->post('qdate');
            $qcity      =   $this->input->post('qcity');
            $qbudget    =   $this->input->post('qbudget');
            $qmessage   =   $this->input->post('qmessage');
            $quiniq     =   $this->input->post('quiniq');

            $insert = array(
              'firstname'    =>  $qfname , 
              'lastname'   =>  $qlname , 
              'email'   =>  $qemail , 
              'phone'   =>  $qphone , 
              'service' =>  $qservice ,
              'date'    =>  $qdate,
              'city'    =>  $qcity,
              'budget'  =>  $qbudget,
              'message' =>  $qmessage,
              'uniq'    =>  $quiniq,
            );
            $data['result'] = $insert;
            $data['output']  =  $this->m_home->quoterequest($insert);
            if (!empty($data['output'])) {
                $this->load->config('email');
                $this->load->library('email');
                $to = $this->config->item('vr_to');
                $cc = $this->config->item('vr_cc');
                $from = $this->config->item('smtp_user');
                $msg = $this->load->view('email/getquote', $data, true);
                $this->email->set_newline("\r\n");
                $this->email->from($from, 'ShaadiBaraati');
                $this->email->to($to);
                $this->email->cc($cc);
                $this->email->subject('Free Quote request');
                $this->email->message($msg);
                if ($this->email->send()) {
                    $this->session->set_flashdata('success', 'Your request has been submitted successfully, <br /> Our team will reach you soon.');
                    redirect('free-quote','refresh');
                } else {
                    $this->session->set_flashdata('error', 'Unable to submit your request,<br /> Please try again later!');
                    redirect('free-quote','refresh');
                }
            }else{
                  $this->session->set_flashdata('error', 'Unable to submit your request,<br /> Please try again later!');
                  redirect('free-quote','refresh');
            }
        }
    }

    // testimonila post 
    public function testimonial_post($var = null)
    {

        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Please enter the valid email address";
          $this->session->set_flashdata('error', $emailErr);
          redirect('testimonial','refresh');
        }

        $this->form_validation->set_rules('fname', 'First Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric');
        $this->form_validation->set_rules('best', 'Best Service', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('improve', 'Need To Improve', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('service', 'Ratings', 'required');
        $this->form_validation->set_rules('recomend', 'Recomend', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('feedback', 'Feedback', 'alpha_numeric_spaces');
        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect('testimonial','refresh');
        }else{
            $data = array(
                'fname'     => $this->input->post('fname', true), 
                'lname'     => $this->input->post('lname', true), 
                'email'     => $this->input->post('email', true), 
                'phone'     => $this->input->post('phone', true), 
                'best'      => $this->input->post('best', true), 
                'improve'   => $this->input->post('improve', true), 
                'service'   => $this->input->post('service', true), 
                'recomend'  => $this->input->post('recomend', true), 
                'feedback'  => $this->input->post('feedback', true), 
            );
            if($this->m_home->testimonial_post($data)){
                $this->session->set_flashdata('success', 'Your testimonial has been submitted.');
                redirect('testimonial','refresh');
                
            }else{
                $this->session->set_flashdata('error', 'Server Error, please try again later.');
                redirect('testimonial','refresh');
            }
        }
    }
    

    public function feedback_post($var = null)
    {

        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Please enter the valid email address";
          $this->session->set_flashdata('error', $emailErr);
          redirect('wedzmagazine','refresh');
        }

        $this->form_validation->set_rules('fname', 'First Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric');
        // $this->form_validation->set_rules('rate', 'Ratings', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('feedback', 'Message', 'alpha_numeric_spaces');
        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect('wedzmagazine','refresh');
        }else{
            $data = array(
                'fname'     => $this->input->post('fname', true), 
                'lname'     => $this->input->post('lname', true), 
                'email'     => $this->input->post('email', true), 
                'phone'     => $this->input->post('phone', true), 
                // 'rating'    => $this->input->post('rate', true),
                'feedback'  => $this->input->post('feedback', true), 
            );
            if($this->m_home->feedback_post($data)){

                $fuserd = array('magUse' => 'Approved','magtime' => date('Y-m-d H:i:s'));
                $this->session->set_userdata($fuserd);
                $this->session->set_flashdata('success', 'Click the below link  to download your free copy.');
                redirect('wedzmagazine#digital-copy');
            }else{
                $this->session->set_flashdata('error', 'Server Error, please try again later.');
                redirect('wedzmagazine');
            }
        }
    }


    // career
	public function application($id=null)
	{
		
			$config = array(
				'upload_path' => "./resume/",
				'allowed_types' => 'doc|docx|pdf|DOC|DOCX|PDF',
				'overwrite' => TRUE,
				'encrypt_name' => TRUE
				
			);
			$this->load->library('upload', $config);
			if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
			$this->upload->do_upload('file');
			$path 	=  'resume/'.$this->upload->data('file_name');									
			$data = array(
				'name' 	=> $this->input->post('name', true), 
				'email' => $this->input->post('email', true), 
				'position' 	=> $this->input->post('position', true), 
				'phone' 	=> $this->input->post('phone', true), 
				'msg' 	=> $this->input->post('msg', true), 
				'file' 	=> $path, 
			);

			if($this->m_home->application($data)){
				$this->session->set_flashdata('success', 'Job Successfully submited <br> Our Hr Department Contact you soon');
				redirect('career/'.$id);
			}else{
				$this->session->set_flashdata('error', 'Server error occured. Please try agin later');
				redirect('career/'.$id);
			}
		
	}

    
    public function delete_file_cache() 
    { 
        unlink(base_url().'application/cache');
        redirect(base_url().'admin-panel','refresh');
    }

    // e invite static page
    public function e_invite()
    {
        $data['title']  = 'ShaadiBaraati | E-invite';
        $this->load->view('site/e-invite',$data);
    }


    // landing page
    public function landing_page()
    {
        $this->session->unset_userdata('wplan');
        $this->session->unset_userdata('wbud');
        $this->session->unset_userdata('wdate');
        $data['title']  = 'ShaadiBaraati | landing page';
        $this->load->view('site/landing-page',$data);
    }

    public function setuser($value='')
    {
        $wplan      = $this->input->get('wplan');
        $bud        = $this->input->get('bud');
        $date       = $this->input->get('date');
        $qservice   = $this->input->get('qservice');

        if (!empty($wplan)) { $this->session->unset_userdata('wplan'); $wed_ses = array('wplan' => $wplan ); if($this->session->set_userdata($wed_ses)) { echo true; }else{echo false; } 
        }
        if (!empty($bud)) {
            $this->session->unset_userdata('wbud'); $bud_ses = array('wbud' => $bud ); if($this->session->set_userdata($bud_ses)) {echo true; }else{echo false; }
        }
        if (!empty($date)) {
            $this->session->unset_userdata('wdate'); $date_ses = array('wdate' => $date ); if($this->session->set_userdata($date_ses)) {echo true; }else{echo false; }
        }

        if (!empty($qservice) && $this->session->userdata('wplan')=='2') {
            $this->session->unset_userdata('wvcat'); $qser_ses = array('wvcat' => $qservice); if($this->session->set_userdata($qser_ses)) {echo true; }else{echo false; }
        }
    }

    public function checkweduser($value='')
    {
        echo json_encode($this->session->userdata());
    }

    public function insertenquiry($value='')
    {

        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Please enter the valid email address";
          $this->session->set_flashdata('error', $emailErr);
          redirect('wedding-enquiry','refresh');
        }


        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('number', 'Phone Number', 'required|numeric');
        
        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect('wedding-enquiry','refresh');
        }else{

            $name       =   $this->input->post('name');
            $email      =   $this->input->post('email');
            $phone      =   $this->input->post('number');
            $uniq       =   $this->input->post('uniq');
            $wedPlan    =   $this->session->userdata('wplan');
            $wedBudget  =   $this->session->userdata('wbud');
            $wedDate    =   $this->session->userdata('wdate');
            $wvcat      =   $this->session->userdata('wvcat');


            $insert = array(
              'name'        =>  $name , 
              'email'       =>  $email , 
              'phone'       =>  $phone , 
              'wedplan'     =>  $wedPlan , 
              'wedbudget'   =>  $wedBudget ,
              'weddate'     =>  $wedDate,
              'uniq'        =>  $uniq,
            );

            if (!empty($wvcat) && $wedPlan=='2') {
                $insert['service'] = $wvcat;
            }


            $data['result'] = $insert;
            $data['output']  =  $this->m_home->addseoenquiry($insert);
            if (!empty($data['output'])) {
                $this->load->config('email');
                $this->load->library('email');
                $to = $this->config->item('vr_to');
                $cc = $this->config->item('vr_cc');
                $from = $this->config->item('smtp_user');
                $msg = $this->load->view('email/seo_enquiry', $data, true);
                $this->email->set_newline("\r\n");
                $this->email->from($from, 'ShaadiBaraati');
                $this->email->to($to);
                $this->email->cc($cc);
                $this->email->subject('Enquiry Form');
                $this->email->message($msg);
                if ($this->email->send()) {
                    $this->session->set_flashdata('success', 'Your request has been submitted successfully, <br />Our team will contact you soon.');
                    if (!empty($wvcat)) {
                        redirect('vendors/all/'.str_replace(" ", "-", strtolower($insert['service'])),'refresh');
                    }else{
                        redirect('vendors');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
                    redirect('wedding-enquiry','refresh');
                }
            }else{
                  $this->session->set_flashdata('error', 'Unable to submit your request, <br />Please try again later!');
                  redirect('wedding-enquiry','refresh');
            }
        }      
        
    }

    public function popSetuser($value='')
    {
        $poname     = $this->input->post('poname');
        $pophone    = $this->input->post('pophone');
        $poemail     = $this->input->post('poemail');
        if (!empty($poname)) {
            $this->session->unset_userdata('poname'); $bud_ses = array('poname' => $poname ); 
            $this->session->set_userdata($bud_ses);
        }
        if (!empty($pophone)) {
            $this->session->unset_userdata('pophone'); $bud_ses = array('pophone' => $pophone ); 
            $this->session->set_userdata($bud_ses);
        }
        if (!empty($poemail)) {
            $this->session->unset_userdata('poemail'); $bud_ses = array('poemail' => $poemail ); 
            $this->session->set_userdata($bud_ses);
        }

        if (!empty($this->session->userdata('poname')) && !empty($this->session->userdata('pophone')) && !empty($this->session->userdata('poemail'))) {
            $output = '1';
        }else{
            $output = '';
        }
        echo json_encode($output);
    }

    public function popsetUsers($value='')
    {
        $pop_cit    = $this->input->post('pop_cit');
        $pop_cat    = $this->input->post('pop_cat');
        $pop_bud    = $this->input->post('pop_bud');
        $pop_date   = $this->input->post('pop_date');
        $pop_msg    = $this->input->post('pop_msg');

        $poname     =   $this->session->userdata('poname');
        $pophone    =   $this->session->userdata('pophone');
        $qemail     =   $this->session->userdata('poemail');
        

            $insert = array(
              'firstname'  =>  $poname , 
              'email'      =>  $qemail , 
              'phone'      =>  $pophone , 
              'service'    =>  $pop_cat ,
              'date'       =>  $pop_date,
              'city'       =>  $pop_cit,
              'budget'     =>  $pop_bud,
              'message'    =>  $pop_msg,
              'uniq'       =>  random_string('alnum',10),
            );
            $data['result'] = $insert;
            $data['output']  =  $this->m_home->quoterequest($insert);
            if (!empty($data['output'])) {
                $this->load->config('email');
                $this->load->library('email');
                $to = $this->config->item('vr_to');
                $cc = $this->config->item('vr_cc');
                $from = $this->config->item('smtp_user');
                $msg = $this->load->view('email/getquote', $data, true);
                $this->email->set_newline("\r\n");
                $this->email->from($from, 'ShaadiBaraati');
                $this->email->to($to);
                $this->email->to($to);
                $this->email->cc($cc);
                $this->email->subject('Free Quote request');
                $this->email->message($msg);
                if ($this->email->send()) {
                    $output = array('status' => 1, 'msg' => 'Your request has been submitted successfully, <br/> Our team will reach you soon.');
                } else {
                    $output = array('status' => 0, 'msg' => 'Something went wrong please try again later.');
                }
            }else{
                  $output = array('status' => 0, 'msg' => 'Something went wrong please try again later.');
            }
            echo json_encode($output);
    }

    public function blogFetch($value='')
    {

        $curl = curl_init(base_url()."blog/wp-json/wp/v2/posts?per_page=3&orderby=date&order=desc");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);

        $output = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
           echo "cURL Error #:" . $err;
        } else {
            $dec =  json_decode($output);
        }

         


        if (!empty($dec)) {
            foreach ($dec as $key => $value) {

                $ch = curl_init(base_url()."/blog/wp-json/wp/v2/media/".$value->featured_media);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);

                $output1 = curl_exec($ch);
                $imgerr = curl_error($ch);
                curl_close($ch);
                if ($imgerr) {
                   echo "cURL Error #:" . $imgerr;
                } else {
                    $bimgs =  json_decode($output1);
                }

                if (!empty($bimgs)) {
                    $value->blogImage = $bimgs->source_url;
                }
            }
        echo json_encode($dec);
        }


        
        
    }




}

/* End of file Controllername.php */
