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
            $config['file_name'] = $_POST['fileName'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $fileCode= $_POST['fileCode'];
            $fileAuthor = $_POST['fileAuthor'];
            $fileComment = $_POST['fileComment'];
            $fileName = $_POST['fileName'];
            $this->upload->do_upload('filePath');
            // $fileName = $_POST['fileName'].$this->upload->data('file_ext');
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

    public function forwardFile(){
       if( $_SERVER['REQUEST_METHOD']=='POST')
       {
            $routeId= $_POST['routeId'];
            $sender = $_POST['sender'];
            $receiver = $_POST['receiver'];
            $forwardComment = $_POST['forwardComment'];
            $fileName = $_POST['fileName'];
            $fileCode = $_POST['fileCode'];
            $record = array('routeId'=>$routeId,
                            'fileName'=>$fileName,
                            'fileCode'=>$fileCode,
                            'forwardComment'=>$forwardComment,
                            'sender'=>$sender, 
                            'receiver'=>$receiver,);
            $this->Route->create($record);
            redirect(base_url().'DocumentStatus/viewDocuments');
        }
    }

    public function downloadFile($fileCode)
    {
        $condition = array('fileCode'=>$fileCode);
        $documents2 = $this->files->read($condition);
        foreach($documents2 as $d2)
        {
            $file_parts = pathinfo($d2['filePath']);
            echo '<script>alert("'.$d2['filePath'].'");</script>';
            $data = file_get_contents($d2['filePath']);
            force_download($d2['fileName'].'.'.$file_parts['extension'], $data);
        }
    }

    public function previewFile($fileCode)
    {
        $condition = array('fileCode'=>$fileCode);
        $files = $this->files->read($condition);
        foreach($files as $f){
            $record = array(
            $filePath = $f['filePath'],
            $fileName = $f['fileName']); 
            header('Content-type: application/pdf');
            header('Content-disposition: inline; filename= "'.$fileName.'"');
            header('Content-Transfer-Encoding: binary');
            readfile($filePath);
        }
    }
}
?>