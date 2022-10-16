<?php

namespace App\Models;

use CodeIgniter\Model;
class Beritamodel extends Model{
    
	public function alldata()
	{
		return $this->db->query("select * from berita")->getResultArray();
	}

    public function create($judul,$content)
	{
		return $this->db->simpleQuery("insert into berita(judul,content) values('".$judul."','".$content."')");
	}

    public function del($id)
	{
        return $this->db->simpleQuery("delete from berita where id='".$id."'");
    }

    public function singleselect($id){
        return $this->db->query("SELECT id,judul,content from berita where id='".$id."'")->getRow();

    }

    public function upd($id,$judul,$content)
	{
        
        return $this->db->simpleQuery("update berita set judul='".$judul."',content='".$content."' where id='".$id."' ");
    }
	
	
	
}