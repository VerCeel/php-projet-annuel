<?php

namespace Controllers;

require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../Models/UserModel.php';
require_once __DIR__ . '/../Core/Controller.php';

use Core\Controller;
use Models\UserModel;
use function helpers\checkAdmin;

class AdminUserController extends Controller {

  public function listUsers() {
    checkAdmin();
    $userModel = UserModel::getInstance();
    $users = $userModel->getAllUsers();
    $this->render('/admin/users', ['users' => $users]);
  }

  public function deleteUser() {
    checkAdmin();
    $id = $_GET['id'];
    $userModel = UserModel::getInstance();
    $userModel->deleteUser($id);
    header("Location: /admin/users");
    exit;
  }

  public function viewModifyRole() {
    checkAdmin();
    $userModel = UserModel::getInstance();
    $user = $userModel->getUserById($_GET['id']);
    $this->render('/admin/setUserRole', ['user' => $user]);
  }

  public function modifyRole() {
    checkAdmin();
    $role = $_POST['role'];
    $email = $_POST['email'];
    $userModel = UserModel::getInstance();
    $user = $userModel->findByEmailAndUpdateRole($email, $role);
    header("Location: /admin/users");
  }
}