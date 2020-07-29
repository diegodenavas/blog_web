<?php
    require_once("conexionBDD.php");

    class Visita{

        private $post;
        private $fecha;

        public function __construct(){

        }


        public function addVisita(String $tituloPost){
            $conexion = new ConexionBDD();

            $statement = $conexion->ejecutarConsulta("INSERT INTO visita(id_post, fecha) VALUES((SELECT id FROM post WHERE titulo = ?), curdate())");

            try {
                if($statement->execute(array($tituloPost))) $conexion = null;
                else {
                    $conexion = null;
                    echo "No se ha podido añadir la visita";
                }
            } catch (PDOException $e) {

            }

        }

    }
?>