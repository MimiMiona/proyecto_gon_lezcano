<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Panel_controller extends BaseController
{
    public function index()
    {
        return view('back/usuario/usuario_logueado');
    }
}