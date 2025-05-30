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

$routes->get('/crear', 'Productocontroller::index', ['filter' => 'auth']);
$routes->get('/agregar', 'Productocontroller::index', ['filter' => 'auth']);
$routes->get('/produ-form', 'Productocontroller::crearproducto', ['filter' => 'auth']);
$routes->post('/enviar-produ', 'Productocontroller::store', ['filter' => 'auth']);
$routes->get('/editar/(:num)', 'Productocontroller::singleproducto/$1', ['filter' => 'auth']);
$routes->post('modifica/(:num)', 'Productocontroller::modifica/$1', ['filter' => 'auth']);
$routes->get('borrar/(:num)', 'Productocontroller::deleteproducto/$1', ['filter' => 'auth']);
$routes->get('/eliminados', 'Productocontroller::eliminados', ['filter' => 'auth']);
$routes->get('activar_pro/(:num)', 'Productocontroller::activarproducto/$1', ['filter' => 'auth']);