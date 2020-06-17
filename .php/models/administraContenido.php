<?php
    require("ConexionBDD.php");
    require("Post.php");
    require("Usuario.php");


    class AdministraContenido{


        //Methods

        public function getPosts(String $consulta){
            $conex = new ConexionBDD();

            $statement = $conex->ejecutarConsulta($consulta);

            $statement->execute(array());

            static $cont = 0;

            while ($fila = $statement->fetch(PDO::FETCH_BOTH)) {

                $arrayPosts[$cont] = new Post($fila[1], nl2br($fila[2]), $fila[3], $fila[4]);

                $cont++;
            }

            $conex = null;

            if(!isset($arrayPosts)){
                return 0;
            }
            return $arrayPosts;

        }


        public function borraPost($titulo){
            $conex = new ConexionBDD();
            $statement = $conex->ejecutarConsulta("DELETE FROM post WHERE titulo = '". $titulo ."'");

            $statement->execute();
        }


    }

?>