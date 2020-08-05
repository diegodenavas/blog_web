<aside>
    <p class="titulosAside">Post mas visitados</p>
    <?php
        $administra = new AdministraContenido();

        $postMasVistos = $administra->getPosts("SELECT post.* FROM post INNER JOIN visita ON post.id=visita.id_post GROUP BY titulo ORDER BY count(titulo) desc LIMIT 10");

        for ($i=0; $i < count($postMasVistos); $i++) { 
            echo "<p class='enlacesAside'><a href='view_post.php?post=" . $postMasVistos[$i]->getTitulo() . "'>• " . $postMasVistos[$i]->getTitulo() . "</a></p>";
        }
    ?>
</aside>