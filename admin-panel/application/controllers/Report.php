<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_report');
        $this->load->model('m_vendors');
        $this->load->model('m_adminusers');
        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("25", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }



	public function index()
	{
		$data['title']      = 'Sales Report | Shaadibaraati';
        $filt['year']       = $this->input->get('year');
        $filt['month']      = $this->input->get('month');
        $filt['city']       = $this->input->get('city');
        $filt['category']   = $this->input->get('category');
        $filt['asm']        = $this->input->get('asm');
        $filt['tele']       = $this->input->get('tele');
        $filt['nathead']    = $this->input->get('nathead');
        $filt['branch']     = $this->input->get('branch');
		$data['result']     = $this->m_report->saleReport($filt);
        $data['city']       = $this->m_vendors->get_city();
        $data['category']   = $this->m_vendors->get_category();
        $data['employee']   = $this->m_adminusers->getEmployees();
        echo "<pre>";
        print_r ($data['result']);
        echo "</pre>";
        $this->load->view('report/sales.php', $data, FALSE);
	}


    public function leads($value='')
    {
        $data['title'] = 'Leads Report | Shaadibaraati';
        $filt['package']      = $this->input->get('package');
        $filt['city']       = $this->input->get('city');
        $filt['category']   = $this->input->get('category');
        $data['result']     = $this->m_report->getLeads($filt);
        $data['city']       = $this->m_vendors->get_city();
        $data['category']   = $this->m_vendors->get_category();
        $data['package']    = $this->m_vendors->getPackage();
        $this->load->view('report/leads.php', $data, FALSE);
    }


    public function visitors($value='')
    {
        $year   = $this->input->get('year');
        $month  = $this->input->get('month');
        $data['title'] = 'Leads Report | Shaadibaraati';
        $data['result'] = $this->m_report->visitors($year,$month);
        $this->load->view('report/visitors.php', $data, FALSE);
    }

    public function employee($value='')
    {
        $data['title']      = 'Employee Report | Shaadibaraati';
        $filt['year']       = $this->input->get('year');
        $filt['month']      = $this->input->get('month');
        $filt['asm']        = $this->input->get('asm');
        $filt['tele']       = $this->input->get('tele');
        $filt['nathead']    = $this->input->get('nathead');
        $filt['branch']     = $this->input->get('branch');
        $data['result']     = $this->m_report->employee($filt);
        $data['city']       = $this->m_vendors->get_city();
        $data['employee']   = $this->m_adminusers->getEmployees();
        $this->load->view('report/employee.php', $data, FALSE);
    }

    public function team($value='')
    {
        $city = $this->input->get('city');
        $data['title']      = 'Team Report | Shaadibaraati';
        $data['result']     = $this->m_report->getManager($city);
        $data['city']       = $this->m_vendors->get_city();
        $this->load->view('report/team.php', $data, FALSE);
    }

    public function liveReport($value='')
    {
        $city   = $this->input->get('city');
        $month  = $this->input->get('month');
        $year   = $this->input->get('year');
        $category = $this->input->get('category');
        $data['title']    = 'Live Report | Shaadibaraati';
        $data['result']   = $this->m_report->liveReport($category,$city,$month,$year);
        $data['category'] = $this->m_vendors->get_category();
        $data['city']     = $this->m_vendors->get_city();
        $this->load->view('report/live.php', $data, FALSE);
    }


}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */
