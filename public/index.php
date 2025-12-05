<?php

require __DIR__ . '/../app/Core/Router.php';
require __DIR__ . '/../app/Controllers/Test-controllers.php';
require __DIR__ . '/../app/Controllers/AuthController.php';

use App\Core\Router;

// Routes
$router = Router::getInstance();
// Test
$router->get('/test', 'TestController@test');
// Signup routes
$router->get('/signup', 'AuthController@signupForm');
$router->post('/signup/submit', 'AuthController@signupSubmit');

$router->dispatch();