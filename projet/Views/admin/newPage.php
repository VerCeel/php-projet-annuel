<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nouvelle page</title>
</head>
<body>
  <h1>Créer une nouvelle page</h1>
  <form method="POST" action="/admin/create-new-page">
    <input type="text" name="title" id="title" placeholder="Titre" required>
    <br>
    <br>
    <textarea name="content" id="content" placeholder="Contenu de l'article"></textarea>
    <br>
    <br>
    <button type="submit">Créer le nouvel article</button>
  </form>
</body>
</html>