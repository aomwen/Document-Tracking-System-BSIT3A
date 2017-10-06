<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentStatus extends CI_Controller {

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
    
public function mydocuments_view(){
        $data['title'] = "Document Tracking System - Dashboard";
            $user = $this->session->userdata('username');
            //getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
			//end of getting userdata
            //getting document
            $condition = array();
            $documents = $this->Files->read($condition);
            $data['documents'] = $documents;
			//end of getting document
            $this->load->view('include/header',$data); 
            $this->load->view('profile_admin',$data);
            
            $this->load->view('mydocuments');           
    }
}
?>