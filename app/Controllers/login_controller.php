<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos los modelos que se usaran
use App\Models\Usuarios_model;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase login_controller que hereda de BaseController
class Login_controller extends BaseController {
	// Metodo index: carga los helpers necesarios
	public function index()
	{
		// Carga los helpers de formulario y URL
		helper(['form', 'url']);
	}

	// Procesa la autenticación del usuario
	public function auth()
	{
		// Inicia sesion
		$session = session();

		// Instancia el modelo de usuarios
		$model = new Usuarios_model();

		 // Obtiene email y contraseña del formulario
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('pass');

		// Busca el usuario en la base de datos por email
		$data = $model->where('email', $email)->first();

		
        // Si existe el usuario
		if($data){
            $pass = $data['pass'];
			$ba = $data['baja'];

			// Si el usuario está dado de baja
            if($ba == 'SI'){
                $session->setFlashdata('msg', 'usuario dado de baja');
				return redirect()->to('/');
			}

			
            // Verifica que la contraseña ingresada coincida con la almacenada
			if(password_verify($password, $pass)){
				$ses_data = [
				'id_usuario' => $data['id_usuario'],
				'nombre' => $data['nombre'],
				'apellido' => $data['apellido'],
				'email' => $data['email'],
				'usuario' => $data['usuario'],
				'perfil_id' => $data['perfil_id'],
				'logged_in' => TRUE,
				];

				// Guarda los datos en la sesión
				$session->set($ses_data);

				// Mensaje de bienvenida
				$session->setFlashdata('msg', 'Bienvenido!!');
				
				// Redirige segun el perfil de usuario
				if ($data['perfil_id'] == 1) {
					return redirect()->to('/logueado');
				} elseif ($data['perfil_id'] == 2) {
					return redirect()->to('/logueado');
				}else{
					// Contraseña Inconrrecta
					$session->setFlashdata('msg', 'Password Incorrecta');
					return redirect()->to('/login');
				}
			
			}
		}else{
			// Usuario no encontrado
			$session->setFlashdata('msg', 'No ingreso un email o el mismo es incorrecto');
			return redirect()->to('/login');
		}
	}
}