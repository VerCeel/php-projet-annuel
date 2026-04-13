<h1>Connexion</h1>
<?php if (!empty($_SESSION['error'])): ?>
  <div class="alert alert--error" id="alert">
    <?= h($_SESSION['error']); ?>
  </div>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>
<form method="POST" action="/login/submit"  class="form-field">
  <input type="email" name="email" placeholder="email" required>
  <input type="password" name="password" placeholder="password" required>
  <button type="submit" class="btn btn--secondary">Se connecter</button>
</form>
<br>
<a href="/signup">Je n'ai pas de compte</a>
<br>
<br>
<a href="/forgotten-password">J'ai oublié mon mot de passe</a>