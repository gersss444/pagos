<?php

//Listar pagos: Navega a http://localhost/tu-proyecto/public/pagos
//Mostrar un pago específico: Navega a http://localhost/tu-proyecto/public/pagos/{id}
//Crear un pago: Navega a http://localhost/tu-proyecto/public/pagos/create
//Editar un pago: Navega a http://localhost/tu-proyecto/public/pagos/{id}/edit
//Eliminar un pago: Navega a http://localhost/tu-proyecto/public/pagos/{id}/delete

use CodeIgniter\Router\RouteCollection;


// Rutas para el módulo de pagos
$routes->get('/pagos', 'PagoController::index'); // Mostrar lista de pagos
$routes->get('/pagos/(:num)', 'PagoController::show/$1'); // Mostrar un pago específico
$routes->get('/pagos/create', 'PagoController::create'); // Formulario para crear un pago
$routes->post('/pagos/store', 'PagoController::store'); // Guardar un nuevo pago
$routes->get('/pagos/(:num)/edit', 'PagoController::edit/$1'); // Formulario para editar un pago
$routes->post('/pagos/(:num)/update', 'PagoController::update/$1'); // Actualizar un pago
$routes->get('/pagos/(:num)/delete', 'PagoController::delete/$1'); // Eliminar un pago

$routes->get('/plantilla', 'Home::plantilla');

