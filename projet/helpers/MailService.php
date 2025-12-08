<?php
// helpers/MailService.php

require_once __DIR__.'/PHPMailer/PHPMailer.php';
require_once __DIR__.'/PHPMailer/SMTP.php';
require_once __DIR__.'/PHPMailer/Exception.php';
require_once __DIR__ . '/../config/config.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService {

  public static function sendVerificationEmail($to, $token) {
      $mail = new PHPMailer(true);

      try {
          // SMTP
          $mail->isSMTP();
          $mail->Host       = 'smtp.gmail.com'; 
          $mail->SMTPAuth   = true;
          $mail->Username   = 'leoplumail72@gmail.com';
          $mail->Password   = 'itql wieu wgpq rajg';
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port       = 587;

          // destinations
          $mail->setFrom('no-reply@tonsite.com', 'Le mini CMS');
          $mail->addAddress($to);

          // contenu
          $mail->isHTML(true);
          $mail->Subject = 'Verifie ton adresse mail';

          $verifyUrl = BASE_URL . "/verify?token=" . $token;

          $mail->Body = "
              <h2>Bienvenue !</h2>
              <p>Clique ici pour confirmer ton email :</p>
              <a href='$verifyUrl'>$verifyUrl</a>
          ";

          return $mail->send();

      } catch (Exception $e) {
          return false;
      }
  }
}
