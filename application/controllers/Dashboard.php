<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('filesModel','files');
        $this->load->model('usersModel','User');
         
    }
    public function dashboardView(){
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
    	if(isset($_SESSION['username']))
        {
            $user = $_SESSION['username'];
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            $data['title'] = "Document Tracking System - Dashboard";
            
            $this->load->view('include/headerNew',$data);
            if($_SESSION['username'] == "admin"){  
                $this->load->view('sidebarAdmin');
            }else{
                $this->load->view('sidebar');     
            } 
            $this->load->view('navbar'); 
            $this->load->view('insideDashboard');
            $this->load->view('include/footerNew');
        }
    }
}
?>