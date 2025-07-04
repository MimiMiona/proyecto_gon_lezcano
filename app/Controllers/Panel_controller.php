<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase Panel_controller que hereda de BaseController
class Panel_controller extends BaseController
{
    // Pagina de inicio al usuario logueado
    public function index()
    {
        $data['titulo'] = 'Bienvenido';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/usuario/usuario_logueado');
        echo view('front/footer_view');
    }
}