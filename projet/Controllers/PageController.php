<?php

namespace Controllers;

use Core\Controller;

class PageController extends Controller {
  public function getDesignGuide() {
    $this->render('/page/design-guide', []);
  }
}