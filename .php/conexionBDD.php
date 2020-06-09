<?php

    class ConexionBDD extends PDO{

        private $host = "";
        private $nombre_bdd = "";
        private $user = "";
        private $pass = "";
        private $conexion;

        function __construct(){

            $this->host = "mysql:host=localhost";
            $this->nombre_bdd = "blog";
            $this->user = "root";
            $this->pass = "";

            try {
                
                parent::__construct($this->host.';dbname='.$this->nombre_bdd, $this->user, $this->pass);

            } catch (PDOException $e) {

                $this->error = $e->getMessage();
            }
            
        }



        //Methods

        public function ejecutarConsulta($consulta){

            $statement = $this->prepare("SELECT * FROM post");

            return $statement;
        }

        
        public function ejecutarSentencia($sentencia){

            $statement = $this->conexion->prepare($sentencia);

            if($statement->execute(array())){
                echo "sentencia ejecutada";
            }
            else{
                exit("No se ha podido ejecutar la consulta");
            }
        }

        
        
        //Getters and Setters

        public function getHost()
        {
                return $this->host;
        }

        public function setHost($host)
        {
                $this->host = $host;

        }



        public function getNombre_bdd()
        {
                return $this->nombre_bdd;
        }

        public function setNombre_bdd($nombre_bdd)
        {
                $this->nombre_bdd = $nombre_bdd;
        }



        public function getUser()
        {
                return $this->user;
        }

        public function setUser($user)
        {
                $this->user = $user;
        }



        public function getPass()
        {
                return $this->pass;
        }

        public function setPass($pass)
        {
                $this->pass = $pass;
        }

    }
?>