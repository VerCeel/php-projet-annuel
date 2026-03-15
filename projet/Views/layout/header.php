<header>
  <nav>
    <a href="/">Accueil</a>
    <?php require_once __DIR__ . '/../../Controllers/HeaderController.php'; 
      use Controllers\HeaderController;
      $headerController = new HeaderController();
      $routes = $headerController->getRoutes();
    ?> 
    <?php /** if (!empty($_SESSION['user'])): */ ?>
      <?php foreach($routes as $route): ?>
        <?php if($route['status'] === "published"): ?>
          <a href="/page/<?php echo $route['slug']; ?>"><?php echo htmlspecialchars($route['title']); ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php /**endif; */ ?>

    <?php if (!empty($_SESSION['user']) && in_array($_SESSION['user']['role'], ['ADMIN', 'EDITOR'])): ?>
      <a href="/admin/pages">Pages admin</a>
    <?php endif; ?>

    <?php if (!empty($_SESSION['user']) && $_SESSION['user']['role'] === 'ADMIN'): ?>
      <a href="/admin/users">Utilisateurs admin</a>
    <?php endif; ?>
  </nav>
  <hr>
</header>
