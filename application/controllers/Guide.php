<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends CI_Controller {



    public function __construct(){
        parent::__construct();
        $this->load->model('documentsModel','Files');
        $this->load->model('usersModel','User');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
    public function guide()
    {
        $data['title'] = "Document Tracking System - Dashboard";

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = null;
        $documents = $this->Files->read($condition);
        $data['documents']=$documents;
        
        $this->load->view('include/header',$data);  
        if($_SESSION['username'] == "admin"){   
            $this->load->view('profileAdmin',$data);
        }else{
            $this->load->view('profile',$data);
        }
        $this->load->view('guide',$data);
    }

    
}
?>