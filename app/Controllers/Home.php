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
        echo view('front/nav_view');
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }

    public function catalogo()
    {
        $data['titulo'] = '¿Quiénes Somos?';
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/catalogo');
        echo view('front/footer_view');
    }
}
