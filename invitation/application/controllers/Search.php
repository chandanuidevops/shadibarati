<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    
    public function __construct()
        {
        parent::__construct();
        $this->load->model('m_search');
        $this->uid = $this->session->userdata('sid');
        $this->load->library('pagination');
        $this->load->model('m_cart');
        $this->data['cart_item'] = $this->m_cart->cart_item($this->session->userdata('inuid'));
        $this->data['categories'] = $this->m_search->categories();
    }
    
    // search suggetion
    public function index()
    {
        $data = ''; $title =''; $subTitle = '';$url = '';

        $query = $this->input->get('q');
        $result = $this->m_search->getResult($query);
        // set result
        if(!empty($result)){
            foreach ($result as $key => $value) {
                $title = $value->name;
                $subTitle = $value->title;
                $url = base_url().'search?q='.$query;
    
                $data .= '<li class="sg-result-list">';
                $data .= '<a href="'.$url.'">';
                $data .= '<div class="sgrl-item-title"><span>'.$title.'</span></div>';
                $data .= '<div class="sgrl-item-category" style="color:gray"><span>'.$subTitle.'</span></div>';
                $data .= '</a> </li>';
            }
        }else{
            $data .= '<li class="sg-result-list"><div class="sgrl-item-title"><span>No result found</span></div></li>';
        }
        echo $data;        
    }

    // search product
    public function search($page = '')
    {
        $perpage    = 16;
        $link       = str_replace('+',' ', $this->input->get('c'));
        $category   = str_replace('%26','&', $link);         
        $query      = $this->input->get('q');
        $min        = $this->input->get('min');
        $max        = $this->input->get('max');
        $data       = $this->m_search->getResult($query, $category, $max, $min);
        $result     = $this->m_search->search_pagination($query,$category,$perpage,$page, $max, $min);
        $config['base_url'] = base_url().'search';
        $config['total_rows'] = count($data);
        $config['per_page'] = 16;
        $config['reuse_query_string'] = TRUE;
        $config['num_links'] = 2;
        $config['full_tag_open']    = '<div class="style1"> <ul class="flat-pagination style1">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li ><span class="waves-effect">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="active"><a class="waves-effect">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="next"> <a href="#" title=""> ';
        $config['next_tag_close']   = '</a></li>';
        $config['next_link']        = 'Next Page <img src="'.base_url().'assets/images/icons/right-1.png" alt="">';
        $config['prev_tag_open']    = '<li class="prev"> <a href="#" title=""> ';
        $config['prev_tag_close']   = '</a></li>';
        $config['prev_link']        = '<img src="'.base_url().'assets/images/icons/left-1.png" alt=""> Prev Page';
        $config['first_tag_open']   = '<li class=""><span class="">';
        $config['first_tag_close']  = '</span></li>';
        $config['first_link']        = FALSE;
        $config['last_tag_open']    = '<li class=""><span class="">';
        $config['last_tag_close']   = '</span></li>';
        $config['last_link']        = FALSE;
        $this->pagination->initialize($config);
        $data['pagelink'] = $this->pagination->create_links();
        $data['result'] = $result;
        $data['breadcrumbs'] = FALSE;
        $data['title'] = $this->input->get('q');
        $this->load->view('pages/result', $data, FALSE);
        
    }

    // single product
    public function product_detail($id = null)
    {
        $data['breadcrumbs'] = FALSE;
        $data['product'] = $this->m_search->single_product($id);
        if (!empty($data['product'])) {
            $data['title'] = $data['product']->name;
            $data['product']->images = $this->m_search->single_images($data['product']->id);
        }else{
            $data['title'] = 'Invitation';
        }
        $this->load->view('pages/product-detail', $data, FALSE);
    }


    
}

/* End of file Search.php */
