<?php

namespace Controllers;

use Models\PageModel;

class SitemapController {
  public function getPublishedRoutes() {
    $pages = PageModel::getInstance();
    $pages = $pages->getAllpublishedPages();
    
    header("Content-Type: application/xml; charset=utf-8");
    require __DIR__ . "/../Views/xml/sitemap.xml.php";
  }
}