<?php
	class contactUsModel extends CI_Model
	{   
		private $table = "contactus";
		
		public function create($data){
			$this->db->insert($this->table, $data);
			return TRUE;	
		}
		
		public function read($condition=null){
			$this->db->select('*');
			$this->db->from($this->table); 
			if( isset($condition) ) $this->db->where($condition);	
			$query=$this->db->get();
	        $messages = array();
	        $rs = $query->result_array();
	        foreach($rs as $r)
	        {
	            $info = array(
	                        'idno' => $r['idno'],
	                        'author' =>$r['sender'],
	                        'email' => $r['email'],
	                        'content' => $r['content'],
	                        'datecreated' => $r['datecreated'],
	                        'dateseen' => $r['dateseen'],
	                        'seen' => $r['seen'],
	                        'bookmarked' => $r['bookmarked']     
	                    );
	            $messages[] = $info;
	        }	
			return  $messages;
		}
		
		public function update($data){
			$this->db->where($data);
			$this->db->update($this->table, $data);
			return TRUE;	
		}
		
		public function remove($data){
			$this->db->where($data);
			$this->db->delete($this->table);
			return TRUE;	
		}
	}
?>