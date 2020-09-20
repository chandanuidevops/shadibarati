<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

    		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_leads');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("18", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); } 
        $this->eid = $this->session->userdata('sha_id');    

    }

    public function index()
    {
        $data['category']   = $this->m_leads->getCategory();
        $data['city']       = $this->m_leads->getCity();
        $this->load->view('leads/lead-assign', $data, FALSE);        
    }


    public function getvendors($var = null)
    {
        $output     = '';
        $city        = $this->input->get('city');
        $category    = $this->input->get('category');
        $v_type      = $this->input->get('v_type');
        $search      = $this->input->get('search');

        $data['vendors']    = $this->m_leads->getVendors($city,$category,$v_type,$search); 
        
        if (!empty($data['vendors'])) {
             $ldsa ='';
           foreach ($data['vendors'] as $key => $value) {
            $lds = $this->m_leads->getleadcount($value->vid,$value->lvn_name);           
            if ((($value->vid !='')) && (!empty($value->leads))) {
                $ldsa = $lds.'/'.$value->leads;
            }else{
                $ldsa = $lds;
            }

            $output .=  '<p>
                    <label>
                    <input type="checkbox" class="filled-in" value="'.$value->vid.'" name="vendor[]"/>
                    <span>'.$value->name.'</span>
                    </label>
                    &nbsp;&nbsp;&nbsp;<span> - '.($ldsa).'</span>
                </p>';               
           }           
        }
        echo $output; 
    }

    public function lead_insert($var = null)
    {
        $name       = $this->input->post('name');
        $email      = $this->input->post('email');
        $phone      = $this->input->post('phone');
        $budget     = $this->input->post('budget');
        $message    = $this->input->post('message');
        $city       = $this->input->post('city');
        $category   = $this->input->post('category');
        $vendor     = $this->input->post('vendor');
        $fndate     = $this->input->post('fndate');

        for($i=0; $i < count($vendor); $i++ ){

            $data['vphone'] = $this->m_leads->vendorPhone($vendor[$i]);
            $data['vcity']  = $this->db->where('id', $city)->get('city')->row('city');            
            $data['vCat']   = $this->db->where('id', $category)->get('category')->row('category');
            $data['vndr']   = $this->db->select('uniq,email')->where('id', $vendor[$i])->get('vendor')->row();
            $data['vuniq']  = $data['vndr']->uniq;
            $data['vemail'] = $data['vndr']->email;

            $insert = array(
                'user_name'     => $name, 
                'user_email'    => $email,  
                'user_phone'    => $phone,  
                'budget'        => $budget,  
                'wed_detail'    => $message, 
                'location'      => $data['vcity'],  
                'category'      => $data['vCat'],  
                'vendor_id'     => $vendor[$i],
                'fn_date'       => $fndate,
                'assigned'      => $this->eid,
                'uniq'          => random_string('alnum',16),
            ); 

            $data['result'] =  $insert;

            if($this->m_leads->lead_insert($insert))
            {
                $output     = $this->mailSend($data);
                $output1    = $this->sms_vendor($data);
            }   
        }

        // if (!empty($output))
            $this->session->set_flashdata('succes','successfully Leads assigned to vendors!'); 
        // }else{
        //     $this->session->set_flashdata('error','Something went wrong <br> Please try again later!');
        // }
        redirect('leads','refresh');  
    }


    public function mailSend($data = null)
    {
        $to = $data['vemail'];
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/leads', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $this->email->to($to);
        $this->email->cc('info@shaadibaraati.com,pargat.singh27@gmail.com');
        $this->email->subject('Vendor enquiry request','shaadibaraati');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        }else{
            return false;
        }
        
    }

    public function sms_vendor($data = '')
    {
   
      $Name     = $data['result']['user_name'];
      $category = $data['result']['user_name'];
      $phone    = $data['result']['user_phone'];
      $fn_date  = $data['result']['fn_date'];
      $budget   = $data['result']['budget'];
      $location = $data['result']['location'];
      $remarks = $data['result']['wed_detail'];
      $number   = $data['vphone'];
   
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


    public function manage($id = '')
    {
      $data['title'] = 'Leads - Shaadibaraati';
      $data['result'] = $this->m_leads->getLeads();
      $this->load->view('leads/manage', $data, FALSE);        
    }

  public function delete($id='')
    {
        if($this->m_leads->deleteEnquiry($id)){
            $this->session->set_flashdata('success', 'Leads deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again later');
        }
        redirect('leads');
    }



}

/* End of file Controllername.php */
