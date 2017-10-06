<?php

class documents_model extends CI_Model {
    
	private $table = "documents";
	
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
	}
	
	public function read($condition=null){
		
		// SELECT * FROM students
		
		$this->db->select('*');
		$this->db->from($this->table); 
		
		// $this->db->select()
				// ->from()
				// ->join()
				// ->where();
		
		// $this->db->join('table2','table1.key=table2.fk','inner');
		// $this->db->order_by('field_name');
		
		if( isset($condition) ) $this->db->where($condition);
		
		$query=$this->db->get();

		$rs = $query->result_array();		
		$documents = array();
		foreach($rs as $r){
                    $info = array(
                                'trackcode' => $r['trackcode'],
                                'filename' => $r['filename'],
                                'author' => $r['author'],
                                'receiver' => $r['receiver'],
                                'datecreated' => $r['datecreated'],
                                'status' => $r['status'],    
                                'path'=>$r['path']            
                                );
                    $documents[] = $info;
            }return $documents;
	}
	
	public function update($data){
		$this->db->where($data);
		$this->db->update($this->table, $data);
		return TRUE;	
	}
	
	public function sortdata($data){
		$this->db->like('trackcode', $data);
		$query1=$this->db->get($this->table);
		$rs1 = $query1->result_array();		
		$documents1 = array();
		foreach($rs1 as $r1){
            $info = array(
                        'trackcode' => $r1['trackcode'],
                        'filename' => $r1['filename'],
                        'author' => $r1['author'],
                        'receiver' => $r1['receiver'],
                        'datecreated' => $r1['datecreated'],
                        'status' => $r1['status'],    
                        'path'=>$r1['path'],
                        'file_desc' => $r1['file_desc']            
                        );
            $documents1[] = $info;
        }return $documents1;
		
	}
	public function read1($condition){
		$this->db->select('*');
		$this->db->from ($this->table);
		if(isset($condition)) $this->db->where($condition);
		$query2=$this->db->get();
		$rs2 = $query2->result_array();		
		$documents2 = array();
		foreach($rs2 as $r2){
                    $info2 = array(
                            'filename' => $r2['filename'],
                            'path' => $r2['path'],
                                );
                    $documents2[] = $info2;
            }return $documents2;
        }
	public function delete_student($data){
		$this->db->where($data);
		$this->db->delete($this->table);
		return TRUE;	
	}
}
