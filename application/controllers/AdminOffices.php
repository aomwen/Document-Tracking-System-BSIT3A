<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminOffices extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('usersModel','User');
        $this->load->model('departmentsModel','Dept');
        $this->load->model('collegesModel','Colleges');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
    
    public function manageColleges()
    {
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
        $this->load->view('manageColleges');
    } 

  /*  public function removeCollege($collegeId)
    {
        $this->Colleges->remove($collegeId);
        redirect(base_url(). 'AdminOffices/manageColleges');
    }
*/
    public function addColleges()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/assets/images/";
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size']     = '1000000kb';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            $this->upload->do_upload('collegeLogo');
            $name = $this->upload->data('file_name');
            $location = base_url().'uploads/college/'.$name.'';
            move_uploaded_file($name, $location);
            $collegeId = $_POST['collegeId'];
            $collegefull = $_POST['collegefull'];
            $collegeDesc = $_POST['collegeDesc'];
            $collegeDean  = $_POST['collegeDean'];
            $record = array('collegeId'=>$collegeId,
                            'collegefull'=>$collegefull,
                            'collegeDesc'=>$collegeDesc,
                            'collegeDean' => $collegeDean,
                            'collegeLogo'=>$location);
            $this->Colleges->create($record);
            echo '<script type="text/javascript"> alert("College has been Successfully ADDED!");
                                         
                                </script>';
        }
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
        $this->load->view('newColleges'); 
    }      
    public function updateCollege($collegeId)
    {
        $condition = array('collegeId' => $collegeId);
        $colleges = $this->Colleges->read($condition);
        $data['colleges'] = $colleges;

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);      
        $this->load->view('profileAdmin',$data);
        $this->load->view('editCollege',$data);
    }

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
            $condition = null;
            $colleges = $this->Colleges->read($condition);
            $data['colleges'] = $colleges;
    }   

// Departments
    public function officeContent($collegeId)
    {
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

        $this->load->view('include/header',$data);      
        $this->load->view('profileAdmin');
        $this->load->view('AdminDepartment');
    }

    public function addDepartment($collegeId)
    {
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

        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('profileAdmin');
        $this->load->view('newDepartment');
    }
        
    /*    
    public function removeDepartment($department,$dept_idno)
    {
        $this->Dept->remove($department,$dept_idno);
        redirect(base_url(). 'AdminOffices/manageColleges');
    }*/
    public function UpdateDepartment()
    {
        $department = $_POST['department'];
        $collegeId = $_POST['collegeId'];
        $deptId = $_POST['deptId'];
        $this->Dept->update($collegeId, $department,$deptId);
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
}
?>