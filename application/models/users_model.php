<?php

class Users_model extends CI_Model {
    
	private $table = "users";
	
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
	}
	   
	public function read($condition=null){
		$this->db->select('*');
		$this->db->from($this->table);
		if( isset($condition) ) $this->db->where($condition);
		
		$query=$this->db->get();
		$rs= $query->result_array();
		$userdata = array();
            foreach($rs as $r){
                $info = array(
                	'idno' => $r['idno'],
                    'username' => $r['username'],
                    'password' => $r['password'],
                    'firstname' => $r['firstname'],
                    'lastname' => $r['lastname'],
                    'email_address' => $r['email_address'],
					'position' => $r['position'],    
                    'department'=> $r['department'],
                    'college_acronym' => $r['college_acronym'],           
                );
                $userdata[] = $info;
            }
            return $userdata;
	}
	
	public function update($record,$user1){
		$this->db->update($this->table, $record, $user1);
		return TRUE;	
	}
	
	public function delete_student($username){
		$this->db->where("username",$username);
		$this->db->delete($this->table);
		return TRUE;	
	}

	public function login($username,$password){
		$this->db->where("username like binary",$username);
		$this->db->where("password like binary",$password);
		$query=$this->db->get("users");
		if($query->num_rows()>0){
		return true;
		}	
	return false;	
	}
}
