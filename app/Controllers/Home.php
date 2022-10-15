<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
	
	public function getalluser()
    {
		$data['test']="hello";
        return view('getalluser',$data);
    }
}
