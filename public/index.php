<?php

require __DIR__ . '/../app/Core/Router.php';
require __DIR__ . '/../app/Controllers/Test-controllers.php';

use App\Core\Router;

$router = Router::getInstance();
$router->get('/test', 'TestController@test');
$router->dispatch();