<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');
class Api extends REST_Controller{
	
	function economy_post(){
		
		//Check we're actually getting a real post, and not just some crap. If type is here, let's assume the rest is.
		if($this->post('type') != 0 && $this->post('type') != 1){
	    	$this->response($this->post('type'), 400);
		}
		
// 		Determine if we're adding a income or expense post, and set the type variable to the corresponding value (1 = income, 0 = expense)
		$postType = $this->post('type');
		
		if($postType != 1 && $postType != 0){
// 			Someone has probably attempted to do something ugly with my incredibly beautifull interface :(
			$this->response($postType, 501);
			var_dump($postType);
		}else{
			$title = $this->post('title');
			$desc = $this->post('description');
			$money = $this->post('money');
			$date = $this->post('date');
			$receipt = $this->post('receipt'); 
			
			//Rearrange date since mysql wants it this way and the extension didn't want to change
			$date = str_replace("/", "-", $date);
			
			$money = str_replace(",", ".", $money);
			
			$result = $this->database_model->addEconomyPost($title, $desc, $postType, $money, $date, $receipt);
			if($result){
				$this->response($date, 200);
			}else{
				$this->response($response, 500);
			}
		}
	}
	
	function economy_get(){
		if(!$this->get('id')){
			$entries = $this->database_model->getAllEcoEntries();
			if(is_array($entries)){
				$this->response($entries, 200);
			}else{
				$this->response("No entries.", 404);
			}
		}else{
			$entry = $this->database_model->getEcoEntry($this->get('id'));
			if(is_array($entry)){
				$this->response($entry, 200);
			}else{
				$this->response($entry, 404);
			}
		}
	}
	
	
}
?>