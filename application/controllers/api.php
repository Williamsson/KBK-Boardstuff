<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');
class Api extends REST_Controller{
	
	function economy_post(){
		
		//Check we're actually getting a real post, and not just some crap. If type is here, let's assume the rest is.
		if(!$this->get('type')){
	    	$this->response(NULL, 400);  
		}
		
		//Determine if we're adding a income or expense post, and set the type variable to the corresponding value (1 = income, 0 = expense)
		$postType = $this->get('type');
		
		if($postType == "addIncome"){
			$type = 1;
		}elseif($postType == "addExpense"){
			$type = 0;
		}else{
			//Someone has probably attempted to do something ugly with my incredibly beautifull interface :(
			$this->response(NULL, 501);
		}
		
		$title = $this->get('title');
		$desc = $this->get('description');
		$sum = $this->get('sum');
		$date = $this->get('date');
		$receipt = $this->get('receipt'); 
		
		$this->database_model->addEconomyPost($title, $desc, $type, $sum, $date, $receipt);
		 
	}
	
	
}
?>