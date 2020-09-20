<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('inv_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_product');
		$this->load->model('m_category');
        $this->aid = $this->session->userdata('inv_id');

    }

	/**
	* Product -manage products
	* @url - product/manage
	* @param - null
	**/ 
	public function index()
	{
		$data['title'] = 'Product';
		$data['result'] = $this->m_product->getproducts();
		$this->load->view('product/list', $data, FALSE);
	}


	/**
	* Product -add products
	* @url - product/add
	* @param - null
	**/ 
	public function add($value='')
	{
		$data['title'] = 'Product';
		$data['category']  = $this->m_category->getcategory();
		$this->load->view('product/add', $data, FALSE);
	}

	public function getSubcategory($value='')
	{
		$id = $this->input->get('id');
		$subcat = $this->m_category->getSubcategory($id);

		$data ='';
		if(!empty($subcat)){
			foreach ($subcat as $key => $value) {
				$data .= '<option value="'.$value->id.'">'.$value->title.'</option>';
			}
		}
		echo $data; 
	}

	public function insert($value='')
	{

		$insert = array(
			'name' 			=> $this->input->post('name'), 
			'sku' 			=> $this->input->post('sku'), 
			'category' 		=> $this->input->post('category'), 
			'sub_category' 	=> $this->input->post('sub_category'), 
			'is_stock' 		=> $this->input->post('stock'), 
			'mrp' 			=> $this->input->post('mrp'), 
			'selling_price' => $this->input->post('Sell_price'), 
			'discount' 		=> $this->input->post('discount'), 
			'description' 	=> trim($this->input->post('description')), 
			'uniq' 			=> $this->input->post('uniq'), 
			'update_date' 	=> date('Y-m-d'), 
		);

		$id = $this->input->post('id');
		if (empty($id)) {
            $txt = strtoupper(substr($insert['name'], 0, 2)) . substr($insert['name'], 2);
            $result = mb_substr($txt, 0, 2);
            $insert['pr_id'] = $result . date('YmdHis');
        }

		$this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        if (file_exists($_FILES['fimage']['tmp_name'])) {
            $config['upload_path'] = '../featured-img/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|svg';
            $config['max_size'] = '2048';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
            if (!$this->upload->do_upload('fimage')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());
                if (!empty($vid)) {redirect('product/edit/'.$vid); }else{redirect('product/add'); }
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $imgpath = 'featured-img/'.$file_name;
                if($imgpath){$insert['featured_image'] = $imgpath; } }
        }
        $output = $this->m_product->insert_product($insert);
        if(!empty($output))
        {
        	if (!empty($vid)) { $rid = $vid; $e = 'Updated'; }else{ $e = 'Added'; $rid = $output; } 
        	$this->session->set_flashdata('success', 'Product '.$e.' Successfully');
            redirect('product/edit/'.$rid,'refresh');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again!');
            if (!empty($vid)) {redirect('product/edit/'.$vid); }else{redirect('product/add'); }
    	}
	}


	public function edit($id='')
	{
		$data['title'] 		= 'Product';
		$data['category']  	= $this->m_category->getcategory();
		$result  			= $this->m_product->getproduct($id);
		if (!empty($result)) {
			$result->images = $this->m_product->getimages($id);
		}
		$data['result'] = $result;
		$this->load->view('product/edit', $data, FALSE);
	}

	public function other($value='')
	{
		$id = $this->input->post('id');
		$filesCount = count($_FILES['images']['name']);
        if ($filesCount > 30) {
            $this->session->set_flashdata('error', 'Maximum you can add 30 files!');
            redirect('product/edit/'.$id);
        }
       	$insert = array(
			'weight' 			=> $this->input->post('weight'), 
			'dimensions' 		=> $this->input->post('dimensions'), 
			'no_of_insert' 		=> $this->input->post('no_insert'), 
			'material' 			=> $this->input->post('material'), 
			'type' 				=> $this->input->post('type'), 
			'ceremony' 			=> $this->input->post('ceremony'), 
			'orientation'		=> $this->input->post('orientation'), 
			'print_option' 		=> $this->input->post('print_opt'), 
			'gsm' 				=> $this->input->post('gsm'), 
			'color' 			=> $this->input->post('color'), 
			'size' 				=> $this->input->post('size'), 
			'theme' 			=> $this->input->post('theme'), 
			'update_date' 			=> date('Y-m-d'), 
		);

        $output = $this->m_product->other($insert,$id);
        if(!empty($output))
        {
        	$this->insert_image($_FILES);

        	$this->session->set_flashdata('success', 'Product Updated Successfully');
            redirect('product/edit/'.$id,'refresh');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again!');
             redirect('product/edit/'.$id,'refresh');
    	}

        

	}

	public function insert_image($vas='')
	{
		$files = $_FILES;
		$id = $this->input->post('id');
		$filesCount = count($_FILES['images']['name']);
		if (!empty($_FILES['images']['name'][0])) {
        for ($i = 0; $i < $filesCount; $i++) {
	            $_FILES['images']['name']     = $files['images']['name'][$i];
	            $_FILES['images']['type']     = $files['images']['type'][$i];
	            $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
	            $_FILES['images']['error']    = $files['images']['error'][$i];
	            $_FILES['images']['size']     = $files['images']['size'][$i];
	            
	            $config['upload_path']   = '../product-images/';
	            $config['allowed_types'] = 'jpg|png|jpeg';
	            $config['max_width']     = 0;
	            $config['encrypt_name']  = TRUE;
	            $config['max_size'] = '2048';
	            
	            $this->load->library('upload');
	            $this->upload->initialize($config);
	            if (!is_dir($config['upload_path']))
	                mkdir($config['upload_path'], 0777, TRUE);
	            
	            if (!$this->upload->do_upload('images')) {
	               $error =  $this->upload->display_errors();
	                $this->session->set_flashdata('error', $this->upload->display_errors());
	                redirect('product/edit/'.$id);
	            } else {
	                
	                $upload_data = $this->upload->data();
	                $image[] = $upload_data['file_name'];
	                
	                $width  = 700;
	                $height = 400;

	                $file_name = $upload_data['file_name'];
	                $imgpath = 'product-images/'.$file_name;
	                
	                $insert = array (
	                    'image'          => $imgpath,
	                    'uniq'         	=> random_string('alnum',20),
	                    'prod_id'     => $id,
	                );

	                $output = $this->m_product->insert_images($insert);
	            }
	        }
	    }
	}

    public function delete($id = null)
    {
        if($this->m_product->delete($id)){
			$this->session->set_flashdata('success', 'Product deleted Successfully');
			redirect('product/manage','refresh');
       }else{
			$this->session->set_flashdata('error', 'Some error occured please try again');
			redirect('product/manage','refresh');
       }
    }

}

/* End of file Product.php */
/* Location: .//C/xampp/htdocs/invitation/admin/controllers/Product.php */