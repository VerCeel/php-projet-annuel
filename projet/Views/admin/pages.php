
<h1>Liste des pages:</h1>
<a href="/admin/new-page"> Créer une nouvelle page</a>
<table>
  <tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Slug</th>
    <th>Contenu</th>
  </tr>
    <?php foreach($pages as $page): ?>
      <tr>
        <td> <?php echo $page['id']; ?> </td>
        <td> <?php echo $page['title']; ?> </td>
        <td> <?php echo $page['slug']; ?> </td>
        <td> <?php echo mb_substr($page['content'], 0, 10) . '...'; ?> </td>
        <td>
          <a href="/admin/page?slug=<?php echo $page['slug']; ?>">Voir</a> 
          <a href="/admin/update-page-view?slug=<?php echo $page['slug']; ?>">Modifier</a> 
          <a href="/admin/delete-page?id=<?php echo $page['id']; ?>">Supprimer</a>
        </td>
      </tr>
    <?php endforeach; ?>
</table>