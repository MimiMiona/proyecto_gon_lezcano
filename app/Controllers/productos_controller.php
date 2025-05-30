<?php
namespace App\Controllers;
Use App\Models\Producto_Model;
Use App\Models\Usuario_Model;
Use App\Models\Ventas_cabecera_model;
Use App\Models\Ventas_detalle_model;
Use App\Models\categoria_model;
use CodeIgniter\Controller;

class Productoscontroller extends Controller {
	public function __construct()
	{
		helper(['form', 'url']);
        $session=session();
	}
	public function index()
	{
		$productoModel = new Producto_Model();

		$data['producto'] = $productoModel->getProductoAll();

        $dato['titulo']='Crud_productos';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/usuario/registro', $data);
        echo view('front/footer_view', $data);
	}

    public function crearproducto(){
        $categoriamodel = new categoria_model();
        $data['categorias'] = $categoriasmodel->getCategorias();

        $productoModel = new Producto_Model();
        $data['producto'] = $productomodel->getProductoAll();

        $dato['titulo']='Alta Producto';
        echo view('front/head_view',$dato);
        echo view('front/nav_view');
        echo view('back/usuario/alta_producto_view', $data);
        echo view('front/footer_view');
    }

     public function store(){
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
			'categoria' => 'is_unique[categorias.id]',
			'precio'=> 'required|numeric',
			'precio_vta' => 'required|numeric',
			'stock'=> 'required',
            'stock_min'=> 'required',
            'imagen'=> 'uploaded[imagen]',
        ]);

        $productoModel = new Producto_Model();

        if(!$input){
            $categoria_model = new categoria_model();
            $data['categoria'] = $categoria_model->getCategorias();
            $data['validation'] = $this->validator;

			$data['titulo']='Alta';
			echo view ('front/head_view', $data);
			echo view ('front/nav_view');
			echo view ('back/productos/alta_producto_view', $data);
		} else {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod');
                'imagen' => $img->getName();
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ]

            $producto = new Producto_Model();
            $producto->insert($data);
            session()->setFlashdata('sucess', 'Alta Exitosa...');
            return $this->reponse->redirect(site_url('crear'));
        }
    }
    public function singleproducto($id = null){
        $productoModel = new Producto_Model();
        $data['old'] = $productoModel->where('id', $id)->first();
        if(empty($data['old'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se ha seleccionado');
        }
        $categoriasM = new categoria_model();
        $data['categorias'] = $categoriasM->getCategorias();
        
        $data['titulo']='Crud_productos';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/productos/edit', $data);
        echo view('front/footer_view', $data);
	}
    public function modifica($id){
        $productoModel = new Producto_Model();
        $id = $productoModel->where('id', $id)->first();
        $img = $this->request->getFile('image');

        if($img && $img->isValid()){
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $img->getName('imagen'),
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),	
                'stock_min' => $this->request->getVar('stock_min'),
            ];
        }else{
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),	
                'stock_min' => $this->request->getVar('stock_min'),
            ]
        }
        $productoModel->update($id, $data);
        session()->setFlashdata('sucess', 'Modificacion Exitosa...')
    }
    public function eliminados($id){
        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->getProductoAll();
        $dato['titulo']='Crud_productos';
        echo view('front/head_view',$data);
        echo view('front/nav_view', $data);
        echo view('back/productos/producto_eliminado', $data);
        echo view('front/footer_view', $data);
    }
    public function activarproducto($id){
        $productoModel = new Producto_Model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();
        $data['eliminado'] = 'NO';
        $productoModel->update($id, $data);
        session()->setFlashdata('sucess', 'Activacion Exitosa...');
        return $this->response->redirect->(site_url('/crear'));
    }
}