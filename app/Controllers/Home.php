<?php
//hola
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'principal';
        echo view('front/head_view', $data);
        echo view('front/nav_view', $data);
        echo view('front/inicio', $data);
        echo view('front/footer_view', $data); 
    }
}
