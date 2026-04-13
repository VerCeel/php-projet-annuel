<header>
  <nav class="navbar">
    <div class="navbar-left">
      <?php if(!empty($_SESSION['user'])): ?>
        <p>Droits : <?= $_SESSION['user']['role'] ?></p>
      <?php endif ;?>
      <a href="/">Accueil</a>
      <?php
        use Controllers\HeaderController;
        $headerController = new HeaderController();
        $routes = $headerController->getRoutes();
      ?> 
      <div class="navbar-dropdown">
        <button class="navbar-burger"><span>Pages ↓</span></button>
        <div class="navbar-menu">
          <?php /** if (!empty($_SESSION['user'])): */ ?>
            <?php foreach($routes as $route): ?>
              <?php if($route['status'] === "published"): ?>
                <a href="/page/<?= h($route['slug']); ?>"><?= h($route['title']); ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php /**endif; */ ?>
        </div>
      </div>
    </div>

    <div class="navbar-right">
      <?php if (!empty($_SESSION['user']) && in_array($_SESSION['user']['role'], ['ADMIN', 'EDITOR'])): ?>
        <a href="/admin/pages">Pages admin</a>
      <?php endif; ?>

      <?php if (!empty($_SESSION['user']) && $_SESSION['user']['role'] === 'ADMIN'): ?>
        <a href="/admin/users">Utilisateurs admin</a>
      <?php endif; ?>
      <div class="hidden-mobile">
        <button class="btn btn--tertiary toggle-theme">✨</button>
      </div>
    </div>
  </nav>
</header>
