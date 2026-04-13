
<h1>User list</h1>
<table class="table">
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions: Supprimer</th>
    <th>Actions: Modifier</th>
  </tr>
  <?php foreach($users as $user): ?>
  <tr>
    <td><?= h($user['id'])?></td>
    <td><?=  h($user['email'])?></td>
    <td><?= h($user['role'])?></td>
    <td><a href="/admin/users/delete?id=<?= h($user['id'])?>">supprimer</a></td>
    <td><a href="/admin/users/modify-user-role?id=<?= h($user['id'])?>">Modifier le role de l'utilisateur</a></td>
  </tr>
  <?php endforeach; ?>
</table>