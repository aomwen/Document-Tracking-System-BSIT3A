<?php
class departmentsModel extends CI_Model {
	private $table = "departments";
	
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
		$departments = array();
                foreach($rs as $r){
                    $info = array(
								'collegeId' => $r['collegeId'],	
                                'department' => $r['department'],
								'deptId' => $r['deptId'],
								'departmentHead' => $r['departmentHead']
                                );
                    $departments[] = $info;
            }return $departments;
	}
	
	public function update($collegeId,$department,$deptId){
		$data = array('collegeId' => $collegeId,
						'department' => $department);
		$this->db->where('deptId',$deptId);
		$this->db->update($this->table,$data);
		return TRUE;	
	}
	
	public function remove($department,$deptId){
		$this->db->where('deptId',$deptId);
		
		$this->db->delete('departments',array('deptId' => $deptId));
		return TRUE;	
	}
}