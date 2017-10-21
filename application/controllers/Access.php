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
                    redirect(base_url(). 'Dashboard/dashboardView');
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

    public function logOut(){
        session_destroy();
        redirect(base_url(). 'Dts/index');
    }

}
?>