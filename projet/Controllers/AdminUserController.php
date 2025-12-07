<?php

namespace Controllers;

require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../Models/UserModel.php';

use Models\UserModel;
use function helpers\checkAuth;

class AdminUserController {

  public function listUsers() {
    checkAuth();
    $userModel = new UserModel();
    $users = $userModel->getAllUsers();
    require __DIR__ . '/../Views/admin/users.php';
  }

  public function deleteUser() {
    checkAuth();
    $id = $_GET['id'];
    $userModel = new UserModel();
    $userModel->deleteUser($id);
    header("Location: /admin/users");
    exit;
  }
}