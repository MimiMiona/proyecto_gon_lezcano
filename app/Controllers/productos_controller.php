<?php
namespace App\Controllers;

use App\Models\Productos_Model;
use App\Models\Usuario_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\Categorias_model;
use CodeIgniter\Controller;

class Productos_controller extends Controller {

    public function __construct() {
        helper(['form', 'url']);
        $this->session = session();
    }

    public function index() {
        $productoModel = new Productos_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Crud_productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view', $dato);
        echo view('back/productos/producto_nuevo_view.php', $data);
        echo view('front/footer_view', $dato);
    }

    public function crearproducto() {
        $categoriasmodel = new Categorias_model();
        $data['categorias'] = $categoriasmodel->getCategorias();

        $productoModel = new Productos_Model();
        $data['obj'] = $productoModel->orderBy('id', 'DESC')->findAll();

        $dato['titulo'] = 'Alta Producto';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_producto_view.php', $data);
        echo view('front/footer_view');
    }

    public function store() {
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'required|is_natural_no_zero',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required|integer',
            'stock_min' => 'required|integer',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
        ]);

        if (!$input) {
            $categoria_model = new Categorias_model();
            $data = [
                'categorias' => $categoria_model->getCategorias(),
                'validation' => $this->validator,
                'titulo' => 'Alta Producto'
            ];

            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/productos/alta_producto_view', $data);
            echo view('front/footer_view');
        } else {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $nombre_aleatorio,
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
            ];

            $productoModel = new Productos_Model();
            $productoModel->insert($data);

            session()->setFlashdata('success', 'Alta Exitosa...');
            return redirect()->to(site_url('crear'));
        }
    }

    public function singleproducto($id = null) {
        $productoModel = new Productos_Model();
        $data['old'] = $productoModel->find($id);

        if (empty($data['old'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se ha seleccionado');
        }

        $categoriasM = new Categorias_model();
        $data['categorias'] = $categoriasM->getCategorias();
        $data['titulo'] = 'Editar Producto';

        echo view('front/head_view', $data);
        echo view('front/nav_view', $data);
        echo view('back/productos/edit', $data);
        echo view('front/footer_view', $data);
    }

    public function modifica($id) {
        $productoModel = new Productos_Model();
        $producto = $productoModel->find($id);

        if (!$producto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        $img = $this->request->getFile('imagen');

        $data = [
            'nombre_prod' => $this->request->getVar('nombre_prod'),
            'categoria_id' => $this->request->getVar('categoria'),
            'precio' => $this->request->getVar('precio'),
            'precio_vta' => $this->request->getVar('precio_vta'),
            'stock' => $this->request->getVar('stock'),
            'stock_min' => $this->request->getVar('stock_min'),
        ];

        if ($img && $img->isValid() && !$img->hasMoved()) {
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);
            $data['imagen'] = $nombre_aleatorio;
        }

        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Modificación Exitosa...');
        return redirect()->to(site_url('crear'));
    }

    public function eliminados() {
        $productoModel = new Productos_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Productos Eliminados';
        echo view('front/head_view', $dato);
        echo view('front/nav_view', $dato);
        echo view('back/productos/producto_eliminado', $data);
        echo view('front/footer_view', $dato);
    }

    public function activarproducto($id) {
        $productoModel = new Productos_Model();
        $producto = $productoModel->find($id);

        if (!$producto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        $productoModel->update($id, ['eliminado' => 'NO']);
        session()->setFlashdata('success', 'Activación Exitosa...');
        return redirect()->to(site_url('crear'));
    }

    public function deleteproducto($id){
        $productoModel = new \App\Models\Productos_Model();
        $producto = $productoModel->find($id);

        if (!$producto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        // Marcamos como eliminado, en vez de borrar físicamente
        $productoModel->update($id, ['eliminado' => 'SI']);
        
        session()->setFlashdata('success', 'Producto eliminado correctamente.');
        return redirect()->to(site_url('crear'));
    }
}
