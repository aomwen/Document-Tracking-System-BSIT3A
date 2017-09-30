<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

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
/*     log_in, signup , session_check, session_checkout     */


//LOGIN CONTROLLER
    public function log_in(){
        $error=null;
        $data['error']=$error;
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->form_validation->set_rules('Username', 'Username', 'required');
            $this->form_validation->set_rules('Password', 'Password', 'required');
            if($this->form_validation->run()){
                $username = $this->input->post('Username');
                $password = $this->input->post('Password');
                if($this->Users->login($username,$password)){
                    $session_data = array(
                        'username' => $username
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url(). 'Access/session_check');
                }else{
                    $error = "Invalid username or Password!";
                    $data['error']=$error;
                }
            }
        }

        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('login',$data);
        $this->load->view('include/login_footer',$data);
    }

//SIGNUP
     public function signup(){
  
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            $full_name = $_POST['full_name'];
            $email_address = $_POST['email_address'];
            $position = $_POST['position'];
            $college = $_POST['college'];
            $department = $_POST['department'];
            $record = array(
                        'username'=>$username,
                        'full_name'=>$full_name,
                        'email_address'=>$email_address,
                        'password'=>$password,
                        'position'=>$position,
                        'college_acronym'=>$college,
                        'department' => $department);
            if($this->Users->create($record)){
                    $success = "Account successfully created!";
                    $data['success']=$success;
                    redirect(base_url().'Dts/index');
                }else{
                    $error = "Error!!!";
                    $data['error']=$error;
                redirect(base_url().'Access/signup');
                }
            }
            $college = array();
            $condition = array();
            $rs = $this->Dept->read1($condition);
            foreach($rs as $r){
                $info = array(
                    'college_acronym' => $r['college_acronym']
                );
                $college = $info;
            }
            $department = array();
            $rs = $this->Dept->read($condition);
            foreach($rs as $r){
                $info = array(
                    'college_acronym' => $r['college_acronym'],
                    'department' => $r['department']
                );
                $department = $info;
            }
        $data['department'] = $department;
        $data['college']=$college;
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('register',$data);
        $this->load->view('include/login_footer',$data);
    }
//session-login

    public function session_check(){
        if($this->session->userdata('username')!=''){
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
            if($_SESSION['username'] == "admin"){
                $data['userdata'] = $userdata;
                $this->load->view('include/header',$data);      
                $this->load->view('profile_admin',$data);
            }else{
                $data['userdata'] = $userdata;
                $this->load->view('include/header',$data);      
                $this->load->view('profile',$data);
            }
        }else{
            redirect(base_url(). 'Dts/index');
        }
    }

//session-logout
    public function session_checkout(){
        session_destroy();
        redirect(base_url(). 'Dts/index');
    }

}
?>