 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class FilesManipulation extends CI_Controller {



    public function __construct(){
        parent::__construct();
        $this->load->model('documentsModel','Files');
        $this->load->model('usersModel','User');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
    
    public function sendFile()
    {       
            if(!isset($_SESSION['username']))
            {
                     redirect().'Dts/index';
            }
            if( $_SERVER['REQUEST_METHOD']=='POST')
            { 
                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
                $config['allowed_types'] = 'pdf|jpg|doc|docx|xml|jpeg|pptx|ppt|PDF|JPG|JPEG|DOC|DOCX|XML|JPEG|PPTX|PPT';
                $config['max_size']     = 2000000;
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;    
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $tracknumber= $_POST['trackcode'];
                $sender = $_POST['sender'];
                $receiver = $_POST['receiver'];
                $fileDesc = $_POST['fileDesc'];
                if(isset($_SESSION['path']))
                {
                    $filename = $_POST['filename'];
                    $location = $_SESSION['path'];
                    
                }else
                {  
                $this->upload->do_upload('userfile');
                $filename = $_POST['filename'].$this->upload->data('file_ext');
                $name= $this->upload->data('file_name');
                $location = base_url().'uploads/'.$name.'';
                }
                $record = array('trackcode'=>$tracknumber,
                                'filename'=>$filename,
                                'fileDesc'=>$fileDesc,
                                'path'=>$location   ,
                                'sender'=>$sender, 
                                'receiver'=>$receiver,       
                                'status'=>'pending',);
                $this->Files->create($record);
                redirect(base_url().'DocumentSent/viewSent');
            }
            do
            {
                $tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
                $condition = array('trackcode'=>$tracknumber);
                $rs = $this->Files->read($condition);
            }while($rs);
            $data['tracknumber'] = $tracknumber;
            $user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            $data['title'] = "Document Tracking System - Dashboard";
            $this->load->view('include/header',$data); 
            if($_SESSION['username'] == "admin")
            {    
                $this->load->view('profileAdmin');
            }else
            {
                $this->load->view('profile');
            }
            $this->load->view('compose');
        }


        public function forward($trackcode){
           if( $_SERVER['REQUEST_METHOD']=='POST')
           { 
                $config['upload_path'] =dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
                $config['allowed_types'] = 'pdf|jpg|doc|docx|xml|jpeg|pptx|ppt|PDF|JPG|JPEG|DOC|DOCX|XML|JPEG|PPTX|PPT';
                $config['max_size']     = 2000000;
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;    
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $tracknumber= $_POST['trackcode'];
                $author = $_POST['author'];
                $receiver = $_POST['receiver'];
                $file_desc = $_POST['file_desc'];
                if(isset($_SESSION['path']))
                {
                    $filename = $_POST['filename'];
                    $location = $_SESSION['path'];
                    
                }else
                {  
                $this->upload->do_upload('userfile');
                $filename = $_POST['filename'].$this->upload->data('file_ext');
                $name= $this->upload->data('file_name');
                $location = base_url().'uploads/'.$name.'';
                }
                $record = array('trackcode'=>$tracknumber,
                                'filename'=>$filename,
                                'file_desc'=>$file_desc,
                                'path'=>$location   ,
                                'author'=>$author, 
                                'receiver'=>$receiver,       
                                'status'=>'pending',);
                $this->Files->create($record);
                redirect(base_url().'DocumentSent/viewSent');
            }
            $condition = array( 'trackcode' => $trackcode );
            $documents2 = $this->Files->read1($condition);
            $data['documents'] = $documents2;
            foreach($documents2 as $d)
            {
                $path = $d['path'];
            }
            $session_data = array
            (
                'path' => $path
            );
            $this->session->set_userdata($session_data);
            $user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;
            $data['title'] = "Document Tracking System - Dashboard";
            do
            {
                $tracknumber = rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9).'-'.rand(0,9).rand(0,9).rand(0,9);
                $condition = array('trackcode'=>$tracknumber);
                $rs = $this->Files->read($condition);
            }while($rs);
            $data['tracknumber'] = $tracknumber;
            $this->load->view('include/header',$data); 
            if($_SESSION['username'] == "admin")
            {    
                $this->load->view('profileAdmin',$data);
            }else
            {
                $this->load->view('profile',$data);
            }
            $this->load->view('forwardDocument', $data);
        }

        public function downloadFile($trackcode)
        {
            $condition = array('trackcode'=>$trackcode);
            $documents2 = $this->Files->read1($condition);
            foreach($documents2 as $d2)
            {
            $data = file_get_contents($d2['path']);
            force_download($d2['filename'], $data , TRUE);
        }
        }
    }
?>