<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dts extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->model('users_model');
		$this->load->model('news_model','News');
	}
	
	public function index(){	
		$news = array();
		
		$condition = null;
		
		$rs = $this->News->read($condition);

		foreach($rs as $r){
			$info = array(
						'ntitle' => $r['ntitle'],
						'ncontent' => $r['ncontent'],
						'nauthor' => $r['nauthor'],
						'ndatecreated' => $r['ndatecreated'],				
						);
			$news[] = $info;
		}
		
		$data['news'] = $news;
		
		$data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('include/footer');
	}

	public function log_in(){
		$this->form_validation->set_rules('Username', 'Username', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');
		if($this->form_validation->run()){
			$username = $this->input->post('Username');
			$password = $this->input->post('Password');
			$this->load->model('users_model');
			if($this->users_model->login($username,$password)){
				echo "3";
				$session_data = array(
					'username' => $username
				);
				$this->session->set_userdata($session_data);
				redirect(base_url(). 'DTS/session_check');
			}
		}
		$this->session->set_flashdata('error','Invalid Username and Password');
		redirect(base_url(). 'DTS/index');
	}
	public function session_check(){
		if($this->session->userdata('username')!=''){
			$data['title'] = "Document Tracking System - Dashboard";
				$this->load->view('include/header',$data);
				$this->load->view('loggedin_profile');
				$this->load->view('include/footer');
		}else{
			redirect(base_url(). 'DTS/index');
		}
	}

	public function session_checkout(){
		$this->session->unset_userdata('username');
		redirect(base_url(). 'DTS/index');
	}
}