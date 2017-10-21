<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentInbox extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('filesModel','files');
        $this->load->model('usersModel','User');
        $this->load->model('forwardRouteModel','Route');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }

    public function viewInbox(){
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
        
        $condition = array('receiver' => $user);
        $documents = $this->Route->read($condition);
        $data['documents']=$documents;
        
        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        $this->load->view('navbar'); 
        $this->load->view('viewInboxDoc');
        $this->load->view('include/footerNew');

    }

    public function viewMessage($routeId){
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);

        $data['fileCode'] = $fileCode;
        date_default_timezone_set('Asia/Manila');

        $data['title'] = "Document Tracking System - Dashboard";
        
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        
        $condition = array('routeId' => $routeId);
        $documents = $this->Route->read($condition);
        $data['documents']=$documents;
        $data['userdata'] = $userdata;

        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        $this->load->view('navbar'); 
        $this->load->view('viewInboxMess');
        $this->load->view('include/footerNew');
        
    }
}
?>