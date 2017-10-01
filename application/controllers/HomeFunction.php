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
            $email = $_POST['email'];
            $content = $_POST['content'];
            $record = array(
                        'author'=>$author,
                        'content'=>$content);
            $last_id = $this->msgtoAdmin->create($record);

        }
        redirect(base_url().'Dts/index');
    }

    public function viewmsgtoAdmin(){
        $condition = null ;
        $messages = array();
        $rs = $this->msgtoAdmin->read($condition);
        foreach($rs as $r){
            $info = array(
                        'idno' => $r['idno'],
                        'author' =>$r['author'],
                        'email' => $r['email'],
                        'content' => $r['content'],
                        'datecreated' => $r['datecreated'],
                        'dateseen' => $r['dateseen'],
                        'seen' => $r['seen'],
                        'bookmarked' => $r['bookmarked']     
                    );
            $messages[] = $info;
        }
        $data['messages'] = $messages;
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
        $this->load->view('include/header');
        $this->load->view('profile_admin',$data);
        $this->load->view('msgtoAdmin_view',$data);
    }

    public function seenmsgtoAdmin($idno,$seen){
        if($seen == FALSE){
            $dateseen = date("Y-m-d h:i:sa");
            $record = array('dateseen'=>$dateseen,
                            'seen'=>TRUE);
            if($this->msgtoAdmin->update($idno,$record)){
            }else{
                $error = "Error!!!";
                $data['error']=$error;
                redirect(base_url().'HomeFunction/viewmsgtoAdmin');
            }
        }
        $condition = array('idno'=>$idno) ;
        $messages = array();
        $rs = $this->msgtoAdmin->read($condition);
        foreach($rs as $r){
            $info = array(
                        'idno' => $r['idno'],
                        'author' =>$r['author'],
                        'email' => $r['email'],
                        'content' => $r['content'],
                        'datecreated' => $r['datecreated'],
                        'dateseen' => $r['dateseen'],
                        'seen' => $r['seen'],
                        'bookmarked' => $r['bookmarked']     
                    );
            $messages[] = $info;
        }
        $data['messages'] = $messages;
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
        $success = "Account successfully created!";
        $data['success']=$success;
        $this->load->view('include/header');
        $this->load->view('profile_admin',$data);
        $this->load->view('msgtoAdmin_seen',$data);
        
    }
}
?>