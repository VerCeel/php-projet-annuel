<?php

namespace Models;

require_once __DIR__ . '/../Core/Database.php';

use Core\Database;

class PageModel {
  private $db;

  public function __construct() {
    $this->db = Database::getInstance();
  }

  public function getAllPages() {
    $preRequest = $this->db->prepare("SELECT * FROM pages");
    $preRequest->execute();
    return $preRequest->fetchAll();
  }

  public function createPage($data) {
    $preRequest = $this->db->prepare("INSERT INTO pages (title, slug, content) VALUES (?, ?, ?)");
    $preRequest->execute([$data['title'], $data['slug'], $data['content']]);
  }

  public function getPageById($id) {
    $preRequest = $this->db->prepare("SELECT * FROM pages where id = ?");
    $preRequest->execute([$id]);
    return $preRequest->fetch();
  }
}