<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('contacto', 'Home::contacto');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('terminos', 'Home::terminos');
$routes->get('privacidad', 'Home::privacidad');
$routes->get('preguntas_frecuentes', 'Home::preguntas_frecuentes');
$routes->get('registro', 'Home::registro');
$routes->get('datos_personales', 'Home::datos_personales');

$routes->get('/contacto','consultas_controller::create');
$routes->post('/enviar-formulario', 'consultas_controller::formValidation');

$routes->get('/registro','usuario_controller::create');
$routes->post('/enviar-form', 'usuario_controller::formValidation');
$routes->get('/logout', 'Usuario_controller::logout');

$routes->get('/login', 'Home::login');
$routes->post('/enviarlogin', 'Login_controller::auth');
$routes->get('/logueado', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');

$routes->get('/ver-consultas', 'Consultas_controller::verConsultas');
$routes->get('/eliminadas', 'Consultas_controller::eliminadas', ['filter' => 'auth']);
$routes->get('borrarConsulta/(:num)', 'Consultas_controller::deleteConsulta/$1');

$routes->get('/crear', 'Productos_controller::index', ['filter' => 'auth']);
$routes->get('/agregar', 'Productos_controller::index', ['filter' => 'auth']);
$routes->get('/produ-form', 'Productos_controller::crearproducto', ['filter' => 'auth']);
$routes->post('/enviar-produ', 'Productos_controller::store', ['filter' => 'auth']);
$routes->get('/editar/(:num)', 'Productos_controller::singleproducto/$1', ['filter' => 'auth']);
$routes->post('modifica/(:num)', 'Productos_controller::modifica/$1', ['filter' => 'auth']);
$routes->get('borrar_producto/(:num)', 'Productos_controller::deleteproducto/$1', ['filter' => 'auth']);
$routes->get('/eliminados', 'Productos_controller::eliminados', ['filter' => 'auth']);
$routes->get('/activar_pro/(:num)', 'Productos_controller::activarproducto/$1', ['filter' => 'auth']);

$routes->get('/vista', 'usuario_crud_controller::index', ['filter' => 'auth']);
$routes->get('/usuario-form', 'usuario_crud_controller::create', ['filter' => 'auth']);
$routes->post('/enviar-usuario', 'usuario_crud_controller::store', ['filter' => 'auth']);
$routes->post('/update', 'usuario_crud_controller::update');
$routes->get('editar-usuario/(:num)', 'usuario_crud_controller::singleUser/$1', ['filter' => 'auth']);
$routes->get('borrar_usuario/(:num)', 'usuario_crud_controller::deletelogico/$1', ['filter' => 'auth']);
$routes->get('/activar_usuario/(:num)', 'usuario_crud_controller::activar/$1', ['filter' => 'auth']);

//Rutas para el carrito*/
//muestra todos los productos del catalogo
$routes->get('/todos_p','carrito_controller::catalogo');
//carga la vista carrito_parte_view
$routes->get('/muestro','carrito_controller::muestra',['filter' => 'auth']);

//actualiza los datos del carrito
$routes->get('/carrito_actualiza','carrito_controller::actualiza_carrito',['filter' => 'auth']);

//agregar los items seleccionados
$routes->post('add','carrito_controller::add',['filter' => 'auth']);

//elimina un item del carrito
$routes->get('carrito_elimina/(:any)','carrito_controller::remove/$1',['filter' => 'auth']);

//elimar todo el carrito
$routes->get('/borrar','carrito_controller::borrar_carrito',['filter' => 'auth']);

//Registrar la venta en las tablas
$routes->get('/carrito-comprar','Ventas_controller::registrar_venta',['filter' => 'auth']);

//botones de sumar y restar en la vista del carrito
$routes->get('carrito_suma/(:any)','carrito_controller::suma/$1');
$routes->get('carrito_resta/(:any)','carrito_controller::resta/$1');

$routes->get('/buscar','carrito_controller::buscar');

$routes->get('vista_compras/(:num)', 'Ventas_controller::ver_facturas/$1', ['filter' => 'auth']);
$routes->get('ver_factura_usuario/(:num)', 'Ventas_controller::ver_factura_usuario/$1', ['filter' => 'auth']);
$routes->get('ventas', 'Ventas_controller::ventas');
$routes->get('finalizar_compra', 'carrito_controller::finalizar_compra');