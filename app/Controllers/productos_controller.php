<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos los modelos que se usaran
use App\Models\Productos_Model;
use App\Models\Usuario_Model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\Categorias_model;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase Productos_controller que hereda de BaseController
class Productos_controller extends Controller {

    // Metodo constructor: se ejecuta cuando se crea la instancia del controlador
    public function __construct() {
        // Carga helpers de formulario y URL
        helper(['form', 'url']);
        $this->session = session();
    }

    // Muestra listado paginado de productos
    public function index() {
        $productoModel = new Productos_Model();
        $data['producto'] = $productoModel->paginate(9);
        $data['pager'] = $productoModel->pager;


        $dato['titulo'] = 'Crud Productos';
        echo view('front/head_view', $dato);
        echo view('front/nav_view', $dato);
        echo view('back/productos/producto_nuevo_view.php', $data);
        echo view('front/footer_view', $dato);
    }

    // Muestra formulario para crear un producto
    public function crearproducto() {
        $categoriasmodel = new Categorias_model();
        $data['categorias'] = $categoriasmodel->getCategorias();

        $productoModel = new Productos_Model();
        $data['obj'] = $productoModel->orderBy('id_producto', 'DESC')->findAll();

        $dato['titulo'] = 'Alta Producto';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_producto_view.php', $data);
        echo view('front/footer_view');
    }

    // Guarda nuevo producto en la base de datos
    public function store() {
        // Validar campos
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'required|is_natural_no_zero',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required|integer',
            'stock_min' => 'required|integer',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
        ]);

        // Si la validacion falla, volver a la vista con errores
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

            // Insertar producto
            $productoModel = new Productos_Model();
            $productoModel->insert($data);

            // Mensaje de exito
            session()->setFlashdata('success', 'Alta Exitosa...');
            return redirect()->to(site_url('crear'));
        }
    }

    // Muestra formulario para editar un producto específico
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

    // Guarda cambios de un producto
    public function modifica($id) {
        $productoModel = new Productos_Model();
        $producto = $productoModel->find($id);

        if (!$producto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        // Procesar datos del formulario
        $img = $this->request->getFile('imagen');
        $data = [
            'nombre_prod' => $this->request->getVar('nombre_prod'),
            'categoria_id' => $this->request->getVar('categoria'),
            'precio' => $this->request->getVar('precio'),
            'precio_vta' => $this->request->getVar('precio_vta'),
            'stock' => $this->request->getVar('stock'),
            'stock_min' => $this->request->getVar('stock_min'),
        ];

        
        // Si subio imagen nueva, se reemplaza
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);
            $data['imagen'] = $nombre_aleatorio;
        }

        // Actualizar
        $productoModel->update($id, $data);
        session()->setFlashdata('success', 'Modificación Exitosa...');
        return redirect()->to(site_url('crear'));
    }

    //  Muestra productos eliminados
    public function eliminados() {
        $productoModel = new Productos_Model();
        $data['producto'] = $productoModel->getProducto();

        $dato['titulo'] = 'Productos Eliminados';
        echo view('front/head_view', $dato);
        echo view('front/nav_view', $dato);
        echo view('back/productos/producto_eliminado', $data);
        echo view('front/footer_view', $dato);
    }

    // Reactiva un producto eliminado
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

    // Marca un producto como eliminado (borrado logico)
    public function deleteproducto($id){
        $productoModel = new \App\Models\Productos_Model();
        $producto = $productoModel->find($id);

        if (!$producto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        $productoModel->update($id, ['eliminado' => 'SI']);
        
        session()->setFlashdata('success', 'Producto eliminado correctamente.');
        return redirect()->to(site_url('crear'));
    }
}
