<?php

require(".php/models/administraContenido.php");

    class SectionsController{

        private $conexion;

        function __construct(){
            $this->conexion = new ConexionBDD();
        }

        function muestraPost(String $consulta){
            $administraContenido = new AdministraContenido();

            $arrayPostsDev = $administraContenido->getPosts("$consulta");
            
            if($arrayPostsDev == 0){
                return;
            }
            for ($post = count($arrayPostsDev) - 1; $post >= 0; $post--) { 

                //Si el post es el primero le damos el id='articuloPrincipal' para darle el estilo del primer post
                if($post == count($arrayPostsDev) - 1){
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