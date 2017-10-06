<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationPath extends CI_Controller {



    public function __construct(){
        parent::__construct();
    //LOADING OF MODEL AND HELPERS
        $this->load->helper(array('form', 'url'));
        $this->load->model('files_model','Files');
        $this->load->model('users_model','Users');
        $this->load->model('adminsettings_model','Dept');
        $this->load->model('registrardoc_model','Regdoc');
        $this->load->model('notification_model','Notif');
    //LOADING OF MODEL AND HELPERS 
    }

    public function notifToInbox($trackcode){

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
        $data['userdata'] = $userdata;
        $documents = array();
        $rs = $this->Files->sortdata($trackcode);
        foreach($rs as $r){
            $info = array(
                        'trackcode' => $r['trackcode'],
                        'filename' => $r['filename'],
                        'author' => $r['author'],
                        'receiver' => $r['receiver'],
                        'datecreated' => $r['datecreated'],
                        'status' => $r['status'],    
                        'path'=>$r['path'],
                        'file_desc' => $r['file_desc']            e
                        );
            $documents[] = $info;
        }
        $data['documents']=$documents;
            $notifs=array();
            $condition = array('username' => $_SESSION['username']);
            $notifs = $this->Notif->read($condition);
            $data['notifs']=$notifs;
        $this->load->view('include/header',$data);  
        if($_SESSION['username'] == "admin"){    
            $this->load->view('profile_admin',$data);
        }else{
            $this->load->view('profile',$data);
        }
        $this->load->view('myinboxdocuments_view',$data);
    }

}