<?php

namespace App\Models;

use CodeIgniter\Model;
class Usermodel extends Model{
	
	
	public function getuser($username,$password){
		
	}
	
	public function alldata()
	{
		return $this->db->query("select * from public.user")->getResultArray();
	}
}