<?php

namespace Controllers;

require_once __DIR__ . '/../Core/Controller.php';

use Core\Controller;

class HomePageController extends Controller {
    public function getHomePage() {
        $this->render('/page/homePage', []);
    }
}
