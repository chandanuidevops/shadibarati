<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_google extends CI_Model {
    
    function __construct() {
        $this->tableName = 'user';
        $this->primaryKey = 'su_id';
    }
    
    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        
        $con = array(
            'su_email' => $data['su_email']
        );
        $this->db->where($con);
        $query = $this->db->get();
        $check = $query->num_rows();
        if($check > 0){
            // Get prev user data
            $result = $query->row_array();
            // Update user data
            $data['su_updated_date'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName, $data, array('su_id'=>$result['su_id']));
            // user id
            $userID = $result['su_id'];
        }else{
            // Insert user data
            $data['su_registered_date'] = date("Y-m-d H:i:s");
            $data['su_updated_date'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            
            // user id
            $userID = $this->db->insert_id();
        }

        // Return user id
        return $userID?$userID:false;
    }

}