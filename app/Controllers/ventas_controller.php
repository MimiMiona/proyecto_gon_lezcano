<?php
// Importa el namespace del controlador
namespace App\Controllers;

// Importamos los modelos que se usaran
use App\Models\Productos_model;
use App\Models\Usuarios_model;
use App\Controllers\carrito_controller;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;

// Importamos el controlador base
use CodeIgniter\Controller;

// Definimos la clase Ventas_controller que hereda de BaseController
class Ventas_controller extends Controller
{
    // Metodo principal para registrar una venta
    public function registrar_venta()
    {
        // Inicia sesion
        $session = session();

        // Instancia del controlador del carrito
        $cartController = new carrito_controller();

        // Obtiene el contenido actual del carrito
        $carrito_contents = $cartController->devolver_carrito();
  
        // Instancias de los modelos necesarios
        $productoModel = new Productos_model();
        $ventasModel = new Ventas_cabecera_model();
        $detalleModel = new Ventas_detalle_model();

        $productos_validos = [];
        $productos_sin_stock = [];
        $total = 0;

        // Validar stock por producto
        foreach ($carrito_contents as $item) {
            $producto = $productoModel->getProducto($item['id']);

            if ($producto && $producto['stock'] >= $item['qty']) {
                $productos_validos[] = $item;
                $total += $item['subtotal'];
            } else {
                $productos_sin_stock[] = $item['name'];
                $cartController->eliminar_item($item['rowid']);
            }
        }

        // Si hubo productos sin stock, muestra mensaje y redirige
        if (!empty($productos_sin_stock)) {
            $mensaje = 'Los siguientes productos no tienen stock suficiente y fueron eliminados del carrito: <br>' .
                       implode(', ', $productos_sin_stock);
            $session->setFlashdata('mensaje', $mensaje);
            return redirect()->to(base_url('muestro'));
        }

        // Si no hay productos válidos, redirige
        if (empty($productos_validos)) {
            $session->setFlashdata('mensaje', 'No hay productos válidos para registrar la venta.');
            return redirect()->to(base_url('muestro'));
        }

        // Insertar cabecera
        $nueva_venta = [
            'usuario_id' => $session->get('id_usuario'),
            'total_venta' => $total
        ];
        $venta_id = $ventasModel->insert($nueva_venta);

        // Insertar detalle y actualizar stock
        foreach ($productos_validos as $item) {
            $detalle = [
                'venta_id'  => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio'   => $item['subtotal']
            ];
            $detalleModel->insert($detalle);

            // Actualizar stock del producto
            $producto = $productoModel->getProducto($item['id']);
            $productoModel->updateStock($item['id'], $producto['stock'] - $item['qty']);
        }

        // Vaciar carrito
        $cartController->borrar_carrito();
        $session->setFlashdata('mensaje', 'Venta registrada exitosamente.');
        return redirect()->to(base_url('vista_compras/' . $venta_id));
    }

    // Muestra el detalle de una compra especifica
    public function ver_facturas($venta_id)
    {
        $detalle_ventas = new Ventas_detalle_model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);
        $data['titulo'] = 'Mi compra';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/compras/vista_compras', $data);
        echo view('front/footer_view');
    }

    // Muestra todas las facturas de un usuario
    public function ver_factura_usuario($id_usuario)
    {
        $ventas = new Ventas_cabecera_model();
        $data['ventas'] = $ventas->getVentas($id_usuario);
        $dato['titulo'] = 'Todos mis compras';

        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/compras/ver_factura_usuario', $data);
        echo view('front/footer_view');
    }

    // Muestra el listado general de ventas (admin)
    public function ventas() {
        $venta_id = $this->request->getGet('id');

        $detalle_ventas = new Ventas_detalle_model();
        $data['venta'] = $detalle_ventas->getDetalles($venta_id);

        $ventascabecera = new Ventas_cabecera_model();
        $data['usuarios'] = $ventascabecera->getBuilderVentas_cabecera();

        $dato['titulo'] = "Listado de Ventas";
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/ventas/ventas', $data);
        echo view('front/footer_view');
    }

}
