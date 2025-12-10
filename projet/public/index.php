<?php
session_start();

require __DIR__ . '/../Core/Router.php';
require __DIR__ . '/../Controllers/HomePageController.php';
require __DIR__ . '/../Controllers/AuthController.php';
require __DIR__ . '/../Controllers/AdminUserController.php';
require __DIR__ . '/../Controllers/AdminPageController.php';

use Core\Router;

// Instancie le router
$router = Router::getInstance();

// Routes
$router = Router::getInstance();

// HomePage
$router->get('/', 'HomePageController@getHomePage');

// Signup routes
$router->get('/signup', 'AuthController@signupForm');
$router->post('/signup/submit', 'AuthController@signupSubmit');

// Verifier l'email
$router->get('/verify', 'AuthController@verifyEmail');

// Login
$router->get('/login', 'AuthController@loginForm');
$router->post('/login/submit', 'AuthController@loginSubmit');

// Mot de passe oublié / envoi
$router->get('/forgotten-password', 'AuthController@viewForgottenPassword');
$router->post('/forgotten-password', 'AuthController@forgottenPassword');
// Mot de passe oublié / retour
$router->get('/reset-password', 'AuthController@viewResetPassword');
$router->post('/reset-password', 'AuthController@resetPassword');

// BO Users
$router->get('/admin/users', 'AdminUserController@listUsers');
$router->get('/admin/users/delete', 'AdminUserController@deleteUser');
$router->get('/admin/users/modify-user-role', 'AdminUserController@viewModifyRole');
$router->post('/admin/users/modify-user-role', 'AdminUserController@modifyRole');

// BO Pages
$router->get('/admin/pages', 'AdminPageController@listPages');
$router->get('/admin/page', 'AdminPageController@viewPage');
$router->get('/admin/new-page', 'AdminPageController@viewNewPage');
$router->post('/admin/create-new-page', 'AdminPageController@createNewPage');
$router->get('/admin/delete-page', 'AdminPageController@deletePage');
$router->get('/admin/update-page-view', 'AdminPageController@viewPageToUpdate');
$router->post('/admin/update-page', 'AdminPageController@updatePage');

$router->dispatch();

// include __DIR__ . '/../Views/layout/footer.php';