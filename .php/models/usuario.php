<?php

        require_once("conexionBDD.php");

    class Usuario{
        private $nick;
        private $pass;
        private $date;
        
        public function __construct(String $nick, String $pass){
                $this->nick=$nick;
                $this->pass=$pass;
        }


        //Methods

        public function validaUsuario(){

            $conexionBDD = new ConexionBDD();

            $resultado = $conexionBDD->ejecutarConsulta("SELECT nick, pass FROM usuario WHERE nick = :nick AND pass = :pass");

            if($resultado->execute(array(':nick'=>$this->getNick(), ':pass'=>$this->getPass()))){

                $fila = $resultado->fetchAll(PDO::FETCH_NUM);

                var_dump($fila);

                        if (count($fila) == 1) {
                                
                                $this->nick=$fila[0][0];
                                $this->pass=$fila[0][1];
                                $this->date=$fila[0][2];
                                
                                return true;
                        }
                        else{
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


        public function getDate()
        {
                return $this->date;
        }

        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }
    }
?>