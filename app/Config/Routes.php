<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('contacto', 'Home::contacto');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('terminos', 'Home::terminos');
$routes->get('privacidad', 'Home::privacidad');
$routes->get('registro', 'Home::registro');
$routes->get('preguntas_frecuentes', 'Home::preguntas_frecuentes');

$routes->get('/contacto','consultas_controller::create');
$routes->post('/enviar-formulario', 'consultas_controller::formValidation');

$routes->get('/registro','usuario_controller::create');
$routes->post('/enviar-form', 'usuario_controller::formValidation');

$routes->get('/login', 'Home::login');
$routes->post('/enviarlogin', 'Login_controller::auth');
$routes->get('/logueado', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');

$routes->get('/ver-consultas', 'Consultas_controller::verConsultas');
$routes->get('borrarConsulta/(:num)', 'Consultas_controller::deleteConsulta/$1');

$routes->get('/crear', 'Productos_controller::index', ['filter' => 'auth']);
$routes->get('/agregar', 'Productos_controller::index', ['filter' => 'auth']);
$routes->get('/produ-form', 'Productos_controller::crearproducto', ['filter' => 'auth']);
$routes->post('/enviar-produ', 'Productos_controller::store', ['filter' => 'auth']);
$routes->get('/editar/(:num)', 'Productos_controller::singleproducto/$1', ['filter' => 'auth']);
$routes->post('modifica/(:num)', 'Productos_controller::modifica/$1', ['filter' => 'auth']);
$routes->get('borrar/(:num)', 'Productos_controller::deleteproducto/$1', ['filter' => 'auth']);
$routes->get('/eliminados', 'Productos_controller::eliminados', ['filter' => 'auth']);
$routes->get('/activar_pro/(:num)', 'Productos_controller::activarproducto/$1', ['filter' => 'auth']);