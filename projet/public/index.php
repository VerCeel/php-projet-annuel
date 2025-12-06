<?php

require __DIR__ . '/../Core/Router.php';
require __DIR__ . '/../Controllers/Test-controllers.php';
require __DIR__ . '/../Controllers/AuthController.php';

use Core\Router;

// Routes
$router = Router::getInstance();

// Test
$router->get('/test', 'TestController@test');

$router->get('/', 'TestController@abc');

// Signup routes
$router->get('/signup', 'AuthController@signupForm');
// logique
$router->post('/signup/submit', 'AuthController@signupSubmit');

$router->dispatch();