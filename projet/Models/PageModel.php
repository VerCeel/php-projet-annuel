<?php

namespace Models;


use Core\Database;

class PageModel {

  private static ?PageModel $instance = null;
  private $db;

  private function __construct() {
    $this->db = Database::getInstance();
  }

  public static function getInstance(): PageModel {
    if(self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getAllPages() {
    $preRequest = $this->db->prepare("SELECT * FROM pages");
    $preRequest->execute();
    return $preRequest->fetchAll();
  }

  public function createPage($title, $slug, $content, $authorName, $status, $date) {
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
    $preRequest = $this->db->prepare("INSERT INTO pages (title, slug, content, status, author, date) VALUES (?, ?, ?, ?, ?, ?)");
    $preRequest->execute([$title, $slug, $content, $status, $authorName, $date]);
  }

  public function getPageBySlug($slug) {
    $preRequest = $this->db->prepare("SELECT * FROM pages where slug = ?");
    $preRequest->execute([$slug]);
    $page = $preRequest->fetch();
    if($page && $page['status'] === "draft" && (!isset($_SESSION['user']) || $_SESSION['user']['role'] === 'USER')) {
      header("Location: /");
      exit;
    }
    return $page;
  }

  public function getPublishedPageBySlug($slug) {
    $preReq = $this->db->prepare("SELECT * FROM pages where slug = ? AND status = ?");
    $preReq->execute([$slug, 'published']);
    return $preReq->fetch();
  }

  public function deletePageById($id) {
    $preReq = $this->db->prepare("DELETE FROM pages WHERE id = ?");
    $preReq->execute([$id]);
  }

  public function updatePageBySlug($title, $content, $formerSlug, $newSlug, $status, $authorName) {
    $preReq = $this->db->prepare("UPDATE pages SET title = ?, slug = ?, content = ?, status = ?, author = ? WHERE slug =?");
    $preReq->execute([$title, $newSlug, $content, $status, $authorName, $formerSlug]);
  }

  public function getAllpublishedPages() {
    $preReq = $this->db->prepare("SELECT * FROM pages where status = ?");
    $preReq->execute(["published"]);
    return $preReq->fetchAll();
  }
}