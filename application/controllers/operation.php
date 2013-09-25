<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operation extends CI_Controller {
	
	function index(){
		if(!$this->safety_model->isLoggedIn()){
			redirect('page');
		}
		
		$data = array(
					'title' => "KBK - Verksamhetsplan",
					'mainContent' => "operation_view.php",
					'description' => "En sida",
					'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
	
	
}

