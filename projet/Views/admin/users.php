
<h1>User list</h1>
<table class="table">
  <tr>
    <th class="hide-mobile">ID</th>
    <th>Email</th>
    <th class="hide-mobile">Role</th>
    <th class="hide-mobile">Actions: Supprimer</th>
    <th>Actions: Modifier</th>
  </tr>
  <?php foreach($users as $user): ?>
  <tr>
    <td class="hide-mobile"><?= h($user['id'])?></td>
    <td><?=  h($user['email'])?></td>
    <td class="hide-mobile"><?= h($user['role'])?></td>
    <td class="hide-mobile"><a href="/admin/users/delete?id=<?= h($user['id'])?>">supprimer</a></td>
    <td><a href="/admin/users/modify-user-role?id=<?= h($user['id'])?>">Modifier le role de l'utilisateur</a></td>
  </tr>
  <?php endforeach; ?>
</table>