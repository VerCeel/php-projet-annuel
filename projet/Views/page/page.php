<h1>Titre : <?= htmlspecialchars($page['title']) ?></h1>
<h2>Contenu :</h2>
<p> <?= htmlspecialchars($page['content']) ?></p>
<br>
<br>
<br>
<br>
<h3>Auteur :</h3>
<span> <?= htmlspecialchars($page['author']) ?></span>
<h4>Date de mise en ligne :</h4>
<?php $dateArr = explode("-", $page['date']); ?>
<span> <?= $dateArr[2] . "/" . $dateArr[1] . "/" . $dateArr[0]; ?> </span>