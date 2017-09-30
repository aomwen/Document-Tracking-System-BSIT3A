<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
                                'path' => $r['path'],
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
            $this->load->view('myaccount',$data);     
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
                                'path' => $r['path'],
                                'college_acronym' => $r['college_acronym'],           
                                );
                    $userdata[] = $info;
            }
            $data['userdata'] = $userdata;
        $this->load->view('include/header',$data);      
        $this->load->view('profile',$data);
        $this->load->view('myaccount',$data);     
        $this->load->view('editprofile',$data); 
    }

    public function editprofile_save(){
        $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
        $config['allowed_types'] = 'gif|png|jpg|jpeg';
        $config['max_size']     = '10000000kb';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
            //getting documents from page
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            $full_name = $_POST['full_name'];
            $email_address = $_POST['email_address'];
            $position = $_POST['position'];
            $college = $_POST['college_acronym'];
            $department = $_POST['department'];
            $this->upload->do_upload('path');
            $name= $this->upload->data('file_name');
            $location = base_url().'uploads/'.$name.'';
            move_uploaded_file($name, $location);
            $record = array(
                        'username'=>$username,
                        'full_name'=>$full_name,
                        'email_address'=>$email_address,
                        'password'=>$password,
                        'path' => $location,
                        'position'=>$position,
                        'college_acronym'=>$college,
                        'department' => $department);
            if($this->Users->update($record)){
                    $success = "Account successfully created!";
                    $data['success']=$success;

                    redirect(base_url().'Account/myaccount_view');
                }else{
                    $error = "Error!!!";
                    $data['error']=$error;
                redirect(base_url().'Account/myaccount_view');
                }
            }
    
}
?>