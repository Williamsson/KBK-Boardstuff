<?php 
class Safety_model extends CI_Model{
	
	function isLoggedIn(){
		$userId = $this->session->userdata('userId');
		
		if($userId){
			$this->db->select('logged_in');
			$this->db->where('user_id', $userId);
			$query = $this->db->get('user_state');
				
			if($query->num_rows() > 0){
				$row = $query->row();
				 
				if($row->logged_in == 1){
					return true;
				}else{
					return false;
				}
				 
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function mysql_prep($unsafe){
		$safe = mysql_real_escape(trim($unsafe));
		return $safe;
	}
	
}

?>