<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('shvid') == '') { $this->session->set_flashdata('error', 'Please login and try again'); redirect('vendor/login'); } 
		$this->load->model('m_vendorDetail');
		$this->load->library('form_validation');
		$this->load->library('bcrypt');
        $this->load->library('pagination');
		$this->id = $this->session->userdata('shvid');
		$this->uniq = $this->db->where('id',$this->session->userdata('shvid'))->get('vendor')->row('uniq');
        $this->email = $this->db->where('id',$this->session->userdata('shvid'))->get('vendor')->row('email');
	}

	public function index()
	{
		$data['title'] = 'Vendor Profile | Shaadibaraati';		
        $output = $this->m_vendorDetail->getVendors($this->uniq);
        if (!empty($output )) {
	        foreach ($output as $key => $value) {
	           $value->service     = $this->m_vendorDetail->getService($value->catId);
               $value->video       = $this->m_vendorDetail->getVideo($value->id);
	           $value->gallery     = $this->m_vendorDetail->get_portfolio($this->id);
	           $value->review      = $this->m_vendorDetail->getReview($value->id);
	           $value->userReview  = $this->m_vendorDetail->getuserReview($value->id);
	           $value->fav         = $this->m_vendorDetail->getFavourite($value->id);
	           $value->faq         = $this->m_vendorDetail->faq($value->catId);
	           $value->offer       = $this->m_vendorDetail->offer($value->id);
	        }
	        $data['title']  = $value->name.'- ShaadiBaraati';
        }
        $data['vendor'] = $output;
        $this->load->view('vendor-auth/vendor-profile',$data);
	}


    
    /**
     * vendor registration-> email check exist
     * url : register
    **/
    public function emailcheck($value='')
    {

        $email = $this->input->post('email');
        $output = $this->m_vendorDetail->email_check($email);
        if (empty($output)) {
            $result = $this->m_vendorDetail->email_user($email);
            $output = $result;
        }


        if (empty($output)) {
            $otp = random_string('numeric','6');
           if ($this->m_vendorDetail->addOtp($this->email,$otp)) {
                if($this->otp_email($this->email,$otp))
                {
                   $output = '';
                }else{
                    $output = 3;
                }
            } else{
                $output = 3;
            }
        }

        echo $output;

    }

    /**
     * vendor profile update-> email otp
    **/
    public function otp_email($email='',$otp='')
    {
        $data['otp'] = $otp;
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/v_otpVerify', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from , 'ShaadiBaraati');
        $this->email->to($email);
        $this->email->subject('Verification Code'); 
        $this->email->message($msg);
        if($this->email->send())  
        {
            return true; 
        }
        else
        {
            return false;
        }
    }


    public function eotpVerify($value='')
    {
        $email = $this->input->post('email');
        $otp = $this->input->post('otp');
        $this->db->where('email', $this->email)->update('vendor',array('email' => $email,'reference_id'=>$otp));
        if ($this->db->affected_rows() > 0) {
            echo $email;
        }else{
            echo false;
        }
    }

    /**
     * user registration-> mobile number check exist
     * url : register
    **/
    public function phone_check($value='')
    {
        $phone = $this->input->post('phone');
        $output = $this->m_vendorDetail->phone_check($phone);
        if (empty($output)) {
            $output = $this->m_vendorDetail->phone_user($phone);
        }

        if (empty($output)) {
            $otp = random_string('numeric','6');
           if ($this->m_vendorDetail->addOtp($this->email,$otp)) {
                if($this->otp_sms($otp))
                {
                   $output = '';
                }else{
                    $output = 3;
                }
            } else{
                $output = 3;
            }
        }

        echo $output;
    }

    public function otp_sms($otp='')
    {
        $phone = $this->db->where('id',$this->session->userdata('shvid'))->get('vendor')->row('phone');

            $curl = curl_init();
            $post_fields = array();
            $post_fields["method"] = "sendMessage";
            $post_fields["send_to"] = '91'.$phone.'';
            $post_fields["msg"]  = 'Dear Vendor

Your OTP is '.$otp.' . Use this OTP to update Mobile number/Email Id.

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
               echo "cURL Error #:" . $err;
               return false;
            } 
            else 
            {
                
              echo $response; 
              return true;
            }
    }

    public function potpVerify($value='')
    {
        $phone = $this->input->post('phone');
        $otp = $this->input->post('otp');
        $this->db->where('id', $this->id)->update('vendor',array('phone' => $phone,'reference_id'=>$otp));
        if ($this->db->affected_rows() > 0) {
            echo $phone;
        }else{
            echo false;
        }
    }






	public function changePassword($var = null)
    {
		if ($this->session->userdata('shvid') != '') {
			$data['title'] = 'Change password | Shaadibaraati';
			$this->load->view('vendor-auth/change-password',$data);
		}else{
			$this->session->set_flashdata('error', 'Please login and try again'); 			
			redirect('vendor/login');
		}        
	}
	


		    /**
     *Change pasword -> Update New password
     * @url : update/change-password
     * @param : new password,confirm password,userid
     */
    public function password_validation()
    {
        $this->form_validation->set_rules('curtpassword', 'Current Password', 'callback_passwordcheck');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[newpassword]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('vendor/change-password');
        } else {
			$password = $this->input->post('newpassword');
			$hash  = $this->bcrypt->hash_password($password);
			
            if ($this->m_vendorDetail->changepass($this->id, $hash)) {
                $this->session->set_flashdata('success', 'Password updated Successfully');
                redirect('vendor/change-password');
            } else {
                $this->session->set_flashdata('error', 'unable to update your password, New password is matching with the current password!');
                redirect('vendor/change-password');
            }
        }
	}

    public function curnpasscheck($password='')
    {
        $pass = $this->input->post('pass');
        $result = $this->db->where('id', $this->id)->get('vendor')->row();
        if ($this->bcrypt->check_password($pass, $result->password)) {
            echo '1';
        }else{
            echo '';
        }
    }
	
	public function passwordcheck($password)
    {
		$result = $this->db->where('id', $this->id)->get('vendor')->row();
		if ($this->bcrypt->check_password($password, $result->password)) {
			return true;
		}else{
			$this->form_validation->set_message('passwordcheck', 'The {field} is not Valid');
			return false;
		}
    }

    public function contactPerson($value='')
    {
        $c_person = $this->input->post('c_person');
        $output = $this->m_vendorDetail->contactPerson($c_person,$this->uniq);
        echo $output;
    }

    public function getPerson($value='')
    {
        $output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('c_person');
        echo $output;
    }


	public function addprice($value='')
	{
		$price = $this->input->post('price');
		$output = $this->m_vendorDetail->insertPrice($price,$this->uniq);
		echo $output;
	}

	public function getPrice($value='')
	{
		$output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('price');
		echo $output;
	}
    public function getEmail($value='')
    {
        $output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('email');
        echo $output;
    }
    public function getPhone($value='')
    {
        $output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('phone');
        echo $output;
    }

	public function pricePer($value='')
	{
		$per = $this->input->post('per');
		$output = $this->m_vendorDetail->pricePer($per,$this->uniq);
		echo $output;
	}

	public function getPer($value='')
	{
		$output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('price_for');
		echo $output;
	}

	public function address($value='')
	{
		$vaddress = $this->input->post('vaddress');
		$output = $this->m_vendorDetail->address($vaddress,$this->uniq);
		echo $output;
	}

	public function getAddress($value='')
	{
		$output = $this->db->where('uniq',$this->uniq)->get('vendor')->row('address');
		echo $output;
	}

	public function ban_upload($output = null)
	{

        $this->load->library('upload');
        $this->load->library('image_lib');
		$files = $_FILES;
        if (file_exists($_FILES['banner']['tmp_name'])) {
            $config['upload_path'] = 'vendors-profile/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
            $config['max_width'] = 0;
            $config['max_size'] = '550';
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
                if (!$this->upload->do_upload('banner')) {
                    $output = '';
                }else{
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $imgpath = 'vendors-profile/'.$file_name;
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = $upload_data['full_path'];
                    $config['wm_type']          = 'overlay';
                    $config['wm_overlay_path']  = 'assets/img/water.png';//the overlay image
                    $config['wm_x_transp']      = '4';
                    $config['wm_y_transp']      = '4';
                    $config['width']            = '50';
                    $config['height']           = '50';
                    $config['padding']          = '50';
                    $config['wm_opacity']       = '40';
                    $config['wm_vrt_alignment'] = 'middle';
                    $config['wm_hor_alignment'] = 'center';
                     $this->image_lib->initialize($config);
                    if (!$this->image_lib->watermark()) {
                        $response['wm_errors'] = $this->image_lib->display_errors();
                        $response['wm_status'] = 'error';
                    } else {
                        $response['wm_status'] = 'success';
                    }
                   $output = $this->m_vendorDetail->banner($imgpath,$file_name,$this->uniq);
                }
    	}
    	echo $output;
	}


