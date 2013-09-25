<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	function index(){
		if(!$this->safety_model->isLoggedIn()){
			redirect('page');
		}
		
		$data = array(
					'title' => "KBK - Inställningar",
					'mainContent' => "settings_view.php",
					'description' => "En sida",
					'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
	
	
}

