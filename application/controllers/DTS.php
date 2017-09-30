<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dts extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('files_model','Files');
        $this->load->model('users_model','Users');
        $this->load->model('adminsettings_model','Dept');
        $this->load->model('registrardoc_model','Regdoc');
		$this->load->model('news_model','News');
    //LOADING OF MODEL AND HELPERS 
	}
	
	public function index(){	
		$data['title'] = "Document Tracking System - Dashboard";
		$this->load->view('include/header',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('include/footer');
	}


	// ADMIN ACCOUNTS - SETTINGS - DEPARTMENTS 
        public function settings_department(){
             $departments = array();
            $condition = null;
            $rs = $this->Dept->read($condition);
            foreach($rs as $r){
                $info = array(
                            'departments' => $r['departments'],          
                            );
                $departments[] = $info;
            }
            $data['departments'] = $departments;
            $colleges = array();
                $condition = null;
                $rs = $this->Dept->read1($condition);

                foreach($rs as $r){
                    $info = array(
                                'college_logopath' => $r['college_logopath'],
                                'college_acronym' => $r['college_acronym'],
                                'college_desc' => $r['college_desc'],
                                'college_dean' => $r['college_dean'],
                                );
                    $colleges[] = $info;
            }
            
            $data['colleges'] = $colleges;
            $this->load->view('settings_department',$data);
        }

        public function add_colleges(){
            if($_SERVER['REQUEST_METHOD']=='POST'){

                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/assets/images/";
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['max_size']     = '1000000kb';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->load->library('upload', $config);
                $this->upload->do_upload('college_logopath');
                $name = $this->upload->data('file_name');
                $location = base_url().'assets/images/'.$name.'';
                move_uploaded_file($name, $location);
                $college_acronym = $_POST['college_acronym'];
                $college_desc = $_POST['college_desc'];
                $college_dean  = $_POST['college_dean'];
                $record = array(
                    'college_acronym'=>$college_acronym,
                    'college_desc'=>$college_desc,
                    'college_dean' => $college_dean,
                    'college_logopath'=>$location,
                            );

                $last_id = $this->Dept->create1($record);
            }
                $colleges = array();
                $condition = null;
                $rs = $this->Dept->read1($condition);

                foreach($rs as $r){
                    $info = array(
                                'college_logopath'=> $r['college_logopath'],
                                'college_acronym'=> $r['college_acronym'],
                                'college_desc'=> $r['college_desc'],
                                'college_dean'=> $r['college_dean'],
                                );
                    $colleges[] = $info;
                }
            
            $data['colleges'] = $colleges;

        $this->load->view('settings_department',$data);
            
        }

        public function remove_college($college_acronym){
            $last_id = $this->Dept->remove1($college_acronym);
            redirect(base_url(). 'upload/settings_department');
        }
        //EMD OF ADMIN ACCOUNTS - SETTINGS - DEPARTMENTS
 //UPLOAD AND DOWNLOAD OF FILES INSIDE TUP USERS
       
        //END UPLOAD AND DOWNLOAD OF FILES INSIDE TUP USERS
        //ADMIN ACCOUNTS - REGISTRAR DOCUMENTS
        public function registrar_documents(){
             do{
                    $tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
                    $condition = array('trackcode'=>$tracknumber);
                    $rs = $this->Regdoc->read($condition);
                }while($rs);
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
            $data['tracknumber'] = $tracknumber;
            $this->load->view('registrar_documents',$data);
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
                                'date_admitted'=>$date_admitted,
                                'date_released'=>$date_released,
                                'status'=>$status);
            
                $last_id = $this->Regdoc->create($record);
            }
            redirect(base_url(). 'upload/registrar_documents');
        }
        //END OF ADMIN ACCOUNTS - REGISTRAR DOCUMENTS
	//ABBIEEEEEEE
	
	
	
	//END OF ABBIEEEEEE
    //OFFICES VIEW
    

    
}
?>