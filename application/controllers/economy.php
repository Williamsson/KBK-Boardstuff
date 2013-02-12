<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Economy extends CI_Controller {
	
	function index(){
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