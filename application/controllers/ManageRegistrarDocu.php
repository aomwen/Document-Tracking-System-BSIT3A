<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageRegistrarDocu extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('documents_model','Files');
        $this->load->model('users_model','User');
		$this->load->model('positions_model','Positions');
        $this->load->model('departments_model','Dept');
        $this->load->model('colleges_model','Coll');
        $this->load->model('documentstatus_model','Docstat');
		$this->load->model('contactus_model','msgAd');
    //LOADING OF MODEL AND HELPERS 
	}

    public function viewDocuments(){
        do{
            $tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
            $condition = array('trackcode'=>$tracknumber);
            $rs = $this->Docstat->read($condition);
        }while($rs);
        $data['tracknumber'] = $tracknumber;   
        $documents_status = array();
        $condition = null;
        $documents_status = $this->Docstat->read(condition);
		$data['documents_status'] = $documents_status;
        $user = $this->session->userdata('username');
        //getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata; 
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data); 
        
            $this->load->view('profile_admin',$data);
        
        $this->load->view('registrar_documents', $data);
    }
    public function registrar_add_documents(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $trackcode = $_POST['trackcode'];
            $file_type = $_POST['file_type'];
            $date_released = $_POST['date_released'];
            $date_admitted = $_POST['date_admitted'];
            $status = $_POST['status'];
            $record = array('trackcode'=>$trackcode,
                            'file_type'=>$file_type,
                            'date_admitted'=> $date_admitted,
                            'date_released'=>$date_released,
                            'status'=>$status);
        
            $last_id = $this->Docstat->create($record,$condition);
        }
        redirect(base_url(). 'ManageRegistrarDocu/viewDocuments');
    }
    public function registrar_update($trackcode,$status){
   
        $status = str_replace('%20',' ',$status);
        if($status=="Received"){
            $status = array('status'=>$status,
            'date_released'=> date("Y-m-d"));
        }else{
        $status = array('status'=>$status);
        }
        $trackcode = array('trackcode' => $trackcode);
        $this->Docstat->update($status,$trackcode);
        redirect(base_url().'ManageRegistrarDocu/viewDocuments');
    }
	public function viewUsers(){
		do{
            $idno = rand(0,999);
            $condition = array('idno'=>$idno);
            $rs = $this->User->read($condition);
        }while($rs);
		$data['idno'] = $idno;
        //getting userdata1
		$condition = null;
		$userdata1 = $this->User->read($condition);
		$data['userdata1'] = $userdata1;
        //end of getting userdata1
		$user = $this->session->userdata('username');
        //getting userdata
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
		$data['userdata'] = $userdata;
        //end of getting userdata
		$data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header',$data);
		$this->load->view('profile_admin',$data);
		$this->load->view('user_view',$data);
	}
	public function add_user(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			do{
				$idnum = rand(0,999);
				$condition = array('idno'=>$idnum);
				$rs = $this->Docstat->read($condition);
			}while($rs);
			$idno = $idnum;

				$username = $_POST['username'];
                $password = $_POST['password'];
                $firstname  = $_POST['firstname'];
                $lastname  = $_POST['lastname'];
                $email_address  = $_POST['email_address'];
                $college_acronym  = $_POST['college_acronym'];
                $department  = $_POST['department'];
                $position  = $_POST['position'];
                $record = array(
					'idno'=> $idno,
                    'username' => $username,
					'password'=>$password,
                    'firstname'=>$firstname,
                    'lastname'=>$lastname,
                    'email_address'=>$email_address,
                    'college_acronym'=>$college_acronym,
                    'department'=>$department,
                    'position'=>$position,
                            );

                $last_id = $this->User->create($record);
		}
				$positions = array();
				$condition = null;
				$rs2 = $this->Positions->read($condition);
				
				foreach($rs2 as $r2){
					$info = array (
						'pos_idno'=>$r2['pos_idno'],
						'college_acronym'=>$r2['college_acronym'],
						'position'=>$r2['position'],
						);
					$positions[] = $info;
				}$data['positions']=$positions;
                //getting departments
				$condition = null;
				$departments = $this->Dept->read($condition);
				$data['departments'] = $departments;
                //end of getting departments
                //getting colleges
                $condition = null;
                $colleges = $this->Coll->read($condition);
                $data['colleges'] = $colleges;
                //end of getting colleges
            $user = $this->session->userdata('username');
            //getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            //end of getting userdata
            $data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header');
		$this->load->view('profile_admin',$data);
        $this->load->view('new_user',$data);
            
    }
	public function edit_user($username){
            //getting colleges
            $condition = null;
            $colleges = $this->Coll->read($condition);
			$data['colleges'] = $colleges;
            //end of getting colleges
            //getting departments
			$condition = null;
			$departments = $this->Dept->read($condition);
			$data['departments'] = $departments;
            //end of getting departments
            //getting positions
			$condition = null;
			$departments = $this->Dept->read($condition);
			$data['positions'] = $positions;
            //end of getting positions
			$user = $username;
            //getting userdata1
			$condition = array('username' => $user);
			$userdata1 = $this->User->read($condition);
            $data['username'] = $userdata1;
            //end of getting userdata1
            //getting userdata
            $condition = null;
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            //end of getting userdata
        $data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header',$data);      
		$this->load->view('profile_admin',$data);
		$this->load->view('edit_user',$data);
	}
	public function UD_user(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			do{
				$idnum = rand(0,999);
				$condition = array('idno'=>$idnum);
				$rs = $this->Docstat->read($condition);
			}while($rs);
			$idno = $idnum;

				$username = $_POST['username'];
                $password = $_POST['password'];
                $firstname  = $_POST['firstname'];
                $lastname  = $_POST['lastname'];
                $email_address  = $_POST['email_address'];
                $college_acronym  = $_POST['college_acronym'];
                $department  = $_POST['department'];
                $position  = $_POST['position'];
				$user1 = array('username'=>$username);
                $record = array(
                    'username' => $username,
					'password'=>$password,
                    'firstname'=>$firstname,
                    'lastname'=>$lastname,
                    'email_address'=>$email_address,
                    'college_acronym'=>$college_acronym,
                    'department'=>$department,
                    'position'=>$position,
                            );

                $last_id = $this->User->update($record,$user1);
				redirect(base_url().'ManageRegistrarDocu/viewUsers');
		}
                //getting position
				$condition = null;
				$positions = $this->Positions->read($condition);
                $data['positions']=$positions;
                //end of getting position
                //getting departments
				$condition = null;
				$departments = $this->Dept->read($condition);
				$data['departments'] = $departments;
                //end of getting departments
                //getting colleges
                $condition = null;
                $colleges = $this->Coll->read($condition);
                $data['colleges'] = $colleges;
                //endof getting colleges
	}
	public function remove_user($username){
		$this->User->delete_student($username);
		redirect(base_url().'ManageRegistrarDocu/viewUsers');
	}

}?>