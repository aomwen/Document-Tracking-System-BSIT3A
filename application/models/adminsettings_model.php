<?php

class adminsettings_model extends CI_Model {
    
	private $table = "departments";
	private $table1 = "colleges";
	
	//DEPARTMENT TABLE
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
		$this->db->where('departments',$data);
		$this->db->update($this->table, $data);
		return TRUE;	
	}
	
	public function remove($data){
		$this->db->where('departments',$data);
		$this->db->delete($this->table);
		return TRUE;	
	}
	//END OF DEPARTMENT TABLE

	//COLLEGES TABLE
	public function create1($data){
		$this->db->insert($this->table1, $data);
		return TRUE;	
	}
	
	public function read1($condition=null){
		$this->db->select('*');
		$this->db->from($this->table1);
		if( isset($condition) ) $this->db->where($condition);
		$query=$this->db->get();
		return $query->result_array();		
	}
	
	public function update1($data){
		$this->db->where('college_acronym',$data);
		$this->db->update($this->table, $data);
		return TRUE;	
	}
	
	public function remove1($data){
		$this->db->where('college_acronym',$data);
		$this->db->delete($this->table);
		return TRUE;	
	}
	//END OF COLLEGES TABLE
}
