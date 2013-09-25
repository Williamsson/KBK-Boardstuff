<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Economy extends CI_Controller {
	
	function index(){
		if(!$this->safety_model->isLoggedIn()){
			redirect('page');
		}
		$this->load->model('economy_model');
		$data = array(
					'title' => "KBK - Ekonomisk översikt",
					'mainContent' => "economy_view.php",
					'description' => "En sida",
					'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
}

?>