<?php

class registrarDocumentsModel extends CI_Model {
    
	private $table = "registrardocuments";
	
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
	
	public function update($data,$condition){
		$this->db->update($this->table, $data, $condition);
		return TRUE;	
	}
	
	public function remove($data){
		$this->db->where('departments',$data);
		$this->db->delete($this->table);
		return TRUE;	
	}
}
