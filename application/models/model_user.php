<?php

class Model_User extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->database();
	}
	
	public function get_all_user(){
		return $this->db->get('user')->result_array();
	}
	
	public function get_all_admin(){
		$myArr = array('user_status' => 1);
		$this->db->where($myArr);
		return $this->db->get('user')->result_array();
	}
	
	public function get_admin($username){
		$this->db->where('user_username', $username);
		return $this->db->get('user')->result_array();
	}
	
	public function is_admin($username){
		$isAdmin = FALSE;
		
		$allAdmin = $this->get_all_admin();
		
		for ($i = 0; $i < count($allAdmin); $i++){
			if ($allAdmin[$i]['user_username'] == $username){
				$isAdmin = TRUE;
			}
		}
		
		return $isAdmin;
	}
	
	public function is_username_taken($username){
		$isTaken = TRUE;
		
		$allAdmin = $this->get_all_admin();
		
		for ($i = 0; $i < count($allAdmin); $i++){
			if ($allAdmin[$i]['user_username'] == $username){
				$isTaken = FALSE;
			}
		}
		
		return $isTaken;
	}
	
	public function insert_admin($username, $password, $role){
        $myArr = array(
        	'user_username' => $username,
        	'user_password' => $password,
        	'user_status' => 1,
        	'user_role' => $role
        );
        
        $this->db->insert('user', $myArr);
        
        return $this->db->affected_rows();
	}
	
	public function update_admin($username, $password, $role){
        $myArr = array(
        	'user_password' => $password,
        	'user_status' => 1,
        	'user_role' => $role
        );
        
        $this->db->where('user_username', $username);
        $this->db->update('user', $myArr);
        
        return $this->db->affected_rows();
	}
	
	public function delete_admin($username){
        $myArr = array(
        	'user_status' => 0
        );
        
        $this->db->where('user_username', $username);
        $this->db->update('user', $myArr);
        
        return $this->db->affected_rows();
	}
}

?>