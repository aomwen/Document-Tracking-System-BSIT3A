<?php

class notification_model extends CI_Model {
    
	private $table = "notification";
	
	//DEPARTMENT TABLE
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
	}
	
	public function read($condition=null){
		$this->db->select('*');
		$this->db->from($this->table);
		if( isset($condition) ) $this->db->where($condition);
		$notifs=array();
		$query=$this->db->get();
		$rs= $query->result_array();		
		 $notifs = array();
         	    foreach($rs as $r){
                    $info = array(
                                'username' => $r['username'],
                                'notifDesc' => $r['notifDesc'],
                                'seenFlag' => $r['seenFlag'],
                                'date' => $r['date'],
                                'notifType' => $r['notifType'],
                                'trackcode' =>  $r['trackcode']  
                                );
                    $notifs[] = $info;
            }
            return $notifs;
	}

	// public function remove($department,$dept_idno){
	// 	$this->db->where('dept_idno',$dept_idno);
		
	// 	$this->db->delete('departments',array('dept_idno' => $dept_idno));
	// 	return TRUE;	
	// }
}