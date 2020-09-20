<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('inv_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
        $this->aid = $this->session->userdata('inv_id');

    }


    /**
     * Category -> add Category
     * load view page
     * url : category/add
    **/
	public function index()
	{
		$data['title']  = 'Category - Invitation';
		$this->load->view('category/add-category', $data, FALSE);
	}

	/**
     * category -> insert category
     * insert new category into db
     * url : category/insert
    **/
	public function insert_category($value='')
	{
        $insert =  array(
        	'title'        => $this->input->post('category'),
        	'status'       => '1',
        	'uniq'         => $this->input->post('category_id'),
            'createdBy'    => $this->aid,
        );
        $output = $this->m_category->insert_category($insert);
			if(!empty($output))
			{
				$this->session->set_flashdata('success', 'category Added Successfully');
				redirect('category/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('category/add','refresh');
			}
        }


        /**
         * category -> delete city
         * url : cities/delete
         * @param : id
        */
        public function delete($id='')
        {
            // send to model
            if($this->m_category->delete_category($id)){
                $this->session->set_flashdata('success', 'category Deleted Successfully');
                redirect('category/manage','refresh'); // if you are redirect to list of the data add controller name here
            }else{
                $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                redirect('category/manage','refresh'); // if you are redirect to list of the data add controller name here
            }
        }



	/**
     * cities -> manage cities
     * get all cities detail and display in table
     * url : cities/manage
    **/
	public function manage_category()
	{
		$data['title']  = 'category - Invitation';
		$data['result']  = $this->m_category->getcategory();
		$this->load->view('category/manage-category', $data, FALSE);
	}




    /**
    * Users -> get single city 
    * get single city detail and display
    * url : cities/edit/id
    * @param : id
    */
    public function single_category($id='')
    {
        $data['result']  = $this->m_category->single_category($id);
        $data['title']   = $data['result']->title.' - Invitation';
        $this->load->view('category/edit-category', $data, FALSE);
    }


    	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function update_category($value='')
	{
        $title = $this->input->post('category');
        $id = $this->input->post('id');
        $output = $this->m_category->update_category($title,$id);
        if(!empty($output))
		{
			$this->session->set_flashdata('success', 'Category Updated Successfully');
			redirect('category/manage','refresh');
		}else{
			$this->session->set_flashdata('error', 'Something went wrong please try again!');
			redirect('category/edit/'.$id,'refresh');
		}
    }


        // sub category
    public function sub_category($id = null)
    {
        $data['result'] = $this->m_category->sub_category();
        $data['title'] = 'Sub Category';
        $this->load->view('category/sub-category', $data, FALSE);
    }

    // add sub category
    public function sub_category_add(Type $var = null)
    {
        $id = $this->input->post('ctid');
        $title = $this->input->post('category');
        $data = array(
            'cat_id' => $id,
            'title' => $title,
            'status' => '1'
        );

        if($this->m_category->add_sub_category($data))
        {
            $this->session->set_flashdata('success', 'Sub Category update successfully');
            redirect('category/sub-category');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('category/sub-category');
        }
    }

    // dete subcategory
    public function sub_category_delete($id = null)
    {
        if($this->m_category->deleteSub($id))
        {
            $this->session->set_flashdata('success', 'Category deleted successfully');
            redirect('category/sub-category');
        }else{
            $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
            redirect('category/sub-category');
        }
    }

     // Edit subcategory
     public function sub_category_edit()
     {
         $id = $this->input->post('id');
         $title = $this->input->post('category');
         $data = array('title' => $title, );
         if($this->m_category->editSub($data, $id))
         {
             $this->session->set_flashdata('success', 'Sub Category updated successfully');
             redirect('category/sub-category');
         }else{
             $this->session->set_flashdata('error', 'Some error occured, Please try agin later');
             redirect('category/sub-category');
         }
     }





}

/* End of file Cities.php */
/* Location: ./application/controllers/Cities.php */