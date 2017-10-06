<?php
class departments_model extends CI_Model {
	private $table = "departments";
	
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
		$departments = array();
                foreach($rs as $r){
                    $info = array(
								'college_acronym' => $r['college_acronym'],	
                                'department' => $r['department'],
								'dept_idno' => $r['dept_idno']
                                );
                    $departments[] = $info;
            }return $departments;
	}
	
	public function update($college_acronym,$department){
		$data = array('college_acronym' => $college_acronym,
						'department' => $department);
		$this->db->update($this->table,$data);
		return TRUE;	
	}
	
	public function remove($department,$dept_idno){
		$this->db->where('dept_idno',$dept_idno);
		
		$this->db->delete('departments',array('dept_idno' => $dept_idno));
		return TRUE;	
	}
	public function read1($condition=null){
		$this->db->select('*');
		$this->db->from($this->table);
		if (isset($condition)) $this->db->where($condition);
		$query = $this->db->get();
		$rs = $query->result_array();
		$departments1 = array();
		foreach($rs as $r){
                $info = array(
                    'departments'=> $r['department'],
                );
            $departments[] = $info;
        }return $departments1;
}
}