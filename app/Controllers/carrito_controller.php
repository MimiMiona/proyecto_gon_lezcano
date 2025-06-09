<?php
namespace App\Controllers;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\Productos_Model;
use CodeIgniter\Controller;

class carrito_controller extends BaseController{

    public function __construct(){
        helper(['form', 'url', 'cart']);
        $cart = \Config\Services::cart();
        $session = session();
    }

    public function add() {

        $cart     = \Config\Services::Cart();
        $request  = \Config\Services::request();

        
        $cart->insert(array(
            'id'      => $request->getPost('id'),
            'qty'     => 1,
            'name'    => $request->getPost('nombre_prod'),
            'price'   => $request->getPost('precio_vta'),
            'imagen'  => $request->getPost('imagen'),
        ));

        return redirect()->back()->withInput();
    }

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

        return redirect()->back()->withInput();
    }

        public function catalogo(){
        $productoModel = new Productos_Model();
        $data['producto'] = $productoModel->orderBy('id', 'DESC')->findAll();

        $dato = ['titulo' => 'Todos los Productos'];
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/carrito/productos_catalogo_view', $data);
        echo view('front/footer_view');
    }

    public function muestra(){ //carrito que se muestra
        $cart = \Config\Services::cart();
        $cart = $cart->contents();
        $data['cart'] = $cart;

        $dato['titulo'] = 'Confirmar compra';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/carrito/carrito_parte_view', $data);
        echo view('front/footer_view');
    }

    public function eliminar_item($rowid){
        $cart = \Config\Services::Cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('muestro'));
    }

    public function borrar_carrito(){
        $cart = \Config\Services::Cart();
        $cart->destroy();
        return redirect()->to(base_url('muestro'));
    }

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

        public function devolver_carrito()
    {
        $cart = \Config\Services::cart();
        return $cart->contents();
    }

    public function suma($rowid)
    {
        // suma 1 a la cantidad del producto
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

    public function resta($rowid)
    {
        // resta 1 a la cantidad del producto
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

}