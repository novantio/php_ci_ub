<?php

namespace App\Controllers;

use App\Models\Usermodel;

class Test extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        $session = \Config\Services::session();
        $data['item']='test';
        $session->set($data);


       
        return "test";
    }
	
	public function getalluser()
    {
        $session = \Config\Services::session();

        echo $session->item;

        $User=new Usermodel();
        $data['all_user'] = $User->alldata();
		$data['test']="hello";
        //return "getalluser";
        return view('getalluser',$data);
    }

    public function delete()
    {
        $session = \Config\Services::session();

        $session->destroy();
        //return "getalluser";
        return "test";
    }

}
