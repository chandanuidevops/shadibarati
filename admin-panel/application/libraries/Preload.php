<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class preload
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_preload');
        
    }

    public function testimonial()
    {
        return  $this->ci->m_preload->testimonial();
    }

    public function feedback()
    {
        return  $this->ci->m_preload->feedback();
    }

    public function bypackage()
    {
        return  $this->ci->m_preload->bypackage();
    }

    public function access()
    {
        return  $this->ci->m_preload->getaccess();
    }

    public function vendorApproval($value='')
    {
        return $this->ci->m_preload->vendorApproval();
    }

    public function disccount($value='')
    {
        return $this->ci->m_preload->getDisccount();
    }

    public function newProposal($var = null)
    {
        return $this->ci->m_preload->newProposal();
    }

    public function approvedProposal($var = null)
    {
        return $this->ci->m_preload->approvedProposal();
    }
    public function rejectProposal($var = null)
    {
        return $this->ci->m_preload->rejectProposal();
    }

    public function allProposal($var = null)
    {
        return $this->ci->m_preload->allProposal();
    }

    public function payProposal($var = null)
    {
        return $this->ci->m_preload->payProposal();
    }

    public function liveProposal($var = null)
    {
        return $this->ci->m_preload->liveProposal();
    }
}

/* End of file LibraryName.php */
