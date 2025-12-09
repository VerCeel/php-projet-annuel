<?php

namespace helpers;

use Models\UserModel;

function checkAuth() {
  if(!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
  }

  $userModel = new UserModel();
  $user = $userModel->getUserById($_SESSION['user_id']);

  if(!$user || $user['is_verified'] !== 1) {
    session_destroy();
    header("Location: /login");
    exit;
  }
}