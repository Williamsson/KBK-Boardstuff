<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	function index(){
		if(!$this->safety_model->isLoggedIn()){
			redirect('page');
		}
		
		$data = array(
					'title' => "KBK - Användare",
					'description' => "En sida",
					'keyword' => "nycklar",
					);
		$this->load->view('template.php', $data);
	}
	
	function login(){
		if($this->input->post('username')){
			$username = $this->input->post('username');
			$password = hash('sha1', $this->input->post('password'));
			
			$this->user_model->login($username, $password);
		}
		redirect('');
		
	}
	
	function logout(){
		$this->user_model->logout();
		redirect('page');
	}
	
}

