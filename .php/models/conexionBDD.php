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
                
                parent::__construct($this->host.';port=3308; dbname='.$this->nombre_bdd, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {

                $this->error = $e->getMessage();
            }
            
        }



        //Methods

        public function ejecutarConsulta($consulta){

            $statement = $this->prepare($consulta);

            return $statement;
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