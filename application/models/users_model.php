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

		return $query->result_array();		
	}
	
	public function update($data){
		$this->db->where($data);
		$this->db->update($this->table, $data);
		return TRUE;	
	}
	
	public function delete_student($data){
		$this->db->where($data);
		$this->db->delete($this->table);
		return TRUE;	
	}

	public function login($username,$password){
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		$query=$this->db->get("users");
		if($query->num_rows()>0){
		return true;
		}
	return false;	
	}
}
