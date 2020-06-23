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
                    "<article id=articuloPrincipal>
                        <img src='imagenes_posts/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                        <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                        <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 400) . "</p>
                        <a class='anclaLeerMas' href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."'><p>Leer más...</p></a>";

                    echo 
                    "</article>";
                }
                else{ //Si el post no es el primero no le damos para darle el estilo de los demás post
                    echo 
                    "<div>
                        <article>
                        <img src='imagenes_posts/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                        <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                        <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 400) . "</p>
                        <a class='anclaLeerMas' href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."'>Leer más...</a>";

                        echo 
                        "</article>";
                    $post--;
                    
                    //Si dentro de los post que no son el primero hay otro post(ya que van en un div en parejas de 2), mostramos ese otro post.
                    if ($post >= 0) { 
                        echo
                        "<article>
                            <img src='imagenes_posts/".$arrayPostsDev[$post]->getUrlImagen()."' alt=''>
                                <h2>" . $arrayPostsDev[$post]->getTitulo() . "</h2>
                                <p>" . $this->recortarTexto($arrayPostsDev[$post]->getContenido(), 400) . "</p>
                                <a class='anclaLeerMas' href='view_post.php?post=". $arrayPostsDev[$post]->getTitulo() ."'>Leer más...</a>";
                            
                            echo 
                            "</article>
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