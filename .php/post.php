<?php

    class Post{
        
        private $titulo;
        private $contenido;
        private $seccion;

        public function __construct(String $titulo, String $contenido, $seccion){
            $this->titulo=$titulo;
            $this->contenido=$contenido;
            $this->seccion=$seccion;
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
    }
?>