<?php

class PositionsModel extends CI_model {
	private $table = "positions";
	
	public function create($data){
		if(!$this->db->insert($this->table,$data))
		{
			$error = $this->db->error();
			echo $error;
		}
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
	public function get_lastId(){
		$this->db->select('positionId');
		$this->db->from($this->table);
		$this->db->order_by('positionId', 'desc'); 
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function deletePosition($data){
		$this->db->where();
		$this->db->delete($this->table);
		return TRUE;
	}
}