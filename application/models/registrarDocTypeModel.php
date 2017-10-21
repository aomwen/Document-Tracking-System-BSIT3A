<?php
class registrarDocTypeModel extends CI_Model {
	
	private $table = "registrardoctype";
	
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
		$status = array();
                foreach($rs as $r){
                    $info = array(
                    			'typeId' => $r['typeId'],
								'docType' => $r['docType']
                                );
                    $status[] = $info;
            }return $status;
	}
	
	public function update($typeId,$docType){
		$condition = array('typeId' => $typeId);
		$data = array('docType' => $docType);
		$this->db->update($this->table,$data,$condition);
		return TRUE;	
	}
	public function getTypeId($data){
		$this->db->select('typeId');
		$this->db->where($data);
		$query=$this->db->get();
		$rs = $query->result_array();
		$typeId=array();
			foreach($rs as $r){
				$info = array('typeId'=>$r['typeId']);
				$typeId=$info;
			}
		return $typeId;
	}
	public function remove($docType,$typeId){
		$this->db->where('typeId',$typeId);
		
		$this->db->delete($this->table,array('typeId' => $typeId));
		return TRUE;	
	}
}