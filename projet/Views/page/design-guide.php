<h1>Design Guide</h1>

<h2>Titre h2 en Saira Stencil</h2>
<h3>Titre h3 en Saira Stencil</h3>
<h4>Titre h4 en Saira Stencil</h4>
<h5>Titre h5 en Saira Stencil</h5>
<h6>Titre h6 en Saira Stencil</h6>

<h2>La typographie des paragraphes</h2>
<h3>Les paragraphes en inter</h3>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quam perspiciatis, facere minus quas nam rem id unde asperiores, voluptates eum dolores nihil earum voluptas quisquam veritatis sapiente facilis! Dicta?</p>
<h3>Les span, bouton, label de formulaires sont en Montserrat</h3>
<span>Lorem ipsum dolor sit.</span>


<h2>Les boutons</h2>
<div class="btn-container">
  <div class="btn btn--primary">Bouton principal</div>
  <div class="btn btn--secondary">Bouton secondaire</div>
  <div class="btn btn--tertiary">Bouton tertiaire</div>
</div>

<h2>Les tableaux</h2>
<table class="table">
  <tr>
    <th>Prénom</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
  </tr>
  <tr>
    <td>John</td>
    <td>john.doe@gmail.com</td>
    <td>admin</td>
    <td><a href="">Modifier le role de l'utilisateur</a></td>
  </tr>
  <tr>
    <td>Léo</td>
    <td>leo.plumail@gmail.com</td>
    <td>user</td>
    <td><a href="">Modifier le role de l'utilisateur</a></td>
  </tr>
</table>

<h2>Les formulaires</h2>

<form method="" action="" class="form-field">
  <label>Titre:</label>
  <input type="text" name="title" id="title" required>
  <br>
  <br>
  <label>Contenu :</label>
  <textarea name="content" id="content" required></textarea>
  <br>
  <br>
  <label for="status">Séletctionnez le statut de l'article :</label>
  <select name="status" id="status">
    <option value="published">Publié</option>
    <option value="draft">Brouillon</option>
  </select>
  <br>
  <br>
  <label for="author">Auteur :</label>
  <input type="text" name="author" id="author">
  <br>
  <br>
  <button type="submit" class="btn btn--tertiary">Envoyer</button>
</form>

<h2>Navbar</h2>
<nav class="navbar">
  <div class="navbar-left">
    <a href="#">Accueil</a>
    <a href="#">A propos</a>
    <div class="navbar-dropdown">
      <button class="navbar-burger">Pages ↓</button>
      <div class="navbar-menu">
        <a href="#">article 1</a>
        <a href="#">article 2</a>
        <a href="#">article 3</a>
      </div>
    </div>
  </div>
  <div class="navbar-right">
    <a href="#">Déconnexion</a>
  </div>
</nav>


<h2>Les bulles d'alerte</h2>
<div class="btn-container">
  <button class="btn btn--primary" id="trigger-alert-success">Succès</button>
  <button class="btn btn--secondary" id="trigger-alert-error">Erreur</button>
</div>

<h2>Le dark mode</h2>
<div class="btn-container">
  <button class="btn btn--tertiary toggle-theme">Dark mode</button>
</div>