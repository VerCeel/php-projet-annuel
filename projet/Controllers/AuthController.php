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
}