<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentStatus extends CI_Controller {

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
    
public function mydocuments_view(){
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
            $documents = array();
                $condition = array('author' => $_SESSION['username']);
                $rs = $this->Files->read($condition);

                foreach($rs as $r){
                    $info = array(
                                'trackcode' => $r['trackcode'],
                                'filename' => $r['filename'],
                                'author' => $r['author'],
                                'receiver' => $r['receiver'],
                                'datecreated' => $r['datecreated'],
                                'status' => $r['status'],    
                                'path'=>$r['path']            
                                );
                    $documents[] = $info;
            }
            $data['documents'] = $documents;
            
            $documents1 = array();
            $condition = array('receiver' => $_SESSION['username']);
            $rs = $this->Files->read($condition);

                foreach($rs as $r){
                    $info = array(
                                'trackcode' => $r['trackcode'],
                                'filename' => $r['filename'],
                                'author' => $r['author'],
                                'receiver' => $r['receiver'],
                                'datecreated' => $r['datecreated'],
                                'status' => $r['status'],    
                                'path'=>$r['path']            
                                );
                    $documents1[] = $info;
            }

            $data['documents1'] = $documents1;
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
            $this->load->view('mydocuments');           
    }
}
?>