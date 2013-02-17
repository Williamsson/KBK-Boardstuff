<?php 
class Database_model extends CI_Model{
	
	function addEconomyPost($title, $desc, $postType, $money, $date, $receipt){
		$title = $this->safety_model->mysql_prep($title);
		$desc = $this->safety_model->mysql_prep($desc);
		$money = $this->safety_model->mysql_prep($money);
		$date = $this->safety_model->mysql_prep($date);
		$receipt = $this->safety_model->mysql_prep($receipt);
		$postType = $this->safety_model->mysql_prep($postType);
		
			$data = array(
				'type' => $postType,
				'title' => $title,
				'description' => $desc,
				'money' => $money,
				'date' => $date,
				'receipt' => $receipt,
				'accountant_approved' => 2,
			);
			
			$result = $this->db->insert('economic_alterations', $data);
			if($result){
				return true;
			}else{
				return mysql_error();
			}
	}
	
	function getEcoEntry($resource){
		$query = $this->db->get_where('economic_alterations', array('id' => $resource));

		if($query->num_rows() > 0){
			$result = array();
			foreach($query->result() as $row){
				$result['id'] = $row->id;
				$result['title'] = $row->title;
				$result['desc'] = $row->description;
				$result['money'] = $row->money;
				$result['type'] = $row->type;
				$result['date'] = $row->date;
				$result['receipt'] = $row->receipt;
				$result['accountant_approved'] = $row->accountant_approved;
				$result['remaining_money'] = $row->remaining_money;
			}
			return $result;
		}else{
			return "No such entry.";
		}
	}
	
	function getAllEcoEntries(){
		$this->db->order_by('date','desc');
		$this->db->order_by('id','desc');
		$query = $this->db->get('economic_alterations');
		
		if($query->num_rows() > 0){
			$result = array();
			$i = 0;
			foreach($query->result() as $row){
				$temp['id'] = $row->id;
				$temp['title'] = $row->title;
				$temp['desc'] = $row->description;
				$temp['money'] = $row->money;
				$temp['type'] = $row->type;
				$temp['date'] = $row->date;
				$temp['receipt'] = $row->receipt;
				$temp['accountant_approved'] = $row->accountant_approved;
				
				$result[$i] = $temp;
				++$i;
			}
			return $result;
		}
	}
	
	
}
?>