<?php 
class Database_model extends CI_Model{
	
	function addEconomyPost($title, $desc, $postType, $money, $date, $receipt){
		$title = $this->safety_model->mysql_prep($title);
		$desc = $this->safety_model->mysql_prep($desc);
		$money = $this->safety_model->mysql_prep($money);
		$date = $this->safety_model->mysql_prep($date);
		$receipt = $this->safety_model->mysql_prep($receipt);
		$postType = $this->safety_model->mysql_prep($postType);
		
		$query = $this->db->query("SELECT remaining_money FROM economic_alterations ORDER BY id DESC LIMIT 1");
		
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$remainingMoney = $row->remaining_money;
			}
		}else{
			$remainingMoney = 0;
		}
		
			if($postType == 1){
				$remainingMoney = $remainingMoney + $money;
			}else{
				$remainingMoney = $remainingMoney - $money;
			}
			
			$data = array(
				'type' => $postType,
				'title' => $title,
				'description' => $desc,
				'money' => $money,
				'date' => $date,
				'receipt' => $receipt,
				'accountant_approved' => 2,
				'remaining_money' => $remainingMoney,
			);
			
			$this->db->insert('economic_alterations', $data);
	}
	
	function getEcoEntry($resource){
		$query = $this->db->get_where('economic_alterations', array('id' => $resource));

		if($query->num_rows() > 0){
			$result = array();
			foreach($query->result() as $row){
				$result[] = $row->id;
				$result[] = $row->title;
				$result[] = $row->description;
				$result[] = $row->money;
				$result[] = $row->type;
				$result[] = $row->date;
				$result[] = $row->receipt;
				$result[] = $row->accountant_approved;
				$result[] = $row->remaining_money;
			}
			return $result;
		}else{
			return "No such entry.";
		}
	}
	
	function getAllEcoEntries(){
		$this->db->order_by('date','desc');
		$query = $this->db->get('economic_alterations');
		
		if($query->num_rows() > 0){
			$result = array();
			$i = 0;
			foreach($query->result() as $row){
				$temp = array();
				$temp[] = $row->id;
				$temp[] = $row->title;
				$temp[] = $row->description;
				$temp[] = $row->money;
				$temp[] = $row->type;
				$temp[] = $row->date;
				$temp[] = $row->receipt;
				$temp[] = $row->accountant_approved;
				$temp[] = $row->remaining_money;
				
				$result[$i] = $temp;
				++$i;
			}
			return $result;
		}
	}
	
	
}
?>