<?php

class PositionsModel extends CI_model {
	private $table = "positions";
	
	public function create($data){
		$this->db->create($this->table, $data);
		return TRUE;
	}
	public function read($condition=null){
		$this->db->select('*');
		$this->db->from($this->table);
		if( isset($condition) ) $this->db->where($condition);
		
		$query=$this->db->get();
		$rs = $query->result_array();
		$positions = array();
			foreach($rs as $r){
				$info = array(
					'pos_idno'=>$r['positionId'],
					'college_acronym'=>$r['collegeId'],
					'position'=>$r['position'],
				);
				$positions[] = $info;
			}return $positions;
	}
	public function deletePosition($data){
		$this->db->where();
		$this->db->delete($this->table);
		return TRUE;
	}
}