<?php

namespace helpers;

function slugify($title) {
  $title = strtolower($title);
  $title = preg_replace('/[^a-z0-9]+/', '-', $title);
  $title = preg_replace('/-+/', '-', $title);
  return trim($title);
}