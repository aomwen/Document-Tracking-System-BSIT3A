 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentSent extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('filesModel','files');
        $this->load->model('usersModel','User');
        $this->load->model('forwardRouteModel','Route');
        $this->load->model('statusModel','Status');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }    

    public function viewSent()
    {
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        do
        {
            $routeId = rand(0,9999);
            $condition = array('routeId'=>$routeId);
            $rs = $this->Route->read($condition);
        }while($rs);

        $data['routeId'] = $routeId;

        $data['fileCode'] = $fileCode;
        $condition = null;
        $documents = $this->Route->read($condition);
        $data['documents']=$documents;

        $data['title'] = "Document Tracking System - Dashboard";

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = array('sender' => $user);
        $documents = $this->Route->read($condition);
        $data['documents']=$documents;
        $data['status']=$this->Status->read(null);
        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        $this->load->view('navbar'); 
        $this->load->view('viewSentDoc');
        $this->load->view('include/footerNew');         
    }

    public function viewSentMess($routeId)
    {
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        do
        {
            $routeId = rand(0,9999);
            $condition = array('routeId'=>$routeId);
            $rs = $this->Route->read($condition);
        }while($rs);
        $data['routeId'] = $routeId;

        $data['fileCode'] = $fileCode;
        $data['title'] = "Document Tracking System - Dashboard";

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = null;
        $users = $this->User->read($condition);
        $data['users'] = $users;

        $condition = array('routeId' => $routeId);
        $documents = $this->Route->read($condition);
        $data['documents']=$documents;
        $data['userdata'] = $userdata;
        $data['status']=$this->Status->read(null);
        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        $this->load->view('navbar'); 
        $this->load->view('viewSentMess');
        $this->load->view('include/footerNew');         
    }
}?>