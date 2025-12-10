
<h1>User list</h1>
<table>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
  </tr>
  <?php foreach($users as $user): ?>
  <tr>
    <td><?php echo $user['id']?></td>
    <td><?php echo $user['email']?></td>
    <td><?php echo $user['role']?></td>
    <td><a href="/admin/users/delete?id=<?php echo $user['id']?>">supprimer</a></td>
    <td><a href="/admin/users/modify-user-role?id=<?php echo $user['id']?>">Modifier le role de l'utilisateur</a></td>
  </tr>
  <?php endforeach; ?>
</table>