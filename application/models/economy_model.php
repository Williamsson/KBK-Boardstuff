<?php
class Economy_model extends CI_Model{
	
	function getYears(){
		$temp = array();
		$query = $this->db->get('economic_alterations');
	
		foreach ($query->result() as $row){
			$year = explode("-", $row->date);
			
			if(!in_array($year[0], $temp)){
				$temp[] =  $year[0];
			}
		}
		return $temp;
		
	}
}
?>