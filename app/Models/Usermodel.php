<?php

namespace App\Models;

use CodeIgniter\Model;
class Usermodel extends Model{
	
	public function getpassword($username){
		return $this->db->query("SELECT md5(PASSWORD) pass FROM public.user WHERE username='".$username."'")->getRow()->pass;
	}

	public function getuser($username,$password){
		
	}
	
	public function alldata()
	{
		return $this->db->query("select * from public.user")->getResultArray();
	}
}