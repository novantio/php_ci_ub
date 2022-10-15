<?php

namespace App\Controllers;

use App\Models\Usermodel;

class Test extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        return "test";
    }
	
	public function getalluser()
    {
        $User=new Usermodel();
        $data['all_user'] = $User->alldata();
		$data['test']="hello";
        //return "getalluser";
        return view('getalluser',$data);
    }
}
