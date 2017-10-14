<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class Dts extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
		}
		
		public function index(){	
			$data['title'] = "Document Tracking System - Dashboard";
			$this->load->view('include/header',$data);
			$this->load->view('dashboard');
		}
	}

?>