<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <?php foreach($pages as $page): ?>
    <h1>Titre : <?php echo $page['title'];?> </h1>
    <h2>Contenu :</h2>
    <p><?php echo $page['content']; ?></p>
    <a href="/admin/page?id=<?php echo $page['id']; ?>">Voir</a> <a href="#">Modifier</a> <a href="#">Supprimer</a>
    <?php endforeach; ?>
</body>
</html>