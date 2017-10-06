<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('documents_model','Files');
        $this->load->model('users_model','User');
        $this->load->model('departments_model','Dept');
        $this->load->model('colleges_model','Coll');
        $this->load->model('documentstatus_model','Docstat');
        $this->load->model('contactus_model','msgAd');
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
                if($this->User->login($username,$password)){
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
    }


//session-login

    public function session_check(){
        if($this->session->userdata('username')!=''){
            $data['title'] = "Document Tracking System - Dashboard";
            $user = $this->session->userdata('username');
            //getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
			$data['userdata'] = $userdata;
			//end of getting userdata
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