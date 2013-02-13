<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	function index(){
		$data = array(
					'title' => "KBK - Inställningar",
					'mainContent' => "settings_view.php",
					'description' => "En sida",
					'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
	
	
}

