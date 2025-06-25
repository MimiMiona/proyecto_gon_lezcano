<?php
namespace App\Controllers; 
use App\Models\Usuarios_Model;
use App\Models\consulta_Model;
use CodeIgniter\Controller;

class Usuario_crud_controller extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
    }

    public function index(){
        $userModel = new Usuarios_Model();
        $data['users'] = $userModel->orderBy('id_usuario', 'DESC')->findAll(); 
        
        $dato['titulo']='Crud_usuarios';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/usuario/usuario_nuevo_view',$data);
        echo view('front/footer_view');
    }

    public function create(){
        $userModel = new Usuarios_Model();
        $data['user_obj'] = $userModel->orderBy('id_usuario', 'DESC')->findAll();

        $dato['titulo']='Alta Usuario';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/usuario/usuario_crud_view',$data); 
        echo view('front/footer_view');
    }

    public function store() {
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
    
    public function singleUser($id = null){
        $userModel = new Usuarios_Model();
        $data['user_obj'] = $userModel->where('id_usuario', $id)->first();
        
        $dato['titulo']='Crud_usuarios';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/usuario/edit_usuarios_view', $data); 
        echo view('front/footer_view');
    }

    public function update(){
        $userModel = new Usuarios_Model();
        $session = session();
        $id = $this->request->getVar('id');
        
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

    public function deletelogico($id = null){
        $userModel = new Usuarios_Model();
        $data['baja'] = $userModel->where('id_usuario', $id)->first(); 
        $data['baja'] = 'SI';
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/vista'));
    }
    
    public function activar($id = null){
        $userModel = new Usuarios_Model();
        $data['baja'] = $userModel->where('id_usuario', $id)->first(); $data['baja'] = 'NO';
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/vista'));
    }
}
