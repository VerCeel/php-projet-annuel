
<h1>Réinitialisation du mot de passe:</h1>
<form method="POST" action="/reset-password" class="form-field">
  <input type="hidden" name="token" value="<?= h($_GET['token'] ?? ''); ?> ">
  <input type="password" name="password" id="password" placeholder="nouveau mot de passe" required>
  <button type="submit" class="btn btn--tertiary">Réinitialiser mon mot de passe</button>
</form>