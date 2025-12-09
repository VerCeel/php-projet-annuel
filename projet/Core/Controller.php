<?php

// On peut utiliser ce fichier pour faire un render, plutot que de mettre les header/footer dans du html = plus scalable + meilleur pour le SEO car on ne change pas le title.

namespace Core;

class Controller {
  protected function render($view, $data = []) {
    extract($data);
    require __DIR__ . '/../Views/layout/header.php';
    require __DIR__ . '/../Views/' . $view . '.php';
    require __DIR__ . '/../Views/layout/footer.php';
  }
}