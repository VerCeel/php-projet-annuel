<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
</head>
<body>
  <h1>Inscription</h1>
  <form method="POST" action="/signup/submit">
    <input type="email" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="password" required>
    <button type="submit">S'inscrire</button>
  </form>
  <br>
  <a href="/login">J'ai déjà un compte</a>
</body>
</html>