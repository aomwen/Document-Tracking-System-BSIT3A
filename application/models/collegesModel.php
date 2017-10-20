<?php

class collegesModel extends CI_Model {
    
	
	private $table = "colleges";
	
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
		$rs = $query->result_array();		
		$colleges = array();
		foreach($rs as $r){
                    $info = array(
                                'collegeLogo'=> $r['collegeLogo'],
                                'collegeId'=> $r['collegeId'],
                                'collegefull' => $r['collegefull'],
                                'collegeDesc'=> $r['collegeDesc'],
                                'collegeDean'=> $r['collegeDean'],
                                );
                    $colleges[] = $info;
        }
		return $colleges;
	}
	
	public function update($record,$ca){
		$this->db->update($this->table, $record, $ca);
		return TRUE;	
	}
	
	public function remove($data){
		$this->db->where('collegeId',$data);
		$this->db->delete($this->table);
		return TRUE;	
	}

}
