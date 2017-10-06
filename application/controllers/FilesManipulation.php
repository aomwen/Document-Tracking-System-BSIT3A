<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class FilesManipulation extends CI_Controller {



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
	
	public function do_upload()
        {       
            if(!isset($_SESSION['username'])){
                     redirect().'Dts/index';
            }
            if( $_SERVER['REQUEST_METHOD']=='POST'){ 
                //configuration of uploads
                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
                $config['allowed_types'] = 'pdf|jpg|doc|docx|xml|jpeg|pptx|ppt|PDF|JPG|JPEG|DOC|DOCX|XML|JPEG|PPTX|PPT';
                $config['max_size']     = 2000000;
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;    
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userfile')){
					//getting documents from page
					$tracknumber= $_POST['trackcode'];
					$filename = $_POST['filename'].$this->upload->data('file_ext');
					$author = $_POST['author'];
					$receiver = $_POST['receiver'];
					$file_desc = $_POST['file_desc'];
					$name= $this->upload->data('file_name');
					$location = base_url().'uploads/'.$name.'';
					// move_uploaded_file($name, $location);
					$record = array('trackcode'=>$tracknumber,
									'filename'=>$filename,
									'file_desc'=>$file_desc,
									'path'=>$location   ,
									'author'=>$author, 
									'receiver'=>$receiver,       
									'status'=>'pending',);
					$last_id = $this->Files->create($record);
					redirect(base_url().'DocumentSent/mysentdocuments_view');
				}
                else{
                    echo '<script language="javascript">';
                    echo 'alert("'.$this->upload->display_errors().'")';
                    echo '</script>';
                }
            }
            do{
					$tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
                    $condition = array('trackcode'=>$tracknumber);
                    $rs = $this->Files->read($condition);
            }while($rs);
            $data['tracknumber'] = $tracknumber;
			$user = $this->session->userdata('username');
			//getting userdata
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
			//end of getting userdata
            $data['title'] = "Document Tracking System - Dashboard";
            $this->load->view('include/header',$data); 
            if($_SESSION['username'] == "admin"){    
				$this->load->view('profile_admin',$data);
            }else{
                $this->load->view('profile',$data);
            }
            $this->load->view('adddocuments', $data);
        }

        public function do_download($trackcode){
            $condition = array('trackcode'=>$trackcode);
			$documents2 = $this->Files->read1($condition);
            foreach($documents2 as $d2){
            $data = file_get_contents($d2['path']);
            force_download($d2['filename'], $data , TRUE);}
        }
    }
?>