<?php  

class M_facebook extends CI_Model {
    function __construct() {
        $this->tableName = 'user';
        $this->primaryKey = 'su_id';
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select($this->primaryKey);
            $this->db->from($this->tableName);
            $this->db->where(array('su_email'=>$userData['su_email']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
                //update user data
                $userData['su_registered_date'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('su_id' => $prevResult['su_id']));
                //get user ID
                $userID = $prevResult['su_id'];
            }else{
                //insert user data
                $userData['su_registered_date']  = date("Y-m-d H:i:s");
                $userData['su_updated_date'] = date("Y-m-d H:i:s");
             
                $insert = $this->db->insert($this->tableName, $userData);
                
                $userID = $this->db->insert_id();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
}