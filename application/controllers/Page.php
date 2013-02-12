<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	
	function index(){
		$data = array(
						'title' => "KBK",
						'mainContent' => "index_view.php",
						'description' => "En sida",
						'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
	
	
}

