<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {

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

	public function Office_view(){
        //getting colleges
        $condition = null;
        $colleges = $this->Coll->read($condition);
        $data['colleges'] = $colleges;
        //end of getting colleges
        $data['title'] = "Document Tracking System - Dashboard";
            $user = $this->session->userdata('username');
            //getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            //end of getting userdata
            $this->load->view('include/header',$data);
            if($_SESSION['username'] == "admin"){    
            $this->load->view('profile_admin',$data);
            }else{
                $this->load->view('profile',$data);
            }
            $this->load->view('offices',$data); 
    }

    public function office_content($college_acronym){
       $data['title'] = "Document Tracking System - Dashboard";
    //PROFILE DETAIL
        $user = $this->session->userdata('username');
        //getting userdata
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        //end of getting userdata
    //END OF PROFILE DETAIL
    //DEPARTMENT DETAILS
            $this->load->view('include/header',$data); 
            //getting departments
            $condition = array('college_acronym' => $college_acronym);
            $departments1 = $this->Dept->read1($condition);
            $data['departments'] = $departments;
            //end of getting departments
    //END OF DEPARTMENT DETAILS
    //COLLEGE DETAILS
            //getting colleges
            $condition = array('college_acronym' => $college_acronym);
            $colleges2 = $this->Coll->read2($condition);
            $data['colleges']=$colleges2;
    //END OF COLLEGE DETAILS
            //getting users
            $condition = array('college_acronym' => $college_acronym);
            $userdata = $this->User->read($condition);
            $data['userdata']=$userdata;
            if($_SESSION['username'] == "admin"){    
            $this->load->view('profile_admin',$data);
            }else{
                $this->load->view('profile',$data);
            }
            $this->load->view('offices_content',$data);
    }
}
?>