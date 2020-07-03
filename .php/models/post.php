<?php


    class Post{
        
        private $urlImagen;
        private $titulo;
        private $contenido;
        private $seccion;
        private $usuario;
        private $fecha;

        public function __construct(String $urlImagen, String $titulo, String $contenido, String $seccion, String $usuario){
            $this->urlImagen=$urlImagen;
            $this->titulo=$titulo;
            $this->contenido=$contenido;
            $this->seccion=$seccion;
            $this->usuario=$usuario;
        }




        //Getters & Setters

        public function getUrlImagen()
        {
                return $this->urlImagen;
        }

        public function setUrlImagen($urlImagen)
        {
                $this->urlImagen = $urlImagen;
        }


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


        public function getFecha()
        {
                return $this->fecha;
        }

        public function setFecha($fecha)
        {
                $this->fecha = $fecha;
        }
    }
?>