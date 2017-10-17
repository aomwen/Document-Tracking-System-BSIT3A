<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentStatus extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('filesModel','files');
        $this->load->model('documentsModel','Files');
        $this->load->model('usersModel','User');
        $this->load->model('departmentsModel','Dept');
        $this->load->model('collegesModel','Colleges');
        $this->load->model('forwardRouteModel','Route');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
  
    public function viewDocuments()
    {
        $data['title'] = "Document Tracking System - Dashboard";
 
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
 
        $condition = array();
        $documents = $this->files->read($condition);
        $data['documents'] = $documents;

        $condition = null; 
        $Flag = $this->Files->countFlag($condition);
        $data['Flag'] = $Flag;

        $condition = null;
        $departments = $this->Dept->read($condition);
        $data['departments'] = $departments;
        
        $condition = null;
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;

        $condition = null;
        $user = $this->User->read($condition);
        $data['user'] = $user;

        $this->load->view('include/header',$data); 
        if($_SESSION['username'] == "admin")
        {    
            $this->load->view('profileAdmin',$data);
        }else
        {
          $this->load->view('profile',$data);
        }
        $this->load->view('docStatus');           
    }

    public function mydocumentsRoute($fileCode)
    {
        $data['title'] = "Document Tracking System - Dashboard";
 
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = array('fileCode' => $fileCode);
        $documents = $this->Route->read($condition);
        $data['documents'] = $documents;
 
        $this->load->view('include/header',$data); 
        if($_SESSION['username'] == "admin")
        {    
            $this->load->view('profileAdmin',$data);
        }else
        {
          $this->load->view('profile',$data);
        }
        $this->load->view('mydocumentsRoute');           
    }    
}
?>