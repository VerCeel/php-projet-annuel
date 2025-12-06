<?php

namespace Core;

class Router {
  private static ?Router $instance = null;
  private array $routes = [];
  private function __construct() {}
  private function __clone() {}

  public static function getInstance(): Router {
    if(!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function get(string $path, string $controllerAction) {
    $this->routes['GET'][$path] = $controllerAction;
  }

  public function post(string $path, string $controllerAction) {
    $this->routes['POST'][$path] = $controllerAction;
  }

  public function dispatch() {
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = strtok($_SERVER['REQUEST_URI'], '?');

    if(!isset($this->routes[$method][$uri])) {
      http_response_code(404);
      echo "404 not found";
      return;
    }

  [$controllerName, $actionName] = explode('@', $this->routes[$method][$uri]);
  $controllerName = "Controllers\\" . $controllerName;
  $controller = new $controllerName();

  return $controller->$actionName();
  }
}