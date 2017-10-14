<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentDraft extends CI_Controller {



    public function __construct(){
        parent::__construct();
        $this->load->model('documentsModel','Files');
        $this->load->model('usersModel','User');
        if(!isset($_SESSION['username']))
        {
            redirect().'Dts/index';
        }
    }
    public function viewDraft()
    {
        $data['title'] = "Document Tracking System - Dashboard";

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = null;
        $documents = $this->Files->read($condition);
        $data['documents']=$documents;
        
        $this->load->view('include/header',$data);  
        if($_SESSION['username'] == "admin"){    
            $this->load->view('profileAdmin',$data);
        }else{
            $this->load->view('profile',$data);
        }
        $this->load->view('viewDraftDoc',$data);
    }

    public function viewDraftMess($trackcode)
    {
        date_default_timezone_set('Asia/Manila');
        $condition = Array('trackcode' => $trackcode);
        $data = array('seen' => TRUE,
                    'date_received' => date('Y-m-d h:i:s'),
                    'status' => 'received');
        $this->Files->Seen($data,$condition);

        $data['title'] = "Document Tracking System - Dashboard";

        $user = $this->session->userdata('username');
        $condition = array('username' => $user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $condition = array('trackcode' => $trackcode);
        $documents = $this->Files->read($condition);
        $data['documents']=$documents;

        $this->load->view('include/header',$data);  
        if($_SESSION['username'] == "admin"){    
            $this->load->view('profileAdmin');
        }else{
            $this->load->view('profile');
        }
        $this->load->view('viewDraftMess');
        
    }

    public function removeDraftMess($trackcode)
    {
        $this->Files->removeToDraft($trackcode);
        echo '<script language="javascript">';
        echo 'alert("Successfully removed")';
        echo '</script>';
        redirect(base_url('DocumentInbox/viewDraft'));
    }
}
?>