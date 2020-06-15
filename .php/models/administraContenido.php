<?php
    require("ConexionBDD.php");
    require("Post.php");
    require("Usuario.php");


    class AdministraContenido{

        private $allPost;


        //Methods

        public function getAllPosts(){
            $conex = new ConexionBDD();

            $statement = $conex->ejecutarConsulta("SELECT * FROM POST");

            $statement->execute(array());

            static $cont = 0;

            while ($fila = $statement->fetch(PDO::FETCH_BOTH)) {

                $arrayPosts[$cont] = new Post($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);

                $cont++;
            }

            return $arrayPosts;
        }
        

        public function borraPost($id){ //en $id tambien puede ir una subconsulta con paréntesis.
            $conex = new ConexionBDD();
            $statement = $conex->ejecutarConsulta("DELETE FROM post WHERE id = ". $id);

            $statement->execute();
        }


    }

?>