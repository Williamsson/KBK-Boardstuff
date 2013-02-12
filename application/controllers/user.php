<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	function index(){
		$data = array(
					'title' => "KBK - Användare",
					'description' => "En sida",
					'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
	
	function login(){
	}
	
	function logout(){
		redirect('page');
	}
	
}

