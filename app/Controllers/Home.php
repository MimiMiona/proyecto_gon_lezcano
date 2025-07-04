<?php
// Importa el namespace del controlador
namespace App\Controllers;


// La clase extiende BaseController, que incluye helpers y configuración base
class Home extends BaseController
{
    // Pagina de inicio
    public function index()
    {
        $data['titulo'] = 'Inicio';
        echo view('front/head_view', $data);
        echo view('front/nav_view', $data);
        echo view('front/inicio', $data);
        echo view('front/footer_view', $data); 
    }

    // Pagina de ¿Quienes somos?
    public function quienes_somos()
    {
        $data['titulo'] = '¿Quiénes Somos?';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/quienes_somos', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de contacto
    public function contacto()
    {
        $data['titulo'] = 'Contacto';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/contacto', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de comercializacion
    public function comercializacion()
    {
        $data['titulo'] = 'Comercialización';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/comercializacion', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de terminos y condiciones
    public function terminos()
    {
        $data['titulo'] = 'Terminos y Condiciones';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/terminos', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de politica de privacidad
    public function privacidad()
    {
        $data['titulo'] = 'Privacidad';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/privacidad', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de preguntas frecuentes
    public function preguntas_frecuentes()
    {
        $data['titulo'] = 'Preguntas Frecuentes';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/preguntas_frecuentes', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de datos personales
    public function datos_personales()
    {
        $data['titulo'] = 'Datos Personales';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/datos_personales.php', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de registro
    public function registro()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/registro.php', $data);
        echo view('front/footer_view', $data);
    }

    // Pagina de login
    public function login()
    {
        $data['titulo'] = 'Login';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/login.php', $data);
        echo view('front/footer_view', $data);
    }
}