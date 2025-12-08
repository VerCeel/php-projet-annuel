<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Connexion</h1>
  <form method="POST" action="/login/submit">
    <input type="email" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="password" required>
    <button type="submit">Se connecter</button>
  </form>
  <br>
  <a href="/signup">Je n'ai pas de compte</a>
  <br>
  <a href="/forgotten-password">J'ai oublié mon mot de passe</a>
</body>
</html>