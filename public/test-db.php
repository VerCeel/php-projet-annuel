<?php
require __DIR__ . '/../app/Core/Database.php';

use App\Core\Database;

try {
    $db = Database::getInstance();
    echo "Connexion réussie !";
} catch (\Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
