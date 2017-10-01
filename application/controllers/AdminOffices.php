<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminOffices extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('files_model','Files');
        $this->load->model('users_model','Users');
        $this->load->model('adminsettings_model','Dept');
        $this->load->model('registrardoc_model','Regdoc');
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
                $colleges = array();
                $condition = null;
                $rs = $this->Dept->read1($condition);

                foreach($rs as $r){
                    $info = array(
                                'college_logopath'=> $r['college_logopath'],
                                'college_acronym'=> $r['college_acronym'],
                                'college_desc'=> $r['college_desc'],
                                'college_dean'=> $r['college_dean'],
                                );
                    $colleges[] = $info;
                }
            
            $data['colleges'] = $colleges;
			$user = $this->session->userdata('username');
            $userdata = array();
            $user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $rs = $this->Users->read($condition);
                foreach($rs as $r){
                    $info = array(
                                'username' => $r['username'],
                                'password' => $r['password'],
                                'full_name' => $r['full_name'],
                                'email_address' => $r['email_address'],
                                'position' => $r['position'],    
                                'department'=> $r['department'],
                                'college_acronym' => $r['college_acronym'],           
                                );
                    $userdata[] = $info;
            }
            $data['userdata'] = $userdata;
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
			 $colleges = array();
                $condition = null;
                $rs = $this->Dept->read1($condition);

                foreach($rs as $r){
                    $info = array(
                                'college_logopath' => $r['college_logopath'],
                                'college_acronym' => $r['college_acronym'],
                                'college_desc' => $r['college_desc'],
                                'college_dean' => $r['college_dean'],
                                );
                    $colleges[] = $info;
            }
			
            $userdata = array();
            $user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $rs = $this->Users->read($condition);
                foreach($rs as $r){
                    $info = array(
                                'username' => $r['username'],
                                'password' => $r['password'],
                                'full_name' => $r['full_name'],
                                'email_address' => $r['email_address'],
                                'position' => $r['position'],    
                                'department'=> $r['department'],
                                'college_acronym' => $r['college_acronym'],           
                                );
                    $userdata[] = $info;
            }
            $data['userdata'] = $userdata;
            $data['title'] = "Document Tracking System - Dashboard";
            $data['colleges'] = $colleges;
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
                $departments = array();
                $condition = null;
                $rs = $this->Dept->read($condition);

                foreach($rs as $r){
                    $info = array(
                                'departments'=> $r['department'],
                                );
                    $departments[] = $info;
                }
            
            $data['departments'] = $departments;
			$user = $this->session->userdata('username');
            $userdata = array();
            $condition = array('username' => $user);
            $rs = $this->Users->read($condition);
                foreach($rs as $r){
                    $info = array(
                                'username' => $r['username'],
                                'password' => $r['password'],
                                'full_name' => $r['full_name'],
                                'email_address' => $r['email_address'],
                                'position' => $r['position'],    
                                'department'=> $r['department'],
                                'college_acronym' => $r['college_acronym'],           
                                );
                    $userdata[] = $info;
            }
			
			$collegefull = array();
            $condition = array('college_acronym' => $college_acronym);
            $rs = $this->Dept->read1($condition);
            foreach($rs as $r){
                $info = array(
                    'collegefull' => $r['collegefull'],
					'college_acronym' => $r['college_acronym']
                );
                $collegefull[] = $info;
            }
            $data['collegefull']=$collegefull;
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
        $userdata = array();
        $condition = array('username' => $user);
        $rs = $this->Users->read($condition);
            foreach($rs as $r){
                $info = array(
                            'username' => $r['username'],
                            'password' => $r['password'],
                            'full_name' => $r['full_name'],
                            'email_address' => $r['email_address'],
                            'position' => $r['position'],    
                            'department'=> $r['department'],
                            'college_acronym' => $r['college_acronym'],           
                            );
                $userdata[] = $info;
            }
    //END OF PROFILE DETAIL
	
    //DEPARTMENT DETAILS
            $data['userdata'] = $userdata;
            
            $departments = array();
            $condition = array('college_acronym' => $college_acronym);
            $rs = $this->Dept->read($condition);
                foreach($rs as $r){
                    $info = array(
								'college_acronym' => $r['college_acronym'],	
                                'department' => $r['department'],
								'dept_idno' => $r['dept_idno']
                                );
                    $departments[] = $info;
            }

            $data['departments'] = $departments;
    //END OF DEPARTMENT DETAILS
	
    //COLLEGE DETAILS
            $collegefull = array();
            $condition = array('college_acronym' => $college_acronym);
            $rs = $this->Dept->read1($condition);
                foreach($rs as $r){
                    $info = array(
                                'collegefull' => $r['collegefull'],
								'college_acronym' => $r['college_acronym']
                                );
                    $collegefull[] = $info;
            }
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
			$colleges = array();
            $condition = array('college_acronym' => $college_acronym);
            $rs = $this->Dept->read1($condition);
            foreach($rs as $r){
                $info = array(
                    'college_logopath'=> $r['college_logopath'],
                    'college_acronym'=> $r['college_acronym'],
					'collegefull'=>$r['collegefull'],
                    'college_desc'=> $r['college_desc'],
                    'college_dean'=> $r['college_dean'],
                    );
                $colleges[] = $info;
            }
			$data['colleges'] = $colleges;
			$user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $rs = $this->Users->read($condition);
            foreach($rs as $r){
                $info = array(
                    'username' => $r['username'],
                    'password' => $r['password'],
                    'full_name' => $r['full_name'],
                    'email_address' => $r['email_address'],
					'position' => $r['position'],    
                    'department'=> $r['department'],
                    'college_acronym' => $r['college_acronym'],           
                );
                $userdata[] = $info;
            }
        $data['userdata'] = $userdata;
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
			$colleges = array();
            $condition = null;
            $rs = $this->Dept->read1($condition);
            foreach($rs as $r){
                $info = array(
                    'college_logopath'=> $r['college_logopath'],
                    'college_acronym'=> $r['college_acronym'],
					'collegefull'=>$r['collegefull'],
                    'college_desc'=> $r['college_desc'],
                    'college_dean'=> $r['college_dean'],
                    );
                $colleges[] = $info;
            }
			$data['colleges'] = $colleges;
	}
}
?>