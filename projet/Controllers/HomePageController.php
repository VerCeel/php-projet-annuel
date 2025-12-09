<?php

namespace Controllers;

class HomePageController {
    public function abc() {
        echo "<h1>Page d'acceuil</h1>";
        echo "<br>";
        echo "<a href='/login'>Connexion</a> <br>";
        echo "<a href='/signup'>Inscription</a>";
    }
}
