<?php

namespace Controllers;

require __DIR__ . '/../helpers/MailService.php';
require_once __DIR__ . '/../Models/UserModel.php';
use Models\UserModel;
use helpers\MailService;

class AuthController {
  
  public function signupForm() {
    require __DIR__ . '/../Views/auth/signup.php';
  }

  public function signupSubmit() {
    $userModel = new UserModel();
    $token = bin2hex(random_bytes(32));
    $result = $userModel->createUser($_POST['email'], $_POST['password'], 0, $token);
    if(!$result) {
      echo "erreur lors de l'inscription";
      return;
    }

    if(\MailService::sendVerificationEmail($_POST['email'], $token)){
      echo "inscription réussie, vérifie ta boîte mail";
    } else {
      echo "inscription réussie mais impossible d'envoyer le mail";
    };
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
    if(session_status() === PHP_SESSION_NONE) {
    session_start();
    }
    // On peut utiliser un id plus complexe pour + de sécurité.
    $_SESSION['user_id'] = $user['id'];

    echo 'connexion réussie';
  }

  public function verifyEmail() {
    $token = $_GET['token'] ?? null;
    if(!$token) {
      echo "Lien de confirmation erronné";
      return;
    }

    $userModel = new UserModel;
    if($userModel->verifyEmailByToken($token)) {
      echo "Email verifié, compte validé";
    } else {
      echo "Le lien n'est plus valide";
    }
  }
}