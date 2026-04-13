<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- On définit les règle suivies : ici ce sont celles officielles à suivre, on l'indique au robot google -->
    <!-- Ici on met l'adresse de notre site, la homepage
    Puis on indique la moyenne selon laquelle notre site risque de changer = la fréquence à laquelle on publie pour que le robot sache à quelle fréquence revenir et l'importance de la homepage=1-->
    <url>
        <loc>http://localhost:8090</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <!-- Ici on met la liste de nos pages publiques et la fréquence à laquelle ils sont mis à jours, publiés, ici on a ajouté le updated-at pour dire au robot quand a eu lieu la dernière modif. -->
    <?php foreach ($pages as $page): ?>
        <url>
            <loc>http://localhost:8090/page/<?= $page['slug'] ?></loc>
            <?php if(isset($page['updated_at'])): ?>
                <lastmod><?= date('Y-m-d', strtotime($page['updated_at'])) ?></lastmod>
            <?php endif; ?>
            <priority>0.8</priority>
        </url>
    <?php endforeach; ?>
</urlset>