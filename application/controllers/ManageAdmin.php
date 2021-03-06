<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageAdmin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('usersModel','User');
        $this->load->model('positionsModel','Positions');
        $this->load->model('departmentsModel','Dept');
        $this->load->model('collegesModel','Colleges');
        $this->load->model('registrarDocumentsModel','regDoc');
        $this->load->model('contactUsModel','contact');
        $this->load->model('registrarDocTypeModel','documentType');
        $this->load->model('filesModel','files');
        $this->load->model('rolesModel','Roles');
        $this->load->model('forwardRouteModel','Route');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
    //REGISTRAR DOCUMENT TRACKING
    public function viewDocuments(){
        $tracknumber=null;
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
      
        $documentTypes = array();
        $condition = null;
        $documentTypes = $this->documentType->read($condition);
        $data['documentTypes'] = $documentTypes;

        $documents_status = array();
        $condition = null;
        $documents_status = $this->regDoc->read($condition);
        $data['documents_status'] = $documents_status;
        
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);

        $data['userdata'] = $userdata; 
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/headerNew',$data);
        $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('registrarDocuments');
        $this->load->view('include/footerNew');    
    }
    public function getTrackCode($typeId_num){
        date_default_timezone_set('Asia/Manila');
         $year=date("Y");
         $typeId='';
         if($typeId_num<10){
            $typeId='0'.$typeId_num;
        }else{
            $typeId=$typeId_num;
        }
       
           
        
        $lastId=array('typeId'=>$typeId_num);
        $regDoc_arr=$this->regDoc->getLastId($lastId);
        $regDocId_num='';
        if($regDoc_arr!=null){
            $regDocId=$regDoc_arr['idno'];
            $regDocId_num = substr($regDocId,-4);
            $regDocId_num++;
            if($regDocId_num<10){
                    $new_num='000'.$regDocId_num;
                }elseif($regDocId_num<100&&$regDocId_num>9){
                    $new_num='00'.$regDocId_num;
                }elseif($regDocId_num<1000&&$regDocId_num>99){
                    $new_num='0'.$regDocId_num;
                }else{
                    $new_num=''.$regDocId_num;
                }
            $regDocId_num=$new_num;    
        }else{
            $regDocId_num='0001';
        }
      echo '<input type="text" value="'.$year.'-'.$typeId.'-'.$regDocId_num.'" name="trackcode" id="trackcode" class="form-control" readonly>';

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

    public function addDocumentType(){
         if($_SERVER['REQUEST_METHOD']=='POST'){
            $docType = $_POST['docType'];
            $record = array('docType'=>$docType,);
        
            $last_id = $this->documentType->create($record);
        }
    }

    public function updateDocType(){
         if($_SERVER['REQUEST_METHOD']=='POST'){
         
        $oldDocType = $_POST['typeId'];
        $newDocType = $_POST['docType'];
        $this->documentType->update($oldDocType,$newDocType);
        }
    }
    //END OF REGISTRAR DOCUMENT TRACKING CONTROLLER.


    public function viewUsers()
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
        $condition = array('username' => $_SESSION['username']);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = null;
        $userdata = $this->User->read($condition);
        $data['userList'] = $userdata;
        $data['colleges'] = $this->Colleges->getCollegeId();
        $data['roles'] = $this->Roles->read();

        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/headerNew',$data);
        $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('viewUsers');     
        $this->load->view('include/footerNew'); 
    }

    public function addUser()
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
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            do{
                $idnum = rand(0,999);
                $condition = array('idno'=>$idnum);
                $rs = $this->regDoc->read($condition);
            }while($rs);

            $idno = $idnum;
            $username = $_POST['username'];
            $password =  "12345";
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
            redirect(base_url().'ManageAdmin/viewUsers');

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
        $this->load->view('include/headerNew',$data);
        $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('newUser');     
        $this->load->view('include/footerNew'); 
            
    }
    public function editUser($username){
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
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
            //getting positions
            $condition = null;
            $roles = $this->Roles->read($condition);
            $data['roles'] = $roles;
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
        $this->load->view('include/headerNew',$data);
        $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('editUser');     
        $this->load->view('include/footerNew'); 
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
                $this->User->update($condition,$record);
                redirect(base_url().'ManageAdmin/viewUsers');
        }
    }
    public function deactivateUser($username){               
        $condition=array('username'=>$username);
        $record=array('active'=>0);
        $this->User->update($condition,$record);
        redirect(base_url().'ManageAdmin/viewUsers');
        
    }
    public function activateUser($username){
         
        $condition=array('username'=>$username);
        $record=array('active'=>1);
        $this->User->update($condition,$record);
        redirect(base_url().'ManageAdmin/viewUsers');

    }

    // MESSAGES TO ADMIN
    public function viewmsgtoAdmin()
    {
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
        $condition = null ;
        $messages = $this->contact->read($condition);
        $data['messages'] = $messages;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $this->load->view('include/headerNew',$data);
        $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('viewMsgToAdmin');    
        $this->load->view('include/footerNew');   
    }

    public function seenmsgtoAdmin($idno,$seen){
        do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
        if($seen == FALSE){
            $dateseen = date("Y-m-d h:i:s a");
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
        public function removemsgtoAdmin($idno){
             $record = array('idno'=>$idno);   
             $this->contact->remove($record);
             redirect(base_url().'ManageAdmin/viewmsgtoAdmin');
        }

        public function bookmarkmsgtoAdmin($idno){
             $record = array('bookmarked'=>TRUE);   
             $this->contact->update($idno,$record);
             redirect(base_url().'ManageAdmin/viewmsgtoAdmin');
        }
        public function unbookmarkmsgtoAdmin($idno){
             $record = array('bookmarked'=>FALSE);   
             $this->contact->update($idno,$record);
             redirect(base_url().'ManageAdmin/viewmsgtoAdmin');
        }

        public function manageProfile(){
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
            $this->load->view('include/header',$data);
            $this->load->view('manageProfile');
        } 
    public function addPosition(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $position=$_POST['position'];
            $record=array(
                        'position'=>$position
                );
            $duplicate=$this->Positions->check_duplicate($record);
            if($duplicate){
                echo '<script type="text/javascript"> alert("Position already Exists"); </script>';   
            }else{
                $this->Positions->create($record);
            } 
        }
    }
    public function addRole(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $role=$_POST['role'];
            $record=array('role'=>$role);
            $duplicate=$this->Roles->check_duplicate($record);
            if($duplicate){
                echo '<script type="text/javascript"> alert("Role already Exists"); </script>';   
            }else{
                $this->Roles->create($record);
            } 
        }
    }
}?>