<?php

namespace Controllers;

require_once __DIR__ . '/../Models/PageModel.php';
use Models\PageModel;

class HeaderController {
  public function getRoutes() {
    $pageModel = PageModel::getInstance();
    $routes = $pageModel->getAllPages();
    return $routes;
  }
}