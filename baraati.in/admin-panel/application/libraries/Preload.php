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


}

/* End of file LibraryName.php */
