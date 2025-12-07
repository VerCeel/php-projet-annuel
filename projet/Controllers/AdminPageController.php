<?php

namespace Controllers;

require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../Models/PageModel.php';

use function helpers\checkAuth;
use Models\PageModel;

class AdminPageController {

  public function listPages() {
    checkAuth();
    $pageModel = new PageModel();
    $pages = $pageModel->getAllPages();
    require __DIR__ . '/../Views/admin/pages.php';
  }

  public function viewPage() {
    checkAuth();

    if (!isset($_GET['id'])) {
      echo "Page introuvable";
      return;
    }
    $id = $_GET['id'];
    $pageModel = new PageModel();
    $page = $pageModel->getPageById($id);
    
    require __DIR__ . '/../Views/page/page.php';
  }
}