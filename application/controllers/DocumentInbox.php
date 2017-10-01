<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentInbox extends CI_Controller {



    public function __construct(){
        parent::__construct();
    //LOADING OF MODEL AND HELPERS
        $this->load->helper(array('form', 'url'));
        $this->load->model('files_model','Files');
        $this->load->model('users_model','Users');
        $this->load->model('adminsettings_model','Dept');
        $this->load->model('registrardoc_model','Regdoc');
        $this->load->model('homeFunction_model','msgtoAdmin');
    //LOADING OF MODEL AND HELPERS 
    }
public function myinbox_view(){


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
        $documents = array();
        $condition = null;
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $condition = array('trackcode' => $_POST['tracknumber']);
        }

        $rs = $this->Files->read($condition);
        foreach($rs as $r){
            $info = array(
                        'trackcode' => $r['trackcode'],
                        'filename' => $r['filename'],
                        'author' => $r['author'],
                        'receiver' => $r['receiver'],
                        'datecreated' => $r['datecreated'],
                        'status' => $r['status'],    
                        'path'=>$r['path'],
                        'file_desc' => $r['file_desc']            
                        );
            $documents[] = $info;
        }
        $data['documents']=$documents;
    //END OF PROFILE DETAIL
    //DEPARTMENT DETAILS
            $data['userdata'] = $userdata;
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
            $this->load->view('myinboxdocuments_view',$data);
    }
}
?>