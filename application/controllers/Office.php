<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('files_model','Files');
        $this->load->model('users_model','Users');
        $this->load->model('adminsettings_model','Dept');
        $this->load->model('registrardoc_model','Regdoc');
		$this->load->model('news_model','News');
    //LOADING OF MODEL AND HELPERS 
	}
public function Office_view(){
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
        $data['title'] = "Document Tracking System - Dashboard";
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
            $data['userdata'] = $userdata;
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
            if($_SESSION['username']=="admin"){
                $this->load->view('manage_colleges',$data); 
            }
            $this->load->view('offices',$data); 
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
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
            
            $departments = array();
            $condition = array('college_acronym' => $college_acronym);
            $rs = $this->Dept->read($condition);
                foreach($rs as $r){
                    $info = array(
                                'department' => $r['department'],
                                'department_head' => $r['department_head']
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
                                );
                    $collegefull[] = $info;
            }
            $data['collegefull']=$collegefull;
    //END OF COLLEGE DETAILS
            $users = array();
            $condition = array('college_acronym' => $college_acronym);
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
                    $users[] = $info;
            }
            $data['users']=$users;

            $this->load->view('offices_content',$data);
    }
}
?>