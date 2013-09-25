<?php 
class User_model extends CI_Model{
	
	function login($username, $password){
		
		$this->db->select('username, password, id');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('users');
		
		if($query->num_rows > 0){
			$usernameDB = $query->row()->username;
			$passwordDB = $query->row()->password;
			$userId = $query->row()->id;
			
			if($usernameDB == $username && $passwordDB = $password){
				$this->session->set_userdata('userId', $userId);
			}
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
	}
	
	function isLoggedIn(){
		
	}
}
?>