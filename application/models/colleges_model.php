<?php

class colleges_model extends CI_Model {
    
	
	private $table = "colleges";
	
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
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
                                'college_logopath'=> $r['college_logopath'],
                                'college_acronym'=> $r['college_acronym'],
                                'college_desc'=> $r['college_desc'],
                                'college_dean'=> $r['college_dean'],
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
		$this->db->where('college_acronym',$data);
		$this->db->delete($this->table);
		return TRUE;	
	}
	public function read1(){
		$this->db->select('*');
		$this->db->from($this->table);
		if(isset($condition)) $this->db->where($condition);
		$query1 = $this->db->get();
		$rs1 = $query1->result_array();
		$colleges1 = array();
		foreach($rs1 as $r1){
                $info = array(
                    'collegefull' => $r1['collegefull'],
					'college_acronym' => $r1['college_acronym']
                );
                $colleges1[] = $info;
            }return $colleges1;
	}
	public function read2(){
		$this->db->select('*');
		$this->db->from($this->table);
		if(isset($condition)) $this->db->where($condition);
		$query2 = $this->db->get();
		$rs2 = $query2->result_array();
		$colleges2 = array();
		foreach($rs2 as $r2){
                    $info = array(
                                'collegefull' => $r2['collegefull'],
                                );
                    $colleges2[] = $info;
            }
            return $colleges2;
	}
	//END OF COLLEGES TABLE
}
