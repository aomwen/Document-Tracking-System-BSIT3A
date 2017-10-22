<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usersModel','User');
        $this->load->model('departmentsModel','Departments');
        $this->load->model('collegesModel','Colleges');
        $this->load->model('filesModel','files');
        $this->load->model('statusModel','Status');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }

    public function viewOffice()
    {
         do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
        $condition = null;
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;
    
        $data['title'] = "Document Tracking System - Dashboard";
    
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $data['status']=$this->Status->read(null);
        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        
        $this->load->view('navbar'); 
        $this->load->view('offices');
        $this->load->view('include/footerNew');
    }

    public function officeContent($collegeId){
        
         do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
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
        $data['status']=$this->Status->read(null);
        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        $this->load->view('navbar'); 
        $this->load->view('officesContent');
        $this->load->view('include/footerNew');
    }
}
?>