public function offer($output = null)
	{

        $this->load->library('upload');
        $this->load->library('image_lib');
		$files = $_FILES;
        $filesCount = count($_FILES['offer']['name']);

        if (file_exists($_FILES['offer']['tmp_name'])) {
            $config['upload_path'] = 'offer-image/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $config['max_size'] = '550';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
            $this->upload->do_upload('offer');
	        	$upload_data = $this->upload->data();
	            $file_name = $upload_data['file_name'];
	            $imgpath = 'offer-image/'.$file_name;

	            $insert =  array(
                    'image'       =>  $imgpath , 
                    'vendor_id'   =>  $this->id , 
                );
	                
	        $output = $this->m_vendorDetail->offer_image($insert);

    	}
    	echo $output;
	}

	public function about($value='')
	{
		$about = $this->input->get('about');
		$output = $this->m_vendorDetail->insertAbout($about,$this->uniq);
		echo $output;
	}


	public function portfolio($value='')
	{
		
        $this->load->library('upload');
        $this->load->library('image_lib');

        $files = $_FILES;
        $id = $this->input->post('id');
        $filesCount = count($_FILES['images']['name']);

        if ($filesCount > 30) {
            $this->session->set_flashdata('error', 'Maximum you can add 30 files!');
            redirect('vendor/profile','refresh');
        }
        
        if (!empty($filesCount)) {
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['images']['name']     = $files['images']['name'][$i];
            $_FILES['images']['type']     = $files['images']['type'][$i];
            $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
            $_FILES['images']['error']    = $files['images']['error'][$i];
            $_FILES['images']['size']     = $files['images']['size'][$i];
            
            $config['upload_path']   = 'vendor-portfolio/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width']     = 0;
            $config['max_size'] = '550';
            $config['encrypt_name']  = TRUE;
            
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path']))
                mkdir($config['upload_path'], 0777, TRUE);
            
            if (!$this->upload->do_upload('images')) {
               $error =  $this->upload->display_errors();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('vendor/profile');
            } else {
                
                $upload_data = $this->upload->data();
                $image[] = $upload_data['file_name'];
                
                $width  = 700;
                $height = 400;

                $file_name = $upload_data['file_name'];
                $imgpath = 'vendor-portfolio/'.$file_name;
                
                // $thumbnail = $this->thumbnail($upload_data, $width, $height);
                $watermark = $this->watermark($upload_data,$file_name);
                $insert = array (
                    'path'          => $imgpath,
                    'image'         => $file_name,
                    'thumb_image'   => $file_name, 
                    'vendor_id'     => $this->id,
                );

                $output = $this->m_vendorDetail->insert_portfolio($insert);
            }
        }

            if(!empty($output))
            {
                $this->session->set_flashdata('success', 'Vendor portfolio added Successfully');
                redirect('vendor/profile','refresh');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong please try again!');
                 redirect('vendor/profile','refresh');
            }
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again!');
           redirect('vendor/profile','refresh');
        }
	}


	public function watermark($upload_data = " ",$thumbnail)
    {     
        $this->load->library('upload');
        $this->load->library('image_lib');

            $config['image_library']    = 'gd2';
            $config['source_image']     = $upload_data['full_path'];
            $config['wm_type']          = 'overlay';
            $config['wm_overlay_path']  = 'assets/img/water.png';//the overlay image
            $config['wm_x_transp']      = '4';
            $config['wm_y_transp']      = '4';
            $config['width']            = '50';
            $config['height']           = '50';
            $config['padding']          = '50';
            $config['wm_opacity']       = '40';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';
            $this->image_lib->initialize($config);
            $this->image_lib->watermark();

    }


    public function videoadd($value='')
    {
            $vd_category    = $this->input->post('category');
            $link        	= $this->input->post('link');
            $insert = array(
                'type'      => $vd_category, 
                'link'      => $link, 
                'vendor_id' => $this->id,
            );

            $output = $this->m_vendorDetail->add_video($insert);
            echo $output;
    }





    public function faqAdd()
    {
        $qtn    = $this->input->get('faqs');
        $ans    = $this->input->get('answ');
        $faid   = $this->input->get('faid');
        $insert = array(
            'quotation' => $qtn, 
            'asw'       => $ans, 
            'vendor_id' => $this->id,
            'fq_id'     => $faid, 
        );
        $output = $this->m_vendorDetail->faq_insert($insert);
        echo $output;
    }

    public function serviceAdd($value='')
    {
        $service    = $this->input->get('servid');
        $subtitle   = $this->input->get('answ');
         $insert = array(
            'vendor_id'         => $this->id,
            'information_id'    => $service, 
            'subtitle'          => $subtitle, 
        );
        $output = $this->m_vendorDetail->serviceAdd($insert);
        echo $output;
    }

    public function gallery_delete($id = '',$vendor='')
    {
        // send to model
        if($this->m_vendorDetail->gallery_delete($id)){
            $this->session->set_flashdata('success', 'portfolio Deleted Successfully');
            redirect('vendor/profile','refresh'); // if you are redirect to list of the data add controller name here
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
            redirect('vendor/profile','refresh');  // if you are redirect to list of the data add controller name here
        }
    }


    public function video_delete($id = '',$vendor='')
    {
                 // send to model
        if($this->m_vendorDetail->video_delete($id)){
            $this->session->set_flashdata('success', 'Video Deleted Successfully');
            redirect('vendor/profile','refresh'); // if you are redirect to list of the data add controller name here
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
            redirect('vendor/profile','refresh'); // if you are redirect to list of the data add controller name here
        }
    }

    public function offer_delete($id = '',$vendor='')
    {
        // send to model
        if($this->m_vendorDetail->offer_delete($id)){
            $this->session->set_flashdata('success', 'Offer image Deleted Successfully');
            redirect('vendor/profile','refresh'); // if you are redirect to list of the data add controller name here
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
            redirect('vendor/profile','refresh'); // if you are redirect to list of the data add controller name here
        }
    }


    public function reviews($limit='',$page='')
    {

        // $limit = $this->input->get('limit');
        if (!empty($limit)) {
            $li = $limit;
        }else{
            $li = '10';
        }
        $data['title']  = 'Vendor Review | Shaadibaraati';

            $rows = $this->m_vendorDetail->rowsCount($this->id,$li);
            $data['result'] = $this->m_vendorDetail->reviewsGet($this->id,$li,$page);
            $config['base_url'] = base_url().'vendor/reviews/'.$li;
            $config['total_rows'] = (!empty($rows)? count($rows) : '0');
            $config['per_page'] = $li;
            $config['reuse_query_string'] = TRUE;
            $config['num_links'] = 2;

            $config['full_tag_open'] = '<div class="right"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></div>';

            $config['num_tag_open']     = '<li ><span class="waves-effect">';
            $config['num_tag_close']    = '</span></li>';

            $config['cur_tag_open']     = '<li class="active"><a class="waves-effect">';
            $config['cur_tag_close']    = '</a></li>';

            $config['next_tag_open']    = '<li class="next"> <a href="#" title=""> ';
            $config['next_tag_close']   = '</a></li>';
            $config['next_link']        = '<i class="material-icons">chevron_right</i>';

            $config['prev_tag_open']    = '<li class="prev"> <a href="#" title=""> ';
            $config['prev_tag_close']   = '</a></li>';
            $config['prev_link']        = '<i class="material-icons">chevron_left</i>';

            $config['first_tag_open']   = '<li class=""><span class="">';
            $config['first_tag_close']  = '</span></li>';
            $config['first_link']        = FALSE;

            $config['last_tag_open']    = '<li class=""><span class="">';
            $config['last_tag_close']   = '</span></li>';
            $config['last_link']        = FALSE;

            $this->pagination->initialize($config);
            $data['pagelink']   = $this->pagination->create_links();

        
        $this->load->view('vendor-auth/reviews',$data);
    }

    public function leads($id = null)
    {

        if (!empty($id)) {
           $data['title'] = 'Leads | Shaadibaraati';
           $this->db->where('id', $id)->update('vendor_enquiry',array('status'=>'1'));           
           $data['result'] = $this->m_vendorDetail->enquiryGet($this->id,$id);
           $this->load->view('vendor-auth/v_leads',$data);
        }else{
            $data['title'] = 'Leads | Shaadibaraati';
            $data['result'] = $this->m_vendorDetail->enquiryGet($this->id);
            $this->load->view('vendor-auth/vendor-leads',$data);
        }
    }

    





	
}

/* End of file Vendor-detail.php */
/* Location: ./application/controllers/Vendor-detail.php */