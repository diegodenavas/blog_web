<aside>
    <h4>Post mas visitados</h4>
    <?php
        $administra = new AdministraContenido();

        $postMasVistos = $administra->getPosts("SELECT post.* FROM post INNER JOIN visita ON post.id=visita.id_post GROUP BY titulo ORDER BY count(titulo) desc LIMIT 10");

        for ($i=1; $i <= count($postMasVistos); $i++) { 
            echo "<p>" . $postMasVistos[$i]->getTitulo() . "</p>";
        }
    ?>
</aside>