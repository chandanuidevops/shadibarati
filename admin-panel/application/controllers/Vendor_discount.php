<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_discount extends CI_Controller {


		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_vdiscount');

        $this->aid = $this->session->userdata('sha_id');
        $this->type = $this->session->userdata('sha_type');
        $this->ci =& get_instance();


        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if(in_array("13", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }

    }


	public function index()
	{
		$data['title']  = 'vendor Renewal | shaadibaraati';
		$data['result'] = $this->m_vdiscount->getDiscount();
		$this->load->view('vendors/discount', $data, FALSE);
	}

	public function approve($id='')
	{
        $data['result'] = $this->m_vdiscount->getVendor($id);
        $data['rpid'] = $id;
		$status = '1';
        $update = array('status' => $status,'approved' =>$status);
		// send to model
        if($this->m_vdiscount->status_change($id,$update)){
            $this->session->set_flashdata('success', 'Vendor discount request approved Successfully');
       	}else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
       	}
        redirect('vendors/view-proposal/'.$id,'refresh');
	}

    public function invoice($id='')
    {
        $data['result'] = $this->m_vdiscount->getVendor($id);
        $data['rpid'] = $id;
        $data['invoice'] = $this->m_vdiscount->getDiscount($data['rpid']);
        $data['state'] = $this->m_vdiscount->getStates();
        $invoiceNo = $this->m_vdiscount->getinNo();

        if (!empty($invoiceNo)) {
            $data['inNo'] = 'SB/'.date('my/').($invoiceNo + 1);
        }else{
            $data['inNo'] = 'SB/'.date('my/').'1';
        }
        $data['city'] = $this->m_vdiscount->getCity();
        $this->load->view('vendors/invoice_send',$data);
    }

    

    public function editInvoice($id='')
    {
       $output = $this->m_vdiscount->invoiceDownload($this->aid,$id);
        if (!empty($output['invoiceId'])) {
           $output['terms'] = $this->m_vdiscount->termsGet($output['invoiceId']);
        }
        $data['city'] = $this->m_vdiscount->getCity();
        $data['state'] = $this->m_vdiscount->getStates();
        $data['result'] = $output;
        $this->load->view('vendors/invoiceEdit',$data);
    }


    public function insert_invoice($value='')
    {

        $insert = array(
            'c_name'        => $this->input->post('c_name'), 
            'c_gstin'       => $this->input->post('c_gstin'), 
            'invoice_no'    => $this->input->post('invoice_no'), 
            'in_date'       => $this->input->post('in_date'), 
            'c_address'     => $this->input->post('c_address'), 
            'package'       => $this->input->post('package'), 
            'pa_cost'       => $this->input->post('pa_cost'), 
            'discount'      => $this->input->post('discount'), 
            'gst'            => $this->input->post('gst'),
            'total'         => $this->input->post('total'), 
            'w_amount'      => $this->input->post('w_amount'), 
            'uniq_id'       => $this->input->post('uniq_id'), 
            'renewal_id'    => $this->input->post('rpid'),
            'due_date'      => $this->input->post('due_date'),
            'pan_no'        => $this->input->post('pan_no'),
            'city'          => $this->input->post('city'),
            'state'         => $this->input->post('state'),
            'pincode'       => $this->input->post('pincode'),
            'amt_after_disc'       => $this->input->post('amt_after_disc'),
            'tds'           => $this->input->post('tds')
        );

        if (!empty($insert['gst']) && $insert['state'] == '18') {
            $insert['cgst'] = (int)$insert['gst']/2;
            $insert['sgst'] = (int)$insert['gst']/2;
        }else if (!empty($insert['gst']) && $insert['state'] != '18') {
            $insert['igst'] = $this->input->post('gst');
        }

        $data['price'] = $this->m_vdiscount->prices($insert['renewal_id']);

        $invoiceId = $this->m_vdiscount->invoiceInsert($insert);

        if(!empty($invoiceId)){
        $terms = $this->input->post('terms');   
        if (!empty($terms)) {   
            $this->db->where('invoice_id', $invoiceId)->delete('invoice_terms');
            $termscount = count($terms);
            for ($i = 0; $i < $termscount; $i++) {
                if (!empty($terms[$i])){ 
                    $insertIterm  = array('invoice_id' =>$invoiceId , 'terms' =>$terms[$i]);
                    $this->m_vdiscount->insertIterm($insertIterm);
                }
            }
        }

             $this->session->set_flashdata('success', 'Invoice generated successfully');
        }else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
        }
        redirect('vendors/view-proposal/'.$this->input->post('rpid'),'refresh');
    }

    public function invoiceDownload($id='')
    {
        $output = $this->m_vdiscount->invoiceDownload($this->aid,$id);
        if (!empty($output['invoiceId'])) {
           $output['terms'] = $this->m_vdiscount->termsGet($output['invoiceId']);
        }
        $data['result'] = $output;
        // $this->load->view('vendors/invoice', $data);
        require_once $_SERVER['DOCUMENT_ROOT'].'/vendor-pdf/autoload.php';
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            // 'orientation' => 'L',
            'margin_top' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_bottom' => 0,
            'default_font_size' => 8,
        ]);
        $html = $this->load->view('vendors/invoice', $data, TRUE);
        $pdfFilePath ="vendor-invoice-".date('Y-m-h H:i:s')."-.pdf";
        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath, "D");
    }



    public function send_invoice($id='')
    {
        $output = $this->m_vdiscount->invoiceDownload($this->aid,$id);
        if (!empty($output['invoiceId'])) {
           $output['terms'] = $this->m_vdiscount->termsGet($output['invoiceId']);
        }
        $data['result'] = $output;
        // require_once $_SERVER['DOCUMENT_ROOT'].'/vendor-pdf/autoload.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/vendor-pdf/autoload.php';
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            // 'orientation' => 'L',
            'margin_top' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_bottom' => 0,
            'default_font_size' => 9,
        ]);
        $html = $this->load->view('vendors/invoice', $data, TRUE);
        $mpdf->WriteHTML($html);
        $content = $mpdf->Output('', 'S');
        $filename = "vendor-propsal".random_string('alnum',10).".pdf";
        $pdfFile = 'pdf/invoice-'.$filename.'.pdf';
        $added              = $this->db->select('vendor_id,manager')->where('id', $id)->get('renew_package')->row();
        $data['manager']    = $this->db->select('email')->where('id', $added->manager)->get('admin')->row('email');
        $data['vendor']  = $this->db->select('email')->where('id', $added->vendor_id)->get('vendor')->row('email');
        $this->load->config('email');
        $this->load->library('email');
        $to = $this->config->item('vr_to');
        $cc = $this->config->item('vr_cc');
        $from = $this->config->item('smtp_user');
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $recipients = array($data['vendor'],$to);
        $this->email->to(implode(', ', $recipients));
        if (!empty($data['manager'])) {
            $cc_recipients = array($data['manager'],$cc);
            $this->email->cc(implode(', ', $cc_recipients));
        }
        $msg = $this->load->view('email/invoice', $data, true);
        $this->email->subject('Vendor Package Invoice');
        $this->email->message($msg);
        $this->email->attach($content, 'attachment', $pdfFile, 'application/pdf');
        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Successfully invoice sent to vendor');
            $this->db->where('id', $id)->update('package_invoice',array('mail' => 1));
        } else {
            $this->session->set_flashdata('error', 'invoice Not sent to vendor');
        }
        redirect('vendors/view-proposal/'.$id,'refresh');
    }

    public function reject($id='')
    {
        $status = '2';
        $rpackage = $this->db->where('rp.id', $id)->get('renew_package rp')->row();

        if (!empty($rpackage) && $rpackage->live == '1') {
            $update = array('status' => $status,'approved' =>$status,'live' =>0,'reject_reson' => $this->input->post('reason'),'ends_on' => $rpackage->oldval);
        }else{
            $update = array('status' => $status,'approved' =>$status,'live' =>0,'reject_reson' => $this->input->post('reason'));
        }
        if($this->m_vdiscount->status_change($id,$update)){
            if (!empty($rpackage) && $rpackage->live == '1') {
                if (!empty($rpackage->oldpack)) {
                    $rpold = $rpackage->oldpack;
                }else{
                    $rpold = 0;
                }
                $this->db->where('id', $rpackage->vendor_id)
                ->update('vendor',array('package' => $rpold));

                $this->db->where('renewal_id', $id)->update('package_invoice',array('status' => 0));
            }
            // $this->sendreject($id);
            $this->session->set_flashdata('success', 'Vendor discount request rejected Successfully');
        }else{
           $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
        }
        redirect('vendors/view-proposal/'.$id,'refresh');
    }

    // public function sendreject($id='')
    // {
    //     $data['result'] = $this->m_vdiscount->getVendor($id);
    //     $added = $this->db->select('vendor_id,added_by')->where('id', $id)->get('renew_package')->row();
    //     $admin = $this->db->select('manager,email')->where('id', $added->added_by)->get('admin')->row();
    //     $vendor = $this->db->select('email')->where('id', $added->vendor_id)->get('vendor')->row();
    //     if (!empty($admin->manager)) {
    //         $data['manager'] = $this->m_vdiscount->getManager($admin->manager);
    //     }
    //     $this->load->config('email');
    //     $this->load->library('email');
    //     $to = $this->config->item('vr_to');
    //     $cc = $this->config->item('vr_cc');
    //     $from = $this->config->item('smtp_user');
    //     $msg = $this->load->view('email/discount_reject', $data, true); 
    //     $this->email->set_newline("\r\n");
    //     $this->email->from($from, 'ShaadiBaraati');
    //     $recipients = array($data['result']->email,$to);
    //     $this->email->to(implode(', ', $recipients));
    //     if (!empty($data['manager'])) {
    //         $this->email->cc($data['manager']->email);
    //     }
    //     $this->email->subject('Vendor Proposal Rejection');
    //     $this->email->message($msg);
    //     if ($this->email->send()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function make_live($id='')
    {
        $validity= '';
        $valid = $this->m_vdiscount->getTenure($id);
        if (!empty($valid->tenure)) {
            $validity = (int)$valid->tenure + (int)(!empty($valid->add_mon)?$valid->add_mon:'');
        }
        $validity = date('Y-m-d', strtotime("+".$validity." months", strtotime(date('Y-m-d'))));
        
        $this->load->model('m_finance');
        if ($this->m_finance->makeLive($id,$validity)) {
            if($this->send_live($id)){
             $this->session->set_flashdata('success', 'Proposal has been made live successfully');
            }else{
                $this->session->set_flashdata('error', 'Email hasnot been sent to the vendor');
            }
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again later!');
        }
        redirect('vendors/view-proposal/'.$id,'refresh');
    }

    public function send_live($id='')
    {
        $data['result']     = $this->m_vdiscount->getVendor($id);
        $added              = $this->db->select('manager')->where('id', $id)->get('renew_package')->row();
        $data['manager']    = $this->db->select('email')->where('id', $added->manager)->get('admin')->row('email');
        $this->load->config('email');
        $this->load->library('email');
        $to = $this->config->item('vr_to');
        $cc = $this->config->item('vr_cc');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/listing-live', $data, true); 
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'ShaadiBaraati');
        $recipients = array($data['result']->email,$to);
        $this->email->to(implode(', ', $recipients));
        if (!empty($data['manager'])) {
            $cc_recipients = array($data['manager'],$cc);
            $this->email->cc(implode(', ', $cc_recipients));
        }
        $this->email->subject('Vendor Proposal Live');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }


    public function invoiceData($value='')
    {
        $data['title']  = 'vendor Renewal | shaadibaraati';
        $data['result'] = $this->m_vdiscount->invoiceData();
        $this->load->view('vendors/invoiceData', $data, FALSE);
    }


    public function invoicePending($value='')
    {
        $data['title']  = 'vendor Renewal | shaadibaraati';
        $data['result'] = $this->m_vdiscount->invoicePending();
        $this->load->view('vendors/invoicePending', $data, FALSE);
    }


    public function deleteProposal($id='')
    {
        if($this->m_vdiscount->deleteProposal($id)){
            $this->session->set_flashdata('success', 'Banner deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
        }
        redirect('vendors-discount');

    }


}

/* End of file Vendor_discount.php */
/* Location: ./application/controllers/Vendor_discount.php */