<?php

class registrarDocumentsModel extends CI_Model {
    
	private $table = "registrardocuments";
	
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
	}
	public function check_duplicate($data){

        $this->db->where($data);

        $query = $this->db->get($this->table);

        $count_row = $query->num_rows();

        if ($count_row > 0) {
            return TRUE; 
         } else {
            return FALSE; 
         }
    }
	public function read($condition=null){
		$this->db->select('*');
		$this->db->from($this->table);
		if( isset($condition) ) $this->db->where($condition);
		
		$query=$this->db->get();

		return $query->result_array();		
	}

	public function getLastId($condition){
		$this->db->select('idno');
		$this->db->from($this->table);
		$this->db->where($condition);
		$this->db->order_by('idno', 'desc'); 
		$this->db->limit(1);
		$query = $this->db->get();
		$rs=$query->result_array();
		$lastId = array();
	
        foreach($rs as $r){
            $info = array(
            			'idno' => $r['idno'],
                        );
            $lastId = $info;
        }
        return $lastId;
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
