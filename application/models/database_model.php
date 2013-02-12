<?php 
class Database_model extends CI_Model{
	
	function addEconomyPost($title, $desc, $type, $sum, $date, $receipt){
		$title = $this->safety_model->mysql_prep($title);
		$desc = $this->safety_model->mysql_prep($desc);
		$sum = $this->safety_model->mysql_prep($sum);
		$date = $this->safety_model->mysql_prep($date);
		$receipt = $this->safety_model->mysql_prep($receipt);
		
		$data = array(
			'title' => $title,
			'description' => $desc,
			'sum_money' => $sum,
			'date' => $date,
			'receipt' => $receipt,
			'accountant_approved' => 0,
		);
		
		$this->db->insert('mytable', $data);
		
	}
	
}
?>