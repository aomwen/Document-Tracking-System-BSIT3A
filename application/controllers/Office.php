<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usersModel','User');
        $this->load->model('departmentsModel','Departments');
        $this->load->model('collegesModel','Colleges');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }

    public function viewOffice()
    {
        $condition = null;
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;
    
        $data['title'] = "Document Tracking System - Dashboard";
    
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $this->load->view('include/header',$data);
        if($_SESSION['username'] == "admin"){    
        $this->load->view('profileAdmin');
        }else{
            $this->load->view('profile');
        }
        $this->load->view('offices'); 
    }

    public function officeContent($collegeId){
        $data['title'] = "Document Tracking System - Dashboard";
    
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
    
        $condition = array('collegeId' => $collegeId);
        $departments = $this->Departments->read($condition);
        $data['departments'] = $departments;

        $condition = array('collegeId' => $collegeId);
        $colleges = $this->Colleges->read($condition);
        $data['colleges']=$colleges;

        $this->load->view('include/header',$data); 
        if($_SESSION['username'] == "admin"){    
        $this->load->view('profileAdmin');
        }else{
            $this->load->view('profile');
        }
        $this->load->view('officesContent');
    }
}
?>