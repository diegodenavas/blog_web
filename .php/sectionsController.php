<?php

include("conexionBDD.php");

    class SectionsController{

        private $conexion;

        function __construct(){
            $this->conexion = new ConexionBDD();
        }



        function muestraPost($query){

            $resultado = $this->conexion->ejecutarConsulta($query);

            if($resultado->execute(array())){

                $tablaAsociativa = $resultado->fetchAll(PDO::FETCH_NUM);
                

                for ($row=count($tablaAsociativa)-1; $row >= 0; $row--) { 
                        
                    if($row == count($tablaAsociativa)-1){

                        echo 
                        "<article id='articuloPrincipal'>
                            <img src='imagenes/creandoContenido.jpg' alt=''>
                            <h2>" . $tablaAsociativa[$row][1] . "</h2>
                            <p>" . $this->recortarTextoPrincipal($tablaAsociativa[$row][2]) . "</p>
                        </article>";
                    }
                    else{
                        echo 
                        "<div>
                        <article>
                            <img src='imagenes/codigo.jpg' alt=''>
                            <h2>". $tablaAsociativa[$row][1] ."</h2>
                            <p>". $this->recortarTexto($tablaAsociativa[$row][2]) ."</p>
                        </article>";
                        $row--;
                        
                        if ($row >= 0) {
                            echo
                            "<article>
                                <img src='imagenes/codigo.jpg' alt=''>
                                <h2>". $tablaAsociativa[$row][1] ."</h2>
                                <p>". $this->recortarTexto($tablaAsociativa[$row][2]) ."</p>
                            </article>
                            </div>";
                        }
                        else {
                            echo 
                            "</div>";
                        }
                    }
                }
            }
            else{
                exit("No se ha podido ejecutar la consulta");
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