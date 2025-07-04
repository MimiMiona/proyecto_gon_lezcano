<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos los modelos que se usaran
use App\Models\Usuarios_Model;
use App\Models\consulta_Model;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase Usuario_crud_controller que hereda de BaseController
class Usuario_crud_controller extends Controller
{
    // Metodo constructor: se ejecuta cuando se crea la instancia del controlador
    public function __construct(){
        // Carga helpers de formulario y URL
        helper(['url', 'form']);
    }

    // Lista todos los usuarios
    public function index(){
        $userModel = new Usuarios_Model();

        // Obtiene todos los usuarios ordenados por id descendente
        $data['users'] = $userModel->orderBy('id_usuario', 'DESC')->findAll(); 
        
        $dato['titulo']='Crud_usuarios';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/usuario/usuario_nuevo_view',$data);
        echo view('front/footer_view');
    }

    // Muestra el formulario para crear un usuario nuevo
    public function create(){
        $userModel = new Usuarios_Model();
        $data['user_obj'] = $userModel->orderBy('id_usuario', 'DESC')->findAll();

        $dato['titulo']='Alta Usuario';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/usuario/usuario_crud_view',$data); 
        echo view('front/footer_view');
    }

    // Guarda un usuario nuevo en la base de datos
    public function store() {
        // Validar campos
        $input = $this->validate([
            'nombre' => 'required|min_length[3]|max_length[25]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario' => 'required|min_length[3]|max_length[25]',
            'pass' => 'required|min_length[6]|'
        ]);
        
        $userModel = new Usuarios_model();
        if (!$input) {
            $data['titulo']='Modificacion';
            echo view('front/head_view',$data); 
            echo view('front/nav_view');
            echo view('back/usuario/usuario_crud_view', [ 'validation' => $this->validator]);
        } else {
            // Guarda los datos
            $data = [
                'nombre' => $this->request->getVar('nombre'), 
                'apellido' => $this->request->getVar('apellido'), 
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            ];
            $userModel->insert($data);
            return $this->response->redirect(site_url('/vista'));
        }
    }
    
    // Muestra un usuario especifico para editarlo
    public function singleUser($id = null){
        $userModel = new Usuarios_Model();
        $data['user_obj'] = $userModel->where('id_usuario', $id)->first();
        
        $dato['titulo']='Crud_usuarios';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/usuario/edit_usuarios_view', $data); 
        echo view('front/footer_view');
    }

    // Actualiza un usuario existente
    public function update(){
        $userModel = new Usuarios_Model();
        $session = session();
        $id = $this->request->getVar('id');
    
        
        // Reglas de validacion
        $validationRules = [
            'nombre' => 'required|min_length[3]|max_length[25]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]|max_length[25]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email,id_usuario,'.$id.']',
            'perfil' => 'required|numeric'
        ];

        if (!$this->validate($validationRules)) {
            $session->setFlashdata('warning', 'Por favor revisa los campos del formulario.');
            return redirect()->to(site_url('editar-usuario/' . $id))->withInput()->with('validation', $this->validator);
        }

        if (!$userModel->find($id)) {
            $session->setFlashdata('fail', 'El usuario no existe.');
            return redirect()->to(site_url('/vista'));
        }

        // Datos a actualizar
        $data = [
            'nombre' => $this->request->getVar('nombre'), 
            'apellido' => $this->request->getVar('apellido'), 
            'usuario' => $this->request->getVar('usuario'), 
            'email' => $this->request->getVar('email'), 
            'perfil_id' => $this->request->getVar('perfil'),
        ];
        
        if ($userModel->update($id, $data)) {
            $session->setFlashdata('success', 'Usuario actualizado correctamente.');
            return redirect()->to(site_url('editar-usuario/' . $id));
        } else {
            $session->setFlashdata('fail', 'Error al actualizar el usuario.');
        }
        return redirect()->to(site_url('editar-usuario/' . $id));
    }

    // Marca un usuario como eliminado (borrado logico)
    public function deletelogico($id = null){
        $userModel = new Usuarios_Model();
        $data['baja'] = $userModel->where('id_usuario', $id)->first(); 
        // Actualiza campo baja a 'SI'
        $data['baja'] = 'SI';
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/vista'));
    }
    
    // Reactivar un usuario dado de baja
    public function activar($id = null){
        $userModel = new Usuarios_Model();
        $data['baja'] = $userModel->where('id_usuario', $id)->first(); $data['baja'] = 'NO';
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/vista'));
    }
}
