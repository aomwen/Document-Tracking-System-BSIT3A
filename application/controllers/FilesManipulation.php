 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class FilesManipulation extends CI_Controller {



    public function __construct(){
        parent::__construct();
        $this->load->model('usersModel','User');
        $this->load->model('filesModel','files');
        $this->load->model('departmentsModel','Dept');
        $this->load->model('collegesModel','Colleges');
        $this->load->model('forwardRouteModel','Route');
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
            $config['allowed_types'] = 'pdf|PDF';
            $config['max_size']     = 2000000;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $fileCode= $_POST['fileCode'];
            $fileAuthor = $_POST['fileAuthor'];
            $fileComment = $_POST['fileComment'];

            $this->upload->do_upload('filePath');
            // $fileName = $_POST['fileName'].$this->upload->data('file_ext');
            $fileName = $_POST['fileName'];
            $name= $this->upload->data('file_name');
            $location = base_url().'uploads/'.$name.'';
            $record = array(
                            'fileCode'=>$fileCode,
                            'fileName'=>$fileName,
                            'fileComment'=>$fileComment,
                            'filePath'=>$location   ,
                            'fileAuthor'=>$fileAuthor,);     
            $this->files->create($record);
            redirect(base_url().'Dashboard/dashboardView');
        }
    }

    public function forwardFile($fileCode){
        
         do
        {
            $fileCode = rand(0,9999);
            $condition = array('fileCode'=>$fileCode);
            $rs = $this->files->read($condition);
        }while($rs);
        $data['fileCode'] = $fileCode;
           if( $_SERVER['REQUEST_METHOD']=='POST')
           { 
            do
            {
                $fileCode = rand(0,9999);
                $condition = array('fileCode'=>$fileCode);
                $rs = $this->files->read($condition);
            }while($rs);
            $data['fileCode'] = $fileCode;
                $routeId= $_POST['routeId'];
                $sender = $_POST['sender'];
                $receiver = $_POST['receiver'];
                $forwardComment = $_POST['forwardComment'];
                $fileName = $_POST['fileName'];
                $fileCode = $_POST['fileCode'];
                if(isset($_POST['allowLog'])){ $allowLog = TRUE; }else{ $allowLog = FALSE; }
                if(isset($_POST['allowForward'])){$allowForward = TRUE; }else{ $allowForward = FALSE;}
                $record = array('routeId'=>$routeId,
                                'fileName'=>$fileName,
                                'fileCode'=>$fileCode,
                                'forwardComment'=>$forwardComment,
                                'sender'=>$sender, 
                                'receiver'=>$receiver,
                                'allowLog' => $allowLog,
                                'allowForward' => $allowForward);
                $this->Route->create($record);
                redirect(base_url().'DocumentStatus/viewDocuments');
            }

            $condition = array( 'fileCode' => $fileCode );
            $documents = $this->files->read($condition);
            $data['documents'] = $documents;

            $user = $this->session->userdata('username');
            $condition = array('username' => $user);
            $userdata = $this->User->read($condition);
            $data['userdata'] = $userdata;

            $condition = null;
            $users = $this->User->read($condition);
            $data['users'] = $users;

            $condition = null;
            $departments = $this->Dept->read($condition);
            $data['departments'] = $departments;
            
            $condition = null;
            $colleges = $this->Colleges->read($condition);
            $data['colleges'] = $colleges;

            $data['title'] = "Document Tracking System - Dashboard";
            do
            {
                $routeId = rand(0,9999);
                $condition = array('routeId'=>$routeId);
                $rs = $this->Route->read($condition);
            }while($rs);

            $data['routeId'] = $routeId;
            $this->load->view('include/header',$data);

            if($_SESSION['username'] == "admin")
            {    
                $this->load->view('profileAdmin');
            }else
            {
                $this->load->view('profile');
            }
            $this->load->view('forwardDocument');
        }

           public function downloadFile($fileCode)
        {
            $condition = array('fileCode'=>$fileCode);
            $documents2 = $this->files->read($condition);
            foreach($documents2 as $d2)
            {
                $data = file_get_contents($d2['filePath']);
                force_download($d2['filePath'], NULL );
            }
        }
    }
?>