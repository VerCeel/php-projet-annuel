<?php

namespace Models;

require __DIR__ . '/../Core/Database.php';
use Core\Database;

class UserModel {
  private $db;

  public function __construct() {
    $this->db = Database::getInstance();
  }

  public function createUser($email, $password, $verified, $token) {
    $preRequest = $this->db->prepare("INSERT INTO users (email, password, is_verified, verification_token) VALUES (?, ?, ?, ?)");
    return $preRequest->execute([
      $email,
      password_hash($password, PASSWORD_DEFAULT),
      $verified,
      $token
    ]);
  }

  public function verifyEmailByToken($token) {
    $preReq = $this->db->prepare("UPDATE users SET is_verified = 1, verification_token = 0 WHERE verification_token = ?");
    $preReq->execute([$token]);
    return $preReq->rowCount() > 0;
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

  public function getUserById($id) {
    $preReq = $this->db->prepare("SELECT * FROM users WHERE id = ?");
    $preReq->execute([$id]);
    return $preReq->fetch();
  }
}