<?php

namespace Models;

require __DIR__ . '/../Core/Database.php';
use App\Core\Database;

class UserModel {
  private $db;

  public function __construct() {
    $this->db = Database::getInstance();
  }

  public function createUser($data) {
    $preRequest = $this->db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    return $preRequest->execute([
      $data['email'],
      password_hash($data['password'], PASSWORD_DEFAULT)
    ]);
  }
}