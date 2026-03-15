<?php

namespace Controllers;

require_once __DIR__ . '/../helpers/auth.php';
require __DIR__ . '/../helpers/slugify.php';

use function helpers\slugify;
use Core\Controller;
// use function helpers\checkAdmin;
// use function helpers\checkAuth;
use function helpers\checkRole;

use Models\PageModel;

class AdminPageController extends Controller {

  public function listPages() {
    checkRole(["ADMIN", "EDITOR"]);
    $pageModel = PageModel::getInstance();
    $pages = $pageModel->getAllPages();
    $this->render('admin/pages', ['pages' => $pages, 'title' => 'Gestion des pages admin']);
  }

  public function viewPage($slug) {
    // On peut enable le checkauth pour forcer les visiteurs à s'inscrire pour accéder aux articles
    // checkAuth();
    $slug = urldecode($slug);
    $pageModel = PageModel::getInstance();
    $page = $pageModel->getPageBySlug($slug);
    if(!$page) {
      echo "page introuvable";
      return;
    }
    $this->render('/page/page', ['page' => $page, 'title' => $slug]);
  }

  public function viewNewPage() {
    checkRole(["ADMIN", "EDITOR"]);
    $this->render('/admin/newPage', []);
  }

  public function viewPageToUpdate() {
    checkRole(["ADMIN", "EDITOR"]);
    if (!isset($_GET['slug'])) {
      echo "Page introuvable";
      return;
    }
    $slug = $_GET['slug'];
    $pageModel = PageModel::getInstance();
    $page = $pageModel->getPageBySlug($slug);
    $this->render('/admin/updatePage', ['page' => $page, 'title' => "Mettre à jour la page"]);
  }

  public function createNewPage() {
    checkRole(["ADMIN", "EDITOR"]);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $authorName = $_POST['author'];
    $status = $_POST['status'];
    if(!$title || !$content){
      echo "Merci de remplir l'ensemble des champs";
      return;
    }
    $slug = slugify($title);
    $date = date("Y-m-d H:i:s");
    $pageModel = PageModel::getInstance();

    $pageModel->createPage($title, $slug, $content, $authorName, $status, $date);

    header("Location: /admin/pages");
    exit;
  }

  public function deletePage() {
    checkRole(["ADMIN", "EDITOR"]);
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
    checkRole(["ADMIN", "EDITOR"]);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $authorName = $_POST['author'];
    $status = $_POST['status'];
    if(!$title || !$content){
      echo "Merci de remplir l'ensemble des champs";
      return;
    }
    $newSlug = slugify($title); 
    $pageModel = PageModel::getInstance();
    $pageModel->updatePageBySlug($title, $content, $_GET['slug'], $newSlug, $status, $authorName);
    header("Location: /admin/update-page-view?slug=" . $newSlug);
  }

}