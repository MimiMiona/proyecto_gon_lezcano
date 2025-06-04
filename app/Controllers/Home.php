<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Inicio';
        echo view('front/head_view', $data);
        echo view('front/nav_view', $data);
        echo view('front/inicio', $data);
        echo view('front/footer_view', $data); 
    }

    public function quienes_somos()
    {
        $data['titulo'] = '¿Quiénes Somos?';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/quienes_somos', $data);
        echo view('front/footer_view', $data);
    }

    public function catalogo()
    {
        $data['titulo'] = 'Catálogo';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/catalogo', $data);
        echo view('front/footer_view', $data);
    }

    public function contacto()
    {
        $data['titulo'] = 'Contacto';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/contacto', $data);
        echo view('front/footer_view', $data);
    }

    public function comercializacion()
    {
        $data['titulo'] = 'Comercialización';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/comercializacion', $data);
        echo view('front/footer_view', $data);
    }

    public function terminos()
    {
        $data['titulo'] = 'Terminos y Condiciones';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/terminos', $data);
        echo view('front/footer_view', $data);
    }

    public function privacidad()
    {
        $data['titulo'] = 'Privacidad';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/privacidad', $data);
        echo view('front/footer_view', $data);
    }

    public function preguntas_frecuentes()
    {
        $data['titulo'] = 'Preguntas Frecuentes';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/preguntas_frecuentes', $data);
        echo view('front/footer_view', $data);
    }

    public function registro()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/registro.php', $data);
        echo view('front/footer_view', $data);
    }

    public function login()
    {
        $data['titulo'] = 'Login';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/login.php', $data);
        echo view('front/footer_view', $data);
    }
}