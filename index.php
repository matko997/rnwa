<?php
// Include the router file
require_once 'router.php';

$router = new Router('/rnwa');


$router->get('/', 'HomeController@index');
// Define flight routes
$router->get('/flights', 'FlightController@index');
$router->get('/flights/create', 'FlightController@create');
$router->post('/flights/store', 'FlightController@store');
$router->get('/flights/{id}/edit', 'FlightController@edit');
$router->post('/flights/{id}/update', 'FlightController@update');
$router->post('/flights/{id}/delete', 'FlightController@delete');

// Define airline routes
$router->get('/airlines', 'AirlineController@index');
$router->get('/airlines/create', 'AirlineController@create');
$router->post('/airlines/store', 'AirlineController@store');
$router->get('/airlines/{id}/edit', 'AirlineController@edit');
$router->post('/airlines/{id}/update', 'AirlineController@update');
$router->post('/airlines/{id}/delete', 'AirlineController@delete');

// Define airplane routes
$router->get('/airplanes', 'AirplaneController@index');
$router->get('/airplanes/create', 'AirplaneController@create');
$router->post('/airplanes/store', 'AirplaneController@store');
$router->get('/airplanes/{id}/edit', 'AirplaneController@edit');
$router->post('/airplanes/{id}/update', 'AirplaneController@update');
$router->post('/airplanes/{id}/delete', 'AirplaneController@delete');

// Run the router
$router->run();

