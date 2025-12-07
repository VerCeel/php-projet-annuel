<?php

require __DIR__ . '/../Core/Router.php';
require __DIR__ . '/../Controllers/Test-controllers.php';
require __DIR__ . '/../Controllers/AuthController.php';
require __DIR__ . '/../Controllers/AdminUserController.php';
require __DIR__ . '/../Controllers/AdminPageController.php';

use Controllers\AdminPageController;
use Core\Router;

// Routes
$router = Router::getInstance();

// Test
$router->get('/test', 'TestController@test');
$router->get('/', 'TestController@abc');

// Signup routes
$router->get('/signup', 'AuthController@signupForm');
$router->post('/signup/submit', 'AuthController@signupSubmit');

// Login
$router->get('/login', 'AuthController@loginForm');
$router->post('/login/submit', 'AuthController@loginSubmit');

// BO Users
$router->get('/admin/users', 'AdminUserController@listUsers');
$router->get('/admin/users/delete', 'AdminUserController@deleteUser');

// BO Pages
$router->get('/admin/pages', 'AdminPageController@listPages');
$router->get('/admin/page', 'AdminPageController@viewPage');
$router->get('/admin/new-page', 'AdminPageController@viewNewPage');
$router->post('/admin/create-new-page', 'AdminPageController@createNewPage');
$router->get('/admin/delete-page', 'AdminPageController@deletePage');
$router->get('/admin/update-page-view', 'AdminPageController@viewPageToUpdate');
$router->post('/admin/update-page', 'AdminPageController@updatePage');

$router->dispatch();