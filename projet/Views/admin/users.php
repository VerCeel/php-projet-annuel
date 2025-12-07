<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users list</title>
</head>
<body>
  <h1>User list</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
      <td><?php echo $user['id']?></td>
      <td><?php echo $user['email']?></td>
      <td><a href="/admin/users/delete?id=<?php echo $user['id']?>">supprimer</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>