<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('documentsModel','Files');
        $this->load->model('usersModel','User');
    }

    public function viewAccount()
    {
        if(!isset($_SESSION['username'])){
                     redirect().'Dts/index';
        }
        $data['title'] = "Document Tracking System - Dashboard";
        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $this->load->view('include/header',$data); 
        if($_SESSION['username'] == "admin")
        {    
            $this->load->view('profileAdmin');
        }else
        {   
            $this->load->view('profile');
        }
        $this->load->view('accountView');     
    }

    public function editProfile()
    {
        $data['title'] = "Document Tracking System - Dashboard";
        $user = $this->session->userdata('username');
        $condition = array('username'=>$user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;
        $this->load->view('include/header',$data); 
        if($_SESSION['username'] == "admin")
        {    
            $this->load->view('profileAdmin');
        }else
        {
            $this->load->view('profile');
        }  
        $this->load->view('accountView');  
        $this->load->view('editprofile'); 
    }

    public function updateProfile(){

        $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
        $config['allowed_types'] = 'gif|png|jpg|jpeg';
        $config['max_size']     = 200000;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;    
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email_address = $_POST['email_address'];
        $position = $_POST['position'];
        $college = $_POST['college_acronym'];
        $department = $_POST['department'];
        
        if($this->upload->do_upload('path'))
        {
            $name= $this->upload->data('file_name');
            $location = base_url().'uploads/'.$name.'';
            $record = array(
                        'username'=>$username,
                        'firstname'=>$first_name,
                        'lastname' =>$last_name,
                        'email'=>$email_address,
                        'password'=>$password,
                        'path' => $location,);
        }else
        {
            $record = array(
                        'username'=>$username,
                        'firstname'=>$first_name,
                        'lastname' =>$last_name,
                        'email'=>$email_address,
                        'password'=>$password);
        }
        if($this->User->update($record))
        {
                session_unset('username');
                $session_data = array('username' => $username);
                $this->session->set_userdata($session_data);
                $success = "Account successfully created!";
                $data['success']=$success;
                redirect(base_url().'Account/viewAccount');
            }else{
                $error = "Error!!!";
                $data['error']=$error;
                redirect(base_url().'Account/editProfile');
            }
        }
    
}
?>