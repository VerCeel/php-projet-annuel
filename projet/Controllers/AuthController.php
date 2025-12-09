<?php

namespace Controllers;

require __DIR__ . '/../helpers/MailService.php';
require_once __DIR__ . '/../Models/UserModel.php';
require __DIR__ . '/../helpers/checkInputs.php';

use Models\UserModel;
use helpers\MailService;
use function helpers\isSafePassword;
use function helpers\isValidEmail;

use function helpers\checkAuth;

class AuthController {
  
  public function signupForm() {
    require __DIR__ . '/../Views/auth/signup.php';
  }

  public function signupSubmit() {
    if(!isValidEmail($_POST['email'])) {
      echo "Merci de rentrer un email correct";
      return;
    }
    if(!isSafePassword($_POST['password'])) {
      echo "Veuillez choisir un mot de passe avec au moins 8 caractères, un caractère spécial et une majuscule.";
      return;
    }
    $userModel = UserModel::getInstance();
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
    $userModel = UserModel::getInstance();
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

    $userModel = UserModel::getInstance();
    if($userModel->verifyEmailByToken($token)) {
      echo "Email verifié, compte validé";
      echo "<a href='/login'>Connecte-toi</a>";
    } else {
      echo "Le lien n'est plus valide";
    }
  }

  public function viewForgottenPassword() {
    require __DIR__ . '/../Views/Auth/forgottenPassword.php';
  }

  public function forgottenPassword() {
    $email = $_POST['email'];
    $userModel = UserModel::getInstance();
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
    if(!isSafePassword($newPassword)) {
      echo "Veuillez choisir un mot de passe avec au moins 8 caractères, une majuscule et un caractère spécial.";
      return;
    }
    $token = $_POST['token'];
    $userModel = UserModel::getInstance();
    $res = $userModel->resetPasswordByToken($token, $newPassword);
    if($res) {
      echo "mot de passe réinitialisé avec succès";
    } else {
      echo "Token expiré";
    }
  }
}