<?php


    class Post{
        
        private $titulo;
        private $contenido;
        private $seccion;
        private $usuario;

        public function __construct(String $titulo, String $contenido, $seccion, String $usuario){
            $this->titulo=$titulo;
            $this->contenido=$contenido;
            $this->seccion=$seccion;
            $this->usuario=$usuario;
        }




        //Getters & Setters

        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo(String $titulo){
            $this->titulo=$titulo;
        }


        public function getContenido(){
            return $this->contenido;
        }

        public function setContenido(String $contenido){
            $this->contenido=$contenido;
        }


        public function getSeccion(){
            return $this->seccion;
        }

        public function setSeccion(String $seccion){
            $this->seccion=$seccion;
        }


        public function getUsuario()
        {
                return $this->usuario;
        }

        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

    }
?>