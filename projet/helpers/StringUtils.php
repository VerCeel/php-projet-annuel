<?php

namespace helpers;

class StringUtils {

  // On utilise une fonction statique pour éviter d'instancier un objet depuis StringUtils et avoir un gain de mémoire et de lisibilité
  public static function h($str) {
    return htmlspecialchars($str ?? '', ENT_QUOTES);
  }

  // Permet de modifier le titre pour en faire un slug : 
    // on le passe en minuscule
    // on remplace ses accents par une lettre sans accent
    // on remplace tous les caractère qui ne sont pas des lettres ou des chiffres par des -
    // on remplace tous les - multiples par un -
    // On trim les espaces et les tirets extérieurs
  public static function slugify($title) {
    $title = strtolower($title);
    $search = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ'];
    $rpl = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y'];
    $title = str_replace($search, $rpl, $title);
    $title = preg_replace('/[^a-z0-9]+/', '-', $title);
    $title = preg_replace('/-+/', '-', $title);
    return trim($title, '-');
  }

}