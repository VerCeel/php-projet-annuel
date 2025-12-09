<?php

namespace Controllers;

require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../Models/PageModel.php';
require_once __DIR__ . '/../Core/Controller.php';

use Core\Controller;
use function helpers\checkAdmin;
use Models\PageModel;

class AdminPageController extends Controller {

  public function listPages() {
    checkAdmin();
    $pageModel = PageModel::getInstance();
    $pages = $pageModel->getAllPages();
    $this->render('admin/pages', ['pages' => $pages]);
  }

  public function viewPage() {
    checkAdmin();
    if (!isset($_GET['slug'])) {
      echo "Page introuvable";
      return;
    }
    $slug = $_GET['slug'];
    $pageModel = PageModel::getInstance();
    $page = $pageModel->getPageBySlug($slug);
    $this->render('/page/page', ['page' => $page]);
  }

  public function viewNewPage() {
    checkAdmin();
    $this->render('/admin/newPage', []);
  }

  public function viewPageToUpdate() {
    checkAdmin();
    if (!isset($_GET['slug'])) {
      echo "Page introuvable";
      return;
    }
    $slug = $_GET['slug'];
    $pageModel = PageModel::getInstance();
    $page = $pageModel->getPageBySlug($slug);
    $this->render('/admin/updatePage', ['page' => $page]);
  }

  public function createNewPage() {
    checkAdmin();
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
    checkAdmin();
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
    checkAdmin();
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