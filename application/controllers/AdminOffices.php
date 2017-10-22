<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminOffices extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('usersModel','User');
        $this->load->model('departmentsModel','Dept');
        $this->load->model('collegesModel','Colleges');
        $this->load->model('filesModel','files');
        $this->load->model('statusModel','Status');
        $data['status']=$this->Status->read(null);
        $this->load->model('forwardRouteModel','Route');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
        if($_SESSION['username']!="admin"){
            redirect().'Dashboard/dashboardView';
        }
    }
    
    // LIST OF FUNCTION
    // manageColleges - LOGIC[/] DESIGN[]
    // addColleges - LOGIC[/] DESIGN{}
    // updateCollege - LOGIC[/] DESIGN[/]


    public function manageColleges()
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
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $data['status']=$this->Status->read(null);
        
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/headerNew',$data);
        $this->load->view('sidebarAdmin');   
        $this->load->view('navbar'); 
        $this->load->view('manageColleges');
        $this->load->view('include/footerNew');
    } 

    public function addColleges()
    {
       do
        {
            $routeId = rand(0,9999);
            $condition = array('routeId'=>$routeId);
            $rs = $this->Route->read($condition);
        }while($rs);
        $data['routeId'] = $routeId;
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;

        if($_SERVER['REQUEST_METHOD']=='POST')
        {   $collegeId = $_POST['collegeId'];
            $collegefull = $_POST['collegefull'];
            $check_data = array('collegeId'=>$collegeId,
                                'collegefull'=>$collegefull
                );
            if(!$this->Colleges->check_duplicate($check_data)){
                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/college/";
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['max_size']     = '1000000kb';
                $config['overwrite'] = TRUE;
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->do_upload('collegeLogo');
                $name = $this->upload->data('file_name');
                $location = base_url().'uploads/college/'.$name.'';
                move_uploaded_file($name, $location);
                
                $collegeDesc = $_POST['collegeDesc'];
                $collegeDean  = $_POST['collegeDean'];
                $record = array('collegeId'=>$collegeId,
                                'collegefull'=>$collegefull,
                                'collegeDesc'=>$collegeDesc,
                                'collegeDean' => $collegeDean,
                                'collegeLogo'=>$location);
                $this->Colleges->create($record);
            }else{
                echo '<script type="text/javascript"> alert("College Already exist!");
                            </script>';
            }
        }

        $condition = null;
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $data['status']=$this->Status->read(null);
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/headerNew',$data); 
        $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('newColleges');
        $this->load->view('include/footerNew');
    }  

    public function updateCollege($collegeId)
    {
        if(isset($_SESSION['collegeId'])){
            unset($_SESSION['collegeId']);
        }
        $_SESSION['collegeId'] = $collegeId;
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

        $condition = array('collegeId' => $collegeId);
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $data['status']=$this->Status->read(null);
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/headerNew',$data);
         $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('editCollege');
        $this->load->view('include/footerNew');    }

    public function updateCollegeInfo(){
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $collegeId = $_POST['collegeId'];
            $collegefull = $_POST['collegefull'];
            $collegeDesc = $_POST['collegeDesc'];
            $collegeDean  = $_POST['collegeDean'];
            $ca = array('collegeId'=>$collegeId);
            $record = array('collegeId'=>$collegeId,
                            'collegefull'=>$collegefull,
                            'collegeDesc'=>$collegeDesc,
                            'collegeDean' => $collegeDean,
                            );
            $this->Colleges->update($record,$ca);
            redirect(base_url(). 'AdminOffices/manageColleges');
            echo '<script type="text/javascript"> alert("College has been Successfully Updated!");
                                         
                                </script>';
        }
    }   

     public function updateProfileImage($cid){
        if( $_SERVER['REQUEST_METHOD']=='POST'){ 
                
            $img_path='';
            if(isset($_FILES["newprofile"]["name"])){
                $config['upload_path'] = './uploads/college/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('newprofile')){
                    echo $this->upload->display_error();
                }else{
                    $data = $this->upload->data();
                    echo '<img class="img-responsive img-thumbnail"   src="'.base_url().'uploads/college/'.$data["file_name"].'" />';
                    $img_path=base_url().'uploads/college/'.$data["file_name"];
                    $condition = array('collegeId'=>$cid);
                    $picture = array(
                                    'collegeLogo'=>$img_path,
                                );
                    
                    $success = $this->Colleges->update($picture,$condition);
                    
                    echo '<script type="text/javascript"> alert("User Profile Image has been Successfully Change!"); 
                    </script>'; 
                }
            }       
        }

    }

// Departments
    public function officeContent($collegeId)
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

        $condition = array('collegeId' => $collegeId);
        $departments = $this->Dept->read($condition);
        $data['departments'] = $departments;

        $condition = array('collegeId' => $collegeId);
        $colleges = $this->Colleges->read($condition);
        $data['collegefull']=$colleges;
        $data['status']=$this->Status->read(null);
        $this->load->view('include/headerNew',$data); 
        $this->load->view('sidebarAdmin');
        $this->load->view('navbar'); 
        $this->load->view('AdminDepartment');
        $this->load->view('include/footerNew');
    }

    public function addDepartment($collegeId)
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
            $department = $_POST['department'];
            $idno = $_POST['deptId'];
            $record = array('department'=>$department,
                            'collegeId'=>$collegeId,
                            'deptId'=>$idno);
            $this->Dept->create($record);
        }
        do{
            $idno = rand(0,9).rand(0,9).rand(0,9);
            $condition = array('deptId'=>$idno);
            $rs = $this->Dept->read($condition);
        }while($rs);
        $data['idno'] = $idno;
        $condition = null;
        $departments = $this->Dept->read($condition);
        $data['departments'] = $departments;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = array('collegeId' => $collegeId);
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;
        $data['status']=$this->Status->read(null);
        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        $this->load->view('navbar'); 
        $this->load->view('newDepartment');
        $this->load->view('include/footerNew');
    }
        
    public function UpdateDepartment()
    {
        $department = $_POST['department'];
        $collegeId = $_POST['collegeId'];
        $deptId = $_POST['deptId'];
        $this->Dept->update($collegeId, $department,$deptId);
    }

    
  
}
?>