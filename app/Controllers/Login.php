<?php

namespace App\Controllers;

use App\Models\Usermodel;

class Login extends BaseController
{
    public function index()
    {
        $data['test']="test";
        return view('viewlogin',$data);
    }

    public function logindo(){
        $request = \Config\Services::request();
        //yang diinput
        $user =  $request->getPost('abra');
        $pass =  md5($request->getPost('kadabra'));

        //disistem
        //ambil dari db dengan user dari post
        $dbuser=new Usermodel();
        $pass_dr_db = $dbuser->getpassword($user);

        if($pass== $pass_dr_db){
            //login bener
            //return "logindo user=". $user." , password =".$pass." , passdari db =".$pass_dr_db;
            //return view('viewadmin');
            //redirect('/admin');
            $session = \Config\Services::session();
            $data['user']=$user;
            $session->set($data);

            return redirect()->to('/admin'); 
        }else{
            //login salah
            $data['error']="tidak terdaftar";
            return view('viewlogin',$data);

        }        
    }

    function logout(){
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/'); 
    }
	
	
}
