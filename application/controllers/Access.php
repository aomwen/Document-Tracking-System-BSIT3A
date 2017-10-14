<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usersModel','User');
    }

//  LIST OF FUNCTIONS
//     1) logIn
//     2) sessionCheck
//     3) logOut

    public function logIn()
    {
        $error=null;
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $this->form_validation->set_rules('Username', 'Username', 'required');
            $this->form_validation->set_rules('Password', 'Password', 'required');
            if($this->form_validation->run())
            {
                $username = $this->input->post('Username');
                $password = $this->input->post('Password');
                if($this->User->login($username,$password))
                {
                    $session_data = array('username' => $username);
                    $this->session->set_userdata($session_data);
                    redirect(base_url(). 'Access/sessionCheck');
                }else
                {
                    $error = "Invalid username or Password!";
                    $data['error']=$error;
                }
            }
        }
        $data['error']=$error;
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('login');
    }

    public function sessionCheck()
    {
        if(isset($_SESSION['username']))
        {
            $user = $_SESSION['username'];
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            $data['title'] = "Document Tracking System - Dashboard";
            if($_SESSION['username'] == "admin"){
                $data['userdata'] = $userdata;
                $this->load->view('include/header',$data);      
                $this->load->view('profileAdmin');
            }else{
                $data['userdata'] = $userdata;
                $this->load->view('include/header',$data);      
                $this->load->view('profile');
            }
        }
    }

    public function logOut(){
        session_destroy();
        redirect(base_url(). 'Dts/index');
    }

}
?>