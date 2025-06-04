<?php
namespace App\Controllers;
use App\Models\Consultas_model;
use CodeIgniter\Controller;

class Consultas_controller extends Controller{
	public function __construct(){
		helper(['form', 'url']);
	}

	public function create(){
	$data['titulo']='Contacto';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/contacto', $data);
        echo view('front/footer_view', $data);
	}

	public function formValidation(){
		$input = $this->validate([
			'nombre' => 'required|min_length[3]',
			'email'    => 'required|min_length[4]|max_length[100]|valid_email',
			'mensaje'=> 'required|min_length[50]|max_length[300]',
		],
        );
	
		$formModel = new consultas_model();
		if(!$input){
			$data['titulo'] = 'Contacto';
			echo view ('front/head_view', $data);
			echo view ('front/nav_view');
			echo view ('front/contacto', ['validation' => $this->validator]);
			echo view ('front/footer_view');

		} else {
			$formModel->save([
				'nombre' => $this->request->getVar('nombre'),
				'email' => $this->request->getVar('email'),
				'mensaje' => $this->request->getVar('mensaje')
			]);
			session()->setFlashdata('success', 'Consulta registrada con exito');
			return $this->response->redirect(base_url('/contacto'));
		}
	}

	public function verConsultas(){
		$modelo = new Consultas_model();
		$data['consultas'] = $modelo->findAll();

		$data['titulo'] = 'Listado de Consultas';
		echo view('front/head_view', $data);
		echo view('front/nav_view', $data);
		echo view('back/consultas/ver_consultas', $data);
		echo view('front/footer_view', $data);
	}

}