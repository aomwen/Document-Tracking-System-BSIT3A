<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentInbox extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('filesModel','files');
        $this->load->model('documentsModel','Files');
        $this->load->model('usersModel','User');
        $this->load->model('forwardRouteModel','Route');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }

    public function viewInbox(){
        $data['title'] = "Document Tracking System - Dashboard";
        
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        
        $condition = null;
        $documents = $this->Route->read($condition);
        $data['documents']=$documents;
        $data['userdata'] = $userdata;
        
        $this->load->view('include/header',$data);  
        if($_SESSION['username'] == "admin")
        {    
            $this->load->view('profileAdmin');
        }else
        {
            $this->load->view('profile');
        }
        $this->load->view('viewInboxDoc');
    }

    public function viewMessage($routeId){
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

        $this->load->view('include/header',$data);  
        if($_SESSION['username'] == "admin")
        {    
            $this->load->view('profileAdmin');
        }else
        {
            $this->load->view('profile');
        }
        $this->load->view('viewInboxMess');
        
    }

    public function removeInboxMess($trackcode){
        $condition = Array('trackcode' => $trackcode);
        $data = array('inboxDelete' => TRUE);
        $this->Files->deleteToInbox($data,$condition);
        echo '<script language="javascript">';
        echo 'alert("Successfully removed")';
        echo '</script>';
        redirect(base_url('DocumentInbox/viewInbox'));
    }
}
?>