<?php

namespace Controllers;

require __DIR__ . '/../Models/UserModel.php';
use Models\UserModel;

class AuthController {
  
  public function signupForm() {
    require __DIR__ . '/../Views/auth/signup.php';
  }

  public function signupSubmit() {
    $userModel = new UserModel();
    $result = $userModel->createUser($_POST);

    if($result) {
      echo "inscription réussie";
    } else {
      echo "erreur lors de l'inscription";
    }
  }

  public function loginForm() {
    require __DIR__ . '/../Views/Auth/login.php';
  }

  public function loginSubmit() {
    $userModel = new UserModel();
    $user = $userModel->getUserByEmail($_POST['email']);

    if(!$user || !password_verify($_POST['password'], $user['password'])) {
      echo 'Echec lors de la connexion';
      return;
    }
    session_start();
    // On peut utiliser un id plus complexe pour + de sécurité.
    $_SESSION['user_id'] = $user['id'];

    echo 'connexion réussie';
  }
}