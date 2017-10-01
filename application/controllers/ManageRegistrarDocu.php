<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageRegistrarDocu extends CI_Controller {

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

    public function viewDocuments(){
        do{
            $tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
            $condition = array('trackcode'=>$tracknumber);
            $rs = $this->Regdoc->read($condition);
        }while($rs);
        $data['tracknumber'] = $tracknumber;   
        $documents_status = array();
        $condition = null;
        $rs = $this->Regdoc->read($condition);

        foreach($rs as $r){
            $info = array(
                        'trackcode'=> $r['trackcode'],
                        'file_type'=> $r['file_type'],
                        'date_admitted'=> $r['date_admitted'],
                        'date_released' => $r['date_released'],
                        'status'=> $r['status'],  
                        );
            $documents_status[] = $info;
        }      
        $data['documents_status'] = $documents_status;
        $user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $data['tracknumber'] = $tracknumber;
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
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);      
        $this->load->view('profile_admin',$data);
        $this->load->view('registrar_documents', $data);
    }
    public function registrar_add_documents(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $trackcode = $_POST['trackcode'];
            $file_type = $_POST['file_type'];
            $date_released = $_POST['date_released'];
            $date_admitted = $_POST['date_admitted'];
            $status = $_POST['status'];
            $record = array('trackcode'=>$trackcode,
                            'file_type'=>$file_type,
                            'date_admitted'=> $date_admitted,
                            'date_released'=>$date_released,
                            'status'=>$status);
        
            $last_id = $this->Regdoc->create($record,$condition);
        }
        redirect(base_url(). 'ManageRegistrarDocu/viewDocuments');
    }
    public function registrar_update($trackcode,$status){
   
        $status = str_replace('%20',' ',$status);
        if($status=="Received"){
            $status = array('status'=>$status,
            'date_released'=> date("Y-m-d"));
        }else{
        $status = array('status'=>$status);
        }
        $trackcode = array('trackcode' => $trackcode);
        $this->Regdoc->update($status,$trackcode);
        redirect(base_url().'ManageRegistrarDocu/viewDocuments');
    }

}?>