<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentStatus extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('filesModel','files');
        $this->load->model('usersModel','User');
        $this->load->model('departmentsModel','Dept');
        $this->load->model('collegesModel','Colleges');
        $this->load->model('statusModel','Status');
        $this->load->model('forwardRouteModel','Route');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
  
    public function viewDocuments()
    {
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

        $condition = null;
        $user = $this->User->read($condition);
        $data['user'] = $user;

        $data['title'] = "Document Tracking System - Dashboard";
 
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        
        $condition=null;
        $status = $this->Status->read($condition);
        $data['status'] = $status;

        $condition = array('fileAuthor' => $_SESSION['username']);
        $documents = $this->files->read($condition);
        $data['documents'] = $documents;

         $this->load->view('include/headerNew',$data);
            if($_SESSION['username'] == "admin"){  
                $this->load->view('sidebarAdmin');
            }else{
                $this->load->view('sidebar');     
            } 
        $this->load->view('navbar'); 
        $this->load->view('documentStatus');
        $this->load->view('include/footerNew');         
    }

    public function mydocumentsRoute($fileCodeRoute)
    {
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
        $data['title'] = "Document Tracking System - Dashboard";
 
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = array('fileCode' => $fileCodeRoute);
        $documents = $this->Route->read($condition);
        $data['documents'] = $documents;
        $data['status']=$this->Status->read(null);
        $this->load->view('include/headerNew',$data);
            if($_SESSION['username'] == "admin"){  
                $this->load->view('sidebarAdmin');
            }else{
                $this->load->view('sidebar');     
            } 
        $this->load->view('navbar'); 
        $this->load->view('documentRoute');
        $this->load->view('include/footerNew');              
    }
    public function addStatus(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $filestatus=$_POST['status'];
            $record=array(
                        'filestatus'=>$filestatus
                );
            $duplicate=$this->Status->check_duplicate($record);
            if($duplicate){
                echo '<script type="text/javascript"> alert("Position already Exists"); </script>';   
            }else{
                $this->Status->create($record);
            } 
        }
        redirect('DocumentStatus/viewDocuments','refresh');

    }

}
?>