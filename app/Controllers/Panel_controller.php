<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Panel_controller extends BaseController
{
    public function index()
    {
        echo view('front/head_view');
        echo view('front/nav_view');
        echo view('back/usuario/usuario_logueado');
        return view('front/footer_view');
    }
}