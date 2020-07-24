<?php

require(".php/models/administraContenido.php");

    class SectionsController{

        private $conexion;

        function __construct(){
            $this->conexion = new ConexionBDD();
        }

        function muestraPost(String $consulta, String $section){

            $administraContenido = new AdministraContenido();
            $todosLosPost = $administraContenido->getPosts("$consulta");

            $LIMITE_POST = 5; //El numero de post que queremos que haya en cada pagina

            if(isset($_GET['val'])){
                $comienzoPost = $_GET['val'];
                $arrayPostsDev = $administraContenido->getPosts("$consulta" . "ORDER BY id DESC LIMIT $comienzoPost, 5");
            }
            else{
                $arrayPostsDev = $administraContenido->getPosts("$consulta" . "ORDER BY id DESC LIMIT $LIMITE_POST");
            }

            $numeroDePosts = '';
            $numeroPaginas = '';

            if($arrayPostsDev == "No se ha ejecutado la consulta correctamente"){
                echo "En construcción";
            }else{
                $numeroDePosts = count($todosLosPost);
                $numeroPaginas = ceil($numeroDePosts / $LIMITE_POST);
            }

            
            if($arrayPostsDev == 0){
                return;
            }
            for ($post = 0; $post < count($arrayPostsDev); $post++) { 

                //Si el post es el primero le damos el id='articuloPrincipal' para darle el estilo del primer post
                if(!isset($_GET['val']) || $_GET['val'] == 0){
                    if($post == 0){
                        echo 
                        "<a href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."' class='anclaArticulo'>
                            <article id=articuloPrincipal>
                                <img src='imagenes_posts/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                                <div>
                                <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                                <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 500) . "</p>
                                </div>";
    
                        echo 
                        "</article></a>";
                        
                    }else{ //Si el post no es el primero no le damos para darle el estilo de los demás post
                        echo 
                        "<a href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."' class='anclaArticulo'>
                        <article class=articulosSecundarios>
                            <img src='imagenes_posts/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                            <div>
                            <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                            <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 300) . "</p>
                            
                            </div>";
    
                        echo 
                        "</article></a>";
                    }
                }
                else{ //Si el post no es el primero no le damos para darle el estilo de los demás post
                    echo 
                    "<a href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."' class='anclaArticulo'>
                    <article class=articulosSecundarios>
                        <img src='imagenes_posts/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                        <div>
                        <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                        <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 300) . "</p>
                        
                        </div>";

                    echo 
                    "</article></a>";
                }
            }

            echo "<p>";

            for($i = 1; $i <= $numeroPaginas; $i++){

                $comienzoPostPagina= $LIMITE_POST * $i - $LIMITE_POST;

                if($i == $numeroPaginas) echo "<a href='view_section.php?section=$section&val=$comienzoPostPagina'>" . $i . "</a>";
                else echo "<a href='view_section.php?section=$section&val=$comienzoPostPagina'>" . $i . ", </a>";
            }

            echo "</p>";
        }

        
        function recortarTexto(String $texto, int $tamanio){

            static $textoModif_post;
            $textoModif_post = "";

            if(strlen($texto) > $tamanio){

                for($i = 0; $i < $tamanio; $i++){

                    $textoModif_post .= substr($texto, $i, 1);

                }
                return $textoModif_post . "...";
            }
            else{
                return $texto;
            }
        }
    }
?>