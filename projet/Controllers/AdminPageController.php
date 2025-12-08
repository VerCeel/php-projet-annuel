<?php

namespace Controllers;

require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../Models/PageModel.php';

use function helpers\checkAuth;
use Models\PageModel;

class AdminPageController {

  public function listPages() {
    checkAuth();
    $pageModel = PageModel::getInstance();
    $pages = $pageModel->getAllPages();
    require __DIR__ . '/../Views/admin/pages.php';
  }

  public function viewPage() {
    checkAuth();
    if (!isset($_GET['slug'])) {
      echo "Page introuvable";
      return;
    }
    $slug = $_GET['slug'];
    $pageModel = PageModel::getInstance();
    $page = $pageModel->getPageBySlug($slug);
    require __DIR__ . '/../Views/page/page.php';
  }

  public function viewNewPage() {
    checkAuth();
    require __DIR__ . '/../Views/admin/newPage.php';
  }

  public function viewPageToUpdate() {
    checkAuth();
    if (!isset($_GET['slug'])) {
      echo "Page introuvable";
      return;
    }
    $slug = $_GET['slug'];
    $pageModel = PageModel::getInstance();
    $page = $pageModel->getPageBySlug($slug);
    require __DIR__ . '/../Views/admin/updatePage.php';
  }

  public function createNewPage() {
    checkAuth();
    $title = $_POST['title'];
    $content = $_POST['content'];
    if(!$title || !$content){
      echo "Merci de remplir l'ensemble des champs";
      return;
    }
    $slug = implode('-', preg_split('/\s+/', strtolower($title)));
    $pageModel = PageModel::getInstance();

    $pageModel->createPage($title, $slug, $content);

    header("Location: /admin/pages");
    exit;
  }

  public function deletePage() {
    checkAuth();
    if(!isset($_GET['id'])) {
      echo "Page introuvable";
      return;
    }
    $id = $_GET['id'];
    $pageModel = PageModel::getInstance();
    $pageModel->deletePageById($id);
    header("Location: /admin/pages");
  }

  public function updatePage() {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if(!$title || !$content){
      echo "Merci de remplir l'ensemble des champs";
      return;
    }
    $newSlug = implode('-', preg_split('/\s+/', strtolower($title)));
    $pageModel = PageModel::getInstance();
    $pageModel->updatePageBySlug($title, $content, $_GET['slug'], $newSlug);
    header("Location: /admin/update-page-view?slug=" . $newSlug);
  }
}