<?php

class forwardRouteModel extends CI_Model {
    
	private $table = "forwardroute";
	
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
		$documents = array();
		foreach($rs as $r){
                    $info = array(
                                'routeId' => $r['routeId'],
		                        'fileCode' => $r['fileCode'],
		                        'fileName' => $r['fileName'],
		                        'forwardDate' => $r['forwardDate'],
		                        'forwardComment' => $r['forwardComment'],
		                        'sender' => $r['sender'],
		                        'receiver' => $r['receiver'],
		                        'allowLog' => $r['allowLog'],
		                        'allowForward' => $r['allowForward'],     
                                );
                    $documents[] = $info;
            }
        return $documents;
	}

	public function countFlag($condition=null){
		$this->db->select('*');
		$this->db->from($this->table); 
		if( isset($condition) ) $this->db->where($condition);
		$query=$this->db->get();
		$rs = $query->result_array();		
		$inbox=0;
		$sent=0;
		$draft=0;
		$Flag = array();
		foreach($rs as $r){
                 if($r['receiver']==$_SESSION['username']&&$r['inboxDelete']!=TRUE&&$r['draft']!=TRUE)
                 {
                 	$inbox++;
                 }
                 if($r['sender']==$_SESSION['username']&&$r['sentDelete']!=TRUE&&$r['draft']!=TRUE){
                 	$sent++;
                 }
                 if($r['sender']==$_SESSION['username']&&$r['draft']==TRUE&&$r['draftDelete']==FALSE){
                 	$draft++;
                 }
            }
        $Flag = array($inbox,$sent,$draft);
        return $Flag;
	}
	
	public function update($data){
		$this->db->where($data);
		$this->db->update($this->table, $data);
		return TRUE;	
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
	public function deleteToSent($data,$condition){
		$this->db->update($this->table, $data,$condition);
		return TRUE;	
	}

	public function deleteToInbox($data,$condition){
		$this->db->update($this->table, $data,$condition);
		return TRUE;	
	}
	public function Seen($data,$condition){
		$this->db->update($this->table, $data,$condition);

		return TRUE;	
	}

	public function remove_draft($data){
		$this->db->where('trackcode',$data);
		$this->db->delete($this->table);
		return TRUE;	
	}
}
