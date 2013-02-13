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
	
	function mysql_prep($value){
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string"); // i.e. PHP >= v4.3.0
		if($new_enough_php) {
			// PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if($magic_quotes_active) {
				$value = stripslashes($value);
			}
			$value = mysql_real_escape_string($value);
		}else{ // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if(!$magic_quotes_active){
				$value = addslashes($value);
			}
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
}

?>