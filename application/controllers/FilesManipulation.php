<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class FilesManipulation extends CI_Controller {



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
 public function do_upload()
        {       
            if(!isset($_SESSION['username'])){
                     redirect().'Dts/index';
                }
            if( $_SERVER['REQUEST_METHOD']=='POST'){ 
                //configuration of uploads
                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
                $config['allowed_types'] = 'pdf|jpg|doc|docx|xml|jpeg';
                $config['max_size']     = '100000kb';
                $config['remove_spaces'] = TRUE;    
                $this->load->library('upload', $config);
                    $this->upload->do_upload('userfile');
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
                $data = file_get_contents($r['path']);
                force_download($r['filename'], $data,TRUE);
            
                $info = array(
                            'trackcode' => $r['trackcode'],
                            'filename' => $r['filename'],
                            'author' => $r['author'],
                            'datecreated' => $r['datecreated'],
                            'status' => $r['status'],    
                            'path'=>$r['path']
                            );

            // header('Content-Type: application/octet-stream');
            // header('Content-Disposition: attachment; filename="'.$info['filename'].'"');
            // header('Content-Length: '.filesize($info['path']));
            // readfile($info['path']);
            }
        }
    }
?>