<?php

namespace App\Controllers;

use App\Models\Usermodel;
use App\Models\Beritamodel;

class Admin extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        if(!isset( $session->user)){
            //echo "tidakk login";
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }else{
            $dbberita = new Beritamodel();
            $data['berita']=$dbberita->alldata();


            return view('viewadmin',$data);
        }

        //
    }

    //tampung
    public function create()
    {
        $session = \Config\Services::session();

        if(!isset( $session->user)){
            //echo "tidakk login";
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }else{
            
            $dbberita = new Beritamodel();

            $request = \Config\Services::request();
            //yang diinput
            $judul =  $request->getPost('judul');
            $content =  $request->getPost('content');
            //return $judul."".$content;

            $dbberita->create($judul,$content);
            return redirect()->to('/admin'); 

            //return view('viewadmin',$data);
        }

    }

    public function del(){
        $session = \Config\Services::session();
        if(!isset( $session->user)){
            //echo "tidakk login";
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }else{
            
            $dbberita = new Beritamodel();

            $request = \Config\Services::request();
            //yang diinput
            $id =  $request->getGet('id');
            //return $judul."".$content;

            //return  $id;

            $dbberita->del($id);
            
            return redirect()->to('/admin'); 

            //return view('viewadmin',$data);
        }
    }

    public function ed(){
        $session = \Config\Services::session();
        if(!isset( $session->user)){
            //echo "tidakk login";
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }else{
            
            $dbberita = new Beritamodel();

            $request = \Config\Services::request();
            //yang diinput
            $id =  $request->getGet('id');
            //return $judul."".$content;

            //return  $id;

            $data['edit'] = $dbberita->singleselect($id);
            
            //return redirect()->to('/admin'); 

            //return view('viewadmin',$data);
            return view('viewedit',$data);
        }
    }

    public function upd(){
        $session = \Config\Services::session();
        if(!isset( $session->user)){
            //echo "tidakk login";
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }else{
            
            $dbberita = new Beritamodel();

            $request = \Config\Services::request();
            //yang diinput
            $id =  $request->getPost('id');
            $judul =  $request->getPost('judul');
            $content =  $request->getPost('content');

            //return $id."".$judul."".$content;

            //return  $id;

            $dbberita->upd($id,$judul,$content);
            
            return redirect()->to('/admin'); 

            //return view('viewadmin',$data);
           // return view('viewedit',$data);
        }

    }

    
	
	
}
