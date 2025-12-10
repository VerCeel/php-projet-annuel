
<h1>Modifier mon article :</h1>
<form method="POST" action="/admin/update-page?slug=<?php echo $page['slug']; ?>">
  <label>Titre</label>
  <input type="text" name="title" id="title" value="<?php echo $page['title']?>" required>
  <br>
  <br>
  <label>Contenu:</label>
  <textarea name="content" id="content" required><?php echo $page['content']?></textarea>
  <br>
  <br>
  <button type="submit">Modifier</button>
</form>
<br>
<a href="/admin/pages">Retourner à la liste des pages</a>