<?php

require(".php/models/administraContenido.php");

    class SectionsController{

        private $conexion;

        function __construct(){
            $this->conexion = new ConexionBDD();
        }

        function muestraPost(String $seccion){
            $administraContenido = new AdministraContenido();

            $arrayPostsDev = $administraContenido->getPosts("SELECT * FROM post WHERE seccion ='". $seccion ."'");
            
            if($arrayPostsDev == 0){
                return;
            }
            for ($post = count($arrayPostsDev) - 1; $post >= 0; $post--) { 

                //Si el post es el primero le damos el id='articuloPrincipal' para darle el estilo del primer post
                if($post == count($arrayPostsDev) - 1){
                    echo 
                    "<a href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."'>
                        <article id=articuloPrincipal>
                            <img src='imagenes/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                            <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                            <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 400) . "</p>";
                        
                            //Si la session está establecida y es de admin se muestran las etiquetas de borrar
                            if(isset($_SESSION["nick_usuario"])){
                                if($_SESSION["nick_usuario"] == "admin"){
                                echo "<p><a href='.php/controllers/borraPost.php?name=". $arrayPostsDev[$post]->getTitulo() ."'>Borrar</a></p>";
                                }
                            }

                        echo 
                        "</article>
                    </a>";
                }
                else{ //Si el post no es el primero no le damos para darle el estilo de los demás post
                    echo 
                    "<div>
                    <a href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."'>
                        <article>
                        <img src='imagenes/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                        <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                        <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 400) . "</p>";

                        //Si la session está establecida y es de admin se muestran las etiquetas de borrar
                        if(isset($_SESSION["nick_usuario"])){
                            if($_SESSION["nick_usuario"] == "admin"){
                            echo "<p><a href='.php/controllers/borraPost.php?name=". $arrayPostsDev[$post]->getTitulo() ."'>Borrar</a></p>";
                            }
                        }

                        echo 
                        "</article>
                    </a>";
                    $post--;
                    
                    //Si dentro de los post que no son el primero hay otro post(ya que van en un div en parejas de 2), mostramos ese otro post.
                    if ($post >= 0) { 
                        echo
                        "<a href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."'>
                            <article>
                            <img src='imagenes/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                                <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                                <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 400) . "</p>";

                                //Si la session está establecida y es de admin se muestran las etiquetas de borrar
                                if(isset($_SESSION["nick_usuario"])){
                                    if($_SESSION["nick_usuario"] == "admin"){
                                    echo "<p><a href='.php/controllers/borraPost.php?name=". $arrayPostsDev[$post]->getTitulo() ."'>Borrar</a></p>";
                                    }
                                }
                            
                            echo 
                            "</article>
                        </a>
                        </div>";
                    }
                    else { //Si dentro de los post que no son el primero no hay otro post(ya que van en un div en parejas de 2), no mostramos ese otro post ya que daria error.
                        echo 
                        "</div>";
                    }
                }
            }
        }

        
        function recortarTexto(String $texto, int $tamanio){

            static $textoModif_post;
            $textoModif_post = "";

            if(strlen($texto) > $tamanio){

                for($i = 0; $i < $tamanio; $i++){

                    $textoModif_post .= substr($texto, $i, 1);

                }
                return $textoModif_post . "...<br><br> <a>Leer más...</a>";
            }
            else{
                return $texto;
            }
        }
    }
?>