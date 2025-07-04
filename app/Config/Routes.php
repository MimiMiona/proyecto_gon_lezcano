<?php

// Importa la clase de rutas de CodeIgniter
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/

//Ruta principal (home)
$routes->get('/', 'Home::index');
//Pagina de inicio
$routes->get('inicio', 'Home::index');
//Pagina "¿Quienes Somos?"
$routes->get('quienes_somos', 'Home::quienes_somos');
//Pagina de contacto
$routes->get('contacto', 'Home::contacto');
//Pagina de comercializacion
$routes->get('comercializacion', 'Home::comercializacion');
//Terminos y condiciones
$routes->get('terminos', 'Home::terminos');
//Politica de privacidad
$routes->get('privacidad', 'Home::privacidad');
//Preguntas frecuentes
$routes->get('preguntas_frecuentes', 'Home::preguntas_frecuentes');
//Pagina de registro de usuario
$routes->get('registro', 'Home::registro');
//Pagina de datos personales
$routes->get('datos_personales', 'Home::datos_personales');

//Rutas de contacto, para usuarios

// Muestra el formulario de contacto
$routes->get('/contacto','consultas_controller::create');
// Procesa envío del formulario de contacto
$routes->post('/enviar-formulario', 'consultas_controller::formValidation');

//Rutas de registro, para usuarios
// Muestra el formulario de registro
$routes->get('/registro','usuario_controller::create');
// Procesa envio del formulario de registro
$routes->post('/enviar-form', 'usuario_controller::formValidation');
// Cierra sesion de usuario
$routes->get('/logout', 'Usuario_controller::logout');

//Rutas de login, para usuarios

// Muestra formulario de login
$routes->get('/login', 'Home::login');
// Procesa login
$routes->post('/enviarlogin', 'Login_controller::auth');
// Muestra el panel si esta autenticado
$routes->get('/logueado', 'Panel_controller::index', ['filter' => 'auth']);
// Cierra sesion
$routes->get('/logout', 'Login_controller::logout');

//Rutas de consulta, para el administrador

//Ver todas las consultas recibidas
$routes->get('/ver-consultas', 'Consultas_controller::verConsultas');
//Ver consultas eliminadas (requiere autenticación)
$routes->get('/eliminadas', 'Consultas_controller::eliminadas', ['filter' => 'auth']);
//Borrar una consulta por ID
$routes->get('borrarConsulta/(:num)', 'Consultas_controller::deleteConsulta/$1');

//Rutas de producto, para el administrador

//Mostrar vista para crear productos (index también podría listar)
$routes->get('/crear', 'Productos_controller::index', ['filter' => 'auth']);
//Agregar nuevo producto
$routes->get('/agregar', 'Productos_controller::index', ['filter' => 'auth']);
//Muestra formulario de creacion de producto
$routes->get('/produ-form', 'Productos_controller::crearproducto', ['filter' => 'auth']);
//Procesar creacion de producto
$routes->post('/enviar-produ', 'Productos_controller::store', ['filter' => 'auth']);
//Mostrar formulario de edicion de producto
$routes->get('/editar/(:num)', 'Productos_controller::singleproducto/$1', ['filter' => 'auth']);
//Procesar modificacion de producto
$routes->post('modifica/(:num)', 'Productos_controller::modifica/$1', ['filter' => 'auth']);
//Eliminar un producto
$routes->get('borrar_producto/(:num)', 'Productos_controller::deleteproducto/$1', ['filter' => 'auth']);
//Mostrar productos eliminados
$routes->get('/eliminados', 'Productos_controller::eliminados', ['filter' => 'auth']);
//Reactivar producto eliminado
$routes->get('/activar_pro/(:num)', 'Productos_controller::activarproducto/$1', ['filter' => 'auth']);

//Rutas de usuario, para el administrador

//Mostrar todos los usuarios
$routes->get('/vista', 'usuario_crud_controller::index', ['filter' => 'auth']);
//Mostrar formulario para crear un usuario
$routes->get('/usuario-form', 'usuario_crud_controller::create', ['filter' => 'auth']);
//Procesar creación de usuario
$routes->post('/enviar-usuario', 'usuario_crud_controller::store', ['filter' => 'auth']);
//Actualizar datos de usuario (general)
$routes->post('/update', 'usuario_crud_controller::update');
//Mostrar formulario de edicion de usuario
$routes->get('editar-usuario/(:num)', 'usuario_crud_controller::singleUser/$1', ['filter' => 'auth']);
//Eliminado logico de usuario
$routes->get('borrar_usuario/(:num)', 'usuario_crud_controller::deletelogico/$1', ['filter' => 'auth']);
//Reactivar usuario eliminado
$routes->get('/activar_usuario/(:num)', 'usuario_crud_controller::activar/$1', ['filter' => 'auth']);

//Rutas para carrito

//Mostrar catálogo de productos
$routes->get('/todos_p','carrito_controller::catalogo');
//Mostrar carrito
$routes->get('/muestro','carrito_controller::muestra',['filter' => 'auth']);
//Actualizar carrito (cantidades, etc.)
$routes->get('/carrito_actualiza','carrito_controller::actualiza_carrito',['filter' => 'auth']);
//Agregar items al carrito
$routes->post('add','carrito_controller::add',['filter' => 'auth']);
//Eliminar item del carrito
$routes->get('carrito_elimina/(:any)','carrito_controller::remove/$1',['filter' => 'auth']);
//Vaciar carrito por completo
$routes->get('/borrar','carrito_controller::borrar_carrito',['filter' => 'auth']);
//Registrar venta al confirmar compra
$routes->get('/carrito-comprar','Ventas_controller::registrar_venta',['filter' => 'auth']);
//Sumar una unidad a un producto en el carrito
$routes->get('carrito_suma/(:any)','carrito_controller::suma/$1');
//Restar una unidad a un producto en el carrito
$routes->get('carrito_resta/(:any)','carrito_controller::resta/$1');
//Buscar productos
$routes->get('/buscar','carrito_controller::buscar');

//Rutas para la facturas del usuario

//Ver facturas de un usuario
$routes->get('vista_compras/(:num)', 'Ventas_controller::ver_facturas/$1', ['filter' => 'auth']);
//Ver una factura individual
$routes->get('ver_factura_usuario/(:num)', 'Ventas_controller::ver_factura_usuario/$1', ['filter' => 'auth']);
//Mostrar listado general de ventas
$routes->get('ventas', 'Ventas_controller::ventas');
//Pagina de finalizar compra
$routes->get('finalizar_compra', 'carrito_controller::finalizar_compra');