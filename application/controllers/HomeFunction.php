<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeFunction extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('document_model','Files');
        $this->load->model('users_model','User');
        $this->load->model('departments_model','Dept');
        $this->load->model('colleges_model','Coll');
        $this->load->model('documentstatus_model','Docstat');
		$this->load->model('contactus_model','msgAd');
    //LOADING OF MODEL AND HELPERS 
	}

//Contact Us Messages
    public function msgtoAdmin(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $author = $_POST['author'];
            $receiver = "admin";
            $content = $_POST['content'];
            $record = array(
                        'receiver' => $receiver,
                        'author'=>$author,
                        'content'=>$content);
            $last_id = $this->msgAd->create($record);

        }
        redirect(base_url().'Dts/index');
    }
}
?>