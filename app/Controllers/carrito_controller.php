<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos los modelos que se usaran
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\Productos_Model;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase carrito_controller que hereda de BaseController
class carrito_controller extends BaseController{

    // Metodo constructor: se ejecuta cuando se crea la instancia del controlador
    public function __construct(){
        // Carga helpers de formulario, URL y carrito
        helper(['form', 'url', 'cart']);

        // Inicializa la libreria del carrito y la sesión
        $cart = \Config\Services::cart();
        $session = session();
    }

    
    // Metodo para agregar un producto al carrito
    public function add() {

        $cart     = \Config\Services::Cart();
        $request  = \Config\Services::request();

          // Inserta el producto al carrito con cantidad = 1
        $cart->insert([
            'id'      => $request->getPost('id'),
            'qty'     => 1,
            'name'    => $request->getPost('nombre_prod'),
            'price'   => $request->getPost('precio_vta'),
            'options' => [
            'imagen' => $request->getPost('imagen'),
            ],
        ]);

        log_message('debug', 'POST: ' . print_r($request->getPost(), true));
        
        // Redirige a la vista del carrito
        return redirect()->to(base_url('muestro'));
    }

    
    // Metodo que actualiza los datos de un ítem en el carrito
    public function actualiza_carrito(){
        $cart     = \Config\Services::Cart();
        $request  = \Config\Services::request();

        $cart->update(array(
            'id'     => $request->getPost('id'),
            'qty'    => 1,
            'price'  => $request->getPost('precio_vta'),
            'name'   => $request->getPost('nombre_prod'),
            'imagen' => $request->getPost('imagen'),
        ));

        // Vuelve a la pagina anterior con los datos del formulario
        return redirect()->back()->withInput();
    }

    
    // Muestra el catalogo completo de productos
    public function catalogo(){
        $productoModel = new Productos_Model();
        $data['producto'] = $productoModel->orderBy('id_producto', 'DESC')->findAll();

        $dato = ['titulo' => 'Todos los Productos'];
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/carrito/productos_catalogo_view', $data);
        echo view('front/footer_view');
    }

    // Muestra carrito con contenido actual
    public function muestra(){ 
        $cart = \Config\Services::cart();
        $cart = $cart->contents();
        $data['cart'] = $cart;

        $dato['titulo'] = 'Confirmar compra';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/carrito/carrito_parte_view', $data);
        echo view('front/footer_view');
    }

    // Elimina un item especifico del carrito usando su rowid
    public function eliminar_item($rowid){
        $cart = \Config\Services::Cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('muestro'));
    }

    // Vacia completamente el carrito
    public function borrar_carrito(){
        $cart = \Config\Services::Cart();
        $cart->destroy();
        return redirect()->to(base_url('muestro'));
    }

    // Elimina un item o todo el carrito si se pasa 'all' como rowid
    public function remove($rowid)
    {
        $cart = \Config\Services::cart();
        if ($rowid === "all") { //vacia el carrito
            $cart->destroy();
        } else {
            $cart->remove($rowid);
        }
        return redirect()->back()->withInput();
    }

     // Devuelve el contenido actual del carrito 
    public function devolver_carrito()
    {
        $cart = \Config\Services::cart();
        return $cart->contents();
    }

    // Suma 1 a la cantidad del producto
    public function suma($rowid)
    {
        $cart = \Config\Services::cart();
        $item = $cart->getItem($rowid);
        if ($item) {
            $cart->update([
                'rowid' => $rowid,
                'qty' => $item['qty'] + 1
            ]);
        }
        return redirect()->to('muestro');
    }
    
    // Resta 1 a la cantidad del producto
    public function resta($rowid) {
        $cart = \Config\Services::cart();
        $item = $cart->getItem($rowid);
        if ($item) {
            if ($item['qty'] > 1) {
                $cart->update([
                    'rowid' => $rowid,
                    'qty' => $item['qty'] - 1
                ]);
            } else {
                $cart->remove($rowid);
            }
        }
        return redirect()->to('muestro');
    }

    // Permite buscar productos por nombre
    public function buscar(){
        $productoModel = new Productos_Model();
        $nombre = $this->request->getGet('nombre_prod');

        if (!empty($nombre)) {
            $data['productos'] = $productoModel->like('nombre_prod', $nombre)->findAll();
        } else {
            $data['productos'] = $productoModel->findAll();
        }

        $dato['titulo'] = 'Busqueda';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/busqueda_productos', $data);
        echo view('front/footer_view');

    }

     // Finaliza la compra: envia email de confirmacion y vacia el carrito
    public function finalizar_compra(){
        $cart = \Config\Services::cart();
        $session = session();

        $usuarioEmail = $session->get('email');
        $usuarioNombre = $session->get('nombre');

        if (!$usuarioEmail || !$usuarioNombre) {
            return redirect()->to('muestro')->with('error', 'Faltan datos del usuario.');
        }

        $mensaje = "<p>Gracias por tu compra, " . esc($usuarioNombre) . ".</p>";
        $mensaje .= "<p>Tu pedido fue recibido y está siendo procesado.</p>";

        $email = \Config\Services::email();

        $email->setFrom('rebobinar92@gmail.com', 'Rebobinar');
        $email->setTo($usuarioEmail);
        $email->setSubject('Confirmación de compra');
        $email->setMessage($mensaje);

        if ($email->send()) {
            $cart->destroy();
            return redirect()->to('muestro')->with('mensaje', 'Compra finalizada y correo enviado.');
        } else {
            // Muestra detalles del error en el envio del email
            echo $email->printDebugger(['headers']);
            exit;
        }
    }




}