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

	public function log_in(){
        $error=null;
        $data['error']=$error;
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->form_validation->set_rules('Username', 'Username', 'required');
            $this->form_validation->set_rules('Password', 'Password', 'required');
            if($this->form_validation->run()){
                $username = $this->input->post('Username');
                $password = $this->input->post('Password');
                $this->load->library('session');
                $this->load->model('users_model');
                if($this->users_model->login($username,$password)){
                    echo "3";
                    $session_data = array(
                        'username' => $username
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url(). 'Dts/session_check');
                }else{
                    $error = "Invalid username or Password!";
                    $data['error']=$error;
                }
            }
        }
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('login',$data);
    }

    public function signup(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            $full_name = $_POST['full_name'];
            $email_address = $_POST['email_address'];
            $position = $_POST['position'];
            $college = $_POST['college'];
            $department = $_POST['department'];
            $record = array(
                        'username'=>$username,
                        'full_name'=>$full_name,
                        'email_address'=>$email_address,
                        'password'=>$password,
                        'position'=>$position,
                        'college_acronym'=>$college,
                        'department' => $department);
            if($this->Users->create($record)){
                    $success = "Account successfully created!";
                    $data['success']=$success;
                    redirect(base_url().'Dts/index');
                }else{
                    $error = "Error!!!";
                    $data['error']=$error;
                redirect(base_url().'Dts/signup');
                }
            }
            $college = array();
            $condition = array();
            $rs = $this->Dept->read1($condition);
            foreach($rs as $r){
                $info = array(
                    'college_acronym' => $r['college_acronym']
                );
                $college = $info;
            }
            $department = array();
            $rs = $this->Dept->read($condition);
            foreach($rs as $r){
                $info = array(
                    'college_acronym' => $r['college_acronym'],
                    'department' => $r['department']
                );
                $department = $info;
            }
        $data['department'] = $department;
        $data['college']=$college;
        $data['title'] = "Document Tracking System - Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('register',$data);
    }

	public function session_check(){
		if($this->session->userdata('username')!=''){
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
            if($_SESSION['username'] == "admin"){
                $data['userdata'] = $userdata;
                $this->load->view('include/header',$data);      
                $this->load->view('profile_admin',$data);
            }else{
                $data['userdata'] = $userdata;
    			$this->load->view('include/header',$data);		
    			$this->load->view('profile',$data);
            }
		}else{
			redirect(base_url(). 'Dts/index');
		}
	}

	public function session_checkout(){
		$this->session->unset_userdata('username');
		redirect(base_url(). 'Dts/index');
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
        public function do_upload()
        {       


            if( $_SERVER['REQUEST_METHOD']=='POST'){ 
                //configuration of uploads
                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
                $config['allowed_types'] = 'pdf|jpg|doc|docx|xml|jpeg';
                $config['max_size']     = '10000000kb';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload', $config);

                 if($this->upload->do_upload('userfile')){
                        $tracknumber="success";
                        $data['tracknumber']= $tracknumber;
                    }else{
                        $tracknumber="failed";
                        $data['tracknumber']= $tracknumber;
                    }
                    $this->upload->do_upload('userfile');
                    //getting documents from page
                    $tracknumber= $_POST['trackcode'];
                    $filename = $_POST['filename'];
                    $author = $_POST['author'];
                    $receiver = $_POST['receiver'];
                    $file_desc = $_POST['file_desc'];
                    $name= $this->upload->data('file_name');
                    $this->upload->do_upload('userfile');
                    $location = base_url().'uploads/'.$name.'';
                    move_uploaded_file($name, $location);
                    $record = array('trackcode'=>$tracknumber,
                                    'filename'=>$filename,
                                    'file_desc'=>$file_desc,
                                    'path'=>$location   ,
                                    'author'=>$author, 
                                    'receiver'=>$receiver,       
                                    'status'=>'pending',);
            
                    $last_id = $this->Files->create($record);
                    redirect(base_url().'Dts/mysentdocuments_view');
                }
             do{
                    $tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
                    $condition = array('trackcode'=>$tracknumber);
                    $rs = $this->Files->read($condition);
                }while($rs);
            $user = $this->session->userdata('username');
            $userdata = array();
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
            $this->load->view('profile',$data);
            $this->load->view('adddocuments', $data);
        }

        public function do_download($trackcode){
            $condition = array('trackcode'=>$trackcode);
            $rs = $this->Files->read($condition);
            foreach($rs as $r){
                $info = array(
                            'trackcode' => $r['trackcode'],
                            'filename' => $r['filename'],
                            'author' => $r['author'],
                            'datecreated' => $r['datecreated'],
                            'status' => $r['status'],    
                            'path'=>$r['path']            
                            );
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$info['filename'].'"');
            header('Content-Length: '.filesize($info['path']));
            readfile($info['path']);
            }
        }
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
	public function mysentdocuments_view(){

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
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
			$this->load->view('mysentdocuments_view');			
	}
	public function myaccount_view(){
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
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
            $this->load->view('myaccount');		
	}
	public function editprofile_view(){
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
        $this->load->view('include/header',$data);      
         $this->load->view('profile',$data);
		$this->load->view('myaccount');		
	}
	//END OF ABBIEEEEEE
    //OFFICES VIEW
    public function Office_view(){
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
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
            $this->load->view('offices',$data); 
    }
    public function office_content($college_acronym){
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
    //END OF PROFILE DETAIL
    //DEPARTMENT DETAILS
            $data['userdata'] = $userdata;
            $this->load->view('include/header',$data);      
            $this->load->view('profile',$data);
            
            $departments = array();
            $condition = array('college_acronym' => $college_acronym);
            $rs = $this->Dept->read($condition);
                foreach($rs as $r){
                    $info = array(
                                'department' => $r['department'],
                                'department_head' => $r['department_head']
                                );
                    $departments[] = $info;
            }

            $data['departments'] = $departments;
    //END OF DEPARTMENT DETAILS
    //COLLEGE DETAILS
            $collegefull = array();
            $condition = array('college_acronym' => $college_acronym);
            $rs = $this->Dept->read1($condition);
                foreach($rs as $r){
                    $info = array(
                                'collegefull' => $r['collegefull'],
                                );
                    $collegefull[] = $info;
            }
            $data['collegefull']=$collegefull;
    //END OF COLLEGE DETAILS
            $users = array();
            $condition = array('college_acronym' => $college_acronym);
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
                    $users[] = $info;
            }
            $data['users']=$users;

            $this->load->view('offices_content',$data);
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