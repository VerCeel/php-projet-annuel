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

  public function createPage($title, $slug, $content) {
    // Voir si le slug est disponible
    $baseSlug = $slug;
    $i = 1;

    $stmt = $this->db->prepare("SELECT COUNT(*) FROM pages WHERE slug = ?");

    while(true) {
      $stmt->execute([$slug]);
      if($stmt->fetchColumn() === 0) break;
      $slug = $baseSlug . '-' .$i++;
    }
    // Crée un nouvel élément avec le bon slug
    $preRequest = $this->db->prepare("INSERT INTO pages (title, slug, content) VALUES (?, ?, ?)");
    $preRequest->execute([$title, $slug, $content]);
  }

  public function getPageBySlug($slug) {
    $preRequest = $this->db->prepare("SELECT * FROM pages where slug = ?");
    $preRequest->execute([$slug]);
    return $preRequest->fetch();
  }

  public function deletePageById($id) {
    $preReq = $this->db->prepare("DELETE FROM pages WHERE id = ?");
    $preReq->execute([$id]);
  }
}