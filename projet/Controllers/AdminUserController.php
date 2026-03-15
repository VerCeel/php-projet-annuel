<?php

namespace Controllers;

require_once __DIR__ . '/../helpers/auth.php';

use Core\Controller;
use Models\UserModel;
use function helpers\checkRole;

class AdminUserController extends Controller {

  public function __construct() {
    checkRole(['ADMIN']);
  }

  public function listUsers() {
    $userModel = UserModel::getInstance();
    $users = $userModel->getAllUsers();
    $this->render('/admin/users', ['users' => $users, 'title' => "Voir tous les utilisateurs"]);
  }

  public function deleteUser() {
    $id = $_GET['id'];
    $userModel = UserModel::getInstance();
    $userModel->deleteUser($id);
    header("Location: /admin/users");
    exit;
  }

  public function viewModifyRole() {
    $userModel = UserModel::getInstance();
    $user = $userModel->getUserById($_GET['id']);
    $this->render('/admin/setUserRole', ['user' => $user, 'title' => "Modifier le rôle de " . $user['email']]);
  }

  public function modifyRole() {
    $role = $_POST['role'];
    $email = $_POST['email'];
    $userModel = UserModel::getInstance();
    $user = $userModel->findByEmailAndUpdateRole($email, $role);
    header("Location: /admin/users");
  }
}