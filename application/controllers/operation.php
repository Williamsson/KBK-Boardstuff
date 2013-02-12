<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operation extends CI_Controller {
	
	function index(){
		$data = array(
					'title' => "KBK - Verksamhetsplan",
					'mainContent' => "operation_view.php",
					'description' => "En sida",
					'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
	
	
}

