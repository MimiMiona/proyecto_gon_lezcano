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

$routes->get('/registro','usuario_controller::create');
$routes->post('/enviar-form', 'usuario_controller::formValidation');


$routes->get('/login', 'Home::login');
$routes->post('/enviarlogin', 'Login_controller::auth');
$routes->get('/logueado', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');