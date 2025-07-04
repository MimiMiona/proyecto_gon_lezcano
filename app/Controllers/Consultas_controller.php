<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos los modelos que se usaran
use App\Models\Consultas_model;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase consultas_controller que hereda de BaseController
class Consultas_controller extends Controller{
	// Metodo constructor: se ejecuta cuando se crea la instancia del controlador
	public function __construct(){
		// Carga helpers de formulario y URL
		helper(['form', 'url']);
	}

	// Muestra el formulario de contacto
	public function create(){
		$data['titulo']='Contacto';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('front/contacto', $data);
        echo view('front/footer_view', $data);
	}

	// Valida el formulario de contacto y guarda la consulta
	public function formValidation()

		// Validaciones de los campos
		$input = $this->validate([
			'nombre' => 'required|min_length[3]',
			'email'    => 'required|min_length[4]|max_length[100]|valid_email',
			'mensaje'=> 'required|min_length[50]|max_length[300]',
		],
        );
		// Instanciamos el modelo
		$formModel = new consultas_model();
		if(!$input){
			// Si la validacion falla, mostramos nuevamente el formulario con los errores
			$data['titulo'] = 'Contacto';
			echo view ('front/head_view', $data);
			echo view ('front/nav_view');
			echo view ('front/contacto', ['validation' => $this->validator]);
			echo view ('front/footer_view');

		} else {
			// Si la validacion pasa, guardamos la consulta en la base de datos
			$formModel->save([
				'nombre' => $this->request->getVar('nombre'),
				'email' => $this->request->getVar('email'),
				'mensaje' => $this->request->getVar('mensaje')
			]);

			// Creamos mensajes flash de exito y error
			session()->setFlashdata('success', 'Consulta registrada con exito');
			session()->setFlashdata('fail', 'Datos Incorrectos');
			
			// Redirigimos de nuevo al formulario
			return $this->response->redirect(base_url('/contacto'));
		}
	}

	// Muestra todas las consultas registradas
	public function verConsultas(){
		$modelo = new Consultas_model();
		$data['consultas'] = $modelo->findAll();

		$data['titulo'] = 'Listado de Consultas';
		echo view('front/head_view', $data);
		echo view('front/nav_view', $data);
		echo view('back/consultas/ver_consultas', $data);
		echo view('front/footer_view', $data);
	}

	// Muestra las consultas marcadas como eliminadas
	public function eliminadas() {
        $consultasModel = new Consultas_model();
        $data['consulta'] = $consultasModel->getConsulta();

        $dato['titulo'] = 'Consultas Eliminadas';
        echo view('front/head_view', $dato);
        echo view('front/nav_view', $dato);
        echo view('back/consultas/consulta_eliminada', $data);
        echo view('front/footer_view', $dato);
    }

	// Marca una consulta como eliminada logicamente
	public function deleteConsulta($id_usuario){
        $modelo = new \App\Models\Consultas_Model();
        $consultaModel = $modelo->find($id_usuario);

        if (!$consultaModel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Consulta no encontrada');
        }

        $modelo->update($id_usuario, ['eliminado' => 'SI']);
        
        session()->setFlashdata('success', 'Consulta eliminada correctamente.');
        return redirect()->to(site_url('ver-consultas'));
    }

}