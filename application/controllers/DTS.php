<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dts extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('documents_model','Files');
        $this->load->model('users_model','User');
        $this->load->model('departments_model','Dept');
        $this->load->model('colleges_model','Coll');
        $this->load->model('documentstatus_model','Docstat');
        $this->load->model('contactus_model','msgAd');
    //LOADING OF MODEL AND HELPERS 
	}
	public function index(){	
		$data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header',$data);
		$this->load->view('newdashboard',$data);
	}


	// ADMIN ACCOUNTS - SETTINGS - DEPARTMENTS 
        //ADMIN ACCOUNTS - REGISTRAR DOCUMENTS

                //END OF ADMIN ACCOUNTS - REGISTRAR DOCUMENTS
	//ABBIEEEEEEE
	
	
	
	//END OF ABBIEEEEEE
    //OFFICES VIEW
    

    
}
?>