<?php

class usersModel extends CI_Model {
    
	private $table = "users";
	
	public function create($data)
	{
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
	public function read($condition=null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if( isset($condition) ) $this->db->where($condition);
		$query=$this->db->get();
		$rs= $query->result_array();
		$userdata = array();
        foreach($rs as $r)
        {
            $info = array(
                'username' => $r['username'],
                'password' => $r['password'],
                'firstname' => $r['firstname'],
                'lastname' => $r['lastname'],
                'email' => $r['email'],
				'position' => $r['position'],    
                'department'=> $r['department'],
                'path' => $r['path'],
                'collegeId' => $r['collegeId'],  
                'active' => $r['active'],
                'roleId' => $r['roleId'],        
            );
            $userdata[] = $info;
        }
        return $userdata;
	}
	public function update($condition,$data){
		$this->db->where($condition);
		$this->db->update($this->table, $data);
		
		return TRUE;	
	}
	
	public function deleteUser($username)
	{
		$this->db->where("username",$username);
		$this->db->delete($this->table);
		return TRUE;	
	}

	public function login($username,$password)
	{
		$this->db->where("username like binary",$username);
		$this->db->where("password like binary",$password);
		$query=$this->db->get("users");
		if($query->num_rows()>0)
		{
			return true;
		}	
		return false;	
	}
	public function activeUser($username){
		$this->db->select('active');
		$this->db->from($this->table);
		$this->db->where('username',$username);
		$query=$this->db->get();
		$rs= $query->result_array();
		$activated = array();
        foreach($rs as $r)
        {
            $info = array(  
                'active' => $r['active'],        
            );
            $activated = $info;
        }
        return $activated['active'];
	}
}
