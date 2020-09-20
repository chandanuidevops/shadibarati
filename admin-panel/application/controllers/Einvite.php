<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Einvite extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_invite');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("28", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }


	public function index()
	{
		$data['title']  = 'E-invite - Shaadibaraati';
		$data['result'] = $this->m_invite->getinvite();
		$this->load->view('einvite/list', $data, FALSE);
	}

}

/* End of file Einvite.php */
/* Location: ./application/controllers/Einvite.php */