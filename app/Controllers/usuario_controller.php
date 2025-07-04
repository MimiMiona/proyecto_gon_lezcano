<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos los modelos que se usaran
use App\Models\Usuarios_model;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase Usuario_controller que hereda de BaseController
class Usuario_controller extends Controller{
	// Metodo constructor: se ejecuta cuando se crea la instancia del controlador
	public function __construct(){
		// Carga helpers de formulario y URL
		helper(['form', 'url']);
	}

	// Muestra la vista de registro de usuario
	public function create(){
	$data['titulo']='Registro';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/registro', $data);
        echo view('front/footer_view', $data);
	}

	// Procesa la validacion y registro del formulario de usuario
	public function formValidation(){
		$input = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[25]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario' => 'required|min_length[3]|max_length[25]',
            'pass' => 'required|min_length[6]|'
		],
        );
	
		$formModel = new Usuarios_model();

		// Si la validacion falla
		if(!$input){
			$data['titulo']='Registro';
			echo view ('front/head_view', $data);
			echo view ('front/nav_view');
			echo view ('back/usuario/registro', ['validation' => $this->validator]);
			echo view ('front/footer_view');

		} else {
			// Guardar en la base de datos con la contraseña hasheada
			$formModel->save([
				'nombre' => $this->request->getVar('nombre'),
				'apellido' => $this->request->getVar('apellido'),
				'usuario' => $this->request->getVar('usuario'),
				'email' => $this->request->getVar('email'),
				'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)	
			]);
			session()->setFlashdata('success', 'Usuario registrado con exito');
			return $this->response->redirect(base_url('/login'));
		}
	}

	// Cierra sesion del usuario
	public function logout(){
		session()->destroy(); 
		return redirect()->to(base_url('inicio'));
	}
}