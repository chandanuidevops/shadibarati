<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Einvite extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('m_invite');
        $this->id = $this->session->userdata('shdid');
    }

    // select theme - load view page
    public function index()
    {
        if ($this->session->userdata('shdid') != '') {
            $data['title']  = 'ShaadiBaraati | Dashboard';
            $this->load->view('einvite/theme-select',$data);
        }else{
            $this->session->set_flashdata('error', 'Please try again'); 
            redirect('login');
        }
    }

    // insert selceted theme
    public function themeinsert($value='')
    {
        if ($this->session->userdata('shdid') != '') {
            $theme = $this->input->post('theme');
            $insert = array(
                'user_id' => $this->session->userdata('shdid'), 
                'theme'   => $theme, 
                'uniq'    => random_string('alnum',15)  
            );
            $output = $this->m_invite->themeinsert($insert);
            echo $output;
        }else{
            $this->session->set_flashdata('error', 'Please try again'); 
            redirect('login');
        }
    }

    public function getThemeselect($value='')
    {
        $output = $this->m_invite->getThemeselect();
        echo json_encode($output);
    }

    public function manage_user()
    {
        $eid = $this->input->get('eid');
        $data['title']  = 'ShaadiBaraati | Manage User';
        $data['result'] = $this->m_invite->getusers($eid);
        $this->load->view('einvite/manage-user',$data);
    }

    public function insertBgdetail($value='')
    {
        $eid = $this->input->post('eid');
        if (file_exists($_FILES['bfile']['tmp_name'])) {
            $config['upload_path'] = 'e-invite/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config); if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
            if (!$this->upload->do_upload('bfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('bide-groom?eid='.$eid,'refresh');
            } else {
                $upload_data = $this->upload->data();
                $brideimage = 'e-invite/'.$upload_data['file_name'];
            }
        }

        if (file_exists($_FILES['gro_file']['tmp_name'])) {
            $config['upload_path'] = 'e-invite/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config); if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
            if (!$this->upload->do_upload('gro_file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('bide-groom?eid='.$eid,'refresh');
            } else {
                $upload_data1 = $this->upload->data();
                $groomimage = 'e-invite/'.$upload_data1['file_name'];
            }
        }


        $insert = array(
            'fndate' => $this->input->post('wed_date'), 
            'bride' => $this->input->post('brd_name'), 
            'bdetail' => $this->input->post('brd_dec'), 
            'groom' => $this->input->post('gro_name'), 
            'gdetail' => $this->input->post('gro_dec'),
            'user_id' => $this->session->userdata('shdid'), 
        );
        if (!empty($brideimage)) { $insert['bimage'] = $brideimage; }
        if (!empty($groomimage)) { $insert['gimage'] = $groomimage; }
        $output = $this->m_invite->gmUpdate($insert,$eid);

        if (!empty($output)) {
            $this->session->set_flashdata('success', 'Groom & Bride details updated successfully');
            redirect('invite-event?eid='.$eid,'refresh');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong, please try agin later!');
            redirect('bide-groom?eid='.$eid,'refresh');
        }
    }

    public function wedding_event()
    {
        $eid = $this->input->get('eid');
        $data['title']  = 'ShaadiBaraati | Wedding Event';
        $data['result'] = $this->m_invite->getEvents($eid);
        $this->load->view('einvite/wedding-event',$data);
    }

    public function eventInsert($value='')
    {
        $res='';
            $insert = array(
                'name'      => $this->input->post('eve_name'), 
                'venue'     => $this->input->post('eve_venue'), 
                'date'      => $this->input->post('eve_date'), 
                'time'      => $this->input->post('eve_time'), 
                'address'   => $this->input->post('eve_add'),
                'desc'      => $this->input->post('eve_dec'),
                'user_id'   => $this->session->userdata('shdid'), 
            );

            $eid = $this->input->post('eid');

            $data['result'] = $this->m_invite->eventInsert($insert,$eid);
            if (!empty($data)) {
                $res = count($data['result']);
                $this->session->set_flashdata('success', 'Event details updated successfully');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, please try agin later!');
            }
            if($res >= 2){
                redirect('family-member?eid='.$eid,'refresh');
            }else{
                redirect('invite-event?eid='.$eid,'refresh');
            }
    }


    public function family_member()
    {

        $data['title']  = 'ShaadiBaraati | Family Member';
        if(!empty($this->input->post())){
                $insert = array(
                    'name'      => $this->input->post('name'), 
                    'family'    => $this->input->post('family'), 
                    'realtion'  => $this->input->post('relation'), 
                    'user_id'   => $this->session->userdata('shdid'), 
                );

                $eid = $this->input->post('eid');

               
                $config['upload_path'] = 'e-invite/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_width'] = 0;
                $config['encrypt_name'] = true;
                $this->load->library('upload');
                $this->upload->initialize($config); if (!is_dir($config['upload_path'])) {mkdir($config['upload_path'], 0777, true); }
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('family-member');
                } else {
                    $upload_data = $this->upload->data();
                    $image = 'e-invite/'.$upload_data['file_name'];
                    $insert['image'] = $image;
                }

            $data['result'] = $this->m_invite->familyInsert($insert,$eid);
            if (!empty($data)) {
                $this->session->set_flashdata('success', 'Family members updated successfully');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, please try agin later!');
            }
            redirect('family-member?eid='.$eid,'refresh');

        }else{
            $eid = $this->input->get('eid');
            $data['result'] = $this->m_invite->getfamily($eid);
            $this->load->view('einvite/family-member',$data);
        }
    }


    public function wedding_photo()
    {
        $eid = $this->input->get('eid');
        $data['title']  = 'ShaadiBaraati | Wedding Photo';
        $this->load->view('einvite/wedding-photo',$data);
    }

    public function gallery($value='')
    {
        $eid = $this->input->get('eid');
        $data = $this->m_invite->getGlarys($eid);
        echo json_encode($data);
    }

    public function galleryInsert($value='')
    {

        $eid = $this->input->post('eid');
        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        $id = $this->input->post('id');
        $filesCount = count($_FILES['images']['name']);

        if ($filesCount > 20) {
            $this->session->set_flashdata('error', 'Maximum you can add 30 files!');
            redirect('wedding-photo');
        }

        if (!empty($filesCount)) {
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['images']['name']     = $files['images']['name'][$i];
                $_FILES['images']['type']     = $files['images']['type'][$i];
                $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
                $_FILES['images']['error']    = $files['images']['error'][$i];
                $_FILES['images']['size']     = $files['images']['size'][$i];
                $config['upload_path']   = 'e-invite/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_width']     = 0;
                $config['encrypt_name']  = TRUE;
                $config['max_size'] = '2048';
                $this->upload->initialize($config);
                 if (!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
                 if (!$this->upload->do_upload('images')) {
                    $error =  $this->upload->display_errors();
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('wedding-photo?eid='.$eid);
                    } else {
                        $upload_data = $this->upload->data();
                        $file_name = $upload_data['file_name'];
                        $image = 'e-invite/'.$file_name;

                        $insert = array(
                            'image' =>$image , 
                            'user_id' =>$this->id , 
                        );
                        $output = $this->m_invite->insertGallery($insert,$eid);
                        $watermark = $this->watermark($upload_data,$file_name);
        } } } 

            if (!empty($output)) {
                $this->session->set_flashdata('success', 'Gallery updated successfully');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, please try agin later!');
            }
            redirect('wedding-information?eid='.$eid,'refresh');

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

    public function galDelete($id='')
    {
        $eid = $this->input->get('eid');
       if($this->db->where('id', $id )->delete('e_invitegallery'))
       {
            $data = $this->m_invite->getGlarys($eid);
            echo json_encode($data);
       }else{
        echo false;
       }
    }


    public function wedding_information()
    {
        $eid = $this->input->get('eid');
        $data['title']  = 'ShaadiBaraati | Wedding Information';
        $data['result'] = $this->m_invite->getusers($eid);
        $this->load->view('einvite/wedding-information',$data);
    }

    public function rsvpInsert($value='')
    {

        $insert = array(
                'brsvp_name'    => $this->input->post('bname'), 
                'brsvprel'      => $this->input->post('brelation'), 
                'brsvp_phone'   => $this->input->post('bnumber'), 
                'grsvp_name'    => $this->input->post('gname'), 
                'grsvprel'      => $this->input->post('grelation'),
                'grsvp_phone'   => $this->input->post('gnumber'),
                'user_id'       => $this->session->userdata('shdid'), 
                'status'        => '1',
            );

        $eid = $this->input->post('eid');

            $data['result'] = $this->m_invite->gmUpdate($insert,$eid);
            if (!empty($data)) {
                $this->session->set_flashdata('success', 'RSVP details updated successfully');
            }else{
                $this->session->set_flashdata('error', 'Something went wrong, please try agin later!');
            }

            redirect('my-website','refresh');
    }

    public function myWebsite($value='')
    {
        $site = $this->input->get('site');
        if (!empty($site)) {
            $site = base64_decode($site);
            $site = urldecode($site);
            $output = $this->m_invite->myWebsite($site);
            $output->gallery  =   $this->m_invite->getGallery($site);
            $output->event    =   $this->m_invite->getEvent($site);
            $output->family   =   $this->m_invite->getFam($site);
            $data['result']   = $output;

         switch ($output->theme) {
            case 'mehindi1':
                $view = 'einvite/template/mehendi1';
                break;
            case 'mehindi2':
                $view = 'einvite/template/mehendi2';
                break;
            case 'rec1':
                $view = 'einvite/template/reception1';
                break;
            case 'rec2':
                $view = 'einvite/template/reception2';
                break;
            case 'eng1':
                $view = 'einvite/template/engagement1';
                break;
            case 'eng2':
                $view = 'einvite/template/engagement2';
                break;
            case 'wed1':
                $view = 'einvite/template/wedding1';
                break;
            case 'wed2':
                $view = 'einvite/template/wedding2';
                break;
            default:
                $view = '';
                break;
            }
            $this->load->view($view,$data);
        }else{
            $data['title']  = 'ShaadiBaraati | My website';
            $data['result'] = $this->m_invite->getWebsite($this->id);
            $this->load->view('einvite/my-website',$data);
        }
    }


    public function preview($value='')
    {
        $data['title'] = 'ShaadiBaraati';
        $item = $this->input->get('item');
        switch ($item) {
            case 'mehindi-1':
                $view = 'einvite/preview/meh1';
                break;
            case 'mehindi-2':
                $view = 'einvite/preview/meh2';
                break;
            case 'reception-1':
                $view = 'einvite/preview/rec1';
                break;
            case 'reception-2':
                $view = 'einvite/preview/rec2';
                break;
            case 'engagement-1':
                $view = 'einvite/preview/eng1';
                break;
            case 'engagement-2':
                $view = 'einvite/preview/eng2';
                break;
            case 'wedding-1':
                $view = 'einvite/preview/wed1';
                break;
            case 'wedding-2':
                $view = 'einvite/preview/wed2';
                break;
            default:
                $view = '';
                break;
            }
        $this->load->view($view,$data);
       
    }

    public function changeStatus($value='')
    {
        $id = $this->input->post('gal_id');
        $output = $this->db->where('id', $id)->update('einvite',array('status' => '0'));
        echo $output;
    }




}


/* End of file Einvitet.php */
/* Location: ./application/controllers/Einvite.php */