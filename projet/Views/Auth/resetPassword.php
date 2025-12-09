<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réinitialisation du mot de passe</title>
</head>
<body>
  <h1>Réinitialisation du mot de passe:</h1>
  <form method="POST" action="/reset-password">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
    <input type="password" name="password" id="password" placeholder="nouveau mot de passe" required>
    <button type="submit">Réinitialiser mon mot de passe</button>
  </form>
</body>
</html>