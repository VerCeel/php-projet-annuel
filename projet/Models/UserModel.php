<?php

namespace Models;

require __DIR__ . '/../Core/Database.php';
use Core\Database;

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

  public function getUserByEmail($email) {
    $preRequest = $this->db->prepare("SELECT * FROM users where email = ?");
    $preRequest->execute([$email]);
    return $preRequest->fetch();
  }

  public function getAllUsers() {
    $preRequest = $this->db->prepare("SELECT id, email FROM users");
    $preRequest->execute();
    return $preRequest->fetchAll();
  }

  public function deleteUser($id) {
    $preRequest = $this->db->prepare("DELETE FROM users where id = ?");
    $preRequest->execute([$id]);
  }
}