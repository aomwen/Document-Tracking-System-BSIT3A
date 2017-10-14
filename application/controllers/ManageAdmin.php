<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageAdmin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('documentsModel','Files');
        $this->load->model('usersModel','User');
        $this->load->model('positionsModel','Positions');
        $this->load->model('departmentsModel','Dept');
        $this->load->model('collegesModel','Colleges');
        $this->load->model('registrarDocumentsModel','regDoc');
        $this->load->model('contactUsModel','contact');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }

    public function viewDocuments(){
        do{
            $tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
            $condition = array('regTrackcode'=>$tracknumber);
            $rs = $this->regDoc->read($condition);
        }while($rs);
        $data['tracknumber'] = $tracknumber;   
        $documents_status = array();
        $condition = null;
        $documents_status = $this->regDoc->read($condition);
        $data['documents_status'] = $documents_status;
        $user = $this->session->userdata('username');
        //getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata; 
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data); 
        
            $this->load->view('profileAdmin',$data);
        
        $this->load->view('registrarDocuments', $data);
    }
    public function addRegDoc(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $trackcode = $_POST['trackcode'];
            $file_type = $_POST['file_type'];
            $date_released = $_POST['date_released'];
            $date_admitted = $_POST['date_admitted'];
            $status = $_POST['status'];
            $record = array('regTrackcode'=>$trackcode,
                            'docType'=>$file_type,
                            'dateAdmitted'=> $date_admitted,
                            'dateReleased'=>$date_released,
                            'status'=>$status);
        
            $last_id = $this->regDoc->create($record);
        }
        redirect(base_url(). 'ManageAdmin/viewDocuments');
    }
    public function registrarUpdate($trackcode,$status){
   
        $status = str_replace('%20',' ',$status);
        if($status=="Received"){
            $status = array('status'=>$status,
            'dateReleased'=> date("Y-m-d"));
        }else{
        $status = array('status'=>$status);
        }
        $trackcode = array('regTrackcode' => $trackcode);
        $this->regDoc->update($status,$trackcode);
        redirect(base_url().'ManageAdmin/viewDocuments');
    }




    
    public function viewUsers()
    {

        $condition = null;
        $condition = array('username' => $_SESSION['username']);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = null;
        $userdata = $this->User->read($condition);
        $data['userList'] = $userdata;

        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('profileAdmin');
        $this->load->view('ViewUsers');
    }

    public function addUser()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            do{
                $idnum = rand(0,999);
                $condition = array('idno'=>$idnum);
                $rs = $this->regDoc->read($condition);
            }while($rs);
            $idno = $idnum;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname  = $_POST['firstname'];
            $lastname  = $_POST['lastname'];
            $email  = $_POST['email'];
            $collegeId  = $_POST['collegeId'];
            $department  = $_POST['department'];
            $position  = $_POST['position'];
            $record = array('username' => $username,
                            'password'=>$password,
                            'firstname'=>$firstname,
                            'lastname'=>$lastname,
                            'email'=>$email,
                            'collegeId'=>$collegeId,
                            'department'=>$department,
                            'position'=>$position,);
            $this->User->create($record);
       }
        $positions = array();
        $condition = null;
        $positions = $this->Positions->read($condition);
        $data['positions']=$positions;

        $condition = null;
        $departments = $this->Dept->read($condition);
        $data['departments'] = $departments;
        
        $condition = null;
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('profileAdmin');
        $this->load->view('newUser');
            
    }
    public function editUser($username){
            //getting colleges
            $condition = null;
            $colleges = $this->Colleges->read($condition);
            $data['colleges'] = $colleges;
            //end of getting colleges
            //getting departments
            $condition = null;
            $departments = $this->Dept->read($condition);
            $data['departments'] = $departments;
            //end of getting departments
            //getting positions
            $condition = null;
            $positions = $this->Positions->read($condition);
            $data['positions'] = $positions;
            //end of getting positions
            $user = $username;
            //getting userdata1
            $condition = array('username' => $_SESSION['username']);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            //end of getting userdata1
            //getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userList'] = $userdata;
            $_SESSION['userList']=$username;
            //end of getting userdata
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);      
        $this->load->view('profileAdmin');
        $this->load->view('editUser');
    }
    public function updateUser(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $firstname  = $_POST['firstname'];
                $lastname  = $_POST['lastname'];
                $email  = $_POST['email'];
                $collegeId  = $_POST['collegeId'];
                $department  = $_POST['department'];
                $position  = $_POST['position'];
                $condition = array('username' => $_SESSION['userList']);
                $record = array('username' => $username,
                                'password'=>$password,
                                'firstname'=>$firstname,
                                'lastname'=>$lastname,
                                'email'=>$email,
                                'collegeId'=>$collegeId,
                                'department'=>$department,
                                'position'=>$position,);
                $this->User->update($record,$condition);
                redirect(base_url().'ManageAdmin/viewUsers');
        }
    }

    public function removeUser($username){
        $this->User->deleteUser($username);
        redirect(base_url().'ManageAdmin/viewUsers');
    }

    // MESSAGES TO ADMIN
    public function viewmsgtoAdmin()
    {

        $condition = null ;
        $messages = $this->contact->read($condition);
        $data['messages'] = $messages;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $this->load->view('include/header',$data);
        $this->load->view('profileAdmin');
        $this->load->view('viewMsgToAdmin');
    }

        public function seenmsgtoAdmin($idno,$seen){
            if($seen == FALSE){
                $dateseen = date("Y-m-d h:i:sa");
                $record = array('dateseen'=>$dateseen,
                                'seen'=>TRUE);
                if($this->contact->update($idno,$record)){
                }else{
                    $error = "Error!!!";
                    $data['error']=$error;
                    redirect(base_url().'ManageAdmin/viewmsgtoAdmin');
                }
            }

            $condition = array('idno'=>$idno) ;
            $messages = $this->contact->read($condition);
        
            $data['messages'] = $messages;

            $user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;

            $success = "Account successfully created!";
            $data['success']=$success;
            $this->load->view('include/header');
            $this->load->view('profileAdmin',$data);
            $this->load->view('seenMsgToAdmin',$data);
            
        }
}?>