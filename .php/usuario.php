<?php

        include("conexionBDD.php");

    class Usuario{

        private $nick;
        private $pass;
        
        public function __construct(String $nick, String $pass){
            $this->nick = $nick;
            $this->pass = $pass;
        }


        //Methods

        public function validaUsuario(){
            $conexionBDD = new ConexionBDD();

            $resultado = $conexionBDD->ejecutarConsulta("SELECT nick, pass FROM usuario WHERE nick = :nick AND pass = :pass");

            if($resultado->execute(array(':nick'=>$this->nick, ':pass'=>$this->pass))){

                $filas = $resultado->fetchAll(PDO::FETCH_NUM);

                        if (count($filas) == 1) {

                                return true;
                        }
                        else{;
                                return false;
                        }
            }
            else{
                    echo "No se pudo ejecutar la consulta";
                    return false;
            }
        }


        
        //Getters & Setters

        public function getNick()
        {
                return $this->nick;
        }

        public function setNick($nick)
        {
                $this->nick = $nick;

                return $this;
        }


        public function getPass()
        {
                return $this->pass;
        }

        public function setPass($pass)
        {
                $this->pass = $pass;

                return $this;
        }
    }
?>