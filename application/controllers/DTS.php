<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dts extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('files_model','Files');
        $this->load->model('users_model','Users');
        $this->load->model('adminsettings_model','Dept');
        $this->load->model('registrardoc_model','Regdoc');
        $this->load->model('homeFunction_model','msgtoAdmin');
    //LOADING OF MODEL AND HELPERS 
	}
	
	public function index(){	
		$data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header',$data);
		$this->load->view('secondnewdashboard',$data);
	}

}
?>