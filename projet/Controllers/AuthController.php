<?php

namespace Controllers;

require __DIR__ . '/../helpers/MailService.php';
require_once __DIR__ . '/../Models/UserModel.php';
use Models\UserModel;
use helpers\MailService;

use function helpers\checkAuth;

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

  public function viewForgottenPassword() {
    require __DIR__ . '/../Views/Auth/forgottenPassword.php';
  }

  public function forgottenPassword() {
    $email = $_POST['email'];
    $userModel = new UserModel();
    $user = $userModel->findUserByEmail($email);
    if(!$user) {
      echo "Une erreur est survenue";
      return;
    }
    $token =  bin2hex(random_bytes(32));
    $userModel->saveResetToken($user['id'], $token);
    if(\MailService::sendResetPassword($email, $token)) {
      echo "Vérifiez votre adresse mail";
    } else {
      echo "un probleme est survenu lors de la réinitialisation du mot de passe";
    }
  }

  public function viewResetPassword() {
    require __DIR__ . '/../Views/Auth/resetPassword.php';
  }

  public function resetPassword() {
    $newPassword = $_POST['password'];
    $token = $_POST['token'];
    $userModel = new UserModel();
    if($userModel->resetPasswordByToken($token, $newPassword)) {
      echo "mot de passe réinitialisé avec succès";
    } else {
      echo "Token expiré";
    }
  }
}