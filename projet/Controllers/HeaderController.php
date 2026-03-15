<?php

namespace Controllers;

use Models\PageModel;

class HeaderController {
  public function getRoutes() {
    $pageModel = PageModel::getInstance();
    $routes = $pageModel->getAllPages();
    return $routes;
  }
}