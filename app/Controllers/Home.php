<?php
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
        $data['titulo'] = 'catalogo';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/catalogo', $data);
        echo view('front/footer_view', $data);
    }

    public function contacto()
    {
        $data['titulo'] = 'contacto';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/contacto', $data);
        echo view('front/footer_view', $data);
    }

    public function comercializacion()
    {
        $data['titulo'] = 'comercializacion';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/comercializacion', $data);
        echo view('front/footer_view', $data);
    }

    public function terminos()
    {
        $data['titulo'] = 'terminos';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/terminos', $data);
        echo view('front/footer_view', $data);
    }

    public function privacidad()
    {
        $data['titulo'] = 'privacidad';
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
        $data['titulo'] = 'registro';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/registro.php', $data);
        echo view('front/footer_view', $data);
    }

    public function login()
    {
        $data['titulo'] = 'login';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/login.php', $data);
        echo view('front/footer_view', $data);
    }
}