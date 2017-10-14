<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class homeFunctions extends CI_Controller
    {
    	public function __construct()
        {
    		parent::__construct();
            $this->load->model('registrarDocumentsModel','regDoc');
    		$this->load->model('contactUsModel','contact');
        }

        public function contactUs()
        {
            if($_SERVER['REQUEST_METHOD']=="POST")
            {
                $author = $_POST['sender'];
                $email = $_POST['email'];
                $content = $_POST['content'];
                $record = array('sender'=> $author,
                                'email' => $email,
                                'content'=> $content);
                $this->contact->create($record);
            }
            redirect(base_url().'Dts/index');
        }

         public function registrarTrackDoc(){
            $data['title'] = "Document Tracking System - Dashboard";
            $this->load->view('include/header',$data);
            $this->load->view('registrarTrackDoc');
        }

        public function trackdocument(){
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $tracknumber = $_POST['track'];
                $documents_status = array();
                $condition = array('trackcode' => $tracknumber);
                $rs = $this->regDoc->read($condition);

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

                $data['title'] = "Document Tracking System - Dashboard";
                $this->load->view('include/header',$data);
                $this->load->view('trackdocument',$data);
            }
        }
    }
?>