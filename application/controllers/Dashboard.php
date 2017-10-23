<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('filesModel','files');
        $this->load->model('usersModel','User');
        $this->load->model('forwardRouteModel','Route');
         if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
    public function dashboardView(){
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;

        do
        {
            $routeId = rand(0,9999);
            $condition = array('routeId'=>$routeId);
            $rs = $this->Route->read($condition);
        }while($rs);
        $data['routeId'] = $routeId;
    	if(isset($_SESSION['username']))
        {
            $user = $_SESSION['username'];
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            $data['title'] = "Document Tracking System - Dashboard";

            $condition = array('fileAuthor' => $_SESSION['username']);
            $documents = $this->files->read($condition);
            $data['documents'] = $documents;
            
            $this->load->view('include/headerNew',$data);
            if($_SESSION['username'] == "admin"){  
                $this->load->view('sidebarAdmin');
                $this->load->view('navbar');
                $this->load->view('insideDashboardAdmin');
            }else{
                $this->load->view('sidebar');
                $this->load->view('navbar'); 
                $this->load->view('insideDashboard');     
            } 
            $this->load->view('include/footerNew');
        }
    }
}
?>