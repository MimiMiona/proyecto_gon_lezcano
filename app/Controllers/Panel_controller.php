<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Panel_controller extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Bienvenido';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/usuario/usuario_logueado');
        echo view('front/footer_view');
    }
}