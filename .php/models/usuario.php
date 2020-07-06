<?php
        require_once("conexionBDD.php");

    class Usuario{
        private $nick;
        private $pass;
        private $name;
        private $surname1;
        private $surname2;
        private $birthday;
        private $dateRegister;
        private $email;

        public function __construct(String $nick, String $pass, String $name, String $surname1, String $surname2, $birthday, $dateRegister, String $email){
                $this->nick=$nick;
                $this->pass=$pass;
                $this->name=$name;
                $this->surname1=$surname1;
                $this->surname2=$surname2;
                $this->birthday=$birthday;
                $this->dateRegister=$dateRegister;
                $this->email=$email;
        }

        public static function usuarioLogin(String $nick, String $pass)
	{
		return new self($nick, $pass, "", "", "", "", "", "");
        }
        
	public static function usuarioRegistro($nick, $pass, $name, $surname1, $surname2, $birthday, $email)
	{
		return new self($nick, $pass, $name, $surname1, $surname2, $birthday, date("Y/m/d"), $email);
        }
        


        //Methods

        public function validaUsuario(){

            $conexionBDD = new ConexionBDD();

            $resultado = $conexionBDD->ejecutarConsulta("SELECT * FROM usuario WHERE nick = :nick");

            if($resultado->execute(array(':nick'=>$this->getNick() ))){

                $fila = $resultado->fetchAll(PDO::FETCH_NUM);

                        if (count($fila) == 1 && password_verify($this->getPass(), $fila[0][2])) {
                                
                                $this->nick=$fila[0][1];
                                $this->pass=$fila[0][2];
                                $this->name=$fila[0][3];
                                $this->surname1=$fila[0][4];
                                $this->surname2=$fila[0][5];
                                $this->birthday=$fila[0][6];
                                $this->dateRegister=$fila[0][7];
                                $this->email=$fila[0][8];
                                
                                $conexionBDD = null;
                                return true;
                        }
                        else{
                                $conexionBDD = null;
                                return false;
                        }
            }
            else{
                    echo "No se pudo ejecutar la consulta";
                    $conexionBDD = null;
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
        }


        public function getPass()
        {
                return $this->pass;
        }

        public function setPass($pass)
        {
                $this->pass = $pass;
        }


        public function getName()
        {
                return $this->name;
        }
 
        public function setName($name)
        {
                $this->name = $name;
        }


        public function getSurname1()
        {
                return $this->surname1;
        }

        public function setSurname1($surname1)
        {
                $this->surname1 = $surname1;
        }


        public function getSurname2()
        {
                return $this->surname2;
        }

        public function setSurname2($surname2)
        {
                $this->surname2 = $surname2;
        }


        public function getBirthday()
        {
                return $this->birthday;
        }

        public function setBirthday($birthday)
        {
                $this->birthday = $birthday;
        }


        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;
        }


        public function getDateRegister()
        {
                return $this->dateRegister;
        }

        public function setDateRegister($dateRegister)
        {
                $this->dateRegister = $dateRegister;
        }
    }
?>