<h1>Page d'acceuil</h1> <br>

<?php if(!empty($_SESSION['success'])) : ?>
  <div class="alert alert--success" id="alert">
    <?= h($_SESSION['success']); ?>
  </div>
  <?php unset($_SESSION['success']); ?>
<?php endif ?>

<?php if(isset($_SESSION['user'])): ?>
  <a href="/logout">Déconnexion</a>
<?php endif; ?>

<?php if(!isset($_SESSION['user'])): ?>
  <a href='/login'>Connexion</a> <br>
  <a href='/signup'>Inscription</a>
<?php endif; ?>
