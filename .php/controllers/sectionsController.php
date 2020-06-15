<?php

require(".php/models/administraContenido.php");

    class SectionsController{

        private $conexion;

        function __construct(){
            $this->conexion = new ConexionBDD();
        }

        function muestraPost(){
            $administraContenido = new AdministraContenido();
            $arrayPostsDev = $administraContenido->getAllPosts();

            for ($post = count($arrayPostsDev) - 1; $post >= 0; $post--) { 

                if($post == count($arrayPostsDev) - 1){
                    echo 
                    "<article id='articuloPrincipal'>
                        <img src='imagenes/creandoContenido.jpg' alt=''>
                        <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                        <p>" . $this->recortarTextoPrincipal($arrayPostsDev[$post]->getContenido()) . "</p>";

                        if(isset($_SESSION["nick_usuario"])){
                            if($_SESSION["nick_usuario"] == "admin"){
                            echo "<p><a href='.php/controllers/borraPost.php?post=". $arrayPostsDev[$post]->getId() ."'>Borrar</a></p>";
                            }
                        }
                        
                        echo 
                    "</article>";
                }
                else{
                    echo 
                    "<div>
                    <article>
                        <img src='imagenes/codigo.jpg' alt=''>
                        <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                        <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido()) . "</p>";

                        if(isset($_SESSION["nick_usuario"])){
                            if($_SESSION["nick_usuario"] == "admin"){
                            echo "<p><a href='.php/controllers/borraPost.php?post=". $arrayPostsDev[$post]->getId() ."'>Borrar</a></p>";
                            }
                        }

                        echo 
                    "</article>";
                    $post--;
                    
                    if ($post >= 0) {
                        echo
                        "<article>
                            <img src='imagenes/codigo.jpg' alt=''>
                            <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                            <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido()) . "</p>";

                            if(isset($_SESSION["nick_usuario"])){
                                if($_SESSION["nick_usuario"] == "admin"){
                                echo "<p><a href='.php/controllers/borraPost.php?post=". $arrayPostsDev[$post]->getId() ."'>Borrar</a></p>";
                                }
                            }
                        
                        echo 
                        "</article>
                        </div>";
                    }
                    else {
                        echo 
                        "</div>";
                    }
                }
            }
        }

        
        function recortarTextoPrincipal($texto){

            static $textoModif_post;
            $textoModif_post = "";

            if(strlen($texto) > 700){

                for($i = 0; $i < 700; $i++){

                    $textoModif_post .= substr($texto, $i, 1);

                }
                return $textoModif_post . "...<br><br> <a href=''>Leer más...</a>";
            }
            else{
                return $texto;
            }
        }


        function recortarTexto($texto){

            static $textoModif_post;
            $textoModif_post = "";

            if(strlen($texto) > 400){

                for($i = 0; $i < 400; $i++){

                    $textoModif_post .= substr($texto, $i, 1);

                }
                return $textoModif_post . "...<br><br> <a href=''>Leer más...</a>";
            }
            else{
                return $texto;
            }
        }

    }

?>