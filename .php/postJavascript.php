<?php

    include("conexionBDD.php");

    $conexion = new ConexionBDD();

    $resultado = $conexion->ejecutarConsulta("SELECT * FROM post");

    if($resultado->execute(array())){

        $tablaAsociativa = $resultado->fetchAll(PDO::FETCH_NUM);

        for ($row=count($tablaAsociativa)-1; $row >= 0; $row--) { 
                
            if($row == count($tablaAsociativa)-1){

                echo 
                "<article id='articuloPrincipal'>
                    <img src='imagenes/creandoContenido.jpg' alt=''>
                    <h2>" . $tablaAsociativa[$row][1] . "</h2>
                    <p>" . recortarTextoPrincipal($tablaAsociativa[$row][2]) . "</p>
                </article>
                <hr>";
            }
            else{
                echo 
                "<div>
                <article>
                    <img src='imagenes/codigo.jpg' alt=''>
                    <h2>". $tablaAsociativa[$row][1] ."</h2>
                    <p>". recortarTexto($tablaAsociativa[$row][2]) ."</p>
                </article>";
                $row--;
                
                if ($row > 0) {
                    echo
                    "<article>
                        <img src='imagenes/codigo.jpg' alt=''>
                        <h2>". $tablaAsociativa[$row][1] ."</h2>
                        <p>". recortarTexto($tablaAsociativa[$row][2]) ."</p>
                    </article>
                    </div>
                    <hr>";
                }
                else {
                    echo 
                    "</div>";
                }
            }
        }
    }
        

        /*
        while($fila = $resultado->fetch(PDO::FETCH_NUM)){

            static $cont=0;

            if($cont == 0){
                echo 
                "<article id='articuloPrincipal'>
                    <img src='imagenes/creandoContenido.jpg' alt=''>
                    <h2>" . $fila[1] . "</h2>
                    <p>" . recortarTextoPrincipal($fila[2]) . "</p>
                </article>
                <hr>";
            }
            else {
                echo 
                "<div>
                    <article>
                        <img src='imagenes/codigo.jpg' alt=''>
                        <h2>".$fila[1]."</h2>
                        <p>". recortarTexto($fila[2]) ."</p>
                    </article>";
                    $fila = $resultado->fetch();
                echo
                    "<article>
                        <img src='imagenes/codigo.jpg' alt=''>
                        <h2>". $fila[1] ."</h2>
                        <p>". recortarTexto($fila[2]) ."</p>
                    </article>
                </div>
                <hr>";
            }

            $cont++;
        }
        */
    else{
        exit("No se ha podido ejecutar la consulta");
    }
    


    function recortarTextoPrincipal($texto){

        static $textoModif_post;
        $textoModif_post = "";

        if(strlen($texto) > 700){

            for($i = 0; $i < 700; $i++){

                $textoModif_post .= substr($texto, $i, 1);

            }
            return $textoModif_post . "<br><br> <a href=''>Leer más...</a>";
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
            return $textoModif_post . "<br><br> <a href=''>Leer más...</a>";
        }
        else{
            return $texto;
        }
    }

?>