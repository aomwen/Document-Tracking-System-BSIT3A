<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminOffices extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('documents_model','Files');
        $this->load->model('users_model','User');
        $this->load->model('departments_model','Dept');
        $this->load->model('colleges_model','Coll');
        $this->load->model('documentstatus_model','Docstat');
    //LOADING OF MODEL AND HELPERS 
	}
	
	public function add_colleges(){
            if($_SERVER['REQUEST_METHOD']=='POST'){

                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/assets/images/";
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['max_size']     = '1000000kb';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->load->library('upload', $config);
                $this->upload->do_upload('college_logopath');
                $name = $this->upload->data('file_name');
                $location = base_url().'assets/images/'.$name.'';
                move_uploaded_file($name, $location);
                $college_acronym = $_POST['college_acronym'];
				$collegefull = $_POST['collegefull'];
                $college_desc = $_POST['college_desc'];
                $college_dean  = $_POST['college_dean'];
                $record = array(
                    'college_acronym'=>$college_acronym,
					'collegefull'=>$collegefull,
                    'college_desc'=>$college_desc,
                    'college_dean' => $college_dean,
                    'college_logopath'=>$location,
                            );

                $last_id = $this->Dept->create1($record);
            }
				//getting colleges
                $condition = null;
                $colleges = $this->Coll->read($condition);
				$data['colleges'] = $colleges;
				//end of getting colleges
            
            $data['colleges'] = $colleges;
            $user = $this->session->userdata('username');
            //getting userdata
			$condition = array('username' => $user);
			$userdata = $this->User->read($condition);
			$data['userdata'] = $userdata;
            //end of getting userdata
            $data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header');
        if($_SESSION['username'] == "admin"){    
            $this->load->view('profile_admin',$data);
        }else{
            $this->load->view('profile',$data);
        }
        $this->load->view('new_college',$data);
            
        }
        
		public function manage_colleges() {
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
			$this->load->view('include/header',$data);      
            $this->load->view('profile_admin',$data);
			$this->load->view('manage_colleges',$data);
		}
		
		public function add_department($college_acronym){
			if($_SERVER['REQUEST_METHOD']=='POST'){

                $department = $_POST['department'];
				$idno = $_POST['dept_idno'];
                $record = array(
                    'department'=>$department,
					'college_acronym'=>$college_acronym,
					'dept_idno'=>$idno
                            );

                $last_id = $this->Dept->create($record);
            }
			do{
                $idno = rand(0,9).rand(0,9).rand(0,9);
                $condition = array('dept_idno'=>$idno);
                $rs = $this->Dept->read($condition);
            }while($rs);
				$data['idno'] = $idno;
				//getting departments
                $condition = null;
                $departments1 = $this->Dept->read1($condition);
				$data['departments'] = $departments1;
				//end of getting departments
			$user = $this->session->userdata('username');
			//getting userdata
            $condition = array('username' => $user);
			$userdata = $this->User->read($condition);
			$data['userdata'] = $userdata;
			//end of getting
			//getting colleges
            $condition = array('college_acronym' => $college_acronym);
            $colleges1 = $this->Coll->read1($condition);
            $data['colleges'] = $colleges1;
            //end of getting colleges
            $data['userdata'] = $userdata;
            $data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header');
		$this->load->view('profile_admin',$data);
        $this->load->view('new_department',$data);
		}
		
		public function office_content($college_acronym){
		$data['title'] = "Document Tracking System - Dashboard";
    //PROFILE DETAIL
        $user = $this->session->userdata('username');
		//getting userdata
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
		$data['userdata'] = $userdata;
		//end of getting userdata
    //END OF PROFILE DETAIL
	
    //DEPARTMENT DETAILS
            $data['userdata'] = $userdata;
            //getting departments
            $condition = array('college_acronym' => $college_acronym);
            $departments = $this->Dept->read($condition);
            $data['departments'] = $departments;
			//end of getting departments
    //END OF DEPARTMENT DETAILS
	
    //COLLEGE DETAILS
            //getting colleges
            $condition = array('college_acronym' => $college_acronym);
            $colleges1 = $this->Coll->read1($condition);
            $data['collegefull']=$collegefull;
    //END OF COLLEGE DETAILS
			
            $this->load->view('include/header',$data);      
            $this->load->view('profile_admin',$data);
            $this->load->view('Admin_Department',$data);
    }
	public function remove_college($college_acronym){
            $this->Dept->remove1($college_acronym);
            redirect(base_url(). 'AdminOffices/manage_colleges');
    }
	public function remove_department($department,$dept_idno){
		$this->Dept->remove($department,$dept_idno);
		redirect(base_url(). 'AdminOffices/manage_colleges');
	}
	public function Update_Department(){
		$department = $_POST['department'];
		$college_acronym = $_POST['college_acronym'];
		$this->Dept->update($college_acronym, $department);
		redirect(base_url(). 'AdminOffices/manage_colleges');
	}
	public function update_college($college_acronym){
			//getting colleges
            $condition = array('college_acronym' => $college_acronym);
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
		$this->load->view('include/header',$data);      
        $this->load->view('profile_admin',$data);
		$this->load->view('edit_college.php',$data);
	}
	public function office_UD(){
		if($_SERVER['REQUEST_METHOD']=='POST'){

            $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/assets/images/";
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size']     = '1000000kb';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            $this->upload->do_upload('college_logopath');
            $name = $this->upload->data('file_name');
            $location = base_url().'assets/images/'.$name.'';
            $college_acronym = $_POST['college_acronym'];
			$collegefull = $_POST['collegefull'];
            $college_desc = $_POST['college_desc'];
            $college_dean  = $_POST['college_dean'];
			$ca = array('college_acronym'=>$college_acronym);
            $record = array(
                'college_acronym'=>$college_acronym,
				'collegefull'=>$collegefull,
                'college_desc'=>$college_desc,
                'college_dean' => $college_dean,
                'college_logopath'=>$location,
            );
            $last_id = $this->Dept->update1($record,$ca);
			redirect(base_url(). 'AdminOffices/manage_colleges');
        }
			//getting colleges
            $condition = null;
            $colleges = $this->Coll->read($condition);
			$data['colleges'] = $colleges;
			//end of getting colleges
	}
}
?>