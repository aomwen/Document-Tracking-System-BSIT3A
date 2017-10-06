<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentInbox extends CI_Controller {



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
public function myinbox_view(){


        $data['title'] = "Document Tracking System - Dashboard";
    //PROFILE DETAIL
        $user = $this->session->userdata('username');
        //getting userdata
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
		$data['userdata'] = $userdata;
		//end of getting userdata
		//sorting data
        $condition = null;
        if($_SERVER['REQUEST_METHOD']=='POST'){

            // $condition = array('trackcode' => $_POST['tracknumber']);
            $condition = $_POST['search'];
        }
        $documents1 = $this->Files->sortdata($condition);
        $data['documents']=$documents1;
		//end of sorting data
    //END OF PROFILE DETAIL
    //DEPARTMENT DETAILS
        $data['userdata'] = $userdata;
        $this->load->view('include/header',$data);  
        if($_SESSION['username'] == "admin"){    
            $this->load->view('profile_admin',$data);
        }else{
            $this->load->view('profile',$data);
        }
        $this->load->view('myinboxdocuments_view',$data);
    }
}
?>