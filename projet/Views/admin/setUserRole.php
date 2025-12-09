<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Role utilisateur</title>
</head>
<body>
  <h1>Définir le rôle de cet utilisateur</h1>
  <p>email : <?php echo $user['email'] ;?></p>
  <form method="POST" action="/admin/users/modify-user-role">
    <input type="hidden" name="email" value="<?php echo $user['email'] ?>">
    <select name="role" id="role">
      <option value="ADMIN">Admin</option>
      <option value="USER">User</option>
    </select>
    <button type="submit">Nouveau rôle</button>
  </form>
</body>
</html>