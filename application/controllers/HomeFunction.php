<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeFunction extends CI_Controller {

	public function __construct(){
		parent::__construct();
    //LOADING OF MODEL AND HELPERS
		$this->load->helper(array('form', 'url'));
        $this->load->model('files_model','Files');
        $this->load->model('users_model','Users');
        $this->load->model('adminsettings_model','Dept');
        $this->load->model('registrardoc_model','Regdoc');
		$this->load->model('homeFunction_model','msgtoAdmin');
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
            $last_id = $this->msgtoAdmin->create($record);

        }
        redirect(base_url().'Dts/index');
    }
}
?>